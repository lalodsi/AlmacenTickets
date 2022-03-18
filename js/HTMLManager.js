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
    
    DontRefresh = function(){
        const botones = document.querySelectorAll('#botonSubmit');
        arrayBotones = this.devolverArrayHTML(botones);
        arrayBotones.forEach( el => {
            el.addEventListener( 'click', () => {
                // event.preventDefault();
                // const buscar = new busqueda();
                // buscar.extraerFormulario();
            } )
        })
    }
}