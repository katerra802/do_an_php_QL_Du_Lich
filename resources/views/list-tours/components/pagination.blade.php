@props(['currentPage' => 1, 'totalPages' => 48])

<div class="flex flex-col items-center gap-4 py-8">
    <div class="flex items-center gap-2">
         Previous Button 
        <button class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition {{ $currentPage == 1 ? 'text-gray-300 cursor-not-allowed' : 'text-gray-700' }}" 
                {{ $currentPage == 1 ? 'disabled' : '' }}>
            <i class="fas fa-chevron-left"></i>
        </button>

         Page Numbers 
        @for($i = 1; $i <= min(5, $totalPages); $i++)
            <button class="w-10 h-10 flex items-center justify-center rounded-full font-semibold transition
                {{ $i == $currentPage ? 'bg-orange-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                {{ $i }}
            </button>
        @endfor

        @if($totalPages > 5)
            <span class="text-gray-500 px-2">...</span>
            <button class="w-10 h-10 flex items-center justify-center rounded-full text-gray-700 hover:bg-gray-100 transition font-semibold">
                {{ $totalPages }}
            </button>
        @endif

         Next Button 
        <button class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition {{ $currentPage == $totalPages ? 'text-gray-300 cursor-not-allowed' : 'text-gray-700' }}"
                {{ $currentPage == $totalPages ? 'disabled' : '' }}>
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

     Results Info 
    <p class="text-sm text-gray-600">
        Hiển thị {{ ($currentPage - 1) * 10 + 1 }}-{{ min($currentPage * 10, $totalPages * 10) }} trong {{ $totalPages * 10 }} kết quả
    </p>
</div>
