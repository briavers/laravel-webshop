<?php

namespace App\Http\Controllers\Development;

use App;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request)
    {
        if (!App::environment('local')) {
            abort(404);
        }

        $order = Order::first();
        $orderLines = $order->orderLines;
        $address = $order->address;

        return view(
            'pdf.invoice',
            [
                'order' => $order,
                'orderLines' => $orderLines,
                'address' => $address,
            ]
        );
    }
}
