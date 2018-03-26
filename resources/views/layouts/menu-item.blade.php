<li class="{{Request::segment(1) == '' ? 'active ' : ''}}treeview">
    <a href="{{route('index')}}">
        <i class="fa fa-fw fa-dashboard "></i><span>{{trans('words.mh.main_navigation')}}</span>
    </a>
</li>
<li class="{{Request::segment(1) == 'users' ? 'active ' : ''}}">
    <a href="{{route('users.index')}}">
        <i class="fa fa-fw fa-users"></i>
        <span>{{trans('words.mi.users')}}</span>
    </a>
</li>
<!--<li class="{{Request::segment(1) == 'stores' ? 'active ' : ''}}">
    <a href="{{route('stores.index')}}">
        <i class="fa fa-fw fa-building"></i>
        <span>{{trans('words.mi.stores')}}</span>
    </a>
</li>-->
<!--<li class="{{(Request::segment(1) == 'lists') || (Request::segment(1) == 'banners') || (Request::segment(1) == 'campaigns')  || (Request::segment(1) == 'messagings') || Request::segment(1) == 'offers' ? 'active ' : ''}}treeview">
    <a href="#">
        <i class="fa fa-fw fa-bullhorn "></i><span>{{trans('words.mh.advertising_manager')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{Request::segment(1) == 'campaigns' ? 'active ' : ''}}">
            <a href="{{ route('campaigns.index') }}">
                <i class="fa fa-fw fa-flag"></i>
                <span>{{trans('words.mi.campaigns')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'banners' ? 'active ' : ''}}">
            <a href="{{route('banners.index')}}">
                <i class="fa fa-fw fa-file-image-o"></i>
                <span>{{trans('words.mi.banners')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'encarte' ? 'active ' : ''}}">
            <a href="{{ route('encartes.index') }}">
                <i class="fa fa-fw fa-newspaper-o"></i>
                <span>Encarte</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'offers' ? 'active ' : ''}}">
            <a href="{{route('offers.index')}}">
                <i class="fa fa-fw fa-gift"></i>
                <span>{{trans('words.mi.offers')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'lists' ? 'active ' : ''}}">
            <a href="{{ route('lists.index') }}">
                <i class="fa fa-fw fa-book"></i>
                <span>{{trans('words.mi.lists')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'messagings' ? 'active ' : ''}}">
            <a href="{{ route('messagings.index') }}">
                <i class="fa fa-fw fa-bell"></i>
                <span>{{trans('words.mi.messagings')}}</span>
            </a>
        </li>
    </ul>
</li>-->
<!--<li class="{{(Request::segment(1) == 'categories') || (Request::segment(1) == 'groups') ? 'active ' : '' ? 'active ' : '' || (Request::segment(1) == 'tags') ? 'active ' : '' || (Request::segment(1) == 'brands') ? 'active ' : '' || (Request::segment(1) == 'products') ? 'active ' : ''}}treeview">
    <a href="#">
        <i class="fa fa-fw fa-cubes "></i><span>{{trans('words.mh.product_manager')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{Request::segment(1) == 'categories' ? 'active ' : ''}}">
            <a href="{{route('categories.index')}}">
                <i class="fa fa-fw fa-filter"></i>
                <span>{{trans('words.mi.categories')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'groups' ? 'active ' : ''}}">
            <a href="{{route('groups.index')}}">
                <i class="fa fa-fw fa-object-group"></i>
                <span>{{trans('words.mi.groups')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'tags' ? 'active ' : ''}}">
            <a href="{{route('tags.index')}}">
                <i class="fa fa-fw fa-tags"></i>
                <span>{{trans('words.mi.tags')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'brands' ? 'active ' : ''}}">
            <a href="{{route('brands.index')}}">
                <i class="fa fa-fw fa-ticket"></i>
                <span>{{trans('words.mi.brands')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'products' ? 'active ' : ''}}">
            <a href="{{route('products.index')}}">
                <i class="fa fa-fw fa-shopping-bag"></i>
                <span>{{trans('words.mi.products')}}</span>
            </a>
        </li>
    </ul>
</li>-->
<!--<li class="{{(Request::segment(1) == 'terms') || Request::segment(1) == 'profiles' || Request::segment(1) == 'admin' || Request::segment(1) == 'about' ? 'active ' : ''}}treeview">
    <a href="#">
        <i class="fa fa-fw fa-cogs "></i><span>{{trans('words.mh.configuration')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>

    <ul class="treeview-menu">
        @if(Auth::user()->hasAnyRoles('Administrador Master'))
        <li class="{{ Request::segment(1) == 'admin' ? 'active ' : '' }}">
            <a href="{{ route('admin.index', 1) }}">
                <i class="fa fa-fw fa-user-plus"></i>
                <span>{{ trans('words.mi.admin') }}</span>
            </a>
        </li>
        @endif
        <li class="{{ Request::segment(1) == 'terms' ? 'active ' : '' }}">
            <a href="{{ route('terms.edit', 1) }}">
                <i class="fa fa-fw fa-file-text"></i>
                <span>{{ trans('words.mi.terms') }}</span>
            </a>
        </li>
        <li class="{{Request::segment(1) == 'about' ? 'active ' : ''}}">
            <a href="{{ route('about.edit', 2) }}">
                <i class="fa fa-fw fa-bolt"></i>
                <span>{{ trans('words.mi.about') }}</span>
            </a>
        </li>
    </ul>
</li>-->
@if(Auth::user()->hasAnyRoles('Administrador Master'))
<!--<li class="{{ (Request::segment(1) == 'imports' ) ? 'active ' : ''}}treeview">
    <a href="#">
        <i class="fa fa-fw fa-retweet "></i><span>{{trans('words.mh.integrations')}}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li class="{{Request::segment(2) == 'products' ? 'active ' : ''}}">
            <a href="{{route('imports.products.index')}}">
                <i class="fa fa-fw fa-cube"></i>
                <span>{{trans('words.mi.imports.products')}}</span>
            </a>
        </li>
        <li class="{{Request::segment(2) == 'sales' ? 'active ' : ''}}">
            <a href="{{route('imports.sales.index')}}">
                <i class="fa fa-fw fa-dollar"></i>
                <span>{{trans('words.mi.imports.sales')}}</span>
            </a>
        </li>
    </ul>
</li>-->
@endif