<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Berhasil</title>
  <meta http-equiv="refresh" content="3;url={{ route('home') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      overflow: hidden;
      background-color: #ffffff;
      font-family: Poppins;
    }

    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 0;
      top: 0;
      left: 0;
    }

    .success-box {
      position: relative;
      z-index: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Background Particles -->
  <div id="particles-js"></div>

  <!-- Foreground Content -->
  <div class="success-box">
    <dotlottie-player 
      src="https://lottie.host/de50eb6a-717a-484d-8254-204776784d35/w6fwOnxOCl.lottie" 
      background="transparent" 
      speed="1" 
      style="width: 300px; height: 300px;" 
      autoplay>
    </dotlottie-player>
    <h2 class="text-success">Login Berhasil</h2>
    <p class="mt-2">Halo, <strong>{{ $name }}</strong>. Mengarahkan ke halaman utama...</p>
  </div>

  <!-- Particles.js Configuration -->
  <script>
    particlesJS("particles-js", {
      particles: {
        number: {
          value: 80,
          density: { enable: true, value_area: 800 }
        },
        color: { value: "#00bcd4" },
        shape: {
          type: "circle",
          stroke: { width: 0, color: "#000000" }
        },
        opacity: {
          value: 0.5,
          random: true,
          anim: { enable: false }
        },
        size: {
          value: 3,
          random: true,
          anim: { enable: false }
        },
        line_linked: {
          enable: false
        },
        move: {
          enable: true,
          speed: 1.5,
          direction: "none",
          random: true,
          straight: false,
          out_mode: "out"
        }
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: { enable: false },
          onclick: { enable: false },
          resize: true
        }
      },
      retina_detect: true
    });
  </script>
</body>
</html>
