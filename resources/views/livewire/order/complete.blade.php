<div>
    @switch($order->status)
        @case(\App\Models\Enums\OrderStatusEnum::CREATED)
        <div wire:poll="checkPayment">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl leading-tight pb-3">
                    {{ __u('models.order.open.title') }}
                </h2>
                <p>
                    {{ __u('models.order.open.body') }} <br> <br>
                </p>
                <div class="flex justify-center">
                    <i class="fas fa-spinner fa-spin text-6xl text-center block"></i>
                </div>

            </div>
        </div>
        @break

        @case(\App\Models\Enums\OrderStatusEnum::PROCESSING)
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl leading-tight pb-3">
                    {{ __u('models.order.authorized.title') }}
                </h2>
                <p>
                    {{ __u('models.order.authorized.body') }} <br>
                </p>
            </div>
        </div>
        @break

        @case(\App\Models\Enums\OrderStatusEnum::PAID)
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl leading-tight pb-3">
                    {{ __u('models.order.paid.title') }}
                </h2>
                <p>
                    {{ __u('models.order.paid.body') }} <br>
                </p>
            </div>
        </div>
        @break

        @default
        @case(\App\Models\Enums\OrderStatusEnum::CANCELLED)
        @case(\App\Models\Enums\OrderStatusEnum::FAILED)
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl leading-tight pb-3">
                    {{ __u('models.order.failed.title') }}
                </h2>
                <p>
                    {{ __u('models.order.failed.body', ['email' => config('mail.from.address')]) }} <br>
                </p>
            </div>
        </div>
        @break
    @endswitch
</div>
