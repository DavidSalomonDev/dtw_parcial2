<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link rel="stylesheet" href="{{ asset('css/login/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f4f4f4;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #28a745;
        }
    </style>
</head>
<body>
    <div class="container table-container">
        <h2 class="text-center mb-4">Lista de Libros</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Año</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $libro)
                        <tr>
                            <td>{{ $libro['titulo'] ?? '' }}</td>
                            <td>{{ $libro['autor'] ?? '' }}</td>
                            <td>{{ $libro['anio'] ?? '' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

