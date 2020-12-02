@php
    /** @var \Illuminate\Support\Collection|\App\Operators\OperatorPage[][] $pages */
@endphp

<x-operators title="PHP operators" description="Search for PHP operators">
    <div class="mx-auto max-w-6xl px-4 py-16">
        <header class="flex justify-center">
            <h1 class="banner-slogan">
                PHP operators
            </h1>
        </header>

        <main>
            <div class="py-8 flex justify-center">
                <input type="search" class="form-input rounded-full px-4 w-64" id="operator-filter" data-turbolinks-permanent autofocus>
            </div>

            @foreach($pages as $category => $pagesForCategory)
                <h2>{{ ucfirst($category) }}</h2>

                <ul>
                    @foreach($pagesForCategory as $page)
                        <li data-operator="{{ $page->getTags()->join(',') }}">
                            <a href="{{ $page->getUrl() }}">
                                <code>{{ $page->getTitle() }}</code>
                                {{ $page->getTeaser() }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </main>
    </div>
</x-operators>
