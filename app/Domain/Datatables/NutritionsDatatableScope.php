<?php

namespace App\Domain\Datatables;

use App\Domain\Utility\Datatables\BaseDatatableScope;
use App\Nutrition;

class NutritionsDatatableScope extends BaseDatatableScope
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
                'title' => 'Nutrition',
            ],
            [
                'data' => 'amount',
                'name' => 'amount',
                'title' => 'Amount',
            ],
            [
                'data' => 'detail',
                'name' => 'detail',
                'title' => 'Detail',
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        $query = Nutrition::query()->orderBy('id', 'DESC');

        return datatables()->eloquent($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($model) {
                return view('shared.dtcontrols')
                    ->with('id', $model->getKey())
                    ->with('model', $model)
                    ->with('editUrl', route('nutritions.edit', $model->getKey()))
                    ->with('deleteUrl', route('nutritions.destroy', $model->getKey()))
                    ->with('printUrl', route('nutritions.print', $model->getKey()))
                    ->render();
            })
            ->filterColumn('end_date', function ($query, $keyword) {
                $query->where(\DB::raw('DATE_FORMAT(end_date,"%d-%m-%Y")'), 'like', "%$keyword%");
            })
            ->filterColumn('date', function ($query, $keyword) {
                $query->where(\DB::raw('DATE_FORMAT(date,"%d-%m-%Y")'), 'like', "%$keyword%");
            })
            ->rawColumns(['actions', 'image'])
            ->make(true);
    }
}
