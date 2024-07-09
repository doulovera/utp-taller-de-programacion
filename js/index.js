import sesionUsuario from "./sesion.js";

let products = [];
let total = 0;

sesionUsuario()

function add(product, price) {
    console.log(product, price);
    products.push(product);
    total = total + price;
    document.getElementById("checkout").innerHTML = `S/.${total}`

    // agregar al almacenamiento local
    // para que no se pierda al recargar la página
    localStorage.setItem("precios_productos", total);
}

function pay() {
    window.alert(products.join(", \n"));
}

// retrieve the products from local storage
// and display them in the checkout
let storedProducts = localStorage.getItem("precios_productos");
if (storedProducts) {
    const total = parseInt(storedProducts) || 0;
    document.getElementById("checkout").innerHTML = `S/.${total}`;
}


/* Formatear el precio */
function formatPrice(price) {
    return new Intl.NumberFormat("es-PE", {
        style: "currency",
        currency: "PEN",
    }).format(price);
}

const $precio = document.querySelectorAll(".precio");

$precio.forEach((element) => { 
    element.textContent = formatPrice(element.textContent);
})


