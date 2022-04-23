const inventarioBoton = document.getElementById("inventarioButton");
const ventasBoton = document.getElementById("ventasButton");

inventarioBoton.addEventListener("click", ()=> openRequest("inventario.php"));
ventasBoton.addEventListener("click", ()=> openRequest("principal.php"));

function openRequest(name) {
    request.open("GET", name);
    request.send();
}

const request = new XMLHttpRequest();

request.onload = function () {
    const contenido = document.getElementsByClassName("content")[0];
    contenido.innerHTML = this.response;
}
