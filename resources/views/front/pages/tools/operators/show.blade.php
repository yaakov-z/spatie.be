@php
/** @var \App\Operators\OperatorPage $page */
@endphp

<x-operators title="PHP operators" description="Search for PHP operators">
    <a href="{{ action([\App\Http\Controllers\OperatorsController::class, 'index']) }}">
        Back
    </a>

    <div class="mx-auto max-w-6xl px-4 py-16">
        <main>
            <h1>
                {{ $page->title }}
            </h1>

            {!! $page->getContents() !!}

            @if($page->getRelatedPages()->isNotEmpty())
                <h2>Related</h2>
                <ul>
                    @foreach($page->getRelatedPages() as $page)
                        <li>
                            <a href="{{ $page->getUrl() }}">
                                {{ $page->getTitle() }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </main>
    </div>
</x-operators>
