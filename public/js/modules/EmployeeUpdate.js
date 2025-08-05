export class EmployeeUpdate {
    #privateModal = document.querySelector('#modalContainer');
    #privateEmployeeIdContainer = document.querySelector('#emp_id');
    #privateLastnameContainer = document.querySelector('#emp_lastname');
    #privateFirstnameContainer = document.querySelector('#emp_firstname');
    #privateMiddleNameContainer = document.querySelector('#emp_middle_name');
    #privateEmployeeNumContainer = document.querySelector('#emp_number');
    #privateEmpAddressContainer = document.querySelector('#emp_address');
    #privateEmployee;

    constructor(employee){
        this.#privateEmployee = employee
    }

    showModal() {
        this.#privateModal.showModal();
    }

    populateModalForm(){
        
        this.#privateEmployeeIdContainer.value = this.#privateEmployee[0].textContent;
        this.#privateLastnameContainer.value = this.#privateEmployee[1].textContent;
        this.#privateFirstnameContainer.value = this.#privateEmployee[2].textContent;
        this.#privateMiddleNameContainer.value = this.#privateEmployee[3].textContent;
        this.#privateEmployeeNumContainer.value = this.#privateEmployee[4].textContent;
        this.#privateEmpAddressContainer.value = this.#privateEmployee[5].textContent;
    }

    closeModal(){
        this.#privateModal.close();
    }
}