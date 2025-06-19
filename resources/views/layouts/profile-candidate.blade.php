@vite(['resources/js/profile/profile.js'])
<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Tài Khoản Của Tôi</h1>
            <p class="text-gray-600">Quản lý thông tin cá nhân và hồ sơ của bạn</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                    <div class="p-6 text-center border-b border-gray-200">
                        <div class="relative mx-auto w-24 h-24 mb-4">
                            <img src="{{ auth()->user()->avatar_url }}" alt="Avatar"
                                class="w-full h-full rounded-full object-cover">
                            <button
                                class="absolute bottom-0 right-0 bg-primary-600 text-white rounded-full p-1 w-8 h-8 flex items-center justify-center">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        <h3 class="font-semibold text-lg">{{ auth()->user()->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ auth()->user()->candidate?->title }}</p>
                    </div>
                    <div class="p-0">
                        <nav>
                            <a href="{{ route('profile.candidate.info') }}"
                                class="flex items-center gap-3 px-6 py-3 border-l-4 border-primary-600 bg-primary-50 text-primary-700 font-medium">
                                <i class="fas fa-user"></i>
                                <span>Hồ sơ cá nhân</span>
                            </a>
                            <a href="#resume"
                                class="flex items-center gap-3 px-6 py-3 border-l-4 border-transparent hover:bg-gray-50 text-gray-700">
                                <i class="fas fa-file-alt"></i>
                                <span>CV của tôi</span>
                            </a>
                            <a href="#applications"
                                class="flex items-center gap-3 px-6 py-3 border-l-4 border-transparent hover:bg-gray-50 text-gray-700">
                                <i class="fas fa-paper-plane"></i>
                                <span>Việc đã ứng tuyển</span>
                            </a>
                            <a href="#saved"
                                class="flex items-center gap-3 px-6 py-3 border-l-4 border-transparent hover:bg-gray-50 text-gray-700">
                                <i class="fas fa-bookmark"></i>
                                <span>Việc đã lưu</span>
                            </a>
                            <a href="#notifications"
                                class="flex items-center gap-3 px-6 py-3 border-l-4 border-transparent hover:bg-gray-50 text-gray-700">
                                <i class="fas fa-bell"></i>
                                <span>Thông báo</span>
                            </a>
                            <a href="#settings"
                                class="flex items-center gap-3 px-6 py-3 border-l-4 border-transparent hover:bg-gray-50 text-gray-700">
                                <i class="fas fa-cog"></i>
                                <span>Cài đặt</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div id="profileContent" class="md:col-span-3">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
