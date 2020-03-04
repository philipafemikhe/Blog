@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>Profile Image</th>
                <th>Username</th>
                <th>email</th>
                <th>Permission</th>
                <th>manage users</th>
            </thead>
            @if($users->count()>0)
                @foreach($users as $user)
                    <tr>
                        <td>
                            <img src="{{ asset($user->profile->avatar) }}" alt="image" width="40px" height="40px"
                            style="border-radius:50%">
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @if($user->admin ==0)
                            <a href="{{ route('user.admin',['id'=> $user->id]) }}"><button class="btn btn-info btn-xs">Make Admin</button></a>
                            @else
                                <a href="{{ route('user.not.admin',['id'=> $user->id]) }}"><button class="btn btn-danger btn-xs">Revoke Permission</button></a>
                            @endif
                        </td>

                        <td>
                            <a class="btn btn-info btn-xs" href="{{ route('user.edit', ['id' => $user->id]) }}"> Edit</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('user.delete', ['id' => $user->id]) }}"> Delete</a>
                        </td>
                    </tr>

                @endforeach
            @else
                <tr>
                    <td colspan="4">No users exist</td>
                </tr>
            @endif
        </table>

    </div>

</div>


@stop