<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category add - admin</title>
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
        <li><a style="color:#2BD808" href="{{ route('category') }}">Categories</a></li>
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

<section class="product-add">
    <div class='error'>
        @if($errors->any())
            <div class='errorM'>
                Something went wrong
            </div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach

            </ul>
        @endif
    </div>
     <form action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Add <span>category</span> </h3>
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" required></td>
            </tr>
        
                <td>Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            
                <td>Featured</td>
                <td>
                    <input style="width:15px;" type="radio" value="yes" name="featured" required>Yes
                    <input style="width:15px;" type="radio" value="no" name="featured" required>No
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Add" class="btn">
     </form>
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