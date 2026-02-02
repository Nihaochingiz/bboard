<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Объявления')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        .logo {
            height: 50px;
            width: auto;
        }
        .site-header {
            background-color: #f8f9fa;
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 5px;
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
        
        @yield('content')
        
        <!-- Опционально: футер -->
        <footer class="mt-5 pt-4 border-top text-center text-muted">
            <p>&copy; {{ date('Y') }} Доска объявлений. Все права защищены.</p>
        </footer>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>