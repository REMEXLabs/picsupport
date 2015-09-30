@extends('template')

@section('content')

<div class="row">
<form class="form-horizontal"  method="POST" action="/auth/login">
 {!! csrf_field() !!}
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-Mail:</label>  
  <div class="col-md-5">
  <input id="email" name="email" type="text" placeholder="example@mail.com" class="form-control input-md" required="" value="{{ old('email') }}">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password:</label>
  <div class="col-md-5">
    <input id="password" name="password" type="password" placeholder="Enter here!" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="-0">
      <input type="checkbox" name="" id="-0" value="remember">
      Remember Me
    </label>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type="submit" id="" name="" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>
</div>


@endsection
