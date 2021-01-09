<li class="border-gray-400 flex flex-col mb-1">
    <div class="select-none cursor-pointer bg-green-400 rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:shadow-lg">
        <div class="flex-1 pl-1 mr-16">
            <div class="font-medium">{{ $category->name }}</div>
            <div class="text-sm">{{ $category->description }} | {{__('models.category.menu')}}: {{$category->menu}}</div>
        </div>
        <div class="flex flex-row justify-center items-center mr-4">
            <button wire:click="$emitUp('createCategory', {{$category->id}})" type="button" class="inline-flex justify-center mx-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-green-50">
                {{__u('models.category.new_sub')}}
            </button>
            <button wire:click="$emitUp('editCategory', {{$category->id}})" type="button" class="inline-flex justify-center mx-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-blue-500">
                {{__u('actions.model.edit')}}
            </button>
            <button wire:click="$emitUp('deleteCategory', {{$category->id}})" type="button" class="inline-flex justify-center mx-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-red-500">
                {{__u('actions.model.delete')}}
            </button>
        </div>
    </div>
    @if (count($category->children) > 0)
        <ul class="flex flex-col pt-1 pl-6 pr-0">
            @foreach($category->children as $category)
                @livewire('category.list-item', ['category' => $category])
            @endforeach
        </ul>
    @endif
</li>
