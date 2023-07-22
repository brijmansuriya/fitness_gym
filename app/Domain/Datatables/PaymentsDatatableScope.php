<?php

namespace App\Domain\Datatables;

use App\Registration;
use App\Domain\Utility\Datatables\BaseDatatableScope;

class PaymentsDatatableScope extends BaseDatatableScope
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
                'data' => 'mobile_no',
                'name' => 'mobile_no',
                'title' => 'Mobile No',
            ],
            [
                'data' => 'date',
                'name' => 'date',
                'title' => 'Joining Date',
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
        $query = Registration::query()->select([
                        'id', 'name', 'mobile_no', 'date', 'end_date', 'image', 'months',
                        \DB::raw('DATEDIFF(end_date,CURDATE()) as diff_date'),
                    ]);

        if (request()->has('expired')) {
            $query->where(\DB::raw('DATEDIFF(end_date,CURDATE())'), '<', 0);
        } else {
            $query->where(\DB::raw('DATEDIFF(end_date,CURDATE())'), '<=', 5)
                    ->where(\DB::raw('DATEDIFF(end_date,CURDATE())'), '>=', 0);
        }

        return datatables()->eloquent($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($model) {
                return view('shared.dtcontrols')
                    ->with('id', $model->getKey())
                    ->with('model', $model)
                    ->with('payment', route('payments.renew', $model->getKey()))
                    // ->with('deleteUrl', route('registrations.destroy', $model->getKey()))
                    ->render();
            })
            ->editColumn('image', function ($model) {
                return '<img src="'.$model->image_url.'" width="50">';
            })
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }
}
