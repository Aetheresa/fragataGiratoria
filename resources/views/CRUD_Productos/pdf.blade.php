<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
            color: #111827;
        }

        h1 {
            text-align: center;
            color: #1f2937;
            margin-bottom: 20px;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #f3f4f6;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background: #f9fafb;
        }

        tr:hover {
            background: #e5e7eb;
        }
    </style>
</head>
<body>
    <h1>Reporte de Productos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Stock Inicial</th>
                <th>Stock Final</th>
                <th>Stock Mínimo</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $producto->tipo_producto }}</td>
                    <td>{{ $producto->unidad_medida }}</td>
                    <td>{{ $producto->cantidad_disponible }}</td>
                    <td>{{ $producto->stock_inicial }}</td>
                    <td>{{ $producto->stock_final }}</td>
                    <td>{{ $producto->stock_minimo }}</td>
                    <td>{{ $producto->proveedor }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
