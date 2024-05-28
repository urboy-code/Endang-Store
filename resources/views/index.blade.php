<x-layout>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-3 lg:right-0">
        <div class="flex flex-wrap items-center justify-center md:flex-row text-center lg:text-start">
            <div class="w-full px-4 lg:w-1/2">
                <h1 class="text-lg font-bold text-dark md:text-lg lg:text-2xl">Selamat Datang Di <span
                        class="block text-secondary text-5xl font-extrabold lg:text-5xl">Toko Endang</span></h1>
                <p class="text-base text-dark font-medium leading-relaxed mb-10 md:text-lg lg:text-lg">Mencari Baju?</p>
                <a href="/shop" class="py-3 px-8 bg-secondary rounded-md font-bold">Shop Now!</a>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="mt-10">
                    <img src="{{ asset('assets/images/hero.jpg') }}" alt="hero"
                        class="max-w-full mx-auto object-cover rounded-lg lg:w-4/4">
                </div>
            </div>
        </div>
    </div>

    <div class="pt-36 mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-3 lg:right-0">
        <div class="px-4 mb-10">
            <h2 class="font-bold text-xl lg:text-2xl text-center text-dark uppercase mb-8">About Us
            </h2>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full px-4 mb-10 lg:w-1/2">
                <img src="{{ asset('assets/images/about.png') }}" class="rounded-xl max-w-full mx-auto object-cover"
                    alt="about image">
            </div>
            <div class="w-full px-4 lg:w-1/2 text-justify">
                <h4 class="font-bold text-xl text-secondary mb-8">Toko Pakaian Endang</h4>
                <p class="text-base font-medium text-dark">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Blanditiis officia quis tenetur hic, quos
                    consequuntur unde consectetur, ipsum, cupiditate tempora iste libero totam accusantium voluptate.
                </p>
                <p class="text-base font-medium text-dark">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam
                    obcaecati totam itaque expedita ullam assumenda corporis reiciendis quo, praesentium quaerat.</p>
            </div>
        </div>
    </div>

    <div class="pt-36 pb-16">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-3 lg:right-0">
            <div class="w-full px-4 mb-10">
                <h4 class="font-bold text-2xl lg:text-2xl text-dark mb-2 uppercase text-center">Produk
                    Terbaru</h4>
            </div>
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3 md:gap-4 px-4 w-full">
                @foreach ($posts as $post)
                    {{-- Card --}}

                    <div
                        class="max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg object-cover h-auto" src="{{ asset('assets/images/shirt.jpg') }}"
                                alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $post['title'] }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post['desc'] }}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Rp {{ $post['price'] }}</p>
                            <a href="#"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Cart
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="pt-36 pb-16">
        <div class="mx-auto max-w-7xl py-6 lg:px-8 lg:right-0">
            <div class="flex flex-wrap justify-center">
                <div class="px-4 mx-auto text-center mb-16">
                    <h1 class="font-bold text-2xl text-dark mb-2">Kenapa Belanja Di Toko Kami <span
                            class="font-bold text-secondary">?</span></h1>
                    <p class="font-medium text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Neque, eveniet?</p>
                </div>
            </div>
        </div>
    </div>

</x-layout>
