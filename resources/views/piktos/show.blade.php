@extends('template')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{$pikto->title}}</h1>

        <p><a href="/pikto/{{$pikto->id}}/edit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a></p>

        <table class="table table-hover" id="props">
        <thead>
            <th>Name</th>
            <th>Value</th>
        </thead>
        <tbody>

        </tbody>
        </table>

        <div id="status-indicator" class="text-center">
            <span class="glyphicon glyphicon-hourglass spinning"></span>
        </div>

        <img src="" alt="" id="preview" style="border:3px solid red;">
    </div>
</div>

@endsection

@section('js')

<script>
    $(function(){
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

                var proplist = $('#props tbody');

                $.each(pikto.props, function(idx, prop){

                    proplist.append($('<tr>').append(
                        [ $('<td>').html(prop.name),
                          $('<td>').html(prop.value) ]));

                });
                $('#preview').prop('src', uri);

                $('#status-indicator').remove();

                console.log(pikto);
            }).fail(function(response){
                console.log(response.error);
                console.log(response.status);
                $('#status-indicator')
                    .addClass('alert alert-danger')
                    .html('<b>Failed to load Pikto data.</b><br>' + response.error);
            });

    });
</script>

@endsection
