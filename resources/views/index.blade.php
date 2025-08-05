<x-layout>
    <main class="menu-card">
        <div class="menu-container">
            <div class="card-container">
                <h1 class="card-container__header" id="greetings">Good Morning!</h1>
                <a href="/employee-response/create" class="card__employees card" id="employeeCard">
                    <img src="{{ asset('img/apc_logo.png') }}" alt="APC Logo" width="250" height="150">
                    <p>APC Employees</p>
                </a>
                <a href="/visitor-response/create" class="card__visitors card">
                    <img src="{{ asset('img/visitors_icon.png') }}" alt="Visitors Logo" width="250" height="150">
                    <p>Visitors</p>
                </a>
            </div>
        </div>
    </main>
</x-layout>
