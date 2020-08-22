@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>JOBPORTAL</h1>
            <br><br>
            <table class="table">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            <img src="{{asset('avatar/apple.png')}}" width="80">
                        </td>
                        <td>
                            Position: {{$job->position}}
                            <br>
                            Job Type: &nbsp;<i class="fa fa-clock"></i>{{ $job->type }}
                        </td>
                        <td>
                            <i class="fa fa-map-marked"></i>&nbsp;Address: {{$job->address}}
                        </td>
                        <td>
                            <i class="fa fa-calendar-check"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <a href="{{ route('jobs.show',[$job->id,$job->slug]) }}">
                                <button class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('alljobs')}}">
                <button style="width:100%" class="btn btn-success btn-lg">Browse All Jobs</button>
            </a>
        </div><br><br>
        <h1>Feature Company</h1><br>
        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                <div class="col-md-2">
                    <div class="card w-100" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>
                            <p class="card-text">{{ Illuminate\Support\Str::limit($company->description, 20) }}</p>
                            <a href="{{ route('company.index', [$company->id,$company->slug]) }}" class="btn btn-success">Visit Company</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div><br><br>
        <div class="card w-100" style="width: 18rem;">
            <div class="card-body bg-success">
                <p class="card-text text-black-50 ">© Copyright 2020 - Powered by JOBPORTAL</p>
            </div>
        </div>

    </div>
@endsection

