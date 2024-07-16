function checkQueryType() {
    const url = window.location.href;
    const urlObj = new URL(url);
    const params = new URLSearchParams(urlObj.search);
    const type = params.get('type');

    let title = '¡Éxito!'
    let message = 'La operación fue realizada correctamente.'

    if (type === 'email') {
        title = '¡Correo enviado! ✉️'
        message = 'El correo fue enviado correctamente.'
    }

    if (type === 'agregar-producto-exito') {
        title = '¡Producto agregado! 📦'
        message = 'El producto fue agregado correctamente.'
    }

    if (type === 'agregar-producto-error') {
        title = '¡Error al agregar producto! 📦'
        message = 'Hubo un error al agregar el producto.'
    }

    if (type === 'editar-producto-exito') {
        title = '¡Producto editado! 📦'
        message = 'El producto fue editado correctamente.'
    }

    const $title = document.getElementById('mensaje-title');
    const $message = document.getElementById('mensaje-description');

    $title.innerText = title;
    $message.innerText = message;
}

console.log(checkQueryType());
