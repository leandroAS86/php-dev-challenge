<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts.header')
    
<body>

    @include('layouts.nav')

    <div class="blog-header">        
        <div class="container">
            <h1 class="blog-title"> Polvo </h1>
            <p class="lead blog-description"> Produtos </p>
            <hr>
        </div>
    </div>

    

    <div class="container">
        <div class="row">                           
            <main class="py-4">
                @yield('content')
            </main>            
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>