
    <div class="employee-list__searchbox parent-container" id="searchBoxContainer">
        <input 
            class="user-input__inputBox searchBox" 
            wire:model.live.debounce.300ms="search" 
            type="text" 
            name="respondents_fullname" 
            id="employeeNameInputBox" 
            autocomplete="off" 
            value="{{ old('respondents_fullname') }}"
        />

        <input
            type="hidden" 
            name="respondents_id" 
            id="employeeId" 
            autocomplete="off" 
            value="{{ old('respondents_id') }}"
        />


        @if (sizeof($results) > 0)
            <ul class="form search-result-container" id="formSearchResultContainer">
                @foreach ($results as $result)
                    <li class="search-result result employee" value="{{ $result->id }}">{{ $result->lastname }}, {{ $result->firstname }} {{ $result->middle_name }}: {{ $result->employee_id }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    
        