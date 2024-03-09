<div class="sidebar d-flex justify-content-between flex-wrap flex-column">
    <ul class="nav flex-column w-100">
        <!-- brand logo -->
        <a href="{{ route('dashboard') }}" class="h3 p-2">
            <img
                src="{{ asset(config('app.logo')) }}" alt="config('app.name', 'LaraBone')"
                class="d-inline-block align-top"
                style="max-height: 35px;">
        </a>
        <!-- dashboard -->
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link"
               aria-current="page"
               href="{{ route('dashboard') }}">{{ __('global.dashboard') }}</a>
        </li>
        <!-- permissions -->
        @can('permission_show')
            <li class="nav-item {{ request()->routeIs(config('pages.permissions.index.route')) ? 'active' : '' }}">
                <a class="nav-link"
                   href="{{ route('permissions.index') }}">{{ __('pages.permissions.title') }}</a>
            </li>
        @endcan
        <!-- roles -->
        @canany(['role_show', 'role_create', 'role_edit', 'role_delete'])
            <li class="nav-item {{ in_array(request()->route()->getName(), ['roles.index','roles.show', 'roles.create', 'roles.edit']) ? 'active' : '' }}">
                <a href="#" class="nav-link dropdown-toggle collapsed d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#roles-menu-item-collapse"
                   aria-expanded="true">
                   {{ __('pages.roles.title') }}
                </a>
                <div class="collapse {{ in_array(request()->route()->getName(), ['roles.index','roles.show', 'roles.create', 'roles.edit']) ? 'show' : '' }}" id="roles-menu-item-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('roles.index') ? 'current' : '' }}"
                               href="{{ route('roles.index') }}">{{ __('global.all') }} {{ __('pages.roles.title') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('roles.create') ? 'current' : '' }}"
                               href="{{ route('roles.create') }}">{{ __('global.add') }} {{ __('pages.roles.title_singular') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan
        <!-- users -->
        @canany(['user_show', 'user_create', 'user_edit', 'user_delete'])
            <li class="nav-item {{ in_array(request()->route()->getName(), ['users.index', 'users.edit', 'users.create', 'users.show']) ? 'active' : '' }}">
                <a href="#" class="nav-link dropdown-toggle collapsed d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#users-menu-item-collapse"
                   aria-expanded="true">
                   {{ __('pages.users.title') }}
                </a>
                <div class="collapse {{ in_array(request()->route()->getName(), ['users.index', 'users.edit', 'users.create', 'users.show']) ? 'show' : '' }}" id="users-menu-item-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.index') ? 'current' : '' }}"
                               href="{{ route('users.index') }}">{{ __('global.all') }} {{ __('pages.users.title') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.create') ? 'current' : '' }}"
                               href="{{ route('users.create') }}">{{ __('global.add') }} {{ __('pages.users.title_singular') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcanany
        <!-- support -->
        @can('support_ticket_show')
            <li class="nav-item {{ request()->routeIs('support_ticket.index') || request()->routeIs('support_ticket.create') || request()->routeIs('support_ticket.show') ? 'active' : '' }}">
                <a href="#" class="nav-link dropdown-toggle collapsed d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#support-menu-item-collapse"
                   aria-expanded="true">
                    {{ __('support_ticket.namespace') }}
                </a>
                <div class="collapse {{ request()->routeIs('support_ticket.index') || request()->routeIs('support_ticket.create') || request()->routeIs('support_ticket.show') ? 'show' : '' }}" id="support-menu-item-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('support_ticket.index') ? 'current' : '' }}"
                               href="{{ route('support_ticket.index') }}">{{ __('global.all') }} {{ __('support_ticket.title') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('support_ticket.create') ? 'current' : '' }}"
                               href="{{ route('support_ticket.create') }}">{{ __('global.add') }} {{ __('support_ticket.title_singular') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan

        <!-- settings -->
        @can('settings_show')
            <li class="nav-item {{ request()->routeIs('settings.index') || request()->routeIs('settings.generalInfo') || request()->routeIs('settings.smtpInfo') ? 'active' : '' }}">
                <a href="#" class="nav-link dropdown-toggle collapsed d-flex align-items-center justify-content-between" data-bs-toggle="collapse" data-bs-target="#support-menu-item-collapse"
                    aria-expanded="true">
                    {{ __('pages.settings.title') }}
                </a>
                <div class="collapse {{ request()->routeIs('settings.index') || request()->routeIs('settings.generalInfo') || request()->routeIs('settings.smtpInfo') ? 'show' : '' }}" id="support-menu-item-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('settings.index') ? 'current' : '' }}"
                                href="{{ route('settings.index') }}">{{ __('global.all') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('settings.generalInfo') ? 'current' : '' }}"
                                href="{{ route('settings.generalInfo') }}">{{ __('pages.settings.general') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('settings.smtpInfo') ? 'current' : '' }}"
                                href="{{ route('settings.smtpInfo') }}">{{ __('pages.settings.smtp') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endcan
    </ul>
</div>
