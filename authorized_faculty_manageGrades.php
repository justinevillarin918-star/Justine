<?php session_start(); if(!isset($_SESSION['username'])||$_SESSION['role']!=='faculty'){header("Location: login.php");exit;} ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Grades — EduPortal</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f5f0e8;--surface:#fff;--border:#e2ddd4;--green:#2d5a27;--text:#1a1a1a;--muted:#6b6560;--accent:#1a4d8f}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
nav{display:flex;align-items:center;justify-content:space-between;padding:16px 40px;background:var(--surface);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--green)}
.back-btn{display:inline-flex;align-items:center;gap:7px;padding:7px 15px;border:1px solid var(--border);border-radius:7px;color:var(--muted);text-decoration:none;font-size:.82rem;transition:border-color .18s,color .18s}
.back-btn:hover{border-color:#aaa;color:var(--text)}
main{max-width:920px;margin:0 auto;padding:52px 24px;animation:rise .45s ease both}
@keyframes rise{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.page-header{display:flex;align-items:center;gap:16px;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--border)}
.page-header-icon{width:52px;height:52px;border-radius:12px;background:#eef3fb;border:1px solid #c2d5f5;display:grid;place-items:center;font-size:22px}
h1{font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:2px}
.page-subtitle{color:var(--muted);font-size:.86rem}
.table-wrap{background:var(--surface);border:1px solid var(--border);border-radius:12px;overflow:hidden}
table{width:100%;border-collapse:collapse}
thead tr{background:#faf9f7}
th{padding:12px 18px;text-align:left;font-size:.7rem;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);font-weight:500}
td{padding:14px 18px;font-size:.88rem;border-top:1px solid var(--border)}
tr:hover td{background:#fdf9f5}
.grade-input{background:#faf9f7;border:1px solid var(--border);border-radius:6px;padding:5px 10px;color:var(--text);font-family:'Inter',sans-serif;font-size:.88rem;width:72px;outline:none;text-align:center;transition:border-color .18s}
.grade-input:focus{border-color:var(--accent)}
.save-btn{padding:5px 12px;background:var(--accent);border:none;border-radius:6px;color:#fff;font-size:.76rem;font-weight:500;cursor:pointer;opacity:.9;transition:opacity .18s}
.save-btn:hover{opacity:1}
.grade-badge{display:inline-block;padding:3px 10px;border-radius:999px;font-size:.76rem;font-weight:600}
.gA{background:#eef3fb;color:#1a4d8f}.gB{background:#edf4ec;color:#2d5a27}.gF{background:#fdf0f0;color:#b33a3a}
</style></head>
<body>
<nav><div class="nav-logo">EduPortal</div><a class="back-btn" href="dashboard.php">← Dashboard</a></nav>
<main>
<div class="page-header"><div class="page-header-icon">📊</div><div><h1>Manage Grades</h1><p class="page-subtitle">Faculty Panel</p></div></div>
<div class="table-wrap"><table>
<thead><tr><th>Student</th><th>Subject</th><th>Midterm</th><th>Final</th><th>Grade</th><th></th></tr></thead>
<tbody>
<tr><td>Juan dela Cruz</td><td>CS101 – Intro to Programming</td><td><input class="grade-input" type="number" min="0" max="100" placeholder="—"></td><td><input class="grade-input" type="number" min="0" max="100" placeholder="—"></td><td><span class="grade-badge gA">1.0</span></td><td><button class="save-btn">Save</button></td></tr>
<tr><td>Maria Santos</td><td>CS101 – Intro to Programming</td><td><input class="grade-input" type="number" min="0" max="100" placeholder="—"></td><td><input class="grade-input" type="number" min="0" max="100" placeholder="—"></td><td><span class="grade-badge gB">2.5</span></td><td><button class="save-btn">Save</button></td></tr>
<tr><td>Pedro Reyes</td><td>CS101 – Intro to Programming</td><td><input class="grade-input" type="number" min="0" max="100" placeholder="—"></td><td><input class="grade-input" type="number" min="0" max="100" placeholder="—"></td><td><span class="grade-badge gF">5.0</span></td><td><button class="save-btn">Save</button></td></tr>
</tbody></table></div>
</main></body></html>
