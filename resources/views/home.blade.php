@extends('layouts.master')

@section('content')
<div class="col-lg-7 col-md-12">
    <div class="widget card">
        <div class="card-block">
            <h5 class="card-title">Monthly Overview <span class="month-list"></span></h5>
            <div class="row mrg-top-30">
                <div class="col-md-3 col-sm-6 col-6 border right border-hide-md">
                    <div class="text-center pdd-vertical-10">
                        <a href='{{route('registrations.index')}}'><h2 class="font-primary no-mrg-top total-registration"></h2>
                        <p class="no-mrg-btm">Total Registration</p></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 border right border-hide-md">
                    <div class="text-center pdd-vertical-10">
                        <a href='{{route('reports.index')}}'><h2 class="font-primary no-mrg-top">₹<span class="total-payment"></span></h2>
                        <p class="no-mrg-btm">Profit</p></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 border right border-hide-md">
                    <div class="text-center pdd-vertical-10">
                        <a href='{{route('nutritions.index')}}'><h2 class="font-primary no-mrg-top">₹<span class="nutrition-profit"></span></h2>
                        <p class="no-mrg-btm">Nutrition Profit</p></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6 border right border-hide-md">
                    <div class="text-center pdd-vertical-10">
                        <a href='{{route('payments.index')}}'><h2 class="font-primary no-mrg-top near-to-expire"></h2>
                        <p class="no-mrg-btm">Plan Near To Expire</p></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-6">
                    <div class="text-center pdd-vertical-10">
                        <a href='{{route('payments.index')}}'><h2 class="font-primary no-mrg-top expired"></h2>
                        <p class="no-mrg-btm">Plan Expired</p></a>
                    </div>
                </div>
            </div>
            <div class="row mrg-top-35">
                <div class="col-md-12">
                    <div>
                        <canvas id="line-chart" height="220"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-5 col-md-12">
    <div class="card">
        <div class="card-heading">
            <h4 class="card-title inline-block pdd-top-5">Recent Registration</h4>
            <a href="{{route('registrations.index')}}" class="btn btn-default pull-right no-mrg">All Registrations</a>
        </div>
        <div class="pdd-horizon-20 pdd-vertical-5">
            <div class="overflow-y-auto relative scrollable" style="max-height: 600px">
                <table class="table table-lg table-hover">
                    <tbody class="recent-registration">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection