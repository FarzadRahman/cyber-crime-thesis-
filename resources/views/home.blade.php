@extends('main')

@section('css')

    {{--<style href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></style>--}}
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">


@endsection
@section('content')
    <div class="container-fluid">
        {{--<div class="row">--}}
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">


                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th width="70%">Title</th>
                            <th width="20%">User</th>
                            <th width="10%">Created At</th>
                            <th width="10%">action</th>

                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>



                </div>
            </div>
        </div>
    {{--</div>--}}

@endsection
@section('foot-js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        // $(document).ready(function() {
        //     $('#example').DataTable();
        // } );

        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            table =  $('#example').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                "ajax":{
                    "url": "{!! route('posts.getData') !!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [
                    { data: 'title', name: 'title'},
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { "data": function(data){
                        return '<a class="btn btn-default btn-sm" data-panel-id="'+data.postId+'"onclick="editPost(this)"><i class="fa fa-edit"></i></a>';},
                        "orderable": false, "searchable":false }

                ]
            });
        });



        function editPost(x) {
            btn = $(x).data('panel-id');
            var url = '{{route("post.getSingle", ":id") }}';
            //alert(url);
            var newUrl=url.replace(':id', btn);
            window.location.href = newUrl;
        }
    </script>

@endsection
