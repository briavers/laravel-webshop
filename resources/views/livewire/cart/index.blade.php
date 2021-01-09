<x-slot name="header">
    <h2 class="font-semibold text-xl leading-tight">
        {{__u("models.cart.view_index")}}
    </h2>
    @if(session()->has('order-too-late'))
        <h2 class="text-xl text-red-900">{{ session()->get('order-too-late') }}</h2>
    @endif
</x-slot>

<div class="container mx-auto py-6 px-6 lg:px-8">
    <div class="max-w-10/10 mx-auto">
    @if(count($products) > 0)
            <div class="hidden md:grid grid-cols-1">
                <div class="grid grid-cols-8 gap-4 border-b-4 border-beige-200 pb-2.5 mb-9">
                    <div>

                    </div>
                    <div class="col-span-3">
                        <h1 class="text-2xl">{{ __u('models.product.name')}}</h1>
                    </div>
                    <div>
                        <h2 class="text-lg">{{ __u('models.cart.quantity')}}</h2>
                    </div>
                    <div>
                        <h2 class="text-lg">{{ __u('models.product.unit_price')}}</h2>
                    </div>
                    <div>
                        <h2 class="text-lg">{{ __u('models.cart.total')}}</h2>
                    </div>
                    <div>
                        <h2 class="text-lg">{{ __u('models.cart.options')}}</h2>
                    </div>
                </div>
                @foreach ($products as $product)
                    @php
                        $parent = $product->model->parent;
                    @endphp
                    <div class="grid grid-cols-8 gap-4 border-b-4 border-green-600 pb-2.5">
                        <div>
                            <a href="{{route('product.show', $parent->id)}}">
                                <img srcset="{{$parent->getFirstMedia()->getSrcset()}}"
                                     src="{{$parent->getFirstMedia()->getFullUrl()}} sizes=" (min-width: 1000px) 33vw, 50vw">
                            </a>
                        </div>
                        <div class="col-span-3">
                            <h1 class="text-2xl">{{$parent->name}}</h1> <br>
                            <p>{{ __u('models.product.size')}}: {{$product->model->size}}</p>
                            <p>{{ __u('models.product.color')}}: {{$product->model->color}}</p>
                        </div>
                        <div>
                            <h2 class="text-lg">{{$product->quantity}}</h2>
                        </div>
                        <div>
                            <h2 class="text-lg">{{money($product->price)}}</h2>
                        </div>
                        <div>
                            <h2 class="text-lg">{{money($product->getPriceSum()) }}</h2>
                        </div>
                        <div>
                            @if($product->quantity >= 2)
                                <button type="button" wire:click="removeOne({{$product->id}})"
                                        class="inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-400">
                                    <i wire:loading wire:target="removeOne({{$product->id}})"
                                       class="fas fa-spinner fa-spin mt-0.5 mr-1"></i> {{__("models.cart.remove_one")}}
                                </button>
                            @endif
                            <button type="button" wire:click="removeAll({{$product->id}})"
                                    class="inline-flex w-full justify-center mt-1 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-400">
                                <i wire:loading wire:target="removeAll({{$product->id}})"
                                   class="fas fa-spinner fa-spin mt-0.5 mr-1"></i>{{ $product->quantity == 1 ? __("models.cart.remove") : __("models.cart.remove_all")}}
                            </button>

                        </div>
                    </div>
                @endforeach
                <div class="grid grid-cols-8 gap-4">
                    <div class="col-span-2 md:col-span-5"></div>
                    <div class="self-center col-span-3 md:col-span-1">
                        <h2 class="text-lg">{{ __u('models.cart.subtotal') }}</h2>
                    </div>
                    <div class="self-center">
                        <h2 class="text-lg">{{ money(\Cart::getSubTotal()) }}</h2>
                    </div>
                </div>
                @if(Cart::getCondition(\App\Models\Enums\CartConditionEnum::SHIPPING))
                    <div class="grid grid-cols-8 gap-4">
                        <div class="col-span-2 md:col-span-5"></div>
                        <div class="self-center col-span-3 md:col-span-1">
                            <h2 class="text-lg">{{ __u('models.cart.shipping') }}</h2>
                        </div>
                        <div class="self-center">
                            <h2 class="text-lg">{{ money(Cart::getCondition(\App\Models\Enums\CartConditionEnum::SHIPPING)->getValue()) }}</h2>
                        </div>
                    </div>
                @endif
                <div class="grid grid-cols-8 gap-4">
                    <div class="col-span-2 md:col-span-5"></div>
                    <div class="self-center col-span-3 md:col-span-1 ">
                        <h2 class="text-lg">{{ __u('models.cart.total') }}</h2>
                    </div>
                    <div class="self-center">
                        <h2 class="text-lg">{{ money(\Cart::getTotal()) }}</h2>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <a href="{{route('order.create')}}" class="inline-flex text-center w-full mt-1 p-2 px-5 bg-green-200 hover:bg-green-50 rounded "><span class="text-center w-full">{{__u("models.cart.order")}} </span> </a>                           </div>
                </div>
            </div>

            <div class="grid md:hidden">
                @foreach ($products as $product)
                    @php
                        $parent = $product->model->parent;
                    @endphp
                    <div class="grid grid-cols-3 gap-2 pb-3.5">
                        <div>
                            <a href="{{route('product.show', $parent->id)}}">
                                <img srcset="{{$parent->getFirstMedia()->getSrcset()}}"
                                     src="{{$parent->getFirstMedia()->getFullUrl()}} sizes=" (min-width: 1000px) 33vw, 50vw">
                            </a>
                        </div>
                        <div class="col-span-2 grid grid-cols-1 xs:grid-cols-2 gap-2">
                            <div>
                                <h2 class="text-lg">{{$parent->name}} </h2>
                                <p>{{ __u('models.cart.quantity')}}: {{$product->quantity}}</p>
                                <p>{{ __u('models.product.size')}}: {{$product->model->size}}</p>
                                <p>{{ __u('models.product.color')}}: {{$product->model->color}}</p>
                            </div>
                            <div>
                                <p>{{ __u('models.cart.unit_price')}}: {{money($product->price)}}</p>
                                <p>{{ __u('models.cart.total')}}: {{money($product->getPriceSum())}}</p>
                            </div>
                            <div  class="order-last">
                                <button type="button" wire:click="removeAll({{$product->id}})"
                                        class="inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-400">
                                    <i wire:loading wire:target="removeAll({{$product->id}})"
                                       class="fas fa-spinner fa-spin mt-0.5 mr-1"></i>{{ $product->quantity == 1 ? __("models.cart.remove") : __("models.cart.remove_all")}}
                                </button>
                            </div>
                            @if($product->quantity >= 2)
                                <div>
                                    <button type="button" wire:click="removeOne({{$product->id}})"
                                                class="inline-flex w-full justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-400">
                                            <i wire:loading wire:target="removeOne({{$product->id}})"
                                               class="fas fa-spinner fa-spin mt-0.5 mr-1"></i> {{__("models.cart.remove_one")}}
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h2 class="text-lg">{{ __u('models.cart.subtotal') }}</h2>
                        </div>
                        <div>
                            <h2 class="text-lg text-right">{{ money(\Cart::getSubTotal()) }}</h2>
                        </div>
                    </div>
                    @if(Cart::getCondition(\App\Models\Enums\CartConditionEnum::SHIPPING))
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h2 class="text-lg">{{ __u('models.cart.shipping') }}</h2>
                            </div>
                            <div>
                                <h2 class="text-lg text-right">{{ money(Cart::getCondition(\App\Models\Enums\CartConditionEnum::SHIPPING)->getValue()) }}</h2>
                            </div>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h2 class="text-lg">{{ __u('models.cart.total') }}</h2>
                        </div>
                        <div>
                            <h2 class="text-lg text-right">{{ money(\Cart::getTotal()) }}</h2>
                        </div>
                        <div class="col-span-2 md:col-span-1">
                            <a href="{{route('order.create')}}" class="inline-flex text-center w-full mt-1 p-2 px-5 bg-green-200 hover:bg-green-50 rounded "><span class="text-center w-full">{{__u("models.cart.order")}} </span> </a>                           </div>
                    </div>
            </div>
        @else
            <div class="grid grid-cols-4">
                <div class="col-start-2 col-span-2">
                    {{--TODO: add a own-made immage--}}
                    <img src="https://ariya.events/wp-content/uploads/2020/07/ariya-empty-cart.png" class="w-full" alt="">
                </div>
            </div>
        @endif
    </div>
</div>
