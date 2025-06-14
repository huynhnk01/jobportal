<x-guest-layout>
    <x-slot:title>Đăng nhập</x-slot:title>
    @vite(['resources/js/auth/login.js'])
    <!-- Main content -->
    <main class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="bg-white rounded-lg shadow-md p-8">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-sign-in-alt text-2xl text-blue-600"></i>
                </div>
                <div class="text-center">
                    <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Đăng nhập vào tài khoản</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Hoặc
                        <a href={{ route('register') }} class="font-medium text-primary-600 hover:text-primary-500">
                            đăng ký tài khoản mới
                        </a>
                    </p>
                </div>

                <!-- Client-side errors summary -->
                <x-form-errors id="client-errors" type="client" class="hidden" />

                <!-- Server-side errors summary -->
                @if ($errors->any())
                    <x-form-errors id="server-errors" type="server" :errors="$errors" />
                @endif

                <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email-address" class="sr-only">Email</label>
                            <input id="email-address" name="email" type="email" :value="old('email')"
                                autocomplete="email" required
                                class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
                                placeholder="Email">
                        </div>
                        <div>
                            <label for="password" class="sr-only">Mật khẩu</label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 sm:text-sm"
                                placeholder="Mật khẩu">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <div class="text-sm">
                                <a href="{{ route('password.request') }}"
                                    class="font-medium text-primary-600 hover:text-primary-500">
                                    Quên mật khẩu?
                                </a>
                            </div>
                        @endif
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-lock text-primary-500 group-hover:text-primary-400"></i>
                            </span>
                            Đăng nhập
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-50 text-gray-500">
                                Hoặc đăng nhập với
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div>
                            <a href="{{ url('/login/facebook') }}"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ url('/login/google') }}"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                        <div>
                            <a href="{{ url('/login/linkedin') }}"
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
