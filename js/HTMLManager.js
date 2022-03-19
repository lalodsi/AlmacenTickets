class HTMLManager{

    /**
     * Convierte una colección HTML a Array para poder utilizar las funciones internas de los arrays
     * 
     * @param {HTMLCollection} document
     * @returns array of HTML
     */
    devolverArrayHTML = function(document){
        return [].concat(...document)
    }

    /**
     * OcultarForm
     * Oculta todos los formularios menos el indicado en la sección de todos los tickets
     * @param {int} index Formulario que no se estará ocultando
     */
    ocultarForms = function(index){
        const forms = document.querySelectorAll(".menuSeleccion>.menu");
        const arrayForms = this.devolverArrayHTML(forms);
        // arrayForms.shift();
        arrayForms.forEach( (elem, ArrIndex) => {
            elem.setAttribute( "style", "display: none" )
            if (index == ArrIndex) {
                elem.setAttribute( "style", "display: block" )
            }
        } )
    }

    /**
     * Agrega funcionalidad a los botones de la sección 'todos los tickets' para ocultar o mostrar formularios
     */
    btnShowForms = function() {
        const botones = document.querySelectorAll("#btnSelectForm");
        const arrBotones = this.devolverArrayHTML(botones);
        arrBotones.forEach( (elem, index) => {
            elem.addEventListener( "click", () => {
                this.ocultarForms(index);
            } )
        } )
    }
    search = function () {
        const botonBusqueda = document.getElementById("search");
        botonBusqueda.addEventListener("keyup", (element)=> {
            console.log(element.path[0].value);
            const request = new XMLHttpRequest();
            request.onload = function(){
                // Todo
                const contenedor = document.getElementsByClassName("contenido")[0];
                console.log(this.responseText);
                contenedor.innerHTML = this.responseText;
            }
            request.open("GET", `search.php?search=${element.path[0].value}`);
            request.send();

            request.onreadystatechange = () => {
                if(this.readyState == 4 && this.status == 200) {

                }
            }
        })
    }
    
}