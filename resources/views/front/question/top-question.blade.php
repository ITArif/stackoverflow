@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Top Questions</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="{{ asset('js/admin/select2/dist/css/select2.css') }}" rel="stylesheet">
@endsection
@section('contain')<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Question <small>List</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a href="{{url('new/question')}}" class="btn btn-info btn-md">Ask Question</a><br>
            <div class="btn-group">
                <a href="{{ url('top/question?option=today') }}" class="btn btn-sm {{ $activeParamBtn=='today'?'btn-primary':'btn-default' }}" type="button"><i class="fa fa-hand-o-right"></i> Today</a>
                <a href="{{ url('top/question?option=week') }}" class="btn btn-sm {{ $activeParamBtn=='week'?'btn-primary':'btn-default' }}" type="button"><i class="fa fa-hand-o-right"></i> Week</a>
                <a href="{{ url('top/question?option=month') }}" class="btn btn-sm {{ $activeParamBtn=='month'?'btn-primary':'btn-default' }}" type="button"><i class="fa fa-hand-o-right"></i> Month</a>
            </div>
            <div class="ln_solid"></div>
            <div class="table-responsive">
                <table id="question_table" class="table table-bordered">
                    <tbody>
                    @foreach($question as $row)
                        <tr>
                            <th style="width: 100px">
                                <button class="btn btn-default">
                                    Views <br>
                                    <span class="badge badge-danger">{{$row->visit_count}}</span>
                                </button>
                            </th>
                            <th style="width: 100px">
                                <button class="btn btn-default">
                                    Anwers <br>
                                    <span class="badge badge-danger">{{ isset($row->answers)?count($row->answers):0 }}</span>
                                </button>
                            </th>
                            <th style="width: 100px">
                                <button class="btn btn-default">
                                    Votes <br>
                                    <span class="badge badge-danger">{{ isset($row->votes)?count($row->votes):0 }}</span>
                                </button>
                            </th>
                            <th>
                                <a href="{{url('show/question/'.$row->id)}}" style="font-size: 14px">{{ $row->title }}</a>
                                <br>
                                @foreach($row->tags as $tag)
                                    <button class="btn btn-success btn-xs"><i class="fa fa-tags"></i> {{ $tag->name }}</button>
                                @endforeach
                                <span style="color: #9d6f5e; font-size: 12px;">Asked {{$row->created_at}} By {{$row->user->name}}</span>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$question->links()}}
            </div>
        </div>
    </div>
</div>
@endsection