<div class="form-group">
    {!! Form::label('orderStatus', 'Order Status') !!}
    {!! Form::select('orderStatus', $orderStatuses) !!}
</div>

<div class="form-group">
    {!! Form::label('notes', 'Update Reason') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>