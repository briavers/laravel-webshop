<div>
    <div class="max-w-10/10 mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex flex-col mx-auto w-full items-center justify-center">
            @if ($categories && count($categories) > 0)
                <ul class="flex flex-col w-full pt-1 pl-6 pr-0">
                    @foreach ($categories as $category)
                        <livewire:category.list-item :category="$category" :key="time().$loop->index"/>
                        <div class="h-5"></div>
                    @endforeach
                </ul>
            @else
                <div>
                    <h1 class="text-center">no categories</h1> <br>
                </div>
            @endif
            <div>
                <button wire:click="$emit('createCategory')" type="button"
                        class="inline-flex justify-center mx-2 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus-within:ring-green-50">
                    {{__u('models.category.new')}}
                </button>
            </div>
        </div>
    </div>
    @if($isOpen)
        <div class="fixed z-100 w-full h-full bg-gray-500 opacity-75 top-0 left-0"></div>
        <div class="fixed z-101 w-full h-full top-0 left-0 overflow-y-auto">
            <div class="table w-full h-full py-6">
                <div class="table-cell text-center align-middle">
                    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="p-20 bg-green-300 rounded-lg text-left overflow-hidden shadow-xl">
                            <livewire:category.create :focusedCategory="$focusedCategory" :parentCategory="$parentCategory"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
