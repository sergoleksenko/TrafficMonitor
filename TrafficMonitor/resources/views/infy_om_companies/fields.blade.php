<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Quota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quota', 'Quota:') !!}
    {!! Form::number('quota', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('infyOmCompanies.index') !!}" class="btn btn-default">Cancel</a>
</div>
