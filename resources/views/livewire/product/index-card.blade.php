<a href="{{route('product.show', ['product' => $product->id])}}" class="bg-green-400 shadow-xl rounded-lg overflow-hidden">
    <div class="bg-cover bg-center h-56 p-4" style="background-image: url('{{$product->getFirstMediaUrl('default', 'thumbnail')}}')">
        <div class="flex justify-end">
{{--            <svg class="h-6 w-6 text-white fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">--}}
{{--                <path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"></path>--}}
{{--            </svg>--}}
        </div>
    </div>
    <div class="p-4">
        <p class="uppercase tracking-wide text-sm font-bold">{{ $product->name }}</p>
        <p class="text-3xl">{{ $product->price }}</p>
        <p class="text-gray-700">{{ $product->color }}</p>
    </div>
</a>
