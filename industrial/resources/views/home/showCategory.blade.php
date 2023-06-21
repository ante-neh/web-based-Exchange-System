<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products under category - CX</title>
    <link rel="stylesheet" href="/home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- header section-->
    <header>
        <a href={{ route('userPage') }} class="logo">
            <img src="/home/img/logo CX.png" alt="CX logo">
        </a>
        <ul>
            <li><a href={{ route('userPage') }}>Home</a></li>
            <li><a href={{ route('about') }}>About</a></li>
            <li><a style="color:#2BD808" href={{ route('homePro') }}>Products</a></li>
            <li><a href={{ route('homeCategories') }}>Categories</a></li>
            <li><a href={{ route('contact') }}>Contact</a></li>
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

    <!-- product section-->
     <!--  product section-->
     <section class="product">
        <h1>Products under <span>{{ $category }}</span>  category</h1>
        <div class="product-container">
            @foreach ($products as $product )
            <div class="product-box">
                <h4 id="pro-title"> {{ $product->name }}</h4>
                <a href="{{ route('description',$product->id)}}"><img src="/images/{{basename($product->image)}}" alt=""></a> 
                <div class="price-con">
                    <p>Quality</p>
                    <p class="value-color">{{ $product->quality }}</p>
                </div>
                <div class="price-con" id="border-black">
                    <p>Price</p>
                    <p class="value-color">{{ $product->price }} Birr</p>
                </div>
                <form action="{{ route('addToCart', $product->id) }}", method="POST">
                    @csrf 
                    <div class="price-con">
                        <p>Quantity</p>
                        <input class="quantity" type="number" min=1 value='1' max=5 name="quantity">
                    </div>
                    <div class="product-btn">
                        <input class="submit-btn" type="submit"  value="Add to cart">
                    </div>
                </form>
                
            </div>
        @endforeach

    </section>



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