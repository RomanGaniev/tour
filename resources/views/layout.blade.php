<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туристическая фирма</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>

<body>

    <header>
        <div
            class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            
            <div class="media">
  <img src="/img/lay_icon.jpg" class="mr-3" alt="...">
  <div class="media-body">
  </div>
</div>

            <h5 class="my-0 mr-md-auto font-weight-normal">
                <a class="p-2 text-dark" href="{{ route('index') }}">
                    Туристическая фирма
                </a>
            </h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="{{ route('orders.index') }}">Заказы</a>
                <a class="p-2 text-dark" href="{{ route('permits.index') }}">Путевки</a>
                <a class="p-2 text-dark" href="{{ route('tours.index') }}">Туры</a>
                <a class="p-2 text-dark" href="{{ route('operators.index') }}">Туроператоры</a>
                <a class="p-2 text-dark" href="{{ route('countries.index') }}">Страны</a>
                
                
                
            </nav>
            <a class="btn btn-outline-primary" href="#">Кнопка</a>
        </div>
    </header>



    @yield('content')



    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 1998-2020 Туристическая фирма</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>

</body>

</html>
