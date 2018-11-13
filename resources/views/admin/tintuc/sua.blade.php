 
@extends('admin.layouts.index')
 <!-- Page Content -->
@section('content')

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tuc
                            <small>{{$tintuc->TieuDe}}</small>
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
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>The Loai</label>
                                <select class="form-control" name="TheLoai" id="theloai">
                                @foreach($theloai as $tl)    
                                    <option 
                                    @if($tintuc->loaitin->theloai->id == $tl->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loai Tin</label>
                                <select class="form-control" name="LoaiTin" id="loaitin">
                                @foreach($loaitin as $lt)    
                                    <option 
                                    @if($tintuc->loaitin->id == $tl->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$lt->id}}">{{$lt->Ten}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tieu De</label>
                                <input class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Tom Tat</label>
                                <textarea id="demo" name="TomTat"  class="form-control ckeditor" rows="3">
                                    {{$tintuc->TomTat}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Noi Dung</label>
                                <textarea id="demo" name="NoiDung"  class="form-control ckeditor" rows="3">
                                    {{$tintuc->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hinh Anh</label>
                                <p>
                                    
                                 <img width="400px" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">
                                </p>
                                <input type="file" name="Hinh" class="form-control" > 
                            </div>

                            <div class="form-group">
                                <label>Noi Bat</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1"
                                    @if($tintuc->noibat == 1)
                                        {{"checked"}}
                                    @endif

                                     checked="" type="radio">Co
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0"
                                    @if($tintuc->noibat == 0)
                                        {{"checked"}}
                                    @endif 
                                    type="radio">Khong
                                </label>
                            </div>
                            <button type="submit" class="btn btn-info">Category Edit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comment
                            <small>Danh Sach</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>

                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Nguoi Dung</th>
                                <th>Noi Dung</th>
                                <th>Ngay Dang</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tintuc->comment as $cm)    
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                {{-- chu y --}}
                                <td>{{$cm->user->name}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"> Delete</a></td>
                                
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
                {{-- end row --}}
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#theloai").change(function(){
                // lay id the loai
                var idTheLoai = $(this).val();
                //goi route admin/ajax/loaitin/{id}
                $.get("admin/ajax/loaitin/"+idTheLoai, function(data){
                        // lay du lieu do vao form co id loaitin
                        $("#loaitin").html(data);

                }); 
            });
        });
    </script>
@endsection




