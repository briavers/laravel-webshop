<div>
    <div class="max-w-10/10 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 2xl:grid-cols-6 gap-4 mb-5">

            @foreach ($products as $product)
                <livewire:product.index-card :product="$product"/>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</div>
