@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Job Offers</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="{{ asset('js/admin/select2/dist/css/select2.css') }}" rel="stylesheet">
@endsection
@section('contain')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="row">
                    <div class="col-xs-12 invoice-header">
                        <h1>
                            <i class="fa fa-globe"></i> {{$job->job_role}}
                            <small class="pull-right">Date: {{ date('F d, Y', strtotime($job->created_at)) }} at {{ date('g:ia', strtotime($job->created_at)) }}</small>
                            <br>
                            <div style="margin-left:600px;margin-top:0px;" class="col-xs-12 bottom text-center">
                                <div class="col-xs-12 col-sm-6 emphasis">
                                    <button style="height:40px;" id="React-Button" class="grid--cell s-btn s-btn__muted s-btn__outlined  js-react-toggle" role="button" data-reaction="1" data-val="0" data-selected="false" title="Like">
                                        <a href="#" class="like"><img class="va-middle" src="https://cdn.sstatic.net/careers/Img/svg-illustrations/Illo-Reaction-Thumbsup.svg?v=b3fdf0b3ddb3" width="16" alt="React with an emoji"></a>
                                        <span class="va-middle fs-fine">0</span>
                                    </button>
                                    <button style="height:40px;" id="React-Button" class="grid--cell s-btn s-btn__muted s-btn__outlined  js-react-toggle" role="button" data-reaction="2" data-val="0" data-selected="false" title="Dislike">
                                        <a href="#" class="like"><img class="va-middle" src="https://cdn.sstatic.net/careers/Img/svg-illustrations/Illo-Reaction-Thumbsdown.svg?v=f7d07211debc" width="16" alt="React with an emoji"></a>
                                        <span class="va-middle fs-fine">0</span>
                                    </button>
                                    <button style="height:40px;" id="React-Button" class="grid--cell s-btn s-btn__muted s-btn__outlined  js-react-toggle" role="button" data-reaction="3" data-val="1" data-selected="false" title="Love">
                                        <a href="#" class="like"><img class="va-middle" src="https://cdn.sstatic.net/careers/Img/svg-illustrations/Illo-Reaction-Heart.svg?v=a0091eb758d9" width="16" alt="React with an emoji"></a>
                                        <span class="va-middle fs-fine">0</span>
                                    </button>
                                    <button style="height:40px;" id="React-Button" class="grid--cell s-btn s-btn__muted s-btn__outlined  js-react-toggle" role="button" data-reaction="5" data-val="0" data-selected="false" title="Funny">
                                        <a href="#" class="like"><img class="va-middle" src="https://cdn.sstatic.net/careers/Img/svg-illustrations/Illo-Reaction-Funny.svg?v=558e15b963d1" width="16" alt="React with an emoji"></a>
                                        <span class="va-middle fs-fine">0</span>
                                    </button>
                                </div>
                            </div>
                        </h1>
                        <div class="col-sm-4 invoice-col">
                            <strong>{{$job->company_name}}</strong>
                            <address>
                                <br>Visa Sponsor: {{$job->visa_sponsor}} <br>
                                <br>Job Type: {{$job->job_type}}
                            </address>
                        </div>
                        <div class="col-sm-4 invoice-col">
                            <strong>{{$job->location}}</strong>
                            <address>
                                <br>Paid relocation <br>
                                <br>Remote Job: {{$job->remote_job}}
                            </address>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <p class="lead">About this job</p>
                <div class="col-sm-4 invoice-col">
                    <strong>Job type: {{$job->job_type}}</strong>
                    <address>
                        <br>Experience level: {{$job->job_role}}, Lead <br>
                        <br>Location: {{$job->location}}
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    </strong>Industry: {{$job->company_name}},</strong>
                    <address>
                        <br>Company size: 51–200 people
                    </address>
                    <br>
                </div>
                <div class="product_social">
                    <ul class="list-inline">
                        <li><a style="margin-left:515px;margin-top:0px;" href="#"><i class="fa fa-facebook-square"></i></a>
                        </li>
                        <li><a href="https://twitter.com"><i class="fa fa-twitter-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-envelope-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-rss-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <p class="lead">Technologies</p>
                <br>
                @foreach($job->tags as $tag)
                    <button class="btn btn-success btn-xs"><i class="fa fa-tags"></i> {{$tag->name}}</button>
                @endforeach
            </div>
            <br>
            <div class="row">
                <h3>Job description</h3>
                <p class="lead">{{$job->job_role}} At {{$job->company_name}}</p>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        <p>{{$job->job_description}}</p>
                    </div>

                </div>
            </div>
            <br>
            <div class="row">
                @if(Auth::user()->getRating() >= 3.5)

                    @if($job->userApplication())
                        <h1>You have already applied</h1>
                        <a href="/upload/{{$job->userApplication()->resume}}" target="_blank" class="btn btn-info"><i class="fa fa-download"></i> View My resume</a>
                    @else
                        <a href="{{route('job.apply',$job->id)}}" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Apply Job Now</a>
                    @endif

                @else
                    <h4>You are not eligible. Try answering more question to increse rating. Your current rating is {{Auth::user()->getRating()}}, required rating is at least 3.5</h4>
                @endif
            </div>
            <br>
            <div class="row">
                <p style="text-align: center;color: #1b6d85;font-size: 30px;font-family: 'Bell MT';">Media gallery design emelents</p>
                <hr>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask">
                                <p>Your Text</p>
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Snow and Ice Incoming for the South</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask">
                                <p>Your Text</p>
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Snow and Ice Incoming for the South</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask">
                                <p>Your Text</p>
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Snow and Ice Incoming for the South</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask">
                                <p>Your Text</p>
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Snow and Ice Incoming for the South</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask">
                                <p>Your Text</p>
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p>Snow and Ice Incoming for the South</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-55">
                    <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{asset('images/hmm.jpg')}}" alt="image">
                            <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                    <a href="#"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="caption">
                            <p><strong>Image Name</strong>
                            </p>
                            <p>Snow and Ice Incoming</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--   var token = '{{Session::token()}}';--}}
    {{--   var urlLike = '{{route('like')}}';--}}
    <script src="{{asset('js/like.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.10.0/dist/sweetalert2.js"></script>
@endsection