<x-dashboard.layout>
    <div class="px-8 w-full pt-14 text-center uppercase">
        <h1 class="font-bold text-2xl text-dark lg:text-4xl">Produk Yang Telah Di Hapus</h1>
    </div>
    <div class=" overflow-x-auto py-10 mb-4">
        <table class="w-full text-sm text-left rtl:text-right text-primary rounded-xl">
            <thead class="text-xs uppercase bg-gray-950  ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3 w-9">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="bg-white border-b">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <img src="{{ asset('storage/' . $product->image) }}" class="h-20 w-20 object-cover"
                                alt="">
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $product->description }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $product->category->name }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $product->price }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex">
                            <a href="{{ route('product.restore', $product->id) }}"
                                class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 shadow-lg shadow-cyan-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Restore</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 shadow-lg shadow-red-500/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('product.index') }}"
        class="ml-8 px-5 lg:ml-0 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 shadow-lg shadow-green-500/50 font-bold rounded-lg text-sm py-2.5 text-center me-2 mb-2">Kembali</a>
    <a href="{{ route('product.trash') }}"
        class="ml-8 lg:ml-0 text-dark font-bold bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 shadow-lg shadow-lime-500/50 rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Sampah</a>

</x-dashboard.layout>r
