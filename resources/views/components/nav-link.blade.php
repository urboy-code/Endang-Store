@props(['active' => false])

<a {{ $attributes }}
    class="{{ $active ? 'bg-secondary text-dark' : 'text-dark hover:bg-primary hover:text-dark' }}  rounded-md px-3 py-2 text-sm font-bold transition duration-350 ease-in-out"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
