@extends('main')
@section('css')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
    {{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

@endsection
@section('content')
<div class="container">
   <div class="row">

       <div class="col-md-12">
           <div class="form-group">
               <label><b>Title</b></label>
               <input type="text" placeholder="post title goes here" class="form-control">
           </div>
       </div>
<br>
       <div class="col-md-12">
           <div class="form-group" style="height: 500px">
               <label><b>Details</b></label>
               <textarea id="summernote" name="editordata" placeholder="description" ></textarea>
           </div>
       </div>




   </div>
</div>







@endsection
@section('foot-js')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@endsection







