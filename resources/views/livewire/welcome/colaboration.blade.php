<div class="bg-white py-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-xl font-semibold text-gray-900">
                Jejaring Strategis Kami
            </h2>
            <p class="mt-4 text-gray-500">
                Membangun sinergi dengan berbagai institusi terpercaya untuk menciptakan ekosistem kewirausahaan yang
                kokoh dan berkelanjutan.
            </p>
        </div>

        <div
            class="flex overflow-hidden space-x-12 bg-white [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">

            <div class="flex flex-none animate-infinite-scroll items-center gap-12 py-4">
                @php
                    $logos = [
                        'Coat_of_arms_of_South_Kalimantan.svg.png',
                        'Jelonesia showcase.png',
                        'kkf.png',
                        'Logo BSH.png',
                        'LOGO KOTA BANJARMASIN - 328 KB.jpg',
                        'IMG_20260106_134224.png',
                        'logo_big.png',
                        'logo_cenari.png',
                        'logo_srbjm.jpeg',
                        'logo_tk.jpeg',
                        'IMG_20260106_134751.png',
                    ];
                @endphp

                @foreach ($logos as $logo)
                    <div class="flex-none w-32 h-28 flex items-center justify-center">
                        <img src="{{ asset('jejaring/' . $logo) }}" class="max-h-full max-w-full object-contain" />
                    </div>
                @endforeach
            </div>

            <div class="flex flex-none animate-infinite-scroll items-center gap-12 py-4" aria-hidden="true">
                @foreach ($logos as $logo)
                    <div class="flex-none w-32 h-28 flex items-center justify-center">
                        <img src="{{ asset('jejaring/' . $logo) }}" class="max-h-full max-w-full object-contain" />
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
