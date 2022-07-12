@extends('admin.admin_master')
@section('body')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Profil Düzenle</h4>
                            <form action="{{route('store.profile')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">İsim</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{$editData->name}}" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input name="email" class="form-control" type="email" value="{{$editData->email}}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Kullanıcı Adı</label>
                                    <div class="col-sm-10">
                                        <input name="username" class="form-control" type="text" value="{{$editData->username}}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profil Resmi</label>
                                    <div class="col-sm-10">
                                        <input name="profile_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset('uploads/admin_images/'.$editData->profile_image)}}" alt="Hata">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Güncelle">
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                 $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
