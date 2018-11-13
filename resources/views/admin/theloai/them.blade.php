 
@extends('admin.layouts.index')
 <!-- Page Content -->
@section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">The Loai
                            <small>Them</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    {{-- ****************************** --}}
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
                    {{-- ****************************** --}}
                        <form action="admin/theloai/them" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Ten the loai</label>
                                <input class="form-control" name="Ten" placeholder="Please Enter Category Name" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Them</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection