<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Certificate of Completion — {{ $name }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    *, *::before, *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --gold-light:  #e8c96a;
        --gold-mid:    #c9a84c;
        --gold-dark:   #8a6010;
        --gold-deep:   #5a3e08;
        --ink:         #1a0e00;
        --ink-soft:    #3a2800;
        --ink-muted:   #7a5c20;
        --parchment:   #fdfaf2;
        --parchment-2: #f8f3e4;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(18px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes shimmer {
        0%   { background-position: -400px 0; }
        100% { background-position: 400px 0; }
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #1c1510;
        background-image:
            radial-gradient(ellipse at 20% 50%, rgba(138, 96, 16, 0.15) 0%, transparent 60%),
            radial-gradient(ellipse at 80% 50%, rgba(138, 96, 16, 0.12) 0%, transparent 60%);
        padding: 40px 20px;
        font-family: 'Raleway', sans-serif;
    }

    /* ── Outer frame ── */
    .cert-shell {
        position: relative;
        width: 860px;
        max-width: 100%;
        animation: fadeIn 0.9s ease both;
    }

    /* thick gold border */
    .cert-shell::before {
        content: '';
        position: absolute;
        inset: -4px;
        background: linear-gradient(135deg, var(--gold-light), var(--gold-deep), var(--gold-mid), var(--gold-deep), var(--gold-light));
        border-radius: 20px;
        z-index: -1;
    }

    .certificate {
        background: var(--parchment);
        border-radius: 16px;
        padding: 60px 70px 52px;
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    /* subtle parchment texture via repeating pattern */
    .certificate::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            repeating-linear-gradient(
                0deg,
                transparent,
                transparent 28px,
                rgba(180, 140, 40, 0.04) 28px,
                rgba(180, 140, 40, 0.04) 29px
            );
        pointer-events: none;
        border-radius: 16px;
    }

    /* Inner border */
    .inner-border {
        position: absolute;
        inset: 14px;
        border: 0.8px solid rgba(201, 168, 76, 0.45);
        border-radius: 10px;
        pointer-events: none;
    }

    /* ── Corner ornaments ── */
    .corner {
        position: absolute;
        width: 64px;
        height: 64px;
    }
    .corner.tl { top: 6px;  left: 6px; }
    .corner.tr { top: 6px;  right: 6px;  transform: scaleX(-1); }
    .corner.bl { bottom: 6px; left: 6px;  transform: scaleY(-1); }
    .corner.br { bottom: 6px; right: 6px;  transform: scale(-1); }

    /* ── Top / bottom accent bars ── */
    .bar {
        position: absolute;
        left: 0; right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--gold-deep), var(--gold-light), var(--gold-mid), var(--gold-light), var(--gold-deep));
    }
    .bar.top    { top: 0;    border-radius: 16px 16px 0 0; }
    .bar.bottom { bottom: 0; border-radius: 0 0 16px 16px; }

    /* ── Platform badge ── */
    .platform-badge {
        position: absolute;
        top: 28px;
        right: 30px;
        display: flex;
        align-items: center;
        gap: 6px;
        background: var(--ink);
        color: var(--gold-light);
        padding: 6px 14px 6px 10px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        border: 0.5px solid var(--gold-deep);
    }
    .platform-badge::before {
        content: '';
        display: block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--gold-mid);
    }

    /* ── Content ── */
    .cert-logo {
        margin-bottom: 6px;
        animation: fadeIn 0.8s 0.1s ease both;
    }

    .platform-name {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 5px;
        color: var(--gold-dark);
        text-transform: uppercase;
        margin-bottom: 6px;
        animation: fadeIn 0.8s 0.2s ease both;
    }

    .divider {
        width: 220px;
        height: 0.8px;
        background: linear-gradient(90deg, transparent, var(--gold-mid), transparent);
        margin: 0 auto 6px;
    }

    .presents {
        font-size: 10px;
        letter-spacing: 3px;
        color: var(--gold-dark);
        text-transform: uppercase;
        font-weight: 400;
        margin-bottom: 14px;
        animation: fadeIn 0.8s 0.3s ease both;
    }

    .cert-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 46px;
        font-weight: 700;
        color: var(--ink);
        letter-spacing: 2px;
        line-height: 1;
        margin-bottom: 6px;
        animation: fadeIn 0.8s 0.35s ease both;
    }

    .cert-subtitle {
        font-size: 10px;
        letter-spacing: 4px;
        color: var(--ink-muted);
        text-transform: uppercase;
        font-weight: 500;
        margin-bottom: 28px;
        animation: fadeIn 0.8s 0.4s ease both;
    }

    .awarded-label {
        font-size: 10px;
        letter-spacing: 2.5px;
        color: var(--gold-dark);
        text-transform: uppercase;
        margin-bottom: 8px;
        animation: fadeIn 0.8s 0.45s ease both;
    }

    .recipient-name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 40px;
        font-weight: 600;
        color: var(--ink);
        letter-spacing: 1px;
        display: inline-block;
        padding-bottom: 10px;
        position: relative;
        animation: fadeIn 0.9s 0.5s ease both;
    }

    .recipient-name::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 10%;
        width: 80%;
        height: 0.8px;
        background: linear-gradient(90deg, transparent, var(--gold-mid), transparent);
    }

    .body-text {
        font-size: 13px;
        color: var(--ink-soft);
        line-height: 1.9;
        max-width: 520px;
        margin: 20px auto 4px;
        font-weight: 400;
        animation: fadeIn 0.8s 0.55s ease both;
    }

    .course-name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 19px;
        font-weight: 600;
        color: var(--gold-dark);
        margin-bottom: 8px;
        animation: fadeIn 0.8s 0.6s ease both;
    }

    /* ── Footer row ── */
    .cert-footer {
        margin-top: 44px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        animation: fadeIn 0.8s 0.65s ease both;
    }

    .sig-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        min-width: 130px;
    }

    .sig-name {
        font-family: 'Cormorant Garamond', serif;
        font-style: italic;
        font-size: 17px;
        color: var(--ink-soft);
    }

    .sig-line {
        width: 120px;
        height: 0.8px;
        background: var(--gold-mid);
    }

    .sig-label {
        font-size: 9px;
        letter-spacing: 1.8px;
        color: var(--ink-muted);
        text-transform: uppercase;
    }

    /* Seal */
    .seal-wrap { position: relative; }

    /* Date block */
    .date-block {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        min-width: 130px;
    }

    .date-val {
        font-size: 12px;
        font-weight: 500;
        color: var(--ink-soft);
    }

    /* ── Print ── */
    @media print {
        body { background: white; padding: 0; }
        .cert-shell::before { display: none; }
        .certificate { box-shadow: none; }
        @page { size: A4 landscape; margin: 0; }
    }
</style>
</head>

<body>

<div class="cert-shell">
    <div class="certificate">

        <!-- Accent bars -->
        <div class="bar top"></div>
        <div class="bar bottom"></div>

        <!-- Inner border -->
        <div class="inner-border"></div>

        <!-- Corner ornaments -->
        <svg class="corner tl" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 4 L26 4 L4 26 Z" fill="#c9a84c" opacity="0.18"/>
            <line x1="4" y1="4" x2="22" y2="4" stroke="#c9a84c" stroke-width="1.5"/>
            <line x1="4" y1="4" x2="4" y2="22" stroke="#c9a84c" stroke-width="1.5"/>
            <circle cx="4" cy="4" r="3.5" fill="#c9a84c"/>
            <path d="M12 4 Q22 12 22 22 Q12 22 4 12" stroke="#e8c96a" stroke-width="0.7" fill="none"/>
            <circle cx="26" cy="4"  r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="4"  cy="26" r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="14" cy="14" r="1.5" fill="#e8c96a" opacity="0.4"/>
        </svg>
        <svg class="corner tr" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 4 L26 4 L4 26 Z" fill="#c9a84c" opacity="0.18"/>
            <line x1="4" y1="4" x2="22" y2="4" stroke="#c9a84c" stroke-width="1.5"/>
            <line x1="4" y1="4" x2="4" y2="22" stroke="#c9a84c" stroke-width="1.5"/>
            <circle cx="4" cy="4" r="3.5" fill="#c9a84c"/>
            <path d="M12 4 Q22 12 22 22 Q12 22 4 12" stroke="#e8c96a" stroke-width="0.7" fill="none"/>
            <circle cx="26" cy="4"  r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="4"  cy="26" r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="14" cy="14" r="1.5" fill="#e8c96a" opacity="0.4"/>
        </svg>
        <svg class="corner bl" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 4 L26 4 L4 26 Z" fill="#c9a84c" opacity="0.18"/>
            <line x1="4" y1="4" x2="22" y2="4" stroke="#c9a84c" stroke-width="1.5"/>
            <line x1="4" y1="4" x2="4" y2="22" stroke="#c9a84c" stroke-width="1.5"/>
            <circle cx="4" cy="4" r="3.5" fill="#c9a84c"/>
            <path d="M12 4 Q22 12 22 22 Q12 22 4 12" stroke="#e8c96a" stroke-width="0.7" fill="none"/>
            <circle cx="26" cy="4"  r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="4"  cy="26" r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="14" cy="14" r="1.5" fill="#e8c96a" opacity="0.4"/>
        </svg>
        <svg class="corner br" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 4 L26 4 L4 26 Z" fill="#c9a84c" opacity="0.18"/>
            <line x1="4" y1="4" x2="22" y2="4" stroke="#c9a84c" stroke-width="1.5"/>
            <line x1="4" y1="4" x2="4" y2="22" stroke="#c9a84c" stroke-width="1.5"/>
            <circle cx="4" cy="4" r="3.5" fill="#c9a84c"/>
            <path d="M12 4 Q22 12 22 22 Q12 22 4 12" stroke="#e8c96a" stroke-width="0.7" fill="none"/>
            <circle cx="26" cy="4"  r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="4"  cy="26" r="2" fill="#c9a84c" opacity="0.45"/>
            <circle cx="14" cy="14" r="1.5" fill="#e8c96a" opacity="0.4"/>
        </svg>

        <!-- Platform badge -->
        <div class="platform-badge">Mahaam Platform</div>

        <!-- Logo -->
        <div class="cert-logo">
            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <polygon points="22,2 27,14 40,14 30,21.5 34,33.5 22,26 10,33.5 14,21.5 4,14 17,14"
                    stroke="#c9a84c" stroke-width="1.3" fill="none"/>
                <polygon points="22,7 25.5,16 35,16 27.5,21 30,30 22,25 14,30 16.5,21 9,16 18.5,16"
                    fill="#c9a84c" opacity="0.14"/>
                <circle cx="22" cy="22" r="4" fill="#c9a84c" opacity="0.4"/>
            </svg>
        </div>

        <div class="platform-name">Mahaam Platform</div>
        <div class="divider"></div>
        <div class="presents">Proudly Presents</div>

        <div class="cert-title">Certificate of Completion</div>
        <div class="cert-subtitle">Training Achievement Award</div>

        <div class="awarded-label">This certificate is awarded to</div>

        <div class="recipient-name">{{ $name }}</div>

        <div class="body-text">
            In recognition of successfully completing all required tasks and training<br>
            with outstanding dedication and exceptional performance throughout the course.
        </div>

        <div class="course-name">"{{ $course ?? 'Integrated Training Program' }}"</div>

        <!-- Footer -->
        <div class="cert-footer">

            <div class="sig-block">
                <div class="sig-name">Mahaam</div>
                <div class="sig-line"></div>
                <div class="sig-label">Executive Director</div>
            </div>

            <!-- Seal -->
            <div class="seal-wrap">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="40" cy="40" r="35" stroke="#c9a84c" stroke-width="1.2" stroke-dasharray="3.5 2.5"/>
                    <circle cx="40" cy="40" r="30" stroke="#e8c96a" stroke-width="0.6"/>
                    <circle cx="40" cy="40" r="25" fill="#c9a84c" opacity="0.07"/>
                    <text x="40" y="38" text-anchor="middle" font-family="Raleway,sans-serif"
                        font-size="7.5" fill="#8a6020" font-weight="600" letter-spacing="1.5">MAHAAM</text>
                    <text x="40" y="48" text-anchor="middle" font-family="Raleway,sans-serif"
                        font-size="6.5" fill="#a07828" font-weight="400" letter-spacing="1">PLATFORM</text>
                    <polygon points="40,12 42,18.5 49,18.5 43.5,22.5 45.5,29 40,25 34.5,29 36.5,22.5 31,18.5 38,18.5"
                        fill="#c9a84c" opacity="0.6"/>
                    <line x1="18" y1="53" x2="62" y2="53" stroke="#dfc06a" stroke-width="0.5"/>
                </svg>
            </div>

            <div class="date-block">
                <div class="date-val" id="certDate"></div>
                <div class="sig-line"></div>
                <div class="sig-label">Date of Issue</div>
            </div>

        </div>
    </div>
</div>

<script>
    const today = new Date();
    const formatted = today.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    document.getElementById('certDate').textContent = formatted;
</script>

</body>
</html>
