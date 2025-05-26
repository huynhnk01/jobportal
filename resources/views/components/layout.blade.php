<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPortal - Nền Tảng Tuyển Dụng Hàng Đầu Việt Nam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <i class="fas fa-building text-2xl text-primary-600"></i>
                    <span class="text-2xl font-bold text-gray-900">JobPortal</span>
                </div>
                <nav class="hidden md:flex items-center gap-6">
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Việc Làm</a>
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Công Ty</a>
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Mức Lương</a>
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Blog</a>
                </nav>
                <div class="flex items-center gap-3">
                    <x-button href="/login" class="border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Đăng Nhập
                    </x-button>
                    <x-button href="/register" class="bg-primary-600 text-white hover:bg-primary-700">
                        Đăng Ký
                    </x-button>
                    <x-button href="#" class="border border-orange-500 text-orange-600 hover:bg-orange-50">
                        Đăng Tin Tuyển Dụng
                    </x-button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    {{ $slot }}

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fas fa-building text-2xl text-blue-400"></i>
                        <span class="text-2xl font-bold">JobPortal</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Nền tảng tuyển dụng hàng đầu Việt Nam, kết nối ứng viên và nhà tuyển dụng.
                    </p>
                    <div class="flex gap-4">
                        <div
                            class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center cursor-pointer hover:bg-primary-600 transition-colors">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center cursor-pointer hover:bg-primary-600 transition-colors">
                            <i class="fab fa-twitter text-sm"></i>
                        </div>
                        <div
                            class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center cursor-pointer hover:bg-primary-600 transition-colors">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">Dành Cho Ứng Viên</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Tìm Việc Làm</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Công Ty</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Mức Lương</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tạo CV</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">Dành Cho Nhà Tuyển Dụng</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Đăng Tin Tuyển Dụng</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tìm Kiếm CV</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Bảng Giá</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Dành Cho Nhà Tuyển Dụng</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-semibold mb-4">Hỗ Trợ</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Trung Tâm Hỗ Trợ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Liên Hệ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Chính Sách Bảo Mật</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Điều Khoản Sử Dụng</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 JobPortal. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>
</body>

</html>
