<div class="grid grid-cols-4 gap-4 mb-4">
<!-- Date range -->
<div>
    <label class="block text-sm">Start Date</label>
    <input type="date" wire:model="startDate" class="w-full border rounded px-2 py-1">
</div>

<div>
    <label class="block text-sm">End Date</label>
    <input type="date" wire:model="endDate" class="w-full border rounded px-2 py-1">
</div>

<!-- Business Unit -->
@if($group === 'employees')
    <div>
        <label class="block text-sm">Business Unit</label>
        <select wire:model="businessUnit" class="w-full border rounded px-2 py-1">
            <option value="">All</option>
            @foreach($businessUnits as $unit)
                <option value="{{ $unit }}">{{ $unit }}</option>
            @endforeach
        </select>
    </div>
@endif

<!-- Group -->
<div>
    <label class="block text-sm">Group</label>
    <select wire:model="group" class="w-full border rounded px-2 py-1">
        <option value="employees">Employees</option>
        <option value="visitors">Visitors</option>
    </select>
</div>

<!-- Clear Filters Button -->
<div class="col-span-4 flex justify-end">
    <button wire:click="clearFilters"
        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded">
        Clear Filters
    </button>
</div>
</div>
