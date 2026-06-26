<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register — GHOSST STORE</title>
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
    --text-hi:    #e8f8f8;
    --text-mid:   #8ab8be;
    --text-lo:    #3a6168;
    --border:     rgba(20,184,184,.2);
    --border-glow:rgba(20,184,184,.5);
    --glow-teal:  0 0 30px rgba(20,184,184,.45), 0 0 80px rgba(13,122,122,.25);
    --glow-sm:    0 0 16px rgba(20,184,184,.4);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }

body {
    font-family: 'Syne', sans-serif;
    background: var(--bg-void);
    color: var(--text-hi);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
    position: relative;
    overflow-x: hidden;
}

body::after {
    content: '';
    position: fixed; inset: 0; z-index: 9999; pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
    opacity: .4;
}

#morphbg { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
#sparkle-canvas { position: fixed; inset: 0; z-index: 1; pointer-events: none; }
.blob { position: absolute; border-radius: 50%; filter: blur(90px); will-change: transform; }
.blob-1 { width:600px;height:600px;top:-15%;left:-12%;background:radial-gradient(circle at 40% 40%,rgba(57,255,20,.14) 0%,rgba(20,184,184,.09) 35%,transparent 70%);animation:blobDrift1 22s ease-in-out infinite alternate; }
.blob-2 { width:500px;height:500px;bottom:-10%;right:-10%;background:radial-gradient(circle at 55% 55%,rgba(20,184,184,.13) 0%,rgba(57,255,20,.06) 40%,transparent 70%);animation:blobDrift2 18s ease-in-out infinite alternate;animation-delay:-6s; }
.blob-3 { width:350px;height:350px;top:40%;right:15%;background:radial-gradient(circle,rgba(0,255,247,.1) 0%,rgba(57,255,20,.05) 45%,transparent 70%);animation:blobDrift3 26s ease-in-out infinite alternate;animation-delay:-12s; }
@keyframes blobDrift1 { 0%{transform:translate(0,0) scale(1) rotate(0deg);} 40%{transform:translate(60px,-50px) scale(1.08) rotate(12deg);} 100%{transform:translate(-40px,60px) scale(0.94) rotate(-8deg);} }
@keyframes blobDrift2 { 0%{transform:translate(0,0) scale(1) rotate(0deg);} 40%{transform:translate(-70px,45px) scale(1.06) rotate(-14deg);} 100%{transform:translate(50px,-60px) scale(0.96) rotate(10deg);} }
@keyframes blobDrift3 { 0%{transform:translate(0,0) scale(1) rotate(0deg);} 50%{transform:translate(40px,55px) scale(1.1) rotate(18deg);} 100%{transform:translate(-50px,-40px) scale(0.92) rotate(-12deg);} }

.reg-card {
    position: relative; z-index: 10;
    background: linear-gradient(135deg, rgba(9,19,24,.96), rgba(12,26,32,.98));
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 2.75rem 2.5rem;
    width: 100%; max-width: 440px;
    box-shadow: 0 0 0 1px rgba(20,184,184,.06), 0 0 50px rgba(20,184,184,.15), 0 32px 80px rgba(0,0,0,.6);
    backdrop-filter: blur(12px);
    overflow: hidden;
}
.reg-card::before {
    content: '';
    position: absolute; top: 0; left: 10%; right: 10%; height: 1.5px; z-index: 1;
    background: linear-gradient(90deg, transparent, var(--teal-2), var(--teal-neon), var(--teal-2), transparent);
    box-shadow: 0 0 14px rgba(20,184,184,.7);
    animation: edgeGlow 3s ease-in-out infinite;
}
@keyframes edgeGlow { 0%,100%{opacity:.6;} 50%{opacity:1;} }

.card-corner { position: absolute; width: 16px; height: 16px; pointer-events: none; z-index: 2; }
.card-corner.tl { top:12px;left:12px;border-top:1.5px solid var(--teal-2);border-left:1.5px solid var(--teal-2); }
.card-corner.tr { top:12px;right:12px;border-top:1.5px solid var(--teal-2);border-right:1.5px solid var(--teal-2); }
.card-corner.bl { bottom:12px;left:12px;border-bottom:1.5px solid var(--teal-2);border-left:1.5px solid var(--teal-2); }
.card-corner.br { bottom:12px;right:12px;border-bottom:1.5px solid var(--teal-2);border-right:1.5px solid var(--teal-2); }

.gs-brand { display:flex;align-items:center;justify-content:center;gap:.65rem;text-decoration:none;margin-bottom:1.75rem; }
.gs-brand img { width:44px;height:44px;border-radius:10px;object-fit:cover;border:1.5px solid var(--teal-2);box-shadow:var(--glow-sm); }
.gs-brand-text { font-family:'Orbitron',sans-serif;font-size:1.3rem;font-weight:700;background:linear-gradient(90deg,var(--teal-3),var(--teal-neon));-webkit-background-clip:text;-webkit-text-fill-color:transparent;letter-spacing:.08em; }

.page-title { font-family:'Orbitron',sans-serif;font-size:1.25rem;font-weight:700;color:var(--text-hi);text-align:center;margin-bottom:.5rem;letter-spacing:.05em; }
.page-sub { font-size:.82rem;color:var(--text-lo);text-align:center;margin-bottom:1.75rem;font-family:'Fira Code',monospace;letter-spacing:.08em; }

.live-dot { display:inline-block;width:7px;height:7px;border-radius:50%;background:var(--ecto-green);box-shadow:0 0 8px var(--ecto-green);animation:livepulse 2s infinite;flex-shrink:0; }
@keyframes livepulse { 0%,100%{box-shadow:0 0 4px var(--ecto-green);} 50%{box-shadow:0 0 14px var(--ecto-green),0 0 28px rgba(57,255,20,.4);} }

.secure-badge { display:inline-flex;align-items:center;gap:.45rem;font-family:'Fira Code',monospace;font-size:.6rem;letter-spacing:.12em;text-transform:uppercase;color:var(--text-lo);margin-bottom:1.5rem;width:100%;justify-content:center; }
.secure-badge i { color:var(--teal-2); }

.btn-google {
    display: flex; align-items: center; justify-content: center; gap: .6rem;
    width: 100%; padding: .85rem;
    background: rgba(255,255,255,.04);
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 10px;
    color: var(--text-hi);
    font-family: 'Syne', sans-serif; font-size: .9rem; font-weight: 600;
    text-decoration: none; cursor: pointer; transition: all .25s;
}
.btn-google:hover {
    background: rgba(255,255,255,.08);
    border-color: rgba(255,255,255,.25);
    box-shadow: 0 0 20px rgba(255,255,255,.05);
    transform: translateY(-2px);
}
.btn-google i { font-size: 1.15rem; color: #fff; }

.divider { display:flex;align-items:center;gap:.75rem;margin:1.5rem 0; }
.divider::before,.divider::after { content:'';flex:1;height:1px;background:var(--border); }
.divider span { font-family:'Fira Code',monospace;font-size:.6rem;letter-spacing:.15em;color:var(--text-lo);text-transform:uppercase;white-space:nowrap; }

.card-footer { margin-top:1.5rem;text-align:center; }
.card-footer a { color:var(--teal-3);font-weight:600;text-decoration:none;font-size:.875rem;transition:color .2s; }
.card-footer a:hover { color:var(--teal-2); }
.card-footer .muted { color:var(--text-lo);font-size:.8rem;text-decoration:none;transition:color .2s; }
.card-footer .muted:hover { color:var(--text-mid); }
</style>
</head>
<body>

<div id="morphbg" aria-hidden="true">
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>
</div>
<canvas id="sparkle-canvas" aria-hidden="true"></canvas>

<div class="reg-card">
  <span class="card-corner tl"></span>
  <span class="card-corner tr"></span>
  <span class="card-corner bl"></span>
  <span class="card-corner br"></span>

  <a href="login.php" class="gs-brand">
    <img src="assets/images/logo.jpg" alt="GHOSST STORE" onerror="this.style.display='none'">
    <span class="gs-brand-text">GHOSST STORE</span>
  </a>

  <div class="secure-badge">
    <span class="live-dot"></span>
    <i class="bi bi-shield-lock-fill"></i>
    Secure Registration
  </div>

  <div class="page-title">Create Account</div>
  <div class="page-sub">Sign up with Google to get started</div>

  <a href="auth/google-login.php?mode=register" class="btn-google">
    <i class="bi bi-google"></i>
    <span>Sign up with Google</span>
  </a>

  <div class="divider"><span>already have an account?</span></div>

  <div class="card-footer">
    <a href="login.php"><i class="bi bi-box-arrow-in-right"></i> Log in</a>
  </div>
</div>

<script>
/* ── Sparkle + Particle Canvas ── */
(function() {
    const canvas = document.getElementById('sparkle-canvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let W, H;
    const particles = [], sparkles = [];
    const PALETTE = [{r:20,g:184,b:184},{r:57,g:255,b:20},{r:0,g:255,b:247},{r:94,g:234,b:212},{r:255,g:255,b:255}];

    function resize() { W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
    resize(); window.addEventListener('resize', resize);

    function Particle() { this.reset(true); }
    Particle.prototype.reset = function(init) {
        const c = PALETTE[Math.floor(Math.random() * 4)];
        this.x = Math.random() * W; this.y = init ? Math.random() * H : H + 10;
        this.r = Math.random() * 1.8 + .4; this.vx = (Math.random()-.5)*.4; this.vy = -(Math.random()*.55+.2);
        this.life = 0; this.maxLife = Math.random()*280+160; this.cr=c.r; this.cg=c.g; this.cb=c.b;
    };
    Particle.prototype.update = function() { this.x+=this.vx; this.y+=this.vy; this.life++; if(this.life>this.maxLife||this.y<-10) this.reset(false); };
    Particle.prototype.draw = function() {
        const a = Math.sin((this.life/this.maxLife)*Math.PI)*.5;
        ctx.beginPath(); ctx.arc(this.x,this.y,this.r,0,Math.PI*2);
        ctx.fillStyle=`rgba(${this.cr},${this.cg},${this.cb},${a})`; ctx.fill();
    };

    function Sparkle() { this.reset(true); }
    Sparkle.prototype.reset = function(init) {
        const c = PALETTE[Math.floor(Math.random()*PALETTE.length)];
        this.x=Math.random()*W; this.y=init?Math.random()*H:Math.random()*H;
        this.size=Math.random()*2+.4; this.life=init?Math.random()*120:0;
        this.maxLife=Math.random()*100+60; this.cr=c.r; this.cg=c.g; this.cb=c.b;
        this.vx=(Math.random()-.5)*.3; this.vy=(Math.random()-.5)*.3; this.rot=Math.random()*Math.PI;
    };
    Sparkle.prototype.update = function() { this.x+=this.vx; this.y+=this.vy; this.life++; if(this.life>this.maxLife) this.reset(false); };
    Sparkle.prototype.draw = function() {
        const t=this.life/this.maxLife, a=Math.sin(t*Math.PI)*.8, s=this.size*(1-t*.3);
        ctx.save(); ctx.translate(this.x,this.y); ctx.rotate(this.rot+this.life*.015);
        ctx.globalAlpha=a; ctx.fillStyle=`rgb(${this.cr},${this.cg},${this.cb})`;
        ctx.beginPath();
        for(let i=0;i<8;i++){const ang=(i*Math.PI)/4,rad=i%2===0?s*2.5:s*.9; i===0?ctx.moveTo(Math.cos(ang)*rad,Math.sin(ang)*rad):ctx.lineTo(Math.cos(ang)*rad,Math.sin(ang)*rad);}
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
    window.addEventListener('mousemove', e => {
        const now=Date.now(); if(now-lastBurst<120) return; lastBurst=now;
        const sp=sparkles[Math.floor(Math.random()*sparkles.length)];
        sp.x=e.clientX+(Math.random()-.5)*40; sp.y=e.clientY+(Math.random()-.5)*40;
        sp.life=0; sp.maxLife=60+Math.random()*40; sp.size=Math.random()*2+1;
        const c=PALETTE[Math.floor(Math.random()*PALETTE.length)]; sp.cr=c.r; sp.cg=c.g; sp.cb=c.b;
    });

    function tick() { ctx.clearRect(0,0,W,H); particles.forEach(p=>{p.update();p.draw();}); sparkles.forEach(s=>{s.update();s.draw();}); requestAnimationFrame(tick); }
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
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v833ccba57c9e4d2798f2e76cebdd09a11778172276447" integrity="sha512-57MDmcccJXYtNnH+ZiBwzC4jb2rvgVCEokYN+L/nLlmO8rfYT/gIpW2A569iJ/3b+0UEasghjuZH/ma3wIs/EQ==" data-cf-beacon='{"version":"2024.11.0","token":"8cc00a5444e74048bc984a52b7ab77fb","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'a11d08fcfa452ec3',t:'MTc4MjQ4NTUzOQ=='};var a=document.createElement('script');a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
