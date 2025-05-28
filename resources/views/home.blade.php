<x-app-layout>
    @vite(['resources/js/home.js'])
    <!-- Hero Section -->
    <section class="gradient-bg text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Tìm Công Việc Mơ Ước Của Bạn</h1>
            <p class="text-xl mb-8 text-blue-100">Khám phá hàng nghìn cơ hội việc làm từ các công ty hàng đầu</p>

            <!-- Search Bar -->
            <div class="max-w-4xl mx-auto bg-white rounded-lg p-4 shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-2">
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" placeholder="Tìm kiếm công việc, công ty..."
                                class="w-full pl-10 h-12 border border-gray-300 rounded-md text-gray-900 focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                    </div>
                    <div class="relative">
                        <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" placeholder="Địa điểm"
                            class="w-full pl-10 h-12 border border-gray-300 rounded-md text-gray-900 focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>
                    <button class="h-12 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors">
                        Tìm Kiếm
                    </button>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl font-bold">15,000+</div>
                    <div class="text-blue-200">Việc Làm</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold">5,000+</div>
                    <div class="text-blue-200">Công Ty</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold">100,000+</div>
                    <div class="text-blue-200">Ứng Viên</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold">98%</div>
                    <div class="text-blue-200">Hài Lòng</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Việc Làm Nổi Bật</h2>
                <button
                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
                    Xem Tất Cả
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Job Card 1 -->
                <div class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-primary-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Senior Frontend Developer</h3>
                                    <p class="text-gray-600">FPT Software</p>
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Hot</span>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Hà Nội, Hồ Chí Minh</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-dollar-sign"></i>
                                <span>25 - 40 triệu VND</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-clock"></i>
                                <span>2 ngày trước</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">React</span>
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">TypeScript</span>
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Next.js</span>
                        </div>
                    </div>
                </div>

                <!-- Job Card 2 -->
                <div class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-red-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">DevOps Engineer</h3>
                                    <p class="text-gray-600">Viettel Solutions</p>
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">Urgent</span>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Hà Nội</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-dollar-sign"></i>
                                <span>30 - 50 triệu VND</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-clock"></i>
                                <span>1 ngày trước</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">AWS</span>
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Docker</span>
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Kubernetes</span>
                        </div>
                    </div>
                </div>

                <!-- Job Card 3 -->
                <div class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-green-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Product Manager</h3>
                                    <p class="text-gray-600">Shopee Vietnam</p>
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Remote</span>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Remote, Hồ Chí Minh</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-dollar-sign"></i>
                                <span>35 - 60 triệu VND</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-clock"></i>
                                <span>3 ngày trước</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Product
                                Strategy</span>
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Analytics</span>
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Agile</span>
                        </div>
                    </div>
                </div>

                <!-- Job Card 4 -->
                <div class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-purple-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">UI/UX Designer</h3>
                                    <p class="text-gray-600">Tiki Corporation</p>
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">New</span>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Hồ Chí Minh</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-dollar-sign"></i>
                                <span>20 - 35 triệu VND</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-clock"></i>
                                <span>5 giờ trước</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Figma</span>
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Adobe
                                XD</span>
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Prototyping</span>
                        </div>
                    </div>
                </div>

                <!-- Job Card 5 -->
                <div class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-orange-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Data Scientist</h3>
                                    <p class="text-gray-600">VNG Corporation</p>
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-full">Hot</span>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Hồ Chí Minh</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-dollar-sign"></i>
                                <span>40 - 70 triệu VND</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-clock"></i>
                                <span>1 ngày trước</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Python</span>
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Machine
                                Learning</span>
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">SQL</span>
                        </div>
                    </div>
                </div>

                <!-- Job Card 6 -->
                <div class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-indigo-600"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Backend Developer</h3>
                                    <p class="text-gray-600">Grab Vietnam</p>
                                </div>
                            </div>
                            <span
                                class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">Remote</span>
                        </div>

                        <div class="space-y-3 mb-4">
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Remote, Hà Nội</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-dollar-sign"></i>
                                <span>28 - 45 triệu VND</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600">
                                <i class="fas fa-clock"></i>
                                <span>4 ngày trước</span>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Java</span>
                            <span class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Spring
                                Boot</span>
                            <span
                                class="px-2 py-1 border border-gray-300 text-gray-700 text-xs rounded-md">Microservices</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Companies -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Công Ty Hàng Đầu</h2>
                <p class="text-gray-600">Khám phá cơ hội nghề nghiệp tại các công ty uy tín</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-2xl font-bold text-primary-600">F</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">FPT Software</h3>
                    <p class="text-sm text-gray-600">120+ việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-2xl font-bold text-primary-600">V</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Viettel</h3>
                    <p class="text-sm text-gray-600">85+ việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-2xl font-bold text-primary-600">S</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Shopee</h3>
                    <p class="text-sm text-gray-600">95+ việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-2xl font-bold text-primary-600">G</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Grab</h3>
                    <p class="text-sm text-gray-600">67+ việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-2xl font-bold text-primary-600">V</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">VNG</h3>
                    <p class="text-sm text-gray-600">78+ việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer text-center p-6">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-2xl font-bold text-primary-600">T</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-1">Tiki</h3>
                    <p class="text-sm text-gray-600">45+ việc làm</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Danh Mục Nghề Nghiệp</h2>
                <p class="text-gray-600">Tìm kiếm theo lĩnh vực bạn quan tâm</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">💻</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Công Nghệ Thông Tin</h3>
                    <p class="text-sm text-gray-600">5,234 việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📈</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Marketing & Sales</h3>
                    <p class="text-sm text-gray-600">2,156 việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">💰</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Tài Chính & Kế Toán</h3>
                    <p class="text-sm text-gray-600">1,876 việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">👥</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Nhân Sự</h3>
                    <p class="text-sm text-gray-600">987 việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🎨</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Thiết Kế</h3>
                    <p class="text-sm text-gray-600">1,234 việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">📚</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Giáo Dục</h3>
                    <p class="text-sm text-gray-600">876 việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🏥</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Y Tế</h3>
                    <p class="text-sm text-gray-600">654 việc làm</p>
                </div>

                <div
                    class="bg-white rounded-lg border border-gray-200 hover-shadow transition-all cursor-pointer p-6 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl">🔧</span>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Khác</h3>
                    <p class="text-sm text-gray-600">2,345 việc làm</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 gradient-bg text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Bạn Là Nhà Tuyển Dụng?</h2>
            <p class="text-xl mb-8 text-blue-100">Đăng tin tuyển dụng và tìm kiếm ứng viên phù hợp ngay hôm nay</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button
                    class="px-6 py-3 bg-white text-primary-600 rounded-md hover:bg-gray-100 transition-colors font-medium">
                    Đăng Tin Miễn Phí
                </button>
                <button
                    class="px-6 py-3 border border-white text-white rounded-md hover:bg-white hover:text-primary-600 transition-colors font-medium">
                    Tìm Hiểu Thêm
                </button>
            </div>
        </div>
    </section>
</x-app-layout>
