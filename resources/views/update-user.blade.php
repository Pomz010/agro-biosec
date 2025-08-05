<x-layout>
    {{-- UPDATE USER --}}
    <main class="admin-page__container update-page">
        <x-header-nav navActive="employee-management" :currentUser="$user"/>
        <div class="update-modal-container" id="modalContainer">
            <h2 class="modal-header">Update Info</h2>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                    <div class="data-container">
                        <label for="user-name">Name:</label>
                        <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}" hidden>
                        <div>
                            <input class="updated user-name" type="text" name="user-name" id="userName" disabled value="{{ $user->firstname }} {{ $user->lastname }}">
                        </div>
                    </div>
                
                    <div class="data-container">
                        <label for="user-email">Email:</label>
                        <div>
                            <input class="updated user-email" type="email" name="user-email" id="userEmail" disabled value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="data-container">
                        <label for="employee_id">Employee ID:</label>
                        <div>
                            <input class="updated emp-number" type="text" name="employee_id" id="empId" disabled value="{{ $user->employee_id }}">
                        </div>
                    </div>

                    <div class="data-container">
                        <label for="role">Role:</label>
                        <select class="updated user-role" name="role" id="updateUserRole">
                            <option value="admin">Admin</option>
                            <option value="standard user">Standard User</option>
                        </select>
                    </div>

                <div class="button-container">
                    <a href="{{ route('users.index') }}" class="cancelBtn update-btn" id="cancelBtn" type="button">Back</a>
                    <button class="update-btn" type="submit">Save Changes</button>
                </div>
                
            </form>
        </div>
    </main>
</x-layout>
