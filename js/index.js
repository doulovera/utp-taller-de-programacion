import sesionUsuario from "./sesion.js";

let products = [];

sesionUsuario()

function add(id) {
    fetch('/php/controllers/agregarProductoAUsuario.php', { // Adjust the path as necessary
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}`
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Handle response
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

const agregatBtns = document.querySelectorAll(".agregar");
agregatBtns.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        const id = btn.getAttribute("id");
        add(id);
    });
});

function pay() {
    window.alert(products.join(", \n"));
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


