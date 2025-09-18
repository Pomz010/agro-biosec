<div class="entry-logs-container">
    <div>
        <livewire:search-bar />
        <div class="entry-logs__filter">
            <select wire:model="group" class="">
                <option value="employees">Employees</option>
                <option value="visitors">Visitors</option>
            </select>

            @if($group === 'employees')
                <select wire:model="businessUnit" class="">
                    <option value="">-- Select Business Unit --</option>
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Finance">Finance</option>
                </select>
            @endif

            <input type="date" wire:model="startDate" class="">
            <input type="date" wire:model="endDate" class="">

            <button 
                wire:click="applyFilters" 
                class="apply-btn app-btn btn">
                Apply
            </button>
        </div>
        
    </div>

    <div>
        @if(!empty($results))
            <table class="">
                <thead>
                    <tr class="">
                        <th class="">ID</th>
                        <th class="">Respondent</th>
                        <th class="">Questionnaire</th>
                        <th class="">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td class="">{{ $result->id }}</td>
                            <td class="">{{ $result->respondent->firstname . " " . $result->respondent->lastname?? '-' }}</td>
                            <td class="">{{ $result->questionnaire->question_text ?? '-' }}</td>
                            <td class="">{{ $result->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="">No results yet. Apply filters to see data.</p>
        @endif
    </div>
</div>
