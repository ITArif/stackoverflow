@extends('admin.master')
@section('page_title')
    <div class="page-title">
        <div class="title_left">
            <h3>New System User</h3>
        </div>
    </div>
@endsection
@section('container')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>User <small>list</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align:center">Name</th>
                        <th style="text-align:center">Email</th>
                        <th style="text-align:center">Active</th>
                        <th style="text-align:center">Role</th>
                        <th style="text-align:center">Created At</th>
                        <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $row)
                        <tr>
                            <td>
                                @if($row->photo)
                                  <img src="{{asset('images/admin/'.$row->photo)}}" style="width: 30px; height: 30px; border-radius: 20px">
                                @else
                                    <img src="{{asset('images/user.png')}}" style="width: 30px; height: 30px; border-radius: 20px">
                                @endif
                                {{$row->name}}
                            </td>
                            <td>{{$row->email}}</td>
                            <td>
                                @if($row->active==1)
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check-circle"></i>Activate</button>
                                @else
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Deactivate</button>
                                @endif
                            </td>
                            <td>{{$row->role}}</td>
                            <td>{{$row->created_at}}</td>
                            <td>
                                @php 
                                    $auth_user_permissions = auth('system_admin')->user()->permissions
                                    ->pluck('name')->toArray();
                                    $hasViewPermission = in_array('view',$auth_user_permissions);
                                    $hasDeletePermission = in_array('delete',$auth_user_permissions);
                                @endphp
                                @if($hasViewPermission)
                                  <a href="{{route('edit.system.user',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
                                @endif
                                @if($hasDeletePermission)
                                  <button id="{{$row->id}}" class="btn btn-danger btn-xs delete_system_user"><i class="fa fa-trash-o"></i> Delete</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
     $('.delete_system_user').click(function () {
         var id = $(this).attr('id');
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
                 var url = "{{url('delete/system/user')}}";
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
                     success:function (response) {
                         Swal.close();
                         if(response==="successful"){
                             Swal.fire({
                                 title: 'Success',
                                 text: "You Have Succefully Deleted The System User",
                                 type: 'success',
                                 confirmButtonText: 'OK'
                             }).then(function(result){
                                 if (result.value) {
                                     window.location.reload();
                                 }
                             });
                         }
                         console.log(response);
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
     });
 </script>
@endsection