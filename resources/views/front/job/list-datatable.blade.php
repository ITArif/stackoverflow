@extends('front.master')
@section('page_title')
    <div class="title_left">
        <h3>Job List</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('contain')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Job <small>List</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="job_table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Job Role</th>
                            <th>Tags</th>
                            <th>Job Type</th>
                            <th>Description</th>
                            <th>Visa</th>
                            <th>Location</th>
                            <th>Remote</th>
                            <th>Status</th>
                            <th>Create</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#job_table').DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{url('user/job/datatable')}}",
                columns:[
                    { data: 'hash', name: 'hash' },
                    { data: 'company_name', name: 'company_name' },
                    { data: 'job_role', name: 'job_role' },
                    { data: 'tags', name: 'tags' },
                    { data: 'job_type', name: 'job_type' },
                    { data: 'job_description', name: 'job_description' },
                    { data: 'visa_sponsor', name: 'visa_sponsor' },
                    { data: 'location', name: 'location' },
                    { data: 'remote_job', name: 'remote_job' },
                    { data: 'status', name: 'status' },
                    { data: 'date', name: 'date' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
        function deleteJob(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result){
                if (result.value) {
                    // delet by ajax
                    var url = "{{url('delete/job')}}";
                    $.ajax({
                        /*config part*/
                        url:url+"/"+id,
                        type:"GET",
                        dataType:"json",
                        /*Config part*/
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Deleting Data.......',
                                html:"<i class='fa fa-spinner fa-spin' style='font-size: 24px'></i>",
                                allowOutsideClick:false,
                                showCancelButton: false,
                                showConfirmButton: false
                            });
                        },
                        success:function (sharukhkhan) {
                            Swal.close();
                            if(sharukhkhan==="successful"){
                                Swal.fire({
                                    title: 'Success',
                                    text: "You Have Succefully Deleted The job Post",
                                    type: 'success',
                                    confirmButtonText: 'OK'
                                }).then(function(result){
                                    if (result.value) {
                                        window.location.reload();
                                    }
                                });
                            }
                            console.log(sharukhkhan);
                        },
                        error:function (error) {
                            Swal.fire({
                                title: 'Error',
                                text:'Something Went Wrong',
                                type:'error',
                                showConfirmButton: true
                            });
                            console.log(error)
                        }
                    })
                }
            });
        }
    </script>
@endsection