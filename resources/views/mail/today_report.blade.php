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

                    @if(is_null($value['retailer']))
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

            @endif

                    @if(is_null($value['order']) )
                <thead>
                <tr>
                    <th colspan="4"> order Details</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                </tr>
                </thead>
                @forelse($value['order'] as $o)
                    <tr>
                        <td>{{ $o->retailer?? '' }}</td>
                        <td>{{ $o->product?? '' }}</td>
                        <td>{{ $r->quantity?? '' }}</td>
                    </tr>
                    @empty

                @endforelse

            @endif

                    @if(!is_null($value['leave']) )
                        <thead>
                        <tr>
                            <th colspan="4"> Leave</th>
                        </tr>
                        <tr>
                            <th>From date</th>
                            <th>To Date</th>
                            <th>Type</th>
                            <th>Cause</th>
                        </tr>
                        </thead>
                        @forelse($value['leave'] as $l)

                            <tr>
                                <td>{{ date('d-M-Y',strtotime( $l->from)) ?? '' }}</td>
                                <td>{{ date('d-M-Y',strtotime( $l->to)) ?? '' }}</td>
                                <td>{{ $l->type ?? '' }}</td>
                                <td>{{ $l->cause ?? '' }}</td>
                            </tr>

                            @empty

                        @endforelse
                    @endif

                    @if(!is_null($value['indemand']) )
                            <thead>
                            <tr>
                                <th colspan="4"> In Demand Product</th>
                            </tr>
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
                        @endif

        </table>

</body>
</html>
