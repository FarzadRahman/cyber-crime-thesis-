@extends('main')
@section('css')
    {{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}
    {{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">--}}

@endsection
@section('content')
    <div class="container">
        <div class="row" >
            <form method="post" action="{{route('post.insert')}}" style="text-align: center">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$post->postId}}">
                <div class="col-md-12">
                    <div class="form-group">
                        <label><b>Title</b></label>
                        <input type="text" name="title" placeholder="post title goes here" class="form-control" value="{{$post->title}}">
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="form-group" style="">
                        <label><b>Details</b></label>

                        <textarea name="details">
                            {{$post->details}}

                        </textarea>
                    </div>
                </div>

                <div class="col-md-12">

                    <button type="submit" class="btn btn-success pull-right">Update</button>
                </div>

            </form>




        </div>
    </div>







@endsection
@section('foot-js')
    <script src="{{url('public/js/tinymce.min.js')}}"></script>
    <script src="{{url('public/js/plugins/filemanager/plugin.min.js')}}"></script>

    <script>
        tinymce.init({
            selector: "textarea",theme: "modern",width: 680,height: 300,
            relative_urls : false,
            remove_script_host: false,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking save fullscreen",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"

            ],
//            plugins: [
//                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
//                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
//                "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
//            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code emoticons",
            //toolbar3: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
            image_advtab: true ,

            external_filemanager_path:"/cktest/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "/cktest/filemanager/plugin.min.js"}
        });
    </script>

@endsection







