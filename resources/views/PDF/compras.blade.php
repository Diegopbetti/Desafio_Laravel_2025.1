<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Compras</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Histórico de Compras</h2>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Comprador</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($transaction->total_price, 2, ',', '.') }}</td>
                    <td>{{ $transaction->product->category }}</td>
                    <td>{{ $transaction->buyer->name }}</td>
                    <td>{{ $transaction->seller->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
