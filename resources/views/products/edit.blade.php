<x-dashboard.layout>
    <div class="pt-5 ml-8 mb-4">
        <a href="{{ route('product.index') }}"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Back</a>
    </div>

    @if ($errors->any())

        @foreach ($errors->all() as $error)
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 mx-8"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="font-medium">
                    {{ $error }}
                </div>
            </div>
        @endforeach

    @endif


    <form class="max-w-xl mx-auto py-10 px-8" method="POST" enctype="multipart/form-data"
        action="{{ route('product.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label class="block mb-2 text-sm font-bold text-dark" for="file_input">Edit
                Gambar Produk</label>
            <div class="mb-2">
                <img src="{{ asset('storage/' . $product->image) }}" class="h-30 w-30 object-cover" alt="">
            </div>
            <input
                class="block w-full text-sm text-dark border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                id="file_input" type="file" name="image">

        </div>
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-bold text-dark">Edit Nama
                Produk</label>
            <input type="text" id="name" name="name"
                class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                value="{{ $product->name }}" />
        </div>
        <div class="mb-5">
            <label for="price" class="block mb-2 text-sm font-bold text-dark">Edit Harga
                Produk</label>
            <input type="text" id="price" name="unit_price" value="{{ $product->unit_price }}"
                class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
        </div>
        <div class="mb-5">
            <label for="countries" class="block mb-2 text-sm font-bold text-dark">Edit Kategori
                Produk</label>
            <select id="countries" name="category_id"
                class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Pilih Kategori Produk</option>
                @foreach ($categories as $category)
                    <option {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{ $category->id }}"
                        option>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">

            <label for="description" class="block mb-2 text-sm font-bold text-dark">Deskripsi
                Produk</label>
            <textarea id="description" rows="4" name="description"
                class="block p-2.5 w-full text-sm text-dark bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="gambarkan secara singkat tentang produknya disini...">{{$product->description}}</textarea>

        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>

</x-dashboard.layout>
