<x-layout>
    <x-main.hero>
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight lg:leading-tight text-white md:text-5xl lg:text-6xl">
            Belanja Hanya disini <span class="block"> Endang Store !!!</span></h1>
        <p class="mb-8 text-sm px-16 font-base text-secondary lg:text-xl lg:px-48">Banyak pilihan, kualitas
            tinggi, dan harga terjangkau 🥰
        </p>
    </x-main.hero>

    {{-- SHOP PAGE --}}

    @if ($message = Session::get('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: $message,
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    <div class="pt-2 mb-16">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-3 lg:right-0">
            <div class="flex justify-center  items-center flex-col lg:flex-row lg:justify-start">
                <label for="category-select" class="text-dark font-medium flex text-center justify-center">Pilih
                    Kategori</label>
                <select id="category-select" class="flex justify-center items-center mx-8 w-max-sm rounded-lg">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="product-list"
                class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4 md:gap-10 px-4 w-full pt-10">
                @foreach ($categories as $category)
                    @foreach ($category->products as $product)
                        {{-- Card --}}
                        <div data-category="{{ $category->id }}"
                            class="product max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <img class="rounded-t-lg object-cover h-auto"
                                    src="{{ asset('storage/' . $product->image) }}" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $product->name }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700">{{ $product->description }}
                                </p>
                                <p class="mb-3 font-normal text-gray-700">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}
                                </p>
                                <a href="{{ route('add-to-cart', $product->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Cart
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                                <a href="{{ route('shop.show', $product->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-btn rounded-lg hover:bg-hover focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    Detail
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>


</x-layout>
