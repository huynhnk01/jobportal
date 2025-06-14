<x-guest-layout>
    <x-slot:title>Đặt lại mật khẩu</x-slot:title>
    @vite(['resources/js/auth/reset-password.js'])
    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center px-4 py-12">
        <div class="max-w-md w-full">
            <!-- Reset Password Form -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-key text-2xl text-blue-600"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Đặt lại mật khẩu</h1>
                    <p class="text-gray-600">
                        Nhập thông tin để đặt lại mật khẩu của bạn
                    </p>
                </div>

                <!-- Alert Messages -->
                <div id="alertContainer" class="mb-6 hidden">
                    <div id="successAlert" class="hidden p-4 bg-green-50 border border-green-200 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-800" id="successMessage"></p>
                            </div>
                        </div>
                    </div>

                    <div id="errorAlert" class="hidden p-4 bg-red-50 border border-red-200 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-800" id="errorMessage"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reset Password Form -->
                <form id="resetPasswordForm" class="space-y-6">
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" required autocomplete="email"
                                value="{{ $request->email }}"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="newPassword" class="block text-sm font-medium text-gray-700 mb-2">
                            Mật khẩu mới <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-key text-gray-400"></i>
                            </div>
                            <input type="password" id="newPassword" name="password" required
                                autocomplete="new-password"
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Nhập mật khẩu mới">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <button type="button" id="toggleNewPassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors"></i>
                            </button>
                        </div>
                        <div id="newPasswordError" class="hidden mt-2 text-sm text-red-600">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span></span>
                        </div>
                    </div>

                    <!-- Password Strength Meter -->
                    <div id="passwordStrength" class="hidden">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-600">Độ mạnh mật khẩu:</span>
                            <span id="strengthText" class="text-sm font-medium"></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2 mb-3">
                            <div id="strengthBar" class="h-2 rounded-full transition-all duration-300"
                                style="width: 0%"></div>
                        </div>

                        <!-- Password Requirements -->
                        <div class="grid grid-cols-1 gap-2 text-xs">
                            <div id="req-length" class="flex items-center gap-2 text-gray-500">
                                <i class="fas fa-circle text-xs w-3"></i>
                                <span>Ít nhất 8 ký tự</span>
                            </div>
                            <div id="req-uppercase" class="flex items-center gap-2 text-gray-500">
                                <i class="fas fa-circle text-xs w-3"></i>
                                <span>Có chữ hoa (A-Z)</span>
                            </div>
                            <div id="req-lowercase" class="flex items-center gap-2 text-gray-500">
                                <i class="fas fa-circle text-xs w-3"></i>
                                <span>Có chữ thường (a-z)</span>
                            </div>
                            <div id="req-number" class="flex items-center gap-2 text-gray-500">
                                <i class="fas fa-circle text-xs w-3"></i>
                                <span>Có số (0-9)</span>
                            </div>
                            <div id="req-special" class="flex items-center gap-2 text-gray-500">
                                <i class="fas fa-circle text-xs w-3"></i>
                                <span>Có ký tự đặc biệt (!@#$...)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm New Password -->
                    <div>
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-2">
                            Xác nhận mật khẩu mới <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-shield-alt text-gray-400"></i>
                            </div>
                            <input type="password" id="confirmPassword" name="password_confirmation" required
                                autocomplete="new-password"
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Nhập lại mật khẩu mới">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            <button type="button" id="toggleConfirmPassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors"></i>
                            </button>
                        </div>
                        <div id="confirmError" class="hidden mt-2 text-sm text-red-600">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            <span></span>
                        </div>
                        <div id="confirmSuccess" class="hidden mt-2 text-sm text-green-600">
                            <i class="fas fa-check-circle mr-1"></i>
                            <span>Mật khẩu khớp</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submitBtn"
                        class="w-full flex justify-center items-center px-4 py-3 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        <span class="submit-text">Đặt lại mật khẩu</span>
                        <i class="fas fa-spinner fa-spin ml-2 hidden loading-icon"></i>
                    </button>
                </form>

                <!-- Security Notice -->
                <div class="mt-8 p-4 bg-amber-50 border border-amber-200 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-shield-alt text-amber-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-amber-800">Lưu ý bảo mật</h3>
                            <div class="mt-2 text-sm text-amber-700">
                                <ul class="space-y-1">
                                    <li>• Mật khẩu mới sẽ thay thế hoàn toàn mật khẩu cũ</li>
                                    <li>• Bạn sẽ cần đăng nhập lại trên tất cả thiết bị</li>
                                    <li>• Thông tin này được mã hóa và bảo mật</li>
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
