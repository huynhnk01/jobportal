<!-- Profile Information -->
<div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-900">Thông Tin Cá Nhân</h2>
        <button
            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
            <i class="fas fa-edit mr-2"></i> Chỉnh sửa
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
            <p class="text-gray-900">{{ $user->name }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <p class="text-gray-900">{{ $user->email }}</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
            <p class="text-gray-900">0912 345 678</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Ngày sinh</label>
            <p class="text-gray-900">15/05/1990</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
            <p class="text-gray-900">123 Đường Nguyễn Văn Linh, Quận 7, TP. Hồ Chí Minh</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Giới tính</label>
            <p class="text-gray-900">Nam</p>
        </div>
    </div>
</div>

<!-- Professional Information -->
<div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-900">Thông Tin Nghề Nghiệp</h2>
        <button
            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
            <i class="fas fa-edit mr-2"></i> Chỉnh sửa
        </button>
    </div>

    <div class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Vị trí hiện tại</label>
            <p class="text-gray-900">Frontend Developer</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kinh nghiệm</label>
            <p class="text-gray-900">3 năm</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kỹ năng</label>
            <div class="flex flex-wrap gap-2">
                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-md">HTML/CSS</span>
                <span
                    class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-md">JavaScript</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-md">React</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-md">Vue.js</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-md">Tailwind
                    CSS</span>
                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-sm rounded-md">Git</span>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Mức lương mong muốn</label>
            <p class="text-gray-900">25 - 35 triệu VND</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Giới thiệu bản thân</label>
            <p class="text-gray-900">
                Frontend Developer với 3 năm kinh nghiệm phát triển giao diện người dùng cho các ứng
                dụng web.
                Có kinh nghiệm làm việc với React, Vue.js và các framework CSS hiện đại.
                Đam mê tạo ra trải nghiệm người dùng tuyệt vời và giao diện đẹp mắt.
            </p>
        </div>
    </div>
</div>

<!-- Education -->
<div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-900">Học Vấn</h2>
        <button
            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
            <i class="fas fa-plus mr-2"></i> Thêm mới
        </button>
    </div>

    <div class="space-y-6">
        <div class="border-l-4 border-primary-600 pl-4 py-1">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Đại học Bách Khoa Hà Nội</h3>
                <div class="flex items-center gap-2">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-gray-500 hover:text-red-600">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <p class="text-gray-600">Kỹ sư Công nghệ thông tin</p>
            <p class="text-gray-500 text-sm">2012 - 2016</p>
        </div>

        <div class="border-l-4 border-primary-600 pl-4 py-1">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Udemy</h3>
                <div class="flex items-center gap-2">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-gray-500 hover:text-red-600">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <p class="text-gray-600">Advanced React and Redux</p>
            <p class="text-gray-500 text-sm">2018</p>
        </div>
    </div>
</div>

<!-- Work Experience -->
<div class="bg-white rounded-lg border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-900">Kinh Nghiệm Làm Việc</h2>
        <button
            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition-colors">
            <i class="fas fa-plus mr-2"></i> Thêm mới
        </button>
    </div>

    <div class="space-y-6">
        <div class="border-l-4 border-primary-600 pl-4 py-1">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">FPT Software</h3>
                <div class="flex items-center gap-2">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-gray-500 hover:text-red-600">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <p class="text-gray-600">Frontend Developer</p>
            <p class="text-gray-500 text-sm">2020 - Hiện tại</p>
            <p class="text-gray-700 mt-2">
                Phát triển và duy trì các ứng dụng web sử dụng React và Vue.js.
                Làm việc trong môi trường Agile với các dự án quốc tế.
            </p>
        </div>

        <div class="border-l-4 border-primary-600 pl-4 py-1">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold text-gray-900">Công ty ABC</h3>
                <div class="flex items-center gap-2">
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-gray-500 hover:text-red-600">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <p class="text-gray-600">Web Developer</p>
            <p class="text-gray-500 text-sm">2017 - 2020</p>
            <p class="text-gray-700 mt-2">
                Phát triển website cho khách hàng sử dụng HTML, CSS, JavaScript và PHP.
                Tối ưu hóa hiệu suất và trải nghiệm người dùng.
            </p>
        </div>
    </div>
</div>
