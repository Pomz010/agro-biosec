<x-layout>
    <main class="employee-management__page">

        {{-- @dd($users[0]) --}}
        <x-header-nav :currentUser="$user" navActive="employee-management" />

        <div class="page-container">
            {{-- EMPLOYEE SEARCH BAR --}}
            <div class="employee-list__create-search">
                <livewire:search-bar />
                <div><a class="__new-employee-btn" href="{{ route('employee.create') }}">Add Employee</a></div>
            </div>
            
            {{-- EMPLOYEE LIST TABLE --}}
            <section class="employee-list__table-container">
                <table id="employeeListTable">
                    <tr>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middle Name</th>
                        <th>Employee #</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($employees as $employee)
                    <tr>
                        <td class="employee__id" hidden value="{{ $employee->id }}">{{ $employee->id }}</td>
                        <td class="employee__lastname">{{ $employee->lastname }}</td>
                        <td class="employee__firstname">{{ $employee->firstname }}</td>
                        <td class="employee__middle-name">{{ $employee->middle_name }}</td>
                        <td class="employee__id">{{ $employee->employee_id }}</td>
                        <td class="employee__email">{{ $employee->email }}</td>
                        <td class="employee__status">{{ $employee->is_resigned === 0 ? "Active" : "Resigned" }}</td>
                        <td class="employee__bu-address">{{ $employee->business_unit_address }}</td>
                        <td>
                            <a href="{{ route('employee.show', $employee->id) }}" class="edit-button">edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </section>

            {{-- EMPLOYEE PAGINATION --}}
                {{ $employees->links() }}
        </div>
    </main>
</x-layout>