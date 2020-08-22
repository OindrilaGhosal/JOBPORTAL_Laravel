
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-xl-3">
                @if(empty(Auth::user()->company->logo))
                    <img style="width: 100%" src="{{ asset('avatar/brain.png') }}" width="100" height="150">
                @else
                    <img style="width: 100%"
                         src="{{asset('uploads/avatar')}}/{{ Auth::user()->company->logo }}"
                         width="100" height="200">
                @endif

                <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="card bg-transparent">
                        <div class="card-header bg-info">Update Your Company Avatar</div>
                        <div class="card-body">
                            <input type="file" name="logo" class="form-control">
                            <br>
                            <button class="btn btn-info">Update</button>
                        </div>
                        @if($errors->has('logo'))
                            <div class="error" style="color: red">
                                {{ $errors->first('logo') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="card bg-transparent">
                    <div class="card-header bg-info">Update Company Information</div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" rows="3" name="address">

                                </textarea>
                            </div>

                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            @if($errors->has('phone'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control">
                            </div>

                            @if($errors->has('website'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('website') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" name="slogan" class="form-control">
                            </div>

                            @if($errors->has('slogan'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('slogan') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="3" name="description">

                                </textarea>
                            </div>

                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <button class="btn btn-info">Submit</button>
                            </div>

                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" >
            <div class="col-md-6" >
                <div class="card bg-transparent">
                    <div class="card-header bg-info">Company Details</div>

                </div>

                <form action="{{ route('company.coverphoto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card bg-transparent">
                        <div class="card-header bg-info">Update Cover Photo</div>
                        <div class="card-body">
                            <input type="file" name="cover_photo" class="form-control">
                            <br>
                            <button class="btn btn-primary">Update</button>
                        </div>
                        @if($errors->has('cover_photo'))
                            <div class="error" style="color: red">
                                {{ $errors->first('cover_photo') }}
                            </div>
                        @endif
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection


