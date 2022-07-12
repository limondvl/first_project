@extends('admin.admin_master')
@section('body')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                       <center> <br><br>
                           <img class="rounded-circle avatar-xl" src="{{(!empty($adminData->profile_image)) ? url('uploads/admin_images/'.$adminData->profile_image):url('uploads/not_images.jpg')}}" alt="Card image cap">
                       </center>




                        <div class="card-body">
                            <h4 class="card-title">İsim : {{$adminData->name}}</h4>
                            <hr>
                            <h4 class="card-title">E-mail : {{$adminData->email}}</h4>
                            <hr>
                            <h4 class="card-title">Kullanıcı Adı : {{$adminData->username}}</h4>
                            <hr>
                            <a href="{{route('edit.profile')}}" class="btn btn-primary waves-effect waves-light">Düzenle</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
