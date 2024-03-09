<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ORMVA| @yield('title') </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @yield('style')

</head>
<body>
     
    <header>  
        @php
      //   session(['employe' => $employe,'service' => $service ]);
         $employe = session('employe');
         $service = session('service');
        @endphp
        <x-nav1  :employe="$employe" :service="$service" />
       </header>
    
    
    <main>

        <section >
        @yield('content-1')
        </section>
 
        <section>
         @yield('content-2')
        </section>
         
    </main>
    
    <footer>
       @include('partials.footer')
    </footer>
</body>



</body>
</html>