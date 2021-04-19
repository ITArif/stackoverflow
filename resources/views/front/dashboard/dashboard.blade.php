@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>{{__('auth.dashboard')}}</h3>
    </div>
@endsection
@section('contain')
 {{--Here we place our dashboard content--}}
 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="tile-stats">
         <div class="icon"><i class="fa fa-question-circle"></i></div>
         <div class="count" id="totalQ"></div>
         <h3>{{__('auth.total_question')}}</h3>
     </div>
 </div>
 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="tile-stats">
         <div class="icon"><i class="fa fa-question-circle"></i></div>
         <div class="count" id="totalAnswer"></div>
         <h3>{{__('auth.answered_question')}}</h3>
     </div>
 </div>
 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="tile-stats">
         <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
         <div class="unAns" id="unAns"></div>
         <h3>{{__('auth.unanswered')}}</h3>
     </div>
 </div>
 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="tile-stats">
         <div class="icon"><i class="fa fa-mail-reply-all"></i></div>
         <div class="count">10</div>
         <h3>{{__('auth.uanswered')}}</h3>
     </div>
 </div>
 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="tile-stats">
         <div class="icon"><i class="fa fa-comment"></i></div>
         <div class="count">10</div>
         <h3>{{__('auth.ucomment')}}</h3>
     </div>
 </div>
 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="tile-stats">
         <div class="icon"><i class="fa fa-level-up"></i></div>
         <div class="count">20</div>
         <h3>{{__('auth.upVote')}}</h3>
     </div>
 </div>
 <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
     <div class="tile-stats">
         <div class="icon"><i class="fa fa-level-down"></i></div>
         <div class="count">17</div>
         <h3>{{__('auth.downVote')}}</h3>
     </div>
 </div>
 <div class="row">
     <div class="col-md-6 col-sm-6 col-xs-12">
         <div class="x_panel">
             <div class="x_title">
                 <h2>{{__('auth.pie_chart')}}</h2>
                 <ul class="nav navbar-right panel_toolbox">
                     <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                     </li>
                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                         <ul class="dropdown-menu" role="menu">
                             <li><a href="#">Settings 1</a>
                             </li>
                             <li><a href="#">Settings 2</a>
                             </li>
                         </ul>
                     </li>
                     <li><a class="close-link"><i class="fa fa-close"></i></a>
                     </li>
                 </ul>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content">
                 <canvas id="questions"></canvas>
             </div>
         </div>
     </div>
 </div>
@endsection
@section('script')
         <script src="/js/admin/Chart.js/dist/Chart.min.js"></script>
    <script>
        $.ajax({url: "{{url('/total/question')}}", success: function(result){
                $("#totalQ").html(result);

                var total_q = parseInt(result);
                $.ajax({url: "{{url('/total/answer')}}", success: function(result){
                        $("#totalAnswer").html(result);
                        var ans = parseInt(result);
                        var unans = total_q - ans;
                        $(".unAns").text(unans);

                        var ctx = document.getElementById("questions");
                        var data = {
                            datasets: [{
                                data: [ans, unans],
                                backgroundColor: [
                                    "#455C73",
                                    "#9B59B6",
                                ],
                                label: 'QUestions answered/unanswered' // for legend
                            }],
                            labels: [
                                "Answered",
                                "Unanswered",
                            ]
                        };

                        var pieChart = new Chart(ctx, {
                            data: data,
                            type: 'pie',

                        });


                    }});
            }});


        $(function () {
            // Pie chart
            if ($('#questions').length ){



            }

        })
    </script>

@endsection