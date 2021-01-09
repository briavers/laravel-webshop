<x-app-layout>

    <div>
        <div class="container mx-auto py-10 px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-2">
                    <span class="text-5xl"> {{$qoute}}</span>
                </div>
                <div class="col-span-3 md:col-span-1">
                    <img class="w-full" src={{ asset('storage/keep/logo.jpg') }} alt="logo">
                </div>
            </div>
        </div>
    </div>

    @if(count($promotedProducts))
        <div>
            <div class="container mx-auto py-5 px-6 lg:px-8">
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __u('models.product.promoted_items') }}
                </h2>
                <div class="max-w-10/10 mx-auto mt-2">
                    <div class="grid grid-cols-1 md:grid-cols-3 2xl:grid-cols-6 gap-4 mb-2">
                        @foreach ($promotedProducts as $product)
                            <livewire:product.index-card :product="$product"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($newItems))
        <div>
            <div class="container mx-auto px-6 lg:px-8">
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __u('models.product.recent_items') }}
                </h2>
                <div class="max-w-10/10 mx-auto mt-2">
                    <div class="grid grid-cols-1 md:grid-cols-3 2xl:grid-cols-6 gap-4">
                        @foreach ($newItems as $product)
                            <livewire:product.index-card :product="$product"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif



</x-app-layout>
