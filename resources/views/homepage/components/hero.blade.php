<section class="relative h-[500px] md:h-[600px] overflow-hidden">
     Background Image with Overlay 
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=1600&h=900&fit=crop" 
             alt="Bãi biển đẹp" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 hero-gradient"></div>
    </div>
    
     Content 
    <div class="relative container mx-auto px-4 h-full flex flex-col items-center justify-center text-center">
        <span class="inline-block bg-orange-500 text-white px-4 py-1 rounded-full text-sm font-medium mb-6">
            Ưu đãi đặc biệt
        </span>
        
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 max-w-4xl leading-tight">
            Tăng trưởng theo cách của bạn
        </h1>
        
        <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl">
            Khám phá những điểm đến tuyệt vời và trải nghiệm du lịch độc đáo
        </p>
        
         Search Box 
        <div class="bg-white rounded-full shadow-2xl p-2 flex flex-col md:flex-row items-center gap-2 w-full max-w-4xl">
            <div class="flex-1 flex items-center px-4 py-3 w-full md:w-auto">
                <i class="fas fa-map-marker-alt text-gray-400 mr-3"></i>
                <input type="text" 
                       placeholder="Bạn muốn đi đâu?" 
                       class="flex-1 outline-none text-gray-700 w-full">
            </div>
            
            <div class="hidden md:block w-px h-12 bg-gray-200"></div>
            
            <div class="flex-1 flex items-center px-4 py-3 w-full md:w-auto">
                <i class="fas fa-calendar-alt text-gray-400 mr-3"></i>
                <input type="text" 
                       placeholder="Chọn ngày" 
                       class="flex-1 outline-none text-gray-700 w-full">
            </div>
            
            <div class="hidden md:block w-px h-12 bg-gray-200"></div>
            
            <div class="flex-1 flex items-center px-4 py-3 w-full md:w-auto">
                <i class="fas fa-users text-gray-400 mr-3"></i>
                <input type="text" 
                       placeholder="Số người" 
                       class="flex-1 outline-none text-gray-700 w-full">
            </div>
            
            <button class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-full font-medium transition flex items-center justify-center gap-2 w-full md:w-auto">
                <i class="fas fa-search"></i>
                <span>Tìm kiếm</span>
            </button>
        </div>
    </div>
</section>
