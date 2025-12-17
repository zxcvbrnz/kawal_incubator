<div class="bg-white py-16 overflow-hidden" x-data="{
    // Konten asli (base) - Sumber data.
    base: [
        'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?auto=format&fit=crop&w=600&q=80', // 1
        'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=600&q=80', // 2
        'https://images.unsplash.com/photo-1585386959984-a4155224a1ad?auto=format&fit=crop&w=600&q=80', // 3
        'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=600&q=80', // 4
        'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80', // 5
    ],

    displayed: [],
    baseLength: 0,
    offset: 0,

    // Konfigurasi Buffer dan Slide
    VISIBLE_COUNT: 5,
    BUFFER_SIZE: 3,
    ARRAY_SIZE: 11,
    SLIDE_SHIFT: 1,

    // Status Animasi
    steps: 0, // Langkah visual (1 langkah = 1 item)
    sliding: false,
    TRANSITION_DURATION_MS: 700,

    // Nilai Piksel Pergeseran (220px item width + 24px gap = 244px)
    step: 244,

    init() {
        this.baseLength = this.base.length;
        this.loadDisplayed();
        // Mulai di index buffer (3)
        this.steps = this.BUFFER_SIZE;
    },

    loadDisplayed() {
        this.displayed = [];
        // Memuat 11 item: [3 buffer, 5 terlihat, 3 buffer]
        for (let i = 0; i < this.ARRAY_SIZE; i++) {
            let index = (this.offset + i) % this.baseLength;
            this.displayed.push(this.base[index]);
        }
    },

    next() {
        if (this.sliding) return;
        this.sliding = true;
        this.steps += this.SLIDE_SHIFT;
        this.resetWindow('forward');
    },

    prev() {
        if (this.sliding) return;
        this.sliding = true;
        this.steps -= this.SLIDE_SHIFT;
        this.resetWindow('backward');
    },

    resetWindow(direction) {
        // Menggunakan setTimeout untuk menunggu durasi transisi visual (700ms)
        setTimeout(() => {
            const shiftCount = this.SLIDE_SHIFT;

            // 1. --- LOGIKA MANIPULASI ARRAY ---
            this.$nextTick(() => {
                if (direction === 'forward') {
                    // Update offset base
                    this.offset = (this.offset + shiftCount) % this.baseLength;
                    // Tambah 1 item baru di belakang
                    let newIndex = (this.offset + this.ARRAY_SIZE - shiftCount) % this.baseLength;
                    this.displayed.push(this.base[newIndex]);
                    // Hapus 1 item dari depan
                    this.displayed.splice(0, shiftCount);
                } else if (direction === 'backward') {
                    // Update offset base
                    this.offset = (this.offset - shiftCount + this.baseLength) % this.baseLength;
                    // Tambah 1 item baru di depan
                    let newIndex = this.offset % this.baseLength;
                    this.displayed.unshift(this.base[newIndex]);
                    // Hapus 1 item dari belakang
                    this.displayed.splice(this.ARRAY_SIZE, shiftCount);
                }

                // 2. --- RESET VISUAL INSTAN DENGAN requestAnimationFrame ---
                // Ini harus terjadi di frame rendering berikutnya setelah DOM diubah.
                requestAnimationFrame(() => {
                    this.steps = this.BUFFER_SIZE; // RESET langkah visual (Misal: dari 4/2 kembali ke 3)
                    this.sliding = false; // Mematikan Transisi (karena steps berubah ke BUFFER_SIZE)
                });
            });

        }, this.TRANSITION_DURATION_MS);
    }
}" x-init="init()">

    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-900">Built with Pride</h2>
                <a href="#"
                    class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-amber-600 hover:text-amber-700 transition">
                    View More →
                </a>
            </div>
            <p class="mt-4 text-gray-500">
                Discover our featured products designed for quality and performance.
            </p>
        </div>
        <div class="relative flex justify-center">
            <div class="overflow-hidden" style="width: calc((220px * 5) + (24px * 4));">

                <div class="flex gap-6 will-change-transform transition-transform duration-700 ease-out"
                    :style="{
                        // Menggunakan PIXEL untuk TRANSLATE
                        'transform': `translateX(${-(steps * step)}px)`,
                        // Transisi dimatikan (none) hanya saat steps = BUFFER_SIZE (posisi reset)
                        'transition': steps === BUFFER_SIZE ? 'none' : 'transform 700ms ease-out'
                    }">

                    <template x-for="(img, i) in displayed" :key="i">
                        <div
                            class="min-w-[220px] bg-white rounded-xl shadow-sm border border-amber-100 overflow-hidden">
                            <img :src="img" class="h-40 w-full object-cover" />
                        </div>
                    </template>

                </div>
            </div>

        </div>

        <div class="flex justify-center gap-4 mt-8">
            <button @click="prev()"
                class="px-4 py-2 rounded-full border-2 border-amber-500 text-amber-500 disabled:opacity-30 disabled:border-gray-300 disabled:text-gray-300 hover:bg-amber-500 hover:text-white transition-all duration-300 shadow-sm active:scale-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="next()"
                class="px-4 py-2 rounded-full border-2 border-amber-500 text-amber-500 disabled:opacity-30 disabled:border-gray-300 disabled:text-gray-300 hover:bg-amber-500 hover:text-white transition-all duration-300 shadow-sm active:scale-90">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

    </div>
</div>
