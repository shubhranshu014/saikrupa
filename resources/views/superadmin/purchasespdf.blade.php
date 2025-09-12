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
    <p><strong>Supplier:</strong> {{ $purchase->supplier->supplier_name ?? 'N/A' }}</p>
    <p><strong>Purchase Date:</strong> {{ $purchase->purchase_date }}</p>
    <p><strong>Status:</strong> {{ ucfirst($purchase->status) }}</p>
    <p><strong>Total Amount:</strong> ₹{{ number_format($purchase->total_amount, 2) }}</p>

    <h3>Items</h3>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchase->items as $item)
                <tr>
                    <td>{{ $item['name'] ?? 'N/A' }}</td>
                    <td>{{ $item['qty'] ?? 0 }}</td>
                    <td>₹{{ number_format($item['price'] ?? 0, 2) }}</td>
                    <td>₹{{ number_format(($item['qty'] ?? 0) * ($item['price'] ?? 0), 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
