<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header text-center">
                <div class="dropdown profile-element">
                    <a href="{{ route('main') }}" target="_blank">
                        <img alt="Logo" style="width: 100px; margin-bottom: 20px;"
                             src="{{ asset('/img/logo.jpg') }}"/>
                    </a>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">Привет, <p class="text-capitalize">{{ Auth::user()->name }}!</p></span>
                        <span class="text-muted text-xs block">Вы зашли как: {{ Auth::user()->role }} <b
                                class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Выход
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                Профиль
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    WHO
                </div>
            </li>
            <li @if(request()->routeIs('admin.dashboard')) class="mm-active" @endif>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">Головна</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-book-open"></i>
                    <span class="nav-label">Меню</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">
                            <i class="fas fa-list-alt"></i>
                            <span class="nav-label">Категорії</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li @if(request()->routeIs('admin.categories.index')) class="mm-active" @endif>
                                <a href="{{ route('admin.categories.index') }}">
                                    <i class="fa fa-th-list"></i>
                                    Список категорій
                                </a>
                            </li>
                            <li @if(request()->routeIs('admin.categories.create')) class="mm-active" @endif>
                                <a href="{{ route('admin.categories.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Добавити категорію
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-utensils"></i>
                            <span class="nav-label">Продукти</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li @if(request()->routeIs('admin.products.index')) class="mm-active" @endif>
                                <a href="{{ route('admin.products.index') }}">
                                    <i class="fa fa-th-list"></i>
                                    Список продуктів
                                </a>
                            </li>
                            <li @if(request()->routeIs('admin.products.create')) class="mm-active" @endif>
                                <a href="{{ route('admin.products.create') }}">
                                    <i class="fa fa-plus"></i>
                                    Добавити продукт
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</nav>
