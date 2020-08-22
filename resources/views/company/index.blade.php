@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
       <!--     <div class="company-profile">
                <img src="{{asset('cover/banner.jpg')}}" width="100%">
            </div> -->
            <div class="company-desc"><br>
                <img src="{{asset('avatar/apple.png')}}" width="20%">
                <h1>{{ $company->cname }}</h1>
                <p>{{ $company->description }}</p>
                <p><b>Slogan :</b>&nbsp;{{ $company->slogan }}</p>
                <p><b>Address :</b>&nbsp;{{ $company->address }}</p>
                <p><b>Phone :</b>&nbsp;{{ $company->phone }}</p>
                <p><b>Website :</b>&nbsp;{{ $company->website }}</p>
            </div>


        </div>
    </div>
@endsection

