@extends('template')

@section('breadcrumbs')
<ol class="breadcrumb">
  <li><a href="/pikto">Piktos</a></li>
  <li><a href="/pikto/{{$pikto->id}}">{{$pikto->title}}</a></li>
  <li class="active">Update</li>
</ol>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">

        <h1>Update "{{$pikto->title}}"</h1>

        <img src="" alt="{{$pikto->title}}" id="preview">

        {!! Form::model($pikto, ['route' => array('pikto.update', $pikto->id), 'method' => 'put', 'class' => 'form-horizontal', 'files' => true]) !!}

            <fieldset>

            <!-- Form Name -->
            <legend>New titles or image for "{{$pikto->title}}"</legend>

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
                <div class="form-group" id="status-indicator">
                  <label class="col-md-2 control-label"></label>
                  <div class="col-md-10">
                    <span class="glyphicon glyphicon-hourglass spinning"></span> Loading titles...
                  </div>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="update"></label>
              <div class="col-md-4">
                <button id="update" name="update" class="btn btn-primary" disabled="">Update</button>
              </div>
            </div>

            </fieldset>

        {!! Form::close() !!}

    </div>
</div>

@endsection


@section('js')

<div class="form-group" id="template" style="display: none;" aria-hidden="true">
  <label class="col-md-2 control-label" for="">Title:</label>
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
      <input name="" type="text" id="" class="form-control" placeholder="Language">
    </div>
    <p class="help-block">Title language</p>
  </div>
</div>

<script>
    $(function(){
        activateTitleInputs();

        var $res = $.res('https://res.openurc.org/');
        $res.queries()
            .addQuery()
                .setStart('1')
                .setCount('1')
                .addProp('http://openurc.org/ns/res#name', '{{$pikto->name}}')
                .complete()
            .send()
            .done(function(responses){
                console.log(responses);

                var pikto = responses.firstResponse().firstResource();
                var uri = pikto.globalAts[0];

                var titles = titlesFromPikto(pikto);

                $.each(titles, function(idx, title){
                    var $template = createFilledTemplate(idx, title.title,
                        title.lang, title.lang === 'en');
                    $('#titles').append($template);
                });

                $('#preview').prop('src', uri);
                $('#status-indicator').remove();
                $('#update').removeAttr('disabled');
                $('#remove').prop('disabled', titles.length <= 1);

                console.log(pikto);
            }).fail(function(response){
                console.log(response.error);
                console.log(response.status);
                $('#status-indicator')
                    .addClass('alert alert-danger')
                    .html('<b>Failed to load Pikto data.</b>');
            });
    });
</script>

@endsection
