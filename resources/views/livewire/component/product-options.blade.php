<div>
    <div>

        <span class="text-xs">{{__u('actions.select_size')}}</span> <br>

        <div class="md:grid md:grid-cols-4 md:gap-1">
        @foreach($sizes as $size)
            <div>
                <button wire:click="$emit('sizeSelected', '{{$size}}')" class="w-full py-2.5 text-beige hover:bg-green-200 hover:text-beige-500 {{ $active === $size ? 'bg-green-50' : 'bg-green-400' }}">
                    {{$size}}
                </button>
            </div>

        @endforeach
        </div>
    </div>
    <div>
        <label id="listbox-label" class="inline-block text-xs mt-4">
            {{__u('actions.select_color')}}
        </label>
        <div class="relative w-full border-none">
            <select id="colorSelectId" wire:change="colorSelected($event.target.value)" class="bg-green-400 appearance-none border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full">
                @foreach($items as $item)
                    <option {{$loop->first ? 'selected' : ''}} value="{{$item->uuid}}">{{ $item->color }}  |  {{__('models.product.stock')}}: {{$item->stock}}</option>
                @endforeach
            </select>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('load', (event) => {
                document.getElementById('colorSelectId').dispatchEvent(new Event('change'));
            });
        </script>
    @endpush
</div>
