<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>send email</title>
</head>
<body>
    <!-- header section-->
<header class="admin-header">
    <h2>Admin <span>Panel</span> </h2>
    <ul>
        <li><a href="{{ route('adminhome') }}">Home</a></li>
        <li><a href="{{ route('product') }}">Products</a></li>
        <li><a href="{{ route('category') }}">Categories</a></li>
        <li><a href="{{ route('order') }}">Order</a></li>
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

    <h1 style="text-align:center;font-size:25px;margin-top:30px;">send email to <span>{{ $order->email }}</span> </h1>
    <form action="{{ route('sendUserEmail',$order->id) }}" method="POST">
        @csrf
        <div style="padding-left:35%;padding-top:30px;">
            <label for="">Email Greeting </label>
            <input style="padding: 3px;margin-left:45px;" type="text" name="greeting">
        </div>

        <div style="padding-left:35%;padding-top:30px;">
            <label for="">Email FirstLine </label>
            <input style="padding: 3px;margin-left:50px;" type="text" name="firstline">
        </div>

        <div style="padding-left:35%;padding-top:30px;">
            <label for="">Email Body </label>
            <input style="padding: 3px;margin-left:80px;" type="text" name="body">
        </div>
        <div style="padding-left:35%;padding-top:30px;">
            <label for="">Email Button name </label>
            <input style="padding: 3px"; type="text" name="button">
        </div>

        <div style="padding-left:35%;padding-top:30px;">
            <label for="">Email URL </label>
            <input style="padding:3px;margin-left:95px;"; type="text" name="url">
        </div>

        <div style="padding-left:35%;padding-top:30px;">
            <label for="">Email Last Line </label>
            <input style="padding:3px;margin-left:45px;" type="text" name="lastline">
        </div>

        <div style="padding-left:35%;padding-top:30px;">
            <input class="btn" type="submit" value="Send Email">
        </div>
    </form>

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