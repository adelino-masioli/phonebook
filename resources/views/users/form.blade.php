<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="form-group">
      <strong>Name:</strong>
      {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
  </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
  <div class="form-group">
      <strong>Email:</strong>
      {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
  </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
  <div class="form-group">
      <strong>Password:</strong>
      {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
  </div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6">
  <div class="form-group">
      <strong>Confirm Password:</strong>
      {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
  </div>
</div>
