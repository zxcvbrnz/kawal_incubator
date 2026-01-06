<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-xl font-semibold text-gray-900 uppercase tracking-wider">
                Tim Mentor & Penggerak
            </h2>
            <p class="mt-4 text-gray-500">
                Kolaborasi antara visioner dan praktisi industri yang siap membantu mengakselerasi ide Anda menjadi
                nyata.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @php
                $team = [
                    [
                        'name' => 'FARID FATHURRAHMAN, S.T., M.E.',
                        'role' => 'Ketua',
                        'img' => 'FARID FATHURRAHMAN, S.T., M.E.png',
                    ],
                    ['name' => 'DONNY KURNIAWAN, S. KOM', 'role' => 'Manager', 'img' => 'DONNY KURNIAWAN, S. KOM.png'],
                    [
                        'name' => 'Dr. SRI HIDAYAH, S.PD., MSc.',
                        'role' => 'Bidang Program',
                        'img' => 'Dr. SRI HIDAYAH, MSc..png',
                    ],
                    ['name' => 'Arafat Alhally, S.Si.,M.M', 'role' => 'Bidang Pendanaan', 'img' => 'ARAFAT.jpeg'],
                    [
                        'name' => 'Qolbiatul Fitria, S.Sos.',
                        'role' => 'Komersialisasi Produk',
                        'img' => 'QOLBIATUL FITRIA.jpg',
                    ],
                ];
            @endphp

            @foreach ($team as $member)
                <div
                    class="group bg-white border border-gray-100 rounded-[1.5rem] lg:rounded-[2rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col h-full">

                    <div class="relative aspect-[4/5] overflow-hidden">
                        <img src="{{ asset('mentor/' . $member['img']) }}" alt="{{ $member['name'] }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-4">
                            <div
                                class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <a href="#"
                                    class="p-2 bg-white/20 backdrop-blur-md rounded-full text-white hover:bg-amber-500 transition-all block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M4.98 3.5a2.5 2.5 0 11-.01 5.01 2.5 2.5 0 01.01-5.01z" />
                                        <path d="M3 9h4v12H3z" />
                                        <path
                                            d="M9 9h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.2c0-1.24-.02-2.83-1.73-2.83-1.73 0-2 1.35-2 2.74V21H9z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 text-center flex-1 flex flex-col justify-center">
                        <h3
                            class="text-[10px] lg:text-[11px] font-black text-gray-900 leading-tight uppercase group-hover:text-amber-600 transition-colors">
                            {{ $member['name'] }}
                        </h3>
                        <p class="text-[8px] lg:text-[9px] font-bold text-gray-400 uppercase tracking-widest mt-2">
                            {{ $member['role'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
