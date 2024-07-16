export default function sesionUsuario () {
  const lsUsuario = localStorage.getItem('usuario')
  const usuario = lsUsuario && JSON.parse(lsUsuario)

  if (usuario) {
    const anchor = document.getElementById('nombre-usuario')
    anchor.classList.add('loggedin')
    anchor.href = '/oechsle-web/perfil.php'

    anchor.innerHTML = `
      ${
        usuario.avatar
          ? `<img src="${usuario.avatar}" alt="${usuario.nombre}" class="avatar">`
          : `<img src="https://ui-avatars.com/api/?name=${usuario.nombre}&background=0D8ABC&color=fff" alt="${usuario.nombre}" class="avatar">`
      }
      <span>${usuario.nombre.split(' ')[0]}</span>
    `
  }
}