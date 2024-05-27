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
            <h2 class="font-bold text-xl lg:text-2xl text-dark uppercase underline decoration-secondary mb-2">About Us</h2>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full px-4 mb-10 lg:w-1/2">
                <img src="{{ asset('assets/images/about.png') }}" class="rounded-xl max-w-full mx-auto object-cover" alt="about image">
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
            <div class="w-full px-4">
                <h4 class="font-bold text-xl lg:text-2xl text-dark mb-2 uppercase underline decoration-secondary">Produk Terbaru</h4>
            </div>
        </div>
    </div>

</x-layout>
