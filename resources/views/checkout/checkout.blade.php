<x-layout>
    <x-main.hero>
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight lg:leading-tight text-white md:text-5xl lg:text-6xl">
            Pembayaran</span></h1>
    </x-main.hero>

    <section class="bg-gray-100 py-8 antialiased dark:bg-gray-900 md:py-16">
        <form action="" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div class="flex-1">
                    <div class="space-y-8 px-8">

                        <div class="mb-8">
                            <h2 class="text-xl font-semibold text-hitamCoklat dark:text-white">Delivery Details</h2>

                            @if ($selectedAddress)
                                <div
                                    class="block m-4 max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 {{ $selectedAddress->is_selected ? 'border-sky-700' : '' }}">

                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-hitamCoklat dark:text-white">
                                        {{ Auth::user()->name }} | <span>{{ $selectedAddress->phone }}</span></h5>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">
                                        {{ $selectedAddress->address }}
                                    </p>
                                    <p class="font-normal text-gray-700 dark:text-gray-400">
                                        {{ $selectedAddress->province }}
                                        | <span>{{ $selectedAddress->postal_code }}</span>
                                    </p>
                                </div>
                            @else
                                <p>Tambahkan anda terlebih dahulu di profile</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                <dd id="subtotal-amount" class="text-base font-medium text-hitamCoklat dark:text-white">
                                    Rp
                                    {{ number_format($subtotal, 0, ',', '.') }}</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Kurir</dt>
                                <dd class="text-base font-medium text-hitamCoklat dark:text-white">Free ongkir</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd id="tax-amount" class="text-base font-medium text-hitamCoklat dark:text-white">
                                    {{ number_format($tax * 100) . '%' }}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-hitamCoklat dark:text-white">Total</dt>
                                <dd id="total-amount" class="text-base font-bold text-hitamCoklat dark:text-white">Rp
                                    {{ number_format($subtotal, 0, ',', '.') }}</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button type="button" id="pay-button"
                            class="flex w-full items-center justify-center rounded-lg bg-blue-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Lakukan
                            Pembayaran</button>
                    </div>
                </div>
            </div>
        </form>
    </section>

    @section('scripts')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key={{ config('midtrans.clientKey') }}></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function() {
                // SnapToken acquired from previous step
                snap.pay('{{ $transaction->snap_token }}', {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        window.location.href = '{{ route('checkout.success', $transaction->id) }}'
                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    // Optional
                    onError: function(result) {
                        /* You may add your own js here, this is just example */
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    }
                });
            };
        </script>
    @endsection
</x-layout>
