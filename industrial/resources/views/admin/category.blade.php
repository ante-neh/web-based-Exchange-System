<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category manage - admin</title>
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


<!-- Products section -->
<section class="admin-products" id="admin-categories">
    <div class="main-container">
        <h2>Categories</h2>
        @if(session()->has('message'))
        <div class = 'message'>
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="btn">
            <a href="{{ route('createCategory') }}">Add</a>
        </div>

        <table>
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Operations</th>
            </thead>
            <tbody>

            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img  class="category-img table-image" src="/images/{{ basename($category->image) }}" alt=""></td>
                    <td>{{ $category->featured }}</td>
                    <td class="operation-box" style="display: flex">
                        <a class="update-btn" href="{{ route('edit', $category->id) }}">Update </a>
                         <form action="{{ route('delete',$category->id) }}" method="post">
                             @csrf 
                             @method('DELETE')
                             <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this category')" >Delete</button>
                        </form>
                    
                    </td>
                </tr>
            @endforeach
        </tbody>    
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