<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - CX</title>
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
            <li><a style="color:#2BD808" href={{ route('userPage') }}>Home</a></li>
            <li><a href={{ route('about') }}>About</a></li>
            <li><a href={{ route('homePro') }}>Products</a></li>
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

    <!-- hero section starts -->
    <section class="hero" id="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>Marketplace to get any <span> farmers </span> products</h1>
                 <p>
                    this is the best market place to ever land to get the most out of farmers and to land on products that come directly from 
                    farm land which is located in east africa ethiopia and other countries.
                 </p>
                 <div class="btn">
                    <a href="{{ route('homePro')}}">Buy Now</a>
                 </div>
            </div>
            <div class="hero-img">
                <img src="home/img/hero.jpg" alt="">
            </div>
        </div>
    </section>
    <!-- featured category section-->
    <section class="category">
        <h1>Featured <span>categories</span></h1>
        <div class="category-container">
            @foreach ($categories as $category)
                @if ($category->featured === 1)
                    <a href="{{ route('showCategory',$category->name) }}" class="category-box">
                        <p>{{ $category->name }}</p>
                        <img class="category-img" src="/images/{{ basename($category->image) }}" alt="">
                    </a>    
                @endif
            @endforeach
        </div>
    </section>
    <!-- featured product section-->
    <section class="product">
        <h1>Featured <span>Products</span></h1>
        <div class="product-container">
            @foreach ($products as $product )
            @if ($product->featured === 1)
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
            @endif
            @endforeach
        </div>
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