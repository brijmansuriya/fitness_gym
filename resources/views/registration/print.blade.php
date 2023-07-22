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
                <strong>Registration No :</strong> {{ $registration->registration_no }}
            </div>
            <div style="width:25%; float:left;">
                <strong>Date : </strong> {{ $registration->payment->start_date }}
            </div>
            <div style="width:25%; float:left;">
                <strong>Months :</strong> {{$registration->months}}
            </div>
            <div style="width:50%; float:left;">
                <strong>Name : </strong> {{ $registration->name }}
            </div>
            <div style="width:50%; float:left;">
                @php
                $num = new \NumberToWords\NumberToWords();
                @endphp
                <strong>Amount : </strong> ₹ {{ number_format($registration->payment->amount) }} <strong>(
                    {{ ucwords($num->getNumberTransformer('en')->toWords($registration->payment->amount)).' Only' }} )</strong>
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
                    <td><strong>Registration No :</strong> {{ $registration->registration_no }}</td>
                    <td><strong>Date : </strong> {{ $registration->payment->start_date }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Months :</strong> {{$registration->months}}</td>
                </tr>
                <tr>
                    <td><strong>Name : </strong> {{ $registration->name }}</td>
                    @php
                        $num = new \NumberToWords\NumberToWords();
                    @endphp
                    <td><strong>Amount : </strong> ₹ {{ number_format($registration->payment->amount) }} <strong>( {{ ucwords($num->getNumberTransformer('en')->toWords($registration->payment->amount)).' Only' }} )</strong></td>
                </tr>
                <tr>
                    <td style="v-align:top;"> <strong> Note: </strong> </td>
                    <td style="text-align: right; padding-top: 10px;"> <br/><br/><br/><strong> Signature </strong></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>