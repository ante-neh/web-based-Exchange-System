<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order manage - admin</title>
    <link rel="stylesheet" href="home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
<!-- header section-->
<header class="admin-header">
    <h2>Admin <span>Panel</span> </h2>
    <ul>
        <li><a href="{{ route('adminhome') }}">Home</a></li>
        <li><a href="{{ route('product') }}">Products</a></li>
        <li><a href="{{ route('category') }}">Categories</a></li>
        <li><a style="color:#2BD808" href="{{ route('order') }}">Order</a></li>
        <li><a href="{{ route('adminContact') }}">Contact</a></li>
    </ul>
    <div class="burger">
        <i class='bx bx-menu'></i>
     </div>
    <div class="logout-cart">
        <div class="">
            <x-app-layout>
            </x-app-layout>
        </div>
    </div>   
</header>


<!-- Products section -->
<section class="admin-products admin-order" id="admin-order">
    <div class="main-container">
        <h2 style="margin-bottom: 20px;">Orders</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Quality</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Delivered</th>
                <th>Print PDF</th>
                <th>Send Email</th>
            </tr>
            @foreach ($orders as $order )
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->userId }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->productId }}</td>
                <td>{{ $order->productName }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->quality }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->paymentStatus }}</td>
                <td>{{ $order->deliveryStatus }}</td>
                @if ($order->deliveryStatus == 'processing')
                <td><a class="update-btn" href="{{ route('orderUpdate',$order->id) }}" onclick="return confirm('Are you sure this product is delivered')">Delivered </a></td>
                @else
                <td style="color:#2BD808"><p>Delivered</p></td>
                @endif
                <td><a class="print-btn" href="{{ route('printPdf', $order->id) }}">Print</a></td>
                <td><a class="send-email-btn" href="{{ route('sendEmail', $order->id) }}">Send</a>
            </tr>
            @endforeach
            

        </table>
    </div>
</section>


<!-- footer section -->
<footer>
    <div class="social">
        <i class='bx bxl-facebook-circle'></i>
        <i class='bx bxl-instagram' ></i>
        <i class='bx bxl-twitter' ></i>
    </div>
    <i class='bx bx-copyright'></i> copyright by commodity exchange
</footer>
<script src="/home/js/script.js"></script>
</body>
</html>