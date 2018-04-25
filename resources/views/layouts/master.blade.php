
@include('layouts.header')
    
<body>

    @include('layouts.nav')

    <div class="blog-header">        
        <div class="container">
            <h1 class="blog-title"> Polvo </h1>
            
            <hr>
        </div>
    </div>

    <p id="page"> </p>
    

    <div class="container">
        <div class="row">                           
            <main class="py-4">
                @yield('content')
            </main>            
        </div>
    </div>

    @include('layouts.footer')

    <script src="{{asset('js/page.js')}}"></script>

</body>

</html>