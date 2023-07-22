<html>
    <head>
        <style>
            table{
                border: 1px solid black;
            }
            td{
                padding: 10px 5px;
            }
        </style>
    </head>
    <body>
        {{-- <div style="border: 1px solid black; position: relative; line-height: 2; padding:0 10px;">
            <img src="{{asset('/back/images/fitness.png')}}" width="200"
                style="position: absolute; left: 1160px; top: 80px; opacity: 0.2;">
            <center>
                <h1><img src="{{asset('/back/images/fitness.png')}}" width="50"> Fitness Point Gym</h1>
                Mahuva Road, Savarkundla. Mo- 94290 75721 / 95741 66656
            </center>
            <div style="width:50%; float:left;">
                <strong>Registration No :</strong> {{ $nutrition->registration_no }}
            </div>
            <div style="width:25%; float:left;">
                <strong>Date : </strong> {{ $nutrition->payment->start_date }}
            </div>
            <div style="width:25%; float:left;">
                <strong>Months :</strong> {{$nutrition->months}}
            </div>
            <div style="width:50%; float:left;">
                <strong>Name : </strong> {{ $nutrition->name }}
            </div>
            <div style="width:50%; float:left;">
                @php
                $num = new \NumberToWords\NumberToWords();
                @endphp
                <strong>Amount : </strong> ₹ {{ number_format($nutrition->payment->amount) }} <strong>(
                    {{ ucwords($num->getNumberTransformer('en')->toWords($nutrition->payment->amount)).' Only' }} )</strong>
            </div>
            <div style="width:70%; float:left; height: 100px;">
                Note :
            </div>
            <div style="width:30%; float:left; height: 100px; padding-top: 70px; box-sizing: border-box;">
                Signature
            </div>
            <div style="clear:both;"></div>
        </div> --}}
        <table width="100%">
            <tbody>
                <tr>
                    <th colspan="4" style="text-align:center;"><h1><img src="{{asset('/back/images/fitness.png')}}" width="50"> Fitness Point Gym</h1></th>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center;">Mahuva Road, Savarkundla. Mo- 94261 10910 / 95741 66656</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Name :</strong> {{ $nutrition->name }}</td>
                    <td colspan="2"><strong>Amount : </strong> {{ $nutrition->amount }}</td>
                </tr>
                <tr>
                    <td colspan="4"><strong>Detail : </strong> {{ $nutrition->detail }}</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>