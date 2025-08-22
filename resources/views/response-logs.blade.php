<x-layout>
    
    <div class="p-4 bg-white rounded shadow">
        <livewire:questionnaire-filter />
        {{-- <div class="grid grid-cols-4 gap-4 mb-4">
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
        </div> --}}

    <!-- Results -->
        <div>
            @if($results->count())
                <table class="w-full border-collapse border">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">Name</th>
                            <th class="border p-2">Questionnaire</th>
                            <th class="border p-2">Answer</th>
                            <th class="border p-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $res)
                            <tr>
                                <td class="border p-2">{{ $res->respondent->name ?? 'N/A' }}</td>
                                <td class="border p-2">{{ $res->questionnaire->title ?? '' }}</td>
                                <td class="border p-2">{{ $res->answer }}</td>
                                <td class="border p-2">{{ $res->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-500">No results found.</p>
            @endif
        </div>
    </div>

</x-layout>
