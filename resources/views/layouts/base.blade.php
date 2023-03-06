<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    @guest
                    <li><a href="{{ route('index') }}" class="nav-link px-2 text-white fw-bold">Главная</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link px-2 text-white">О нас</a></li>
                    @endguest
                    @auth
                    @if(!Auth::user()->is_admin)
                    <li><a href="{{ route('index') }}" class="nav-link px-2 text-white fw-bold">Главная</a></li>
                    <li><a href="{{ route('home') }}" class="nav-link px-2 text-white">Личный кабинет</a></li>
                    <li><a href="{{ route('about') }}" class="nav-link px-2 text-white">О нас</a></li>
                    @elseif(Auth::user()->is_admin)
                    <li><a href="{{ route('admin') }}" class="nav-link px-2 text-white fw-bold">Редактирование туров</a></li>
                    <li><a href="{{ route('orders') }}" class="nav-link px-2 text-white">Обработка заявок</a></li>
                    @endif
                    @endauth
                </ul>
                <div class="text-end">
                    @guest
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Войти</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light">Регистрация</a>
                    @endguest
                    @auth
                    <form action="{{ route('logout') }}" method="POST" class="form-inline">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Выйти">
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>Телефон</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">+7(914)173-49-79</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">+7(939)682-73-76</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h5>E-mail</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">travel2sewer@mail.ru</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h5>Адрес</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ул. Красных Партизан, 559, Краснодар</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">ул. имени 40-летия Победы, 65, Краснодар</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h5>Режим работы</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Пн-Вс — 10:00-22:00</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-between pt-4 my-4 border-top">
                <p>© 2023 Travelling. Все права защищены</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark" href="#"><img src="img/icons/twitter.svg" alt=""></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><img src="img/icons/telegram.svg" alt=""></a></li>
                    <li class="ms-3"><a class="link-dark" href="#"><img src="img/icons/vk.svg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>