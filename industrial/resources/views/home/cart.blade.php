<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - CX</title>
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
  

    <section class="cart">
        @if(session()->has('message'))
        <div class = 'message'>
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="cart-container">
            <h1>Cart</h1>
                <table class="cart-table">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Operation</th>
                    </tr>
                    <?php $totalPrice = 0 ?>
                    @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->productName }}</td>
                        <td>{{ $cart->price }} Birr</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>
                            <form action="{{ route('remove',$cart->id) }}" method="post">
                                @csrf 
                                @method('DELETE')
                                <button style="color:red;"><i class='bx bx-trash' ></i></button>
                            </form>
                     </td>
                    </tr>
                   <?php $totalPrice = $totalPrice + $cart->price?>
                    @endforeach
                </table>

                <div class="price-display">
                    <p id="left">Total price</p>
                    <p id="right">{{$totalPrice }} Birr</p>
                </div>

                
                <h1>Proceed to checkout</h1>
                <div class="btn-cash-container">
                    <a class="btn-cash" href="{{ route('cashOrder') }}">Cash on Delivery</a>
                    <a class="btn-cash" href="{{ route('chapa',$totalPrice) }}">Chapa</a>
                </div>
             
            
            
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