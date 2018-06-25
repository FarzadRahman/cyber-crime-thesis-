@extends('main')

@section('css')

    {{--<style href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></style>--}}
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">


@endsection
@section('content')
    <div class="container-fluid">
        {{--<div class="row">--}}
        <!-- Button to Open the Modal -->

            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">User Information</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div id="modalContent" class="modal-body">

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">


                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th width="15%">Title</th>
                        <th width="50%">Body</th>
                        <th width="10%">Email</th>
                        <th width="10%">Contact Number</th>
                        <th width="10%">Created At</th>
                        <th width="5%">Action</th>

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


        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            table =  $('#example').DataTable({
                "ordering": false,
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
                    { "data": function(data){
                            return '<button type="button" onclick="showIpModal('+data.contactId+')" class="btn btn-primary btn-sm">'+
                                    '<i class="fa fa-exclamation-circle"></i>' +
                                    '</button>'
                                ;}
                    }

                ]
            });
        });

        function showIpModal(id) {



            $.ajax({
                type: 'POST',
                url: "{!! route('Ip.get') !!}",
                cache: false,
                data: {_token: "{{csrf_token()}}",
                    'id': id},
                success: function (data) {
                    // console.log(data);
                    $("#modalContent").html(data);
                    $("#myModal").modal();

                }
            });
        }



    </script>

@endsection
