<div class="form-group">
    {!! Form::label('orderStatus', 'Order Status') !!}
    {!! Form::select('orderStatus', $orderStatuses, $order->status->id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('notes', 'Update Reason') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
    @if($errors->has('notes'))
        <div class="alert alert-danger">
            Please enter a note!
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
</div>