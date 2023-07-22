<?php

namespace App\Domain\Datatables;

use App\Registration;
use App\Domain\Utility\Datatables\BaseDatatableScope;

class RagistrationDatatableScope extends BaseDatatableScope
{
    /**
     * AppDatatableScope constructor.
     */
    public function __construct()
    {
        $this->setHtml([
            [
                'data' => 'registration_no',
                'name' => 'registration_no',
                'title' => 'Registration No',
            ],
            [
                'data' => 'name',
                'name' => 'name',
                'title' => 'Name',
            ],
            [
                'data' => 'image',
                'name' => 'image',
                'title' => 'Image',
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
            [
                'data' => 'mobile_no',
                'name' => 'mobile_no',
                'title' => 'Mobile No',
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        $query = Registration::query()->orderBy('id', 'DESC');

        return datatables()->eloquent($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($model) {
                return view('shared.dtcontrols')
                    ->with('id', $model->getKey())
                    ->with('model', $model)
                    ->with('editUrl', route('registrations.edit', $model->getKey()))
                    ->with('deleteUrl', route('registrations.destroy', $model->getKey()))
                    ->with('printUrl', route('registrations.print', $model->getKey()))
                    ->render();
            })
            ->editColumn('image', function ($model) {
                return '<img src="'.$model->image_url.'" width="50">';
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
