import { Location } from './modules/Location.js';
import { Greetings } from './modules/Greetings.js';
import { Remarks } from './modules/Remarks.js';
// import { NavLinks } from './modules/NavLinks.js';
import { Selection } from './modules/Selection.js';
import { EmployeeUpdate } from './modules/EmployeeUpdate.js';

//Changes greeting on homepage depending on time of the day.
document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#greetings')){
        const greetings = document.querySelector('#greetings');
        const greet = new Greetings(greetings);
        greet.greet();
    }
});

//Get the current city of the device from external api for the employee's form
if(document.querySelector('#employeeNameInputBox')){
    const elementTag = document.querySelector('#employeeNameInputBox');
    const businessUnit = document.querySelector("#business_unit_a");
    const city = document.querySelector("#city");
    const locationA = new Location(elementTag, businessUnit, city);

    if(!document.querySelector('.error-message')){
        sessionStorage.removeItem('value');
    }

    locationA.getLocation();
}

//Get the current city of the device from external api for the visitor's form
if(document.querySelector('#visitorLastnameInputBox')){
    const elementTag = document.querySelector('#visitorLastnameInputBox');
    const businessUnit = document.querySelector("#business_unit_b");
    const locationB = new Location(elementTag, businessUnit);
    locationB.getLocation();
}


// Farm Employee Biosecurity Assessment
// Will activate input box if yes radio btn is selected and will deactivate if no is selected
if(document.querySelector("#travelledOutsideCityTrue")){

    const visitedOtherFarmRadioBtnTrue = document.querySelector("#employeeVisitedOtherFarmTrue");
    const visitedOtherFarmRadioBtnFalse = document.querySelector("#employeeVisitedOtherFarmFalse");

    const fromOutsideCityRadioBtnTrue = document.querySelector("#travelledOutsideCityTrue");
    const fromOutsideCityRadioBtnFalse = document.querySelector("#travelledOutsideCityFalse");

    const otherFarmInputBox = document.querySelector("#employeeVisitedOtherFarms");
    const cityInputBox = document.querySelector("#travelledOutsideCityBox");

    visitedOtherFarmRadioBtnTrue.addEventListener("click", () => {
        const visitedOtherFarm = new Remarks(visitedOtherFarmRadioBtnTrue, otherFarmInputBox);
        visitedOtherFarm.enableInputBox();
    });

    visitedOtherFarmRadioBtnFalse.addEventListener("click", () => {
        const visitedOtherFarm = new Remarks(visitedOtherFarmRadioBtnFalse, otherFarmInputBox);
        visitedOtherFarm.disableInputaBox();
    });

    fromOutsideCityRadioBtnTrue.addEventListener("click", () => {
        const travelledOutsideCity = new Remarks(fromOutsideCityRadioBtnTrue, cityInputBox);
        travelledOutsideCity.enableInputBox();
    });

    fromOutsideCityRadioBtnFalse.addEventListener("click", () => {
        const travelledOutsideCity = new Remarks(fromOutsideCityRadioBtnFalse, cityInputBox);
        travelledOutsideCity.disableInputaBox();
    });
}

//Visitors Biosecurity Assessment
// Will activate input box if yes radio btn is selected and will deactivate if no is selected
if(document.querySelector('#visitorVisitedOtherFarmTrue')){
    const visitorVisitedOtherFarmTrue = document.querySelector('#visitorVisitedOtherFarmTrue');
    const visitorVisitedOtherFarmFalse = document.querySelector('#visitorVisitedOtherFarmFalse');
    const otherFarmInputBox = document.querySelector("#visitorVisitedOtherFarm");

    visitorVisitedOtherFarmTrue.addEventListener("click", () => {
        const visitedOtherFarm = new Remarks(visitorVisitedOtherFarmTrue, otherFarmInputBox);
        visitedOtherFarm.enableInputBox();
    })

        visitorVisitedOtherFarmFalse.addEventListener("click", () => {
        const visitedOtherFarm = new Remarks(visitorVisitedOtherFarmFalse, otherFarmInputBox);
        visitedOtherFarm.disableInputaBox();
    })
}

// Will use plain gray background color for admin pages
document.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#adminPage')){
        document.querySelector('body').style.background = "none";
        document.querySelector('body').style.backgroundColor = "#E7E7E7";    
    }
});

// Select input box value from employee searchbox result
    if(document.querySelector('#employeeForm')){
        const searchBox = document.querySelector('#employeeNameInputBox');

            searchBox.focus();
            searchBox.addEventListener('keyup', () => {

                setTimeout(check, 500);

                function check(){

                    if(document.querySelector('.search-result-container')){
                        const resultsContainer = document.querySelector('.search-result-container');
                        const searchResults = document.querySelectorAll('.result');
                        const searchbox = document.querySelector('.searchBox');
                        const employeeId = document.querySelector('.employee');
                        const hiddenInputBox = document.querySelector('#employeeId');

                        searchResults.forEach(li => {
                            li.addEventListener('click', (e) => {
                                e.preventDefault();
                                const selection = new Selection({
                                    selectedEmployee: e.target,
                                    searchBox: searchbox,
                                    employeeId: employeeId.value,
                                    hiddenId: hiddenInputBox
                                });

                                try {
                                    selection.select();
                                } catch (error) {
                                // code to handle the error
                                } finally {
                                    resultsContainer.remove();
                                }                                
                            })
                        })
                    }
                }
    
            })

        if(document.querySelector("#city")){
            document.querySelector("#city").textContent = sessionStorage.getItem('city');
        }

        if(document.querySelector('.searchBox')){
            document.querySelector('.searchBox').value = sessionStorage.getItem('value');
        }
    }

// Select new user from searchbox suggestion
if(document.querySelector('#createUserForm')){
    const searchBox = document.querySelector('#userNameInputBox');

    searchBox.focus();
    searchBox.addEventListener('keyup', () => {

        setTimeout(check, 500);

        function check(){

            if(document.querySelector('.search-result-container')){
                const resultsContainer = document.querySelector('.search-result-container');
                const searchResults = document.querySelectorAll('.result');
                const searchbox = document.querySelector('.searchBox');
                const employeeId = document.querySelector('.employee');
                const hiddenInputBox = document.querySelector('#userId');
                const userEmail = document.querySelector('[data-email]');
                const emailInputBox = document.querySelector('#userEmail');

                searchResults.forEach(li => {
                    li.addEventListener('click', (e) => {
                        e.preventDefault();
                        const selection = new Selection({
                            selectedEmployee: e.target,
                            searchBox: searchbox,
                            employeeId: employeeId.value,
                            hiddenId: hiddenInputBox,
                            emailInputBox: emailInputBox
                        });

                        selection.select();

                        resultsContainer.remove();
                    })
                })
            }
        }

    })
}

// Confirm user delete modal
if(document.querySelector('#userManagementPage')){
    const deleteUserBtn = document.querySelectorAll('.delete-user');
    const cancelBtnModal = document.querySelector('.cancel-btn--modal');
    const confirmDeleteBtn = document.querySelector('#deleteUserBtn');
    const deleteUserForm = confirmDeleteBtn.parentElement;
    const currentUri = window.location.href;
    const deleteModal = document.querySelector('#confirmDeleteModal');

    deleteUserBtn.forEach(btn => {
        btn.addEventListener('click', e => {
            deleteModal.showModal();
            deleteUserForm.setAttribute('action', `${currentUri}/${btn.dataset.userId}`);
            console.log(deleteUserForm);
        })
    })

    cancelBtnModal.addEventListener('click', e => {
        deleteModal.close();  
    })
}

