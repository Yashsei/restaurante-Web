<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/stylesA.css') }}">
    <title>Panel de Administración - Menú</title>
</head>
<body>
    <h1>Panel de Control del Menú</h1>

    <div class="card">
        <h2 class="negro">Agregar Nuevo Platillo</h2>
        <form action="/admin/crear" method="POST">
            @csrf
            <label>Nombre:</label>
            <input type="text" name="nombre" required>

            <label>Descripción:</label>
            <textarea name="descripcion"></textarea>

            <label>Precio ($):</label>
            <input type="number" step="0.01" name="precio" required>

            <button type="submit">Guardar Platillo</button>
        </form>
    </div>

    <!-- Lista de platillos para editar precios -->
    <h2 class="blanco">Platillos Existentes</h2>
    @foreach($platillos as $platillo)
        <div class="card">
            <form action="/admin/actualizar/{{ $platillo->id }}" method="POST">
                @csrf
                <div class="row">
                    <div style="flex: 2;">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" value="{{ $platillo->nombre }}">
                    </div>
                    <div style="flex: 1;">
                        <label>Precio ($):</label>
                        <input type="number" step="0.01" name="precio" value="{{ $platillo->precio }}">
                    </div>
                </div>
                <label>Descripción:</label>
                <textarea name="descripcion">{{ $platillo->descripcion }}</textarea>
                <button type="submit" class="btn-update">Actualizar Platillo</button>
            </form>
        </div>
    @endforeach

    <p><a href="/" target="_blank" class="btn_return">← Ver menú público</a></p>
</body>
</html>