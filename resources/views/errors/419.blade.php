<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Session Expired | KUIT LIMITED</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700,900&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #030712;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }
        .card {
            max-width: 500px;
            width: 100%;
            background: linear-gradient(180deg, #0f172a 0%, #030712 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            padding: 2.5rem 2rem;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }
        .icon-wrap {
            width: 4rem;
            height: 4rem;
            margin: 0 auto 1.5rem;
            border-radius: 1rem;
            background: rgba(245, 168, 0, 0.12);
            border: 1px solid rgba(245, 168, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #F5A800;
        }
        .badge {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #F5A800;
            background: rgba(245, 168, 0, 0.1);
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            margin-bottom: 1rem;
        }
        h1 {
            font-size: 1.75rem;
            font-weight: 900;
            line-height: 1.25;
            margin-bottom: 0.75rem;
            color: #ffffff;
        }
        p {
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }
        .btn-gold {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            background: #F5A800;
            color: #030712;
            font-weight: 800;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.9rem 1.5rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .btn-gold:hover {
            background: #e09800;
            transform: translateY(-1px);
        }
        .link-secondary {
            display: inline-block;
            margin-top: 1.25rem;
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }
        .link-secondary:hover {
            color: #cbd5e1;
            text-decoration: underline;
        }
        .footer-note {
            margin-top: 2rem;
            padding-top: 1.25rem;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            font-size: 0.75rem;
            color: #475569;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon-wrap">
            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
        </div>

        <span class="badge">Security Protection</span>
        <h1>Security Session Expired</h1>
        <p>Your session timed out to safeguard your account and pending data. Simply refresh to obtain a fresh security token and continue seamlessly.</p>

        <button onclick="window.location.reload();" class="btn-gold">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            <span>Refresh Page &amp; Continue</span>
        </button>

        <a href="/" class="link-secondary">Return to KUIT LIMITED Homepage</a>

        <div class="footer-note">
            KUIT LIMITED • RC 806865 • Operational Base: Effurun-Warri, Delta State
        </div>
    </div>
</body>
</html>

