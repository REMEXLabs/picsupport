@extends('template')

@section('content')

<div class="row">
    <div class="col-md-12">

        <h1>Upload a Pikto</h1>

        {!! Form::open(['route' => 'pikto.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal']) !!}

            <fieldset>

            <!-- Form Name -->
            <legend>Upload a new Pikto</legend>

            <!-- File Button -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="image">Pikto File</label>
              <div class="col-md-4">
                <input id="image" name="image" class="input-file" type="file">
              </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="add"></label>
              <div class="col-md-8">
                <input type="button" id="add" name="add" class="btn btn-success" value="Add Title/Language">
                <input type="button" id="remove" name="remove" class="btn btn-danger" value="Remove Title/Language" disabled="true">
              </div>
            </div>

            <!-- Text input-->
            <!-- Prepended text-->
            <div id="titles">
                <div class="form-group">
                  <label class="col-md-2 control-label" for="title0">Titles:</label>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">Title</span>
                      <input name="title[0][title]" type="text" id="title0" required="" value="{{old('title.0.title')}}" class="form-control" placeholder="Title">
                    </div>
                    <p class="help-block">What does your Pikto show?</p>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">Language</span>
                      <input name="title[0][lang]" type="text" id="lang0" value="en" readonly="" class="form-control" placeholder="en">
                    </div>
                    <p class="help-block">Title language</p>
                  </div>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="upload"></label>
              <div class="col-md-4">
                <button id="upload" name="upload" class="btn btn-primary">Upload</button>
              </div>
            </div>

            </fieldset>


            <ul id="titles">
                {{-- <li>
                    <label for="title0">Title:</label>
                    <input name="title[0][title]" type="text" id="title0" required="" value="{{old('title.0.title')}}">
                    <label for="lang0">Language:</label>
                    <input name="title[0][lang]" type="text" id="lang0" value="en" readonly="">
                </li> --}}
            </ul>

        {!! Form::close() !!}

    </div>
</div>

@endsection


@section('js')

<div class="form-group" id="template" style="display: none;" aria-hidden="true">
  <label class="col-md-2 control-label" for="">Titles:</label>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Title</span>
      <input name="" type="text" id="" required="" class="form-control" placeholder="Title">
    </div>
    <p class="help-block">What does your Pikto show?</p>
  </div>
  <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon">Language</span>
      <input name="" type="text" id="" readonly="" class="form-control" placeholder="Language">
    </div>
    <p class="help-block">Title language</p>
  </div>
</div>

<script>
    $(function(){
        activateTitleInputs();
    });
</script>

@endsection
