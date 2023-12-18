<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- Styles -->
        <style>
          body {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1em;
  min-height: 100vh;
  background-image: radial-gradient(circle at 50% 100%, #1b1b35, #121225);
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', 'Open Sans', system-ui, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';
}

.button {
  position: relative;
  border: 1px solid transparent;
  border-radius: 6px;
  padding: 8px 16px;
  min-width: 8em;
  text-align: center;
  color: #fff;
  background-image: 
    linear-gradient(to bottom, #f12828, #a00332, #9f0f31),
    linear-gradient(to bottom, #ae0034, #6f094c);
  background-clip: padding-box, border-box;
  background-origin: padding-box, border-box;
  box-shadow: 
    inset 0 1px rgb(255 255 255 / .25),
    inset 0 -1px rgb(0 0 0 / .1),
    0 2px 4px rgb(0 0 0 / .25);
  transition: .2s;
  will-change: transform;
  
  &:active {
    transform: scale(.92);
    filter: brightness(.8);
  }
}

.button-hat {
  position: absolute;
  top: -15px;
  left: -17px;
  height: 44px;
  filter: drop-shadow(0 2px 1px rgb(0 0 0 / .25));
}

.canvas {
  position: absolute;
  inset: 0;
  pointer-events: none;
}
        </style>
    </head>
    <body class="antialiased">
    <button class="button" type="button">
  Hacer peticion
  <img class="button-hat" src="https://assets.codepen.io/4175254/santa-hat-test-9.png" alt="">
</button>

<canvas class="canvas"></canvas>
<script>
    $(document).ready(function () {
        $('.button').click(function () {
            // Realizar la petición AJAX
            $.ajax({
                url: 'http://127.0.0.1:8000/animales',
                type: 'get',
                dataType: 'json',
                data: {
                    _token: '{{ csrf_token() }}'
                    // Puedes agregar más datos según tus necesidades
                },
                success: function (response) {
                    alert(response.mensaje);
                    alert(response.datos);
                    // Manejar la respuesta del servidor
                },
                error: function (error) {
                    console.log(error);
                    // Manejar el error
                }
            });
        });
    });
    const canvas = document.querySelector('.canvas');
const ctx = canvas.getContext('2d');

const pixelRatio = window.devicePixelRatio || 1;

const snowflakes = [];

class Snowflake {
  constructor() {
    this.x = Math.random() * canvas.width;
    this.y = Math.random() * canvas.height;
    
    const maxSize = 3;
    this.size = Math.random() * (maxSize - 1) + 1;
    this.velocity = this.size * 0.35;
    const opacity = this.size / maxSize;
    this.fill = `rgb(255 255 255 / ${opacity})`;
    
    this.windSpeed = (Math.random() - 0.5) * 0.1;
    this.windAngle = Math.random() * Math.PI * 2;
  }
  isOutsideCanvas() {
    return this.y > canvas.height + this.size;
  }
  reset() {
    this.x = Math.random() * canvas.width;
    this.y = -this.size;
  }
  update() {
    this.windAngle += this.windSpeed;
    this.wind = Math.cos(this.windAngle) * 0.5;

    this.x += this.wind;
    this.y += this.velocity;

    if (this.isOutsideCanvas()) {
      this.reset();
    }
  }
  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    ctx.fillStyle = this.fill;
    ctx.fill();
    ctx.closePath();
  }
}

const createSnowflakes = () => {
  snowflakeCount = Math.floor(window.innerWidth * window.innerHeight / 1400);
  
  for (let i = 0; i < snowflakeCount; i++) {  
    snowflakes.push(new Snowflake());
  }
}

const resizeCanvas = () => {
  const width = window.innerWidth;
  const height = window.innerHeight;
  canvas.width = width * pixelRatio;
  canvas.height = height * pixelRatio;
  canvas.style.width = `${width}px`;
  canvas.style.height = `${height}px`;
  ctx.scale(pixelRatio, pixelRatio);
  snowflakes.length = 0;
  createSnowflakes();
};

window.addEventListener('resize', resizeCanvas);

resizeCanvas();

const render = () => {
  requestAnimationFrame(render);
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  snowflakes.forEach(snowflake => {
    snowflake.update();
    snowflake.draw();
  });
};

render();
</script>
    </body>
</html>
