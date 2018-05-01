<div class="col-lg-5">
    <div class="form-group">
        <input type="text"
               tabindex="0"
               @if(isset($input['search']))
                       value="{{ $input['search'] }}"
               @endif
               placeholder="Search by customer name, company name, address, city, state or zip code..."
               name="search"
               class="form-control">

    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        {!!
            Form::select('searchType',
                ['contact' => 'Individuals', 'company' => 'Companies'],
                isset($input['type']) ? $input['type'] : 'contact',
                ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="col-lg-2">
    <div class="form-group">
        {!!
            Form::select('searchDirection',
                ['desc' => 'SLA Descending', 'asc' => 'SLA Ascending'],
                isset($input['direction']) ? $input['direction'] : 'desc',
                ['class' => 'form-control'])
        !!}
    </div>
</div>

<div class="col-lg-2">
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
</div>
