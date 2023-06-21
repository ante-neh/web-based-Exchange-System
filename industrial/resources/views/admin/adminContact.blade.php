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
        <li><a href="{{ route('product') }}">Products</a></li>
        <li><a href="{{ route('category') }}">Categories</a></li>
        <li><a href="{{ route('order') }}">Order</a></li>
        <li><a style="color:#2BD808" href="{{ route('adminContact') }}">Contact</a></li>
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
        <h2 id="contact-title">Contact Messages</h2>
        @if(session()->has('message'))
        <div class = 'message'>
            {{ session()->get('message') }}
        </div>
        @endif
        <table>
            <tr>
                <th>FullName</th>
                <th>Email</th>
                <th>Message</th> 
                <th>Send Email</th>               
            </tr>
           @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->fullname }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td><a class="send-email-btn" href="{{ route('sendEmailToContact', $contact->id) }}">Send</a>
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