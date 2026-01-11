<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-2xl mx-auto mb-14">
            <h2 class="text-xl font-semibold text-gray-900">
                Tim Mentor & Penggerak
            </h2>
            <p class="mt-4 text-gray-500">
                Kolaborasi antara visioner dan praktisi industri yang siap membantu mengakselerasi ide Anda menjadi
                nyata.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 justify-items-center gap-4">
            @php
                $team = [
                    [
                        'name' => 'FARID FATHURRAHMAN, S.T., M.E.',
                        'role' => 'Ketua',
                        'img' => 'FARID FATHURRAHMAN, S.T., M.E.png',
                        'socials' => ['linkedin' => 'faridcenari', 'instagram' => 'faridcenari'],
                    ],
                    [
                        'name' => 'DONNY KURNIAWAN, S. KOM',
                        'role' => 'Manager',
                        'img' => 'IMG-20240614-WA0022 (1).png',
                        'socials' => ['linkedin' => 'omdons', 'instagram' => 'omdons'],
                    ],
                    [
                        'name' => 'Dr. SRI HIDAYAH, S.PD., MSc.',
                        'role' => 'Bidang Program',
                        'img' => 'Dr. SRI HIDAYAH, MSc..png',
                        'socials' => ['linkedin' => '#', 'instagram' => '#'],
                    ],
                    [
                        'name' => 'Arafat Alhally, S.Si.,M.M',
                        'role' => 'Bidang Pendanaan',
                        'img' => 'ARAFAT (2).png',
                        'socials' => ['linkedin' => '#', 'instagram' => '#'],
                    ],
                    [
                        'name' => 'Qolbiatul Fitria, S.Sos.',
                        'role' => 'Komersialisasi Produk',
                        'img' => 'QOLBIATUL FITRIA.png',
                        'socials' => ['linkedin' => '#', 'instagram' => '#'],
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
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end justify-center pb-6">
                            <div
                                class="flex gap-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">

                                @if (isset($member['socials']['linkedin']))
                                    <a href="https://id.linkedin.com/in/{{ $member['socials']['linkedin'] }}/en"
                                        target="_blank"
                                        class="p-2.5 bg-white/10 backdrop-blur-md rounded-full text-white hover:bg-blue-600 transition-all shadow-lg"
                                        title="LinkedIn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg>
                                    </a>
                                @endif

                                @if (isset($member['socials']['instagram']))
                                    <a href="https://www.instagram.com/{{ $member['socials']['instagram'] }}/"
                                        target="_blank"
                                        class="p-2.5 bg-white/10 backdrop-blur-md rounded-full text-white hover:bg-pink-600 transition-all shadow-lg"
                                        title="Instagram">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849s-.011 3.584-.069 4.849c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.849-.07c-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849s.012-3.584.07-4.849c.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.358-.2 6.78-2.618 6.98-6.98.058-1.281.072-1.689.072-4.948s-.014-3.667-.072-4.947c-.2-4.358-2.618-6.78-6.98-6.98-1.28-.058-1.689-.072-4.948-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    </a>
                                @endif

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
