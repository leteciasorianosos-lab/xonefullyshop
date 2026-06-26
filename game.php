

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Browse Products — GHOSST STORE</title>
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

.nav-left { display: flex; align-items: center; gap: 1rem; }

.sidebar-toggle {
  background: none; border: 1.5px solid var(--border); border-radius: 7px;
  width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;
  color: var(--text-mid); cursor: pointer; transition: all .2s; font-size: 1rem;
}
.sidebar-toggle:hover { border-color: var(--teal-2); color: var(--teal-2); background: rgba(20,184,184,.06); }

.nav-brand { display: flex; align-items: center; gap: .6rem; text-decoration: none; }
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

.page-header {
  margin-bottom: 1.5rem;
}
.page-title {
  font-family: var(--ff-display);
  font-size: clamp(1.3rem, 3vw, 1.8rem);
  font-weight: 700;
  color: var(--text-hi);
  display: flex;
  align-items: center;
  gap: .75rem;
}
.page-title i {
  color: var(--teal-2);
  text-shadow: var(--glow-sm);
}
.page-subtitle {
  color: var(--text-mid);
  font-size: .8rem;
  margin-top: .35rem;
  font-family: var(--ff-mono);
  font-size: .6rem;
  letter-spacing: .05em;
}

.filter-section {
  background: rgba(9,19,24,.7);
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 1rem 1.25rem;
  margin-bottom: 1.25rem;
  transition: all .3s;
  backdrop-filter: blur(12px);
}
.filter-section:hover {
  border-color: var(--border-hi);
}
.filter-row {
  display: flex;
  flex-wrap: wrap;
  gap: .75rem;
  align-items: flex-end;
}
.filter-group {
  flex: 1;
  min-width: 140px;
}
.filter-label {
  font-family: var(--ff-mono);
  font-size: .55rem;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--text-lo);
  margin-bottom: .3rem;
  display: flex;
  align-items: center;
  gap: .4rem;
}
.filter-label i { font-size: .7rem; color: var(--teal-2); }
.filter-select {
  width: 100%;
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 8px;
  padding: .5rem 1.75rem .5rem .75rem;
  color: var(--text-hi);
  font-family: var(--ff-body);
  font-size: .8rem;
  cursor: pointer;
  transition: all .2s;
  appearance: none;
  -webkit-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%238ab8be' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right .75rem center;
  background-size: 12px;
}
.filter-select:hover, .filter-select:focus {
  border-color: var(--teal-2);
  outline: none;
  box-shadow: 0 0 0 2px rgba(20,184,184,.12);
}
.filter-select option {
  background: var(--bg-card);
  color: var(--text-hi);
}
.search-wrap {
  display: flex;
  align-items: center;
  gap: .4rem;
  background: rgba(20,184,184,.06);
  border: 1px solid var(--border);
  border-radius: 8px;
  padding: .5rem .75rem;
  transition: all .2s;
}
.search-wrap:focus-within {
  border-color: var(--teal-2);
  box-shadow: 0 0 0 2px rgba(20,184,184,.12);
}
.search-wrap i {
  color: var(--text-lo);
  font-size: .85rem;
}
.search-wrap input {
  background: transparent;
  border: none;
  color: var(--text-hi);
  width: 100%;
  outline: none;
  font-family: var(--ff-body);
  font-size: .8rem;
}
.search-wrap input::placeholder {
  color: var(--text-lo);
}
.clear-filters {
  display: inline-flex;
  align-items: center;
  gap: .35rem;
  padding: .5rem 1rem;
  background: rgba(239,68,68,.08);
  border: 1px solid rgba(239,68,68,.2);
  border-radius: 8px;
  color: #fca5a5;
  text-decoration: none;
  font-family: var(--ff-mono);
  font-size: .65rem;
  transition: all .2s;
}
.clear-filters:hover {
  background: rgba(239,68,68,.15);
  border-color: var(--red);
}

.filter-chips {
  display: flex;
  flex-wrap: wrap;
  gap: .4rem;
  margin-bottom: 1rem;
}
.filter-chip {
  display: inline-flex;
  align-items: center;
  gap: .35rem;
  padding: .3rem .65rem;
  background: rgba(20,184,184,.08);
  border: 1px solid rgba(20,184,184,.2);
  border-radius: 50px;
  font-family: var(--ff-mono);
  font-size: .6rem;
  color: var(--teal-3);
}
.filter-chip a {
  color: inherit;
  text-decoration: none;
  font-size: .8rem;
  opacity: .6;
  transition: opacity .2s;
}
.filter-chip a:hover {
  opacity: 1;
}

.game-section {
  margin-bottom: 2rem;
}
.game-header {
  display: flex;
  align-items: center;
  gap: .75rem;
  margin-bottom: 1rem;
  padding-bottom: .75rem;
  border-bottom: 1px solid var(--border);
  position: relative;
}
.game-header::after {
  content: '';
  position: absolute;
  bottom: -1px;
  left: 0;
  width: 100px;
  height: 2px;
  background: linear-gradient(90deg, var(--teal-2), transparent);
}
.game-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: rgba(20,184,184,.08);
  border: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  flex-shrink: 0;
}
.game-icon img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform .3s;
}
.game-icon:hover img {
  transform: scale(1.05);
}
.game-icon .fallback-icon {
  font-size: 1.5rem;
  color: var(--teal-2);
}
.game-info {
  flex: 1;
}
.game-name {
  font-family: var(--ff-display);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--text-hi);
  letter-spacing: .02em;
}
.game-meta {
  font-family: var(--ff-mono);
  font-size: .55rem;
  color: var(--text-lo);
  margin-top: .15rem;
}
.game-badge {
  background: rgba(20,184,184,.08);
  border: 1px solid var(--border);
  border-radius: 6px;
  padding: .3rem .6rem;
  font-family: var(--ff-mono);
  font-size: .6rem;
  color: var(--teal-3);
  display: flex;
  align-items: center;
  gap: .3rem;
}

.products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 1rem;
}
.product-card {
  background: rgba(9,19,24,.9);
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  transition: all .3s cubic-bezier(.4,0,.2,1);
  position: relative;
}
.product-card:hover {
  transform: translateY(-3px);
  border-color: var(--border-hi);
  box-shadow: 0 12px 32px rgba(0,0,0,.4), var(--glow-sm);
}
.card-accent {
  height: 2px;
  width: 100%;
  background: linear-gradient(90deg, var(--teal-2), var(--teal-neon), transparent);
}
.card-media {
  height: 140px;
  position: relative;
  overflow: hidden;
  background: linear-gradient(135deg, rgba(20,184,184,.08), rgba(0,0,0,.3));
}
.card-media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform .4s;
}
.product-card:hover .card-media img {
  transform: scale(1.05);
}
.card-media .fallback {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.5rem;
  color: var(--teal-2);
}
.card-media-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, rgba(2,6,8,0) 40%, rgba(2,6,8,.9) 100%);
  pointer-events: none;
  z-index: 1;
}
.stock-overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: transparent;
  backdrop-filter: none;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  padding-bottom: .6rem;
  z-index: 2;
  pointer-events: none;
}
.stock-overlay span {
  background: rgba(239,68,68,.88);
  padding: .2rem .65rem;
  border-radius: 50px;
  font-family: var(--ff-mono);
  font-size: .55rem;
  font-weight: 700;
  letter-spacing: .08em;
  text-transform: uppercase;
  box-shadow: 0 0 10px rgba(239,68,68,.4);
  border: 1px solid rgba(255,255,255,.1);
}
.card-content {
  padding: 1rem;
}
.card-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: .5rem;
}
.card-title {
  font-family: var(--ff-display);
  font-size: .85rem;
  font-weight: 700;
  color: var(--text-hi);
  letter-spacing: .02em;
}
.type-badge {
  display: inline-flex;
  align-items: center;
  gap: .3rem;
  padding: .2rem .5rem;
  border-radius: 50px;
  font-family: var(--ff-mono);
  font-size: .55rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .04em;
}
.platform-badge {
  display: inline-flex;
  align-items: center;
  gap: .25rem;
  padding: .15rem .45rem;
  border-radius: 50px;
  font-family: var(--ff-mono);
  font-size: .5rem;
  font-weight: 600;
  margin-top: .2rem;
}
.platform-badge-android {
  background: rgba(57,255,20,.1);
  border: 1px solid rgba(57,255,20,.25);
  color: #86efac;
}
.platform-badge-ios {
  background: rgba(20,184,184,.1);
  border: 1px solid rgba(20,184,184,.25);
  color: var(--teal-3);
}
.platform-badge-both {
  background: rgba(245,158,11,.1);
  border: 1px solid rgba(245,158,11,.25);
  color: #fcd34d;
}
.stock-badge {
  display: inline-flex;
  align-items: center;
  gap: .3rem;
  font-family: var(--ff-mono);
  font-size: .5rem;
  padding: .15rem .45rem;
  border-radius: 50px;
  margin-top: .2rem;
}
.stock-badge.in-stock {
  background: rgba(57,255,20,.08);
  border: 1px solid rgba(57,255,20,.2);
  color: #86efac;
}
.stock-badge.low-stock {
  background: rgba(245,158,11,.08);
  border: 1px solid rgba(245,158,11,.25);
  color: #fcd34d;
}
.stock-badge.out-of-stock {
  background: rgba(239,68,68,.08);
  border: 1px solid rgba(239,68,68,.2);
  color: #fca5a5;
}
.pulse-dot {
  width: 4px;
  height: 4px;
  border-radius: 50%;
  background: var(--ecto-green);
  box-shadow: 0 0 4px var(--ecto-green);
  animation: pulse 1.5s infinite;
}
@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: .4; }
}

.features-list {
  display: flex;
  flex-wrap: wrap;
  gap: .35rem;
  margin: .5rem 0;
}
.feature-pill {
  padding: .15rem .5rem;
  background: rgba(20,184,184,.06);
  border: 1px solid rgba(20,184,184,.15);
  border-radius: 50px;
  font-size: .55rem;
  color: var(--teal-3);
  font-family: var(--ff-mono);
}

.price-section {
  margin: .5rem 0;
}
.price-range {
  font-family: var(--ff-display);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--gold);
}
.price-range small {
  font-size: .6rem;
  color: var(--text-lo);
  font-weight: normal;
}

.btn-buy {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: .5rem;
  width: 100%;
  padding: .6rem .75rem;
  background: linear-gradient(135deg, var(--teal-1), var(--teal-2));
  border: none;
  border-radius: 10px;
  font-family: var(--ff-display);
  font-size: .7rem;
  font-weight: 700;
  letter-spacing: .07em;
  text-transform: uppercase;
  color: #fff;
  text-decoration: none;
  cursor: pointer;
  transition: all .2s;
  position: relative;
  overflow: hidden;
  transform: none;
}
.btn-buy:hover {
  transform: none;
}
.btn-buy::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, var(--teal-2), var(--teal-neon));
  opacity: 0;
  transition: opacity .2s;
}
.btn-buy span, .btn-buy i {
  position: relative;
  z-index: 1;
}
.btn-buy:hover::before {
  opacity: 1;
}
.btn-buy:hover {
  transform: none;
  box-shadow: none;
}
.btn-buy.disabled {
  opacity: .5;
  cursor: not-allowed;
  pointer-events: none;
  background: linear-gradient(135deg, #3a3a3a, #4a4a4a);
}
.btn-buy.disabled::before {
  display: none;
}

.empty-state {
  text-align: center;
  padding: 3rem 1.5rem;
  background: rgba(9,19,24,.7);
  border: 1px solid var(--border);
  border-radius: 16px;
}
.empty-icon {
  width: 64px;
  height: 64px;
  border-radius: 50%;
  background: rgba(20,184,184,.06);
  border: 1px solid rgba(20,184,184,.15);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1rem;
  font-size: 1.5rem;
  color: var(--teal-2);
}
.empty-title {
  font-family: var(--ff-display);
  font-size: 1rem;
  font-weight: 700;
  margin-bottom: .35rem;
}
.empty-sub {
  color: var(--text-mid);
  margin-bottom: 1.25rem;
  font-size: .8rem;
}

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

.reveal {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity .5s ease, transform .5s ease;
}
.reveal.in {
  opacity: 1;
  transform: translateY(0);
}

/* ===== SHIMMER EFFECT ON CARDS ===== */
.product-card::after {
  content: '';
  position: absolute;
  top: 0; left: -100%;
  width: 50%; height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,.03), transparent);
  transition: left .5s ease;
  pointer-events: none;
  z-index: 3;
}
.product-card:hover::after {
  left: 120%;
}

/* ===== RIPPLE EFFECT ===== */
.btn-buy {
  position: relative;
  overflow: hidden;
}
.ripple {
  position: absolute;
  border-radius: 50%;
  background: rgba(255,255,255,.2);
  transform: scale(0);
  animation: rippleAnim .5s ease-out;
  pointer-events: none;
}
@keyframes rippleAnim {
  to { transform: scale(2); opacity: 0; }
}

/* ===== GLASS-MORPHISM ===== */
.filter-section {
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
}

/* ===== MOBILE RESPONSIVE ===== */
@media (max-width: 768px) {
  .filter-group { min-width: 100%; }
  .products-grid { grid-template-columns: 1fr; }
  .card-media { height: 120px; }
}
@media (min-width: 769px) and (max-width: 1024px) {
  .products-grid { grid-template-columns: repeat(2, 1fr); }
}

/* Responsive top navigation */
.d-none { display: none !important; }
@media (min-width: 576px) { .d-sm-inline { display: inline !important; } }
@media (min-width: 768px) { .d-md-flex { display: flex !important; } }
.gs-topnav .nav-left { min-width: 0; flex: 1 1 auto; }
.gs-topnav .nav-brand { min-width: 0; }
@media (max-width: 520px) {
  .gs-topnav { padding: 0 .85rem !important; gap: .5rem; }
  .gs-topnav .nav-left { gap: .55rem; }
  .gs-topnav .nav-right { gap: .45rem; flex-shrink: 0; }
  .gs-topnav .sidebar-toggle { width: 32px; height: 32px; }
  .gs-topnav .nav-brand-logo { width: 30px; height: 30px; }
  .gs-topnav .nav-brand-text { font-size: .92rem; letter-spacing: .06em; }
  .gs-topnav .nav-wallet { padding: .32rem .55rem; gap: .35rem; }
  .gs-topnav .nav-wallet .amount { font-size: .78rem; }
  .gs-topnav .nav-user-btn { padding: .32rem .5rem; gap: .35rem; }
}
@media (max-width: 370px) {
  .gs-topnav { padding: 0 .65rem !important; }
  .gs-topnav .nav-brand-text { font-size: .82rem; max-width: 6.6rem; }
  .gs-topnav .nav-wallet i { display: none; }
  .gs-topnav .nav-wallet { padding-inline: .45rem; }
}

/* ===== GAME CARD STYLES ===== */
.game-card {
  background: var(--bg-card);
  border: 1px solid var(--border);
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.3s ease;
}

.game-card:hover {
  border-color: var(--border-hi);
  box-shadow: 0 12px 32px rgba(0,0,0,.4), var(--glow-sm);
}

.game-card-header:hover {
  opacity: 0.95;
}

.version-card:hover {
  border-color: var(--teal-2) !important;
  background: rgba(20,184,184,.05) !important;
  box-shadow: 0 4px 12px rgba(20,184,184,.15);
}

.versions-container {
  scrollbar-width: thin;
  scrollbar-color: var(--teal-1) var(--bg-void);
}

.versions-container::-webkit-scrollbar {
  width: 4px;
}

.versions-container::-webkit-scrollbar-track {
  background: var(--bg-void);
}

.versions-container::-webkit-scrollbar-thumb {
  background: var(--teal-1);
  border-radius: 2px;
}

/* Mobile responsive for game cards */
@media (max-width: 768px) {
  #gamesGrid {
    grid-template-columns: 1fr;
  }
  
  .game-card-header {
    height: 160px !important;
  }
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
@media (max-width: 768px) {
  .mobile-bottom-bar { display: flex; }
  .gs-content { padding-bottom: 70px; }
}
</style>
<link rel="stylesheet" href="browseproducts.css?v=1782485548">
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
  
  <div class="sb-section">
    <span class="sb-section-label">Main</span>
    <a href="dashboard.php" class="sb-link"><i class="bi bi-house-fill"></i> Home</a>
      </div>

  
  <div class="sb-section" style="margin-top:.5rem">
    <span class="sb-section-label">Store</span>
    <a href="browseproducts.php" class="sb-link active"><i class="bi bi-shop"></i> Browse Products</a>
    <a href="topup.php"          class="sb-link"><i class="bi bi-plus-circle-fill"></i> Add Funds</a>
        <a href="login.php" class="sb-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
    <a href="register.php" class="sb-link"><i class="bi bi-person-plus-fill"></i> Register</a>
      </div>

  <div class="sb-footer">
    <div class="sb-footer-text">GHOSST STORE · <span>v3.2</span></div>
  </div>
</aside>

<!-- ══ MAIN CONTENT ══════════════════════════════════════════════════ -->
<main class="gs-main">
<div class="gs-content">

  <!-- Hero Banner -->
  <div class="hero-banner fade-up">
    <video autoplay muted loop playsinline>
      <source src="assets/video/featured.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay">
      <div class="hero-glow"></div>
      <div class="hero-content">
        <div class="hero-title">SHOP</div>
        <div class="hero-sub">Premium Game Enhancement Tools</div>
      </div>
    </div>
    <div class="hero-accent"></div>
  </div>

  <!-- Page Header -->
  <div class="page-header fade-up d1">
    <div class="page-title">
      <i class="bi bi-shop"></i>
      <span>Browse Products</span>
    </div>
    <div class="page-subtitle">
      Select your game and platform — instant delivery after purchase
    </div>
  </div>

  <!-- Filter Bar -->
  <form method="GET" action="" id="filterForm">
    <div class="filter-section fade-up d1">
      <div class="filter-row">
        <div class="filter-group">
          <div class="filter-label"><i class="bi bi-controller"></i> GAME</div>
          <select name="game" class="filter-select" onchange="document.getElementById('filterForm').submit()">
            <option value="all" selected>All Games</option>
                        <option value="BLOODSTRIKE" >
              BLOODSTRIKE            </option>
                        <option value="CALL OF DUTY MOBILE" >
              CALL OF DUTY MOBILE            </option>
                        <option value="MOBILE LEGEND" >
              MOBILE LEGEND            </option>
                        <option value="PUB G MOBILE" >
              PUB G MOBILE            </option>
                      </select>
        </div>
        <div class="filter-group">
          <div class="filter-label"><i class="bi bi-phone"></i> PLATFORM</div>
          <select name="platform" class="filter-select" onchange="document.getElementById('filterForm').submit()">
            <option value="all" selected>Select Device</option>
            <option value="android" >Android</option>
            <option value="ios" >iOS</option>
            <option value="both" >Both</option>
          </select>
        </div>
        <div class="filter-group" style="flex: 2;">
          <div class="filter-label"><i class="bi bi-search"></i> SEARCH</div>
          <div class="search-wrap">
            <i class="bi bi-search"></i>
            <input type="text" name="search" placeholder="Search products..." value="" id="searchInput">
          </div>
        </div>
              </div>
    </div>
  </form>

  <!-- Active Filter Chips -->
    
  <!-- Results Info -->
  <div class="fade-up d2" style="margin-bottom: 1.5rem;">
    <span class="small" style="color: var(--text-lo); font-family: var(--ff-mono);">
      <i class="bi bi-info-circle"></i> Showing <strong class="text-teal-3">4</strong> games · 
      <strong class="text-teal-3">10</strong> products available
    </span>
  </div>

  <!-- Products Grid -->
    
  <!-- Game Cards Grid -->
  <div id="gamesGrid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(340px,1fr));gap:2rem;margin-top:1rem">
    
  <!-- Game Card -->
  <a href="game.php?name=BLOODSTRIKE" class="game-card reveal" data-game="bloodstrike" style="text-decoration:none;color:inherit;display:block">
    <!-- Game Card Header with Image -->
    <div class="game-card-header" style="position:relative;height:200px;overflow:hidden;border-radius:16px 16px 0 0">
              <img src="uploads/products/bloodstrike_hero-20260624074920-16401054.jpg" style="width:100%;height:100%;object-fit:cover" alt="BLOODSTRIKE">
            <div style="position:absolute;inset:0;background:linear-gradient(to bottom, transparent 30%, rgba(0,0,0,.85))"></div>
      <!-- Arrow indicator -->
      <div style="position:absolute;top:1rem;right:1rem;z-index:2;background:rgba(0,0,0,.5);border-radius:50%;width:32px;height:32px;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(8px)">
        <i class="bi bi-arrow-right" style="color:var(--text-hi);font-size:0.9rem"></i>
      </div>
    </div>
    
    <!-- Game Card Body -->
    <div class="game-card-body" style="padding:1rem 1.25rem;padding-top:1.5rem;background:var(--bg-card);border:1px solid var(--border);border-top:none;border-radius:0 0 16px 16px;position:relative">
      <!-- Game Logo (overlapping from header) -->
              <div style="position:absolute;top:-32px;right:1rem;width:80px;height:80px;border-radius:14px;overflow:hidden;border:2px solid var(--border-hi);box-shadow:0 4px 16px rgba(0,0,0,.5);background:var(--bg-card)">
          <img src="uploads/products/bloodstrike_logo-20260624064230-0a68791d.webp" style="width:100%;height:100%;object-fit:cover" alt="BLOODSTRIKE logo">
        </div>
              <h3 style="font-family:var(--ff-display);font-size:1.2rem;font-weight:700;color:var(--text-hi);margin-bottom:0.3rem;text-shadow:0 2px 8px rgba(0,0,0,.5)">
          BLOODSTRIKE        </h3>
        <div style="font-size:0.7rem;color:var(--text-mid);font-family:var(--ff-mono)">
          3 versions available
        </div>
        <p style="font-size:0.8rem;color:var(--text-mid);margin:0.75rem 0;line-height:1.4">
          MOD MENU        </p>
        <div class="btn-buy" style="width:100%;padding:0.7rem;display:flex;align-items:center;justify-content:center;gap:0.5rem;font-size:0.75rem">
          <i class="bi bi-eye-fill"></i>
          <span>View All Versions</span>
          <i class="bi bi-arrow-right" style="font-size:.7rem"></i>
        </div>
    </div>
  </a>
  
    
  <!-- Game Card -->
  <a href="game.php?name=CALL+OF+DUTY+MOBILE" class="game-card reveal" data-game="call of duty mobile" style="text-decoration:none;color:inherit;display:block">
    <!-- Game Card Header with Image -->
    <div class="game-card-header" style="position:relative;height:200px;overflow:hidden;border-radius:16px 16px 0 0">
              <img src="uploads/products/call-of-duty-mobile_hero-20260621165332-cb114ee7.jpg" style="width:100%;height:100%;object-fit:cover" alt="CALL OF DUTY MOBILE">
            <div style="position:absolute;inset:0;background:linear-gradient(to bottom, transparent 30%, rgba(0,0,0,.85))"></div>
      <!-- Arrow indicator -->
      <div style="position:absolute;top:1rem;right:1rem;z-index:2;background:rgba(0,0,0,.5);border-radius:50%;width:32px;height:32px;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(8px)">
        <i class="bi bi-arrow-right" style="color:var(--text-hi);font-size:0.9rem"></i>
      </div>
    </div>
    
    <!-- Game Card Body -->
    <div class="game-card-body" style="padding:1rem 1.25rem;padding-top:1.5rem;background:var(--bg-card);border:1px solid var(--border);border-top:none;border-radius:0 0 16px 16px;position:relative">
      <!-- Game Logo (overlapping from header) -->
              <div style="position:absolute;top:-32px;right:1rem;width:80px;height:80px;border-radius:14px;overflow:hidden;border:2px solid var(--border-hi);box-shadow:0 4px 16px rgba(0,0,0,.5);background:var(--bg-card)">
          <img src="uploads/products/call-of-duty-mobile_logo-20260621090159-701a90a6.png" style="width:100%;height:100%;object-fit:cover" alt="CALL OF DUTY MOBILE logo">
        </div>
              <h3 style="font-family:var(--ff-display);font-size:1.2rem;font-weight:700;color:var(--text-hi);margin-bottom:0.3rem;text-shadow:0 2px 8px rgba(0,0,0,.5)">
          CALL OF DUTY MOBILE        </h3>
        <div style="font-size:0.7rem;color:var(--text-mid);font-family:var(--ff-mono)">
          3 versions available
        </div>
        <p style="font-size:0.8rem;color:var(--text-mid);margin:0.75rem 0;line-height:1.4">
          CODM Mod Menu        </p>
        <div class="btn-buy" style="width:100%;padding:0.7rem;display:flex;align-items:center;justify-content:center;gap:0.5rem;font-size:0.75rem">
          <i class="bi bi-eye-fill"></i>
          <span>View All Versions</span>
          <i class="bi bi-arrow-right" style="font-size:.7rem"></i>
        </div>
    </div>
  </a>
  
    
  <!-- Game Card -->
  <a href="game.php?name=MOBILE+LEGEND" class="game-card reveal" data-game="mobile legend" style="text-decoration:none;color:inherit;display:block">
    <!-- Game Card Header with Image -->
    <div class="game-card-header" style="position:relative;height:200px;overflow:hidden;border-radius:16px 16px 0 0">
              <img src="uploads/products/mobile-legend_hero-20260621165340-22e06477.jpg" style="width:100%;height:100%;object-fit:cover" alt="MOBILE LEGEND">
            <div style="position:absolute;inset:0;background:linear-gradient(to bottom, transparent 30%, rgba(0,0,0,.85))"></div>
      <!-- Arrow indicator -->
      <div style="position:absolute;top:1rem;right:1rem;z-index:2;background:rgba(0,0,0,.5);border-radius:50%;width:32px;height:32px;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(8px)">
        <i class="bi bi-arrow-right" style="color:var(--text-hi);font-size:0.9rem"></i>
      </div>
    </div>
    
    <!-- Game Card Body -->
    <div class="game-card-body" style="padding:1rem 1.25rem;padding-top:1.5rem;background:var(--bg-card);border:1px solid var(--border);border-top:none;border-radius:0 0 16px 16px;position:relative">
      <!-- Game Logo (overlapping from header) -->
              <div style="position:absolute;top:-32px;right:1rem;width:80px;height:80px;border-radius:14px;overflow:hidden;border:2px solid var(--border-hi);box-shadow:0 4px 16px rgba(0,0,0,.5);background:var(--bg-card)">
          <img src="uploads/products/mobile-legend_logo-20260621162250-beaae768.webp" style="width:100%;height:100%;object-fit:cover" alt="MOBILE LEGEND logo">
        </div>
              <h3 style="font-family:var(--ff-display);font-size:1.2rem;font-weight:700;color:var(--text-hi);margin-bottom:0.3rem;text-shadow:0 2px 8px rgba(0,0,0,.5)">
          MOBILE LEGEND        </h3>
        <div style="font-size:0.7rem;color:var(--text-mid);font-family:var(--ff-mono)">
          2 versions available
        </div>
        <p style="font-size:0.8rem;color:var(--text-mid);margin:0.75rem 0;line-height:1.4">
          Safe main account 98%        </p>
        <div class="btn-buy" style="width:100%;padding:0.7rem;display:flex;align-items:center;justify-content:center;gap:0.5rem;font-size:0.75rem">
          <i class="bi bi-eye-fill"></i>
          <span>View All Versions</span>
          <i class="bi bi-arrow-right" style="font-size:.7rem"></i>
        </div>
    </div>
  </a>
  
    
  <!-- Game Card -->
  <a href="game.php?name=PUB+G+MOBILE" class="game-card reveal" data-game="pub g mobile" style="text-decoration:none;color:inherit;display:block">
    <!-- Game Card Header with Image -->
    <div class="game-card-header" style="position:relative;height:200px;overflow:hidden;border-radius:16px 16px 0 0">
              <img src="uploads/products/pub-g-mobile_hero-20260621184622-d55e0863.jpg" style="width:100%;height:100%;object-fit:cover" alt="PUB G MOBILE">
            <div style="position:absolute;inset:0;background:linear-gradient(to bottom, transparent 30%, rgba(0,0,0,.85))"></div>
      <!-- Arrow indicator -->
      <div style="position:absolute;top:1rem;right:1rem;z-index:2;background:rgba(0,0,0,.5);border-radius:50%;width:32px;height:32px;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(8px)">
        <i class="bi bi-arrow-right" style="color:var(--text-hi);font-size:0.9rem"></i>
      </div>
    </div>
    
    <!-- Game Card Body -->
    <div class="game-card-body" style="padding:1rem 1.25rem;padding-top:1.5rem;background:var(--bg-card);border:1px solid var(--border);border-top:none;border-radius:0 0 16px 16px;position:relative">
      <!-- Game Logo (overlapping from header) -->
              <div style="position:absolute;top:-32px;right:1rem;width:80px;height:80px;border-radius:14px;overflow:hidden;border:2px solid var(--border-hi);box-shadow:0 4px 16px rgba(0,0,0,.5);background:var(--bg-card)">
          <img src="uploads/products/pub-g-mobile_logo-20260621184622-49167066.png" style="width:100%;height:100%;object-fit:cover" alt="PUB G MOBILE logo">
        </div>
              <h3 style="font-family:var(--ff-display);font-size:1.2rem;font-weight:700;color:var(--text-hi);margin-bottom:0.3rem;text-shadow:0 2px 8px rgba(0,0,0,.5)">
          PUB G MOBILE        </h3>
        <div style="font-size:0.7rem;color:var(--text-mid);font-family:var(--ff-mono)">
          2 versions available
        </div>
        <p style="font-size:0.8rem;color:var(--text-mid);margin:0.75rem 0;line-height:1.4">
          PUBG Mobile Loader (Internal &amp; Loader)        </p>
        <div class="btn-buy" style="width:100%;padding:0.7rem;display:flex;align-items:center;justify-content:center;gap:0.5rem;font-size:0.75rem">
          <i class="bi bi-eye-fill"></i>
          <span>View All Versions</span>
          <i class="bi bi-arrow-right" style="font-size:.7rem"></i>
        </div>
    </div>
  </a>
  
    </div>
  
</div><!-- /.gs-content -->
</main>

<!-- Toast -->
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


const searchInput = document.getElementById('searchInput');
let searchTimer;
if (searchInput) {
  searchInput.addEventListener('input', () => {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => document.getElementById('filterForm').submit(), 500);
  });
  searchInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      clearTimeout(searchTimer);
      document.getElementById('filterForm').submit();
    }
  });
}

const revealObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.1, rootMargin: '40px' });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// Ripple effect on buttons
function createRipple(event) {
  const button = event.currentTarget;
  const circle = document.createElement('span');
  const diameter = Math.min(Math.max(button.clientWidth, button.clientHeight), 60);
  const radius = diameter / 2;
  circle.style.width = circle.style.height = `${diameter}px`;
  circle.style.left = `${event.clientX - button.getBoundingClientRect().left - radius}px`;
  circle.style.top = `${event.clientY - button.getBoundingClientRect().top - radius}px`;
  circle.classList.add('ripple');
  const existingRipple = button.querySelector('.ripple');
  if (existingRipple) existingRipple.remove();
  button.appendChild(circle);
  setTimeout(() => circle.remove(), 600);
}
document.querySelectorAll('.btn-buy:not(.disabled)').forEach(btn => {
  btn.addEventListener('click', createRipple);
});

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
  Particle.prototype.reset = function(init){
    const c=PAL[Math.floor(Math.random()*4)];
    this.x=Math.random()*W; this.y=init?Math.random()*H:H+10;
    this.r=Math.random()*1.8+.4; this.vx=(Math.random()-.5)*.4; this.vy=-(Math.random()*.55+.2);
    this.life=0; this.maxLife=Math.random()*280+160; this.cr=c.r; this.cg=c.g; this.cb=c.b;
  };
  Particle.prototype.update = function(){
    this.x+=this.vx; this.y+=this.vy; this.life++;
    if(this.life>this.maxLife||this.y<-10) this.reset(false);
  };
  Particle.prototype.draw = function(){
    const a=Math.sin((this.life/this.maxLife)*Math.PI)*.5;
    ctx.beginPath(); ctx.arc(this.x,this.y,this.r,0,Math.PI*2);
    ctx.fillStyle=`rgba(${this.cr},${this.cg},${this.cb},${a})`; ctx.fill();
  };

  function Sparkle(){ this.reset(true); }
  Sparkle.prototype.reset = function(init){
    const c=PAL[Math.floor(Math.random()*PAL.length)];
    this.x=Math.random()*W; this.y=init?Math.random()*H:Math.random()*H;
    this.size=Math.random()*2+.4; this.life=init?Math.random()*120:0;
    this.maxLife=Math.random()*100+60; this.cr=c.r; this.cg=c.g; this.cb=c.b;
    this.vx=(Math.random()-.5)*.3; this.vy=(Math.random()-.5)*.3; this.rot=Math.random()*Math.PI;
  };
  Sparkle.prototype.update = function(){
    this.x+=this.vx; this.y+=this.vy; this.life++;
    if(this.life>this.maxLife) this.reset(false);
  };
  Sparkle.prototype.draw = function(){
    const t=this.life/this.maxLife, a=Math.sin(t*Math.PI)*.8, s=this.size*(1-t*.3);
    ctx.save(); ctx.translate(this.x,this.y); ctx.rotate(this.rot+this.life*.015); ctx.globalAlpha=a;
    ctx.fillStyle=`rgb(${this.cr},${this.cg},${this.cb})`;
    ctx.beginPath();
    for(let i=0;i<8;i++){const ang=(i*Math.PI)/4,rad=i%2===0?s*2.5:s*.9;i===0?ctx.moveTo(Math.cos(ang)*rad,Math.sin(ang)*rad):ctx.lineTo(Math.cos(ang)*rad,Math.sin(ang)*rad)}
    ctx.closePath(); ctx.fill();
    const g=ctx.createRadialGradient(0,0,0,0,0,s*4);
    g.addColorStop(0,`rgba(${this.cr},${this.cg},${this.cb},${a*.35})`);
    g.addColorStop(1,`rgba(${this.cr},${this.cg},${this.cb},0)`);
    ctx.beginPath(); ctx.arc(0,0,s*4,0,Math.PI*2); ctx.fillStyle=g; ctx.fill();
    ctx.restore(); ctx.globalAlpha=1;
  };

  for(let i=0;i<70;i++) particles.push(new Particle());
  for(let i=0;i<40;i++) sparkles.push(new Sparkle());

  let lastBurst=0;
  window.addEventListener('mousemove', e=>{
    const now=Date.now(); if(now-lastBurst<120) return; lastBurst=now;
    const sp=sparkles[Math.floor(Math.random()*sparkles.length)];
    sp.x=e.clientX+(Math.random()-.5)*40; sp.y=e.clientY+(Math.random()-.5)*40;
    sp.life=0; sp.maxLife=60+Math.random()*40; sp.size=Math.random()*2+1;
    const c=PAL[Math.floor(Math.random()*PAL.length)]; sp.cr=c.r; sp.cg=c.g; sp.cb=c.b;
  });

  function tick(){
    ctx.clearRect(0,0,W,H);
    particles.forEach(p=>{p.update();p.draw()});
    sparkles.forEach(s=>{s.update();s.draw()});
    requestAnimationFrame(tick);
  }
  tick();
})();

</script>



<!-- WidgetBot - Discord Chat Widget -->
<script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3"></script>
<script>
  new Crate({
    server: '1516317417586823208',
    channel: '1516317418492788861'
  })
</script>

<!-- Mobile Bottom Bar (4 items) -->
<div class="mobile-bottom-bar">
  <a href="dashboard.php" class="mobile-bar-item">
    <i class="bi bi-house-fill"></i>
    <span>Home</span>
  </a>
  <a href="browseproducts.php" class="mobile-bar-item active">
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
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'a11d09331a8e566d',t:'MTc4MjQ4NTU0OA=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v833ccba57c9e4d2798f2e76cebdd09a11778172276447" integrity="sha512-57MDmcccJXYtNnH+ZiBwzC4jb2rvgVCEokYN+L/nLlmO8rfYT/gIpW2A569iJ/3b+0UEasghjuZH/ma3wIs/EQ==" data-cf-beacon='{"version":"2024.11.0","token":"8cc00a5444e74048bc984a52b7ab77fb","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>



