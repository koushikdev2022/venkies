<!DOCTYPE html>
<html>
<head>
    <style>

    </style>
</head>
<body>

        <table id="customers">

{{--                    @if(is_null($value['retailer']))--}}

                <thead>
                <tr><th colspan="=4"> Retailers</th></tr>
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
                <thead>
                <tr><th colspan="=4"> Order Details</th></tr>

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
                            <thead>
                            <tr><th colspan="=4"> Indemand Details</th></tr>
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
{{--                        @endif--}}

        </table>

</body>
</html>
