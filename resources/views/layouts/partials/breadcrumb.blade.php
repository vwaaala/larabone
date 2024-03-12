@php
    // Get the current route name
    $currentRoute = request()->route()->getName();

    // Define the pages structure
    $pages = config('pages');

    // Initialize an empty array to store breadcrumbs
    $breadcrumbs = [];

    // Define a function to generate breadcrumbs recursively
    function generateBreadcrumbs($pages, $currentRoute, &$breadcrumbs) {
        foreach ($pages as $page) {
            if ($currentRoute === $page['href']) {
                $breadcrumbs[] = $page;
                return;
            }

            if (isset($page['children'])) {
                foreach ($page['children'] as $child) {
                    if ($currentRoute === $child['href']) {
                        // Add parent
                        $breadcrumbs[] = $page;
                        // Add child
                        $breadcrumbs[] = $child;
                        return;
                    }
                }
                // If the current route doesn't match any child, check recursively in children
                generateBreadcrumbs($page['children'], $currentRoute, $breadcrumbs);
                // If breadcrumbs are found in children, add parent
                if (!empty($breadcrumbs)) {
                    $breadcrumbs[] = $page;
                    return;
                }
            }
        }
    }

    // Generate breadcrumbs
    generateBreadcrumbs($pages, $currentRoute, $breadcrumbs);
@endphp

@if (!empty($breadcrumbs))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                <li class="breadcrumb-item"><a href="{{ route($breadcrumb['href']) }}">{{ __($breadcrumb['name']) }}</a></li>
            @endforeach
        </ol>
    </nav>
@endif
