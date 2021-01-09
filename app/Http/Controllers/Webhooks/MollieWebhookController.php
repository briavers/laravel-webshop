<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmed;
use App\Mail\OrderPaymentFailed;
use App\Models\Enums\OrderStatusEnum;
use App\Models\Order;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Log;
use Mollie;
use Mollie\Api\Resources\Payment;
use Mollie\Api\Types\PaymentStatus;
class MollieWebhookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request)
    {
        if (! $request->has('id')) {
            return new Response('', Response::HTTP_ACCEPTED);
        }


        /** @var Payment $payment */
        $payment = Mollie::api()->payments()->get($request->id);

        if (empty($payment->metadata)) {
            return new Response('', Response::HTTP_ACCEPTED);
        }


        $order = Order::find($payment->metadata->order_id);
        if(empty($order)){
            return new Response('', Response::HTTP_ACCEPTED);
        }

        $order->payment_id = $payment->id;

        switch ($payment->status)
        {
            case PaymentStatus::STATUS_AUTHORIZED:
                $order->status = OrderStatusEnum::PROCESSING;
                $order->save();
                $this->completedPayment($order, $payment);

            case PaymentStatus::STATUS_PAID:
                $order->status = OrderStatusEnum::PAID;
                $order->paid_at = Carbon::parse($payment->paidAt)->setTimezone('Europe/Brussels');
                $order->save();
                $this->completedPayment($order, $payment);
                break;

            case PaymentStatus::STATUS_CANCELED:
            case PaymentStatus::STATUS_EXPIRED:
                $order->status = OrderStatusEnum::CANCELLED;
                $order->cancelled_at = Carbon::now();
                $order->save();
                break;

            default:
                $order->status = OrderStatusEnum::FAILED;
                $order->cancelled_at = Carbon::now();
                $order->save();
                $this->failedPayment($order, $payment);
                break;
        }
        return new Response('', Response::HTTP_ACCEPTED);
    }

    private function completedPayment(Order $order, Payment $payment)
    {
        Mail::to($order->address->email)->send(new OrderConfirmed($order));
        Mail::to(config("mail.from.address"))->send(new OrderConfirmed($order));
    }

    private function failedPayment(Order $order, Payment $payment)
    {
        Mail::to(config("mail.from.address"))->send(new OrderPaymentFailed($order));
    }
}
