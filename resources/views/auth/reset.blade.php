@extends('template')

@section('content')

<div class="row">
<form class="form-horizontal" method="POST" action="/password/reset">
{!! csrf_field() !!}
<input type="hidden" name="token" value="{{ $token }}">

<fieldset>

<!-- Form Name -->
<legend>Reset Password</legend>

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
    <input id="password" name="password" type="password" placeholder="New Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password_confirmation">Confirm Password:</label>
  <div class="col-md-5">
    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="New Password (again)" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="">Reset Password:</label>
  <div class="col-md-4">
    <button type="submit" id="" name="" class="btn btn-primary">OK</button>
  </div>
</div>

</fieldset>
</form>
</div>

@endsection
