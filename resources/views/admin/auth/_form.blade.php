<div class="form-group">
    {!! Form::label('email', 'Email:') !!}<br>
    {!! Form::email("email", null, array()); !!}<br>
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:') !!}<br>
    {!! Form::password('password', null, ['class' => 'form-control']) !!}<br>
</div>
