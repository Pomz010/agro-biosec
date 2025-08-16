<x-layout >
            
    <main class="admin-page__container">
    <x-header-nav :currentUser="$user" navActive="response-management" />

        <div class="page-container">
            
            {{-- EMPLOYEE LIST TABLE --}}
            <section class="employee-list__table-container">
                <table id="employeeListTable">
                    <tr>
                        <th>Name</th>
                        <th>Questionnaire</th>
                        <th>Answer</th>
                        <th>Remarks</th>
                        <th>Business Unit</th>
                        <th>Date</th>
                    </tr>
                    @foreach ($responses as $response)
                    <tr>
                        {{-- <td class="response__id" hidden value="{{ $response->id }}">{{ $response->id }}</td> --}}
                        <td class="response__firstname">{{ $response->respondent->firstname }} {{ $response->respondent->lastname }}</td>
                        <td class="response__questionnaire">{{ $response->questionnaire->question_text ?? 'N/A' }}</td>
                        <td class="response__answer">{{ $response->answer ?? 'N/A' }}</td>
                        <td class="response__remarks">{{ $response->remarks ?? 'N/A' }}</td>
                        <td class="response__business-unit">{{ $response->business_unit ?? 'N/A' }}</td>
                        <td class="response__date">{{ $response->created_at ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </table>
            </section>
        </div>
    </main>


</x-layout>