@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($applicants as $applicant)
                <div class="card bg-transparent">
                    <div class="card-header bg-info">{{ $applicant->title }}</div>
                    <div class="card-body">
                        <div class="table">
                            <thead>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <br>
                            @foreach($applicant->users as $user)
                            <tbody>
                                <tr>
                                    <td>{{$user->name}}&nbsp;&emsp;</td>
                                    <td>{{$user->email}}&nbsp;</td>
                                    <td>{{$user->profile->address}}&nbsp;&emsp;</td>
                                    <td>{{$user->profile->phone_number}}&nbsp;&emsp;</td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->resume)}}">Resume &emsp;</a>
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->cover_letter)}}">Cover &emsp;</a>
                                    </td><br>
                                </tr>
                            </tbody>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
