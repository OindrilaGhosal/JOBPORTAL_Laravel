
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent">
                    <div class="card-header bg-info">{{$job->title}}</div>

                    <div class="card-body">
                        <p>
                            <h3>Roles</h3>
                            {{$job->roles}}
                        </p>
                        <p>
                            <h3>Description</h3>
                            {{$job->description}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-transparent">
                    <div class="card-header bg-info">Short Info</div>

                    <div class="card-body">
                        <p>Company: <a href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">
                                {{ $job->company->cname }}
                            </a></p>
                        <p>Address: {{ $job->address }}</p>
                        <p>Job Position: {{ $job->position }}</p>
                        <p>Last Date: {{ $job->last_date }}</p>
                    </div>
                    @if(Auth::user()->user_type == 'seeker')
                        @if(!$job->checkApplication())
                        <form action="{{route('jobs.apply',[$job->id])}}" method="post">
                            @csrf
                            <button class="btn btn-warning">Apply</button>
                        </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
