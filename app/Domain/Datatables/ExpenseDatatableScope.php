<?php

namespace App\Domain\Datatables;

use App\Expense;
use App\Domain\Utility\Datatables\BaseDatatableScope;

class ExpenseDatatableScope extends BaseDatatableScope
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
                'data' => 'date',
                'name' => 'date',
                'title' => 'Date',
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        $query = Expense::query();

        return datatables()->eloquent($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($model) {
                return view('shared.dtcontrols')
                    ->with('id', $model->getKey())
                    ->with('model', $model)
                    ->with('editUrl', route('expense.edit', $model->getKey()))
                    ->with('deleteUrl', route('expense.destroy', $model->getKey()))
                    ->render();
            })
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }
}
