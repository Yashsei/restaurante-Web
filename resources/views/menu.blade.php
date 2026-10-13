<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/stylesM.css') }}">
    <title>Menú Catalogo</title>
</head>
<body>
    <div class="slide">
        <h3>Hola</h3>
        <p>Subtitulo</p>
    </div>

    <div class="main-slide">
        <div class="grid-item item-superior">
            <h2><a href="">Hola</a></h2>
            <a href=""><img src="{{ asset('img/ex1.webp') }}" alt="Bolsas" class="grid-img"></a>
        </div>
        <div class="grid-item item-superior">
            <h2>Elemento 2</h2>
            <img src="" alt="Estucheras">
        </div>
        <div class="grid-item item-superior">
            <h2>Elemento 3</h2>
            <img src="" alt="Carteras">
        </div>
        <div class="grid-item item-superior">
            <h2>Elemento 4</h2>
            <img src="" alt="Monedero">
        </div>
    </div>

    <h1>Dominos Pizza</h1>

    <div class="menu_grid">
        @forelse($platillos as $platillo)
            <div class="card">
                <h3>{{ $platillo->nombre }}</h3>
                <p>{{ $platillo->descripcion }}</p>
                <p class="precio">${{ number_format($platillo->precio ?? 0, 2) }}</p>
            </div>
        @empty
            <p style="grid-column: 1 / -1;">No hay platillos disponibles por el momento.</p>
        @endforelse
    </div>

    <!-- GSAP Core -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <!-- GSAP ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        // 1. Registramos el plugin ScrollTrigger
        gsap.registerPlugin(ScrollTrigger);

        // 2. Animación de entrada para la cabecera (.slide)
        gsap.from(".slide", {
            duration: 1,
            y: -30,          
            opacity: 0,      
            ease: "power3.out"
        });

        // 3. Animación en cascada para los elementos superiores (.main-slide)
        gsap.from(".item-superior", {
            duration: 0.8,
            scale: 0.8,      
            opacity: 0,
            stagger: 0.15,   
            ease: "back.out(1.7)"
        });

        // 4. Animación con ScrollTrigger para las tarjetas de la BD
        gsap.from(".card", {
            scrollTrigger: {
                trigger: ".menu_grid", 
                start: "top 85%",       
            },
            duration: 0.8,
            y: 60,              
            opacity: 0,         
            stagger: 0.2,       
            ease: "power2.out"
        });
    </script>
</body>
</html>