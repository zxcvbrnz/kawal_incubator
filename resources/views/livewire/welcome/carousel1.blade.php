<div class="bg-white py-16 overflow-hidden" x-data="{
    base: {{ json_encode($products) }},
    displayed: [],
    baseLength: 0,
    offset: 0,
    VISIBLE_COUNT: 5,
    BUFFER_SIZE: 3,
    ARRAY_SIZE: 11,
    SLIDE_SHIFT: 1,
    steps: 0,
    sliding: false,
    TRANSITION_DURATION_MS: 700,
    step: 244,

    init() {
        this.baseLength = this.base.length;
        if (this.baseLength === 0) return;
        this.loadDisplayed();
        this.steps = this.BUFFER_SIZE;
    },

    loadDisplayed() {
        this.displayed = [];
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
        setTimeout(() => {
            const shiftCount = this.SLIDE_SHIFT;
            this.$nextTick(() => {
                if (direction === 'forward') {
                    this.offset = (this.offset + shiftCount) % this.baseLength;
                    let newIndex = (this.offset + this.ARRAY_SIZE - shiftCount) % this.baseLength;
                    this.displayed.push(this.base[newIndex]);
                    this.displayed.splice(0, shiftCount);
                } else {
                    this.offset = (this.offset - shiftCount + this.baseLength) % this.baseLength;
                    let newIndex = this.offset % this.baseLength;
                    this.displayed.unshift(this.base[newIndex]);
                    this.displayed.splice(this.ARRAY_SIZE, shiftCount);
                }
                requestAnimationFrame(() => {
                    this.steps = this.BUFFER_SIZE;
                    this.sliding = false;
                });
            });
        }, this.TRANSITION_DURATION_MS);
    }
}" x-init="init()">

    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-gray-900">Built with Pride</h2>
                <a href="{{ route('product') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-amber-600 hover:text-amber-700 transition">
                    View More →
                </a>
            </div>
            <p class="mt-4 text-gray-500">
                Discover our featured products designed for quality and performance.
            </p>
        </div>
        <div class="relative flex justify-center">
            <div class="overflow-hidden" style="width: calc((220px * 5) + (24px * 4));">
                <div class="flex gap-6 will-change-transform"
                    :style="{
                        'transform': `translateX(${-(steps * step)}px)`,
                        'transition': steps === BUFFER_SIZE ? 'none' : 'transform 700ms ease-out'
                    }">

                    <template x-for="(item, i) in displayed" :key="i">
                        <div
                            class="min-w-[220px] bg-white rounded-2xl shadow-sm border border-amber-100 overflow-hidden flex flex-col">
                            <img :src="item.image" class="h-44 w-full object-cover" :alt="item.image" />
                            <div class="px-4 py-2 flex-1 flex flex-col justify-between">
                                <h3 class="font-semibold text-gray-800 text-sm mb-0.5 truncate" x-text="item.name"></h3>
                                <div class="text-[10px] text-gray-400 uppercase tracking-wider">
                                    Product by: <span class="text-amber-500 font-semibold"
                                        x-text="item.participant"></span>
                                </div>
                            </div>
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
