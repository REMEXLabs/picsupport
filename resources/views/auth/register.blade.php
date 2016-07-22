@extends('template')

@section('content')

<div class="row">
<form class="form-horizontal" method="POST" action="/auth/register">
{!! csrf_field() !!}
<fieldset>

<!-- Form Name -->
<legend>Register</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name:</label>
  <div class="col-md-5">
  <input  value="{{ old('name') }}" id="name" name="name" type="text" placeholder="Max Mustermann" class="form-control input-md" required="">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-Mail:</label>
  <div class="col-md-5">
  <input value="{{ old('email') }}" id="email" name="email" type="text" placeholder="example@mail.com" class="form-control input-md" required="">

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password:</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="password" class="form-control input-md" required="">

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password_confirmation">Confirm Password:</label>
  <div class="col-md-5">
    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="password" class="form-control input-md">

  </div>
</div>

<div class="form-group">
  <div class="col-md-5 col-md-offset-4">
    {!! app('captcha')->display(); !!}
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4 col-md-offset-4">
    <button id="" name="" class="btn btn-primary">Register</button>
  </div>
</div>

</fieldset>
</form>
</div>

@endsection
