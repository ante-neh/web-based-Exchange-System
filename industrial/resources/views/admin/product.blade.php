<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product manage - admin</title>
    <link rel="stylesheet" href="home/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
<!-- header section-->
<header class="admin-header">
    <h2>Admin <span>Panel</span> </h2>
    <ul>
        <li><a href="{{ route('adminhome') }}">Home</a></li>
        <li><a style="color:#2BD808" href="{{ route('product') }}">Products</a></li>
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


<!-- Products section -->
<section class="admin-products">
    <div class="main-container">
        <h2>Products</h2>
        @if(session()->has('message'))
        <div class = 'message'>
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="btn">
            <a href="{{ route('createProduct') }}">Add</a>
        </div>
        <table>
            <tr>
                <th>Name</th>
                <th>categoryName</th>
                <th>Description</th>
                <th>Quality</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Price</th>
                <th>Operations</th>
                
            </tr>
           @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->categoryName }}</td>
                <td style="text-align: left;">{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->quality }}</td>
                <td><img style="width: 1000px;height:100px;" class="table-image" src="/images/{{basename($product->image)}}" alt=""></td>
                <td>{{ $product->featured }}</td>
                <td>{{ $product->price }}</td>
                <td class="operation-box" style="display: flex">
                    <a class="update-btn" href="{{ route('editProduct', $product->id) }}">Update </a>
                     <form action="{{ route('deleteProduct',$product->id) }}" method="post">
                         @csrf 
                         @method('DELETE')
                         <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this product')" >Delete</button>
                    </form>
                
                </td>
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