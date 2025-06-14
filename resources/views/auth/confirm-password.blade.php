<x-guest-layout>
    <x-slot:title>{{ __('Verify Email Address') }}</x-slot:title>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full">
            <!-- Confirm Password Card -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-amber-600"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Xác nhận mật khẩu</h1>
                    <p class="text-gray-600">
                        Vui lòng nhập mật khẩu của bạn để tiếp tục
                    </p>
                </div>

                <!-- Alert Messages -->
                <div id="alertContainer" class="mb-6 hidden">
                    <!-- Error Message -->
                    <div id="errorAlert" class="p-4 bg-red-50 border border-red-200 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-800" id="errorMessage">Mật khẩu không chính xác. Vui lòng thử lại.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Confirm Password Form -->
                <form method="POST" action="{{ route('password.confirm') }}" id="confirmPasswordForm" class="space-y-6">
                    @csrf
                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Mật khẩu <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required
                                autocomplete="current-password"
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Nhập mật khẩu của bạn"
                            >
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors"></i>
                            </button>
                        </div>
                        <div id="passwordError" class="hidden mt-2 text-sm text-red-600">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span>Vui lòng nhập mật khẩu</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        id="submitBtn"
                        class="w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span class="submit-text">Xác nhận</span>
                        <i class="fas fa-spinner fa-spin ml-2 hidden loading-icon"></i>
                    </button>
                </form>

                <!-- Additional Info -->
                <div class="mt-8 text-center">
                    <a href="{{ route('password.request') }}" class="text-sm text-primary-600 hover:text-primary-500 transition-colors">
                        <i class="fas fa-question-circle mr-1"></i>
                        Quên mật khẩu?
                    </a>
                </div>

                <!-- Security Notice -->
                <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-blue-800">Lưu ý bảo mật</h3>
                            <div class="mt-2 text-sm text-blue-700">
                                <ul class="space-y-1">
                                    <li>• Thao tác này yêu cầu xác thực để bảo mật</li>
                                    <li>• Mật khẩu của bạn được mã hóa và bảo vệ</li>
                                    <li>• Không chia sẻ mật khẩu với bất kỳ ai</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
