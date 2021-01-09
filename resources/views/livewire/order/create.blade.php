<div class="mx-10">
    <form>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
            <div class="md:col-span-2">

                <h1 class="text-2xl">{{__u("models.address.delivery")}}</h1>
                <div class="mt-3 grid grid-cols-2 gap-3">
                    <div>
                        <label for="first_name"
                               class="block text-sm font-medium">{{__u('models.address.first_name')}}</label>
                        <input wire:model="address.first_name" type="text" id="first_name"
                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                               placeholder="{{__u('models.address.first_name')}}"
                               autocomplete="given-name">
                        @error('address.first_name')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="last_name"
                               class="block text-sm font-medium">{{__u('models.address.last_name')}}</label>
                        <input wire:model="address.last_name" type="text" id="last_name"
                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                               placeholder="{{__u('models.address.last_name')}}"
                               autocomplete="family-name">
                        @error('address.last_name')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>

                    @if(! Auth::id())
                        <div class="col-span-2">
                            <label for="email"
                                   class="block text-sm font-medium">{{__u('models.user.email')}}</label>
                            <input wire:model="address.email" type="text" id="email"
                                   class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                                   placeholder="{{__u('models.user.email')}}"
                                   autocomplete="email">
                            @error('address.email')
                            <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    <div class="col-span-2">
                        <label for="street"
                               class="block text-sm font-medium">{{__u('models.address.street')}}</label>
                        <input wire:model="address.street" type="text" id="street"
                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                               placeholder="{{__u('models.address.street')}}"
                               autocomplete="address-line1">
                        @error('address.street')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="number"
                               class="block text-sm font-medium">{{__u('models.address.number')}}</label>
                        <input wire:model="address.number" type="text" id="number"
                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                               placeholder="{{__u('models.address.number')}}"
                               autocomplete="houseNumber">
                        @error('address.number')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="street_extra"
                               class="block text-sm font-medium">{{__u('models.address.street_extra')}}</label>
                        <input wire:model="address.street_extra" type="text" id="street_extra"
                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                               placeholder="{{__u('models.address.street_extra')}}"
                               autocomplete="address-line2">
                        @error('address.street_extra')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="zipcode"
                               class="block text-sm font-medium">{{__u('models.address.zipcode')}}</label>
                        <input wire:model="address.zipcode" type="text" id="zipcode"
                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                               placeholder="{{__u('models.address.zipcode')}}"
                               autocomplete="postal-code">
                        @error('address.zipcode')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="city"
                               class="block text-sm font-medium">{{__u('models.address.city')}}</label>
                        <input wire:model="address.city" type="text" id="city"
                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                               placeholder="{{__u('models.address.city')}}"
                               autocomplete="address-level2">
                        @error('address.city')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-span-2">

                        <input wire:model="present" type="checkbox" id="present"
                               class="rounded border-gray-300 text-green-50 shadow-sm focus:border-green-50 focus:ring focus:ring-green-50 focus:ring-opacity-50"
                               placeholder="{{__u('models.order.terms')}}">
                        <label for="present" class="text-sm font-medium">{{ __u("models.order.present") }}</label>
                        @error('present')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>

                        <input wire:model="terms" type="checkbox" id="terms"
                               class="rounded border-gray-300 text-green-50 shadow-sm focus:border-green-50 focus:ring focus:ring-green-50 focus:ring-opacity-50"
                               placeholder="{{__u('models.order.terms')}}">
                        <label for="terms" class="text-sm font-medium">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                           'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm hover:text-gray-900">'.__('Terms of Service').'</a>',
                                           'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                   ]) !!}
                        </label>
                        @error('terms')
                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>

                    </div>
                    <div>
                        <button wire:click="checkout" type="button"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-green-50">
                            <i wire:loading wire:target="checkout" class="fas fa-spinner fa-spin mt-0.5 mr-1"></i>{{__("models.cart.order")}}
                        </button>
                    </div>

                </div>

            </div>
            <div>
                <h1 class="text-2xl">{{__u("models.cart.your_order")}}</h1>
                <ul>
                    @foreach($cart as $item)
                        <li class="flex flex-row justify-between">{{ $item->quantity }}x {{$item->name}} <span
                                class="text-right right-0">{{ money($item->getPriceSum()) }}</span></li>
                    @endforeach
                    @if(Cart::getCondition(\App\Models\Enums\CartConditionEnum::SHIPPING))
                            <li class="flex flex-row justify-between">
                                {{__u('models.cart.shipping')}}
                                <span class="text-right right-0">
                                    {{  money(Cart::getCondition(\App\Models\Enums\CartConditionEnum::SHIPPING)->getValue()) }}
                                </span>
                            </li>
                    @endif
                </ul>
                <div class="mt-4 text-lg flex flex-row justify-between"><span>{{__u("models.cart.total")}}</span>
                    <span>{{money(\Cart::getTotal())}}</span></div>
            </div>
        </div>
    </form>

</div>
