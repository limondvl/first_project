@extends('admin.admin_master')
@section('body')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Şifre Değiştir</h4> <br> <br>
                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-2"></i>
                                        {{$error}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif
                            <form method="POST" action="{{route('update.password')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mevcut Şifre</label>
                                    <div class="col-sm-10">
                                        <input name="oldpassword" class="form-control" type="password" value="" id="oldpassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yeni Şifre</label>
                                    <div class="col-sm-10">
                                        <input name="newpassword" class="form-control" type="password" value="" id="newpassword">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Yeni Şifre Tekrar</label>
                                    <div class="col-sm-10">
                                        <input name="confirm_password" class="form-control" type="password" value="" id="confirm_password">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Şifre Değiştir">
                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
