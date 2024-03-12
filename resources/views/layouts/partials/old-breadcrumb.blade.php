@if(!request()->routeIs('dashboard'))
<div class="d-flex mb-2 justify-content-between">
    <button onclick="window.history.back();" class="btn btn-sm btn-outline-primary"><span class="bi bi-arrow-return-left"></span>
        {{ __('global.back_to_list') }}
    </button>
    @if(isset($pageName))
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if($pageName['route'] == 'dashboard')
                    <li class="breadcrumb-item active" aria-current="page">{{ __(config('pages.dashboard.trans')) }}</li>
                @else
                    @if($pageName['parent'])
                        <li class="breadcrumb-item"><a href="{{ route(config('pages.dashboard.route')) }}">{{ __(config('pages.dashboard.trans')) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __($pageName['trans']) }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ route(config('pages.dashboard.route')) }}">{{ __(config('pages.dashboard.trans')) }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route(config('pages.' . $pageName['namespace'] . 'index.route')) }}">{{ __(config('pages.' . $pageName['namespace'] . 'index.trans')) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __($pageName['trans']) }}</li>
                    @endif
                @endif
            </ol>
        </nav>
    @endif

</div>
@endif
