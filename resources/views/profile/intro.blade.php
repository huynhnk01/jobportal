<x-app-layout>
    <div class="max-w-2xl mx-auto py-8 px-4">
        <h2 class="text-2xl font-semibold mb-6">Giới thiệu bản thân</h2>

        <form method="POST" action="{{ url('/profile/intro/generate') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Họ tên</label>
                <input type="text" name="name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('name') }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Vị trí công việc</label>
                <input type="text" name="job" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('job') }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Số năm kinh nghiệm</label>
                <input type="text" name="experience" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('experience') }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Điểm mạnh</label>
                <input type="text" name="strengths" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('strengths') }}">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Giới thiệu bản thân (nếu đã có)</label>
                <textarea name="content"
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    rows="5">{{ old('content') }}</textarea>
            </div>

            <div class="flex gap-4">
                <button type="submit" name="type" value="new"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition">
                    🪄 Tạo mới bằng AI
                </button>
                <button type="submit" name="type" value="improve"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition">
                    🛠 Cải thiện bằng AI
                </button>
            </div>
        </form>

        @if (session('ai_intro'))
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-md p-4">
                <h5 class="font-semibold text-blue-700 mb-2">🎉 Kết quả từ AI:</h5>
                <p class="text-gray-800">{{ session('ai_intro') }}</p>
            </div>
        @endif
    </div>
</x-app-layout>
