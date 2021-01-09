<div class="grid grid-cols-12 gap-1 md:gap-4">
    <div class="order-2 md:order-1 flex col-span-2 md:col-span-1">
        <div class="flex flex-col">
        @foreach($product->getMedia('default') as $image)
            <div class="w-full mb-2 cursor-pointer" wire:click="pictureSelected('{{$image->uuid}}')">
                {{$image('thumbnail')}}
            </div>
        @endforeach
        </div>

    </div>
    <div class="order-1 md:order-2 col-span-12 md:col-span-5">
        <div class="w-full" id="detailImage">
            @if($detailImage)
                <img srcset="{{$detailImage->getSrcset()}}" src="{{$detailImage->getFullUrl()}} sizes="(min-width: 1000px) 33vw, 50vw">
            @endif
        </div>
    </div>
    <div class="order-last col-span-12 md:col-span-6">
        <h1 class="text-4xl">{{$product->name}}</h1>
        <span class="pt-5 text-xl inline-block">     {!! isset($selectedProduct) ? '' : '<i class="fas fa-spinner fa-spin mt-0.5 mr-1"></i>  ' !!} {{money($selectedProduct?->unit_price)}}</span>
        @can('update', $product)
            <a class="ml-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-green-50" href="{{route('product.edit', $product)}}">{{__u('actions.model.edit')}}</a>
        @endcan
        <br>
        <div class="mt-6 md:mt-12">
            <span class="text-xs">{{__U('models.product.description')}}</span> <br>
            <p>{{ $product->description }}</p>
        </div>

        <div class="mt-6 md:mt-32">
            <livewire:component.product-options :sizes="$sizes" :parent="$product"/>
        </div>
        <div class="mt-4">
            <button wire:loading.attr="disabled" {{isset($selectedProduct) ? '' : 'disabled'}} type="button" wire:click="addToCart()" class="disabled:opacity-40 inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-green-50">
                <i wire:loading wire:target="addToCart" class="fas fa-spinner fa-spin mr-1"></i>
                {!! $addedToCart ? '<i class="fas fa-check mr-1"></i>  ' : '' !!}
                {{__u('actions.add_to_cart')}}
            </button>
        </div>
    </div>
</div>
