<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('admin.dashboard') }}" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
{{--            <li>--}}
{{--                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">--}}
{{--                    <i class="fab fa-laravel" ></i>--}}
{{--                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>--}}
{{--                    <b class="caret mt-1"></b>--}}
{{--                </a>--}}

{{--                <div class="collapse show" id="laravel-examples">--}}
{{--                    <ul class="nav pl-4">--}}
{{--                        <li @if ($pageSlug == 'profile') class="active " @endif>--}}
{{--                            <a href="{{ route('profile.edit')  }}">--}}
{{--                                <i class="tim-icons icon-single-02"></i>--}}
{{--                                <p>{{ __('User Profile') }}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li @if ($pageSlug == 'users') class="active " @endif>--}}
{{--                            <a href="{{ route('admin.users.index')  }}">--}}
{{--                                <i class="tim-icons icon-bullet-list-67"></i>--}}
{{--                                <p>{{ __('User Management') }}</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li @if ($pageSlug == 'notifications') class="active " @endif>--}}
{{--                <a href="#">--}}
{{--                    <i class="tim-icons icon-bell-55"></i>--}}
{{--                    <p>{{ __('Notifications') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('admin.users.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'photo-categories') class="active " @endif>
                <a href="{{ route('admin.categories.index') }}">
                    <i class="far fa-list-alt"></i>
                    <p>{{ __('Photo Categories') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'photos') class="active " @endif>
                <a href="{{ route('admin.photos.index') }}">
                    <i class="far fa-images"></i>
                    <p>{{ __('Photos') }}</p>
                </a>
            </li>
{{--            <li @if ($pageSlug == 'typography') class="active " @endif>--}}
{{--                <a href="{{ route('pages.typography') }}">--}}
{{--                    <i class="tim-icons icon-align-center"></i>--}}
{{--                    <p>{{ __('Typography') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li @if ($pageSlug == 'rtl') class="active " @endif>--}}
{{--                <a href="{{ route('pages.rtl') }}">--}}
{{--                    <i class="tim-icons icon-world"></i>--}}
{{--                    <p>{{ __('RTL Support') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">--}}
{{--                <a href="{{ route('pages.upgrade') }}">--}}
{{--                    <i class="tim-icons icon-spaceship"></i>--}}
{{--                    <p>{{ __('Upgrade to PRO') }}</p>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
