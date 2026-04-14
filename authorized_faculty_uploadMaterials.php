<?php session_start(); if(!isset($_SESSION['username'])||$_SESSION['role']!=='faculty'){header("Location: login.php");exit;} ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Materials — EduPortal</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f5f0e8;--surface:#fff;--border:#e2ddd4;--green:#2d5a27;--green-lt:#3d7a35;--text:#1a1a1a;--muted:#6b6560;--accent:#1a4d8f}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
nav{display:flex;align-items:center;justify-content:space-between;padding:16px 40px;background:var(--surface);border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100}
.nav-logo{font-family:'Cormorant Garamond',serif;font-size:1.3rem;color:var(--green)}
.back-btn{display:inline-flex;align-items:center;gap:7px;padding:7px 15px;border:1px solid var(--border);border-radius:7px;color:var(--muted);text-decoration:none;font-size:.82rem;transition:border-color .18s,color .18s}
.back-btn:hover{border-color:#aaa;color:var(--text)}
main{max-width:720px;margin:0 auto;padding:52px 24px;animation:rise .45s ease both}
@keyframes rise{from{opacity:0;transform:translateY(14px)}to{opacity:1;transform:translateY(0)}}
.page-header{display:flex;align-items:center;gap:16px;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--border)}
.page-header-icon{width:52px;height:52px;border-radius:12px;background:#eef3fb;border:1px solid #c2d5f5;display:grid;place-items:center;font-size:22px}
h1{font-family:'Cormorant Garamond',serif;font-size:1.75rem;margin-bottom:2px}
.page-subtitle{color:var(--muted);font-size:.86rem}
.upload-zone{border:2px dashed var(--border);border-radius:12px;padding:52px 40px;text-align:center;cursor:pointer;transition:border-color .18s,background .18s;margin-bottom:24px;background:var(--surface)}
.upload-zone:hover,.upload-zone.drag-over{border-color:var(--accent);background:#eef3fb}
.upload-zone input{display:none}
.upload-zone h3{font-family:'Cormorant Garamond',serif;font-size:1.2rem;margin:12px 0 6px}
.upload-zone p{color:var(--muted);font-size:.82rem}
.field{margin-bottom:16px}
.field label{display:block;font-size:.72rem;font-weight:500;letter-spacing:.09em;text-transform:uppercase;color:var(--muted);margin-bottom:7px}
.field input,.field select{width:100%;background:#faf9f7;border:1px solid var(--border);border-radius:8px;padding:11px 14px;color:var(--text);font-family:'Inter',sans-serif;font-size:.92rem;outline:none;transition:border-color .18s;appearance:none}
.field input:focus,.field select:focus{border-color:var(--accent)}
.btn{display:block;width:100%;padding:13px;background:var(--accent);color:#fff;font-family:'Inter',sans-serif;font-size:.92rem;font-weight:500;border:none;border-radius:8px;cursor:pointer;transition:opacity .18s,transform .12s}
.btn:hover{opacity:.88;transform:translateY(-1px)}
</style></head>
<body>
<nav><div class="nav-logo">EduPortal</div><a class="back-btn" href="dashboard.php">← Dashboard</a></nav>
<main>
<div class="page-header"><div class="page-header-icon">📤</div><div><h1>Upload Materials</h1><p class="page-subtitle">Faculty Panel</p></div></div>
<div class="upload-zone" id="dropZone" onclick="document.getElementById('fileInput').click()">
<div style="font-size:2.2rem">📁</div>
<h3>Drop files here or click to browse</h3>
<p>Supports PDF, DOCX, PPTX, images — max 50 MB</p>
<input type="file" id="fileInput" multiple accept=".pdf,.doc,.docx,.pptx,.png,.jpg">
</div>
<div class="field"><label>Material Title</label><input type="text" placeholder="e.g. Week 3 – Algorithms & Flowcharts"></div>
<div class="field"><label>Subject</label><select><option>CS101 – Intro to Programming</option><option>CS201 – Data Structures</option><option>CS301 – Algorithms</option></select></div>
<button class="btn">Upload Material →</button>
</main>
<script>
const zone=document.getElementById('dropZone');
zone.addEventListener('dragover',e=>{e.preventDefault();zone.classList.add('drag-over')});
zone.addEventListener('dragleave',()=>zone.classList.remove('drag-over'));
zone.addEventListener('drop',e=>{e.preventDefault();zone.classList.remove('drag-over');zone.querySelector('h3').textContent=`${e.dataTransfer.files.length} file(s) ready`});
document.getElementById('fileInput').addEventListener('change',e=>{zone.querySelector('h3').textContent=`${e.target.files.length} file(s) selected`});
</script>
</body></html>
