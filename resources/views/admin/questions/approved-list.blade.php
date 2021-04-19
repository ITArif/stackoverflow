@extends('admin.master')
@section('page_title')
    <div class="title_left">
        <h3>All Approved Question List</h3>
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
                <h2>All Approved Question <small>List</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <button class="btn btn-danger btn-sm" id="delete_all"><i class="fa fa-trash"></i> Delete</button>
                <button class="btn btn-success btn-sm" id="active_all"><i class="fa fa-check"></i> Approved?</button>
                <button class="btn btn-warning btn-sm" id="deactivate_all"><i class="fa fa-exclamation-circle"></i> Inpproved?</button>
                <div class="table-responsive">
                    <table id="question_table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;width: 15px;">#</th>
                            <th style="text-align: center;width: 20px;">Tile</th>
                            <th style="text-align: center;width: 15px;">Category</th>
                            <th style="text-align: center;width: 10px;">Tags</th>
                            <th style="text-align: center;width: 10px;">Status</th>
                            <th style="text-align: center;width: 25px;">Create Date</th>
                            <th style="text-align: center;width: 10px;">Action</th>
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
            $('#question_table').DataTable({
                processing:true,
                serverSide:true,
                ajax:"{{url('render/approved/quest/datatable')}}",
                columns:[
                    { data: 'hash', name: 'hash' },
                    { data: 'title', name: 'title' },
                    { data: 'category.name', name: 'category.name'},
                    { data: 'tags', name: 'tags' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action'}
                ]
                // "rowCallback": function( row, data ) {
                //     if ( data.hash !== null ) {
                //         $('td:eq(0)', row).html( '<input type="checkbox" id="qst_id_'+data.hash+'">' );
                //     }
                // }
            });
        } );

        $(function () {
            // delete all selected question id
            $('#delete_all').click(function () {
                var ids = [];
                // get all selected user id
                $.each($("input[name='question_ids[]']:checked"), function(){
                    ids.push($(this).val());
                });
                if (ids.length!==0) {
                    var url = "{{ url('delete/all/questions') }}";
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
                                data: {"question_ids": ids, "_token": "{{ csrf_token() }}"},
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
                        'Select The Question First!',
                        'error'
                    )
                }
            });

            // activate all selected question id
            $('#active_all').click(function () {
                var ids = [];
                // get all selected question id
                $.each($("input[name='question_ids[]']:checked"), function(){
                    ids.push($(this).val());
                });
                if (ids.length!==0) {
                    var url = "{{ url('activate/all/questions') }}";
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
                                data: {"question_ids": ids, "_token": "{{ csrf_token() }}"},
                                dataType: "json",
                                beforeSend:function () {
                                    Swal.fire({
                                        title: 'Approving Question.......',
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
                        'Select The Question First!',
                        'error'
                    )
                }
            });

            // deactivate all selected question
            $('#deactivate_all').click(function () {
                var ids = [];
                // get all selected question id
                $.each($("input[name='question_ids[]']:checked"), function(){
                    ids.push($(this).val());
                });
                if (ids.length!==0) {
                    var url = "{{ url('deactivate/all/questions') }}";
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to Deactivate?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Deactivate'
                    }).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: {"question_ids": ids, "_token": "{{ csrf_token() }}"},
                                dataType: "json",
                                beforeSend:function () {
                                    Swal.fire({
                                        title: 'Deactivating Users.......',
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
                        'Select The Question First!',
                        'error'
                    )
                }
            });
        });

        function deletesQuestion(id){
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
                    var url = "{{url('/delete/quest/')}}"+"/"+id;
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
