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
                        <th width="20%">Title</th>
                        <th width="50%">Body</th>
                        <th width="10%">Email</th>
                        <th width="10%">Contact Number</th>
                        <th width="10%">Created At</th>

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
                    "url": "{!! route('contact.getData') !!}",
                    "type": "POST",
                    data:function (d){
                        d._token="{{csrf_token()}}";
                    },
                },
                columns: [
                    { data: 'title', name: 'title'},
                    { data: 'body', name: 'body' },
                    { data: 'personEmail', name: 'personEmail' },
                    { data: 'personNumber', name: 'personNumber' },
                    { data: 'created_at', name: 'created_at' },

                ]
            });
        });



    </script>

@endsection
