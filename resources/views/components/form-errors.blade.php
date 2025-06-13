@props(['type' => 'client', 'errors'])

<div {{ $attributes->merge(['class' => 'mt-6']) }}>
    <div class="bg-red-50 border-l-4 border-red-500 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-circle text-red-500"></i>
            </div>
            <div class="ml-3">
                @if ($type === 'server')
                    <h3 class="text-sm font-medium text-red-800">
                        Đã xảy ra lỗi khi đăng nhập
                    </h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul id="error-list" class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <h3 class="text-sm font-medium text-red-800">
                        <!-- Error message -->
                    </h3>
                @endif
            </div>
        </div>
    </div>
</div>
