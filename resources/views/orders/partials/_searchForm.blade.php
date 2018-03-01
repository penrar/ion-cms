<div class="col-lg-5">
    <div class="form-group">
        <input type="text"
               tabindex="0"
               @if(isset($input))
                       value="{{ $input }}"
               @endif
               placeholder="Search by customer name..."
               name="search"
               class="form-control">
    </div>
</div>

<div class="col-lg-2">
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
</div>
