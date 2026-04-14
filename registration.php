<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — EduPortal</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root { --bg:#f5f0e8; --surface:#ffffff; --border:#e2ddd4; --green:#2d5a27; --green-lt:#3d7a35; --text:#1a1a1a; --muted:#6b6560; }
        body { font-family:'Inter',sans-serif; background:var(--bg); min-height:100vh; display:flex; align-items:flex-start; justify-content:center; padding:40px 24px; }
        .card { background:var(--surface); border:1px solid var(--border); border-radius:18px; padding:52px 52px; width:100%; max-width:640px; box-shadow:0 8px 40px rgba(45,90,39,.09), 0 1px 3px rgba(0,0,0,.05); animation:rise .5s cubic-bezier(.22,1,.36,1) both; }
        @keyframes rise { from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)} }
        .logo-mark { display:flex; align-items:center; gap:10px; margin-bottom:36px; }
        .logo-icon { width:38px; height:38px; background:var(--green); border-radius:9px; display:grid; place-items:center; font-size:18px; }
        .logo-name { font-family:'Cormorant Garamond',serif; font-size:1.4rem; color:var(--green); }
        h1 { font-family:'Cormorant Garamond',serif; font-size:1.9rem; color:var(--text); margin-bottom:5px; }
        .subtitle { color:var(--muted); font-size:.88rem; margin-bottom:36px; }
        .section-label { font-size:.68rem; font-weight:500; letter-spacing:.12em; text-transform:uppercase; color:var(--green); margin:28px 0 16px; display:flex; align-items:center; gap:10px; }
        .section-label::after { content:''; flex:1; height:1px; background:var(--border); }
        .grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
        .field { margin-bottom:4px; }
        .field.full { grid-column:1/-1; }
        .field label { display:block; font-size:.72rem; font-weight:500; letter-spacing:.09em; text-transform:uppercase; color:var(--muted); margin-bottom:7px; }
        .field input, .field select { width:100%; background:#faf9f7; border:1px solid var(--border); border-radius:8px; padding:12px 15px; color:var(--text); font-family:'Inter',sans-serif; font-size:.93rem; outline:none; transition:border-color .18s, box-shadow .18s; appearance:none; }
        .field input:focus, .field select:focus { border-color:var(--green); box-shadow:0 0 0 3px rgba(45,90,39,.10); background:#fff; }
        .field input::placeholder { color:#b0a89e; }
        .hint { font-size:.73rem; color:var(--muted); margin-top:8px; line-height:1.5; }
        .btn { display:block; width:100%; padding:13px; margin-top:28px; background:var(--green); color:#fff; font-family:'Inter',sans-serif; font-size:.92rem; font-weight:500; border:none; border-radius:8px; cursor:pointer; letter-spacing:.04em; transition:background .18s, transform .12s; }
        .btn:hover { background:var(--green-lt); transform:translateY(-1px); }
        .login-link { text-align:center; margin-top:20px; font-size:.85rem; color:var(--muted); }
        .login-link a { color:var(--green); text-decoration:none; font-weight:500; }
        .login-link a:hover { text-decoration:underline; }
        @media(max-width:560px){ .card{padding:36px 28px;} .grid-2{grid-template-columns:1fr;} }
    </style>
</head>
<body>
<div class="card">
    <div class="logo-mark"><div class="logo-icon">🎓</div><div class="logo-name">EduPortal</div></div>
    <h1>Create an account</h1>
    <p class="subtitle">Fill in the details below to get started</p>

    <form action="process_registration.php" method="post">
        <div class="section-label">Personal Information</div>
        <div class="grid-2">
            <div class="field full">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Firstname M.I. Lastname" required>
            </div>
            <div class="field">
                <label for="civilstatus">Civil Status</label>
                <select id="civilstatus" name="civilstatus" required>
                    <option value="" disabled selected>Select…</option>
                    <option>Single</option><option>Married</option><option>Widowed</option><option>Separated</option>
                </select>
            </div>
            <div class="field">
                <label for="phonenumber">Phone Number</label>
                <input type="text" id="phonenumber" name="phonenumber" placeholder="+63 9XX XXX XXXX" required>
            </div>
        </div>

        <div class="section-label">Account Details</div>
        <div class="grid-2">
            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Choose a username" required>
            </div>
            <div class="field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required>
            </div>
            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>
            <div class="field">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="••••••••" required>
            </div>
        </div>
        <p class="hint">Password must be at least 8 characters and include uppercase, lowercase, number, and special character.</p>

        <button class="btn" type="submit">Create Account →</button>
    </form>
    <p class="login-link">Already have an account? <a href="login.php">Sign in</a></p>
</div>
</body>
</html>
