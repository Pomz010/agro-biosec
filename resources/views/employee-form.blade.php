<x-layout>
    <main class="form-main-containter">
        <x-back-btn/>
        <div class="container">
            <div class="header-logo-container">
                <img src="{{ asset('img/apc_logo.png') }}" alt="Agripacific Logo" width="250" height="150">
            </div>
            <form  class="form-sheet" action="/employee-response/submit" method="post" id="employeeForm">
                @csrf
                <h1 class="form-header">Farm Employee Biosecurity Assessment</h1>

                <section class="form-sheet__section-a">
                    <ul>
                        <li class="user-input-container">
                            <label class="user-input__label" for="respondents_fullname">Name:</label>
                            <livewire:form-search-bar searchResultClassAttribute="search-result" />

                            @error('respondents_fullname')
                                <p class="error-message">Name required!</p>
                            @enderror
                        </li>

                        <li class="user-input-container businessUnitContainer">
                            <label class="user-input__label" for="business_unit">Business Unit:</label>
                            <input class="user-input__inputBox" type="text" name="business_unit" id="business_unit_a" value="{{ old('business_unit') }}">
                        </li>
    
                        <li class="user-input-container">
                            <div class="question-container">
                                <p class="user-input__question travelled-outside">Have you been to other Poultry Farm or Livestock within 24 hours? If yes, please indicate the location.</p>
                                <div>
                                    <div class="user-input__answer">
                                        <input type="hidden" name="questionnaire_1" value="1">

                                        <label class="user-input__yes">
                                            <span>Yes</span>
                                            <input type="radio" name="employeeVisitedOtherFarm" id="employeeVisitedOtherFarmTrue" value="yes" {{ old('employeeVisitedOtherFarm') === 'yes' ? 'checked' : '' }}>
                                        </label>
                
                                        <label class="user-input__no">
                                            <span>No</span>
                                            <input type="radio" name="employeeVisitedOtherFarm" id="employeeVisitedOtherFarmFalse" value="no" {{ old('employeeVisitedOtherFarm') === 'no' ? 'checked' : '' }}>
                                        </label>
                                    </div>

                                    <span>
                                        <input class="travelled-outside-city" type="text" name="employeeVisitedOtherFarm_remarks" id="employeeVisitedOtherFarms" value="{{ old('employeeVisitedOtherFarm_remarks') }}" autocomplete="off" disabled>
                                    </span>
                                </div>
                            </div>
                            @error('employeeVisitedOtherFarm')
                                <p class="error-message">This field is required!</p>
                            @enderror
                        </li>
                        

                        <li class="user-input-container">
                            <div class="question-container">
                                <p class="user-input__question travelled-outside">Have you traveled outside <span id="city">city</span>? If yes, please indicate the location.</p>
                                <div>
                                    <div class="user-input__answer">
                                        <input type="hidden" name="questionnaire_2" id="employee_questionnaires_id" value="2">

                                        <label class="user-input__yes">
                                            <span>Yes</span>
                                            <input type="radio" name="travelledOutsideCity" id="travelledOutsideCityTrue" value="yes" {{ old('travelledOutsideCity') === 'yes' ? 'checked' : '' }}>
                                        </label>
                
                                        <label class="user-input__no">
                                            <span>No</span>
                                            <input type="radio" name="travelledOutsideCity" id="travelledOutsideCityFalse" value="no" {{ old('travelledOutsideCity') === 'no' ? 'checked' : '' }}>
                                        </label>
                                    </div>
                                    <span>
                                        <input class="travelled-outside-city" type="text" name="travelledOutsideCity_remarks" id="travelledOutsideCityBox" autocomplete="off" disabled>
                                    </span>
                                </div>
                            </div>
                                @error('travelledOutsideCity')
                                    <p class="error-message">This field is required!</p>
                                @enderror
                        </li>
                    </ul>
                </section>

                <section class="form-sheet__section-b">
                    <p class="form-sheet__sub-header">Are you experiencing/suffering the following withing the past 24 hours?</p>
                    <ul>
                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Sore Throat(Pananakit ng lalamunan)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_3" value="3">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="soreThroat" id="soreThroatTrue" value="yes" {{ old('soreThroat') === 'yes' ? 'checked' : '' }}>
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="soreThroat" id="soreThroatFalse" value="no" {{ old('soreThroat') === 'no' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            @error('soreThroat')
                                <p class="error-message">This field is required!</p>
                            @enderror
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Body Pain (Pananakit ng Katawan)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_4" value="4">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="bodyPain" id="bodyPainTrue" value="yes" {{ old('bodyPain') === 'yes' ? 'checked' : '' }}>
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="bodyPain" id="bodyPainFalse" value="no" {{ old('bodyPain') === 'no' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            @error('bodyPain')
                                <p class="error-message">This field is required!</p>
                            @enderror
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Fever (Lagnat)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_5" value="5">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="fever" id="feverTrue" value="yes" {{ old('fever') === 'yes' ? 'checked' : '' }}>
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="fever" id="feverFalse" value="no" {{ old('fever') === 'no' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            @error('fever')
                                <p class="error-message">This field is required!</p>
                            @enderror
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Headache (Pananakit ng ulo)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_6" value="6">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="headache" id="headacheTrue" value="yes" {{ old('headache') === 'yes' ? 'checked' : '' }}>
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="headache" id="headacheFalse" value="no" {{ old('headache') === 'no' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            @error('headache')
                                <p class="error-message">This field is required!</p>
                            @enderror
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                            <p>Nasal Discharge (Sipon)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_7" value="7">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="nasalDischarge" id="nasalDischargeTrue" value="yes" {{ old('nasalDischarge') === 'yes' ? 'checked' : '' }}>
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="nasalDischarge" id="nasalDischargeFalse" value="no" {{ old('nasalDischarge') === 'no' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            @error('nasalDischarge')
                                <p class="error-message">This field is required!</p>
                            @enderror
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Cough (Ubo)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_8" value="8">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="cough" id="coughTrue" value="yes" {{ old('cough') === 'yes' ? 'checked' : '' }}>
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="cough" id="coughFalse" value="no" {{ old('cough') === 'no' ? 'checked' : '' }}>
                                    </label>
                                </div>
                            </div>
                            @error('cough')
                                <p class="error-message">This field is required!</p>
                            @enderror
                        </li>
                    </ul>
                </section>

                <section class="form-sheet__section-c">
                    <p class="form-sheet__sub-header">As an employee you must:</p>
                    <ul>
                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Wear Laundered clean clothes and shoes when arriving to the farm.</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_9" value="9">
                                    <input type="checkbox" id="wearCleanClothes" name="wearCleanClothes" value="yes" {{ old('wearCleanClothes') === 'yes' ? 'checked' : '' }}>
                                </div>
                            </div>
                            @error('wearCleanClothes')
                                <p class="error-message">Please agee to all policy stated!</p>
                            @enderror
                        </li>
    
                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Do not bring any poultry products and raw meat inside the farm.</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_10" value="10">
                                    <input type="checkbox" id="prohibitPoultryProducts" name="prohibitPoultryProducts" value="yes" {{ old('prohibitPoultryProducts') === 'yes' ? 'checked' : '' }}>
                                </div>
                            </div>
                            @error('prohibitPoultryProducts')
                                <p class="error-message">Please agee to all policy stated!</p>
                            @enderror
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Undergo decontamination area and use all footbaths where provided.</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_11" value="11">
                                    <input type="checkbox" id="decontamination" name="decontamination" value="yes" {{ old('decontamination') === 'yes' ? 'checked' : '' }}>
                                </div>
                            </div>
                            @error('decontamination')
                                <p class="error-message">Please agee to all policy stated!</p>
                            @enderror
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Must follow all <span>BIOSECURITY</span> protocols of the farm.</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_12" value="12">
                                    <input type="checkbox" id="followBiosecProtocols" name="followBiosecProtocols" value="yes" {{ old('followBiosecProtocols') === 'yes' ? 'checked' : '' }}>
                                </div>
                            </div>
                            @error('followBiosecProtocols')
                                <p class="error-message">Please agee to all policy stated!</p>
                            @enderror
                        </li>
                    </ul>
                </section>
                <section class="form-sheet__section-d">
                    <div>
                        <p class="form-sheet__aggreement-note">By clicking submit, you agree to all policies stated herein.</p>
                        <input class="form-sheet--submit-btn" type="submit" value="SUBMIT">
                    </div>
                </section>
            </form>
        </div>
    </main>
</x-layout>