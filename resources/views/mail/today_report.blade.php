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
        #heading {
            background-color: black;
            color:white;
        }

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



{{--                    @if(is_null($value['retailer']))--}}

{{--                <thead>--}}
{{--                <tr id="heading">--}}
{{--                    <th colspan="4"> Retailer Details</th>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Name</th>--}}
{{--                    <th>Email</th>--}}
{{--                    <th>Mobile</th>--}}
{{--                    <th>Address</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                @forelse($value['retailer'] as $r)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $r->name??'' }}</td>--}}
{{--                        <td>{{ $r->email?? '' }}</td>--}}
{{--                        <td>{{ $r->phone?? '' }}</td>--}}
{{--                        <td>{{ $r->address?? '' }}</td>--}}
{{--                    </tr>--}}
{{--                @empty--}}

{{--                @endforelse--}}

{{--            @endif--}}

{{--                    @if(is_null($value['order']) )--}}
<table id="customers">
                <thead>
                <tr id="heading" ><th colspan="5"> Order Details</th></tr>
                <tr>
                    <td>S.no</td>
                    <th>User Name</th>
                    <th>Retailer Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                </tr>
                </thead>
        <tbody>
                @forelse($value['order'] as $key=> $o)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $o->cart_user->name?? '' }}</td>
                        <td>{{ $o->get_retailer->name?? '' }}</td>
                        <td>{{ $o->products->name?? '' }}</td>
                        <td>{{ $o->quantity?? '' }}</td>
                    </tr>
                    @empty

                @endforelse
            <tr> <td colspan=5>&nbsp;</td></tr>
        </tbody>
</table>
{{--            @endif--}}

{{--                    @if(!is_null($value['indemand']) )--}}
                        <table>
                            <thead>
                                <tr id="heading"><th colspan="6"> Indemand Details</th></tr>

                                <tr>
                                    <th> S.no</th>
                                    <th>Product Name</th>
                                    <th>Source</th>
                                    <th>Rate</th>
                                    <th>Date</th>
                                    <th>Note</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($value['indemand'] as $key=> $i)

                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $i->product_name ?? '' }}</td>
                                    <td>{{ $i->source_of_information ?? '' }}</td>
                                    <td>{{ $i->market_rate ?? '' }}</td>
                                    <td>{{ date('d-M-Y',strtotime($i->created_at)) ?? 'N/A' }}</td>
                                    <td>{{ $i->note ?? 'N/A' }}</td>
                                    <td>{{ $i->address ?? 'N/A' }}</td>
                                </tr>

                            @empty

                            @endforelse

                             <tr><td colspan="6">&nbsp;</td></tr>
                            </tbody>
                        </table>
        <table>
            <thead>
            <tr id="heading"><th colspan="5"> Meeting Details</th></tr>

            <tr>
                <th>S.no</th>
                <th>Retailer Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>note</th>
            </tr>
            </thead>
            <tbody>
            @forelse($value['list'] as $key=> $l)

                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $l->get_retailer->name ?? '' }}</td>
                    <td>{{ date('d-M-Y',strtotime($l->date)) ?? '' }}</td>
                    <td>{{  $l->time?? '' }}</td>
                    <td>{{ $l->note ?? '' }}</td>
                </tr>

            @empty

            @endforelse
            </tbody>
        </table>

</body>
</html>
