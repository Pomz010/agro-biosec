export class Selection{
    #privateSelectedEmployee;

    constructor(selectedEmployee){
        this.#privateSelectedEmployee = selectedEmployee;
    }

    select(){
        this.#privateSelectedEmployee.searchBox.value = this.#privateSelectedEmployee.selectedEmployee.textContent;
        this.#privateSelectedEmployee.hiddenId.value = this.#privateSelectedEmployee.employeeId;
        this.#privateSelectedEmployee.emailInputBox.value = this.#privateSelectedEmployee.selectedEmployee.dataset.email;

        console.log(this.#privateSelectedEmployee.emailInputBox.value);
    }

    
}
