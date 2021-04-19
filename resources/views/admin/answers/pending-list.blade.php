@extends('admin.master')
@section('page_title')
    <div class="title_left">
        <h3>Pending Answers</h3>
    </div>
@endsection
@section('stylesheet')

@endsection
@section('container')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Pending Answer List</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="question_table" class="table table-bordered">
                        <tbody>
                        @foreach($answers as $row)
                            <tr>
                                <th style="width: 100px">
                                    <br>
                                    <button class="btn btn-warning">
                                        <i class="fa fa-eye-slash"></i> Pending
                                    </button>
                                </th>
                                <th style="width: 120px">
                                    <br>
                                    <button type="button" id="{{ $row->id }}" class="btn btn-danger delete_pending">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </th>
                                <th>
                                    <a href="{{url('view/pending/answer',$row->id)}}" style="font-size: 20px">{{ $row->answer }}</a>
                                    <br>
                                <!-- @foreach($row->questions as $quest) -->
                                    <button class="btn btn-info btn-xs"><i class="fa fa-tag"></i> {{$row->questions->title}}</button>
                                <!-- @endforeach -->
                                    <br>
                                    <p style="color: #9d6f5e; font-size: 10px;">Asked {{ $row->created_at->diffForHumans() }} By {{ $row->questions->user->name }}</p>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $answers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.delete_pending').click(function () {
            var id = $(this).attr('id');
            var url = "{{url('/delete/ans')}}"+"/"+id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url:url,
                        type:'GET',
                        contentType:false,
                        processData:false,
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting Data.......',
                                showConfirmButton: false,
                                html: '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>',
                                allowOutsideClick: false
                            });
                        },
                        success:function (response) {
                            Swal.close();
                            console.log(response);
                            if (response==="success"){
                                Swal.fire({
                                    title: 'Successfully Deleted',
                                    type: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Ok'
                                }).then(function(result) {
                                    if (result.value) {
                                        window.location.reload();
                                    }
                                });
                            }
                        },
                        error:function (error) {
                            Swal.close();
                            console.log(error);
                        }
                    })
                }
            });
        });
    </script>
@endsection
