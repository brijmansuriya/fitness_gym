<?php

namespace App\Domain\Utility\Datatables;

use Yajra\Datatables\Html\Builder;

abstract class BaseDatatableScopeWithoutActions
{
    /**
     * @var
     */
    protected $partialHtml;

    /**
     * @return mixed
     */
    abstract public function query();

    /**
     * @param null $url
     *
     * @return array
     */
    public function html($url = null)
    {
        $columns = array_merge([
            [
                'data' => 'DT_RowIndex',
                'name' => 'id',
                'title' => '#',
                'searchable' => false
            ],
        ],
        $this->partialHtml
        );

        /**
         * @var Builder
         */
        $builder = app('datatables.html');

        return $builder->columns($columns)
            ->ajax($url ?: request()->fullUrl())
            ->parameters([
                'order' => [
                    0, // here is the column number
                    'desc'
                ]
            ]);
    }

    /**
     * @param array $html
     *
     * @return $this
     */
    public function setHtml(array $html)
    {
        $this->partialHtml = $html;

        return $this;
    }
}
