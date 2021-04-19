@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Edit Question</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="{{ asset('js/admin/select2/dist/css/select2.css') }}" rel="stylesheet">
@endsection
@section('contain')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Question</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {{--amra jodi update dete chaitam tahole amader from er mordhee action deye krte hoto (amra ajax deye krbo tai r lage na)--}}
                    {{--Update by ajax--}}
                    <form action="" method="post" id="question_form" class="form-horizontal form-label-left" novalidate="">
                        @csrf
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="title" name="title"
                                       value="{{$question->title}}"
                                       class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Enter Title" required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="category" class="form-control col-md-7 col-xs-12">
                                    <option value="">----Select Category----</option>
                                    {{--Category Loop--}}
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{$question->category_id==$category->id?'selected':''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Tag <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="tag[]" id="tag" class="form-control col-md-7 col-xs-12" multiple>
                                    {{--Tag Loop--}}
                                    @foreach($tags as $tag)
                                        {{--import==php akta bulding method ase =in_array name=jodi multiple select hoy--}}
                                        <option value="{{ $tag->id }}" {{in_array($tag->id,$tag_array)?'selected':''}}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="description" required="required" name="description" class="form-control col-md-7 col-xs-12">
                                    {{$question->description}}
                                </textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{ asset('js/admin/select2/dist/js/select2.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
       $(function(){
           $("#tag").select2();
           //For update question
           $("#question_form").submit(function (event) {
               event.preventDefault();
               Swal.fire({
                   title: 'Are you sure?',
                   text: "Do you want to update the question!",
                   type: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: 'Yes, update it!'
               }).then(function(result){
                   if (result.value) {
                     var form=$("#question_form")[0];//mone ase oi var form=$("this")[0] deleow hoto;
                     var formData=new FormData(form);
                     var url="{{url('update/question')}}"+"/"+"{{$question->id}}";
                     $.ajax({
                         url:url,
                         type:"POST",
                         data:formData,
                         dataType:"json",
                         contentType:false,
                         processData:false,
                         beforeSend:function () {
                             Swal.fire({
                                 title: 'Updating the data.....',
                                 html:"<i class='fa fa-spinner fa-spin' style='font-size: 24px;'></i>",
                                 confirmButtonColor: '#3085d6',
                                 allowOutSideClick:false,
                                 showCancelButton:false,
                                 showConfirmButton:false
                             });
                         },
                         success:function (response) {
                             Swal.close();
                             if(response==="success") {
                                 Swal.fire({
                                     title:'success',
                                     text: 'You Have Successfully Question Updated',
                                     type:'success',
                                     confirmButtonText: 'OK'
                                 }).then(function(result){
                                     if (result.value) {
                                         window.location.reload();
                                     }
                                 });
                             }
                             console.log(response)
                         },
                         error:function (error) {
                             Swal.fire({
                                 title: 'Error',
                                 text:'Something Went Wrong',
                                 type:'error',
                                 showConfirmButton: true
                             });
                             console.log(error);
                         }

                     });
                 }
              });
           })
       });
    </script>
@endsection