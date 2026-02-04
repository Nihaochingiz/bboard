<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Объявления')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .logo {
            height: 50px;
            width: auto;
        }
        .site-header {
            background-color: #f8f9fa;
            padding: 15px 0;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .navbar-light {
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Шапка сайта -->
        <header class="site-header">
            <div class="row align-items-center">
                <!-- Логотип слева -->
                <div class="col-md-2">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('images/logo.jpg') }}" 
                             alt="Логотип сайта объявлений" 
                             class="logo">
                    </a>
                </div>
                
                <!-- Заголовок по центру -->
                <div class="col-md-8 text-center">
                    <h3 class="mb-0">
                        @hasSection('page_title')
                            @yield('page_title')
                        @else
                            Доска объявлений
                        @endif
                    </h3>
                </div>
                
                <!-- Пустое место справа для баланса -->
                <div class="col-md-2"></div>
            </div>
        </header>

        <!-- Навигационная панель -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a href="{{ route('index') }}" class="navbar-brand me-auto">Главная</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <!-- Пункты меню для гостей -->
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Вход</a>
                            </li>
                        @else
                            <!-- Пункты меню для авторизованных пользователей -->
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">Мои объявления</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Выход</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Основной заголовок -->
        <h1 class="my-3 text-center">Объявления</h1>
        
        <!-- Основной контент -->
        @yield('content')
        
        <!-- Футер -->
        <footer class="mt-5 pt-4 border-top text-center text-muted">
            <p>&copy; {{ date('Y') }} Доска объявлений. Все права защищены.</p>
        </footer>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>