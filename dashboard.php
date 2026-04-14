<?php
session_start();
$role = $_SESSION['role'] ?? null;
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit; }
$username = $_SESSION['username'];
$roleConfig = [
    'admin'   => ['icon'=>'🛡️','color'=>'#b33a3a','bg'=>'#fdf0f0','border'=>'#f5c5c5','label'=>'Administrator','links'=>[
        ['href'=>'authorized_admin_manageUsers.php','icon'=>'👥','title'=>'Manage Users','desc'=>'View, edit, and control user accounts'],
        ['href'=>'authorized_admin_systemSettings.php','icon'=>'⚙️','title'=>'System Settings','desc'=>'Configure portal preferences'],
    ]],
    'faculty' => ['icon'=>'📚','color'=>'#1a4d8f','bg'=>'#eef3fb','border'=>'#c2d5f5','label'=>'Faculty','links'=>[
        ['href'=>'authorized_faculty_manageGrades.php','icon'=>'📊','title'=>'Manage Grades','desc'=>'Record and update student grades'],
        ['href'=>'authorized_faculty_uploadMaterials.php','icon'=>'📤','title'=>'Upload Materials','desc'=>'Share learning files with students'],
    ]],
    'student' => ['icon'=>'🎓','color'=>'#2d5a27','bg'=>'#edf4ec','border'=>'#c5dcbf','label'=>'Student','links'=>[
        ['href'=>'authorized_student_submitAssignment.php','icon'=>'✏️','title'=>'Submit Assignment','desc'=>'Upload and submit your coursework'],
        ['href'=>'authorized_student_viewMaterial.php','icon'=>'📖','title'=>'View Materials','desc'=>'Browse course files and resources'],
    ]],
];
$config = $roleConfig[$role] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard — EduPortal</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root { --bg:#f5f0e8; --surface:#fff; --border:#e2ddd4; --green:#2d5a27; --text:#1a1a1a; --muted:#6b6560; }
        body { font-family:'Inter',sans-serif; background:var(--bg); color:var(--text); min-height:100vh; }
        nav { display:flex; align-items:center; justify-content:space-between; padding:16px 40px; background:var(--surface); border-bottom:1px solid var(--border); position:sticky; top:0; z-index:100; }
        .nav-logo { font-family:'Cormorant Garamond',serif; font-size:1.3rem; color:var(--green); display:flex; align-items:center; gap:9px; }
        .nav-logo-dot { width:8px; height:8px; border-radius:50%; background:var(--green); }
        .nav-right { display:flex; align-items:center; gap:12px; }
        .badge { display:inline-flex; align-items:center; gap:7px; padding:5px 13px; background:#edf4ec; border:1px solid #c5dcbf; border-radius:999px; font-size:.76rem; color:#2d5a27; font-weight:500; }
        <?php if($config): ?>
        .badge { background:<?= $config['bg'] ?>; border-color:<?= $config['border'] ?>; color:<?= $config['color'] ?>; }
        <?php endif; ?>
        .badge-dot { width:6px; height:6px; border-radius:50%; background:currentColor; opacity:.7; }
        .logout-btn { padding:7px 16px; background:transparent; border:1px solid var(--border); border-radius:7px; color:var(--muted); font-family:'Inter',sans-serif; font-size:.83rem; text-decoration:none; transition:border-color .18s, color .18s; }
        .logout-btn:hover { border-color:#aaa; color:var(--text); }
        main { max-width:960px; margin:0 auto; padding:56px 24px; animation:rise .45s ease both; }
        @keyframes rise { from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)} }
        .hero { background:var(--surface); border:1px solid var(--border); border-radius:14px; padding:36px 40px; margin-bottom:40px; display:flex; align-items:center; gap:22px; border-left:4px solid <?= $config ? $config['color'] : '#2d5a27' ?>; }
        .hero-avatar { width:64px; height:64px; border-radius:50%; display:grid; place-items:center; font-size:28px; flex-shrink:0; background:<?= $config ? $config['bg'] : '#edf4ec' ?>; border:1.5px solid <?= $config ? $config['border'] : '#c5dcbf' ?>; }
        .hero h1 { font-family:'Cormorant Garamond',serif; font-size:1.75rem; margin-bottom:5px; }
        .hero p { color:var(--muted); font-size:.88rem; }
        .hero strong { color:<?= $config ? $config['color'] : '#2d5a27' ?>; font-weight:500; }
        .section-label { font-size:.68rem; font-weight:500; letter-spacing:.12em; text-transform:uppercase; color:var(--muted); margin-bottom:18px; display:flex; align-items:center; gap:10px; }
        .section-label::after { content:''; flex:1; height:1px; background:var(--border); }
        .cards { display:grid; grid-template-columns:repeat(auto-fill, minmax(260px, 1fr)); gap:16px; }
        .card { background:var(--surface); border:1px solid var(--border); border-radius:12px; padding:28px; text-decoration:none; color:var(--text); display:block; transition:border-color .18s, transform .18s, box-shadow .18s; position:relative; }
        .card:hover { border-color:<?= $config ? $config['color'] : '#2d5a27' ?>; transform:translateY(-2px); box-shadow:0 8px 24px rgba(0,0,0,.07); }
        .card-icon { font-size:1.9rem; margin-bottom:16px; }
        .card-title { font-family:'Cormorant Garamond',serif; font-size:1.2rem; margin-bottom:7px; }
        .card-desc { font-size:.83rem; color:var(--muted); line-height:1.55; }
        .card-arrow { position:absolute; top:28px; right:24px; color:#ccc; font-size:1rem; transition:color .18s; }
        .card:hover .card-arrow { color:<?= $config ? $config['color'] : '#2d5a27' ?>; }
        .no-access { text-align:center; padding:60px 0; color:var(--muted); }
    </style>
</head>
<body>
<nav>
    <div class="nav-logo"><div class="nav-logo-dot"></div>EduPortal</div>
    <div class="nav-right">
        <?php if($config): ?>
        <div class="badge"><div class="badge-dot"></div><?= htmlspecialchars($config['label']) ?></div>
        <?php endif; ?>
        <a class="logout-btn" href="login.php">Sign out</a>
    </div>
</nav>
<main>
    <?php if($config): ?>
    <div class="hero">
        <div class="hero-avatar"><?= $config['icon'] ?></div>
        <div>
            <h1>Welcome back, <?= htmlspecialchars($username) ?></h1>
            <p>Signed in as <strong><?= htmlspecialchars($config['label']) ?></strong> — here's your dashboard.</p>
        </div>
    </div>
    <div class="section-label">Your Controls</div>
    <div class="cards">
        <?php foreach($config['links'] as $link): ?>
        <a href="<?= $link['href'] ?>" class="card">
            <div class="card-icon"><?= $link['icon'] ?></div>
            <div class="card-title"><?= $link['title'] ?></div>
            <div class="card-desc"><?= $link['desc'] ?></div>
            <span class="card-arrow">↗</span>
        </a>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="no-access">No dashboard available for your role.</div>
    <?php endif; ?>
</main>
</body>
</html>
