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
            <li class="nav-item {{ request()->routeIs(config('pages.roles.index.route')) ? 'active' : '' }}">
                <a class="nav-link"
                   href="{{ route('roles.index') }}">{{ __('pages.roles.title') }}</a>
            </li>
        @endcan
        <!-- users -->
        @canany(['user_show', 'user_create', 'user_edit', 'user_delete'])
            <li class="nav-item {{ request()->routeIs(config('pages.users.index.route')) ? 'active' : '' }}">
                <a class="nav-link"
                   href="{{ route('users.index') }}">{{ __('pages.users.title') }}</a>
            </li>
        @endcanany
        <!-- support -->
        @can('support_ticket_show')
            <li class="nav-item {{ request()->routeIs('support_ticket.index') || request()->routeIs('support_ticket.create') || request()->routeIs('support_ticket.show') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#support-menu-item-collapse"
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
    </ul>
</div>
