export class Greetings{
    #privateGreetings;
    #privateTime = new Date().getHours();

    constructor(greetings){
        this.#privateGreetings = greetings;
    }

    greet(){
        if(this.#privateTime >= 4 && this.#privateTime < 12){
            this.#privateGreetings.textContent = "Good Morning!";
        } else if(this.#privateTime >= 12 && this.#privateTime < 18){
            this.#privateGreetings.textContent = "Good Afternoon!";
        } else {
            this.#privateGreetings.textContent = "Good Evening!";
        }
    }
}