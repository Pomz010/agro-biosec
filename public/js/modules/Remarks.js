export class Remarks{
    #privateRadioBtn;
    #privateInputBox;

    constructor(radioBtn, inputBox){
        this.#privateRadioBtn = radioBtn;
        this.#privateInputBox = inputBox;
    }

    enableInputBox(){
        if(this.#privateRadioBtn.checked){
            this.#privateInputBox.removeAttribute("disabled");
            this.#privateInputBox.focus();
        } 
    }

    disableInputaBox(){
        if(this.#privateRadioBtn.checked) {
            this.#privateInputBox.setAttribute("disabled", true);
        }
    }   
}