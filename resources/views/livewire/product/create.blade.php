<div class="mx-10">
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="md:grid md:grid-cols-4 md:gap-5">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-large leading-6">{{__('models.product.form.default_info')}}</h3>
                        <p class="font-medium leading-6">{{__('models.product.form.default_info_desc')}}</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-3">
                    <div class="sm:rounded-md">
                        <div class="px-4 py-5 space-y-6 sm:p-6">
                            <div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label for="name_nl"
                                               class="block text-sm font-medium">{{__u('models.product.name_nl')}}</label>
                                        <input wire:model="name_nl" type="text" name="name_nl" id="name_nl"
                                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.name_nl')}}">
                                        @error('name_nl')
                                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                    </div>
                                    <div>
                                        <label for="name_fr"
                                               class="block text-sm font-medium">{{__u('models.product.name_fr')}}</label>
                                        <input wire:model="name_fr" type="text" name="name_fr" id="name_fr"
                                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.name_fr')}}">
                                        @error('name_fr')
                                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                    </div>
                                    <div>
                                        <label for="name_en"
                                               class="block text-sm font-medium">{{__u('models.product.name_en')}}</label>
                                        <input wire:model="name_en" type="text" name="name_en" id="name_en"
                                               class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.name_en')}}">
                                        @error('name_en')
                                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label for="description" class="block text-sm font-medium">
                                            {{__u('models.product.description_nl')}}
                                        </label>
                                        <div class="mt-1">
                                            <textarea wire:model="desc_nl" id="description_nl" name="description_nl"
                                                      rows="3"
                                                      class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                                      placeholder="{{__u('models.product.description_nl')}}"></textarea>
                                        </div>
                                        @error('desc_nl')
                                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                    </div>
                                    <div>
                                        <label for="description" class="block text-sm font-medium">
                                            {{__u('models.product.description_fr')}}
                                        </label>
                                        <div class="mt-1">
                                            <textarea wire:model="desc_fr" id="description_fr" name="description_fr"
                                                      rows="3"
                                                      class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                                      placeholder="{{__u('models.product.description_fr')}}"></textarea>
                                        </div>
                                        @error('desc_fr')
                                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                    </div>
                                    <div>
                                        <label for="description" class="block text-sm font-medium">
                                            {{__u('models.product.description_en')}}
                                        </label>
                                        <div class="mt-1">
                                            <textarea wire:model="desc_en" id="description_en" name="description_en"
                                                      rows="3"
                                                      class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                                      placeholder="{{__u('models.product.description_en')}}"></textarea>
                                        </div>
                                        @error('desc_en')
                                        <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <fieldset>
                                            <legend
                                                class="text-base font-medium">{{__('models.product.promoted')}}</legend>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex items-center h-5">
                                                        <input wire:model="promoted" id="promoted" name="promoted"
                                                               type="checkbox"
                                                               class="bg-green-500 focus:ring-green-200 h-4 w-4 text-indigo-600 border-green-500 rounded">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="comments"
                                                               class="font-medium">{{__('models.product.form.is_promoted')}}</label>
                                                        <p class="text-beige-300">{{__('models.product.form.is_promoted_info')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div>
                                        <livewire:component.category-select :presentCategories="isset($product) ? $product->categories : collect([])"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="md:grid md:grid-cols-4 md:gap-5 mt-8">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-large leading-6">{{__('models.product.model_name')}}</h3>
                        <p class="font-medium leading-6">{{__('models.product.form.products_desc')}}</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-3">
                    @foreach($products as $product)
                        <div class="px-4 py-5 sm:p-6">

                            <div class="grid grid-cols-4 gap-3">
                                <div>
                                    <label for="{{$loop->index}}-stock" class="block text-sm font-medium">
                                        {{__u('models.product.stock')}}
                                    </label>
                                    <div class="mt-1">
                                        <input type="number" wire:model="products.{{$loop->index}}.stock"
                                               id="{{$loop->index}}-stock" name="{{$loop->index}}-stock"
                                               class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.stock')}}">
                                    </div>
                                    @error("products.$loop->index.stock")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                </div>
                                <div>
                                    <label for="{{$loop->index}}-unit_price" class="block text-sm font-medium">
                                        {{__u('models.product.unit_price')}}
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border-r-0 bg-green-500 focus:ring-green-200 focus:border-green-200 text-sm">
                                                €
                                            </span>
                                        <input wire:model="products.{{$loop->index}}.unit_price" type="number"
                                               name="{{$loop->index}}-unit_price" id="{{$loop->index}}-unit_price"
                                               class="bg-green-500 focus:ring-green-200 focus:border-green-200 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-green-500"
                                               placeholder="0">
                                    </div>
                                    <p class="mt-2 text-sm">
                                        {{__('models.product.form.price_desc')}}
                                    </p>
                                    @error("products.$loop->index.unit_price")
                                    <span class="text-red-800 text-sm">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div>
                                    <label for="{{$loop->index}}-cost" class="block text-sm font-medium">
                                        {{__u('models.product.cost')}}
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border-r-0 bg-green-500 focus:ring-green-200 focus:border-green-200 text-sm">
                                                €
                                            </span>
                                        <input wire:model="products.{{$loop->index}}.cost" type="number"
                                               name="{{$loop->index}}-cost" id="{{$loop->index}}-cost"
                                               class="bg-green-500 focus:ring-green-200 focus:border-green-200 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-green-500"
                                               placeholder="0">
                                    </div>
                                    <p class="mt-2 text-sm">
                                        {{__('models.product.form.cost_desc')}}
                                    </p>
                                    @error("products.$loop->index.cost")
                                    <span class="text-red-800 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="{{$loop->index}}-color_code" class="block text-sm font-medium">
                                        {{__u('models.product.color_code')}}
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="h-9 inline-flex items-center px-3 rounded-l-md border-r-0 bg-green-500 focus:ring-green-200 focus:border-green-200 text-sm">
                                                #
                                            </span>
                                        <input type="color" wire:model="products.{{$loop->index}}.color_code"
                                               id="{{$loop->index}}-color_code" name="{{$loop->index}}-color_code"
                                               class="h-9 bg-green-500 focus:ring-green-200 focus:border-green-200 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-green-500"
                                               value="#ff0000">
                                    </div>
                                    <p class="mt-2 text-sm">
                                        {{__('models.product.form.color_desc')}}
                                    </p>
                                    @error("products.$loop->index.color_code")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                </div>
                                <div>
                                    <label for="{{$loop->index}}-size-nl" class="block text-sm font-medium">
                                        {{__u('models.product.size_nl')}}
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="products.{{$loop->index}}.size.nl"
                                               id="{{$loop->index}}-size-nl" name="{{$loop->index}}-size-nl"
                                               class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.size_nl')}}">
                                    </div>
                                    @error("products.$loop->index.size_nl")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                </div>
                                <div>
                                    <label for="{{$loop->index}}-size-fr" class="block text-sm font-medium">
                                        {{__u('models.product.size_fr')}}
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="products.{{$loop->index}}.size.fr"
                                               id="{{$loop->index}}-size-fr" name="{{$loop->index}}-size-fr"
                                               class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.size_fr')}}">
                                    </div>
                                    @error("products.$loop->index.size_fr")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                </div>
                                <div>
                                    <label for="{{$loop->index}}-size-en" class="block text-sm font-medium">
                                        {{__u('models.product.size_en')}}
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="products.{{$loop->index}}.size.en"
                                               id="{{$loop->index}}-size-en" name="{{$loop->index}}-size-en"
                                               class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.size_en')}}">
                                    </div>
                                    @error("products.$loop->index.size_en")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                </div>
                                <div>
                                    {{-- Whitespace --}}
                                </div>
                                <div>
                                    <label for="{{$loop->index}}-color-nl" class="block text-sm font-medium">
                                        {{__u('models.product.color_nl')}}
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="products.{{$loop->index}}.color.nl"
                                               id="{{$loop->index}}-color-nl" name="{{$loop->index}}-color-nl"
                                               class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.color_nl')}}">
                                    </div>
                                    @error("products.$loop->index.color_nl")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="{{$loop->index}}-color-fr" class="block text-sm font-medium">
                                        {{__u('models.product.color_fr')}}
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="products.{{$loop->index}}.color.fr"
                                               id="{{$loop->index}}-color-fr" name="{{$loop->index}}-color-fr"
                                               class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.color_fr')}}">
                                    </div>
                                    @error("products.$loop->index.color_fr")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="{{$loop->index}}-color-en" class="block text-sm font-medium">
                                        {{__u('models.product.color_en')}}
                                    </label>
                                    <div class="mt-1">
                                        <input type="text" wire:model="products.{{$loop->index}}.color.en"
                                               id="{{$loop->index}}-color-en" name="{{$loop->index}}-color-en"
                                               class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                                               placeholder="{{__u('models.product.color_en')}}">
                                    </div>
                                    @error("products.$loop->index.color_en")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
                                </div>


                                {{--
                                <div>
                                    <label for="{{$loop->index}}-discount" class="block text-sm font-medium">
                                        {{__u('models.product.discount')}}
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                    <span
                                        class="inline-flex items-center px-3 rounded-l-md border-r-0 bg-green-500 focus:ring-green-200 focus:border-green-200 text-sm">
                                        %
                                    </span>
                                        <input wire:model="products.{{$loop->index}}.discount" type="number"
                                               name="{{$loop->index}}-discount" id="{{$loop->index}}-discount"
                                               class="bg-green-500 focus:ring-green-200 focus:border-green-200 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-green-500"
                                               placeholder="0">
                                    </div>
                                    <p class="mt-2 text-sm">
                                        {{__('models.product.form.discount_desc')}}
                                    </p>
                                    @error("products.$loop->index.discount")
                                    <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

                                </div>
                                --}}
                                @if($loop->index !== 0)
                                    <div>
                                        <button wire:click="removeItem({{$loop->index}})" type="button"
                                                class="mt-6 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-500">
                                            {{__('models.product.form.remove_item')}}
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="md:grid md:grid-cols-4 md:gap-5">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-3">
                    <div class="px-4 py-3 text-right sm:px-6">
                        <button wire:click="addItem" type="button"
                                class="mr-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-blue-200">
                            {{__('models.product.form.add_item')}}
                        </button>
                    </div>

                </div>
            </div>
            <div class="md:grid md:grid-cols-4 md:gap-5 mt-8">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-large leading-6">{{__('models.product.form.pictures')}}</h3>
                        <p class="font-medium leading-6">{{__('models.product.form.pictures_desc')}}</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-3">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- file upload modal -->
                        <article aria-label="File Upload Modal" class="relative h-full flex flex-col"
                                 ondrop="dropHandler(event);" ondragover="dragOverHandler(event);"
                                 ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                            <!-- overlay -->
                            <div id="overlay"
                                 class="text-green-100 w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                                <i class="text-xl fas fa-cloud-upload-alt"></i>
                                <p class="text-lg ">{{__('models.product.form.drop_to_upload')}}</p>
                            </div>

                            <!-- scroll area -->
                            <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                                <header
                                    class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                    <p class="mb-3 font-semibold flex flex-wrap justify-center">
                                        <span>{{__('models.product.form.drag_and_drop')}}</span>
                                    </p>
                                    <input id="hidden-input" type="file" multiple class="hidden"/>
                                    <button id="button" type="button"
                                            class="mt-2 rounded-sm px-3 py-1 bg-green-200 hover:bg-green-400 focus:shadow-outline focus:outline-none">
                                        {{__('models.product.form.upload')}}
                                    </button>
                                </header>

                                <h1 class="pt-8 pb-3 font-semibold sm:text-lg">
                                    {{__('models.product.form.uploaded_files')}}
                                </h1>
                                <h2 class="text-md">
                                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                                </h2>

                                <template id="image-template">
                                    <li class="block p-1 w-full sm:w-1/2">
                                        <article tabindex="0"
                                                 class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                            <img alt="upload preview"
                                                 class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"/>

                                            <section
                                                class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                                <h1 class="flex-1"></h1>
                                                <div class="flex">
                                                      <span class="p-1">
                                                       <i class="far fa-image"></i>
                                                      </span>

                                                    <p class="p-1 size text-xs"></p>
                                                    <button type="button"
                                                            class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </section>
                                        </article>
                                    </li>
                                </template>

                                <ul id="gallery" class="flex flex-1 flex-wrap m-1">
                                    @if(count($photos) === 0 )
                                        <li id="empty"
                                            class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                            <i class="text-xl fas fa-ghost"></i>
                                            <span>{{__('models.product.form.no_files_selected')}}</span>
                                        </li>
                                    @else
                                        @foreach($photos as $photo)
                                            <li class="block p-1 w-full sm:w-1/2">
                                                <article tabindex="0"
                                                         class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                                    <img alt="upload preview"
                                                         class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"
                                                         src="{{$photo->temporaryUrl()}}"/>

                                                    <section
                                                        class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                                        <h1 class="flex-1">{{$photo->getClientOriginalName()}}</h1>
                                                        <div class="flex">
                                                      <span class="p-1">
                                                       <i class="far fa-image"></i> {{$photo->getSize()}}
                                                      </span>
                                                            <p class="p-1 size text-xs"></p>
                                                            <button type="button"
                                                                    class="py-2 px-4 delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md"
                                                                    data-targetname="{{$photo->getFilename()}}"
                                                                    data-target="{{$photo->temporaryUrl()}}">
                                                                <i class="far fa-trash-alt"
                                                                   data-targetname="{{$photo->getFilename()}}"
                                                                   data-target="{{$photo->temporaryUrl()}}"></i>
                                                            </button>
                                                        </div>
                                                    </section>
                                                </article>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                                @if(isset($oldPhotos) && count($oldPhotos) !== 0 )

                                    <h1 class="pt-8 pb-3 font-semibold sm:text-lg">
                                        {{__('models.product.form.files_that_have_been_set')}}
                                    </h1>
                                    <ul id="old-gallery" class="flex flex-1 flex-wrap -m-1">
                                        @foreach($oldPhotos as $photo)
                                            <li class="block p-1 w-full sm:w-1/2">
                                                <article tabindex="0"
                                                         class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                                    <img alt="upload preview"
                                                         class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed"
                                                         src="{{$photo->temporaryUrl()}}"/>

                                                    <section
                                                        class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                                        <h1 class="flex-1">{{$photo->getClientOriginalName()}}</h1>
                                                        <div class="flex">
                                                      <span class="p-1">
                                                       <i class="far fa-image"></i> {{ Spatie\MediaLibrary\Support\File::getHumanReadableSize($photo->getSize()) }}
                                                      </span>
                                                            <p class="p-1 size text-xs"></p>
                                                            <button type="button"
                                                                    class="py-2 px-4 delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md"
                                                                    data-targetname="{{$photo->getFilename()}}"
                                                                    data-target="{{$photo->uuid}}">
                                                                <i class="far fa-trash-alt"
                                                                   data-targetname="{{$photo->getFilename()}}"
                                                                   data-target="{{$photo->uuid}}"></i>
                                                            </button>
                                                        </div>
                                                    </section>
                                                </article>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <ul id="old-gallery" class="hidden">
                                    </ul>
                                @endif

                            </section>
                        </article>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-4 md:gap-5">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-3">
                    <div class="px-4 py-3 text-right sm:px-6">
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-green-50">
                            <i wire:loading class="fas fa-spinner fa-spin mt-0.5 mr-1"></i>{{__('actions.model.save')}}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        const imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

        // use to store pre selected files
        let FILES = {};

        // check if file is of type image and prepend the initialied
        // template to the target element
        function addFile(target, file) {
            const objectURL = URL.createObjectURL(file);
            FILES[objectURL] = file;

        @this.uploadMultiple('photos', [file]);
        }

        const gallery = document.getElementById("gallery"),
            galleryOld = document.getElementById("old-gallery"),
            overlay = document.getElementById("overlay");

        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");
        document.getElementById("button").onclick = () => hidden.click();
        hidden.onchange = (e) => {
            for (const file of e.target.files) {
                addFile(gallery, file);
            }
        };

        // use to check if a file is being dragged
        const hasFiles = ({dataTransfer: {types = []}}) =>
            types.indexOf("Files") > -1;

        // use to drag dragenter and dragleave events.
        // this is to know if the outermost parent is dragged over
        // without issues due to drag events on its children
        let counter = 0;

        // reset counter and append file to gallery when file is dropped
        function dropHandler(ev) {
            ev.preventDefault();
            for (const file of ev.dataTransfer.files) {
                addFile(gallery, file);
                overlay.classList.remove("draggedover");
                counter = 0;
            }
        }

        // only react to actual files being dragged
        function dragEnterHandler(e) {
            e.preventDefault();
            if (!hasFiles(e)) {
                return;
            }
            ++counter && overlay.classList.add("draggedover");
        }

        function dragLeaveHandler(e) {
            1 > --counter && overlay.classList.remove("draggedover");
        }

        function dragOverHandler(e) {
            if (hasFiles(e)) {
                e.preventDefault();
            }
        }

        // event delegation to caputre delete events
        // fron the waste buckets in the file preview cards
        gallery.onclick = ({target}) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                gallery.children.length === 1 && empty.classList.remove("hidden");
                delete FILES[ou];
            @this.removeUpload('photos', target.dataset.targetname);
            }
        };
        galleryOld.onclick = ({target}) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                gallery.children.length === 1 && empty.classList.remove("hidden");

                Livewire.emit('deleteOld', target.dataset.target)

            }
        };

    </script>

@endpush
