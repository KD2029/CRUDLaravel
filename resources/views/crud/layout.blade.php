
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet"  type="text/css" href="{{asset('/css/create.css')}}">
      
    </head>
    <body>
    
        <div class="container">
            <br>
            <body class="antialiased">
                <a href={{url('Logout')}}>Logout</a>
               
        @yield('content')
    </body>
</html>