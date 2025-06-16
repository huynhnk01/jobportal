<x-guest-layout>
    <x-slot:title>Xác nhận mail</x-slot:title>
    @vite(['resources/js/auth/verify-email.js'])
    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full">
            <!-- Email Verification Card -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-envelope-open text-3xl text-blue-600"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-3">Xác thực địa chỉ email</h1>
                    <p class="text-gray-600 leading-relaxed">
                        Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, bạn có thể xác thực địa chỉ email bằng cách nhấp vào
                        liên kết mà chúng tôi vừa gửi cho bạn không?
                    </p>
                </div>

                <!-- User Email Display -->
                <div class="mb-8 p-4 bg-blue-50 border border-blue-200 rounded-md">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-user-circle text-blue-600 text-2xl"></i>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-medium text-blue-900">Email đã đăng ký:</p>
                            <p class="text-sm text-blue-700" id="userEmail">{{ auth()->user()->email }}</p>
                        </div>
                        <div class="flex-shrink-0">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <i class="fas fa-clock mr-1"></i>
                                Chờ xác thực
                            </span>
                        </div>
                    </div>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <!-- Status Messages -->
                <div id="statusContainer" class="mb-6 hidden">
                    <!-- Success Message -->
                    <div id="successMessage" class="hidden p-4 bg-green-50 border border-green-200 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-800">
                                    <span class="font-medium">Email đã được gửi!</span>
                                    Vui lòng kiểm tra hộp thư của bạn.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="hidden p-4 bg-red-50 border border-red-200 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-800" id="errorText"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Rate Limit Message -->
                    <div id="rateLimitMessage" class="hidden p-4 bg-yellow-50 border border-yellow-200 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-hourglass-half text-yellow-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-800">
                                    <span class="font-medium">Vui lòng chờ!</span>
                                    Bạn có thể gửi lại email sau <span id="countdown" class="font-bold">60</span> giây.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <!-- Resend Email Button -->
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        {{-- <input type="hidden" name="email" value="{{ $user->email }}"> --}}
                        <button id="resendBtn" type="submit"
                            class="w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                            <span class="resend-text">Gửi lại email xác thực</span>
                            <i class="fas fa-spinner fa-spin ml-2 hidden loading-icon"></i>
                        </button>
                    </form>
                </div>

                <!-- Email Instructions -->
                <div class="mt-8 p-4 bg-gray-50 rounded-md">
                    <h3 class="text-sm font-medium text-gray-900 mb-3">
                        <i class="fas fa-info-circle mr-2 text-primary-600"></i>
                        Hướng dẫn kiểm tra email
                    </h3>
                    <ul class="text-sm text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            <span>Kiểm tra hộp thư đến (Inbox)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            <span>Kiểm tra thư mục spam/junk</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            <span>Tìm email từ <strong>{{ config('mail.from.address') }}</strong></span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5 text-xs"></i>
                            <span>Nhấp vào liên kết "Xác thực email"</span>
                        </li>
                    </ul>
                </div>

                <!-- Troubleshooting -->
                <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-question-circle text-yellow-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-yellow-800">Không nhận được email?</h3>
                            <div class="mt-2 text-sm text-yellow-700">
                                <ul class="list-disc list-inside space-y-1">
                                    <li>Kiểm tra kết nối internet</li>
                                    <li>Đảm bảo email chính xác</li>
                                    <li>Chờ vài phút rồi kiểm tra lại</li>
                                    <li>Liên hệ hỗ trợ: support@jobportal.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
