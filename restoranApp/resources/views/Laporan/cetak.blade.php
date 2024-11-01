<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Order</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

    <h1>Laporan Order</h1>

    <table>
        <thead>
            <tr>
                <th>Table Number</th>
                <th>Customer Name</th>
                <th>Menu Item</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0; // Initialize total price for all orders
            @endphp
            @foreach ($data as $order) <!-- Iterate over all orders -->
                <tr>
                    <td>{{ $order->table_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->menu_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->status }}</td>
                    <td class="text-right">{{ number_format($order->price * $order->quantity, 2) }}</td>
                </tr>
                @php
                    $totalPrice += $order->price * $order->quantity; // Total price calculation
                @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right"><strong>Total:</strong></td>
                <td class="text-right"><strong>{{ number_format($totalPrice, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>

</body>
</html>
