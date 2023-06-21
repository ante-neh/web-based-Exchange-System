<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - admin</title>
    <link rel="stylesheet" href="home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
<!-- header section-->
<header class="admin-header" style="padding: 5px 10%;">
    <h2>Admin <span>Panel</span> </h2>
    <ul>
        <li><a style="color:#2BD808" href="{{ route('adminhome') }}">Home</a></li>
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

<!-- Dashboard section -->
<section class="dashboard">
  <div class="dashboard-container">
    <div class="content-box">
        <h1><span>{{ $products->count() }}</span> </h1>
        <p>products</p>
    </div>

    <div class="content-box">
        <h1><span>{{ $categories->count() }}</span> </h1>
        <p>Categories</p>
    </div>

    <div class="content-box">
        <h1><span>{{ $orders->count() }}</span> </h1>
        <p>Orders</p>
    </div>

    <div class="content-box" id="revenue">
         <h1><span>{{ $totalPrice}} birr</span> </h1> 
        <p>Revenue generated</p>
    </div>
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