<?php

namespace App\Http\Controllers;

use App\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Domain\Datatables\ReportsDatatableScope;
use App\Nutrition;
use App\Registration;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReportsDatatableScope $datatable)
    {
        if (request()->ajax()) {
            return $datatable->query();
        }

        $search = request()->all();

        return view('payments.report', [
            'html' => $datatable->html(),
            'search' => $search,
        ]);
    }

    public function dashboardSummary()
    {
        $date1 = Carbon::createFromDate('2019-08-26');
        $date2 = Carbon::createFromDate('2019-08-25');
        $month = Carbon::now()->diffInMonths($date1);
        $startDate = $date1->addMonths($month);
        $endDate = $date2->addMonths($month + 1);

        $payments = Payment::select([
                            'payments.*',
                            DB::raw('SUM(payments.amount) as total_amount'),
                            'registrations.name',
                        ])
                        ->join('registrations', 'registrations.id', '=', 'payments.registration_id')
                        ->whereDate('start_date', '>=', $startDate->format('Y-m-d'))
                        ->whereDate('start_date', '<=', $endDate->format('Y-m-d'))
                        ->whereNull('registrations.deleted_at')
                        ->first();

        $registrations = Registration::count();

        $nutritions = Nutrition::select([DB::raw('SUM(amount) as total_amount')])->whereDate(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), '>=', $startDate)
                        ->whereDate(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), '<=', $endDate)
                        ->first();

        $nearToExpire = Registration::whereDate(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), '>=', $startDate)
                        ->whereDate(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), '<=', $endDate)
                        ->where(\DB::raw('DATEDIFF(end_date,CURDATE())'), '<=', 5)
                        ->where(\DB::raw('DATEDIFF(end_date,CURDATE())'), '>', 0)
                        ->count();

        $expired = Registration::whereDate(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), '>=', $startDate)
                        ->whereDate(DB::raw('DATE_FORMAT(created_at,"%Y-%m-%d")'), '<=', $endDate)
                        ->where(\DB::raw('DATEDIFF(end_date,CURDATE())'), '<', 0)
                        ->count();

        return response()->json([
            'payment' => $payments->total_amount,
            'registrations' => $registrations,
            'nearToExpire' => $nearToExpire,
            'nutritions' => $nutritions->total_amount,
            'expired' => $expired,
            'start_date' => $startDate->format('d-m-Y'),
            'end_date' => $endDate->format('d-m-Y'),
        ]);
    }
}
