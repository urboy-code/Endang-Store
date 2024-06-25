<!DOCTYPE html>
<html lang="en" class="h-full bg-bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Halaman Utama</title>
</head>

<body class="h-full">
    @include('sweetalert::alert')


    <div class="min-h-full">
        <x-navbar></x-navbar>
        <main class="">
            {{ $slot }}
        </main>
        <x-footer></x-footer>
    </div>

    <script>
        $(document).ready(function() {
            $('#category-select').on('change', function() {
                var selectCategory = $(this).val();
                if (selectCategory) {
                    $('#product-list .product').hide();
                    $('#product-list .product[data-category="' + selectCategory + '"]').show();
                } else {
                    $('#product-list .product').show();
                }
            })
        })
    </script>
    <script>
        @if (session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('status') }}',
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        @endif
    </script>
</body>

</html>
