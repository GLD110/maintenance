<div class="input-group">
    {{ Form::text($name, (isset($value) ? $value : NULL), array('class'=>'form-control pickadate', 'placeholder'=>'Date')) }}
    <span class="input-group-btn">
        <button class="btn btn-default clear-field" type="button"><i class="fa fa-times"></i></button>
    </span>
</div>