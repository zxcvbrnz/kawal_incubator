<footer class="bg-gray-900 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">

            <div class="md:col-span-6 lg:col-span-5">
                <a href="/" class="inline-block mb-6 transition transform hover:opacity-90">
                    <img src="{{ asset('logo kawal.png') }}" alt="Logo"
                        class="h-28 w-auto grayscale hover:grayscale-0 transition duration-500">
                </a>
                <div class="space-y-4">
                    <p class="text-gray-400 text-sm leading-relaxed">
                        <span class="font-semibold text-gray-200">Kawal Incubator: </span>Ruang tumbuh bagi inovasi dan
                        pelaku industri kreatif. kami hadir untuk mengawal ide hebat Anda bertransformasi menjadi karya
                        dan bisnis yang berkelanjutan melalui ekosistem yang terintegrasi.
                    </p>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Jalan Cendana 1 No. 38 rt. 010, Kelurahan Sei Miai, Banjarmasin Utara, Kota Banjarmasin, Kalsel
                        70123
                    </p>
                    <div class="pt-2 space-y-2 text-sm">
                        <p class="text-gray-400">
                            Email: <a href="mailto:inkubator@kalselkreatif.or.id"
                                class="text-gray-300 hover:text-amber-400 transition underline decoration-gray-700">inkubator@kalselkreatif.or.id</a>
                        </p>
                        <p class="text-gray-400">
                            Instagram: <a href="https://www.instagram.com/kawalincubator" target="_blank"
                                class="text-gray-300 hover:text-amber-400 transition underline decoration-gray-700">@kawalincubator</a>
                        </p>
                        {{-- Tambahan Kontak WhatsApp --}}
                        <p class="text-gray-400">
                            WhatsApp: <a href="https://wa.me/6282158221148" target="_blank"
                                class="text-gray-300 hover:text-amber-400 transition underline decoration-gray-700">+62
                                821 5822 1148</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="hidden lg:block lg:col-span-1"></div>

            <div class="md:col-span-6 lg:col-span-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-8">

                    <div>
                        <h3 class="text-xs font-bold text-white uppercase tracking-[0.2em] mb-5">Layanan</h3>
                        <ul class="space-y-3 text-sm font-medium">
                            <li><a href="{{ route('product') }}"
                                    class="text-gray-400 hover:text-amber-400 transition">Produk</a></li>
                            <li><a href="{{ route('program') }}"
                                    class="text-gray-400 hover:text-amber-400 transition">Program</a></li>
                            <li><a href="{{ route('event') }}"
                                    class="text-gray-400 hover:text-amber-400 transition">Event</a></li>
                            <li><a href="{{ route('join_sponsor') }}"
                                    class="text-gray-400 hover:text-amber-400 transition">Sponsorship</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-white uppercase tracking-[0.2em] mb-5">Katalog</h3>
                        <ul class="space-y-3 text-sm font-medium">
                            <li><a href="{{ route('participant') }}"
                                    class="text-gray-400 hover:text-amber-400 transition">Partisipan</a></li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xs font-bold text-white uppercase tracking-[0.2em] mb-5">Informasi</h3>
                        <ul class="space-y-3 text-sm font-medium">
                            <li><a href="{{ route('new') }}"
                                    class="text-gray-400 hover:text-amber-400 transition">Berita</a></li>
                            <li><a href="{{ route('new') }}"
                                    class="text-gray-400 hover:text-amber-400 transition">Dokumentasi</a></li>
                            <li><a href="" class="text-gray-400 hover:text-amber-400 transition">FAQ</a></li>
                            <li><a href="" class="text-gray-400 hover:text-amber-400 transition">Kebijakan dan
                                    Privasi</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div
            class="mt-16 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>© {{ now()->year }} Kawal Incubator. Seluruh Hak Cipta Dilindungi.</p>
            <p class="mt-2 md:mt-0">Dikelola oleh <span class="text-gray-400">Kalsel Kreatif</span></p>
        </div>
    </div>
</footer>
