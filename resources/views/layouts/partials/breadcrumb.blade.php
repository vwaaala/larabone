@php
    // Define $pageName with the current route name
    $pageName = request()->route()->getName();

    function generateBreadcrumb($pages, $currentPage, &$breadcrumb = [], &$isActive = false) {
        // Find the current page in the pages array
        foreach ($pages as $page) {
            if ($page['href'] === $currentPage) {
                $breadcrumb[] = ['text' => __($page['text']), 'href' => route($page['href']), 'active' => true];
                // If the current page has a parent, add the parent to the breadcrumb
                if (isset($page['parentHref'])) {
                    $breadcrumb[] = ['text' => __($page['parentText']), 'href' => route($page['parentHref']), 'active' => false];
                }
                $isActive = true; // Set the current page as active
                break;
            }
            if (!empty($page['children'])) {
                // Recursively search for the current page in the children of the current page
                generateBreadcrumb($page['children'], $currentPage, $breadcrumb, $isActive);
                // If the current page or any of its children are active, set the parent as inactive
                if ($isActive) {
                    $breadcrumb[count($breadcrumb) - 1]['active'] = false;
                    $isActive = false;
                }
            }
        }
    }

    $pages = config('pages');
    $breadcrumb = [];
    $isActive = false;

    generateBreadcrumb($pages, $pageName, $breadcrumb, $isActive);
@endphp

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($breadcrumb as $crumb)
            <li class="breadcrumb-item{{ $crumb['active'] ? ' active' : '' }}">
                @if(!$crumb['active'])
                    <a href="{{ $crumb['href'] }}">{{ $crumb['text'] }}</a>
                @else
                    {{ $crumb['text'] }}
                @endif
            </li>
        @endforeach
    </ol>
</nav>
