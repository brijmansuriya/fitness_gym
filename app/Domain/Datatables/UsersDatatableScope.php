<?php

namespace App\Domain\Datatables;

use App\User;
use App\Domain\Utility\Datatables\BaseDatatableScope;

class UsersDatatableScope extends BaseDatatableScope
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
                'data' => 'email',
                'name' => 'email',
                'title' => 'Email',
            ],
            [
                'data' => 'image',
                'name' => 'image',
                'title' => 'Image',
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
        $query = User::query();

        return datatables()->eloquent($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($model) {
                return view('shared.dtcontrols')
                    ->with('id', $model->getKey())
                    ->with('model', $model)
                    ->with('editUrl', route('users.edit', $model->getKey()))
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
