<div>
    <nav class="relative bg-green-300 border-b-2 border-green-300 z-50">
        <div class="container mx-auto flex justify-between  max-w-full w-full">
            <div class="w-full grid grid-cols-2 md:grid-cols-6 gap-4">
                <div class="hidden lg:block col-span-2"></div>
                <div class="col-span-3 lg:col-span-2">
                    <h1 class="mt-2 text-5xl text-center w-full"> De Heksentuin </h1>
                </div>
                <div class="col-span-3 lg:col-span-2">
                    <div class="flex justify-center md:justify-start md:flex-row-reverse space-x-4 space-x-reverse mt-5 mr-5 items-center">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium hover:bg-green-200 focus:outline-none transition ease-in-out duration-150">
                                        <i class="fa fa-user mr-1"></i> {{ auth()->user() ? __u("menu.profile.profile") : __u("menu.profile.login") . " - " . __u("menu.profile.register")}}
                                    </button>
                                </span>
                            </x-slot>
                            @if(auth()->user())
                                <x-slot name="content">
                                    <div class="block px-4 py-2 text-xs">
                                        {{ __u('menu.profile.manage') }}
                                    </div>
                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __u('menu.profile.profile') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('order.index') }}">
                                        {{ __u('menu.profile.placed_orders') }}
                                    </x-jet-dropdown-link>
                                    <div class="border-t border-gray-100"></div>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __u('menu.profile.logout') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            @else
                                <x-slot name="content">
                                    <x-jet-dropdown-link href="{{ route('login') }}">
                                        {{ __u('menu.profile.login') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('register') }}">
                                        {{ __u('menu.profile.register') }}
                                    </x-jet-dropdown-link>
                                </x-slot>

                            @endif
                        </x-jet-dropdown>


                        <x-jet-dropdown align="right" width="w-max">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md ">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium hover:bg-green-200 focus:outline-none transition ease-in-out duration-150">
                                         <i class="fa fa-shopping-cart mr-1"></i> {{ Cart::getTotalQuantity() }}
                                    </button>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                @foreach($cart as $item)
                                    <span class="px-4 py-2 text-sm leading-5">{{ $item->quantity }}x {{$item->name}}</span>
                                    <br>
                                @endforeach
                                <x-jet-dropdown-link href="{{ route('cart.index') }}">
                                    {{ __u('models.cart.view_index') }}
                                </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>

                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium hover:bg-green-200 focus:outline-none transition ease-in-out duration-150">
                                                <img class="w-5 mr-5" src="{{ asset('storage/keep/flags/'.App::getLocale().'.svg') }}">
                                                <span>{{ Config::get('languages')[App::getLocale()] }}</span>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <x-jet-dropdown-link href="{{ route('lang.switch', $lang) }}">
                                            <div class="flex flex-row">
                                                <img class="w-5 mr-5" src="{{ asset('storage/keep/flags/'.$lang.'.svg') }}">
                                                <span> {{ __u($language) }} </span>
                                            </div>

                                        </x-jet-dropdown-link>
                                    @endif
                                @endforeach
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                </div>
            </div>


        </div>
        <div class="container mx-auto flex  justify-center md:justify-start px-6 lg:px-8">
            <ul class="flex">

                <!--Regular Link-->
                <li class="hover:bg-green-200">
                    <a href="{{ route('index') }}" class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold {{request()->routeIs('index') ? 'text-beige-100' : ''}}">
                        {{ __u('general.home') }}
                    </a>
                </li>

                <!--Toggleable Link-->
                <li class="hoverable hover:bg-green-200 hover:beige-400">
                    <span class="block cursor-pointer py-6 px-4 lg:p-6 text-sm lg:text-base font-bold">
                        {{ __u('models.product.model_name') }}
                    </span>
                    <div class="p-6 mega-menu mb-16 sm:mb-0 shadow-xl bg-green-400">
                        <div class="container mx-auto w-full flex flex-wrap mx-2">
                            <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                                <h3 class="font-bold text-xl  text-bold mb-2">{{ __u('menu.products.easy') }}</h3>
                                <li>
                                    <a href="{{route('product.index')}}" class="block p-3 hover:bg-green-200 ">{{__('menu.products.all')}}</a>
                                </li>
                                <li>
                                    <a href="{{route('product.index')}}" class="block p-3 hover:bg-green-200 ">{{__('menu.products.top')}}</a>
                                </li>
                            </ul>
                            <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r-0 lg:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                                <h3 class="font-bold text-xl  text-bold mb-2">{{__um("models.product.category", 2)}}</h3>

                                @foreach($menuCategories as $category)
                                <li>
                                    <a href="{{route('category.products', $category->slug)}}" class="block p-3 hover:bg-green-200 ">{{$category->name}}</a>
                                </li>
                                    @if($loop->last)
                                        </ul>
                                    @elseif($loop->iteration % 5 === 0 )
                                        </ul>
                                        <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-b-0 sm:border-r md:border-b-0 pb-6 pt-6 lg:pt-3">
                                    @endif

                                @endforeach
                        </div>
                    </div>
                </li>

                <!-- ## Toggleable Link Template ##

                <li class="toggleable"><input type="checkbox" value="selected" id="toggle-xxx" class="toggle-input"><label for="toggle-xxx" class="cursor-pointer">Click</label><div role="toggle" class="mega-menu">
                  Add your mega menu content
                  </div></li>

                -->

            @if( Auth::user() && (\App\Models\Enums\RoleEnum::isAdmin(Auth::user()->role_uuid) || \App\Models\Enums\RoleEnum::isSeller(Auth::user()->role_uuid) ))
                <!--Hoverable Link-->
                    <li class="hoverable hover:bg-green-200">
                        <span class="relative block py-6 px-4 lg:p-6 text-sm lg:text-base font-bold hover:bg-green-200">Admin</span>
                        <div class="p-6 mega-menu mb-16 sm:mb-0 shadow-xl bg-green-400">
                            <div class="container mx-auto w-full flex flex-wrap justify-start mx-2">
                                <div class="w-full  mb-8">
                                    <h2 class="font-bold text-2xl">{{__('menu.admin.title')}}</h2>
                                    <p>{{__('menu.admin.description')}} </p>
                                </div>
                                <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                                    <div class="flex items-center">
                                        <h3 class="font-bold text-xl  text-bold mb-2"><i class="fas fa-plus-square"></i> {{__('menu.admin.products.title')}} </h3>
                                    </div>
                                    <p class="text-gray-100 text-sm">{{__('menu.admin.products.description')}} </p>
                                    <div class="flex items-center py-3">

                                        <a href="{{route('product.create')}}" class=" bold border-b-2 border-blue-300 hover:text-blue-300"> <i class="fas fa-arrow-circle-right"></i> {{__('menu.admin.follow_link')}} </a>
                                    </div>
                                </ul>
                                <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                                    <div class="flex items-center">
                                        <h3 class="font-bold text-xl  text-bold mb-2"><i class="fas fa-user-astronaut"></i> {{__('menu.admin.users.title')}}</h3>
                                    </div>
                                    <p class="text-gray-100 text-sm">{{__('menu.admin.users.description')}}</p>
                                    <div class="flex items-center py-3">

                                        <a href="{{route('admin.users.index')}}" class=" bold border-b-2 border-blue-300 hover:text-blue-300"> <i class="fas fa-arrow-circle-right"></i> {{__('menu.admin.follow_link')}}  </a>
                                    </div>
                                </ul>
                                <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                                    <div class="flex items-center">
                                        <h3 class="font-bold text-xl  text-bold mb-2"><i class="fas fa-tags"></i> {{__('menu.admin.category.title')}}</h3>
                                    </div>
                                    <p class="text-gray-100 text-sm">{{__('menu.admin.category.description')}}</p>
                                    <div class="flex items-center py-3">

                                        <a href="{{route('admin.categories.index')}}" class=" bold border-b-2 border-blue-300 hover:text-blue-300"> <i class="fas fa-arrow-circle-right"></i> {{__('menu.admin.follow_link')}}  </a>
                                    </div>
                                </ul>

                                {{--                        <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">--}}
                                {{--                            <div class="flex items-center">--}}
                                {{--                                <h3 class="font-bold text-xl  text-bold mb-2"><i class="fas fa-plus-square"></i> New Product</h3>--}}
                                {{--                            </div>--}}
                                {{--                            <p class="text-gray-100 text-sm">Quickly create a new product for the store</p>--}}
                                {{--                            <div class="flex items-center py-3">--}}

                                {{--                                <a href="{{route('product.create')}}" class=" bold border-b-2 border-blue-300 hover:text-blue-300"> <i class="fas fa-arrow-circle-right"></i> Follow the link </a>--}}
                                {{--                            </div>--}}
                                {{--                        </ul>--}}
                                {{--                        --}}
                            </div>
                        </div>
                    </li>
                @endif

            </ul>
        </div>
    </nav>
</div>
