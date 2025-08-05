
<div>
    <div>
        <input 
        class="create-user__input-box user-searchbox searchBox"
        wire:model.live.debounce.300ms="search" 
        type="text" 
        name="respondents_fullname" 
        id="userNameInputBox" 
        autocomplete="off" 
        value="{{ old('respondents_fullname') }}"
        />

        <input 
            class="employee-id"
            type="hidden" 
            name="respondent_id" 
            id="userId" 
            autocomplete="off" 
            value="{{ old('respondents_id') }}"
        />
    </div>
    @error('respondent_id')
        <p>{{ $message }}</p>
    @enderror


    @if (sizeof($results) > 0)
        <ul class="search-result-container" id="userSearchResultContainer">
            @foreach ($results as $result)
                <li class="user-search-result result employee" data-email="{{ $result->email }}" value="{{ $result->id }}">{{ $result->lastname }}, {{ $result->firstname }} {{ $result->middle_name }}: {{ $result->employee_id }}</li>
            @endforeach
        </ul>
    @endif
</div>