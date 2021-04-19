@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Question</h3>
    </div>
@endsection
@section('stylesheet')

@endsection
@section('contain')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <!-- CONTENT MAIL -->
                        <div class="col-sm-9 mail_view">
                            <div class="inbox-body">
                                <div class="mail_heading row">
                                    <div class="col-md-8">
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <button class="btn btn-md btn-info" type="button">Total Vote <span class="badge badge-danger">{{ isset($question->votes)?count($question->votes):0 }}</span></button>
                                                @if(!isset(Auth::user()->vote))
                                                    <a href="{{route('vote',$question->id)}}" class="btn btn-md btn-default" type="button"><i class="fa fa-star-o"></i> Vote?</a>
                                                @else
                                                    <button class="btn btn-md btn-success" type="button"><i class="fa fa-star"></i> Voted</button>
                                                    <a href="{{route('cancel.vote',$question->id)}}" class="btn btn-md btn-danger" type="button"><i class="fa fa-exclamation-circle"></i> Cancel Vote</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <p class="date">Asked: {{$question->created_at}}</p>
                                    </div>
                                    <div class="col-md-12">
                                        <h4> {{ $question->title }}</h4>
                                    </div>
                                </div>
                                <div class="view-mail">
                                    <p>
                                        {{ $question->description }}
                                    </p>
                                </div>
                                <div class="attachment">
                                    <ul>
                                        @foreach($question->tags as $tag)
                                          <button class="btn btn-info btn-xs"><i class="fa fa-tag">{{$tag->name}}</i></button>
                                        @endforeach
                                    </ul>
                                </div>
                                {{--Isset jodi question er answer ta pay tahole count kre question ans dew otherwise 0--}}
                                <h2>All Answer <span class="badge badge-danger">{{isset($question->answers)?count($question->answers):0}}</span></h2>
                                {{--vvvippp--jehetu answer er sathee user er hasmany relation ase tai sure loop krte hobe--}}
                                <?php $anschosen = false; ?>
                                @foreach($question->answers as $answer)
                                    <div style="background-color:{{ Auth::id()==$answer->user->id?'#bdf3d7':'' }}; border-radius: 10px;">
                                    <div class="ln_solid"></div>
                                    <div class="view_answers">
                                        <div class="view-mail">
                                            <p>
                                                {!! $answer->answer !!}
                                            </p>
                                        </div>
                                        @if($answer->best_answer == 1 && $anschosen ==false)
                                            <?php $anschosen = true; ?>
                                            <button class="btn btn-success btn-xs"><i class="fa fa-check-circle"></i> best answer</button>
                                        @else
                                            @if($anschosen == false)
                                            <button class="btn btn-info btn-xs rate_as_best" id="{{$answer->id}}"> Best?</button>
                                                @endif
                                        @endif
                                        <div class="sender-info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{--answer and user er toh relationship ase--}}
                                                       @if(Auth::user()->id==$answer->user->id)
                                                        {{--answer_data="{{$answer->answer}}"==edit er attribute a click krle oi specific id er answer bole dey--}}
                                                            <span answer_data="{{$answer->answer}}" id="{{$answer->id}}" class="sender-dropdown edit_answer" style="cursor: pointer">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </span>
                                                       @endif
                                                    {{--comment modal er class name disi comment_modal tai age.disi oi comment model er code(121 line a akhane)--}}
                                                    <span id="{{$answer->id}}" class="open_comment_box" data-toggle="modal" data-target=".comment_modal" style="cursor: pointer">
                                                        <i class="fa fa-comment"></i> Comment
                                                    </span>
                                                    <br>
                                                    <br>
                                                    @if($answer->userHasRated() == false && Auth::id() != $answer->user_id)

                                                        <select class="rating" data-answer-id="{{$answer->id}}">
                                                            <option value=""></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    @endif
                                                    <b style="float:right; margin-right:100px; margin-top:-20px; color: #0e90d2;"><i class="fa fa-hand-o-right"></i>&nbsp; Average Rating: <span class="rating-{{$answer->id}}"></span>{{$answer->getRating()}}</b>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-unstyled msg_list">
                                            <li>
                                                <a>
                                                    <span class="image">
                                                      <img src="{{asset('images/user.png')}}" alt="img">
                                                    </span>
                                                    <span>
                                                      <span>{{$answer->user->name}}</span>
                                                    </span>
                                                    <span class="message">
                                                      Answered {{$answer->created_at}}
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="sender-info">
                                            <div class="comments">
                                                <label>Comments <span class="badge badge-danger">{{isset($answer->comments)?count($answer->comments):0}}</span></label>
                                                <div class="row">
                                                    @foreach($answer->comments as $comment)
                                                        <div class="col-md-10 col-md-offset-2">
                                                            <span>
                                                                <i class="fa fa-comment"></i> {{$comment->comment}}
                                                            </span>
                                                                <span style="color: #0bff82">Comment {{$comment->created_at}} By: {{$comment->user->name}}</span>
                                                                @if(Auth::user()->id==$comment->user->id)
                                                                  <button id="{{$comment->id}}"
                                                                          data-target=".edit_comment_modal"
                                                                          data-toggle="modal"
                                                                          data-answer="{{$answer->id}}"
                                                                          data-comment="{{$comment->comment }}"
                                                                          class="btn btn-info btn-xs edit_comment">
                                                                      <i class="fa fa-edit"></i>
                                                                  <button id="{{$comment->id}}" class="btn btn-danger btn-xs delete_comment"><i class="fa fa-trash"></i></button>
                                                                @endif
                                                                <hr>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                @endforeach
                                <div id="answer_section">
                                    <h2>Your Answer</h2>
                                    <div class="ln_solid"></div>
                                    <form id="answer_form" data-parsley-validate="" action="{{route('store.answer',$question->id)}}" method="post">
                                        @csrf
                                        {{--CKeditor used--}}
                                        <textarea name="answer" id="answer" rows="10" cols="80"
                                                  data-parsley-minlength="6"
                                                  data-parsley-minlength-message="Come on! You need to enter at least a 6 character comment..">

                                        </textarea>
                                        <div class="ln_solid"></div>
                                        <div class="btn-group">
                                            {{--akhane onek important type ta sure button detei hbe--}}
                                            <button class="btn btn-sm btn-primary" type="button" id="post_answer"><i class="fa fa-save"></i> Post Answer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Assign Comment modal -->
                            <div class="modal fade comment_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Comment Box</h4>
                                        </div>
                                        <div class="modal-body">
                                            {{--akhane mne rakhte hobe action deye krte lagbe na cause age amra id deye modal box krsi--}}
                                            <form id="comment_form" data-parsley-validate=""  method="post">
                                                @csrf
                                                <textarea name="comment" class="edit_comment" id="comment" rows="10" cols="200"
                                                      data-parsley-trigger="keyup"
                                                      data-parsley-minlength="6"
                                                      data-parsley-minlength-message="Come on! You need to enter at least a 6 character comment.."
                                                      placeholder="Comment on This Answer" style="width: 100%" required></textarea>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                            <button type="button" id="save_comment" class="btn btn-success"><i class="fa fa-save"></i> Save Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- / Comment modal -->

                            <!-- Edit Comment modal -->
                            <div class="modal fade edit_comment_modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form id="edit_comment_form" data-parsley-validate=""  action="" method="post">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Edit Comment Box</h4>
                                            </div>
                                            <div class="modal-body">
                                                {{--akhane mne rakhte hobe action deye krte lagbe na cause age amra id deye modal box krsi--}}
                                                @csrf
                                                    <textarea name="comment" id="edit_comment_text" class="edit_user_comment" rows="10" cols="200"
                                                          data-parsley-trigger="keyup"
                                                          data-parsley-minlength="6"
                                                          data-parsley-minlength-message="Come on! You need to enter at least a 6 character comment.."
                                                              style="width: 100%" required>
                                                    </textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                                <button type="submit" id="save_comment" class="btn btn-success"><i class="fa fa-save"></i> Update Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- / Edit Comment modal -->

                        </div>
                        <!-- /CONTENT MAIL -->
                        <div class="col-sm-3 mail_list_column">
                            <a href="#">
                                <div class="mail_list">
                                    <div class="left">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="right">
                                        <h3>View <small>16 times</small></h3>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="mail_list">
                                    <div class="left">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="right">
                                        <h3>Active: <small>yes no</small></h3>
                                    </div>
                                </div>
                            </a>
                            <div class="col-xs-12 profile_details">
                                <div class="well profile_view">
                                    <div class="col-sm-12">
                                        <h4 class="brief"><i>Asked By</i></h4>
                                        <div class="right col-xs-8 col-xs-offset-2 text-center">
                                            <img src="{{asset('images/user.png')}}" alt="" class="img-circle img-responsive">
                                        </div>
                                        <div class="left col-xs-12">
                                            {{--question er sathee user er relationship kra ase uer method deye--}}
                                            <h5>{{$question->user->name}}</h5>
                                            <h5>Rated: {{$question->user->getRating()}}</h5>
                                            <p><strong>Works: {{$question->user->title}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 bottom text-center">
                                        <div class="col-xs-12 col-sm-6 emphasis">
                                            <button type="button" class="btn btn-primary btn-xs">
                                                <i class="fa fa-user"> </i> View Profile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /MAIL LIST -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script src="{{ asset('js/admin/select2/dist/js/select2.js') }}"></script>
  <script>
      $(function () {
          CKEDITOR.replace( 'answer' );
          $("#post_answer").click(function () {//er form a type=button lage r id=post_answer desi
              Swal.fire({
                  title: 'Are you sure?',
                  text: "Are you want to save the answer!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Save it!'
              }).then(function(result){
                  if (result.value) {
                      $('#answer_form').submit();//form er name ta
                   }
              })
          });
          //Rated as best answer
          $(".rate_as_best").click(function () {
              var url="{{ url('rate/as/best') }}";
              var id=$(this).attr('id');
              $.ajax({
                  url:url+"/"+id,
                  type:"GET",
                  dataType:"json",
                  beforeSend:function () {
                      Swal.fire({
                          title: 'wait.....',
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
                              text: 'You Have Successfully rated',
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
              })
          });
          //(je comment a click kri oita id track kri)jehetu amra comment er button a click kri tai oi button er id na class deye tai dekha ata class ase tai .
          $(".open_comment_box").click(function () {
              //store/comment route er url ta akta variable a neye then action dele good practise
              var url="{{url('store/comment')}}";
              var id=$(this).attr('id');//je comment er attribute a click krbo oitaer id
              //important kotha--oi je <form id="comment_form" er attr action a krsi==tai oi form a action ta dei ni
              $("#comment_form").attr('action',url+"/"+id);//store/comment route er $id tai akhane script a

          });
          $("#save_comment").click(function () {
              Swal.fire({
                  title: 'Are you sure?',
                  text: "Are you want to save the comment!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Save it!'
              }).then(function(result){
                  if (result.value) {
                      $('#comment_form').submit();//comment form er name ta
                  }
              });
          });
          //(je edit a click kri oita id track kri)...edit er class name disi (span class="sender-dropdown edit_answer")
          $(".edit_answer").click(function () {
             var id=$(this).attr('id');//je edit er attribute a click krbo oitaer id
              //edit er attribute a click krle oi specific id er answer bole dey
             var answer=$(this).attr('answer_data');
             //Edit a click krle thik oi ckeditor a neye jay
              //Scroll code
              $('html,body').animate({
                  scrollTop:$(document).height()-$(window).height()
              });
              CKEDITOR.instances['answer'].setData(answer);//texterea te CKEDITOR er name ta=answer cilo
              // change the value of the button(post_answer)taow dynamically change hobe
              $("#post_answer").html('<i class="fa fa-save"></i> Update Answer');
              //when click on the update answer button then change the from er action
              var url="{{url('update/answer')}}";
              $("#answer_form").attr('action',url+"/"+id);//route er id ta parameter hesehebe==$(".edit_answer").click(function ()catch kore rakhsi

          });

          //Update comment
          //$(".edit_user_comment").select2();
          $('.edit_comment').click(function () {
              var id=$(this).attr('id');
              var comment=$(this).attr('data-comment');
              var answer=$(this).attr('data-answer');
              $('#edit_comment_text').val(comment);
              $('#edit_comment_form').attr('action','{{ url('update/comment/') }}'+'/'+id+'/'+answer);

          });


          //comment delete option a click krle koto id delete krsi ta click event kortesi
          $(".delete_comment").click(function () {
              var id=$(this).attr('id');
              //Delete comment by ajax ajax ajax ajax XXXXXXX
              var url="{{url('delete/comment')}}";
              $.ajax({
                  url:url+"/"+id,
                  type:"GET",
                  dataType:"json",
                  beforeSend:function () {
                      Swal.fire({
                          title: 'Deleting the comment data.....',
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
                              text: 'You Have Successfully Deleted Comment',
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
              })
          });

          /** bar rting activation*/
          $('.rating').barrating({
              theme: 'fontawesome-stars-o',
              onSelect: function(rating, text, event) {
                  // console.log(event.target, this);
                  window.that = $(event.target);

                  var answerId = that.parents(".br-wrapper").eq(0).find("select").data("answer-id");

                  $.get("/acceptRating", {
                      answerId : answerId,
                      rating: rating
                  }).done(function(data){
                      that.parents(".br-wrapper").eq(0).hide();
                      // Swal.fire(data);
                      $('.rating-'+answerId).text(data);
                  })
              }
          });
      });
  </script>
@endsection