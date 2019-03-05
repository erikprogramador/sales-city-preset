window.onload = () => {
  Array.from(document.querySelectorAll('[data-dropdown]')).forEach(dropdown => {
    dropdown.addEventListener('click', evt => {
      evt.stopPropagation()
      evt.preventDefault()
      evt.currentTarget
        .closest('[data-dropdown-parent]')
        .querySelector('[data-dropdown-list]')
        .classList.toggle('hidden')
    })

    const dropdownsLists = Array.from(
      dropdown
        .closest('[data-dropdown-parent]')
        .querySelectorAll('[data-dropdown-list]')
    )

    dropdownsLists.forEach(dropList => {
      dropList.addEventListener('click', evt => evt.stopPropagation())
    })

    document.addEventListener('click', evt => {
      dropdownsLists.forEach(dropList => {
        if (!dropList.classList.contains('hidden')) {
          dropList.classList.add('hidden')
        }
      })
    })
  })
}
