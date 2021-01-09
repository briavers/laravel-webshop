@extends("pdf.minimal")
@section("content")
    <table class="w-full table-fixed">
        <colgroup>
            <col width="20%"/>
            <col width="50%"/>
            <col width="30%"/>
        </colgroup>
        <tr>
            <td colspan="2" class="text-lg font-bold pb-5">{{__u('models.invoice.invoice')}}</td>
{{--            <td rowspan="2"><img class="w-full" src={{ public_path('storage/keep/logo.jpg') }} alt="logo"></td>--}}
            <td rowspan="2"><img class="w-full" src={{ asset('storage/keep/logo.jpg') }} alt="logo"></td>
        </tr>
        <tr class="align-top">
            <td colspan="2">
                <span class="font-bold capitalize">Mieke Roelandt</span> <br>
                Sint-Barbarastraat 2 <br>
                9620 Zottegem <br>
                Ondernemingsnr BE0671 599 789 <br>
                IBAN BE06 7340 4277 8322 <br>
                BIC KREDBEBB <br>
            </td>
        </tr>
        <tr>
            <td colspan="3">&emsp;</td>
        </tr>
        <tr>
            <td colspan="3">&emsp;</td>
        </tr>
        <tr>
            <td>{{__u('models.invoice.number')}}</td>
            <td>H-{{$order->number}}</td>
            <td>{{$address->fullName}} </td>
        </tr>
        <tr>
            <td>{{__u('models.invoice.date')}}</td>
            <td>{{$order->created_at->toFormattedDateString()}}</td>
            <td>{{$address->street}} {{$address->number}} </td>
        </tr>
        <tr>
            <td>{{__u('models.invoice.expiration')}}</td>
            <td>{{$order->created_at->addMonth()->toFormattedDateString()}}</td>
            <td>{{$address->zipcode}} {{$address->city}} </td>
        </tr>
        <tr>
            <td>&emsp;</td>
            <td>&emsp;</td>
            <td>{{$address->CountryName}}</td>
        </tr>
    </table>
    <table class="w-full mt-3" style="height: 18cm">
        <tr style="height: 15px" class="font-bold">
            <th class="border-b-2 border-black ">{{__u('models.invoice.description')}}</th>
            <th class="border-b-2 border-black text-right">{{__u('models.invoice.amount')}}</th>
            <th class="border-b-2 border-black text-right">{{__u('models.invoice.price')}}</th>
            <th class="border-b-2 border-black text-right">{{__u('models.invoice.total')}}</th>
            <th class="border-b-2 border-black text-right">{{__u('models.invoice.vat')}}</th>
        </tr>
        @foreach($orderLines as $orderLine)
            <tr style="height: 15px; background-color: white">
                <td>{{$orderLine->name}} {{$orderLine->color ? ' | ' . $orderLine->color : ''}} {{$orderLine->size ? ' | ' . $orderLine->size : ''}}</td>
                <td class="text-right">{{$orderLine->quantity}}</td>
                <td class="text-right">{{money($orderLine->unit_price)}}</td>
                <td class="text-right">{{money($orderLine->total)}}</td>
                <td class="text-right">KO</td>
            </tr>
        @endforeach
            <tr>
                <td colspan="5" style="height: auto"></td>
            </tr>
        <tr style="height: 15px">
                <td colspan="2">&emsp;</td>
                <td class="text-right font-bold">{{__u("models.invoice.total")}}</td>
                <td class="text-right">{{money($order->total_inclusive)}}</td>
                <td>&emsp;</td>
            </tr>
    </table>

    <p class="pt-16 px-6">
        {!! __u('models.invoice.terms') !!}
    </p>
@endsection
