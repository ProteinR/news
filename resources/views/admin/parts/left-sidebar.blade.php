<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <!-- Status -->
                <a href="">
                    <i class="fas fa-user-alt"></i>
                    @foreach(auth()->user()->getRoleNames() as $role)
                        <span>{{$role.' '}}</span>
                    @endforeach
                </a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Меню</li>
            <!-- Optionally, you can add icons to the links -->
            @hasanyrole('admin|writer')
                <li class="{{ Request::is('admin/news*') ? 'active' : '' }}"><a href="{{ route('news.index') }}"><i
                                class="fa fa-link"></i>
                        <span>Новости</span></a></li>
            @endhasanyrole

            @hasanyrole('admin|moderator')
            <li class="{{ Request::is('admin/comment*') ? 'active' : '' }}"><a href="{{ route('comment.index') }}"><i
                            class="fa fa-link"></i>
                    <span>Коментарии</span></a></li>
            @endhasanyrole

            @hasanyrole('admin')
                <li class="{{ Request::is('admin/tags*') ? 'active' : '' }}"><a href="{{ route('tags.index')
            }}"><i class="fa fa-link"></i> <span>Теги</span></a></li>
            @endhasanyrole

            @role('admin')
            <li class="{{ Request::is('admin/staff*') ? 'active' : '' }}"><a href="{{ route('staff.index') }}"><i
                            class="fa fa-link"></i> <span>Команда</span></a></li>
            @endrole

            @hasanyrole('admin|moderator')
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>Пользователи</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('admin/users*') ? 'active' : '' }}"><a href="{{ route('users.index')
                    }}">Активные пользователи</a></li>
                    <li ><a href="#">Не активные пользователи</a></li>
                    <li class="{{ Request::is('admin/banned*') ? 'active' : '' }}"><a href="{{ route('users.banned')
                    }}">Забаненные</a></li>
                </ul>
            </li>
            @endhasanyrole
        </ul>
        <!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->
</aside>
