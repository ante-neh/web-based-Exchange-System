<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - CX</title>
    <link rel="stylesheet" href="home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- header section-->
    <header>
        <a href={{ route('userPage') }} class="logo">
            <img src="home/img/logo CX.png" alt="CX logo">
        </a>
        <ul>
            <li><a href={{ route('userPage') }}>Home</a></li>
            <li><a href={{ route('about') }}>About</a></li>
            <li><a href={{ route('homePro') }}>Products</a></li>
            <li><a href={{ route('homeCategories') }}>Categories</a></li>
            <li><a style="color:#2BD808" href={{ route('contact') }}>Contact</a></li>
        </ul>
        <div class="burger">
            <i class='bx bx-menu'></i>
         </div>
        <div class="logout-cart">
            @if(Route::has('login'))
            @auth
            <div class="">
                <x-app-layout>
                </x-app-layout>
            </div>

            @else
            <div class="login">
                <a href="{{ route('login') }}">Login</a>
            </div>

            <div class="register">
                <a href="{{ route('register') }}">Registor</a>
            </div>
            @endauth
            @endif
            <div class="cart">
               <a href="{{ route('showCart') }}"><i class='bx bx-cart'></i></a>  
            </div>
        </div>
       
    </header>

<!-- contact section-->

    <div style="margin-top: 50px;" class="form-container">
        <form action="{{ route('storeContact') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3  style="margin-bottom:50px;border-bottom: 2px solid green;">CONTACT US </h3>
            <div class="input">
                <p>Fullname</p>
                <input type="text" name="fullname" required>
            </div>
            <div class="input">
                <p>Email</p>
                <input type="email" name="email" required>
            </div>
    
            <div class="input">
                <p>Message</p>
                <input type="text" name="message" required>
            </div>
            <input type="submit" class="login-btn" name="submit" value="Send">
        </form>
    </div>





     <!-- footer section-->
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