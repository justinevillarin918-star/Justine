<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — EduPortal</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --bg: #f5f0e8;
            --surface: #ffffff;
            --border: #e2ddd4;
            --green: #2d5a27;
            --green-lt: #3d7a35;
            --text: #1a1a1a;
            --muted: #6b6560;
            --radius: 12px;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            background-image: radial-gradient(circle at 20% 20%, rgba(45,90,39,.06) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(45,90,39,.04) 0%, transparent 50%);
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            padding: 24px;
        }
        .wrapper {
            display: grid; grid-template-columns: 1fr 1fr;
            max-width: 860px; width: 100%;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 18px; overflow: hidden;
            box-shadow: 0 8px 40px rgba(45,90,39,.10), 0 1px 3px rgba(0,0,0,.06);
            animation: rise .5s cubic-bezier(.22,1,.36,1) both;
        }
        @keyframes rise { from { opacity:0; transform: translateY(20px); } to { opacity:1; transform: translateY(0); } }
        .panel-left {
            background: var(--green); padding: 56px 48px;
            display: flex; flex-direction: column; justify-content: space-between;
            position: relative; overflow: hidden;
        }
        .panel-left::before { content: ''; position: absolute; width: 260px; height: 260px; border-radius: 50%; border: 40px solid rgba(255,255,255,.07); bottom: -80px; right: -80px; }
        .panel-left::after  { content: ''; position: absolute; width: 140px; height: 140px; border-radius: 50%; border: 24px solid rgba(255,255,255,.05); top: 60px; right: 30px; }
        .logo-mark { display: flex; align-items: center; gap: 10px; }
        .logo-icon { width: 38px; height: 38px; background: rgba(255,255,255,.18); border-radius: 9px; display: grid; place-items: center; font-size: 18px; }
        .logo-name { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: #fff; }
        .panel-tagline { position: relative; z-index: 1; }
        .panel-tagline h2 { font-family: 'Cormorant Garamond', serif; font-size: 2.4rem; color: #fff; line-height: 1.15; margin-bottom: 14px; }
        .panel-tagline p { color: rgba(255,255,255,.65); font-size: .88rem; line-height: 1.65; }
        .features { display: flex; flex-direction: column; gap: 10px; position: relative; z-index: 1; }
        .feature-item { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,.8); font-size: .82rem; }
        .feature-dot { width: 6px; height: 6px; border-radius: 50%; background: rgba(255,255,255,.5); flex-shrink: 0; }
        .panel-right { padding: 56px 48px; }
        h1 { font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: var(--text); margin-bottom: 6px; }
        .subtitle { color: var(--muted); font-size: .88rem; margin-bottom: 36px; }
        .field { margin-bottom: 18px; }
        .field label { display: block; font-size: .72rem; font-weight: 500; letter-spacing: .09em; text-transform: uppercase; color: var(--muted); margin-bottom: 7px; }
        .field input { width: 100%; background: #faf9f7; border: 1px solid var(--border); border-radius: 8px; padding: 12px 15px; color: var(--text); font-family: 'Inter', sans-serif; font-size: .95rem; outline: none; transition: border-color .18s, box-shadow .18s; }
        .field input:focus { border-color: var(--green); box-shadow: 0 0 0 3px rgba(45,90,39,.10); background: #fff; }
        .field input::placeholder { color: #b0a89e; }
        .btn { display: block; width: 100%; padding: 13px; margin-top: 28px; background: var(--green); color: #fff; font-family: 'Inter', sans-serif; font-size: .92rem; font-weight: 500; border: none; border-radius: 8px; cursor: pointer; letter-spacing: .04em; transition: background .18s, transform .12s; }
        .btn:hover { background: var(--green-lt); transform: translateY(-1px); }
        .btn:active { transform: translateY(0); }
        .register-link { text-align: center; margin-top: 24px; font-size: .85rem; color: var(--muted); }
        .register-link a { color: var(--green); text-decoration: none; font-weight: 500; }
        .register-link a:hover { text-decoration: underline; }
        @media (max-width: 620px) { .wrapper { grid-template-columns: 1fr; } .panel-left { padding: 36px 32px; } .panel-right { padding: 36px 32px; } }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="panel-left">
        <div class="logo-mark"><div class="logo-icon">🎓</div><div class="logo-name">EduPortal</div></div>
        <div class="panel-tagline">
            <h2>Your learning journey starts here</h2>
            <p>A secure, role-based portal for students, faculty, and administrators.</p>
        </div>
        <div class="features">
            <div class="feature-item"><div class="feature-dot"></div>OTP-secured login</div>
            <div class="feature-item"><div class="feature-dot"></div>Role-based access control</div>
            <div class="feature-item"><div class="feature-dot"></div>Encrypted personal data</div>
        </div>
    </div>
    <div class="panel-right">
        <h1>Sign in</h1>
        <p class="subtitle">Enter your credentials to continue</p>
        <form action="process_login.php" method="post">
            <div class="field"><label for="username">Username</label><input type="text" id="username" name="username" placeholder="Your username" required></div>
            <div class="field"><label for="password">Password</label><input type="password" id="password" name="password" placeholder="••••••••" required></div>
            <button class="btn" type="submit">Sign In →</button>
        </form>
        <p class="register-link">New here? <a href="registration.php">Create an account</a></p>
    </div>
</div>
</body>
</html>
