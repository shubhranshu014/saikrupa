<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Purchase PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Purchase Details</h2>
    <p><strong>Purchase ID:</strong> {{ $purchase->purchase_id }}</p>
    <p><strong>Purchase receipt Generate Date:</strong> {{ $purchase->purchase_date }}</p>
    <p><strong>Status:</strong> {{ ucfirst($purchase->status) }}</p>
    <h3>Items</h3>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase->items as $item)
                <tr>
                    <td>{{ $item['name'] ?? 'N/A' }}</td>
                    <td>{{ $item['qty'] ?? 0 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
