<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/home/css/style.css">
    <title>Document</title>
</head>
<body>
    <h1 style="color: green">Order Details</h1>
    <h3>UserName: {{ $order->name }}</h3>
    <h3>Email: {{ $order->email }}</h3>
    <h3>Phone: {{ $order->phone }}</h3>
    <h3>Address: {{ $order->address }}</h3>
    <h3>ProductId: {{ $order->productId }}</h3>
    <h3>ProductName: {{ $order->productName }}</h3>
    <h3>Quanity: {{ $order->quantity}}</h3>
    <h3>Quality: {{ $order->quality }}</h3>
    <h3>Price: {{ $order->price}}</h3>
    <h3>Payment Status: {{ $order->paymentStatus }}</h3>
    <h3>Delivery Status: {{ $order->deliveryStatus }}</h3>
</body>
</html>