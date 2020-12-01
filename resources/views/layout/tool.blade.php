<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.partials.meta')

    <link rel="stylesheet" href="{{ mix('/css/front.css') }}">
    <link rel="stylesheet" href="https://cloud.typography.com/6194432/6145752/css/fonts.css">
    <livewire:styles>

    @include('layout.partials.favicons')

    <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver,Promise,Array.from,Element.prototype.dataset" defer></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>

    @include('layout.partials.analytics')
    @stack('head')
</head>

<body>
    <script>/* Empty script tag because Firefox has a FOUC */</script>

    <aside>
        <a href="/" class="flex items-center justify-center bg-blue-dark text-white py-2 px-6 text-xs">
            Brought to you by <span class="ml-1 inline-block h-6 w-10">@svg('logo')</span>
        </a>
    </aside>

    {{ $slot }}
    
</body>
</html>
