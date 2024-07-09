export default function sesionUsuario () {
  const lsUsuario = localStorage.getItem('usuario')
  const usuario = lsUsuario && JSON.parse(lsUsuario)

  if (usuario) {
    const anchor = document.getElementById('nombre-usuario')
    anchor.classList.add('loggedin')
    anchor.href = '/perfil.php'

    anchor.innerHTML = `
      <img src="${usuario.avatar}" alt="${usuario.nombre}" class="avatar">
      <span>${usuario.nombre.split(' ')[0]}</span>
    `
  }
}