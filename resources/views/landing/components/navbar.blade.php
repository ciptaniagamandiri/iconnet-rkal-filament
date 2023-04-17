<nav class="bg-brands-primary" x-data="{ menuToggle: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-1 flex items-center justify-between">
                <div class="flex-shrink-0">
                    <img class="block h-8 w-auto" src="/assets/icon-logo.png" alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-brands-secondary">Home</a>
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-brands-secondary">Produk & Promo</a>
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-brands-secondary">Cakupan Area</a>
                        <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-brands-secondary">Hubungi kami</a>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex sm:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="menuToggle = !menuToggle " class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-brands-secondary hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="menuToggle">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Home</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Produk & Promo</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Cakupan Area</a>
            <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Hubungi kami</a>
        </div>
    </div>
</nav>