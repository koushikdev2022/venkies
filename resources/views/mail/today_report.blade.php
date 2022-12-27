<!DOCTYPE html>
<html>

<head>
    <style>
        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .customers td,
        .customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .customers tr:hover {
            background-color: #ddd;
        }

        .heading {
            background-color: rgb(252, 8, 8);
            color: white;
            padding: 10px;
            font-weight: bold;
            text-align: center;

        }

        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        thead>tr>th {
            background-color: black !important;
            color: white;
        }
    </style>
</head>

<body>

<div>
    <div style="margin-bottom:10px">
        <div class="heading">
            Order Details
        </div>
        <table class="customers">
            <thead>
            <tr>
                <th width="70">Sno.</th>
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

            </tbody>
        </table>
    </div>
    <div style="margin-bottom:10px">
        <div class="heading">
            Indemand Product
        </div>
        <table class="customers">
            <thead>
            <tr>
                <th width="70">Sno.</th>
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
            </tbody>
        </table>
    </div>
    <div style="margin-bottom:10px">
        <div class="heading">
            Meeting Details
        </div>
        <table class="customers">
            <thead>
            <tr>
                <th width="70">Sno.</th>
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
                    <td>{{ $l->time?? '' }}</td>
                    <td>{{ $l->note ?? '' }}</td>
                </tr>

            @empty

            @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>

</html>
