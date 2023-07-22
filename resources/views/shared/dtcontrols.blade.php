@if(isset($deleteUrl))
    {{ Form::open(array('url' => $deleteUrl, 'method' => 'DELETE','class'=>'dt-delete-form')) }}
        {!!
            Form::button('<i class="fa fa-trash"></i>', array('class' => 'btn btn-red-text icon-rounded','data-id'=>$id,'onclick'=>"return confirm('Are you sure you want to delete this record?');",'type'=>'submit'))
        !!}
@else
    {{ Form::open(array('url' => '', 'method' => '','class'=>'')) }}
@endif

@if(isset($editUrl))
    <a href="{!! $editUrl !!}" class="btn btn-blue-text icon-rounded" title="Edit">
        <i class="fa fa-edit"></i>
    </a>
@endif

@if(isset($printUrl))
    <a href="{!! $printUrl !!}" class="btn btn-blue-text icon-rounded" title="Print">
        <i class="fa fa-print"></i>
    </a>
@endif

@if(isset($payment))
    <a href="javascript:void(0)" data-href="{!! $payment !!}" data-month="{!!$model->months!!}" data-name="{!!$model->name!!}" data-image="{!!$model->image_url!!}" class="btn btn-blue-text icon-rounded payment-renew" title="Renew Payment">
        Renew
    </a>
@endif

@if(isset($showUrl))
    <a href="{!! $showUrl !!}" class="btn btn-blue-text icon-rounded" title="View">
        <i class="fa fa-eye"></i>
    </a>
@endif

{{ Form::close() }}
