<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Zenrix</title>
  
  <link rel="icon" type="image/png" href="Zenrix_White.png"> 

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    :root {
      --color-primary: #ffffff; 
      --color-primary-dark: #cccccc;
      --color-text-main: #ffffff; 
      --color-text-secondary: #a0a0a0;
      --color-card-bg: rgba(26, 26, 26, 0.5); /* Updated for glassmorphism */
      --color-border: rgba(255, 255, 255, 0.1);
      --color-shadow: rgba(0, 0, 0, 0.6);
      --color-accent-bg: rgba(34, 34, 34, 0.6);
      --color-btn-text: #000000; 
      
      --ripple-general: rgba(255, 255, 255, 0.1); 
      --ripple-btn: rgba(0, 0, 0, 0.3); 
      
      --transition-fast: 0.2s ease-in-out;
      --transition-medium: 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    * { 
      box-sizing: border-box; 
      -webkit-tap-highlight-color: transparent; 
      -webkit-touch-callout: none;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding-top: 40px;
      background-color: transparent; /* Changed for particle canvas */
      color: var(--color-text-main);
      overflow-x: hidden;
      font-size: 14px;
      position: relative;
    }

    #particle-canvas {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      z-index: -1;
      pointer-events: none;
      background: #050505;
    }
    
    html { scroll-behavior: smooth; height: 100%; background: #000; }
    a { text-decoration: none; color: inherit; transition: color var(--transition-fast); }
    a, button, input, .contact-btn, label, div { outline: none; user-select: none; }

    .container { 
      width: 100%;
      max-width: 1100px;
      margin: 0 auto; 
      padding: 0 15px;
      display: flex;
      flex-direction: column;
      flex: 1;
      z-index: 1;
    }

    main { flex: 1; width: 100%; }

    .profile-header { text-align: center; padding: 40px 15px; }
    .profile-picture { width: 140px; height: 140px; border-radius: 8px; object-fit: cover; border: 2px solid rgba(255, 255, 255, 0.2); box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1); transition: all var(--transition-medium); }
    .profile-name { font-size: 2.2em; font-weight: 700; margin: 20px 0 8px; color: var(--color-text-main); text-shadow: 0 0 10px rgba(255, 255, 255, 0.2); }
    .profile-bio { font-size: 1em; color: var(--color-text-secondary); line-height: 1.6; max-width: 650px; margin: 0 auto 25px; }
    
    .contact-btn { 
      font-family: 'Poppins', sans-serif; 
      position: relative;
      overflow: hidden;
      display: inline-block; 
      background-color: var(--color-primary); 
      color: var(--color-btn-text); 
      padding: 12px 30px; 
      border-radius: 4px; 
      font-weight: 600; 
      font-size: 1em; 
      letter-spacing: 0.5px; 
      border: none; 
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
      transition: background-color 0.3s, box-shadow 0.3s;
      cursor: pointer;
    }
    @media (hover: hover) {
      .contact-btn:hover { background-color: var(--color-primary-dark); box-shadow: 0 0 25px rgba(255, 255, 255, 0.5); }
    }
    
    .section { padding: 50px 0; border-top: 1px solid var(--color-border); }
    .section-title { font-size: 1.8em; font-weight: 700; text-align: center; margin-bottom: 30px; color: var(--color-primary); text-shadow: 0 0 10px rgba(255, 255, 255, 0.2); }

    .project-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px; }
    .project-item { 
      background-color: var(--color-card-bg); 
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 25px; 
      border-radius: 8px; 
      border: 1px solid var(--color-border); 
      transition: all var(--transition-medium); 
      box-shadow: 0 8px 32px rgba(0,0,0,0.5);
      text-align: center; 
      display: flex; flex-direction: column; align-items: center;
    }
    .project-item:hover { transform: translateY(-5px); box-shadow: 0 12px 40px rgba(0,0,0,0.7); border-color: rgba(255,255,255,0.3); }
    
    .project-icon-box {
      font-size: 2em; color: var(--color-primary); margin-bottom: 20px;
      background: var(--color-accent-bg); width: 65px; height: 65px; border-radius: 4px;
      display: flex; align-items: center; justify-content: center;
      transition: all 0.3s ease; line-height: 1; border: 1px solid var(--color-border);
      box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }

    .project-item:hover .project-icon-box,
    .project-item:active .project-icon-box { 
        background: var(--color-primary); 
        color: var(--color-btn-text); 
        box-shadow: 0 0 20px rgba(255,255,255,0.4);
    }
    
    .project-item:hover .project-icon-box svg,
    .project-item:active .project-icon-box svg { 
        fill: var(--color-btn-text); 
    }
    
    .project-item h3 { margin: 0 0 10px; color: var(--color-text-main); font-size: 1.3em; font-weight: 700; }
    .project-item p { margin: 0; color: var(--color-text-secondary); line-height: 1.6; font-size: 0.95em; }

    .skills-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; max-width: 600px; margin: 0 auto; justify-content: center; }
    .skill-card { 
      background-color: var(--color-card-bg); 
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid var(--color-border); 
      border-radius: 8px; 
      padding: 25px 10px; 
      text-align: center; 
      display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 15px; 
      transition: all var(--transition-medium); 
      box-shadow: 0 8px 32px rgba(0,0,0,0.5); 
    }
    .skill-card:hover { transform: translateY(-5px); box-shadow: 0 12px 40px rgba(0,0,0,0.7); border-color: rgba(255,255,255,0.3); }
    .skill-card i { font-size: 2.5em; color: var(--color-primary); margin-bottom: 2px; transition: transform 0.3s ease; text-shadow: 0 0 15px rgba(255, 255, 255, 0.3); }
    .skill-card:hover i { transform: scale(1.15); }
    .skill-card h4 { margin: 0; font-size: 1.1em; font-weight: 600; color: var(--color-text-main); }

    span.ripple {
      position: absolute;
      border-radius: 50%;
      transform: scale(0);
      animation: ripple 600ms linear;
      pointer-events: none;
    }
    
    .contact-btn .ripple {
      background-color: var(--ripple-btn);
    }
    
    .footer-contact-item .ripple {
      background-color: var(--ripple-general);
    }

    @keyframes ripple {
      to { transform: scale(4); opacity: 0; }
    }

    .footer {
      background-color: rgba(15, 15, 15, 0.6);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);
      padding: 60px 0 0;
      margin-top: auto;
      border-top: 1px solid var(--color-border);
      width: 100%;
      z-index: 1;
      position: relative;
    }

    .footer-content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 40px;
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 20px 40px;
    }

    .footer-section h2 { color: var(--color-primary); margin: 0 0 15px; font-size: 1.8em; text-transform: none; letter-spacing: 1px; text-shadow: 0 0 10px rgba(255,255,255,0.2); }
    .footer-section h3 { color: var(--color-text-main); margin: 0 0 20px; font-size: 1.2em; font-weight: 600; }
    .footer-section p { color: var(--color-text-secondary); line-height: 1.6; font-size: 0.9em; margin-bottom: 20px; }

    .footer-links { list-style: none; padding: 0; margin: 0; }
    .footer-links li { margin-bottom: 12px; color: var(--color-text-secondary); font-size: 0.95em; display: flex; align-items: center; gap: 8px; }
    .footer-links li::before { content: "•"; color: var(--color-primary); font-size: 1.2em; }

    .footer-contact-item {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 15px;
      color: var(--color-text-secondary); 
      font-size: 0.95em;
      text-decoration: none;
      position: relative; 
      overflow: hidden;   
      border-radius: 4px; 
      padding: 5px; 
      transition: background-color 0.2s ease;
      cursor: pointer;
    }
    
    .footer-icon-box {
      width: 45px; height: 45px; min-width: 45px;
      background-color: var(--color-accent-bg); 
      border-radius: 4px;
      border: 1px solid var(--color-border);
      display: flex; align-items: center; justify-content: center;
      color: var(--color-primary);
      font-size: 1.2em;
      transition: background-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
    }
    
    @media (hover: hover) {
      .footer-contact-item:hover .footer-icon-box {
          background-color: var(--color-primary);
          color: var(--color-btn-text);
          box-shadow: 0 0 15px rgba(255,255,255,0.4);
      }
    }

    .footer-contact-item:active .footer-icon-box {
        background-color: var(--color-primary);
        color: var(--color-btn-text);
        transition-duration: 0.1s;
    }
    
    .footer-contact-item:active {
        background-color: rgba(255,255,255,0.05);
    }

    .footer-bottom {
      text-align: center; padding: 20px 0; border-top: 1px solid var(--color-border);
      color: var(--color-text-secondary); font-size: 0.85em; background-color: transparent; 
    }

    @media (max-width: 600px) {
      .profile-name { font-size: 1.8em; }
      .section-title { font-size: 1.5em; }
      .project-grid { grid-template-columns: 1fr; }
      .skills-grid { grid-template-columns: 1fr; gap: 15px; } 
      .container { max-width: 100%; } 
      .footer-content { gap: 30px; }
    }
  </style>
</head>
<body>
  
  <canvas id="particle-canvas"></canvas>

  <div class="container">
    <header class="profile-header">
      <img src="Zenrix_White.png" id="profile-pic" alt="Profile Picture" class="profile-picture">
      <h1 class="profile-name">Tanjim Ahamad Safin</h1>
      <p class="profile-bio">
        I am a passionate developer specializing in creating mobile applications. 
        I build high-quality apps using modern tools and frameworks.
      </p>
      <button onclick="scrollToContact()" class="contact-btn ripple-trigger">Contact Now</button>
    </header>

    <main>
      <section class="section" id="projects">
        <h2 class="section-title">App Development Expertise</h2>
        <div class="project-grid">
          <div class="project-item">
            <div class="project-icon-box"><i class="fa-brands fa-android"></i></div>
            <h3>Native Development</h3>
            <p>I build powerful, highly responsive native applications for Android using Java and Kotlin, ensuring optimal performance and the best user experience.</p>
          </div>
          <div class="project-item">
            <div class="project-icon-box"><i class="fa-solid fa-layer-group"></i></div>
            <h3>Cross-Platform (Flutter)</h3>
            <p>I develop stunning, natively compiled applications for multiple platforms from a single codebase using Flutter, saving time without sacrificing quality.</p>
          </div>
        </div>
      </section>

      <section class="section" id="skills">
        <h2 class="section-title">My Skills</h2>
        <div class="skills-grid">
          <div class="skill-card"><i class="fa-brands fa-java"></i> <h4>Java</h4></div>
          <div class="skill-card"><i class="fa-brands fa-android"></i> <h4>Kotlin</h4></div>
          <div class="skill-card"><i class="fa-solid fa-mobile-screen"></i> <h4>Flutter</h4></div>
        </div>
      </section>
    </main>
  </div>

  <footer class="footer">
    <div class="footer-content">
      
      <div class="footer-section">
        <h2>Zenrix</h2>
        <p>We transform ideas into digital reality with cutting-edge technologies and innovative software solutions tailored to your specific business needs.</p>
      </div>

      <div class="footer-section">
        <h3>Services</h3>
        <ul class="footer-links">
          <li>App Development</li>
          <li>Website Development</li>
          <li>UI/UX Design</li>
          <li>Graphics Design</li>
        </ul>
      </div>

      <div class="footer-section" id="contact">
        <h3>Contact Us</h3>
        
        <div class="footer-contact-item ripple-trigger" onclick="window.location.href='#'">
          <div class="footer-icon-box">
            <i class="fa-solid fa-location-dot"></i>
          </div>
          <span>Dhirasram, Gazipur-1700, Bangladesh</span>
        </div>

        <a href="mailto:zenrix.xyz@gmail.com" class="footer-contact-item ripple-trigger">
          <div class="footer-icon-box">
            <i class="fa-solid fa-envelope"></i>
          </div>
          <span>zenrix.xyz@gmail.com</span>
        </a>

        <a href="tel:+8801817450163" class="footer-contact-item ripple-trigger">
          <div class="footer-icon-box">
             <i class="fa-solid fa-phone"></i>
          </div>
          <span>+880 1817450163</span>
        </a>
        
        <a href="https://wa.me/8801817450163" target="_blank" class="footer-contact-item ripple-trigger">
          <div class="footer-icon-box">
            <i class="fa-brands fa-whatsapp"></i>
          </div>
          <span>+880 1817450163</span>
        </a>

        <a href="https://facebook.com/groups/YOUR_GROUP_LINK_HERE" target="_blank" class="footer-contact-item ripple-trigger">
          <div class="footer-icon-box">
            <i class="fa-brands fa-facebook-f"></i>
          </div>
          <span>Join our Facebook Group</span>
        </a>

      </div>

    </div>

    <div class="footer-bottom">
      <p>&copy; 2025 Zenrix | All rights reserved</p>
    </div>
  </footer>

  <script>
    function scrollToContact() {
        window.location.hash = "contact";
    }

    function createRipple(event) {
      const button = event.currentTarget;
      const circle = document.createElement("span");
      
      const diameter = Math.max(button.clientWidth, button.clientHeight);
      const radius = diameter / 2;
      const rect = button.getBoundingClientRect();
      
      circle.style.width = circle.style.height = `${diameter}px`;
      circle.style.left = `${event.clientX - rect.left - radius}px`;
      circle.style.top = `${event.clientY - rect.top - radius}px`;
      circle.classList.add("ripple");
      
      const existingRipple = button.querySelector('.ripple');
      if (existingRipple) {
        existingRipple.remove();
      }
      
      button.appendChild(circle);
      
      setTimeout(() => {
        circle.remove();
      }, 600);
    }

    const rippleButtons = document.querySelectorAll(".ripple-trigger");
    rippleButtons.forEach(btn => {
      btn.addEventListener("pointerdown", createRipple); 
    });

    /* 3D Particle Effect Script */
    const canvas = document.getElementById('particle-canvas');
    const ctx = canvas.getContext('2d');
    let width, height;
    let particles = [];

    function resizeCanvas() {
      width = window.innerWidth;
      height = window.innerHeight;
      canvas.width = width;
      canvas.height = height;
    }
    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    class Particle {
      constructor() {
        this.reset();
        this.z = Math.random() * 2000; 
      }
      reset() {
        this.x = (Math.random() - 0.5) * 3000;
        this.y = (Math.random() - 0.5) * 3000;
        this.z = 2000;
        this.size = Math.random() * 1.5 + 0.5;
        this.speed = Math.random() * 2 + 1;
      }
      update() {
        this.z -= this.speed;
        if (this.z <= 0) {
          this.reset();
        }
      }
      draw() {
        let fov = 350;
        let scale = fov / (fov + this.z);
        let x2d = this.x * scale + width / 2;
        let y2d = this.y * scale + height / 2;
        let currentSize = this.size * scale * 4;
        let opacity = Math.min(1, scale * 1.5);

        ctx.beginPath();
        ctx.arc(x2d, y2d, Math.max(0, currentSize), 0, Math.PI * 2);
        ctx.fillStyle = `rgba(255, 255, 255, ${opacity})`;
        ctx.shadowBlur = 15;
        ctx.shadowColor = 'rgba(255, 255, 255, 0.8)';
        ctx.fill();
      }
    }

    for (let i = 0; i < 200; i++) {
      particles.push(new Particle());
    }

    function animate() {
      ctx.fillStyle = '#050505';
      ctx.fillRect(0, 0, width, height);
      particles.forEach(p => {
        p.update();
        p.draw();
      });
      requestAnimationFrame(animate);
    }
    animate();
  </script>
</body>
</html>
