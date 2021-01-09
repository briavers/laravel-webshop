<?php

namespace App\Actions;

use App\Factories\Models\Admin\UserFactory;
use App\Models\Address;
use App\Models\Enums\RoleEnum;
use App\Models\Order;
use App\Repositories\Admin\Interfaces\UserInterface as UserRepositoryInterface;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use PDF;

class CreateInvoice
{
    public function execute(Order $order)
    {
        if(! $this->checkIfAllowed($order)) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $orderlines = $order->orderLines;
        $address = $order->address;

        return $this->createPdf($order, $orderlines, $address);
    }

    private function checkIfAllowed(Order $order)
    {
        if (request()->route()->getName() === 'webhooks.mollie'){
            return true;
        }

        if (! Auth::user()){
            return false;
        }

        if (RoleEnum::isInternal(Auth::user())){
            return true;
        }

        if ($order->user_id === Auth::user()->id) {
            return true;
        }

        return false;
    }

    private function createPdf(Order $order, Collection $orderlines, ?Address $address)
    {
        return PDF::setOption('enable-local-file-access', true)
            ->setPaper('A4', 'Portrait')
            ->loadView('pdf.invoice',
          [
             'order' => $order,
             'orderLines' => $orderlines,
             'address' => $address,
          ]
        );

    }
}
