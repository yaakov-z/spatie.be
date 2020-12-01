@php
/** @var \App\Operators\OperatorPage $page */
@endphp

<x-tool title="PHP operators" description="Search for PHP operators">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <main>
            <h1>
                {{ $page->title }}
            </h1>

            {!! $page->getContents() !!}
        </main>
    </div>
</x-tool>
