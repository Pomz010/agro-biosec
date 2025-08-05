export class Location{
    #privateEventHook;
    #privateBusinessUnit;
    #privateCityContainer;

    constructor(elementTag, businessUnit, city = null){
        this.#privateEventHook = elementTag;
        this.#privateBusinessUnit = businessUnit;
        this.#privateCityContainer = city;
    }

    getLocation(){
        this.#privateEventHook.addEventListener("click", (e) => {
            e.preventDefault();

            let businessAdd = this.getBusinessUnit(); // Access #privateBusinessUnit property for switch case usage
            let city = this.getCity(); // Access #privateCityContainer property for switch case usage

            if(businessAdd){
                if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(function(position){
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        
                        //Bulacan
                        // const latitude = 10.305536;
                        // const longitude = 123.9187456;
        
                        //San Agustin
                        // const latitude = 15.4730496;
                        // const longitude = 120.58624;
        
                        //Parsolingan
                        // const latitude = 12.879721;
                        // const longitude = 121.774017;
                        
                        fetch(`https://api-bdc.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}`)
                            .then(result => result.json())
                            .then(location => {
        
                                switch (location.city) {
                                    case 'Gerona':
                                        businessAdd.value = 'Parsolingan, Gerona Layer Farm';
                                        // city.textContent = 'Tarlac City';
                                        sessionStorage.setItem("city", 'Tarlac City');
                                        city.textContent = sessionStorage.getItem("city");                                
                                        break;

                                    case 'Baguio':
                                        businessAdd.value = 'Parsolingan, Gerona Layer Farm'; 
                                        // city.textContent = 'Tarlac City';
                                        sessionStorage.setItem("city", 'Tarlac City');
                                        city.textContent = sessionStorage.getItem("city");                               
                                        break;
        
                                    case 'Tarlac City':
                                        businessAdd.value = 'San Agustin, Gerona Breeder & Hatchery Farm';
                                        // city.textContent = 'Tarlac City';
                                        sessionStorage.setItem("city", 'Tarlac City');
                                        city.textContent = sessionStorage.getItem("city");                                   
                                        break;
        
                                    case 'Angeles City': 
                                        businessAdd.value = 'Parsolingan, Gerona Layer Farm';   
                                        // city.textContent = 'Tarlac City';
                                        sessionStorage.setItem("city", 'Tarlac City');
                                        city.textContent = sessionStorage.getItem("city");                              
                                        break;
        
                                    case 'Concepcion':    
                                        businessAdd.value = 'Parsolingan, Gerona Layer Farm';
                                        // city.textContent = 'Tarlac City';
                                        sessionStorage.setItem("city", 'Tarlac City');
                                        city.textContent = sessionStorage.getItem("city");                              
                                        break;
        
                                    case 'Cebu City':
                                        businessAdd.value = 'Sta. Maria, Bulacan Layer Farm';
                                        // city.textContent = 'Bulacan';                                  
                                        sessionStorage.setItem("city", 'Bulacan');
                                        city.textContent = sessionStorage.getItem("city");
                                        break;
                                
                                    default:
                                        businessAdd.value = 'Central City';
                                        // city.textContent = 'Central City';
                                        sessionStorage.setItem("city", 'Central City');
                                        city.textContent = sessionStorage.getItem("city");
                                        break;
                                }
                            })
                            .catch(err => console.log(err));
                    })
                } else {
                    console.log("Geolocation is not supported by your browser");
                }
            }
        })
    }

    getCity(){
        return this.#privateCityContainer;
    }

    getBusinessUnit(){
        return this.#privateBusinessUnit;
    }

}