 @extends('layouts.index')

    <!-- Page Content -->
 @section('content')   
    <div class="container">

    	<!-- slider -->
    	@include('layouts.slide')
        <!-- end slide -->
    
        <div class="space20"></div>


        <div class="row main-left">
           @include('layouts.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Lo A68-Duong 30/4- quan Hai Chau- Da Nang</p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>Lo A68-Duong 30/4- quan Hai Chau- Da Nang </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>Lo A68-Duong 30/4- quan Hai Chau- Da Nang</p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.488584600133!2d108.21215611474699!3d16.040116444478276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219eaf406673f%3A0xfbb46540fd166da8!2zQ8O0bmcgVHkgTuG7mWkgVGjhuqV0IEROSQ!5e0!3m2!1svi!2s!4v1541576765886" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
 @endsection
   