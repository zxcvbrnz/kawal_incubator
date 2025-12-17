<footer class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- Logo -->
            <div>
                <a href="/" class="flex items-center space-x-3">
                    <img src="{{ asset('20251215_160638.png') }}" alt="Logo" class="h-20 w-auto">
                </a>
                <p class="mt-4 text-gray-400 text-sm leading-relaxed">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit, dicta.
                </p>
            </div>

            <!-- Routes -->
            <div>
                <h3 class="text-sm font-semibold text-gray-200 uppercase tracking-wider mb-4">
                    Menu
                </h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="{{ route('product') }}" class="text-gray-400 hover:text-amber-400 transition">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('program') }}" class="text-gray-400 hover:text-amber-400 transition">
                            Programs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('event') }}" class="text-gray-400 hover:text-amber-400 transition">
                            Events
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('new') }}" class="text-gray-400 hover:text-amber-400 transition">
                            News
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-gray-400 hover:text-amber-400 transition">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-400 hover:text-amber-400 transition">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="text-sm font-semibold text-gray-200 uppercase tracking-wider mb-4">
                    Follow Us
                </h3>
                <div class="flex space-x-4">
                    <!-- Instagram -->
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160ZM176,24H80A56.06,56.06,0,0,0,24,80v96a56.06,56.06,0,0,0,56,56h96a56.06,56.06,0,0,0,56-56V80A56.06,56.06,0,0,0,176,24Zm40,152a40,40,0,0,1-40,40H80a40,40,0,0,1-40-40V80A40,40,0,0,1,80,40h96a40,40,0,0,1,40,40ZM192,76a12,12,0,1,1-12-12A12,12,0,0,1,192,76Z">
                            </path>
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11.5 9.95v-7.04H8v-2.91h2.5V9.8c0-2.47 1.47-3.84 3.72-3.84 1.08 0 2.21.19 2.21.19v2.43h-1.25c-1.23 0-1.61.76-1.61 1.54v1.85H16.8l-.4 2.91h-2.23v7.04A10 10 0 0022 12z" />
                        </svg>
                    </a>

                    <!-- YouTube -->
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M234.33,69.52a24,24,0,0,0-14.49-16.4C185.56,39.88,131,40,128,40s-57.56-.12-91.84,13.12a24,24,0,0,0-14.49,16.4C19.08,79.5,16,97.74,16,128s3.08,48.5,5.67,58.48a24,24,0,0,0,14.49,16.41C69,215.56,120.4,216,127.34,216h1.32c6.94,0,58.37-.44,91.18-13.11a24,24,0,0,0,14.49-16.41c2.59-10,5.67-28.22,5.67-58.48S236.92,79.5,234.33,69.52Zm-73.74,65-40,28A8,8,0,0,1,108,156V100a8,8,0,0,1,12.59-6.55l40,28a8,8,0,0,1,0,13.1Z">
                            </path>
                        </svg>
                    </a>

                    <!-- WhatsApp -->
                    <a href="#" class="text-gray-400 hover:text-amber-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2C6.477 2 2 6.306 2 11.615c0 2.106.742 4.168 2.01 5.82L2 22l4.726-1.506A10.49 10.49 0 0012 21c5.523 0 10-4.306 10-9.615C22 6.306 17.523 2 12 2zm0 17.385c-1.78 0-3.523-.47-5.05-1.36l-.363-.211-2.807.894.94-2.63-.236-.38C3.286 14.34 2.75 12.99 2.75 11.615c0-4.93 4.13-8.94 9.25-8.94s9.25 4.01 9.25 8.94-4.13 8.94-9.25 8.94zm5.16-5.03c-.283-.141-1.673-.825-1.932-.919-.26-.094-.45-.141-.637.141-.189.282-.734.919-.9 1.107-.166.188-.331.212-.614.071-.283-.141-1.195-.44-2.277-1.404-.841-.75-1.409-1.675-1.575-1.957-.166-.282-.018-.435.125-.575.127-.126.283-.329.424-.494.141-.165.189-.282.283-.47.094-.188.047-.353-.023-.494-.071-.141-.637-1.528-.873-2.093-.23-.552-.463-.477-.637-.486l-.54-.01c-.189 0-.495.071-.754.353-.26.282-.99.965-.99 2.352 0 1.387 1.014 2.728 1.155 2.916.141.188 1.996 3.047 4.837 4.272.676.291 1.203.465 1.613.595.678.212 1.296.182 1.783.111.544-.081 1.673-.683 1.909-1.34.236-.658.236-1.223.165-1.34-.071-.117-.259-.188-.542-.329z" />
                        </svg>
                    </a>

                </div>
            </div>

        </div>

        <!-- Bottom -->
        <div class="mt-8 border-t border-gray-800 pt-6 text-center text-sm text-gray-500">
            © {{ now()->year }} Kawal Incubator. All rights reserved.
        </div>
    </div>
</footer>
