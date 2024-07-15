<x-dashboard.layout>
    <section class="dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-secondary dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-hover dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2">Id</th>
                                <th scope="col" class="px-4 py-3">User Id</th>
                                <th scope="col" class="px-4 py-3">User Name</th>
                                <th scope="col" class="px-4 py-3">Total Harga</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Created At</th>
                                <th scope="col" class="">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-hitamCoklat">
                            @foreach ($transactions as $transaction)
                                <tr class="border-b dark:border-gray-700">
                                    <th class="px-2">{{ $transaction->id }}</th>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-hitamCoklat whitespace-nowrap dark:text-white">
                                        {{ $transaction->user_id }}
                                    </th>
                                    <td class="px-4 py-3">{{ $transaction->user->name }}</td>
                                    <td class="px-4 py-3">{{ $transaction->totalAmount }}</td>
                                    <td class="px-4 py-3">{{ $transaction->status }}</td>
                                    <td class="px-4 py-3">{{ $transaction->created_at }}</td>
                                    <td class="font-medium text-hitamCoklat whitespace-nowrap flex">
                                        <form action="{{ route('orders.destroy', $transaction->id) }}" method="POST">
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
            </div>
        </div>
    </section>
</x-dashboard.layout>
