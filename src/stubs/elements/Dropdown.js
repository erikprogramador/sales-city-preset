class Dropdown {
  constructor() {
    this.dropdowns = document.querySelectorAll('[data-dropdown]')
    if (!this.dropdowns.length) {
      return
    }

    this.dropdownItems = document.querySelectorAll('[data-dropdown-list]')

    this.hiddenClass = 'hidden'

    this.isVisible = this.isVisible.bind(this)
    this.bindEvents()
  }

  bindEvents() {
    this.dropdowns.forEach(dropdown =>
      dropdown.addEventListener('click', this.toggle.bind(this))
    )

    this.dropdownItems.forEach(item =>
      item.addEventListener('click', this.stopItemPropagation.bind(this))
    )

    document.addEventListener('click', this.close.bind(this))
  }

  toggle(evt) {
    evt.stopPropagation()
    evt.preventDefault()

    evt.currentTarget
      .closest('[data-dropdown-parent]')
      .querySelector('[data-dropdown-list]')
      .classList.toggle(this.hiddenClass)
  }

  stopItemPropagation(evt) {
    evt.stopPropagation()
  }

  close(evt) {
    this.dropdownItems.forEach(item => {
      if (this.isVisible(item)) {
        item.classList.add(this.hiddenClass)
      }
    })
  }

  isVisible(item) {
    return !item.classList.contains(this.hiddenClass)
  }
}

export default Dropdown
