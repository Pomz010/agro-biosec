<x-layout>
    <main class="user-management__page" id="userManagementPage">

        <x-header-nav navActive="user-management" :currentUser="$user" />

        <div class="page-container">
            <section class="create-user__section">
                <form id="createUserForm" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <span>
                        <img src="{{ asset('img/user-icon.svg') }}" height="80" width="80" alt="Create user icon">
                    </span>

                    <h1 class="create-user__form-header">Create New User</h1>
                    
                    <div class="create-user__input-container">
                        <label class="create-user__label" for="respondents_fullname">User</label>
                        <livewire:user-search />
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="create-user__input-container">
                        <label class="create-user__label" for="email">Email</label>
                        <input class="create-user__input-box" name="email" id="userEmail" type="email">
                        @error('email')
                            <p>User email is required!</p>
                        @enderror
                    </div>

                    <div class="create-user__input-container">
                        <label class="create-user__label" for="password">Password</label>
                        <input class="create-user__input-box" name="password" id="userPassword" type="password">
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="create-user__input-container">
                        <label class="create-user__label" for="role">Role</label>
                        <select class="create-user__input-box" name="role" id="userRole">
                            <option value="admin">Admin</option>
                            <option value="standard user">Standard User</option>
                        </select>
                        @error('role')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button class="create-userBtn btn" type="submit">Create</button>
                    </div>
                </form>
            </section>

            <section class="user-list__section">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Employee #</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->employee_id }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->force_password_change === 1 ? 'Pending Password Change' : 'Active' }}</td>
                                <td>
                                    <ul class="user-actions">
                                        <li><a href="{{ route('change.password', $user->id) }}"><img src="{{ asset('img/pass_reset_icon.png') }}" height="25" width="25" alt="Reset password" title="Reset password"></a></li>
                                        <li><button class="delete-user" data-user-id="{{ $user->id }}"><img src="{{ asset('img/del_user.png') }}" height="25" width="25" alt="Delete user" title="Delete user"></button></li>
                                        <li><a href="{{ route('users.show', $user->id) }}"><img src="{{ asset('img/update_role.png') }}" height="25" width="25" alt="Update role" title="Update role"></a></li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>

        <dialog class="delete-confirmation-container__modal" id="confirmDeleteModal">
            <span class="alert-icon__modal"></span>
            <p class="delete-confirmation-header__modal">Are you sure?</p>
            <p class="delete-confirmation-message__modal">This action cannot be undone. All values associated with this field will be lost</p>
            <form action="#" id="deleteUserForm" method="POST">
                @csrf
                @method("delete")
                <button class="delete-user-btn--modal modal-btn btn" id="deleteUserBtn" type="submit">Delete user</button>
            </form>
            <button class="cancel-btn--modal modal-btn btn" id="cancelDeleteBtn">Cancel</button>
        </dialog>

    </main>
</x-layout>