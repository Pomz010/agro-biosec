export class NavLinks {
    #privateLink;
    #privateLinks;

    constructor(target, links){
        this.#privateLink = target;
        this.#privateLinks = links;
    }

    select(){
        console.log(this.#privateLinks);
        console.log(this.#privateLink);
        this.#privateLinks.forEach(link => {
            if(link.classList.contains('nav-active')){
                link.classList.remove('nav-active');
            }
        })
        
        this.#privateLink.classList.add('nav-active');
    }
}