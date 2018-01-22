<div class="card col-md mt-4 order-md-1">
    <h4 class="mb-3 mt-3">User Editor</h4>
    {{ Form::open(array('class' => 'form')) }}

    <div class="form-group">
        {!! Form::label('Firstame') !!}
        {!! Form::text('name', null,
        array('required',
        'class'=>'form-control',
        //'placeholder'=>'Your name'
        )) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Lastame') !!}
        {!! Form::text('name', null,
        array('required',
        'class'=>'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('E-mail Address') !!}
        {!! Form::text('email', null,
        array('required',
        'class'=>'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('phone') !!}
        {!! Form::text('phone', null,
        array('required',
        'class'=>'form-control')) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Save',
        array('class'=>'btn btn-success')) !!}
    </div>
    {!! Form::close() !!}
</div>

</div>