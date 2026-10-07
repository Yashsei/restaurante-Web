<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Menú</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 30px auto; padding: 20px; background: #f9f9f9; }
        .card { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input, textarea { width: 100%; padding: 8px; margin: 5px 0 15px; box-sizing: border-box; }
        button { background: #28a745; color: white; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer; }
        .btn-update { background: #007bff; }
        .row { display: flex; gap: 10px; }
    </style>
</head>
<body>
    <h1>Panel de Control del Menú</h1>

    <!-- Formulario para agregar un platillo nuevo -->
    <div class="card">
        <h2>Agregar Nuevo Platillo</h2>
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
    <h2>Platillos Existentes</h2>
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

    <p><a href="/" target="_blank">← Ver menú público</a></p>
</body>
</html>