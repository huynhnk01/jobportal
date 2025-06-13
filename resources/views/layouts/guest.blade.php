<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - JobPortal</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white border-b">
            <div class="container mx-auto px-4 py-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <i class="fas fa-building text-2xl text-primary-600"></i>
                        <span class="text-2xl font-bold text-gray-900">JobPortal</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        {{ $slot }}

        <!-- Footer -->
        <footer class="bg-white border-t py-8">
            <div class="container mx-auto px-4 text-center text-gray-500 text-sm">
                <p>&copy; 2025 JobPortal. Tất cả quyền được bảo lưu.</p>
                <div class="mt-2">
                    <a href="#" class="text-gray-600 hover:text-gray-900 mx-2">Chính sách bảo mật</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 mx-2">Điều khoản sử dụng</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 mx-2">Trợ giúp</a>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
