<x-layout>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-3 lg:right-0">
        <div class="flex flex-wrap items-center justify-center md:flex-row text-center lg:text-start">
            <div class="w-full px-4 lg:w-1/2">
                <h1 class="text-3xl font-bold text-secondary mb-1 md:text-lg lg:text-2xl">Selamat Datang
                    @auth
                        <span class="font-bold text-hitamCoklat uppercase">{{ Auth::user()->name }}</span>
                    @endauth Di <span class="block text-hitamCoklat text-3xl font-extrabold lg:text-7xl">Toko
                        Endang</span>
                </h1>
                <p class="text-base text-dark font-medium leading-relaxed mb-10 md:text-lg lg:text-lg">Mencari Baju?</p>
                <a href="/shop" class="py-3 px-8 bg-secondary hover:bg-btn rounded-md font-medium text-hitamCoklat">Shop
                    Now!</a>
            </div>
            <div class="w-full px-4 lg:w-1/2">
                <div class="mt-10">
                    <img src="{{ asset('assets/images/hero.jpg') }}" alt="hero"
                        class="max-w-full mx-auto object-cover rounded-lg lg:w-4/4">
                </div>
            </div>
        </div>
    </div>

    <div class="pt-36 mx-auto max-w-7xl sm:px-6 lg:px-8 my-16 lg:right-0">
        <div class="px-8 mb-16">
            <h2 class="font-bold text-xl lg:text-2xl text-center text-white uppercase mb-8">About Us
            </h2>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full px-8 mb-10 lg:w-1/2">
                <img src="{{ asset('assets/images/about.png') }}" class="rounded-md max-w-full mx-auto object-cover"
                    alt="about image">
            </div>
            <div class="w-full px-8 lg:w-1/2 text-justify">
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

    <div class="pt-36 my-16">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-3 lg:right-0">
            <div class="w-full px-4 mb-10">
                <h4 class="font-bold text-2xl lg:text-2xl text-white mb-12 uppercase text-center">Produk
                    Terbaru</h4>
            </div>
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-4 md:gap-4 px-4 w-full">
                @foreach ($products as $product)
                    <div class="product max-w-sm w-full mx-auto bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg object-cover h-96 w-full"
                                src="{{ asset('storage/' . $product->image) }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                    {{ $product->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700">Rp
                                {{ number_format($product->unit_price, 0, ',', '.') }}
                            </p>
                            <a href="{{ route('shop.show', $product->id) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-btn rounded-lg hover:bg-hover focus:ring-4 focus:outline-none focus:ring-blue-300">
                                Detail
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                            <a href="{{ route('add-to-cart', $product->id) }}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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
                <div class="px-8 mx-auto text-center mb-16">
                    <h1 class="font-bold text-2xl text-white mb-2">Kenapa Belanja Di Toko Kami <span
                            class="font-bold text-yellow-400">?</span></h1>
                    <p class="font-medium text-base text-hitamCoklat">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Neque, eveniet?</p>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-3 w-full px-8 md:grid-cols-3">
                <div
                    class="flex justify-center flex-col text-center items-center bg-white p-10 rounded-3xl hover:backdrop-blur-sm hover:inset-0 bg-opacity-15 hover:shadow-lg">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-orange-500 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg text-white mb-2">Pengiriman Cepat</h4>
                    <p class="text-base font-medium text-hitamCoklat">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Enim ex voluptate provident.</p>
                </div>
                <div
                    class="flex justify-center flex-col text-center items-center bg-white p-10 rounded-3xl hover:backdrop-blur-sm hover:inset-0 bg-opacity-15 hover:shadow-lg">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-orange-500 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg text-white mb-2">Pengiriman Cepat</h4>
                    <p class="text-base font-medium text-hitamCoklat">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Enim ex voluptate provident.</p>
                </div>
                <div
                    class="flex justify-center flex-col text-center items-center bg-white p-10 rounded-3xl hover:backdrop-blur-sm hover:inset-0 bg-opacity-15 hover:shadow-lg">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-orange-500 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-white lg:w-6 lg:h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-lg text-white mb-2">Pengiriman Cepat</h4>
                    <p class="text-base font-medium text-hitamCoklat">Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Enim ex voluptate provident.</p>
                </div>
            </div>
        </div>

    </div>

</x-layout>
