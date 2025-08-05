<x-layout>
    <main class="form-main-containter">
        <x-back-btn/>
        <div class="container">
            <div class="header-logo-container">
                <img src="{{ asset('img/apc_logo.png') }}" alt="Agripacific Logo" width="250" height="150">
            </div>
            <form  class="form-sheet" action="/visitor-response/submit" method="post">
                @csrf
                <h1 class="form-header">Visitors Biosecurity Assessment</h1>

                <div class="personalInfo">
                    <fieldset>
                        <legend>Name</legend>
                        <ul>
                            <li class="user-input-container businessUnitContainer">
                                <label class="user-input__label" for="business_unit">Business Unit:</label>
                                <input class="user-input__inputBox" type="text" name="business_unit" id="business_unit_b">
                            </li>
                            
                            <li class="user-input-container">
                                <label class="user-input__label" for="lastname">Lastname:</label>
                                <input class="user-input__inputBox" type="text" name="lastname" id="visitorLastnameInputBox">
                            </li>
    
                            <li class="user-input-container">
                                <label class="user-input__label" for="firstname">Firstname:</label>
                                <input class="user-input__inputBox" type="text" name="firstname" id="visitorfirstnameInputBox">
                            </li>
    
                            <li class="user-input-container">
                                <label class="user-input__label" for="middle_name">Middle Name:</label>
                                <input class="user-input__inputBox" type="text" name="middle_name" id="visitorMiddleNameInputBox">
                            </li>
                        </ul>
                    </fieldset>
    
                    <fieldset>
                        <legend>Home Address</legend>
                        <ul>
                            <li class="user-input-container">
                                <label class="user-input__label" for="home_address">Baranggay:</label>
                                <input class="user-input__inputBox" type="text" name="baranggay" id="baranggay">
                            </li>

                            <li class="user-input-container">
                                <label class="user-input__label" for="home_address">Municipality/City:</label>
                                <input class="user-input__inputBox" type="text" name="municipality" id="municipality">
                            </li>

                            <li class="user-input-container">
                                <label class="user-input__label" for="home_address">Province/Region:</label>
                                <input class="user-input__inputBox" type="text" name="province" id="province">
                            </li>
                        </ul>
                    </fieldset>
                </div>

                <fieldset>
                    <legend>Company Details</legend>
                    <li class="user-input-container">
                        <label class="user-input__label" for="company_name">Company Name:</label>
                        <input class="user-input__inputBox" type="text" name="comp_name" id="comp_name">
                    </li>

                    <div class="brgyContainer">
                        <li class="user-input-container">
                            <label class="user-input__label" for="company_street">Purok/Street #:</label>
                            <input class="user-input__inputBox companyDetails" type="text" name="comp_street" id="comp_street">
                        </li>
    
                        <li class="user-input-container">
                            <label class="user-input__label" for="comp_brgy">Baranggay:</label>
                            <input class="user-input__inputBox companyDetails" type="text" name="comp_brgy" id="comp_brgy">
                        </li>
                    </div>

                    <div class="cityContainer">
                        <li class="user-input-container">
                            <label class="user-input__label" for="comp_municipality">Municipality/City:</label>
                            <input class="user-input__inputBox companyDetails" type="text" name="comp_municipality" id="comp_municipality">
                        </li>
    
                        <li class="user-input-container">
                            <label class="user-input__label" for="comp_province">Province/Region:</label>
                            <input class="user-input__inputBox companyDetails" type="text" name="comp_province" id="comp_province">
                        </li>
                    </div>
                </fieldset>

                <section class="form-sheet__section-a">
                    <ul>
                        <div class="otherDetails">
                            <li class="user-input-container">
                                <label class="user-input__label" for="nature_of_visit">Nature of Visit:</label>
                                <input class="user-input__inputBox" type="text" name="nature_of_visit" id="nature_of_visit">
                            </li>
        
                            <li class="user-input-container">
                                <label class="user-input__label" for="plate_number">Plate Number:</label>
                                <input class="user-input__inputBox" type="text" name="plate_number" id="plate_number">
                            </li>
                        </div>
    
                        <li class="user-input-container question-container">
                            <p class="user-input__question">Have you been to other Poultry Farm or Livestock within 24 hours? If yes, please indicate the location.</p>
                            <div>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_1" value="1">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="visitorVisitedOtherFarm" id="visitorVisitedOtherFarmTrue" value="yes">
                                    </label>
            
                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="visitorVisitedOtherFarm" id="visitorVisitedOtherFarmFalse" value="no">
                                    </label>
                                </div>

                                <span>
                                    <input class="travelled-outside-city" type="text" name="visitorVisitedOtherFarm_remarks" id="visitorVisitedOtherFarm" value="{{ old('visitorVisitedOtherFarm_remarks') }}" autocomplete="off" disabled>
                                </span>
                            </div>
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
                                        <input type="radio" name="soreThroat"  value="yes">
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="soreThroat"  value="no">
                                    </label>
                                </div>
                            </div>
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Body Pain (Pananakit ng Katawan)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_4" value="4">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="bodyPain" value="yes">
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="bodyPain" value="no">
                                    </label>
                                </div>
                            </div>
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Fever (Lagnat)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_5" value="5">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="fever" value="yes">
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="fever" value="no">
                                    </label>
                                </div>
                            </div>
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Headache (Pananakit ng ulo)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_6" value="6">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="headache" value="yes">
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="headache" value="no">
                                    </label>
                                </div>
                            </div>
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Nasal Discharge (Sipon)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_7" value="7">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="nasalDischarge" value="yes">
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="nasalDischarge" value="no">
                                    </label>
                                </div>
                            </div>
                        </li>

                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Cough (Ubo)</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_8" value="8">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="cough" value="yes">
                                    </label>

                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="cough" value="no">
                                    </label>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>

                <section class="form-sheet__section-c">
                    <p class="form-sheet__sub-header">Visitors Health Assessment</p>
                    <ul>
                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Do you suffer from allergies to dust, mold, etc?</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_13" value="13">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="allergies" value="yes">
                                    </label>
            
                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="allergies" value="no">
                                    </label>
                                </div>
                            </div>
                        </li>
    
                        <li class="user-input-container">
                            <div class="question-container">
                                <p>Do you suffer from asthma or other respiratory conditions that could be aggravated as a result of your visit?</p>
                                <div class="user-input__answer">
                                    <input type="hidden" name="questionnaire_14" value="14">

                                    <label class="user-input__yes">
                                        <span>Yes</span>
                                        <input type="radio" name="asthma" value="yes">
                                    </label>
            
                                    <label class="user-input__no">
                                        <span>No</span>
                                        <input type="radio" name="asthma" value="no">
                                    </label>
                                </div>
                            </div>
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