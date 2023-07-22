<?php

namespace App\Domain\Datatables;

use App\Payment;
use Carbon\Carbon;
use App\Domain\Utility\Datatables\BaseDatatableScopeWithoutActions;

class ReportsDatatableScope extends BaseDatatableScopeWithoutActions
{
    /**
     * AppDatatableScope constructor.
     */
    public function __construct()
    {
        $this->setHtml([
            [
                'data' => 'name',
                'name' => 'name',
                'title' => 'Name',
            ],
            [
                'data' => 'amount',
                'name' => 'amount',
                'title' => 'Amount',
            ],
            [
                'data' => 'start_date',
                'name' => 'start_date',
                'title' => 'Start Date',
            ],
            [
                'data' => 'end_date',
                'name' => 'end_date',
                'title' => 'End Date',
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        $startDate = Carbon::now()->subMonths(1)->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d');
        if (request()->get('start_date')) {
            $startDate = Carbon::parse(request()->get('start_date'))->format('Y-m-d');
        }
        if (request()->get('end_date')) {
            $endDate = Carbon::parse(request()->get('end_date'))->format('Y-m-d');
        }

        $query = Payment::query()->select([
                            'payments.*',
                            'registrations.name',
                        ])
                        ->join('registrations', 'registrations.id', '=', 'payments.registration_id');

        $query->whereDate('start_date', '>=', $startDate);
        $query->whereDate('start_date', '<=', $endDate);
        $query->whereNull('registrations.deleted_at');

        $query = $query->groupBy('payments.id');

        return datatables()->eloquent($query)
            ->addIndexColumn()
            ->filterColumn('name', function ($query, $keyword) {
                $query->where('registrations.name', 'like', "%$keyword%");
            })
            ->filterColumn('start_date', function ($query, $keyword) {
                $query->where(\DB::raw('DATE_FORMAT(payments.start_date,"%d-%m-%Y")'), 'like', "%$keyword%");
            })
            ->filterColumn('end_date', function ($query, $keyword) {
                $query->where(\DB::raw('DATE_FORMAT(payments.end_date,"%d-%m-%Y")'), 'like', "%$keyword%");
            })
            ->make(true);
    }
}
