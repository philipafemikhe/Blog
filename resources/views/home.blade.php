@extends('layouts.app')

@section('content')
<!-- <form action="/results" method="get">
    {{ csrf_field() }}
   <span class="glyphicon glyphicon-search"><input type="text" name="query"></input></span>
   
</form> -->

<h1>Welcome!!!</h1>
<a href="{{ route('social.auth', ['provider'=>'github']) }}" class="btn btn-block btn-social btn-github btn-flat"><i class="fa fa-github"></i></a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$data['userCount']}}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="{{route('users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>

        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$data['postCount']}}
                        {{--<sup style="font-size: 20px">%</sup>--}}
                    </h3>

                    <p>Posts</p>
                </div>
                <div class="icon">
                    <i class="fa  fa-opencart"></i>
                </div>
                <a href="{{route('posts')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$data['categoryCount']}}</h3>

                    <p>Categories</p>
                </div>
                <div class="icon">
                    <i class="fa fa-truck"></i>
                </div>
                <a href="{{route('categories')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$data['tagCount']}}</h3>

                    <p>Tags</p>
                </div>
                <div class="icon">
                    <i class="fa fa-arrows-alt"></i>
                </div>
                <a href="{{ route('tags') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->



    </div>
</div>


@endsection
