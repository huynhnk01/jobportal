<x-guest-layout>
    <x-slot:title>Đăng ký</x-slot:title>
    @vite(['resources/js/auth/register.js'])
    <!-- Main content -->
    <main class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">Add commentMore actions
                    <i class="fas fa-edit text-2xl text-blue-600"></i>
                </div>
                <div class="text-center">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Đăng ký tài khoản mới</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Hoặc
                        <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:text-primary-500">
                            đăng nhập nếu đã có tài khoản
                        </a>
                    </p>
                </div>

                <!-- Server-side errors summary -->
                @if ($errors->any())
                    <x-form-errors id="server-errors" type="server" :errors="$errors" />
                @endif

                <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <!-- Full Name Field -->
                    <div class="space-y-2">
                        <label for="full-name" class="block text-sm font-medium text-gray-700">
                            Họ và tên <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="full-name" name="name" type="text" autocomplete="name" required
                                class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập họ và tên của bạn" value="{{ old('name') }}">
                        </div>
                        <div id="name-error" class="hidden mt-1 text-sm text-red-600">
                            <!-- Error message -->
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="email-address" name="email" type="email" autocomplete="email" required
                                class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập địa chỉ email của bạn" value="{{ old('email') }}">
                        </div>
                        <div id="email-error" class="mt-1 text-sm text-red-600">
                            <!-- Error message -->
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Mật khẩu <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập mật khẩu của bạn" value="{{ old('password') }}">
                            <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                            </button>
                        </div>
                        <div id="password-error" class="hidden mt-1 text-sm text-red-600">
                            <!-- Error message -->
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
                                style="width: 0%">
                            </div>
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

                    <!-- Password Confirmation Field -->
                    <div class="space-y-2">
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700">
                            Xác nhận mật khẩu <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input id="password-confirm" name="password_confirmation" type="password"
                                autocomplete="new-password" required
                                class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập lại mật khẩu của bạn" value="{{ old('password_confirmation') }}">
                            <button type="button" id="toggle-password-confirm"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                            </button>
                        </div>
                        <div id="password-confirmation-error" class="hidden mt-1 text-sm text-red-600">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                        <div id="confirmSuccess" class="hidden mt-2 text-sm text-green-600">
                            <i class="fas fa-check-circle mr-1"></i>
                            <span>Mật khẩu khớp</span>
                        </div>
                    </div>

                    <!-- User Type Selection -->
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-gray-700">
                            Loại tài khoản <span class="text-red-500">*</span>
                        </label>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="user-type-candidate" name="user_type" type="radio" value="candidate"
                                    checked class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300">
                                <label for="user-type-candidate" class="ml-3 block text-sm text-gray-700">
                                    Tôi là ứng viên tìm việc
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="user-type-employer" name="user_type" type="radio" value="employer"
                                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300">
                                <label for="user-type-employer" class="ml-3 block text-sm text-gray-700">
                                    Tôi là nhà tuyển dụng
                                </label>
                            </div>
                        </div>
                        <div id="user-type-error" class="hidden mt-1 text-sm text-red-600">
                            <!-- Backend error for user type will be displayed here -->
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="space-y-2">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" required
                                    class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-medium text-gray-700">
                                    Tôi đồng ý với <span class="text-red-500">*</span>
                                </label>
                                <p class="text-gray-500">
                                    <a href="#" class="text-primary-600 hover:text-primary-500">Điều khoản sử
                                        dụng</a> và
                                    <a href="#" class="text-primary-600 hover:text-primary-500">Chính sách bảo
                                        mật</a>
                                </p>
                            </div>
                        </div>
                        <div id="terms-error" class="hidden mt-1 text-sm text-red-600">
                            <!-- Backend error for terms will be displayed here -->
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" id="register-button"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-user-plus text-primary-500 group-hover:text-primary-400"></i>
                            </span>
                            <span id="button-text">Đăng ký</span>
                            <i id="loading-icon" class="fas fa-spinner fa-spin ml-2 hidden"></i>
                        </button>
                    </div>
                </form>

                <!-- Social Register Options -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-50 text-gray-500">
                                Hoặc đăng ký với
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div>
                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
