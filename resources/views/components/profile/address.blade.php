<div
    class="block m-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 {{ $address->is_selected ? 'border-sky-700' : '' }}">

    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
        {{ Auth::user()->name }} | <span>{{ $address->phone }}</span></h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $address->address }}
    </p>
    <p class="font-normal text-gray-700 dark:text-gray-400">{{ $address->province }} | <span>{{$address->postal_code}}</span>
    </p>
    <div class="flex justify-center items-center gap-4 mt-4">

        <form action="{{ route('address.select', ['id' => $address->id]) }}" method="POST">
            @csrf
            <button type="submit" class="py-2 px-3 rounded-lg bg-btn">
                select
            </button>
        </form>
        <form action="{{ route('address.destroy', ['id' => $address->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="py-2 px-3 rounded-lg bg-red-500">
                Delete
            </button>
        </form>
    </div>

</div>
