<x-app-layout>
    <div class="pt-4 bg-green-300">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <div class="text-beige-200 w-full sm:max-w-2xl mt-6 p-6 bg-green-400 shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-app-layout>
