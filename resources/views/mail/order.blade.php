@extends("mail.layout")
@section("content")
    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <tr>
            <td align="center" valign="top" bgcolor="#ffffff">
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table"
                       style="table-layout:fixed;">
                    <tr>
                        <td valign="top" class="em_aside">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="50" class="em_height">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="spacer">&emsp;</td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="center"
                                        style="font-family:'Open Sans', Arial, sans-serif; font-size:28px; font-weight:bold; line-height:22px; color:#feae39; text-transform:uppercase;">{{__("mail.order.title")}}</td>
                                </tr>
                                <tr>
                                    <td height="25" class="em_height">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="middle" align="center"
                                        style="font-family:'Open Sans', Arial, sans-serif; font-size:18px; font-weight:bold; line-height:22px; color:#feae39; text-transform:uppercase;">{{__("mail.order.subtitle")}}  </td>
                                </tr>
                                <tr>
                                    <td height="25" class="em_height">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="spacer">&emsp;</td>
                                </tr>
                                <tr>
                                    <td height="27" class="em_height">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top" align="center"
                                        style="font-family:'Open Sans', Arial, sans-serif; font-size:17px;line-height:22px; font-weight:bold; color:#30373b; text-transform:uppercase;">{{__("mail.order.review_order")}}</td>
                                </tr>
                                <tr>
                                    <td height="23" class="em_height">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td valign="top">
                                                    <table width="290" border="0" cellspacing="0" cellpadding="0"
                                                           align="left" class="em_wrapper" bgcolor="#f6f7f8">
                                                        <tr>
                                                            <td align="center" valign="middle" class="em_font1"
                                                                height="42"
                                                                style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#30373b; text-transform:uppercase;">
                                                                <span style="color:#feae39;">{{__("models.order.number")}}:</span>
                                                                {{ $order->number }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table width="290" border="0" cellspacing="0" cellpadding="0"
                                                           align="right" class="em_wrapper">
                                                        <tr>
                                                            <td valign="top" class="em_pad_top">
                                                                <table width="100%" border="0" cellspacing="0"
                                                                       cellpadding="0" bgcolor="#f6f7f8">
                                                                    <tr>
                                                                        <td align="center" valign="middle"
                                                                            class="em_font1" height="42"
                                                                            style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#30373b; text-transform:uppercase;">
                                                                            <span style="color:#feae39;">{{__("models.order.date")}} :</span> {{ $order->created_at->format('d/m/Y') }}
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                               bgcolor="#f6f7f8">
                                            <tr>
                                                <td width="25" class="em_space">&nbsp;</td>
                                                <td valign="top">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td height="12" style="font-size:1px; line-height:1px;">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="em_font1"
                                                                style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; line-height:20px; font-weight:bold; color:#feae39; text-transform:uppercase;">{{__("models.address.delivery")}}
                                                                : <span
                                                                    style=" color:#30373b;">{{$order->address->full_name}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top">
                                                                <table width="100%" border="0" cellspacing="0"
                                                                       cellpadding="0">
                                                                    <tr>
                                                                        <td align="left" width="180" class="em_hide">
                                                                            &nbsp;
                                                                        </td>
                                                                        <td valign="top">
                                                                            <table width="100%" border="0"
                                                                                   cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td height="10"
                                                                                        style="font-size:1px; line-height:1px;">
                                                                                        &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" class="em_font2"
                                                                                        style="font-family:'Open Sans', Arial, sans-serif; font-size:17px;line-height:20px; color:#30373b;">
                                                                                        {{$order->address->street}}   {{$order->address->number}}
                                                                                        <br>
                                                                                        @if($order->address->street_extra) {{$order->address->street_extra}}
                                                                                        <br> @endif
                                                                                        {{$order->address->zipcode}}   {{$order->address->city}}
                                                                                        <br>
                                                                                        {{$order->address->country}}
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td height="12" style="font-size:1px; line-height:1px;">
                                                                &nbsp;
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td width="25" class="em_space">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="25" class="em_height">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <tr style="text-align: left;">
                                                <th style="padding-bottom: 5px">{{__u("models.product.name")}}</th>
                                                <th>{{__u("models.cart.quantity")}}</th>
                                                <th>{{__u("models.product.color")}}</th>
                                                <th>{{__u("models.product.size")}}</th>
                                                <th>{{__u("models.cart.total")}}</th>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="spacer" style="padding-bottom: 5px">&emsp;</td>
                                            </tr>
                                            @foreach($order->orderlines as $orderLine)
                                                <tr>
                                                    <td style="padding-bottom: 5px">{{$orderLine->name}}</td>
                                                    <td>{{$orderLine->quantity}}</td>
                                                    <td>{{$orderLine->color}}</td>
                                                    <td>{{$orderLine->size}}</td>
                                                    <td>{{money(($orderLine->quantity ?? 1)  * $orderLine->unit_price)}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5"style="padding-bottom: 5px">&emsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" class="spacer" style="padding-bottom: 5px">&emsp;</td>
                                            </tr>

                                            <tr>
                                                <td colspan="3">&emsp;</td>
                                                <td><strong> {{__u("models.cart.total")}}</strong></td>
                                                <td> {{ money($order->total_inclusive) }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td>&emsp;</td></tr>
                                <tr><td>&emsp;</td></tr>
                        {{--
                                <tr>
                                    <td align="center"
                                        style="font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:22px; color:#30373b;">
                                        Feel free to review your invoice below or click the<br
                                            class="em_hide"/>
                                        button to view your account.
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top" align="center">
                                        <table width="210" border="0" cellspacing="0" cellpadding="0"
                                               align="center">
                                            <tr>
                                                <td valign="middle" align="center" height="45"
                                                    bgcolor="#feae39"
                                                    style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;">
                                                    <a href="#" target="_blank"
                                                       style="line-height:45px; display:block; color:#ffffff; text-decoration:none;">My
                                                        account</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="31" class="em_height">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    --}}
                    <!-- //THANK YOU SECTION -->
                </table>
            </td>
        </tr>
    </table>
@endsection
