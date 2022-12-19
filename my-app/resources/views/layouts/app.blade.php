<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Materialize  CSS -->
     <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    

    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper grey darken-4">
          <a href="#" class="brand-logo">Logo</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/profile') }}">Profile</a></li>
            <li><a href="{{ url('/login') }}">login</a></li>
            <li><a href="{{ url('/register') }}">Registeration</a></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
          </ul>
        </div>
    </nav>
            

    <main>
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    @yield('script')
</body>
</html>