<?php session_start(); if(!isset($_SESSION['username'])||$_SESSION['role']!=='admin'){header("Location: login.php");exit;} ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Users — EduPortal</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f5f0e8;--surface:#fff;--border:#e2ddd4;--green:#2d5a27;--text:#1a1a1a;--muted:#6b6560;--accent:#b33a3a}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
nav{display:flex;align-items:center;justify-content:space-between;padding:16px 40px;background:var(--surface);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--green)}
.back-btn{display:inline-flex;align-items:center;gap:7px;padding:7px 15px;border:1px solid var(--border);border-radius:7px;color:var(--muted);text-decoration:none;font-size:.82rem;transition:border-color .18s,color .18s}
.back-btn:hover{border-color:#aaa;color:var(--text)}
main{max-width:960px;margin:0 auto;padding:52px 24px;animation:rise .45s ease both}
@keyframes rise{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.page-header{display:flex;align-items:center;gap:16px;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--border)}
.page-header-icon{width:52px;height:52px;border-radius:12px;background:#fdf0f0;border:1px solid #f5c5c5;display:grid;place-items:center;font-size:22px}
h1{font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:2px}
.page-subtitle{color:var(--muted);font-size:.86rem}
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:24px}
.stat{background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:20px 22px}
.stat-label{font-size:.72rem;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);margin-bottom:6px}
.stat-value{font-family:'Cormorant Garamond',serif;font-size:2rem;color:var(--text)}
.stat-value.red{color:var(--accent)}
.toolbar{display:flex;gap:10px;margin-bottom:16px}
.toolbar input,.toolbar select{background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:9px 14px;color:var(--text);font-family:'Inter',sans-serif;font-size:.9rem;outline:none;transition:border-color .18s}
.toolbar input{flex:1}.toolbar input:focus,.toolbar select:focus{border-color:var(--green)}
.toolbar input::placeholder{color:#b0a89e}
.table-wrap{background:var(--surface);border:1px solid var(--border);border-radius:12px;overflow:hidden}
table{width:100%;border-collapse:collapse}
thead tr{background:#faf9f7}
th{padding:12px 18px;text-align:left;font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);font-weight:500}
td{padding:14px 18px;font-size:.88rem;border-top:1px solid var(--border)}
tr:hover td{background:#fdf9f5}
.role-badge{display:inline-block;padding:3px 10px;border-radius:999px;font-size:.7rem;font-weight:500;letter-spacing:.04em}
.role-admin{background:#fdf0f0;color:#b33a3a}
.role-faculty{background:#eef3fb;color:#1a4d8f}
.role-student{background:#edf4ec;color:#2d5a27}
.role-default{background:#f5f0e8;color:#6b6560}
.action-btn{padding:4px 11px;border-radius:6px;font-size:.76rem;font-weight:500;border:1px solid var(--border);background:transparent;color:var(--muted);cursor:pointer;transition:border-color .18s,color .18s;margin-right:4px}
.action-btn:hover{border-color:var(--accent);color:var(--accent)}
</style></head>
<body>
<nav><div class="nav-logo">EduPortal</div><a class="back-btn" href="dashboard.php">← Dashboard</a></nav>
<main>
<div class="page-header"><div class="page-header-icon">👥</div><div><h1>Manage Users</h1><p class="page-subtitle">Administrator Panel</p></div></div>
<?php
$jsonData=file_get_contents('users.json');
$data=json_decode($jsonData,true);
$users=$data['users']??[];
$total=count($users);
$students=count(array_filter($users,fn($u)=>($u['role']??'')==='student'));
$faculty=count(array_filter($users,fn($u)=>($u['role']??'')==='faculty'));
?>
<div class="stats">
<div class="stat"><div class="stat-label">Total Users</div><div class="stat-value"><?=$total?></div></div>
<div class="stat"><div class="stat-label">Students</div><div class="stat-value"><?=$students?></div></div>
<div class="stat"><div class="stat-label">Faculty</div><div class="stat-value red"><?=$faculty?></div></div>
</div>
<div class="toolbar">
<input type="text" id="searchInput" placeholder="Search by username…">
<select id="roleFilter"><option value="">All roles</option><option value="admin">Admin</option><option value="faculty">Faculty</option><option value="student">Student</option></select>
</div>
<div class="table-wrap"><table>
<thead><tr><th>#</th><th>Username</th><th>Full Name</th><th>Role</th><th>Actions</th></tr></thead>
<tbody id="userTable">
<?php foreach($users as $i=>$user): $r=$user['role']??'default'; ?>
<tr data-username="<?=strtolower(htmlspecialchars($user['username']))?>" data-role="<?=$r?>">
<td style="color:var(--muted)"><?=$i+1?></td>
<td><strong><?=htmlspecialchars($user['username'])?></strong></td>
<td><?=htmlspecialchars($user['fullname'])?></td>
<td><span class="role-badge role-<?=$r?>"><?=ucfirst($r)?></span></td>
<td><button class="action-btn">Edit</button><button class="action-btn">Remove</button></td>
</tr>
<?php endforeach; ?>
</tbody></table></div>
</main>
<script>
const search=document.getElementById('searchInput'),rf=document.getElementById('roleFilter'),rows=document.querySelectorAll('#userTable tr');
function filter(){const q=search.value.toLowerCase(),r=rf.value;rows.forEach(row=>{row.style.display=(row.dataset.username.includes(q)&&(!r||row.dataset.role===r))?'':'none'});}
search.addEventListener('input',filter);rf.addEventListener('change',filter);
</script></body></html>
