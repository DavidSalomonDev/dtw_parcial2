<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora DTW GT01</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 0.5rem;
            margin-top: 0.25rem;
            margin-bottom: 1rem;
            border-radius: 6px;
            border: 1px solid #d1d5db;
        }
        button {
            background-color: #3b82f6;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }
        @keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.resultado {
    margin-top: 1.5rem;
    background-color: #d1fae5;
    padding: 1rem;
    border-radius: 8px;
    text-align: center;
    font-weight: bold;
    color: #065f46;

    /* Agrega la animación aquí 👇 */
    animation: fadeIn 0.8s ease-out;
}

    </style>
</head>
<body>
    <div class="card">
        <h1>Calculadora SOAP</h1>
        <form method="POST" action="{{ route('operar') }}">
            @csrf

            <label for="numero1">Número 1:</label>
            <input type="number" name="numero1" id="numero1" required>

            <label for="numero2">Número 2:</label>
            <input type="number" name="numero2" id="numero2" required>

            <label for="operacion">Operación:</label>
            <select name="operacion" id="operacion" required>
                <option value="sumar">Sumar</option>
                <option value="multiplicar">Multiplicar</option>
            </select>

            <button type="submit">Calcular</button>
        </form>

        @if(isset($resultado))
            <div class="resultado">
                Resultado: {{ $resultado }}
            </div>
        @endif
    </div>
</body>
</html>
