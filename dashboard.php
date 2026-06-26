<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard — GHOSST STORE</title>
<link rel="icon" type="image/png" href="assets/images/Sylvie.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Syne:wght@300;400;600;700&family=Fira+Code:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#14b8b8">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="GHOSST">
<link rel="apple-touch-icon" href="/assets/images/Sylvie.png">
<script>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/sw.js')
      .then(function(reg) { console.log('SW registered:', reg.scope); })
      .catch(function(err) { console.error('SW failed:', err); });
  });
}
</script>
<style>
:root {
  --bg-void:    #020608;
  --bg-deep:    #050d10;
  --bg-card:    #091318;
  --bg-card2:   #0c1a20;
  --teal-1:     #0d7a7a;
  --teal-2:     #14b8b8;
  --teal-3:     #5eead4;
  --teal-neon:  #00fff7;
  --ecto-green: #39ff14;
  --gold:       #f0c040;
  --red:        #ef4444;
  --purple:     #a78bfa;
  --neon-pink:  #ff2d78;
  --neon-blue:  #00a8ff;
  --text-hi:    #e8f8f8;
  --text-mid:   #8ab8be;
  --text-lo:    #3a6168;
  --border:     rgba(20,184,184,.18);
  --border-hi:  rgba(20,184,184,.45);
  --glow-teal:  0 0 30px rgba(20,184,184,.4), 0 0 80px rgba(13,122,122,.2);
  --glow-sm:    0 0 14px rgba(20,184,184,.35);
  --glow-green: 0 0 20px rgba(57,255,20,.4);
  --ff-display: 'Orbitron', sans-serif;
  --ff-body:    'Syne', sans-serif;
  --ff-mono:    'Fira Code', monospace;
  --sidebar-w:  260px;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; overflow-x: hidden; }

body {
  font-family: var(--ff-body);
  background: var(--bg-void);
  color: var(--text-hi);
  min-height: 100vh;
  overflow-x: hidden;
}

body::after {
  content: '';
  position: fixed; inset: 0; z-index: 9999; pointer-events: none;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
  opacity: .38;
}

#morphbg { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
#sparkle-canvas { position: fixed; inset: 0; z-index: 1; pointer-events: none; }
.blob { position: absolute; border-radius: 50%; filter: blur(90px); will-change: transform; }
.blob-1 {
  width: 620px; height: 620px; top: -15%; left: -14%;
  background: radial-gradient(circle at 40% 40%, rgba(57,255,20,.12) 0%, rgba(20,184,184,.07) 40%, transparent 70%);
  animation: blobDrift1 22s ease-in-out infinite alternate;
}
.blob-2 {
  width: 520px; height: 520px; bottom: -12%; right: -10%;
  background: radial-gradient(circle at 55% 55%, rgba(20,184,184,.11) 0%, rgba(57,255,20,.05) 40%, transparent 70%);
  animation: blobDrift2 18s ease-in-out infinite alternate; animation-delay: -6s;
}
.blob-3 {
  width: 360px; height: 360px; top: 38%; right: 14%;
  background: radial-gradient(circle, rgba(0,255,247,.08) 0%, rgba(57,255,20,.04) 45%, transparent 70%);
  animation: blobDrift3 26s ease-in-out infinite alternate; animation-delay: -12s;
}
@keyframes blobDrift1 { 0%{transform:translate(0,0) scale(1) rotate(0deg)} 40%{transform:translate(60px,-50px) scale(1.08) rotate(12deg)} 100%{transform:translate(-40px,60px) scale(.94) rotate(-8deg)} }
@keyframes blobDrift2 { 0%{transform:translate(0,0) scale(1) rotate(0deg)} 40%{transform:translate(-70px,45px) scale(1.06) rotate(-14deg)} 100%{transform:translate(50px,-60px) scale(.96) rotate(10deg)} }
@keyframes blobDrift3 { 0%{transform:translate(0,0) scale(1) rotate(0deg)} 50%{transform:translate(40px,55px) scale(1.1) rotate(18deg)} 100%{transform:translate(-50px,-40px) scale(.92) rotate(-12deg)} }

::-webkit-scrollbar { width: 4px; }
::-webkit-scrollbar-track { background: var(--bg-void); }
::-webkit-scrollbar-thumb { background: var(--teal-1); border-radius: 2px; }
::selection { background: var(--teal-2); color: var(--bg-void); }

.gs-topnav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 300;
  height: 58px;
  background: rgba(2,6,8,.94);
  backdrop-filter: blur(24px) saturate(1.4);
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 1.5rem;
  box-shadow: 0 4px 32px rgba(0,0,0,.4);
}

.d-none { display: none !important; }
@media (min-width: 576px) { .d-sm-inline { display: inline !important; } }
@media (min-width: 768px) { .d-md-flex { display: flex !important; } }

.nav-left {
  display: flex; align-items: center; gap: 1rem;
  min-width: 0; flex: 1 1 auto;
}

.sidebar-toggle {
  background: none; border: 1.5px solid var(--border); border-radius: 7px;
  width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;
  color: var(--text-mid); cursor: pointer; transition: all .2s; font-size: 1rem;
}
.sidebar-toggle:hover { border-color: var(--teal-2); color: var(--teal-2); background: rgba(20,184,184,.06); }

.nav-brand { display: flex; align-items: center; gap: .6rem; text-decoration: none; min-width: 0; }
.nav-brand-logo {
  width: 32px; height: 32px; border-radius: 7px; object-fit: cover;
  border: 1.5px solid var(--teal-2); box-shadow: var(--glow-sm);
}
.nav-brand-text {
  font-family: var(--ff-display); font-size: 1.05rem; font-weight: 700;
  background: linear-gradient(90deg, var(--teal-3), var(--teal-neon));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  letter-spacing: .1em; line-height: 1;
}

.nav-right { display: flex; align-items: center; gap: .6rem; }

.nav-status {
  display: flex; align-items: center; gap: .5rem;
  padding: .3rem .85rem;
  background: rgba(57,255,20,.06); border: 1px solid rgba(57,255,20,.22);
  border-radius: 50px; font-family: var(--ff-mono); font-size: .6rem;
  letter-spacing: .15em; text-transform: uppercase; color: #86efac;
}
.status-dot {
  width: 6px; height: 6px; border-radius: 50%; background: var(--ecto-green);
  box-shadow: 0 0 6px var(--ecto-green);
  animation: statusPulse 2s infinite;
}
@keyframes statusPulse {
  0%,100% { box-shadow: 0 0 4px var(--ecto-green); }
  50%      { box-shadow: 0 0 12px var(--ecto-green), 0 0 22px rgba(57,255,20,.35); }
}

.nav-wallet {
  display: flex; align-items: center; gap: .5rem;
  padding: .35rem .9rem;
  background: rgba(240,192,64,.07); border: 1px solid rgba(240,192,64,.25);
  border-radius: 8px; cursor: default;
}
.nav-wallet i { color: var(--gold); font-size: .85rem; }
.nav-wallet .amount {
  font-family: var(--ff-display); font-size: .85rem; font-weight: 700;
  color: var(--gold); letter-spacing: .04em;
}

.nav-user-btn {
  display: flex; align-items: center; gap: .5rem;
  padding: .35rem .85rem;
  background: rgba(20,184,184,.06); border: 1px solid var(--border);
  border-radius: 8px; cursor: pointer; transition: all .2s;
  font-family: var(--ff-body); color: var(--text-mid); font-size: .85rem;
  position: relative;
}
.nav-user-btn:hover { border-color: var(--teal-2); background: rgba(20,184,184,.1); color: var(--text-hi); }
.nav-user-btn .uavatar {
  width: 26px; height: 26px; border-radius: 50%;
  background: linear-gradient(135deg, var(--teal-1), var(--teal-2));
  display: flex; align-items: center; justify-content: center;
  font-family: var(--ff-display); font-size: .6rem; font-weight: 700;
  color: #fff; flex-shrink: 0; letter-spacing: .05em;
}

.nav-dropdown {
  position: absolute; top: calc(100% + .6rem); right: 0;
  min-width: 180px;
  background: rgba(9,19,24,.98); border: 1px solid var(--border);
  border-radius: 12px; box-shadow: 0 20px 50px rgba(0,0,0,.7);
  overflow: hidden; display: none; z-index: 500;
}
.nav-dropdown.open { display: block; }
.nav-dropdown a {
  display: flex; align-items: center; gap: .65rem;
  padding: .7rem 1rem; color: var(--text-mid); text-decoration: none;
  font-size: .85rem; transition: all .2s; border-left: 2px solid transparent;
}
.nav-dropdown a:hover { background: rgba(20,184,184,.07); color: var(--teal-3); border-left-color: var(--teal-2); }
.nav-dropdown a.danger { color: #fca5a5; }
.nav-dropdown a.danger:hover { background: rgba(239,68,68,.07); border-left-color: var(--red); }
.nav-dropdown a i { width: 1rem; font-size: .85rem; }
.dropdown-divider { height: 1px; background: var(--border); margin: .2rem 0; }

@media (max-width: 520px) {
  .gs-topnav { padding: 0 .85rem; gap: .5rem; }
  .nav-left { gap: .55rem; }
  .nav-right { gap: .45rem; flex-shrink: 0; }
  .sidebar-toggle { width: 32px; height: 32px; }
  .nav-brand-logo { width: 30px; height: 30px; }
  .nav-brand-text { font-size: .92rem; letter-spacing: .06em; }
  .nav-wallet { padding: .32rem .55rem; gap: .35rem; }
  .nav-wallet .amount { font-size: .78rem; }
  .nav-user-btn { padding: .32rem .5rem; gap: .35rem; }
}

@media (max-width: 370px) {
  .gs-topnav { padding: 0 .65rem; }
  .nav-brand-text { font-size: .82rem; max-width: 6.6rem; }
  .nav-wallet i { display: none; }
  .nav-wallet { padding-inline: .45rem; }
}

.gs-sidebar {
  position: fixed; top: 58px; left: 0; bottom: 0;
  width: var(--sidebar-w);
  background: rgba(5,13,16,.96);
  backdrop-filter: blur(20px);
  border-right: 1px solid var(--border);
  display: flex; flex-direction: column;
  overflow-y: auto; overflow-x: hidden;
  z-index: 200;
  transition: transform .35s cubic-bezier(.4,0,.2,1);
}
@media (max-width: 860px) {
  .gs-sidebar { transform: translateX(-100%); }
  .gs-sidebar.open { transform: translateX(0); }
}

.sb-user-card {
  padding: 1.5rem 1.25rem 1.1rem;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; gap: .85rem;
  position: relative; overflow: hidden;
}
.sb-user-card::before {
  content: '';
  position: absolute; top: -30px; right: -20px;
  width: 120px; height: 120px; border-radius: 50%;
  background: radial-gradient(circle, rgba(20,184,184,.12), transparent 70%);
  pointer-events: none;
}
.sb-avatar {
  width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0;
  background: linear-gradient(135deg, var(--teal-1), var(--teal-2));
  display: flex; align-items: center; justify-content: center;
  font-family: var(--ff-display); font-size: .9rem; font-weight: 700;
  color: #fff; box-shadow: var(--glow-sm);
  letter-spacing: .08em;
}
.sb-user-name {
  font-family: var(--ff-display); font-size: .95rem; font-weight: 700;
  color: var(--text-hi); letter-spacing: .04em; line-height: 1;
}
.sb-user-role {
  font-family: var(--ff-mono); font-size: .58rem; letter-spacing: .18em;
  text-transform: uppercase; color: var(--teal-2); margin-top: .3rem;
}

.sb-balance {
  margin: 1rem 1.25rem;
  padding: .85rem 1rem;
  background: rgba(240,192,64,.06); border: 1px solid rgba(240,192,64,.2);
  border-radius: 10px; position: relative; overflow: hidden;
}
.sb-balance::after {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, transparent, rgba(240,192,64,.5), transparent);
}
.sb-balance-label {
  font-family: var(--ff-mono); font-size: .58rem; letter-spacing: .2em;
  text-transform: uppercase; color: var(--text-lo); margin-bottom: .3rem;
  display: flex; align-items: center; gap: .4rem;
}
.sb-balance-label i { color: var(--gold); }
.sb-balance-amount {
  font-family: var(--ff-display); font-size: 1.35rem; font-weight: 700;
  color: var(--gold); letter-spacing: .04em;
}
.sb-topup-link {
  display: inline-flex; align-items: center; gap: .35rem;
  margin-top: .5rem; font-family: var(--ff-mono); font-size: .6rem;
  letter-spacing: .1em; text-transform: uppercase;
  color: var(--gold); opacity: .65; text-decoration: none; transition: opacity .2s;
}
.sb-topup-link:hover { opacity: 1; }

.sb-section { padding: .75rem .75rem 0; }
.sb-section-label {
  font-family: var(--ff-mono); font-size: .55rem; letter-spacing: .25em;
  text-transform: uppercase; color: var(--text-lo);
  padding: .4rem .5rem; margin-bottom: .25rem; display: block;
}

.sb-link {
  display: flex; align-items: center; gap: .75rem;
  padding: .6rem .85rem; border-radius: 9px;
  color: var(--text-mid); text-decoration: none; font-size: .875rem;
  transition: all .2s; margin-bottom: .15rem;
  border: 1px solid transparent; position: relative;
}
.sb-link i { font-size: .9rem; width: 1.1rem; flex-shrink: 0; color: var(--teal-1); transition: color .2s; }
.sb-link:hover { background: rgba(20,184,184,.07); color: var(--teal-3); border-color: rgba(20,184,184,.12); }
.sb-link:hover i { color: var(--teal-2); }
.sb-link.active {
  background: rgba(20,184,184,.1); color: var(--teal-2);
  border-color: rgba(20,184,184,.25);
  box-shadow: inset 3px 0 0 var(--teal-2);
}
.sb-link.active i { color: var(--teal-2); }

.sb-footer {
  margin-top: auto; padding: 1rem 1.25rem 1.25rem;
  border-top: 1px solid var(--border);
}
.sb-footer-text {
  font-family: var(--ff-mono); font-size: .55rem; letter-spacing: .1em;
  color: var(--text-lo); text-align: center;
}
.sb-footer-text span { color: var(--teal-2); }

.gs-overlay {
  display: none; position: fixed; inset: 0;
  background: rgba(0,0,0,.65); z-index: 199;
  backdrop-filter: blur(2px);
}
.gs-overlay.open { display: block; }

.gs-main {
  margin-left: var(--sidebar-w);
  padding-top: 58px;
  min-height: 100vh;
  position: relative; z-index: 2;
}
@media (max-width: 860px) { .gs-main { margin-left: 0; } }

.gs-content { padding: 2rem 1.75rem; }
@media (max-width: 600px) { .gs-content { padding: 1.25rem 1rem; } }

.btn-primary {
  display: inline-flex; align-items: center; gap: .5rem;
  padding: .6rem 1.4rem;
  background: linear-gradient(135deg, var(--teal-1), var(--teal-2));
  color: #fff; border: none; border-radius: 10px; cursor: pointer;
  font-family: var(--ff-display); font-size: .72rem; font-weight: 700;
  letter-spacing: .08em; text-transform: uppercase; text-decoration: none;
  transition: all .25s;
}
.btn-primary:hover { 
  background: linear-gradient(135deg, var(--teal-2), var(--teal-neon));
  box-shadow: var(--glow-sm);
  transform: translateY(-2px);
}
.btn-primary:active { transform: translateY(0); }
.btn-outline {
  display: inline-flex; align-items: center; gap: .5rem;
  padding: .6rem 1.3rem; background: transparent;
  color: var(--teal-3); border: 1.5px solid var(--teal-1); border-radius: 10px;
  cursor: pointer; font-family: var(--ff-display); font-size: .72rem;
  font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
  text-decoration: none; transition: all .25s;
}
.btn-outline:hover { 
  background: rgba(20,184,184,.08); 
  border-color: var(--teal-2); 
  box-shadow: var(--glow-sm); 
  transform: translateY(-2px); 
}
.btn-outline:active { transform: translateY(0); }

.btn-trial {
  display: inline-flex; align-items: center; gap: .5rem;
  padding: .6rem 1.3rem; background: linear-gradient(135deg, rgba(167,139,250,.12), rgba(139,92,246,.08));
  color: #c4b5fd; border: 1.5px solid rgba(167,139,250,.3); border-radius: 10px;
  cursor: pointer; font-family: var(--ff-display); font-size: .72rem;
  font-weight: 700; letter-spacing: .08em; text-transform: uppercase;
  text-decoration: none; transition: all .25s;
}
.btn-trial:hover {
  background: linear-gradient(135deg, rgba(167,139,250,.2), rgba(139,92,246,.14));
  border-color: rgba(167,139,250,.5);
  box-shadow: 0 0 20px rgba(167,139,250,.15);
  transform: translateY(-2px);
}
.btn-trial:active { transform: translateY(0); }

.panel {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 16px;
  overflow: hidden;
  backdrop-filter: blur(16px) saturate(1.2);
  -webkit-backdrop-filter: blur(16px) saturate(1.2);
  transition: all .3s;
}
.panel {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 14px; overflow: hidden;
}
.panel:hover {
  border-color: rgba(20,184,184,.2);
}
.panel-head {
  padding: .75rem 1rem;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
  position: relative;
}
.panel-head::after {
  content: ''; position: absolute; bottom: 0; left: 1.2rem; right: 1.2rem;
  height: 1px; background: linear-gradient(90deg, var(--teal-2), transparent);
  opacity: .25;
}
.panel-title {
  font-family: var(--ff-display); font-size: .8rem; font-weight: 700;
  color: var(--text-hi); letter-spacing: .05em;
  display: flex; align-items: center; gap: .5rem;
}
.panel-title i { color: var(--teal-2); font-size: .85rem; }
.panel-badge {
  font-family: var(--ff-mono); font-size: .52rem; letter-spacing: .1em;
  text-transform: uppercase; padding: .18rem .55rem;
  border-radius: 50px; background: rgba(20,184,184,.08);
  border: 1px solid rgba(20,184,184,.2); color: var(--teal-3);
}
.view-all-link {
  font-family: var(--ff-mono); font-size: .55rem; letter-spacing: .1em;
  text-transform: uppercase; color: var(--teal-2); text-decoration: none;
  display: flex; align-items: center; gap: .3rem; transition: color .2s;
}
.view-all-link:hover { color: var(--teal-neon); }
.view-all-link i { transition: transform .2s; }
.view-all-link:hover i { transform: translateX(2px); }

.orders-table { width: 100%; border-collapse: collapse; }
.orders-table th {
  padding: .55rem 1.1rem; text-align: left;
  font-family: var(--ff-mono); font-size: .52rem; letter-spacing: .12em;
  text-transform: uppercase; color: var(--text-lo);
  border-bottom: 1px solid var(--border); white-space: nowrap;
}
.orders-table td {
  padding: .65rem 1.1rem;
  border-bottom: 1px solid rgba(20,184,184,.07);
  color: var(--text-mid); font-size: .8rem;
  vertical-align: middle;
}
.orders-table tr:last-child td { border-bottom: none; }
.orders-table tbody tr { transition: background .2s; }
.orders-table tbody tr:hover td { background: rgba(20,184,184,.04); color: var(--text-hi); }

.order-product { display: flex; align-items: center; gap: .65rem; }
.order-img {
  width: 30px; height: 30px; border-radius: 7px; object-fit: cover;
  border: 1px solid var(--border); flex-shrink: 0;
}
.order-img-placeholder {
  width: 30px; height: 30px; border-radius: 7px; border: 1px solid var(--border);
  background: rgba(20,184,184,.08); display: flex; align-items: center;
  justify-content: center; font-size: .85rem; flex-shrink: 0; color: var(--teal-2);
}
.order-name { font-size: .85rem; color: var(--text-hi); line-height: 1.2; }
.order-name .sub { font-family: var(--ff-mono); font-size: .6rem; color: var(--text-lo); letter-spacing: .06em; }

.key-chip {
  font-family: var(--ff-mono); font-size: .68rem; letter-spacing: .04em;
  background: rgba(20,184,184,.07); border: 1px solid rgba(20,184,184,.15);
  color: var(--teal-3); padding: .2rem .55rem; border-radius: 5px;
  cursor: pointer; transition: all .2s; display: inline-block;
}
.key-chip:hover { background: rgba(20,184,184,.15); color: var(--teal-neon); box-shadow: var(--glow-sm); }

.order-amount { font-family: var(--ff-display); font-size: .9rem; font-weight: 700; color: var(--ecto-green); }
.order-date { font-family: var(--ff-mono); font-size: .65rem; letter-spacing: .06em; color: var(--text-lo); white-space: nowrap; }

.empty-state {
  padding: 2.5rem 1.2rem; text-align: center;
}
.empty-icon-ring {
  width: 52px; height: 52px; border-radius: 50%; margin: 0 auto .8rem;
  background: rgba(20,184,184,.06); border: 1px solid rgba(20,184,184,.2);
  display: flex; align-items: center; justify-content: center; font-size: 1.2rem;
  color: var(--teal-2);
}
.empty-title { font-family: var(--ff-display); font-size: .85rem; font-weight: 700; color: var(--text-mid); margin-bottom: .3rem; letter-spacing: .04em; }
.empty-sub { font-size: .72rem; color: var(--text-lo); }

.activity-list { padding: .2rem 0; }
.activity-item {
  display: flex; align-items: flex-start; gap: .7rem;
  padding: .6rem 1rem; border-bottom: 1px solid rgba(20,184,184,.06);
  transition: background .2s;
}
.activity-item:last-child { border-bottom: none; }
.activity-item:hover { background: rgba(20,184,184,.03); }
.activity-dot {
  width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; margin-top: .3rem;
  background: var(--teal-2); box-shadow: 0 0 4px var(--teal-2);
}
.activity-dot.gold { background: var(--gold); box-shadow: 0 0 4px var(--gold); }
.activity-dot.green { background: var(--ecto-green); box-shadow: 0 0 4px var(--ecto-green); }
.activity-text { font-size: .75rem; color: var(--text-mid); line-height: 1.4; }
.activity-text strong { color: var(--text-hi); font-weight: 600; }
.activity-time { font-family: var(--ff-mono); font-size: .5rem; letter-spacing: .06em; color: var(--text-lo); margin-top: .15rem; }

#toast {
  position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 9000;
  background: rgba(9,19,24,.98); border: 1px solid var(--border-hi);
  border-radius: 12px; padding: .9rem 1.3rem;
  min-width: 240px; max-width: 320px;
  box-shadow: 0 16px 48px rgba(0,0,0,.6), 0 0 20px rgba(20,184,184,.1);
  transform: translateX(130%); transition: .35s cubic-bezier(.4,0,.2,1);
  display: flex; align-items: center; gap: .75rem;
}
#toast.show { transform: translateX(0); }
#toast-icon { font-size: 1.2rem; }
#toast-title { font-family: var(--ff-display); font-size: .75rem; font-weight: 700; color: var(--text-hi); letter-spacing: .04em; }
#toast-msg { font-size: .78rem; color: var(--text-mid); margin-top: .15rem; }

.fade-up { opacity: 0; transform: translateY(18px); animation: fadeUp .55s ease forwards; }
.d1 { animation-delay: .06s; }
.d2 { animation-delay: .12s; }
.d3 { animation-delay: .18s; }
.d4 { animation-delay: .24s; }
.d5 { animation-delay: .30s; }
@keyframes fadeUp { to { opacity: 1; transform: translateY(0); } }

.panel-head::before {
  content: '';
  position: absolute; top: 0; left: -100%; width: 40%; height: 1px;
  background: linear-gradient(90deg, transparent, rgba(20,184,184,.6), transparent);
  animation: scanShimmer 6s linear infinite;
}
@keyframes scanShimmer { 0%{left:-40%} 100%{left:140%} }

.panel-corner { position: relative; }
.panel-corner::before, .panel-corner::after {
  content: ''; position: absolute; width: 14px; height: 14px;
  border-color: var(--teal-2); border-style: solid;
}
.panel-corner::before { top: -1px; left: -1px; border-width: 2px 0 0 2px; border-radius: 4px 0 0 0; opacity: .6; }
.panel-corner::after  { bottom: -1px; right: -1px; border-width: 0 2px 2px 0; border-radius: 0 0 4px 0; opacity: .6; }

/* Featured Products Section */
.featured-section {
  margin-bottom: 2rem;
}
.featured-header {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 1rem;
}
.featured-title {
  font-family: var(--ff-display); font-size: 1rem; font-weight: 700;
  color: var(--text-hi); letter-spacing: .06em;
  display: flex; align-items: center; gap: .5rem;
}
.featured-title i { color: var(--teal-2); font-size: .95rem; }
.featured-subtitle {
  font-family: var(--ff-mono); font-size: .52rem; letter-spacing: .1em;
  text-transform: uppercase; color: var(--text-lo); margin-top: .15rem;
}
.products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 1.25rem;
}
.product-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  transition: all .3s cubic-bezier(.4,0,.2,1);
  cursor: pointer;
  position: relative;
}
.product-card:hover {
  border-color: var(--border-hi);
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(0,0,0,.4), var(--glow-sm);
}
.product-card::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--teal-1), var(--teal-neon));
  transform: scaleX(0);
  transform-origin: left;
  transition: transform .3s;
  z-index: 1;
}
.product-card:hover::before { transform: scaleX(1); }
.product-img-wrap {
  position: relative;
  height: 150px;
  overflow: hidden;
  background: var(--bg-deep);
}
.product-img-wrap::after {
  content: '';
  position: absolute; bottom: 0; left: 0; right: 0;
  height: 50%;
  background: linear-gradient(to top, var(--bg-card), transparent);
  pointer-events: none;
}
.product-img-wrap img {
  width: 100%; height: 100%;
  object-fit: cover;
  transition: transform .3s;
}
.product-card:hover .product-img-wrap img { transform: scale(1.05); }
.product-img-placeholder {
  width: 100%; height: 100%;
  display: flex; align-items: center; justify-content: center;
  font-size: 2rem; color: var(--teal-2);
  background: rgba(20,184,184,.05);
}
.product-badges {
  position: absolute; top: .75rem; left: .75rem; right: .75rem;
  display: flex; justify-content: space-between; align-items: flex-start;
  z-index: 2;
}
.product-badge {
  padding: .25rem .6rem;
  background: rgba(0,0,0,.8);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(20,184,184,.4);
  border-radius: 6px;
  font-family: var(--ff-mono);
  font-size: .55rem;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--teal-3);
  transition: all .3s;
}
.product-card:hover .product-badge {
  border-color: var(--teal-2);
  box-shadow: 0 0 8px rgba(20,184,184,.3);
}
.product-platform-badge {
  padding: .25rem .6rem;
  background: rgba(0,0,0,.8);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,.2);
  border-radius: 6px;
  font-size: .7rem;
  color: rgba(255,255,255,.9);
  display: flex; align-items: center; gap: .35rem;
  transition: all .3s;
}
.product-card:hover .product-platform-badge {
  border-color: rgba(255,255,255,.4);
}
.product-stock-badge {
  position: absolute; bottom: .75rem; right: .75rem;
  padding: .25rem .6rem;
  background: rgba(57,255,20,.15);
  border: 1px solid rgba(57,255,20,.3);
  border-radius: 6px;
  font-family: var(--ff-mono);
  font-size: .55rem;
  letter-spacing: .1em;
  color: #86efac;
  display: flex; align-items: center; gap: .4rem;
  z-index: 2;
  backdrop-filter: blur(4px);
}
.product-stock-badge::before {
  content: '';
  width: 5px; height: 5px;
  border-radius: 50%;
  background: var(--ecto-green);
  box-shadow: 0 0 6px var(--ecto-green);
  animation: stockPulse 2s infinite;
}
@keyframes stockPulse {
  0%, 100% { box-shadow: 0 0 4px var(--ecto-green); }
  50% { box-shadow: 0 0 8px var(--ecto-green); }
}
.product-info {
  padding: .85rem 1rem 1rem;
}
.product-name {
  font-family: var(--ff-display);
  font-size: .82rem;
  font-weight: 700;
  color: var(--text-hi);
  letter-spacing: .04em;
  margin-bottom: .25rem;
  line-height: 1.2;
}
.product-desc {
  font-size: .7rem;
  color: var(--text-mid);
  line-height: 1.4;
  margin-bottom: .5rem;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.product-meta {
  display: flex; align-items: center; justify-content: space-between;
  gap: .5rem;
}
.product-price {
  font-family: var(--ff-display);
  font-size: 1rem;
  font-weight: 700;
  color: var(--teal-neon);
  letter-spacing: .03em;
}
.product-price .currency {
  font-size: .6rem;
  opacity: .7;
  margin-right: .1rem;
}
.product-price .from {
  font-family: var(--ff-mono);
  font-size: .48rem;
  color: var(--text-lo);
  letter-spacing: .08em;
  text-transform: uppercase;
  display: block;
  margin-bottom: .1rem;
}
.product-buy-btn {
  padding: .4rem .85rem;
  background: linear-gradient(135deg, var(--teal-1), var(--teal-2));
  border: none;
  border-radius: 8px;
  color: #fff;
  font-family: var(--ff-display);
  font-size: .6rem;
  font-weight: 700;
  letter-spacing: .08em;
  text-transform: uppercase;
  cursor: pointer;
  transition: all .3s;
  display: flex; align-items: center; gap: .35rem;
  white-space: nowrap;
}
.product-buy-btn:hover {
  background: linear-gradient(135deg, var(--teal-2), var(--teal-neon));
  box-shadow: var(--glow-sm);
  transform: translateY(-1px);
}
@media (max-width: 600px) {
  .products-grid {
    grid-template-columns: 1fr;
    gap: 1rem;
  }
  .product-img-wrap { height: 140px; }
  .hero-section { border-radius: 14px; }
  .hero-inner { padding: 1.5rem; gap: 1.25rem; }
  .account-overview { 
    min-width: unset;
    border-radius: 14px;
  }
}
@media (min-width: 601px) and (max-width: 900px) {
  .products-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }
}

/* ===== FEATURED VIDEO BANNER ===== */
.video-banner {
  position: relative;
  width: 100%;
  height: 280px;
  border-radius: 20px;
  overflow: hidden;
  margin-bottom: 2rem;
  border: 1px solid var(--border);
}
.video-banner video {
  width: 100%; height: 100%;
  object-fit: cover;
}
.video-banner-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(180deg, rgba(2,6,8,.15) 0%, rgba(2,6,8,.45) 50%, rgba(2,6,8,.92) 100%);
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  text-align: center; z-index: 2;
}
.video-banner-title {
  font-family: var(--ff-display);
  font-size: clamp(1.5rem, 4vw, 2.5rem);
  font-weight: 900;
  background: linear-gradient(135deg, var(--teal-3), var(--teal-neon), var(--ecto-green));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  letter-spacing: .08em;
  margin-bottom: .4rem;
  filter: drop-shadow(0 0 15px rgba(0,255,247,.25));
}
.video-banner-sub {
  font-family: var(--ff-mono);
  font-size: .65rem;
  letter-spacing: .2em;
  text-transform: uppercase;
  color: var(--text-mid);
}
.video-banner-glow {
  position: absolute;
  width: 400px; height: 400px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(0,255,247,.12), transparent 60%);
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  pointer-events: none;
  z-index: 1;
}
.video-banner-accent {
  position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, transparent, var(--teal-neon), var(--ecto-green), transparent);
  z-index: 3;
}
@media (max-width: 600px) {
  .video-banner { height: 180px; border-radius: 16px; }
  .video-banner-title { font-size: 1.2rem; }
  .video-banner-sub { font-size: .55rem; letter-spacing: .12em; }
}

/* ===== SKELETON LOADING ===== */
@keyframes skeletonShimmer {
  0% { background-position: -200% 0; }
  100% { background-position: 200% 0; }
}
.skeleton {
  background: linear-gradient(90deg, rgba(20,184,184,.06) 25%, rgba(20,184,184,.12) 50%, rgba(20,184,184,.06) 75%);
  background-size: 200% 100%;
  animation: skeletonShimmer 1.5s ease-in-out infinite;
  border-radius: 6px;
}
.skeleton-card {
  height: 260px;
  border-radius: 14px;
}
.skeleton-stat {
  height: 80px;
  border-radius: 12px;
}

/* ===== PRODUCT CARD 3D TILT ===== */
.product-card {
  transform-style: preserve-3d;
  perspective: 800px;
}
.product-card .product-info {
  transform: translateZ(20px);
}

/* ===== SHIMMER EFFECT ON HOVER ===== */
.product-card::after {
  content: '';
  position: absolute;
  top: 0; left: -100%;
  width: 50%; height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,.05), transparent);
  transition: left .6s ease;
  pointer-events: none;
  z-index: 3;
}
.product-card:hover::after {
  left: 120%;
}

/* ===== RIPPLE EFFECT ===== */
.btn-primary, .btn-outline, .product-buy-btn {
  position: relative;
  overflow: hidden;
}
.ripple {
  position: absolute;
  border-radius: 50%;
  background: rgba(255,255,255,.25);
  transform: scale(0);
  animation: rippleAnim .6s ease-out;
  pointer-events: none;
}
@keyframes rippleAnim {
  to { transform: scale(4); opacity: 0; }
}

/* ===== GRADIENT BORDER ON HOVER (Gaming Style) ===== */
.product-card {
  background-clip: padding-box;
  position: relative;
}
.product-card::before {
  content: '';
  position: absolute;
  top: -2px; left: -2px; right: -2px; bottom: -2px;
  border-radius: 18px;
  background: linear-gradient(135deg, var(--teal-1), var(--teal-neon), var(--ecto-green), var(--purple));
  z-index: -1;
  opacity: 0;
  transition: opacity .4s;
  background-size: 300% 300%;
  animation: gradientShift 3s ease infinite;
}
@keyframes gradientShift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
.product-card:hover::before {
  opacity: 1;
}

/* ===== GLASS-MORPHISM ENHANCEMENT ===== */
.panel {
  backdrop-filter: blur(16px) saturate(1.2);
  -webkit-backdrop-filter: blur(16px) saturate(1.2);
}
.hero-section {
  backdrop-filter: blur(20px) saturate(1.3);
  -webkit-backdrop-filter: blur(20px) saturate(1.3);
}

/* ===== CATEGORY TABS ===== */
.category-tabs {
  display: flex; gap: .5rem; margin-bottom: 1rem;
  overflow-x: auto; padding-bottom: .25rem;
  -webkit-overflow-scrolling: touch;
}
.category-tabs::-webkit-scrollbar { height: 0; }
.cat-tab {
  padding: .4rem .9rem;
  background: rgba(20,184,184,.05);
  border: 1px solid var(--border);
  border-radius: 8px;
  font-family: var(--ff-mono);
  font-size: .58rem;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: var(--text-mid);
  cursor: pointer;
  transition: all .2s;
  white-space: nowrap;
  flex-shrink: 0;
}
.cat-tab:hover {
  background: rgba(20,184,184,.1);
  border-color: var(--teal-2);
  color: var(--teal-3);
}
.cat-tab.active {
  background: linear-gradient(135deg, var(--teal-1), var(--teal-2));
  border-color: var(--teal-2);
  color: #fff;
  box-shadow: var(--glow-sm);
}

/* ===== QUICK-VIEW MODAL ===== */
.qv-overlay {
  display: none; position: fixed; inset: 0;
  background: rgba(0,0,0,.7);
  backdrop-filter: blur(8px);
  z-index: 1000;
  align-items: center; justify-content: center;
  padding: 1rem;
}
.qv-overlay.open { display: flex; }
.qv-modal {
  background: var(--bg-card);
  border: 1px solid var(--border-hi);
  border-radius: 18px;
  max-width: 500px; width: 100%;
  max-height: 85vh; overflow-y: auto;
  box-shadow: 0 24px 64px rgba(0,0,0,.6), var(--glow-teal);
  transform: scale(.9); opacity: 0;
  transition: all .3s cubic-bezier(.4,0,.2,1);
}
.qv-overlay.open .qv-modal { transform: scale(1); opacity: 1; }
.qv-header {
  padding: 1.25rem 1.25rem 1rem;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
}
.qv-title {
  font-family: var(--ff-display); font-size: 1rem; font-weight: 700;
  color: var(--text-hi); letter-spacing: .04em;
}
.qv-close {
  width: 32px; height: 32px; border-radius: 8px;
  background: rgba(239,68,68,.1); border: 1px solid rgba(239,68,68,.2);
  color: var(--red); cursor: pointer; transition: all .2s;
  display: flex; align-items: center; justify-content: center;
}
.qv-close:hover { background: rgba(239,68,68,.2); }
.qv-body { padding: 1.25rem; }
.qv-img {
  width: 100%; height: 200px; object-fit: cover;
  border-radius: 12px; margin-bottom: 1rem;
  border: 1px solid var(--border);
}
.qv-product-name {
  font-family: var(--ff-display); font-size: 1.2rem; font-weight: 700;
  color: var(--text-hi); margin-bottom: .5rem;
}
.qv-product-desc {
  font-size: .85rem; color: var(--text-mid); line-height: 1.5;
  margin-bottom: 1rem;
}
.qv-details {
  display: grid; grid-template-columns: 1fr 1fr; gap: .75rem;
  margin-bottom: 1.25rem;
}
.qv-detail {
  padding: .6rem .75rem;
  background: rgba(20,184,184,.06);
  border: 1px solid var(--border);
  border-radius: 8px;
}
.qv-detail-label {
  font-family: var(--ff-mono); font-size: .5rem; letter-spacing: .12em;
  text-transform: uppercase; color: var(--text-lo); margin-bottom: .2rem;
}
.qv-detail-val {
  font-family: var(--ff-display); font-size: .95rem; font-weight: 700;
  color: var(--teal-3);
}
.qv-actions {
  display: flex; gap: .75rem;
}

/* ===== MOBILE BOTTOM BAR ===== */
.mobile-bottom-bar {
  display: none;
  position: fixed; bottom: 0; left: 0; right: 0;
  z-index: 150;
  background: rgba(2,6,8,.95);
  backdrop-filter: blur(20px);
  border-top: 1px solid var(--border);
  padding: .5rem .75rem;
  justify-content: space-around;
  align-items: center;
}
.mobile-bar-item {
  display: flex; flex-direction: column; align-items: center;
  gap: .2rem; text-decoration: none; color: var(--text-mid);
  font-family: var(--ff-mono); font-size: .5rem; letter-spacing: .08em;
  text-transform: uppercase; transition: color .2s;
  padding: .3rem .5rem; border-radius: 8px;
}
.mobile-bar-item:hover, .mobile-bar-item.active {
  color: var(--teal-2);
}
.mobile-bar-item i { font-size: 1.1rem; }

/* ===== STOCK INDICATOR COLORS ===== */
.stock-high { color: #86efac; }
.stock-medium { color: #fcd34d; }
.stock-low { color: #fca5a5; }

/* ===== POPULAR BADGE (Gaming Style) ===== */
.product-popular-badge {
  position: absolute; top: .75rem; left: 50%; transform: translateX(-50%);
  padding: .25rem .7rem;
  background: linear-gradient(135deg, #f0c040, #f59e0b);
  border-radius: 50px;
  font-family: var(--ff-mono);
  font-size: .5rem;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: #000;
  font-weight: 700;
  z-index: 3;
  box-shadow: 0 2px 10px rgba(240,192,64,.4);
  animation: popularPulse 2s ease-in-out infinite;
}
@keyframes popularPulse {
  0%, 100% { box-shadow: 0 2px 10px rgba(240,192,64,.4); }
  50% { box-shadow: 0 2px 15px rgba(240,192,64,.6); }
}

/* ===== SCROLL ANIMATIONS ===== */
.animate-on-scroll {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity .5s ease, transform .5s ease;
}
.animate-on-scroll.visible {
  opacity: 1;
  transform: translateY(0);
}

/* ===== COUNT UP ANIMATION ===== */
.count-up {
  display: inline-block;
}

/* ===== NEW HERO SECTION ===== */
.hero-section {
  position: relative;
  overflow: hidden;
  background: linear-gradient(180deg, rgba(9,19,24,.92) 0%, rgba(12,26,32,.97) 100%);
  border: 1px solid var(--border);
  border-radius: 20px;
  margin-bottom: 2rem;
}
.hero-section::before {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg width='60' height='52' viewBox='0 0 60 52' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0 L60 17.3 L60 34.7 L30 52 L0 34.7 L0 17.3Z' fill='none' stroke='rgba(20,184,184,0.06)' stroke-width='1'/%3E%3C/svg%3E");
  pointer-events: none;
}
.hero-section::after {
  content: '';
  position: absolute; top: 0; right: 0;
  width: 250px; height: 250px; border-radius: 50%;
  background: radial-gradient(circle, rgba(20,184,184,.1) 0%, transparent 65%);
  pointer-events: none;
}
.hero-accent {
  position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--teal-1), var(--teal-neon), var(--ecto-green), var(--teal-neon), var(--teal-1));
}
.hero-inner {
  position: relative; z-index: 1;
  padding: 2rem 2.25rem 1.75rem;
}
.hero-greeting {
  font-family: var(--ff-mono); font-size: .65rem; letter-spacing: .25em;
  text-transform: uppercase; color: var(--teal-2); margin-bottom: .4rem;
  display: flex; align-items: center; gap: .4rem;
}
.hero-greeting::before { content: '//'; opacity: .5; color: var(--ecto-green); }
.hero-name {
  font-family: var(--ff-display);
  font-size: clamp(1.4rem, 3.5vw, 2rem);
  font-weight: 700; color: var(--text-hi); line-height: 1.15; letter-spacing: .03em;
  margin-bottom: 1.25rem;
}
.hero-name .highlight {
  background: linear-gradient(135deg, var(--teal-3), var(--teal-neon));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent;
}

/* Hero Actions - Inline Buttons */
.hero-actions {
  display: flex; gap: .85rem; margin-bottom: 1.5rem;
  flex-wrap: wrap;
}
.hero-actions .btn-primary {
  padding: .7rem 1.75rem;
  font-size: .75rem;
  border-radius: 10px;
}
.hero-actions .btn-outline {
  padding: .7rem 1.5rem;
  font-size: .75rem;
  border-radius: 10px;
}

/* Stats Grid - 2x2 */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: .75rem;
}
.stat-card {
  display: flex; align-items: center; gap: .75rem;
  padding: 1rem 1.1rem;
  background: rgba(20,184,184,.04);
  border: 1px solid var(--border);
  border-radius: 14px;
  transition: all .3s;
  text-decoration: none;
  color: inherit;
}
.stat-card:hover {
  background: rgba(20,184,184,.08);
  border-color: var(--border-hi);
  transform: translateY(-1px);
}
.stat-card-icon {
  width: 42px; height: 42px; border-radius: 11px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.05rem; flex-shrink: 0;
}
.stat-card-info { display: flex; flex-direction: column; }
.stat-card-val {
  font-family: var(--ff-display); font-size: 1.05rem; font-weight: 700;
  color: var(--text-hi); line-height: 1; letter-spacing: .02em;
}
.stat-card-lbl {
  font-family: var(--ff-mono); font-size: .55rem; letter-spacing: .12em;
  text-transform: uppercase; color: var(--text-lo); margin-top: .2rem;
}
.stat-card-orders .stat-card-icon { background: rgba(20,184,184,.12); color: var(--teal-2); }
.stat-card-balance .stat-card-icon { background: rgba(57,255,20,.12); color: var(--ecto-green); }
.stat-card-balance .stat-card-val { color: var(--ecto-green); }

/* Downloads - Blue Button */
.stat-card-downloads {
  border-style: dashed;
  border-color: rgba(0,168,255,.35);
  background: rgba(0,168,255,.04);
}
.stat-card-downloads .stat-card-icon { background: rgba(0,168,255,.12); color: var(--neon-blue); }
.stat-card-downloads:hover {
  background: rgba(0,168,255,.1);
  border-color: rgba(0,168,255,.6);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0,168,255,.15);
}
.stat-card-downloads .stat-card-val {
  color: var(--neon-blue);
  font-size: .78rem;
  text-transform: uppercase;
  letter-spacing: .12em;
}

/* Free Key - Purple Button */
.stat-card-freekey {
  border-style: dashed;
  border-color: rgba(167,139,250,.35);
  background: rgba(167,139,250,.04);
}
.stat-card-freekey .stat-card-icon { background: rgba(167,139,250,.12); color: var(--purple); }
.stat-card-freekey:hover {
  background: rgba(167,139,250,.1);
  border-color: rgba(167,139,250,.6);
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(167,139,250,.15);
}
.stat-card-freekey .stat-card-val {
  color: var(--purple);
  font-size: .78rem;
  text-transform: uppercase;
  letter-spacing: .12em;
}

/* ===== SECTION HEADER ===== */
.section-header {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 1rem;
}
.section-title {
  font-family: var(--ff-display); font-size: 1.05rem; font-weight: 700;
  color: var(--text-hi); letter-spacing: .06em;
  display: flex; align-items: center; gap: .5rem;
}
.section-title i { color: var(--teal-2); font-size: 1rem; }
.section-subtitle {
  font-family: var(--ff-mono); font-size: .55rem; letter-spacing: .12em;
  text-transform: uppercase; color: var(--text-lo); margin-top: .2rem;
}

/* ===== ACTIVITY TIMELINE ===== */
.timeline-section {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  margin-bottom: 1.5rem;
}
.timeline-tabs {
  display: flex; border-bottom: 1px solid var(--border);
  padding: 0 1rem;
}
.timeline-tab {
  padding: .65rem 1rem;
  background: none; border: none; border-bottom: 2px solid transparent;
  font-family: var(--ff-mono); font-size: .58rem; letter-spacing: .1em;
  text-transform: uppercase; color: var(--text-lo);
  cursor: pointer; transition: all .2s;
}
.timeline-tab:hover { color: var(--text-mid); }
.timeline-tab.active {
  color: var(--teal-2);
  border-bottom-color: var(--teal-2);
}
.timeline-content { min-height: 180px; }
.timeline-panel { display: none; }
.timeline-panel.active { display: block; }

/* ===== REDEEM SECTION ===== */
.redeem-section {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  margin-bottom: 1.5rem;
}
.redeem-inner {
  padding: .85rem 1rem;
}
.redeem-form {
  display: flex; gap: .5rem;
}
.redeem-input {
  flex: 1;
  padding: .5rem .75rem;
  background: rgba(20,184,184,.05);
  border: 1px solid var(--border);
  border-radius: 8px;
  color: var(--text-hi);
  font-family: var(--ff-mono); font-size: .72rem; letter-spacing: .06em;
  text-transform: uppercase; outline: none; transition: all .2s;
}
.redeem-input:focus {
  border-color: var(--teal-2);
  box-shadow: 0 0 0 2px rgba(20,184,184,.1);
}
.redeem-btn {
  padding: .5rem .9rem;
  border: none; border-radius: 8px;
  background: linear-gradient(135deg, var(--teal-1), var(--teal-2));
  color: #fff;
  font-family: var(--ff-display); font-size: .62rem; font-weight: 700;
  letter-spacing: .07em; text-transform: uppercase;
  cursor: pointer; transition: all .2s;
  display: flex; align-items: center; gap: .3rem;
  white-space: nowrap;
}
.redeem-btn:hover {
  background: linear-gradient(135deg, var(--teal-2), var(--teal-neon));
  box-shadow: var(--glow-sm);
}
.redeem-hint {
  margin-top: .4rem;
  font-family: var(--ff-mono); font-size: .5rem; color: var(--text-lo);
  line-height: 1.4;
}

/* ===== MOBILE BOTTOM BAR (4 items) ===== */
@media (max-width: 768px) {
  .mobile-bottom-bar { display: flex; }
  .gs-content { padding-bottom: 70px; }
  .hero-inner { padding: 1.5rem 1.5rem 1.25rem; }
  .hero-actions .btn-primary,
  .hero-actions .btn-outline { justify-content: center; width: 100%; }
  .hero-actions { flex-direction: column; align-items: stretch; }
  .stats-grid { gap: .6rem; }
  .stat-card { padding: .85rem 1rem; }
  .stat-card-icon { width: 38px; height: 38px; font-size: .95rem; }
  .stat-card-val { font-size: .9rem; }
  .redeem-form { flex-direction: column; }
  .timeline-tabs { overflow-x: auto; -webkit-overflow-scrolling: touch; }
  .timeline-tabs::-webkit-scrollbar { height: 0; }
}
@media (max-width: 480px) {
  .hero-inner { padding: 1.25rem 1.25rem 1rem; }
  .hero-name { font-size: 1.2rem; }
  .stats-grid { gap: .5rem; }
  .stat-card { padding: .75rem .85rem; gap: .6rem; border-radius: 12px; }
  .stat-card-icon { width: 34px; height: 34px; border-radius: 9px; font-size: .85rem; }
  .stat-card-val { font-size: .82rem; }
}
</style>
</head>
<body>

<div id="morphbg" aria-hidden="true">
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>
</div>
<canvas id="sparkle-canvas" aria-hidden="true"></canvas>

<header class="gs-topnav">
  <div class="nav-left">
    <button class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle sidebar">
      <i class="bi bi-layout-sidebar-inset"></i>
    </button>
    <a href="dashboard.php" class="nav-brand">
      <img src="assets/images/logo.jpg" class="nav-brand-logo" alt="GHOSST"
           onerror="this.style.display='none'">
      <span class="nav-brand-text">GHOSST STORE</span>
    </a>
  </div>

  <div class="nav-right">
    <div class="nav-status d-none d-md-flex">
      <span class="status-dot"></span>SYSTEM ONLINE
    </div>
        <a href="login.php" class="btn-primary" style="padding:.4rem 1rem;font-size:.65rem;text-decoration:none;">
      <i class="bi bi-box-arrow-in-right"></i> Login
    </a>
    <a href="register.php" class="btn-outline" style="padding:.4rem 1rem;font-size:.65rem;text-decoration:none;">
      <i class="bi bi-person-plus-fill"></i> Register
    </a>
      </div>
</header>

<div class="gs-overlay" id="gsOverlay" onclick="closeSidebar()"></div>

<aside class="gs-sidebar" id="gsSidebar">

    <div class="sb-user-card">
    <div class="sb-avatar" style="background:rgba(20,184,184,.1);color:var(--teal-2)"><i class="bi bi-person-fill"></i></div>
    <div>
      <div class="sb-user-name" style="font-size:.8rem;color:var(--text-lo)">Welcome, Guest</div>
      <div class="sb-user-role"><a href="login.php" style="color:var(--teal-2);text-decoration:none;font-size:.6rem">Login to your account</a></div>
    </div>
  </div>
  
  <div class="sb-section" style="margin-top:.5rem">
    <span class="sb-section-label">Store</span>
    <a href="dashboard.php" class="sb-link active"><i class="bi bi-house-fill"></i> Home</a>
    <a href="browseproducts.php" class="sb-link"><i class="bi bi-shop"></i> Browse Products</a>
        <a href="login.php" class="sb-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
    <a href="register.php" class="sb-link"><i class="bi bi-person-plus-fill"></i> Register</a>
          </div>

  <div class="sb-footer">
    <div class="sb-footer-text">GHOSST STORE · <span>v3.2</span></div>
  </div>
</aside>

<main class="gs-main">
<div class="gs-content">

  <!-- Featured Video Banner -->
  <div class="video-banner animate-on-scroll">
    <video autoplay muted loop playsinline>
      <source src="assets/video/featured.mp4" type="video/mp4">
    </video>
    <div class="video-banner-glow"></div>
    <div class="video-banner-overlay">
      <div class="video-banner-title">GHOSST STORE</div>
      <div class="video-banner-sub">Premium Game Enhancement Tools</div>
    </div>
    <div class="video-banner-accent"></div>
  </div>

  <!-- Hero Section -->
  <section class="hero-section fade-up animate-on-scroll">
    <div class="hero-accent"></div>
    <div class="hero-inner">
            <div class="hero-greeting">WELCOME</div>
      <div class="hero-name">
        GHOSST <span class="highlight">STORE</span>
      </div>
      <div style="font-size:.85rem;color:var(--text-mid);line-height:1.6;margin-bottom:1.5rem;max-width:400px;">
        Premium game enhancement tools. Browse our products and find what you need.
      </div>
      <div class="hero-actions">
        <a href="browseproducts.php" class="btn-primary">
          <i class="bi bi-shop"></i><span>Browse Products</span>
        </a>
        <a href="key-gen.php" class="btn-trial">
          <i class="bi bi-gift-fill"></i><span>Free Key</span>
        </a>
      </div>
          </div>
  </section>

  <!-- Featured Products Section -->
  <div class="featured-section fade-up d1 animate-on-scroll">
    <div class="featured-header">
      <div>
        <div class="featured-title"><i class="bi bi-stars"></i> Featured Products</div>
        <div class="featured-subtitle">Available keys ready for instant delivery</div>
      </div>
      <a href="browseproducts.php" class="view-all-link">View All Products <i class="bi bi-arrow-right"></i></a>
    </div>
        <div class="category-tabs">
      <button class="cat-tab active" data-category="all" onclick="filterProducts('all')">All Products</button>
            <button class="cat-tab" data-category="call-of-duty-mobile-1-ghosst-xtreme-v5" onclick="filterProducts('call-of-duty-mobile-1-ghosst-xtreme-v5')">
        Call Of Duty Mobile 1 Ghosst Xtreme V5 (1)
      </button>
            <button class="cat-tab" data-category="call-of-duty-mobile-2-ghosst-premium-v4" onclick="filterProducts('call-of-duty-mobile-2-ghosst-premium-v4')">
        Call Of Duty Mobile 2 Ghosst Premium V4 (1)
      </button>
            <button class="cat-tab" data-category="call-of-duty-mobile-aegisgc3" onclick="filterProducts('call-of-duty-mobile-aegisgc3')">
        Call Of Duty Mobile Aegisgc3 (1)
      </button>
            <button class="cat-tab" data-category="mobile-legend-chronoss" onclick="filterProducts('mobile-legend-chronoss')">
        Mobile Legend Chronoss (1)
      </button>
            <button class="cat-tab" data-category="mobile-legend-fluorite-mlbb" onclick="filterProducts('mobile-legend-fluorite-mlbb')">
        Mobile Legend Fluorite Mlbb (1)
      </button>
            <button class="cat-tab" data-category="pub-g-mobile-zolo-pub-g" onclick="filterProducts('pub-g-mobile-zolo-pub-g')">
        Pub G Mobile Zolo Pub G (1)
      </button>
          </div>
        <div class="products-grid" id="productsGrid">
                              <a href="browseproducts.php?game=call-of-duty-mobile-1-ghosst-xtreme-v5"
           class="product-card animate-on-scroll"
           style="text-decoration:none;"
           data-category="call-of-duty-mobile-1-ghosst-xtreme-v5"
           data-product-id="53"
           data-product-name="GHOSST Xtreme V5"
           data-product-desc="CODM Mod Menu"
           data-product-price="₱99.00"
           data-product-image="uploads/products/call-of-duty-mobile-ghosst-xtreme-v5-20260621063457-d8f710f4.jpg"
           data-product-type="Mod"
           data-product-platform="android"
           data-product-keys="222"
           onclick="trackProductView('call-of-duty-mobile-1-ghosst-xtreme-v5', 'GHOSST Xtreme V5', '₱99.00', 'uploads/products/call-of-duty-mobile-ghosst-xtreme-v5-20260621063457-d8f710f4.jpg')">
          <div class="product-img-wrap">
                          <img src="uploads/products/call-of-duty-mobile-ghosst-xtreme-v5-20260621063457-d8f710f4.jpg" alt="GHOSST Xtreme V5">
                        <div class="product-badges">
              <span class="product-badge">Mod</span>
                            <span class="product-platform-badge">
                <i class="bi bi-phone-fill"></i>
                Android              </span>
                          </div>
                        <span class="product-popular-badge"><i class="bi bi-fire" style="margin-right:.2rem"></i>Popular</span>
                        <span class="product-stock-badge stock-high">
              222 in stock
            </span>
          </div>
          <div class="product-info">
            <div class="product-name">GHOSST Xtreme V5</div>
                        <div class="product-version">v1 GHOSST Xtreme V5</div>
                        <div class="product-desc">CODM Mod Menu</div>
            <div class="product-meta">
              <div class="product-price">
                <span class="from">From</span>
                <span class="currency">₱</span>99.00              </div>
              <span class="product-buy-btn"><i class="bi bi-lightning-fill"></i> Buy Now</span>
            </div>
          </div>
        </a>
                <a href="browseproducts.php?game=call-of-duty-mobile-2-ghosst-premium-v4"
           class="product-card animate-on-scroll"
           style="text-decoration:none;"
           data-category="call-of-duty-mobile-2-ghosst-premium-v4"
           data-product-id="55"
           data-product-name="GHOSST PREMIUM V4"
           data-product-desc="GARENA VERSION SAFE MAIN ACCOUNT"
           data-product-price="₱50.00"
           data-product-image="uploads/products/call-of-duty-mobile-ghosst-premium-v4-20260621140117-7cb04f8c.jpg"
           data-product-type="Mod"
           data-product-platform="android"
           data-product-keys="66"
           onclick="trackProductView('call-of-duty-mobile-2-ghosst-premium-v4', 'GHOSST PREMIUM V4', '₱50.00', 'uploads/products/call-of-duty-mobile-ghosst-premium-v4-20260621140117-7cb04f8c.jpg')">
          <div class="product-img-wrap">
                          <img src="uploads/products/call-of-duty-mobile-ghosst-premium-v4-20260621140117-7cb04f8c.jpg" alt="GHOSST PREMIUM V4">
                        <div class="product-badges">
              <span class="product-badge">Mod</span>
                            <span class="product-platform-badge">
                <i class="bi bi-phone-fill"></i>
                Android              </span>
                          </div>
                        <span class="product-popular-badge"><i class="bi bi-fire" style="margin-right:.2rem"></i>Popular</span>
                        <span class="product-stock-badge stock-high">
              66 in stock
            </span>
          </div>
          <div class="product-info">
            <div class="product-name">GHOSST PREMIUM V4</div>
                        <div class="product-version">v2 GHOSST PREMIUM V4</div>
                        <div class="product-desc">GARENA VERSION SAFE MAIN ACCOUNT</div>
            <div class="product-meta">
              <div class="product-price">
                <span class="from">From</span>
                <span class="currency">₱</span>50.00              </div>
              <span class="product-buy-btn"><i class="bi bi-lightning-fill"></i> Buy Now</span>
            </div>
          </div>
        </a>
                <a href="browseproducts.php?game=call-of-duty-mobile-aegisgc3"
           class="product-card animate-on-scroll"
           style="text-decoration:none;"
           data-category="call-of-duty-mobile-aegisgc3"
           data-product-id="57"
           data-product-name="AEGISGC3"
           data-product-desc="Need ipa tools before buy"
           data-product-price="₱620.00"
           data-product-image="uploads/products/call-of-duty-mobile-aegisgc3-20260621161107-18e94192.jpg"
           data-product-type="Mod"
           data-product-platform="ios"
           data-product-keys="29"
           onclick="trackProductView('call-of-duty-mobile-aegisgc3', 'AEGISGC3', '₱620.00', 'uploads/products/call-of-duty-mobile-aegisgc3-20260621161107-18e94192.jpg')">
          <div class="product-img-wrap">
                          <img src="uploads/products/call-of-duty-mobile-aegisgc3-20260621161107-18e94192.jpg" alt="AEGISGC3">
                        <div class="product-badges">
              <span class="product-badge">Mod</span>
                            <span class="product-platform-badge">
                <i class="bi bi-apple"></i>
                iOS              </span>
                          </div>
                        <span class="product-popular-badge"><i class="bi bi-fire" style="margin-right:.2rem"></i>Popular</span>
                        <span class="product-stock-badge stock-high">
              29 in stock
            </span>
          </div>
          <div class="product-info">
            <div class="product-name">AEGISGC3</div>
                        <div class="product-version">vAEGISGC3</div>
                        <div class="product-desc">Need ipa tools before buy</div>
            <div class="product-meta">
              <div class="product-price">
                <span class="from">From</span>
                <span class="currency">₱</span>620.00              </div>
              <span class="product-buy-btn"><i class="bi bi-lightning-fill"></i> Buy Now</span>
            </div>
          </div>
        </a>
                <a href="browseproducts.php?game=mobile-legend-chronoss"
           class="product-card animate-on-scroll"
           style="text-decoration:none;"
           data-category="mobile-legend-chronoss"
           data-product-id="58"
           data-product-name="CHRONOSS"
           data-product-desc="Safe main account 98%"
           data-product-price="₱99.00"
           data-product-image="uploads/products/mobile-legend-chronoss-20260621183409-a5eea4d4.jpg"
           data-product-type="Mod"
           data-product-platform="android"
           data-product-keys="38"
           onclick="trackProductView('mobile-legend-chronoss', 'CHRONOSS', '₱99.00', 'uploads/products/mobile-legend-chronoss-20260621183409-a5eea4d4.jpg')">
          <div class="product-img-wrap">
                          <img src="uploads/products/mobile-legend-chronoss-20260621183409-a5eea4d4.jpg" alt="CHRONOSS">
                        <div class="product-badges">
              <span class="product-badge">Mod</span>
                            <span class="product-platform-badge">
                <i class="bi bi-phone-fill"></i>
                Android              </span>
                          </div>
                        <span class="product-popular-badge"><i class="bi bi-fire" style="margin-right:.2rem"></i>Popular</span>
                        <span class="product-stock-badge stock-high">
              38 in stock
            </span>
          </div>
          <div class="product-info">
            <div class="product-name">CHRONOSS</div>
                        <div class="product-version">vCHRONOSS</div>
                        <div class="product-desc">Safe main account 98%</div>
            <div class="product-meta">
              <div class="product-price">
                <span class="from">From</span>
                <span class="currency">₱</span>99.00              </div>
              <span class="product-buy-btn"><i class="bi bi-lightning-fill"></i> Buy Now</span>
            </div>
          </div>
        </a>
                <a href="browseproducts.php?game=mobile-legend-fluorite-mlbb"
           class="product-card animate-on-scroll"
           style="text-decoration:none;"
           data-category="mobile-legend-fluorite-mlbb"
           data-product-id="59"
           data-product-name="FLUORITE MLBB"
           data-product-desc="iOS version"
           data-product-price="₱250.00"
           data-product-image="uploads/products/mobile-legend-fluorite-mlbb-20260621183318-5d4417d7.jpg"
           data-product-type="Mod"
           data-product-platform="ios"
           data-product-keys="30"
           onclick="trackProductView('mobile-legend-fluorite-mlbb', 'FLUORITE MLBB', '₱250.00', 'uploads/products/mobile-legend-fluorite-mlbb-20260621183318-5d4417d7.jpg')">
          <div class="product-img-wrap">
                          <img src="uploads/products/mobile-legend-fluorite-mlbb-20260621183318-5d4417d7.jpg" alt="FLUORITE MLBB">
                        <div class="product-badges">
              <span class="product-badge">Mod</span>
                            <span class="product-platform-badge">
                <i class="bi bi-apple"></i>
                iOS              </span>
                          </div>
                        <span class="product-popular-badge"><i class="bi bi-fire" style="margin-right:.2rem"></i>Popular</span>
                        <span class="product-stock-badge stock-high">
              30 in stock
            </span>
          </div>
          <div class="product-info">
            <div class="product-name">FLUORITE MLBB</div>
                        <div class="product-version">vFLUORITE MLBB</div>
                        <div class="product-desc">iOS version</div>
            <div class="product-meta">
              <div class="product-price">
                <span class="from">From</span>
                <span class="currency">₱</span>250.00              </div>
              <span class="product-buy-btn"><i class="bi bi-lightning-fill"></i> Buy Now</span>
            </div>
          </div>
        </a>
                <a href="browseproducts.php?game=pub-g-mobile-zolo-pub-g"
           class="product-card animate-on-scroll"
           style="text-decoration:none;"
           data-category="pub-g-mobile-zolo-pub-g"
           data-product-id="60"
           data-product-name="ZOLO PUB G"
           data-product-desc="PUBG Mobile Loader (Internal &amp; Loader)"
           data-product-price="₱99.00"
           data-product-image="uploads/products/pub-g-mobile-zolo-pub-g-20260622053910-c03dd73f.jpg"
           data-product-type="Mod"
           data-product-platform="android"
           data-product-keys="60"
           onclick="trackProductView('pub-g-mobile-zolo-pub-g', 'ZOLO PUB G', '₱99.00', 'uploads/products/pub-g-mobile-zolo-pub-g-20260622053910-c03dd73f.jpg')">
          <div class="product-img-wrap">
                          <img src="uploads/products/pub-g-mobile-zolo-pub-g-20260622053910-c03dd73f.jpg" alt="ZOLO PUB G">
                        <div class="product-badges">
              <span class="product-badge">Mod</span>
                            <span class="product-platform-badge">
                <i class="bi bi-phone-fill"></i>
                Android              </span>
                          </div>
                        <span class="product-popular-badge"><i class="bi bi-fire" style="margin-right:.2rem"></i>Popular</span>
                        <span class="product-stock-badge stock-high">
              60 in stock
            </span>
          </div>
          <div class="product-info">
            <div class="product-name">ZOLO PUB G</div>
                        <div class="product-version">vZOLO PUB G</div>
                        <div class="product-desc">PUBG Mobile Loader (Internal &amp; Loader)</div>
            <div class="product-meta">
              <div class="product-price">
                <span class="from">From</span>
                <span class="currency">₱</span>99.00              </div>
              <span class="product-buy-btn"><i class="bi bi-lightning-fill"></i> Buy Now</span>
            </div>
          </div>
        </a>
                  </div>
  </div>

  
  
</div>
</main>

<!-- Quick-View Modal -->
<div class="qv-overlay" id="quickViewOverlay" onclick="closeQuickView(event)">
  <div class="qv-modal">
    <div class="qv-header">
      <div class="qv-title" id="qvTitle">Product Details</div>
      <button class="qv-close" onclick="closeQuickView(event)"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="qv-body">
      <img class="qv-img" id="qvImage" src="" alt="">
      <div class="qv-product-name" id="qvName"></div>
      <div class="qv-product-desc" id="qvDesc"></div>
      <div class="qv-details">
        <div class="qv-detail">
          <div class="qv-detail-label">Type</div>
          <div class="qv-detail-val" id="qvType"></div>
        </div>
        <div class="qv-detail">
          <div class="qv-detail-label">Platform</div>
          <div class="qv-detail-val" id="qvPlatform"></div>
        </div>
        <div class="qv-detail">
          <div class="qv-detail-label">Starting Price</div>
          <div class="qv-detail-val" id="qvPrice"></div>
        </div>
        <div class="qv-detail">
          <div class="qv-detail-label">Available Keys</div>
          <div class="qv-detail-val" id="qvKeys"></div>
        </div>
      </div>
      <div class="qv-actions">
        <a href="#" class="btn-primary" id="qvBuyBtn" style="flex:1;justify-content:center;">
          <i class="bi bi-lightning-fill"></i><span>Buy Now</span>
        </a>
        <button class="btn-outline" onclick="closeQuickView(event)" style="flex:0;">
          <i class="bi bi-x-lg"></i>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Mobile Bottom Bar (4 items) -->
<div class="mobile-bottom-bar">
  <a href="dashboard.php" class="mobile-bar-item active">
    <i class="bi bi-house-fill"></i>
    <span>Home</span>
  </a>
  <a href="browseproducts.php" class="mobile-bar-item">
    <i class="bi bi-shop"></i>
    <span>Shop</span>
  </a>
  <a href="topup.php" class="mobile-bar-item">
    <i class="bi bi-wallet-fill"></i>
    <span>Wallet</span>
  </a>
  <a href="profile.php" class="mobile-bar-item">
    <i class="bi bi-person-fill"></i>
    <span>Profile</span>
  </a>
</div>

<div id="toast">
  <div id="toast-icon">✅</div>
  <div>
    <div id="toast-title"></div>
    <div id="toast-msg"></div>
  </div>
</div>

<script>
function toggleSidebar(){
  document.getElementById('gsSidebar').classList.toggle('open');
  document.getElementById('gsOverlay').classList.toggle('open');
}
function closeSidebar(){
  document.getElementById('gsSidebar').classList.remove('open');
  document.getElementById('gsOverlay').classList.remove('open');
}
function toggleDropdown(e){
  e.stopPropagation();
  document.getElementById('navDrop').classList.toggle('open');
}
document.addEventListener('click', () => document.getElementById('navDrop').classList.remove('open'));
function copyKey(text){
  navigator.clipboard.writeText(text).then(()=>{
    showToast('Copied!','License key copied to clipboard','success');
  }).catch(()=>showToast('Error','Could not copy','error'));
}
let toastT;
function showToast(title, msg, type='success'){
  document.getElementById('toast-title').textContent = title;
  document.getElementById('toast-msg').textContent   = msg;
  document.getElementById('toast-icon').textContent  = type==='success' ? '✅' : '❌';
  const t = document.getElementById('toast');
  t.classList.add('show');
  clearTimeout(toastT);
  toastT = setTimeout(() => t.classList.remove('show'), 3000);
}
(function(){
  const canvas = document.getElementById('sparkle-canvas');
  if(!canvas) return;
  const ctx = canvas.getContext('2d');
  let W, H;
  const particles=[], sparkles=[];
  const PAL=[{r:20,g:184,b:184},{r:57,g:255,b:20},{r:0,g:255,b:247},{r:94,g:234,b:212},{r:255,g:255,b:255}];
  function resize(){ W=canvas.width=window.innerWidth; H=canvas.height=window.innerHeight; }
  resize(); window.addEventListener('resize', resize);
  function Particle(){ this.reset(true); }
  Particle.prototype.reset = function(init){ const c=PAL[Math.floor(Math.random()*4)]; this.x=Math.random()*W; this.y=init?Math.random()*H:H+10; this.r=Math.random()*1.8+.4; this.vx=(Math.random()-.5)*.4; this.vy=-(Math.random()*.55+.2); this.life=0; this.maxLife=Math.random()*280+160; this.cr=c.r; this.cg=c.g; this.cb=c.b; };
  Particle.prototype.update = function(){ this.x+=this.vx; this.y+=this.vy; this.life++; if(this.life>this.maxLife||this.y<-10) this.reset(false); };
  Particle.prototype.draw = function(){ const a=Math.sin((this.life/this.maxLife)*Math.PI)*.5; ctx.beginPath(); ctx.arc(this.x,this.y,this.r,0,Math.PI*2); ctx.fillStyle=`rgba(${this.cr},${this.cg},${this.cb},${a})`; ctx.fill(); };
  function Sparkle(){ this.reset(true); }
  Sparkle.prototype.reset = function(init){ const c=PAL[Math.floor(Math.random()*PAL.length)]; this.x=Math.random()*W; this.y=init?Math.random()*H:Math.random()*H; this.size=Math.random()*2+.4; this.life=init?Math.random()*120:0; this.maxLife=Math.random()*100+60; this.cr=c.r; this.cg=c.g; this.cb=c.b; this.vx=(Math.random()-.5)*.3; this.vy=(Math.random()-.5)*.3; this.rot=Math.random()*Math.PI; };
  Sparkle.prototype.update = function(){ this.x+=this.vx; this.y+=this.vy; this.life++; if(this.life>this.maxLife) this.reset(false); };
  Sparkle.prototype.draw = function(){ const t=this.life/this.maxLife, a=Math.sin(t*Math.PI)*.8, s=this.size*(1-t*.3); ctx.save(); ctx.translate(this.x,this.y); ctx.rotate(this.rot+this.life*.015); ctx.globalAlpha=a; ctx.fillStyle=`rgb(${this.cr},${this.cg},${this.cb})`; ctx.beginPath(); for(let i=0;i<8;i++){const ang=(i*Math.PI)/4,rad=i%2===0?s*2.5:s*.9;i===0?ctx.moveTo(Math.cos(ang)*rad,Math.sin(ang)*rad):ctx.lineTo(Math.cos(ang)*rad,Math.sin(ang)*rad)} ctx.closePath(); ctx.fill(); const g=ctx.createRadialGradient(0,0,0,0,0,s*4); g.addColorStop(0,`rgba(${this.cr},${this.cg},${this.cb},${a*.35})`); g.addColorStop(1,`rgba(${this.cr},${this.cg},${this.cb},0)`); ctx.beginPath(); ctx.arc(0,0,s*4,0,Math.PI*2); ctx.fillStyle=g; ctx.fill(); ctx.restore(); ctx.globalAlpha=1; };
  for(let i=0;i<70;i++) particles.push(new Particle());
  for(let i=0;i<40;i++) sparkles.push(new Sparkle());
  let lastBurst=0;
  window.addEventListener('mousemove', e=>{ const now=Date.now(); if(now-lastBurst<120) return; lastBurst=now; const sp=sparkles[Math.floor(Math.random()*sparkles.length)]; sp.x=e.clientX+(Math.random()-.5)*40; sp.y=e.clientY+(Math.random()-.5)*40; sp.life=0; sp.maxLife=60+Math.random()*40; sp.size=Math.random()*2+1; const c=PAL[Math.floor(Math.random()*PAL.length)]; sp.cr=c.r; sp.cg=c.g; sp.cb=c.b; });
  function tick(){ ctx.clearRect(0,0,W,H); particles.forEach(p=>{p.update();p.draw()}); sparkles.forEach(s=>{s.update();s.draw()}); requestAnimationFrame(tick); }
  tick();
})();

/* ===== NUMBER COUNT-UP ANIMATION ===== */
function animateCountUp(element, target, duration = 1500) {
  const start = 0;
  const startTime = performance.now();
  const isDecimal = target % 1 !== 0;

  function easeOutExpo(t) {
    return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
  }

  function update(currentTime) {
    const elapsed = currentTime - startTime;
    const progress = Math.min(elapsed / duration, 1);
    const easedProgress = easeOutExpo(progress);
    const current = start + (target - start) * easedProgress;

    if (isDecimal) {
      element.textContent = current.toFixed(2);
    } else {
      element.textContent = Math.floor(current).toLocaleString();
    }

    if (progress < 1) {
      requestAnimationFrame(update);
    }
  }

  requestAnimationFrame(update);
}

/* ===== INTERSECTION OBSERVER FOR SCROLL ANIMATIONS ===== */
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const scrollObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry, index) => {
    if (entry.isIntersecting) {
      setTimeout(() => {
        entry.target.classList.add('visible');
      }, index * 80);
      scrollObserver.unobserve(entry.target);
    }
  });
}, observerOptions);

document.querySelectorAll('.animate-on-scroll').forEach(el => {
  scrollObserver.observe(el);
});

/* ===== PRODUCT CARD 3D TILT EFFECT ===== */
function initCardTilt() {
  document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      const rotateX = (y - centerY) / 20;
      const rotateY = (centerX - x) / 20;

      card.style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-3px)`;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = 'perspective(800px) rotateX(0) rotateY(0) translateY(0)';
    });
  });
}

initCardTilt();

/* ===== DOUBLE-CLICK FOR QUICK VIEW ===== */
document.querySelectorAll('.product-card[data-product-id]').forEach(card => {
  card.addEventListener('dblclick', (e) => {
    e.preventDefault();
    openQuickView(card.dataset.productId);
  });
});

/* ===== RIPPLE EFFECT ON BUTTONS ===== */
function createRipple(event) {
  const button = event.currentTarget;
  const circle = document.createElement('span');
  const diameter = Math.max(button.clientWidth, button.clientHeight);
  const radius = diameter / 2;

  circle.style.width = circle.style.height = `${diameter}px`;
  circle.style.left = `${event.clientX - button.getBoundingClientRect().left - radius}px`;
  circle.style.top = `${event.clientY - button.getBoundingClientRect().top - radius}px`;
  circle.classList.add('ripple');

  const existingRipple = button.querySelector('.ripple');
  if (existingRipple) existingRipple.remove();

  button.appendChild(circle);
}

document.querySelectorAll('.btn-primary, .btn-outline, .product-buy-btn').forEach(btn => {
  btn.addEventListener('click', createRipple);
});

/* ===== CATEGORY TAB FILTERING ===== */
function filterProducts(category) {
  const cards = document.querySelectorAll('.product-card[data-category]');
  const tabs = document.querySelectorAll('.cat-tab');

  tabs.forEach(tab => tab.classList.remove('active'));
  event.currentTarget.classList.add('active');

  cards.forEach((card, index) => {
    const cardCategory = card.dataset.category;

    if (category === 'all' || cardCategory === category) {
      card.style.display = '';
      card.style.opacity = '0';
      card.style.transform = 'translateY(20px)';
      setTimeout(() => {
        card.style.transition = 'opacity .3s ease, transform .3s ease';
        card.style.opacity = '1';
        card.style.transform = 'translateY(0)';
      }, index * 60);
    } else {
      card.style.display = 'none';
    }
  });
}

/* ===== TIMELINE TAB SWITCHING ===== */
function switchTimelineTab(tab) {
  document.querySelectorAll('.timeline-tab').forEach(t => t.classList.remove('active'));
  document.querySelectorAll('.timeline-panel').forEach(p => p.classList.remove('active'));
  
  event.currentTarget.classList.add('active');
  document.getElementById('timeline-' + tab).classList.add('active');
}

/* ===== QUICK-VIEW MODAL ===== */
function openQuickView(productId) {
  const card = document.querySelector(`[data-product-id="${productId}"]`);
  if (!card) return;

  const overlay = document.getElementById('quickViewOverlay');
  const image = card.dataset.productImage;
  const placeholder = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="400" height="200" viewBox="0 0 400 200"%3E%3Crect fill="%23091318" width="400" height="200"/%3E%3Ctext fill="%2314b8b8" font-family="sans-serif" font-size="40" x="50%25" y="50%25" text-anchor="middle" dy=".3em"%3E%F0%9F%8E%AE%3C/text%3E%3C/svg%3E';

  document.getElementById('qvImage').src = image || placeholder;
  document.getElementById('qvName').textContent = card.dataset.productName;
  document.getElementById('qvDesc').textContent = card.dataset.productDesc;
  document.getElementById('qvType').textContent = card.dataset.productType;
  document.getElementById('qvPlatform').textContent = card.dataset.productPlatform || 'N/A';
  document.getElementById('qvPrice').textContent = card.dataset.productPrice;
  document.getElementById('qvKeys').textContent = card.dataset.productKeys + ' available';
  document.getElementById('qvBuyBtn').href = card.href;

  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeQuickView(event) {
  if (event.target === document.getElementById('quickViewOverlay') || event.currentTarget.classList.contains('qv-close') || event.currentTarget.classList.contains('btn-outline')) {
    document.getElementById('quickViewOverlay').classList.remove('open');
    document.body.style.overflow = '';
  }
}

/* ===== RECENTLY VIEWED TRACKING ===== */
function trackProductView(slug, name, price, image) {
  let recentlyViewed = JSON.parse(localStorage.getItem('ghosst_rv') || '[]');

  recentlyViewed = recentlyViewed.filter(item => item.slug !== slug);

  recentlyViewed.unshift({ slug, name, price, image, timestamp: Date.now() });

  if (recentlyViewed.length > 6) recentlyViewed = recentlyViewed.slice(0, 6);

  localStorage.setItem('ghosst_rv', JSON.stringify(recentlyViewed));
}

/* ===== ANIMATE STATS ON LOAD ===== */
window.addEventListener('load', () => {
  document.querySelectorAll('.stat-val').forEach(el => {
    const text = el.textContent.replace(/[^0-9.]/g, '');
    const value = parseFloat(text);
    if (!isNaN(value) && value > 0) {
      const prefix = el.textContent.match(/^[^0-9]*/)[0];
      el.textContent = prefix;
      const span = document.createElement('span');
      span.classList.add('count-up');
      el.appendChild(span);
      animateCountUp(span, value, 1800);
    }
  });
});

</script>



<!-- WidgetBot - Discord Chat Widget -->
<script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3"></script>
<script>
  new Crate({
    server: '1516317417586823208',
    channel: '1516317418492788861'
  })
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v833ccba57c9e4d2798f2e76cebdd09a11778172276447" integrity="sha512-57MDmcccJXYtNnH+ZiBwzC4jb2rvgVCEokYN+L/nLlmO8rfYT/gIpW2A569iJ/3b+0UEasghjuZH/ma3wIs/EQ==" data-cf-beacon='{"version":"2024.11.0","token":"8cc00a5444e74048bc984a52b7ab77fb","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'a11d08ffff35566d',t:'MTc4MjQ4NTUzOQ=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>

</html>



