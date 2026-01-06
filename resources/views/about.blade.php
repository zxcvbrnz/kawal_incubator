<x-main-layout>
    <x-slot name="title">
        Tentang Kami
    </x-slot>
    <div class="min-h-screen py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="gap-6 mb-12">
                <div class="space-y-1 mt-2">
                    <h1 class="text-4xl font-bold text-gray-900 tracking-tight uppercase">
                        Tentang Kami
                    </h1>
                    <p class="text-gray-500">
                        Berdedikasi untuk memberdayakan talenta lokal melalui inovasi, kolaborasi, dan pertumbuhan yang
                        berkelanjutan.
                    </p>
                </div>
                <div class="mt-4 h-1 w-24 bg-amber-500 rounded-full"></div>
            </div>
            <section id="content">
                {{-- <livewire:event.content /> --}}
            </section>
            <div class="min-h-screen">
                <div class="relative pb-20 overflow-hidden">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row items-center gap-12">
                            <div class="flex-1 space-y-6" data-aos="fade-right">
                                <div class="space-y-1">
                                    <h1 class="text-3xl font-black text-gray-900 tracking-tight uppercase leading-none">
                                        Kawal <span class="text-amber-500">Incubator</span>
                                    </h1>
                                    <p class="text-gray-400 font-medium tracking-widest uppercase text-sm italic">
                                        Membangun Masa Depan, Bersama.
                                    </p>
                                </div>
                                <p class="text-gray-600 text-lg leading-relaxed max-w-xl">
                                    Berdedikasi untuk memberdayakan talenta lokal melalui inovasi, kolaborasi, dan
                                    pertumbuhan yang berkelanjutan. Kami percaya bahwa setiap ide hebat layak
                                    mendapatkan ekosistem yang tepat untuk berkembang.
                                </p>
                            </div>
                            <div class="flex-1 relative" data-aos="fade-left">
                                <div
                                    class="aspect-video rounded-3xl overflow-hidden shadow-2xl shadow-amber-100 border-8 border-white relative z-10">
                                    <img src="{{ asset('IMG_3830.JPG') }}" class="w-full h-full object-cover"
                                        alt="Tim Kami">
                                </div>
                                <div
                                    class="absolute -bottom-6 -right-6 w-64 h-64 bg-amber-100 rounded-full -z-0 opacity-50 blur-3xl">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 py-24">
                    <div class="max-w-7xl mx-auto px-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                            <div class="space-y-4" data-aos="fade-up">
                                <div
                                    class="inline-block px-4 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold uppercase tracking-widest">
                                    Misi Kami
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">Memberdayakan generasi kreator berikutnya.
                                </h2>
                                <p class="text-gray-600 leading-relaxed">
                                    Misi kami adalah menyediakan akses ke sumber daya, mentoring, dan jaringan yang
                                    diperlukan bagi individu berbakat untuk mengubah visi mereka menjadi realitas yang
                                    berdampak bagi masyarakat.
                                </p>
                            </div>
                            <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
                                <div
                                    class="inline-block px-4 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold uppercase tracking-widest">
                                    Visi Kami
                                </div>
                                <h2 class="text-3xl font-bold text-gray-900">Menjadi tolok ukur global untuk keunggulan.
                                </h2>
                                <p class="text-gray-600 leading-relaxed">
                                    Visi kami adalah menjadi pusat inovasi terdepan yang tidak hanya menghasilkan produk
                                    berkualitas, tetapi juga melahirkan pemimpin industri yang berintegritas dan berjiwa
                                    sosial.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-24">
                    <div class="max-w-7xl mx-auto px-6 text-center mb-16">
                        <h2 class="text-4xl font-black text-gray-900 uppercase">Nilai <span class="text-amber-500">Inti
                                Kami</span></h2>
                    </div>

                    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="p-8 rounded-3xl border border-gray-100 hover:border-amber-200 hover:bg-amber-50/30 transition-all duration-500 group"
                            data-aos="zoom-in">
                            <div
                                class="w-14 h-14 bg-amber-500 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:rotate-12 transition-transform shadow-lg shadow-amber-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M208,104a79.86,79.86,0,0,1-30.59,62.92A24.29,24.29,0,0,0,168,186v6a8,8,0,0,1-8,8H96a8,8,0,0,1-8-8v-6a24.11,24.11,0,0,0-9.3-19A79.87,79.87,0,0,1,48,104.45C47.76,61.09,82.72,25,126.07,24A80,80,0,0,1,208,104Z"
                                        opacity="0.2"></path>
                                    <path
                                        d="M176,232a8,8,0,0,1-8,8H88a8,8,0,0,1,0-16h80A8,8,0,0,1,176,232Zm40-128a87.55,87.55,0,0,1-33.64,69.21A16.24,16.24,0,0,0,176,186v6a16,16,0,0,1-16,16H96a16,16,0,0,1-16-16v-6a16,16,0,0,0-6.23-12.66A87.59,87.59,0,0,1,40,104.49C39.74,56.83,78.26,17.14,125.88,16A88,88,0,0,1,216,104Zm-16,0a72,72,0,0,0-73.74-72c-39,.92-70.47,33.39-70.26,72.39a71.65,71.65,0,0,0,27.64,56.3A32,32,0,0,1,96,186v6h64v-6a32.15,32.15,0,0,1,12.47-25.35A71.65,71.65,0,0,0,200,104Zm-16.11-9.34a57.6,57.6,0,0,0-46.56-46.55,8,8,0,0,0-2.66,15.78c16.57,2.79,30.63,16.85,33.44,33.45A8,8,0,0,0,176,104a9,9,0,0,0,1.35-.11A8,8,0,0,0,183.89,94.66Z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Inovasi</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Kami terus mencari cara baru yang lebih
                                efisien untuk memecahkan masalah kompleks di era digital.</p>
                        </div>

                        <div class="p-8 rounded-3xl border border-gray-100 hover:border-amber-200 hover:bg-amber-50/30 transition-all duration-500 group"
                            data-aos="zoom-in" data-aos-delay="100">
                            <div
                                class="w-14 h-14 bg-amber-500 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:rotate-12 transition-transform shadow-lg shadow-amber-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path d="M136,108A52,52,0,1,1,84,56,52,52,0,0,1,136,108Z" opacity="0.2"></path>
                                    <path
                                        d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Komunitas</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Kolaborasi adalah kunci. Kami percaya bahwa
                                kebersamaan menciptakan dampak yang lebih besar.</p>
                        </div>

                        <div class="p-8 rounded-3xl border border-gray-100 hover:border-amber-200 hover:bg-amber-50/30 transition-all duration-500 group"
                            data-aos="zoom-in" data-aos-delay="200">
                            <div
                                class="w-14 h-14 bg-amber-500 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:rotate-12 transition-transform shadow-lg shadow-amber-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    fill="currentColor" viewBox="0 0 256 256">
                                    <path
                                        d="M216,56v56c0,96-88,120-88,120S40,208,40,112V56a8,8,0,0,1,8-8H208A8,8,0,0,1,216,56Z"
                                        opacity="0.2"></path>
                                    <path
                                        d="M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm0,72c0,37.07-13.66,67.16-40.6,89.42A129.3,129.3,0,0,1,128,223.62a128.25,128.25,0,0,1-38.92-21.81C61.82,179.51,48,149.3,48,112l0-56,160,0ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Integritas</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Kejujuran dan etika kerja yang tinggi
                                adalah fondasi dari setiap keputusan yang kami ambil.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
