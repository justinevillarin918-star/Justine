<?php session_start(); if(!isset($_SESSION['username'])||$_SESSION['role']!=='admin'){header("Location: login.php");exit;} ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>System Settings — EduPortal</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f5f0e8;--surface:#fff;--border:#e2ddd4;--green:#2d5a27;--text:#1a1a1a;--muted:#6b6560;--accent:#b33a3a}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
nav{display:flex;align-items:center;justify-content:space-between;padding:16px 40px;background:var(--surface);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--green)}
.back-btn{display:inline-flex;align-items:center;gap:7px;padding:7px 15px;border:1px solid var(--border);border-radius:7px;color:var(--muted);text-decoration:none;font-size:.82rem;transition:border-color .18s,color .18s}
.back-btn:hover{border-color:#aaa;color:var(--text)}
main{max-width:760px;margin:0 auto;padding:52px 24px;animation:rise .45s ease both}
@keyframes rise{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.page-header{display:flex;align-items:center;gap:16px;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--border)}
.page-header-icon{width:52px;height:52px;border-radius:12px;background:#fdf0f0;border:1px solid #f5c5c5;display:grid;place-items:center;font-size:22px}
h1{font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:2px}
.page-subtitle{color:var(--muted);font-size:.86rem}
.section{margin-bottom:28px}
.section-label{font-size:.68rem;font-weight:500;letter-spacing:.12em;text-transform:uppercase;color:var(--green);margin-bottom:14px;display:flex;align-items:center;gap:10px}
.section-label::after{content:'';flex:1;height:1px;background:var(--border)}
.setting-row{display:flex;align-items:center;justify-content:space-between;background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:16px 20px;margin-bottom:8px}
.setting-info h3{font-size:.92rem;font-weight:500;margin-bottom:2px}
.setting-info p{font-size:.8rem;color:var(--muted)}
.toggle{position:relative;width:42px;height:23px;flex-shrink:0}
.toggle input{opacity:0;width:0;height:0}
.slider{position:absolute;inset:0;background:#ddd;border-radius:999px;cursor:pointer;transition:background .2s}
.slider::before{content:'';position:absolute;width:17px;height:17px;left:3px;top:3px;background:#fff;border-radius:50%;transition:transform .2s;box-shadow:0 1px 3px rgba(0,0,0,.2)}
.toggle input:checked + .slider{background:var(--green)}
.toggle input:checked + .slider::before{transform:translateX(19px)}
</style></head>
<body>
<nav><div class="nav-logo">EduPortal</div><a class="back-btn" href="dashboard.php">← Dashboard</a></nav>
<main>
<div class="page-header"><div class="page-header-icon">⚙️</div><div><h1>System Settings</h1><p class="page-subtitle">Administrator Panel</p></div></div>
<div class="section">
<div class="section-label">Security</div>
<div class="setting-row"><div class="setting-info"><h3>OTP Verification</h3><p>Require OTP for every login attempt</p></div><label class="toggle"><input type="checkbox" checked><span class="slider"></span></label></div>
<div class="setting-row"><div class="setting-info"><h3>Strong Password Policy</h3><p>Enforce uppercase, number, and special character requirements</p></div><label class="toggle"><input type="checkbox" checked><span class="slider"></span></label></div>
<div class="setting-row"><div class="setting-info"><h3>Data Encryption</h3><p>Encrypt sensitive user fields (email, phone, civil status)</p></div><label class="toggle"><input type="checkbox" checked><span class="slider"></span></label></div>
</div>
<div class="section">
<div class="section-label">Access Control</div>
<div class="setting-row"><div class="setting-info"><h3>Student Registration</h3><p>Allow new student accounts to be created</p></div><label class="toggle"><input type="checkbox" checked><span class="slider"></span></label></div>
<div class="setting-row"><div class="setting-info"><h3>Maintenance Mode</h3><p>Lock the portal to all non-admin users</p></div><label class="toggle"><input type="checkbox"><span class="slider"></span></label></div>
</div>
</main></body></html>
