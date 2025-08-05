<x-layout >
            
    <main class="admin-page__container">
    <x-header-nav :currentUser="$user" navActive="response-management" />


        <section class="date-filter__card-container">
            <h1 class="filter-header">Select Date Range</h1>
            <form class="form-container" action="#">
                <div class="filter-parameter">
                    <label class="filter-input" for="">From</label>
                    <input class="filter-input input-box" type="date" name="" id="">
                </div>
                
                <div class="filter-parameter">
                    <label class="filter-input" for="">To</label>
                    <input class="filter-input input-box" type="date" name="" id="">
                </div>

                <div class="filter-parameter">
                    <label class="filter-input" for="">Business Unit</label>
                    <select class="filter-input input-box dropdown-container" name="" id="">
                        <option class="filter-option" value="all">All</option>
                    </select>
                </div>

                <div class="filter-parameter">
                    <label class="filter-input" for="">Group</label>
                    <select class="filter-input input-box dropdown-container" name="" id="">
                        <option class="filter-option" value="employees">Employees</option>
                        <option class="filter-option" value="visitors">Visitors</option>
                    </select>
                </div>
                
                <input class="login-submitBtn" type="submit" value="DOWNLOAD">
            </form>
        </section>
    </main>


</x-layout>