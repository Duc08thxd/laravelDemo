 
@extends('admin.layouts.index')
 <!-- Page Content -->
@section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                     {{-- *********************** --}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>

                        @endif
                        {{-- ************************* --}}
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label>Ho Ten</label>
                                <input class="form-control" name="name" value="{{$user->name}}" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{$user->email}}" name="email" readonly="" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="changePass" name="changePassword">
                                <label>Doi Password</label>
                                <input class="form-control password" name="password" type="password" placeholder="Please Enter Password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhap Lai Password</label>
                                <input class="form-control password" name="passwordAgain" type="password" placeholder="Please Enter Password" disabled="" />
                            </div>
                            
                            <div class="form-group">
                                <label>Quyen nguoi dung</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0"@if($user->quyen == 0)
                                        {{"checked"}}
                                    @endif 
                                     type="radio">User
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen"
                                    value="1" 
                                    @if($user->quyen == 1)
                                        {{"checked"}}
                                    @endif 

                                    type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#changePass").change(function(){
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                }else{
                    $(".password").attr('disabled','');

                }
            });
        });

    </script>

@endsection









