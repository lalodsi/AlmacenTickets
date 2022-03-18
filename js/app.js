documento = new HTMLManager;

function inicializarForm() {
    const buscar = new busqueda();
    buscar.extraerFormulario();
    return false;
}


documento.ocultarForms(-1)
documento.btnShowForms()


// ocultarForms(2);
// btnShowForms();