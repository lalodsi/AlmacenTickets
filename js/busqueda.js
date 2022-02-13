class busqueda{
    constructor(formName){
        // this.form = document.forms['formName'];
    }

    /**
     * 
     */
    extraerFormulario(){
        const request = new XMLHttpRequest();
        const string = "nombre=luis";
        request.onload = function(){
            // Todo
            console.log(string);
        }
        request.open("GET", `show_all.php?${string}`);
        request.send();
    }

    enviarQuery(){

    }
    
}
