<x-layout>
    <main class="change-password-page">
        <div class="change-password__container">
            <section class="change-password__section form">
                <form action="{{ route('update.password', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h1 class="change-password__main-header">Change your password</h1>

                    <div class="change-password__input-container">
                        <label for="password">New Password</label>
                        <input class="change-password__input-box" type="password" name="password" id="newPassword" autofocus>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                    @error('password')
                        {{ $message }}
                    @enderror

                    <div class="change-password__input-container">
                        <label for="confirm_password">Confirm New Password</label>
                        <input class="change-password__input-box" type="password" name="password_confirmation" id="confirmPassword">
                    </div>
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror

                    <button class="change-password--btn" type="submit">Change password</button>
                    <a href="{{ session('redirected_from_login') ? route('logout') : route('users.index') }}" class="change-password--btn cancel" type="submit">Cancel</a>
                    
                </form>
            </section>

            <section class="change-password__section rules">
                <h2 class="change-password__sub-header">Password must contain:</h2>
                <ul class="password-rules">
                    <li>At least 8-20 characters long</li>
                    <li>At least 1 capital letter(A-Z)</li>
                    <li>At least 1 number(0-9)</li>
                    <li>At least 1 symbol character</li>
                </ul>
            </section>
        </div>
    </main>
</x-layout>