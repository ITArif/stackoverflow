
@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Search Job Offers</h3>
    </div>
@endsection
@section('contain')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Search <small>Items</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal" method="post" action="{{route('search.jobs')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control"  id="title" name="title" placeholder="Search Something..">
                        <br>
                        <button class="btn btn-success btn-sm"><i class="fa fa-search"></i> Search</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <th class="text-primary" style="text-align: center">Company Name</th>
                        <th class="text-primary" style="text-align: center">Job Role</th>
                        <th class="text-primary" style="text-align: center">Tags</th>
                        <th class="text-primary" style="text-align: center">Type</th>
                        <th class="text-primary" style="text-align: center">Description</th>
                        <th class="text-primary" style="text-align: center">visa Sponsor</th>
                        <th class="text-primary" style="text-align: center">location</th>
                        <th class="text-primary" style="text-align: center">Created At</th>
                        <th class="text-primary" style="text-align: center">Action</th>
                        </thead>
                        <tbody>
                        @forelse($jobs as $row)
                            <tr>
                                <td>{{$row->company_name}}</td>
                                <td>{{$row->job_role}}</td>
                                <td>
                                    @foreach($row->tags as $tag)
                                        <button class="btn btn-info btn-sm">{{$tag->name}}</button>
                                    @endforeach
                                </td>
                                <td>{{$row->job_type}}</td>
                                <td>{{$row->job_description}}</td>
                                <td>{{$row->visa_sponsor}}</td>
                                <td>{{$row->location}}</td>
                                <td>{{$row->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{ url('/job/offers/'.$row->id) }}" class="btn btn-info btn-sm">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;color:red ">No Data Found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    @if(count($jobs)>0)
                        {{$jobs->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection