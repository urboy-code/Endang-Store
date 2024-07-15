<x-dashboard.layout>
    <section class="dark:bg-gray-900 p-3 sm:p-5">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-secondary dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-hitamCoklat dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-hover dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-2">Id</th>
                                <th scope="col" class="px-4 py-3">User name</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Kota</th>
                                <th scope="col" class="px-4 py-3">Alamat</th>
                                <th scope="col" class="px-4 py-3">Kode Pos</th>
                                <th scope="col" class="px-4 py-3">No HP</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b dark:border-gray-700">
                                    <th class="px-2">{{ $user->id }}</th>
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $user->name }}
                                    </th>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    @if ($user->selectedAddress)
                                        <td class="px-4 py-3">{{ $user->selectedAddress->city }}</td>
                                        <td class="px-4 py-3">{{ $user->selectedAddress->address }}</td>
                                        <td class="px-4 py-3">{{ $user->selectedAddress->postal_code }}</td>
                                        <td class="px-4 py-3">{{ $user->selectedAddress->phone }}</td>
                                    @endif
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
