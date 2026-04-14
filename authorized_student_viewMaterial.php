<?php session_start(); if(!isset($_SESSION['username'])||$_SESSION['role']!=='student'){header("Location: login.php");exit;} ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Materials — EduPortal</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f5f0e8;--surface:#fff;--border:#e2ddd4;--green:#2d5a27;--text:#1a1a1a;--muted:#6b6560}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
nav{display:flex;align-items:center;justify-content:space-between;padding:16px 40px;background:var(--surface);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--green)}
.back-btn{display:inline-flex;align-items:center;gap:7px;padding:7px 15px;border:1px solid var(--border);border-radius:7px;color:var(--muted);text-decoration:none;font-size:.82rem;transition:border-color .18s,color .18s}
.back-btn:hover{border-color:#aaa;color:var(--text)}
main{max-width:860px;margin:0 auto;padding:52px 24px;animation:rise .45s ease both}
@keyframes rise{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.page-header{display:flex;align-items:center;gap:16px;margin-bottom:28px;padding-bottom:24px;border-bottom:1px solid var(--border)}
.page-header-icon{width:52px;height:52px;border-radius:12px;background:#edf4ec;border:1px solid #c5dcbf;display:grid;place-items:center;font-size:22px}
h1{font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:2px}
.page-subtitle{color:var(--muted);font-size:.86rem}
.search-bar{width:100%;background:var(--surface);border:1px solid var(--border);border-radius:8px;padding:11px 14px;color:var(--text);font-family:'Inter',sans-serif;font-size:.92rem;outline:none;margin-bottom:20px;transition:border-color .18s}
.search-bar:focus{border-color:var(--green)}
.search-bar::placeholder{color:#b0a89e}
.materials{display:grid;gap:10px}
.material-card{display:flex;align-items:center;gap:14px;background:var(--surface);border:1px solid var(--border);border-radius:10px;padding:16px 20px;transition:border-color .18s,transform .15s}
.material-card:hover{border-color:var(--green);transform:translateX(3px)}
.mat-icon{width:42px;height:42px;border-radius:8px;display:grid;place-items:center;font-size:18px;flex-shrink:0}
.pdf{background:#fdf0f0}.ppt{background:#fffbf0}.doc{background:#eef3fb}
.mat-info{flex:1}
.mat-title{font-size:.92rem;font-weight:500;margin-bottom:2px}
.mat-meta{font-size:.76rem;color:var(--muted)}
.dl-btn{padding:5px 12px;border:1px solid var(--border);border-radius:6px;color:var(--muted);text-decoration:none;font-size:.76rem;transition:border-color .18s,color .18s;white-space:nowrap}
.dl-btn:hover{border-color:var(--green);color:var(--green)}
</style></head>
<body>
<nav><div class="nav-logo">EduPortal</div><a class="back-btn" href="dashboard.php">← Dashboard</a></nav>
<main>
<div class="page-header"><div class="page-header-icon">📖</div><div><h1>Course Materials</h1><p class="page-subtitle">Student Panel</p></div></div>
<input class="search-bar" type="text" placeholder="Search materials…">
<div class="materials">
<div class="material-card"><div class="mat-icon pdf">📄</div><div class="mat-info"><div class="mat-title">Week 1 – Introduction to Programming</div><div class="mat-meta">CS101 · PDF · Apr 5, 2026</div></div><a class="dl-btn" href="#">↓ Download</a></div>
<div class="material-card"><div class="mat-icon ppt">📊</div><div class="mat-info"><div class="mat-title">Week 2 – Variables & Data Types</div><div class="mat-meta">CS101 · PPTX · Apr 8, 2026</div></div><a class="dl-btn" href="#">↓ Download</a></div>
<div class="material-card"><div class="mat-icon doc">📝</div><div class="mat-info"><div class="mat-title">Week 3 – Algorithms & Flowcharts</div><div class="mat-meta">CS101 · DOCX · Apr 11, 2026</div></div><a class="dl-btn" href="#">↓ Download</a></div>
<div class="material-card"><div class="mat-icon pdf">📄</div><div class="mat-info"><div class="mat-title">Lab Manual – Exercises 1–5</div><div class="mat-meta">CS101 · PDF · Apr 12, 2026</div></div><a class="dl-btn" href="#">↓ Download</a></div>
</div>
</main></body></html>
