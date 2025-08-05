<div>
    <form class="employee-list__searchbox" action="{{ route('employee.index') }}" method="GET">
        {{-- <input class="searchBox" wire:model.live.debounce.300ms="search" type="search" name="searchBox" id="searchBox" autocomplete="off" /> --}}
        <input class="searchBox" type="search" name="searchBox" id="searchBox" autocomplete="off" />
        <button type="submit">Search</button>
    </form>
    @if (sizeof($results) > 0)
        <ul class="search-result-container" id="searchResultContainer">
            @foreach ($results as $result)
                <li class="search-result result">{{ $result->lastname }}, {{ $result->firstname }} {{ $result->middle_name }}: {{ $result->employee_id }}</li>
            @endforeach
        </ul>
    @endif
</div>

