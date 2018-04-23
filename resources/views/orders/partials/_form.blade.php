<div class="form-group">
    {!! Form::label('orderStatus', 'Order Status') !!}
    {!! Form::select('orderStatus', $orderStatuses, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('notes', 'Update Reason') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
</div>