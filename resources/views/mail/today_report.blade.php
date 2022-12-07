<!DOCTYPE html>
<html>
<head>
    <style>

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

        <table id="customers">

{{--                    @if(is_null($value['retailer']))--}}

                <thead>
                <tr>
                    <th colspan="4"> Retailer Details</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                </tr>
                </thead>
                @forelse($value['retailer'] as $r)
                    <tr>
                        <td>{{ $r->name??'' }}</td>
                        <td>{{ $r->email?? '' }}</td>
                        <td>{{ $r->phone?? '' }}</td>
                        <td>{{ $r->address?? '' }}</td>
                    </tr>
                @empty

                @endforelse

{{--            @endif--}}

{{--                    @if(is_null($value['order']) )--}}
            <tr><td colspan="4">&nbsp;</td></tr>
                <thead>
                <tr><th colspan="4"> Order Details</th></tr>
                <tr>
                    <th>User Name</th>
                    <th>Retailer Name</th>
                    <th>Product Name</th>
                    <th>Address</th>
                </tr>
                </thead>
                @forelse($value['order'] as $o)
                    <tr>
                        <td>{{ $o->cart_user->name?? '' }}</td>
                        <td>{{ $o->get_retailer->name?? '' }}</td>
                        <td>{{ $o->products->name?? '' }}</td>
                        <td>{{ $o->quantity?? '' }}</td>
                    </tr>
                    @empty

                @endforelse

{{--            @endif--}}

{{--                    @if(!is_null($value['indemand']) )--}}
            <tr><td colspan="4">&nbsp;</td></tr>
                            <thead>
                            <tr><th colspan="=4"> Indemand Details</th></tr>

                            <tr>
                                <th>Product Name</th>
                                <th>Source</th>
                                <th>Rate</th>
                                <th>Trend</th>
                            </tr>
                            </thead>
                            @forelse($value['indemand'] as $i)

                                <tr>
                                    <td>{{ $i->product_name ?? '' }}</td>
                                    <td>{{ $i->source_of_information ?? '' }}</td>
                                    <td>{{ $i->market_rate ?? '' }}</td>
                                    <td>{{ $i->market_trend ?? '' }}</td>
                                </tr>

                            @empty

                            @endforelse
{{--                        @endif--}}

            <tr><td colspan="4">&nbsp;</td></tr>
            <thead>
            <tr><th colspan="=4"> Meeting Details</th></tr>

            <tr>
                <th>Retailer Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>note</th>
            </tr>
            </thead>
            @forelse($value['list'] as $l)

                <tr>
                    <td>{{ $l->get_retailer->name ?? '' }}</td>
                    <td>{{ date('d-M-Y',strtotime($l->date)) ?? '' }}</td>
                    <td>{{  $l->time?? '' }}</td>
                    <td>{{ $l->note ?? '' }}</td>
                </tr>

            @empty

            @endforelse
        </table>

</body>
</html>
