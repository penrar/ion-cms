<div class="form-group">
    {!! Form::label('address1', 'Address') !!}
    {!! Form::text('address1', null, ['class' => 'form-control']) !!}
    @if($errors->has('address1'))
        <div class="alert alert-danger">
            Please enter an address!
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('address2', 'Address 2') !!}
    {!! Form::text('address2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', 'City') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
    @if($errors->has('city'))
        <div class="alert alert-danger">
            Please enter a city!
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('state', 'State') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
    @if($errors->has('state'))
        <div class="alert alert-danger">
            Please enter a state!
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('zip_code', 'ZIP Code') !!}
    {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
    @if($errors->has('zip_code'))
        <div class="alert alert-danger">
            Please enter a zip code!
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'form-control btn btn-primary']) !!}
</div>