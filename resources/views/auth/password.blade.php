@extends('template')

@section('content')

<div class="row">
<form class="form-horizontal" method="POST" action="/password/email">
{!! csrf_field() !!}
<fieldset>

<!-- Form Name -->
<legend>Reset Password</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">E-mail:</label>  
  <div class="col-md-6">
  <input value="{{ old('email') }}" id="email" name="email" type="text" placeholder="example@mail.com" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button  type="submint" id="" name="" class="btn btn-primary">Send Password Reset Link!</button>
  </div>
</div>

</fieldset>
</form>
</div>

@endsection
