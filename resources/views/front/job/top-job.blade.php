@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Top Job Offers</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="{{ asset('js/admin/select2/dist/css/select2.css') }}" rel="stylesheet">
@endsection
@section('contain')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Top Job <small>List</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="#" method="post">
                    @csrf
                    <div class="btn-group">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" value="validate">Go!</button>
                            </span>
                            </div>
                        </div>
                </form>
                <a href="{{url('top/job/offer?day=today')}}" class="btn btn-sm {{ $activeParamBtn=='today'?'btn-primary':'btn-default' }}" type="button"><i class="fa fa-hand-o-right"></i> Today</a>
                <a href="{{url('top/job/offer?day=week')}}" class="btn btn-sm {{ $activeParamBtn=='week'?'btn-primary':'btn-default' }}" type="button"><i class="fa fa-hand-o-right"></i> Week</a>
                <a href="{{url('top/job/offer?day=month')}}" class="btn btn-sm {{ $activeParamBtn=='month'?'btn-primary':'btn-default' }}" type="button"><i class="fa fa-hand-o-right"></i> Month</a>
            </div>
            <div class="ln_solid"></div>
            <div class="table-responsive">
                <table id="question_table" class="table table-bordered">
                    <tbody>
                    @foreach($job as $row)
                        <tr>
                            <th style="width: 50px">
                                <button style="margin-top:20px;" class="btn btn-default">
                                    {{$row->company_name}} <br>
                                </button>
                            </th>
                            <th style="width: 100px">
                                <button style="margin-top:20px;" class="btn btn-default">
                                    {{$row->job_role}} <br>
                                </button>
                            </th>
                            <th style="width: 100px">
                                <button style="margin-top:20px;" class="btn btn-default">
                                    {{$row->job_type}} <br>
                                </button>
                            </th>
                            <th style="width: 100px">
                                <button style="margin-top:20px;" class="btn btn-default">
                                    {{$row->location}} <br>
                                </button>
                            </th>
                            <th style="width: 100px">
                                <button style="margin-top:20px;" class="btn btn-default">
                                    {{$row->visa_sponsor}} <br>
                                </button>
                            </th>
                            <th>
                                <a href="{{route('show.job',$row->id)}}" style="font-size: 20px">{{$row->job_role}}</a><br>
                                @foreach($row->tags as $tag)
                                    <button class="btn btn-success btn-xs"><i class="fa fa-tags"></i> {{$tag->name}}</button>
                                @endforeach
                                <br>
                                <span>{{ $row->created_at }} By </span>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $job->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection