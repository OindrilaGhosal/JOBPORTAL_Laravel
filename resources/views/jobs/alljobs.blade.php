@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>RECENT JOBS</h1><br>
            <form action="{{route('alljobs')}}" method="get">
            <div class="form-inline">
                <div class="form-group">
                    <label>&emsp;&ensp;Keyword&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="title" class="form-control">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <label>Employment Type&nbsp;&nbsp;&nbsp;</label>
                    <select name="type" class="form-control">
                        <option value="fulltime">Full Time</option>
                        <option value="parttime">Part Time</option>
                        <option value="intern">Intern</option>
                    </select>
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <label>Address&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="address" class="form-control">
                </div>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                    <button class="btn btn-outline-dark">Search</button>
                </div>
            </div>
            </form>
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
                                <button type="submit" class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$jobs->links()}}
        </div>
    </div>
@endsection


