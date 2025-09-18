<x-layout>

    <main class="response-logs__container">
        <header class="header" id="adminPage">
            <x-header-nav :currentUser="$user" navActive="response-management" />
            {{-- <nav class="header-nav">
                <ul>
                    <span id="headerNavContainer">
                        <li><a href="#"><img src="./img/apc_logo2.png" alt="Navigation Logo" width="35" height="35"></a></li>
                        <li class="nav-links"><a href="#">Employee Management</a></li>
                        <li class="nav-active nav-links"><a href="#">Entry Logs</a></li>
                        <li class="nav-links"><a href="#">User Management</a></li>
                    </span>
                    <span>
                        <li>Hi, Rolly!</li>
                        <li><a href="#">Reset Password</a></li>
                        <li><a href="#">Sign Out</a></li>
                    </span>                
                </ul>
            </nav> --}}
        </header>

        <section class="filter-section">
            <form class="filter-form" id="filterForm" action="{{ route('response-logs-filter') }}" method="POST">
                @csrf
                <div class="searchbox-filter__container filter-group">
                    <p class="filter-label" class="filter-label">Filter by</p>
                    <livewire:form-search-bar />
                </div>

                <div class="filter-parameters__container filter-group">
                    <div class="filter-parameters">
                        <span>
                            <label class="filter-label" for="from">From</label>
                            <input class="entry-logs__filter-input" type="date" name="from" id="">
                        </span>                    

                        <span>
                            <label class="filter-label" for="to">To</label>
                            <input class="entry-logs__filter-input" type="date" name="to" id="">
                        </span>

                        <span>
                            <label class="filter-label" for="filter-bu">Business Unit</label>
                            <select class="entry-logs__filter-input" name="filter-bu" id="">
                                <option value="all">All</option>
                                <option value="bulacan">Bulacan</option>
                                <option value="gerona-a">Gerona A</option>
                                <option value="gerona-b">Gerona B</option>
                            </select>
                        </span>

                        <span>
                            <label class="filter-label" for="filter-group">Group</label>
                            <select class="entry-logs__filter-input" name="filter-group">
                                <option value="employees">Employees</option>
                                <option value="visitors">Visitors</option>
                            </select>
                        </span>
                    </div>

                    <div>
                        <button class="filter-applyBtn btn" type="submit">Apply filter</button>
                    </div>
                </div>
            </form>

            <div class="filter-results">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Business Unit</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Remarks</th>
                        <th>Date</th>
                    </tr>

                    @foreach ($responses as $res)
                    {{-- @dd($res) --}}
                    <tr>
                        <td>{{ $res->respondent->firstname }} {{ $res->respondent->lastname }}</td>
                        <td>{{ $res->business_unit }}</td>
                        <td>{{ $res->questionnaire->question_text }}</td>
                        <td>{{ $res->answer }}</td>
                        <td>{{ $res->remarks ? '' : 'N/A' }}</td>
                        <td>{{ $res->created_at }}</td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </section>
    </main>


</x-layout>
