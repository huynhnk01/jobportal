<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JobPortal - Nền Tảng Tuyển Dụng Hàng Đầu Việt Nam</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/header.js'])
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <i class="fas fa-building text-xl md:text-2xl text-primary-600"></i>
                    <span class="text-xl md:text-2xl font-bold text-gray-900">JobPortal</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center gap-6">
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Việc Làm</a>
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Công Ty</a>
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Mức Lương</a>
                    <a href="#" class="text-gray-600 hover:text-primary-600 transition-colors">Blog</a>
                </nav>

                <!-- Desktop Actions -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="#"
                        class="px-4 py-2 border border-orange-500 text-orange-600 hover:bg-orange-50 rounded-md transition-colors">
                        Đăng Tin Tuyển Dụng
                    </a>

                    <!-- Guest Actions -->
                    @guest
                        <div class="guest-actions flex items-center gap-3">
                            <a href="/login"
                                class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-md transition-colors">
                                Đăng Nhập
                            </a>
                            <a href="/register"
                                class="px-4 py-2 bg-primary-600 text-white hover:bg-primary-700 rounded-md transition-colors">
                                Đăng Ký
                            </a>
                        </div>
                    @endguest

                    <!-- Auth Profile Dropdown (Desktop) -->
                    @auth
                        <div class="auth-profile relative group">
                            <button
                                class="flex items-center gap-2 px-3 py-2 rounded-md hover:bg-gray-100 transition-colors">
                                <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-8 h-8 rounded-full">
                                <div class="text-left">
                                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                </div>
                                <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                            </button>

                            <!-- Desktop Dropdown Menu -->
                            <div
                                class="absolute right-0 mt-2 w-64 bg-white rounded-md shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="py-2">
                                    <!-- User Info -->
                                    <div class="px-4 py-3 border-b border-gray-100">
                                        <div class="flex items-center gap-3">
                                            <img src="{{ auth()->user()->avatar_url }}" alt="Avatar"
                                                class="w-10 h-10 rounded-full">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                                <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                                <p class="text-xs text-primary-600">Ứng viên</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Menu Items -->
                                    <div class="py-1">
                                        <a href={{ route('profile.candidate.info') }}
                                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-user text-gray-400"></i>
                                            <span>Hồ sơ cá nhân</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-file-alt text-gray-400"></i>
                                            <span>CV của tôi</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-paper-plane text-gray-400"></i>
                                            <span>Việc đã ứng tuyển</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-bookmark text-gray-400"></i>
                                            <span>Việc đã lưu</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-bell text-gray-400"></i>
                                            <span>Thông báo</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-cog text-gray-400"></i>
                                            <span>Cài đặt</span>
                                        </a>
                                    </div>

                                    <div class="border-t border-gray-100 py-1">
                                        <a href="#"
                                            class="flex items-center gap-3 px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-question-circle text-gray-400"></i>
                                            <span>Trợ giúp</span>
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a href={{ route('logout') }}
                                                onclick="event.preventDefault();this.closest('form').submit();"
                                                class="flex items-center gap-3 px-4 py-2 text-red-600 hover:bg-red-50 transition-colors">
                                                <i class="fas fa-sign-out-alt text-red-500"></i>
                                                <span>Đăng xuất</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>

                <!-- Mobile/Tablet Actions -->
                <div class="flex lg:hidden items-center gap-2">
                    <!-- Notifications (Mobile) -->
                    <div class="auth-mobile-actions hidden">
                        <button class="p-2 text-gray-400 hover:text-gray-600 relative">
                            <i class="fas fa-bell text-lg"></i>
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                        </button>
                    </div>

                    <!-- Mobile Profile (when logged in) -->
                    @auth
                        <div class="auth-mobile-profile hidden">
                            <button class="mobile-profile-btn p-1">
                                <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-8 h-8 rounded-full">
                            </button>
                        </div>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button class="mobile-menu-btn p-2 text-gray-600 hover:text-gray-900 transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div class="mobile-menu fixed inset-0 bg-black bg-opacity-50 z-40 hidden">
            <div
                class="mobile-menu-content bg-white w-80 max-w-full h-full ml-auto transform translate-x-full transition-transform duration-300 ease-in-out">
                <!-- Mobile Menu Header -->
                <div class="flex items-center justify-between p-4 border-b">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-building text-xl text-primary-600"></i>
                        <span class="text-xl font-bold text-gray-900">JobPortal</span>
                    </div>
                    <button class="mobile-menu-close p-2 text-gray-600 hover:text-gray-900">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Mobile Menu Content -->
                <div class="p-4">
                    <!-- User Profile Section (when logged in) -->
                    @auth
                        <div class="auth-mobile-profile-section hidden mb-6 p-4 bg-gray-50 rounded-lg">
                            <div class="flex items-center gap-3 mb-4">
                                <img src="{{ auth()->user()->avatar_url }}" alt="Avatar"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <p class="font-medium text-gray-900">Nguyễn Văn A</p>
                                    <p class="text-sm text-gray-500">nguyenvana@example.com</p>
                                    <p class="text-sm text-primary-600">Ứng viên</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-2 text-center">
                                <div>
                                    <p class="text-lg font-bold text-gray-900">12</p>
                                    <p class="text-xs text-gray-500">Đơn ứng tuyển</p>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-gray-900">8</p>
                                    <p class="text-xs text-gray-500">Việc đã lưu</p>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-gray-900">156</p>
                                    <p class="text-xs text-gray-500">Lượt xem</p>
                                </div>
                            </div>
                        </div>
                    @endauth

                    <!-- Navigation Links -->
                    <nav class="space-y-1 mb-6">
                        <a href="#"
                            class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                            <i class="fas fa-briefcase text-gray-400 w-5"></i>
                            <span>Việc Làm</span>
                        </a>
                        <a href="#"
                            class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                            <i class="fas fa-building text-gray-400 w-5"></i>
                            <span>Công Ty</span>
                        </a>
                        <a href="#"
                            class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                            <i class="fas fa-dollar-sign text-gray-400 w-5"></i>
                            <span>Mức Lương</span>
                        </a>
                        <a href="#"
                            class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                            <i class="fas fa-blog text-gray-400 w-5"></i>
                            <span>Blog</span>
                        </a>
                    </nav>

                    <!-- Auth Menu Items (when logged in) -->
                    @auth
                        <div class="auth-mobile-menu hidden space-y-1 mb-6 border-t pt-4">
                            <a href="my-account.html"
                                class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                <i class="fas fa-user text-gray-400 w-5"></i>
                                <span>Hồ sơ cá nhân</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                <i class="fas fa-file-alt text-gray-400 w-5"></i>
                                <span>CV của tôi</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                <i class="fas fa-heart text-gray-400 w-5"></i>
                                <span>Việc làm đã lưu</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                <i class="fas fa-paper-plane text-gray-400 w-5"></i>
                                <span>Đơn ứng tuyển</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                <i class="fas fa-bell text-gray-400 w-5"></i>
                                <span>Thông báo</span>
                                <span
                                    class="ml-auto bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                            </a>
                            <a href="#"
                                class="flex items-center gap-3 px-3 py-3 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">
                                <i class="fas fa-cog text-gray-400 w-5"></i>
                                <span>Cài đặt</span>
                            </a>
                        </div>
                    @endauth

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <a href="#"
                            class="block w-full px-4 py-3 bg-orange-500 text-white text-center rounded-md hover:bg-orange-600 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Đăng Tin Tuyển Dụng
                        </a>

                        <!-- Guest Actions (when not logged in) -->
                        @guest
                            <div class="guest-mobile-actions space-y-2">
                                <a href="/login"
                                    class="block w-full px-4 py-3 border border-gray-300 text-gray-700 text-center rounded-md hover:bg-gray-50 transition-colors">
                                    Đăng Nhập
                                </a>
                                <a href="/register"
                                    class="block w-full px-4 py-3 bg-primary-600 text-white text-center rounded-md hover:bg-primary-700 transition-colors">
                                    Đăng Ký
                                </a>
                            </div>
                        @endguest

                        <!-- Auth Actions (when logged in) -->
                        @auth
                            <div class="auth-mobile-actions hidden space-y-2 border-t pt-4">
                                <a href="#"
                                    class="flex items-center justify-center gap-2 w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                                    <i class="fas fa-question-circle"></i>
                                    Trợ giúp
                                </a>
                                <a href="login.html"
                                    class="flex items-center justify-center gap-2 w-full px-4 py-3 text-red-600 border border-red-300 rounded-md hover:bg-red-50 transition-colors">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        @endauth
                    </div>
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
