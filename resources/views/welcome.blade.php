<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">

        <title>Recipes App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="main-container">

        <div class="container">

            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <!-- <div class="col-4 pt-1">
                    <a class="text-muted" href="#">Subscribe</a>
                    </div> -->
                    <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="/">My Recipe App</a>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                    </a>
                    <!-- <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> -->
                    </div>
                </div>
            </header>
            
            <div class="nav-scroller py-1 mb-2">
                <nav class="nav d-flex justify-content-between">
                    <a class="p-2 text-muted" href="#">Mediterranean diet</a>
                    <a class="p-2 text-muted" href="#">Cooking</a>
                    <a class="p-2 text-muted" href="#">Ketogenic diet</a>
                </nav>
            </div>
        
        </div>
            <section id="app">
            </section>

        {{-- <div class="container"> --}}
        <footer class="blog-footer">
            <p>&copy; My Recipe App - 2018</p>
            <p>
                <a href="#">Back to top</a>
            </p>
        </footer>
        {{-- </div> --}}

        </div>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="/js/holder.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
