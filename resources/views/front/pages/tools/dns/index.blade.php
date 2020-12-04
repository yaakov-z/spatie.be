<x-page
    title="Dns records"
    description="Look up dns records"
>
    @if(isset($output))
        <pre class="main__results">{{ $output }}</pre>
    @endif

    @error('input')
        <p id="results" class="alert alert--danger">
            {{ $message }}
        </p>
    @enderror

    <form id="form" method="post">
        @csrf

        <span class="carret -green">&rarr;</span>
        <input
            id="url"
            name="command"
            placeholder="Enter a domain"
            autocomplete="off"
            autocorrect="off"
            autocapitalize="off"
            autofocus="autofocus"
            spellcheck="false"
        />
    </form>
</x-page>
