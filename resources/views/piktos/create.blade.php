@extends('template')

@section('content')

<div class="row">
    <div class="col-md-12">

        {!! Form::open(['route' => 'pikto.store', 'method' => 'POST', 'files' => true]) !!}

            <input name="image" type="file">

            <input class="btn btn-success" type="button" value="Add Title/Language" id="add">
            <input class="btn btn-danger" type="button" value="Remove Title/Language" id="remove" disabled="true">

            <ul id="titles">
                <li>
                    <label for="title0">Title:</label>
                    <input name="title[0][title]" type="text" id="title0" required="" value="{{old('title.0.title')}}">
                    <label for="lang0">Language:</label>
                    <input name="title[0][lang]" type="text" id="lang0" value="en" readonly="">
                </li>
            </ul>
            <input class="btn btn-primary" type="submit" value="Upload">

        {!! Form::close() !!}

    </div>
</div>

@endsection


@section('js')

<script>
    $(function(){
        $('#title0').focus();

        $('#add').click(function(){
            var n = $('#titles li').size();
            $('#titles').append($('<li>').append([
                $('<label for="title'+n+'">Title:</label>'),
                $('<input name="title['+n+'][title]" type="text" id="title'+n+'">'),
                $('<label for="lang'+n+'">Langugage:</label>'),
                $('<input name="title['+n+'][lang]" type="text" id="lang'+n+'">')
                ]));
            $('#title'+n+'').focus();
            $('#remove').prop('disabled', false);
        });

        $('#remove').click(function(){
            if ($('#titles li').size() > 0) {
                $('#titles li').last().remove();
                if ($('#titles li').size() < 2) {
                    $('#remove').prop('disabled', true);
                }
            }
        });
    });
</script>

@endsection
