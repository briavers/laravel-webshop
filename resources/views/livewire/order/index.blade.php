<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        {{ __u('models.order.your') }}
    </h2>

</x-slot>

<div>
    <div class="max-w-7xl mx-auto py-10 px-6 lg:px-8 flex flex-col">
        @forelse($orders as $order)
            <div class="w-full pb-2 mb-5 {{!$loop->last ? "border-b" : ''}} border-beige-200">
                <div class="grid grid-cols-4 gap-2">
                    <div class="col-span-4 md:col-span-1 text-center md:text-left">
                        <h2 class="text-lg ">{{$order->created_at->format('d M Y')}}</h2>
                        {{$order->number}} <br>
                        <button type="button" wire:click="downloadInvoice({{$order->id}})"
                                class="inline-flex w-full justify-center mt-1 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-blue-400">
                            <i wire:loading wire:target="downloadInvoice({{$order->id}})"
                               class="fas fa-spinner fa-spin mt-0.5 mr-1"></i> <i class="fas fa-file-invoice-dollar mt-0.5 mr-1"></i>{{ __("models.order.download_invoice")}}
                        </button>
                    </div>
                    @foreach($order->orderLines as $orderLine)
                        @if($orderLine->name === 'Shipping')
                            @continue
                        @endif
                        <div class="col-span-2 md:col-span-1 grid grid-cols-3 gap-3 pb-2.5">
                            <div>
                                {{ $orderLine->product->parent->getFirstMedia() }}
                            </div>
                            <div class="col-span-2">
                                <strong>{{$orderLine->name}}</strong> <br>
                                {{__('models.product.color')}}: {{$orderLine->color}} <br>
                                {{__('models.product.size')}}: {{$orderLine->size}} <br>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            no orders found
        @endforelse

    </div>
</div>
