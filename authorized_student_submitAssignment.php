<?php session_start(); if(!isset($_SESSION['username'])||$_SESSION['role']!=='student'){header("Location: login.php");exit;} ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Submit Assignment — EduPortal</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f5f0e8;--surface:#fff;--border:#e2ddd4;--green:#2d5a27;--green-lt:#3d7a35;--text:#1a1a1a;--muted:#6b6560}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
nav{display:flex;align-items:center;justify-content:space-between;padding:16px 40px;background:var(--surface);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--green)}
.back-btn{display:inline-flex;align-items:center;gap:7px;padding:7px 15px;border:1px solid var(--border);border-radius:7px;color:var(--muted);text-decoration:none;font-size:.82rem;transition:border-color .18s,color .18s}
.back-btn:hover{border-color:#aaa;color:var(--text)}
main{max-width:720px;margin:0 auto;padding:52px 24px;animation:rise .45s ease both}
@keyframes rise{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.page-header{display:flex;align-items:center;gap:16px;margin-bottom:28px;padding-bottom:24px;border-bottom:1px solid var(--border)}
.page-header-icon{width:52px;height:52px;border-radius:12px;background:#edf4ec;border:1px solid #c5dcbf;display:grid;place-items:center;font-size:22px}
h1{font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:2px}
.page-subtitle{color:var(--muted);font-size:.86rem}
.deadline-card{background:#fffbf0;border:1px solid #f0dfa0;border-radius:8px;padding:12px 18px;margin-bottom:24px;display:flex;align-items:center;gap:8px;font-size:.84rem;color:#7a5c00}
.field{margin-bottom:16px}
.field label{display:block;font-size:.72rem;font-weight:500;letter-spacing:.09em;text-transform:uppercase;color:var(--muted);margin-bottom:7px}
.field input,.field select,.field textarea{width:100%;background:#faf9f7;border:1px solid var(--border);border-radius:8px;padding:11px 14px;color:var(--text);font-family:'Inter',sans-serif;font-size:.92rem;outline:none;transition:border-color .18s;appearance:none;resize:vertical}
.field input:focus,.field select:focus,.field textarea:focus{border-color:var(--green)}
.field input::placeholder,.field textarea::placeholder{color:#b0a89e}
.upload-zone{border:2px dashed var(--border);border-radius:10px;padding:36px;text-align:center;cursor:pointer;transition:border-color .18s,background .18s;margin-bottom:24px;background:var(--surface)}
.upload-zone:hover{border-color:var(--green);background:#edf4ec}
.upload-zone input{display:none}
.btn{display:block;width:100%;padding:13px;background:var(--green);color:#fff;font-family:'Inter',sans-serif;font-size:.92rem;font-weight:500;border:none;border-radius:8px;cursor:pointer;transition:background .18s,transform .12s}
.btn:hover{background:var(--green-lt);transform:translateY(-1px)}
</style></head>
<body>
<nav><div class="nav-logo">EduPortal</div><a class="back-btn" href="dashboard.php">← Dashboard</a></nav>
<main>
<div class="page-header"><div class="page-header-icon">✏️</div><div><h1>Submit Assignment</h1><p class="page-subtitle">Student Panel</p></div></div>
<div class="deadline-card">⏰ Deadline: <strong>April 20, 2026 – 11:59 PM</strong></div>
<div class="field"><label>Subject</label><select><option>CS101 – Intro to Programming</option><option>CS201 – Data Structures</option></select></div>
<div class="field"><label>Assignment Title</label><input type="text" placeholder="e.g. Lab Exercise 3 – Loops"></div>
<div class="field"><label>Notes / Comments</label><textarea rows="4" placeholder="Optional notes for your instructor…"></textarea></div>
<div class="upload-zone" onclick="document.getElementById('asgFile').click()">
<div style="font-size:2rem;margin-bottom:8px">📎</div>
<p style="color:var(--muted);font-size:.84rem">Click to attach your submission file</p>
<input type="file" id="asgFile">
</div>
<button class="btn">Submit Assignment →</button>
</main></body></html>
