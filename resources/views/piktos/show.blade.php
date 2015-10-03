@extends('template')

@section('content')

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

<img src="" alt="" id="preview" style="border:3px solid red;">

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

                console.log(pikto);
            }).fail(function(response){
                console.log(response.error);
                console.log(response.status);
            });

    });
</script>

@endsection
