<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __u('models.product.model_name') }}
        </h2>
    </x-slot>
    <div>
        <div class="container mx-auto py-6 px-6 lg:px-8">
            <livewire:product.index :slug="$slug"/>
        </div>
    </div>
</x-app-layout>
