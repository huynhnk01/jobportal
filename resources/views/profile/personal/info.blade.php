<!-- Content will be loaded here via AJAX -->
<div id="content-area">
    <!-- Basic Info Section (Default) -->
    <div id="basic-info-section" class="content-section">
        <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Thông tin cơ bản</h2>
                    <p class="text-gray-600">Cập nhật thông tin cá nhân của bạn</p>
                </div>
                <div class="flex items-center gap-3">
                    <button id="cancelBtn"
                        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors">
                        <i class="fas fa-times mr-2"></i>
                        Hủy
                    </button>
                    <button id="saveBtn" form="formPersonalInfo"
                        class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        Lưu thay đổi
                    </button>
                </div>
            </div>

            <form id="formPersonalInfo" class="space-y-6" enctype="multipart/form-data">
                <!-- Avatar Section -->
                <div class="border-b border-gray-200 pb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Ảnh đại diện</h3>
                    <div class="flex items-center gap-6">
                        <div class="relative">
                            @if (auth()->user()->avatar)
                                <img id="avatarPreview" src="{{ asset('storage/' . auth()->user()->avatar) }}"
                                    alt="Avatar" class="w-24 h-24 rounded-full object-cover border-4 border-gray-200">
                            @else
                                <img id="avatarPreview" src="https://randomuser.me/api/portraits/men/32.jpg"
                                    alt="Avatar" class="w-24 h-24 rounded-full object-cover border-4 border-gray-200">
                            @endif
                            <button type="button" id="removeAvatarBtn"
                                class="absolute -top-2 -right-2 w-8 h-8 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors hidden">
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <label for="avatarInput"
                                    class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition-colors cursor-pointer">
                                    <i class="fas fa-upload mr-2"></i>
                                    Tải ảnh lên
                                </label>
                                <input type="file" id="avatarInput" name="avatar" accept="image/*" class="hidden">
                                <button type="button" id="removeAvatarTextBtn"
                                    class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition-colors">
                                    Xóa ảnh
                                </button>
                            </div>
                            <p class="text-sm text-gray-500">
                                Định dạng: JPG, PNG. Kích thước tối đa: 5MB
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Thông tin cá nhân</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Họ và tên <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <p class="text-xs text-gray-500 mt-1">Email này sẽ được sử dụng để đăng nhập</p>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Số điện thoại
                            </label>
                            <input type="tel" id="phone" name="phone" value="0123456789"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div>
                            <label for="birthDate" class="block text-sm font-medium text-gray-700 mb-2">
                                Ngày sinh
                            </label>
                            <input type="date" id="birthDate" name="birthDate" value="1990-01-15"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">
                                Giới tính
                            </label>
                            <select id="gender" name="gender"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <option value="">Chọn giới tính</option>
                                <option value="male" selected>Nam</option>
                                <option value="female">Nữ</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Địa chỉ</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                Địa chỉ chi tiết
                            </label>
                            <input type="text" id="address" name="address" value="123 Đường ABC, Phường XYZ"
                                placeholder="Số nhà, tên đường, phường/xã"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">
                                Tỉnh/Thành phố
                            </label>
                            <select id="city" name="city"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <option value="">Chọn tỉnh/thành phố</option>
                                <option value="hanoi" selected>Hà Nội</option>
                                <option value="hcm">Hồ Chí Minh</option>
                                <option value="danang">Đà Nẵng</option>
                                <option value="haiphong">Hải Phòng</option>
                                <option value="cantho">Cần Thơ</option>
                            </select>
                        </div>
                        <div>
                            <label for="district" class="block text-sm font-medium text-gray-700 mb-2">
                                Quận/Huyện
                            </label>
                            <select id="district" name="district"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <option value="">Chọn quận/huyện</option>
                                <option value="cau-giay" selected>Cầu Giấy</option>
                                <option value="dong-da">Đống Đa</option>
                                <option value="hai-ba-trung">Hai Bà Trưng</option>
                                <option value="hoan-kiem">Hoàn Kiếm</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Bio Section -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">
                        Giới thiệu bản thân
                    </label>
                    <textarea id="bio" name="bio" rows="4" placeholder="Viết một đoạn giới thiệu ngắn về bản thân..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-primary-500 focus:border-primary-500">Tôi là một Frontend Developer với 3 năm kinh nghiệm trong việc phát triển ứng dụng web sử dụng React, JavaScript và TypeScript.</textarea>
                    <div class="flex justify-between items-center mt-1">
                        <p class="text-xs text-gray-500">Tối đa 500 ký tự</p>
                        <span id="bioCount" class="text-xs text-gray-500">145/500</span>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Other sections will be loaded here via AJAX -->
    <div id="professional-section" class="content-section hidden">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Thông tin nghề nghiệp</h2>
            <p class="text-gray-600">Nội dung sẽ được tải qua AJAX...</p>
        </div>
    </div>

    <div id="skills-section" class="content-section hidden">
        <div class="bg-white rounded-lg border border-gray-200 p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Kỹ năng</h2>
            <p class="text-gray-600">Nội dung sẽ được tải qua AJAX...</p>
        </div>
    </div>

    <!-- Add more sections as needed -->
</div>
