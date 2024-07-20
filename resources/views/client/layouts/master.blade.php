<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    @include('client.components.css')
</head>

<body>
    @include('client.layouts.header')
    <!-- Topbar Start -->
   
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @yield('content')
    
  


    <!-- Footer Start -->
    @include('client.layouts.footer')
    <!-- Footer End -->


 
    


    <!-- JavaScript Libraries -->
    @include('client.components.js')
</body>

</html>