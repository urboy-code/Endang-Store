<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile/Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <div class="flex items-center">
                        <a href="{{ route('address.create') }}"
                            class="text-white font-medium text-md bg-btn rounded-md flex items-center justify-center py-3 px-8"><svg
                                class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Tambahkan Alamat
                        </a>
                    </div>

                    <div class="flex flex-wrap pt-16 justify-center">
                        @foreach ($addresses as $address)
                            @component('components.profile.address', ['address' => $address])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
