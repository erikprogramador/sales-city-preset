class Menu {
  constructor() {
    this.menu = document.querySelector('[data-menu]')

    if (!this.menu) {
      return
    }

    this.toggler = document.querySelector('[data-menu-toggle]')
    this.hiddenClass = 'hidden'

    this.bindEvents()
  }

  bindEvents() {
    this.toggler.addEventListener('click', this.toggle.bind(this))
  }

  toggle(evt) {
    evt.preventDefault()

    this.menu.classList.toggle(this.hiddenClass)
  }
}

export default Menu
