@extends('admin.master')
@section('page_title')
    <div class="title_left">
        <h3>All Approved Answer List</h3>
    </div>
@endsection
@section('stylesheet')
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@8.10.0/dist/sweetalert2.css" rel="stylesheet">
@endsection
@section('container')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Approved Answer <small>List</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <button class="btn btn-danger btn-sm" id="delete_all"><i class="fa fa-trash"></i> Delete</button>
                <button class="btn btn-success btn-sm" id="active_all"><i class="fa fa-check"></i> Approved?</button>
                <button class="btn btn-warning btn-sm" id="deactivate_all"><i class="fa fa-exclamation-circle"></i> Inpproved?</button>
                <div class="table-responsive">
                    <table id="answer_table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;width: 10px;">#</th>
                            <th style="text-align: center;width: 20px;">Question</th>
                            <th style="text-align: center;width: 20px;">Answer</th>
                            <th style="text-align: center;width: 10px;">User</th>
                            <th style="text-align: center;width: 10px;">Status</th>
                            <th style="text-align: center;width: 15px;">Create Date</th>
                            <th style="text-align: center;width: 15px;">Action</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.10.0/dist/sweetalert2.js"></script>

    <script>
        $(document).ready( function () {
            $('#answer_table').DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{url('render/approved/ans/datatable')}}",
                columns:[
                    { data: 'hash', name: 'hash' },
                    { data: 'question', name: 'question' },
                    { data: 'answer', name: 'answer' },
                    { data: 'user', name: 'user' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ]
                // "rowCallback": function( row, data ) {
                //     if ( data.hash !== null ) {
                //         $('td:eq(0)', row).html( '<input type="checkbox" id="qst_id_'+data.hash+'">' );
                //     }
                // }
            });
        } );

        $(function () {
            // delete all selected answer id
            $('#delete_all').click(function () {
                var ids = [];
                // get all selected answer id
                $.each($("input[name='answer_ids[]']:checked"), function(){
                    ids.push($(this).val());
                });
                if (ids.length!==0) {
                    var url = "{{ url('delete/all/answers') }}";
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
                                url: url,
                                type: 'POST',
                                data: {"answer_ids": ids, "_token": "{{ csrf_token() }}"},
                                dataType: "json",
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
                }else{
                    Swal.fire(
                        'Error',
                        'Select The Answer First!',
                        'error'
                    )
                }
            });

            // activate all selected answer id
            $('#active_all').click(function () {
                var ids = [];
                // get all selected answer id
                $.each($("input[name='answer_ids[]']:checked"), function(){
                    ids.push($(this).val());
                });
                if (ids.length!==0) {
                    var url = "{{ url('activate/all/answers') }}";
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to approve?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Approve'
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: {"answer_ids": ids, "_token": "{{ csrf_token() }}"},
                                dataType: "json",
                                beforeSend:function () {
                                    Swal.fire({
                                        title: 'Approving Answer.......',
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
                                            title: 'Successfully Activated',
                                            type: 'success',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'Ok',
                                            allowOutsideClick: false
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
                }else{
                    Swal.fire(
                        'Error',
                        'Select The Answer First!',
                        'error'
                    )
                }
            });

            // deactivate all selected answer
            $('#deactivate_all').click(function () {
                var ids = [];
                // get all selected answer id
                $.each($("input[name='answer_ids[]']:checked"), function(){
                    ids.push($(this).val());
                });
                if (ids.length!==0) {
                    var url = "{{ url('deactivate/all/answers') }}";
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to Deactivate?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Inapproved'
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: {"answer_ids": ids, "_token": "{{ csrf_token() }}"},
                                dataType: "json",
                                beforeSend:function () {
                                    Swal.fire({
                                        title: 'Inapproving Answers.......',
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
                                            title: 'Successfully Deactivated',
                                            type: 'success',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'Ok',
                                            allowOutsideClick: false
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
                }else{
                    Swal.fire(
                        'Error',
                        'Select The Answer First!',
                        'error'
                    )
                }
            });
        });

        function deletesAnswer(id){
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
                    var url = "{{url('/delete/ans/')}}"+"/"+id;
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
        }
    </script>
@endsection
