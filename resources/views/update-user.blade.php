<x-layout>
    {{-- UPDATE USER --}}
    <main class="admin-page__container update-page">
        <x-header-nav navActive="employee-management" :currentUser="$currentUser"/>
        <div class="update-modal-container" id="modalContainer">
            <h2 class="modal-header">Update Info</h2>
            @foreach ($admins as $admin)
                @if ($admin->id === $user->id)
                    <form action="{{ route('users.update', $admin->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="data-container">
                                <label for="user-name">Name:</label>
                                <input type="hidden" name="user_id" id="user_id" value="{{ $admin->id }}" hidden>
                                <div>
                                    <input class="updated user-name" type="text" name="user-name" id="userName" disabled value="{{ $admin->firstname }} {{ $admin->lastname }}">
                                </div>
                            </div>
                    
                            <div class="data-container">
                                <label for="user-email">Email:</label>
                                <div>
                                    <input class="updated user-email" type="email" name="user-email" id="userEmail" disabled value="{{ $admin->email }}">
                                </div>
                            </div>

                            <div class="data-container">
                                <label for="employee_id">Employee ID:</label>
                                <div>
                                    <input class="updated emp-number" type="text" name="employee_id" id="empId" disabled value="{{ $admin->employee_id }}">
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
                @endif
            @endforeach
        </div>
    </main>
</x-layout>
