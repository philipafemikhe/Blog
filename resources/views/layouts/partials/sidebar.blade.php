<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="/results" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="{{ route('posts') }}">View Posts</a></li>
            <li><a href="{{ route('post.create')}}">Create Post</a></li>
            <li><a href="{{ route('post.create')}}">View Trashed Posts</a></li>

            <li><a href="{{ route('users') }}">View users</a></li>
            <li><a href="{{ route('user.create') }}">Create user</a></li>
            <li><a href="{{ route('user.profile') }}"> My profile</a></li>
            <li><a href="{{ route('category.create') }}"> Create Category</a></li>
            <li><a href="{{ route('categories')  }}">View Categories</a></li>


            <li><a href="{{ route('tag.create')}}">Create Tags</a></li>
            <li><a href="{{ route('tags')}}">View Tags</a></li>
            <li><a href="{{ route('test') }}"> Test</a></li>

            <li class="treeview">
               <a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.multilevel') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('posts') }}">View Posts</a></li>
                    <li><a href="{{ route('post.create')}}">Create Post</a></li>
                    <li><a href="{{ route('post.create')}}">View Trashed Posts</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
