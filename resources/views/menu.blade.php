<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/stylesM.css') }}">
    <title>Menú del Restaurante</title>
</head>
<body>
    <div class="main-slide">
        <a href="">Nuestra Historia</a>
        <a href="">Menú</a>
        <a href="">Reservas</a>
    </div>
    <h1>Productos</h1>
    <div class="menu_grid">
        @forelse($platillos as $platillo)
            <div class="card">
                <h3>{{ $platillo->nombre }}</h3>
                <p>{{ $platillo->descripcion }}</p>
                <p class="precio">${{ number_format($platillo->precio, 2) }}</p>
            </div>
        @empty
            <p style="grid_column">No hay platillos disponibles por el momento.</p>
        @endforelse
    </div>
</body>
</html>