<form wire:submit.prevent="save">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-3 gap-3">
        <div class="col-span-3">

            @if($focusedCategory)
                <h1 class="text-4xl">{{__('actions.model.edit')}} {{$focusedCategory->name}}</h1>
            @elseif($parentCategory && $parentCategory->name)
                <h1 class="text-4xl">{{__('models.category.new_sub_for')}}: {{$parentCategory->name}} </h1>
            @else
                <h1 class="text-4xl">{{__('models.category.new')}} </h1>
            @endif
        </div>
        <div class="col-span-2">
            <label for="slug"
                   class="block text-sm font-medium">{{__u('models.category.slug')}}</label>
            <input wire:model="category.slug" type="text" name="slug" id="slug"
                   class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                   placeholder="{{__u('models.category.slug')}}">
            @error('category.slug')
            <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

        </div>
        <div>
            <label for="menu"
                   class="block text-sm font-medium">{{__u('models.category.menu')}}</label>
            <input wire:model="category.menu" type="number" name="menu" id="menu"
                   class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                   placeholder="0">
            <span class="text-xs">{{__u('models.category.menu_description')}}</span>
            @error('category.menu')
            <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

        </div>
        <div>
            <label for="name_nl"
                   class="block text-sm font-medium">{{__u('models.category.name_nl')}}</label>
            <input wire:model="name_nl" type="text" name="name_nl" id="name_nl"
                   class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                   placeholder="{{__u('models.category.name_nl')}}">
            @error('name_nl')
            <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

        </div>
        <div>
            <label for="name_fr"
                   class="block text-sm font-medium">{{__u('models.category.name_fr')}}</label>
            <input wire:model="name_fr" type="text" name="name_fr" id="name_fr"
                   class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                   placeholder="{{__u('models.category.name_fr')}}">
            @error('name_fr')
            <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

        </div>
        <div>
            <label for="name_en"
                   class="block text-sm font-medium">{{__u('models.category.name_en')}}</label>
            <input wire:model="name_en" type="text" name="name_en" id="name_en"
                   class="mt-1 bg-green-500 focus:ring-green-200 focus:border-green-200 block w-full shadow-sm sm:text-sm border-green-500 rounded-md"
                   placeholder="{{__u('models.category.name_en')}}">
            @error('name_en')
            <span class="text-red-800 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>
    <div>
        <div class="grid grid-cols-3 gap-3">
            <div>
                <label for="description" class="block text-sm font-medium">
                    {{__u('models.category.description_nl')}}
                </label>
                <div class="mt-1">
                    <textarea wire:model="desc_nl" id="description_nl" name="description_nl"
                              rows="3"
                              class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                              placeholder="{{__u('models.category.description_nl')}}"></textarea>
                </div>
                @error('desc_nl')
                <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

            </div>
            <div>
                <label for="description" class="block text-sm font-medium">
                    {{__u('models.category.description_fr')}}
                </label>
                <div class="mt-1">
                    <textarea wire:model="desc_fr" id="description_fr" name="description_fr"
                              rows="3"
                              class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                              placeholder="{{__u('models.category.description_fr')}}"></textarea>
                </div>
                @error('desc_fr')
                <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

            </div>
            <div>
                <label for="description" class="block text-sm font-medium">
                    {{__u('models.category.description_en')}}
                </label>
                <div class="mt-1">
                    <textarea wire:model="desc_en" id="description_en" name="description_en"
                              rows="3"
                              class="shadow-sm bg-green-500 focus:ring-green-200 focus:border-green-200 mt-1 block w-full sm:text-sm border-green-500 rounded-md"
                              placeholder="{{__u('models.category.description_en')}}"></textarea>
                </div>
                @error('desc_en')
                <span class="text-red-800 text-sm">{{ $message }}</span> @enderror

            </div>
        </div>
        <button type="submit"
                class="inline-flex justify-center mt-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-green-50">
            <i wire:loading wire:target="category" class="fas fa-spinner fa-spin mt-0.5 mr-1"></i>{{__u('actions.model.save')}}
        </button>
        <button type="button" wire:click="$emitUp('closeModal')"
                class="inline-flex justify-center mt-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-500">
            <i wire:loading wire:target="category" class="fas fa-spinner fa-spin mt-0.5 mr-1"></i>{{__u('actions.model.cancel')}}
        </button>
    </div>
</form>
