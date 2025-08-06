<x-layout>
    {{-- UPDATE USER --}}
    <main class="admin-page__container update-page">
        <x-header-nav navActive="employee-management" :currentUser="$currentUser"/>
        <div class="update-modal-container" id="modalContainer">
            <h2 class="modal-header">Update Info</h2>
            <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="data-container">
                        <label for="emp_lastname">Lastname:</label>
                        <input type="hidden" name="respondent_id" id="respondent_id" value="{{ $employee->id }}" hidden>
                        <div>
                            <input class="updated emp-lastname" type="text" name="lastname" id="emp_lastname" value="{{ $employee->lastname }}">
                            @error('lastname')
                                <p class="update-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                
                    <div class="data-container">
                        <label for="emp_firstname">Firstname:</label>
                        <div>
                            <input class="updated emp-firstname" type="text" name="firstname" id="emp_firstname" value="{{ $employee->firstname }}">
                            @error('firstname')
                                <p class="update-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="data-container">
                        <label for="emp_middle_name">Middle Name:</label>
                        <div>
                            <input class="updated emp-middle-name" type="text" name="middle_name" id="emp_middle_name" value="{{ $employee->middle_name }}">
                            @error('middle_name')
                                <p class="update-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="data-container">
                        <label for="employee_id">Employee ID:</label>
                        <div>
                            <input class="updated emp-number" type="text" name="employee_id" id="emp_id" value="{{ $employee->employee_id }}">
                            @error('employee_id')
                                <p class="update-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="data-container">
                        <label for="email">Email:</label>
                        <div>
                            <input class="updated emp-email" type="text" name="email" id="emp_email" value="{{ $employee->email }}">
                            @error('email')
                                <p class="update-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="data-container">
                        <label for="emp_address">Address:</label>
                        <div>
                            <input class="updated emp-address" type="text" name="business_unit_address" id="emp_address" value="{{ $employee->business_unit_address }}">
                        </div>
                        @error('business_unit_address')
                            <p class="update-error">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="data-container resigned-container">
                    <label for="emp_status">Resigned:</label>
                    <div class="resigned-checkbox">
                        <input class="updated emp-status" type="hidden" name="is_resigned" value="0">
                        <input class="updated emp-status" type="checkbox" name="is_resigned" value="1" {{ old("is_resigned") ? "checked" : "" }}>
                    </div>
                </div>

                <div class="button-container">
                    <a href="{{ route('employee.index') }}" class="cancelBtn update-btn" id="cancelBtn" type="button">Back</a>
                    <button class="update-btn" type="submit">Save Changes</button>
                </div>
                
            </form>
        </div>
    </main>
</x-layout>
