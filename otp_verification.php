<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification — EduPortal</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root { --bg:#f5f0e8; --surface:#fff; --border:#e2ddd4; --green:#2d5a27; --green-lt:#3d7a35; --text:#1a1a1a; --muted:#6b6560; }
        body { font-family:'Inter',sans-serif; background:var(--bg); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:24px; }
        .card { background:var(--surface); border:1px solid var(--border); border-radius:18px; padding:56px 52px; width:100%; max-width:440px; text-align:center; box-shadow:0 8px 40px rgba(45,90,39,.09); animation:rise .5s cubic-bezier(.22,1,.36,1) both; }
        @keyframes rise { from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)} }
        .otp-icon { width:68px; height:68px; background:#edf4ec; border:1px solid #c5dcbf; border-radius:50%; display:grid; place-items:center; font-size:28px; margin:0 auto 28px; }
        h1 { font-family:'Cormorant Garamond',serif; font-size:1.9rem; color:var(--text); margin-bottom:10px; }
        .subtitle { color:var(--muted); font-size:.88rem; line-height:1.6; margin-bottom:38px; }
        .otp-inputs { display:flex; gap:10px; justify-content:center; margin-bottom:32px; }
        .otp-inputs input { width:52px; height:60px; text-align:center; font-size:1.5rem; font-weight:600; font-family:'Inter',sans-serif; background:#faf9f7; border:1.5px solid var(--border); border-radius:10px; color:var(--text); outline:none; transition:border-color .18s, box-shadow .18s; }
        .otp-inputs input:focus { border-color:var(--green); box-shadow:0 0 0 3px rgba(45,90,39,.10); background:#fff; }
        #otp-hidden { display:none; }
        .btn { display:block; width:100%; padding:13px; background:var(--green); color:#fff; font-family:'Inter',sans-serif; font-size:.92rem; font-weight:500; border:none; border-radius:8px; cursor:pointer; letter-spacing:.04em; transition:background .18s, transform .12s; }
        .btn:hover { background:var(--green-lt); transform:translateY(-1px); }
        .timer { margin-top:22px; font-size:.83rem; color:var(--muted); }
        .timer span { color:var(--green); font-weight:500; }
        .back-link { display:inline-block; margin-top:18px; font-size:.83rem; color:var(--muted); text-decoration:none; }
        .back-link:hover { color:var(--text); }
    </style>
</head>
<body>
<div class="card">
    <div class="otp-icon">✉️</div>
    <h1>Check your email</h1>
    <p class="subtitle">We sent a 6-digit verification code to your registered email. Enter it below to continue.</p>

    <form action="otp_verification_process.php" method="post" id="otp-form">
        <div class="otp-inputs" id="otp-boxes">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
        </div>
        <input type="hidden" name="otp" id="otp-hidden">
        <button class="btn" type="submit">Verify & Continue →</button>
    </form>

    <p class="timer">Code expires in <span id="countdown">05:00</span></p>
    <a class="back-link" href="login.php">← Back to login</a>
</div>
<script>
    const boxes = document.querySelectorAll('#otp-boxes input');
    boxes.forEach((box, i) => {
        box.addEventListener('input', () => { if(box.value && i < boxes.length-1) boxes[i+1].focus(); if(box.value.length>1) box.value=box.value.slice(-1); });
        box.addEventListener('keydown', e => { if(e.key==='Backspace' && !box.value && i>0) boxes[i-1].focus(); });
        box.addEventListener('paste', e => { e.preventDefault(); const d=e.clipboardData.getData('text').replace(/\D/g,'').slice(0,6); boxes.forEach((b,j)=>b.value=d[j]||''); boxes[Math.min(d.length,5)].focus(); });
    });
    document.getElementById('otp-form').addEventListener('submit',()=>{ document.getElementById('otp-hidden').value=[...boxes].map(b=>b.value).join(''); });
    let secs=300; const cd=document.getElementById('countdown');
    const tick=setInterval(()=>{ secs--; if(secs<=0){clearInterval(tick);cd.textContent='Expired';cd.style.color='#c0392b';return;} cd.textContent=`${String(Math.floor(secs/60)).padStart(2,'0')}:${String(secs%60).padStart(2,'0')}`; },1000);
</script>
</body>
</html>
