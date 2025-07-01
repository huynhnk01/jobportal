<x-guest-layout>
    <x-slot:title>Quên mật khẩu</x-slot:title>
    @vite(['resources/js/auth/forgot-password.js'])
    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full">
            <!-- Step 1: Request Reset -->
            <div id="step1" class="bg-white rounded-lg shadow-md p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-key text-2xl text-primary-600"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Quên mật khẩu?</h1>
                    <p class="text-gray-600">
                        Không sao! Nhập email của bạn và chúng tôi sẽ gửi link đặt lại mật khẩu.
                    </p>
                </div>

                <!-- Form -->
                <form id="forgotPasswordForm" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Nhập email của bạn"
                                :value="old('email')"
                            >
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div id="emailError" class="hidden mt-2 text-sm text-red-600">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span><!-- JS add Error mesage --></span>
                        </div>
                    </div>

                    <button id="submitBtn"
                        type="submit" 
                        class="w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span id="submitText" class="submit-text">Gửi link đặt lại mật khẩu</span>
                        <i id="loading-icon" class="fas fa-spinner fa-spin ml-2 hidden"></i>
                    </button>
                </form>

                <!-- Alternative Options -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Nhớ mật khẩu rồi? 
                        <a href={{ route('login') }} class="font-medium text-primary-600 hover:text-primary-500 transition-colors">
                            Đăng nhập ngay
                        </a>
                    </p>
                </div>

                <!-- Help Section -->
                <div class="mt-8 p-4 bg-gray-50 rounded-md">
                    <h3 class="text-sm font-medium text-gray-900 mb-2">Cần trợ giúp?</h3>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Kiểm tra thư mục spam/junk mail</li>
                        <li>• Đảm bảo email chính xác</li>
                        <li>• Liên hệ hỗ trợ nếu không nhận được email</li>
                    </ul>
                    <a href="#" class="inline-flex items-center mt-3 text-sm text-primary-600 hover:text-primary-500 transition-colors">
                        <i class="fas fa-headset mr-2"></i>
                        Liên hệ hỗ trợ
                    </a>
                </div>
            </div>

            <!-- Step 2: Email Sent Confirmation -->
            <div id="step2" class="bg-white rounded-lg shadow-md p-8 hidden">
                <!-- Success Icon -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-check text-2xl text-green-600"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Email đã được gửi!</h1>
                    <p class="text-gray-600">
                        Chúng tôi đã gửi link đặt lại mật khẩu đến email:
                    </p>
                    <p id="sentEmail" class="font-medium text-gray-900 mt-2"></p>
                </div>

                <!-- Instructions -->
                <div class="bg-blue-50 border border-blue-200 rounded-md p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Hướng dẫn tiếp theo:</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <ol class="list-decimal list-inside space-y-1">
                                    <li>Kiểm tra hộp thư email của bạn</li>
                                    <li>Click vào link trong email</li>
                                    <li>Tạo mật khẩu mới</li>
                                    <li>Đăng nhập với mật khẩu mới</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timer and Resend -->
                <div class="text-center mb-6">
                    <p class="text-sm text-gray-600 mb-3">
                        Không nhận được email? 
                    </p>
                    <div id="resendTimer" class="text-sm text-gray-500 mb-3">
                        Bạn có thể gửi lại sau <span id="countdown">60</span> giây
                    </div>
                    <button 
                        id="resendBtn" 
                        class="px-4 py-2 text-sm font-medium text-primary-600 border border-primary-600 rounded-md hover:bg-primary-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled
                    >
                        <i class="fas fa-redo mr-2"></i>
                        Gửi lại email
                    </button>
                </div>

                <!-- Back to Login -->
                <div class="text-center">
                    <a href={{ route('login') }} class="inline-flex items-center text-sm text-gray-600 hover:text-gray-900 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Quay lại trang đăng nhập
                    </a>
                </div>

                <!-- Additional Help -->
                <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Vẫn không nhận được email?</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Kiểm tra thư mục spam/junk</li>
                                    <li>Thêm noreply@jobportal.vn vào danh sách an toàn</li>
                                    <li>Thử với email khác nếu có</li>
                                </ul>
                                <a href="#" class="inline-flex items-center mt-3 font-medium text-yellow-800 hover:text-yellow-900">
                                    <i class="fas fa-phone mr-2"></i>
                                    Liên hệ: (028) 1234 5678
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
