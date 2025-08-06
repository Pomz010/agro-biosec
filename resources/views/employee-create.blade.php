<x-layout>
    <main class="admin-page__container update-page">
        <x-header-nav navActive="employee-management" :currentUser="$currentUser" />
        <div class="page-container new-employee-page">
                    <div class="update-modal-container" id="modalContainer">
            <h2 class="modal-header">Add New Employee</h2>
            <form action="{{ route('employee.store') }}" method="POST">
                @csrf
                <div class="data-container">
                    <label for="emp_lastname">Lastname:</label>
                    <div>
                        <input class="updated emp-lastname" type="text" name="emp_lastname" value="{{ old('emp_lastname') }}">
                        @error('emp_lastname')
                            <p class="create-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="data-container">
                    <label for="emp_firstname">Firstname:</label>
                    <div>
                        <input class="updated emp-firstname" type="text" name="emp_firstname" value="{{ old('emp_firstname') }}">
                        @error('emp_firstname')
                            <p class="create-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="data-container">
                    <label for="emp_middle_name">Middle Name:</label>
                    <div>
                        <input class="updated emp-middle-name" type="text" name="emp_middle_name" value="{{ old('emp_middle_name') }}">
                        @error('emp_middle_name')
                            <p class="create-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="data-container">
                    <label for="employee_id">Employee #:</label>
                    <div>
                        <input class="updated emp-number" type="text" name="employee_id" value="{{ old('employee_id') }}">
                        @error('employee_id')
                            <p class="create-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="data-container">
                    <label for="emp_email">Email</label>
                    <div>
                        <input class="updated emp-email" type="text" name="emp_email" value="{{ old('emp_email') }}">
                        @error('emp_email')
                            <p class="create-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="data-container">
                    <label for="emp_address">Address:</label>
                    <div>
                        <input class="updated emp-address" type="text" name="emp_address" value="{{ old("emp_address") }}">
                        @error('emp_address')
                            <p class="create-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="data-container">
                    <input class="updated emp-status" type="hidden" name="emp_status" value="0">
                </div>

                <div class="button-container">
                    <a href="{{ route('employee.index') }}" class="cancelBtn update-btn" id="cancelBtn" type="button">Back</a>
                    <button class="update-btn" type="submit">Save Changes</button>
                </div>
                
            </form>
        </div>
        </div>
    </main>
</x-layout>