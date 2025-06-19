<x-guest-layout>
    <x-slot:title>Hoàn thành đăng ký</x-slot:title>
    @vite(['resources/js/profile/init-profile.js', 'resources/js/profile/intro-generate.js'])
    <main class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex items-center justify-center">
                    <div class="flex items-center">
                        <div
                            class="flex items-center justify-center w-8 h-8 bg-primary-600 text-white rounded-full text-sm font-medium">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="ml-2 text-sm font-medium text-primary-600">Thông tin cơ bản</div>
                    </div>
                    <div class="flex-1 mx-4 h-1 bg-primary-600 rounded"></div>
                    <div class="flex items-center">
                        <div
                            class="flex items-center justify-center w-8 h-8 bg-primary-600 text-white rounded-full text-sm font-medium">
                            2
                        </div>
                        <div class="ml-2 text-sm font-medium text-primary-600">Xác thực địa chỉ email</div>
                    </div>
                    <div class="flex-1 mx-4 h-1 bg-primary-600 rounded"></div>
                    <div class="flex items-center">
                        <div
                            class="flex items-center justify-center w-8 h-8 bg-primary-600 text-white rounded-full text-sm font-medium">
                            3
                        </div>
                        <div class="ml-2 text-sm font-medium text-primary-600">Hoàn thành</div>
                    </div>
                </div>
            </div>

            <div class="text-center mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900">Hoàn thiện hồ sơ của bạn</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Vui lòng chọn loại tài khoản và điền thông tin chi tiết
                </p>
            </div>

            <!-- Account Type Selection -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Chọn loại tài khoản</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <input type="radio" id="candidate" name="account_type" value="candidate" class="sr-only"
                            checked>
                        <label for="candidate"
                            class="account-type-card flex flex-col items-center p-6 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-primary-300 transition-colors">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-user text-2xl text-blue-600"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">Ứng viên</h4>
                            <p class="text-sm text-gray-600 text-center">Tôi đang tìm kiếm cơ hội việc làm</p>
                            <div
                                class="absolute top-4 right-4 w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center">
                                <div class="w-3 h-3 bg-primary-600 rounded-full hidden check-mark"></div>
                            </div>
                        </label>
                    </div>
                    <div class="relative">
                        <input type="radio" id="employer" name="account_type" value="employer" class="sr-only">
                        <label for="employer"
                            class="account-type-card flex flex-col items-center p-6 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-primary-300 transition-colors">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-building text-2xl text-green-600"></i>
                            </div>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">Nhà tuyển dụng</h4>
                            <p class="text-sm text-gray-600 text-center">Tôi muốn tuyển dụng nhân tài</p>
                            <div
                                class="absolute top-4 right-4 w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center">
                                <div class="w-3 h-3 bg-primary-600 rounded-full hidden check-mark"></div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Dynamic Form Container -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <!-- Candidate Form -->
                <div id="candidate-form" class="form-section">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Thông tin ứng viên</h3>
                    <form class="space-y-6" action="{{ route('profile.init.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Date of Birth -->
                            <div class="space-y-2">
                                <label for="candidate-dob" class="block text-sm font-medium text-gray-700">
                                    Ngày sinh <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="candidate-dob" name="date_of_birth" required
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <div id="candidate-dob-error" class="hidden text-sm text-red-600"></div>
                            </div>

                            <!-- Gender -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Giới tính <span class="text-red-500">*</span>
                                </label>
                                <select id="candidate-gender" name="gender" required
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    <option value="">Chọn giới tính</option>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                    <option value="other">Khác</option>
                                </select>
                                <div id="candidate-gender-error" class="hidden text-sm text-red-600"></div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="space-y-2">
                            <label for="candidate-address" class="block text-sm font-medium text-gray-700">
                                Địa chỉ <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="candidate-address" name="address" required
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập địa chỉ của bạn">
                            <div id="candidate-address-error" class="hidden text-sm text-red-600"></div>
                        </div>

                        <!-- Phone Number for Candidate -->
                        <div class="space-y-2">
                            <label for="candidate-phone" class="block text-sm font-medium text-gray-700">
                                Số điện thoại <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="candidate-phone" name="phone" required
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập số điện thoại của bạn">
                            <div id="candidate-phone-error" class="hidden text-sm text-red-600"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Experience Level -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Kinh nghiệm làm việc <span class="text-red-500">*</span>
                                </label>
                                <select id="candidate-experience" name="experience_level" required
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    <option value="">Chọn mức độ kinh nghiệm</option>
                                    <option value="fresher">Mới tốt nghiệp</option>
                                    <option value="junior">1-2 năm</option>
                                    <option value="middle">3-5 năm</option>
                                    <option value="senior">5+ năm</option>
                                    <option value="expert">10+ năm</option>
                                </select>
                                <div id="candidate-experience-error" class="hidden text-sm text-red-600"></div>
                            </div>

                            <!-- Desired Salary -->
                            <div class="space-y-2">
                                <label for="candidate-salary" class="block text-sm font-medium text-gray-700">
                                    Mức lương mong muốn (VNĐ)
                                </label>
                                <select id="candidate-salary" name="desired_salary"
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    <option value="">Chọn mức lương</option>
                                    <option value="under-10m">Dưới 10 triệu</option>
                                    <option value="10m-15m">10-15 triệu</option>
                                    <option value="15m-20m">15-20 triệu</option>
                                    <option value="20m-30m">20-30 triệu</option>
                                    <option value="30m-50m">30-50 triệu</option>
                                    <option value="over-50m">Trên 50 triệu</option>
                                    <option value="negotiable">Thỏa thuận</option>
                                </select>
                                <div id="candidate-salary-error" class="hidden text-sm text-red-600"></div>
                            </div>
                        </div>

                        <!-- Skills -->
                        <div class="space-y-2">
                            <label for="candidate-skills" class="block text-sm font-medium text-gray-700">
                                Kỹ năng chuyên môn <span class="text-red-500">*</span>
                            </label>
                            <textarea id="candidate-skills" name="skills" rows="3" required
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Ví dụ: JavaScript, React, Node.js, MySQL..."></textarea>
                            <p class="text-xs text-gray-500">Liệt kê các kỹ năng của bạn, cách nhau bằng dấu phẩy</p>
                            <div id="candidate-skills-error" class="hidden text-sm text-red-600"></div>
                        </div>

                        <!-- Bio -->
                        <div class="space-y-2">
                            <label for="candidate-bio" class="block text-sm font-medium text-gray-700">
                                Giới thiệu bản thân
                            </label>
                            <textarea id="candidate-bio" name="bio" rows="4"
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Viết vài dòng giới thiệu về bản thân, mục tiêu nghề nghiệp...">{{ session('ai_intro') ?? old('bio') }}</textarea>
                            <div id="candidate-bio-error" class="hidden text-sm text-red-600"></div>
                            <div class="flex gap-4">
                                <button type="button" name="type" value="new"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition">
                                    🪄 Tạo mới bằng AI
                                </button>
                                <button type="button" name="type" value="improve"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition">
                                    🛠 Cải thiện bằng AI
                                </button>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="flex justify-center pt-6 border-t">
                            <button type="submit"
                                class="px-8 py-3 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                Lưu thông tin
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Employer Form -->
                <div id="employer-form" class="form-section hidden">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">Thông tin công ty</h3>
                    <form class="space-y-6">
                        <!-- Company Name -->
                        <div class="space-y-2">
                            <label for="company-name" class="block text-sm font-medium text-gray-700">
                                Tên công ty <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="company-name" name="company_name" required
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập tên công ty">
                            <div id="company-name-error" class="hidden text-sm text-red-600"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Company Size -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Quy mô công ty <span class="text-red-500">*</span>
                                </label>
                                <select id="company-size" name="company_size" required
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    <option value="">Chọn quy mô công ty</option>
                                    <option value="1-10">1-10 nhân viên</option>
                                    <option value="11-50">11-50 nhân viên</option>
                                    <option value="51-200">51-200 nhân viên</option>
                                    <option value="201-500">201-500 nhân viên</option>
                                    <option value="501-1000">501-1000 nhân viên</option>
                                    <option value="1000+">Trên 1000 nhân viên</option>
                                </select>
                                <div id="company-size-error" class="hidden text-sm text-red-600"></div>
                            </div>

                            <!-- Industry -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Lĩnh vực hoạt động <span class="text-red-500">*</span>
                                </label>
                                <select id="company-industry" name="industry" required
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                    <option value="">Chọn lĩnh vực</option>
                                    <option value="technology">Công nghệ thông tin</option>
                                    <option value="finance">Tài chính - Ngân hàng</option>
                                    <option value="healthcare">Y tế - Sức khỏe</option>
                                    <option value="education">Giáo dục - Đào tạo</option>
                                    <option value="manufacturing">Sản xuất - Chế tạo</option>
                                    <option value="retail">Bán lẻ - Thương mại</option>
                                    <option value="construction">Xây dựng - Kiến trúc</option>
                                    <option value="media">Truyền thông - Quảng cáo</option>
                                    <option value="other">Khác</option>
                                </select>
                                <div id="company-industry-error" class="hidden text-sm text-red-600"></div>
                            </div>
                        </div>

                        <!-- Company Address -->
                        <div class="space-y-2">
                            <label for="company-address" class="block text-sm font-medium text-gray-700">
                                Địa chỉ công ty <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="company-address" name="company_address" required
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Nhập địa chỉ công ty">
                            <div id="company-address-error" class="hidden text-sm text-red-600"></div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tax Code -->
                            <div class="space-y-2">
                                <label for="tax-code" class="block text-sm font-medium text-gray-700">
                                    Mã số thuế <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="tax-code" name="tax_code" required
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                    placeholder="Nhập mã số thuế">
                                <div id="tax-code-error" class="hidden text-sm text-red-600"></div>
                            </div>

                            <!-- Website -->
                            <div class="space-y-2">
                                <label for="company-website" class="block text-sm font-medium text-gray-700">
                                    Website công ty
                                </label>
                                <input type="url" id="company-website" name="website"
                                    class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                    placeholder="https://example.com">
                                <div id="company-website-error" class="hidden text-sm text-red-600"></div>
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="space-y-2">
                            <label for="position" class="block text-sm font-medium text-gray-700">
                                Chức vụ của bạn <span class="text-red-500">*</span>
                            </label>
                            <select id="position" name="position" required
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <option value="">Chọn chức vụ</option>
                                <option value="ceo">Giám đốc điều hành (CEO)</option>
                                <option value="hr-manager">Trưởng phòng Nhân sự</option>
                                <option value="hr-specialist">Chuyên viên Nhân sự</option>
                                <option value="recruiter">Nhân viên Tuyển dụng</option>
                                <option value="manager">Quản lý</option>
                                <option value="other">Khác</option>
                            </select>
                            <div id="position-error" class="hidden text-sm text-red-600"></div>
                        </div>

                        <!-- Company Description -->
                        <div class="space-y-2">
                            <label for="company-description" class="block text-sm font-medium text-gray-700">
                                Mô tả về công ty <span class="text-red-500">*</span>
                            </label>
                            <textarea id="company-description" name="company_description" rows="4" required
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Mô tả về công ty, văn hóa làm việc, sản phẩm/dịch vụ..."></textarea>
                            <div id="company-description-error" class="hidden text-sm text-red-600"></div>
                        </div>

                        <!-- Benefits -->
                        <div class="space-y-2">
                            <label for="company-benefits" class="block text-sm font-medium text-gray-700">
                                Phúc lợi nhân viên
                            </label>
                            <textarea id="company-benefits" name="benefits" rows="3"
                                class="block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm"
                                placeholder="Ví dụ: Bảo hiểm sức khỏe, thưởng hiệu suất, du lịch hàng năm..."></textarea>
                            <div id="company-benefits-error" class="hidden text-sm text-red-600"></div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="flex justify-center pt-6 border-t">
                            <button type="submit"
                                class="px-8 py-3 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                Lưu thông tin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
