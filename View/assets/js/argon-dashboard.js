'use strict';
(function () {
  const isWindows = navigator.platform.indexOf('Win') > -1

  if (isWindows) {
    // if we are on windows OS we activate the perfectScrollbar function
    if (document.getElementsByClassName('main-content')[0]) {
      const mainpanel = document.querySelector('.main-content')
      const ps = new PerfectScrollbar(mainpanel)
    }

    if (document.getElementsByClassName('sidenav')[0]) {
      const sidebar = document.querySelector('.sidenav')
      const ps1 = new PerfectScrollbar(sidebar)
    }

    if (document.getElementsByClassName('navbar-collapse')[0]) {
      var fixedplugin = document.querySelector(
        '.navbar:not(.navbar-expand-lg) .navbar-collapse'
      )
      const ps2 = new PerfectScrollbar(fixedplugin)
    }

    if (document.getElementsByClassName('fixed-plugin')[0]) {
      var fixedplugin = document.querySelector('.fixed-plugin')
      const ps3 = new PerfectScrollbar(fixedplugin)
    }
  }
})()

// Verify navbar blur on scroll
if (document.getElementById('navbarBlur')) {
  navbarBlurOnScroll('navbarBlur')
}

// initialization of Tooltips
const tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
)
const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

// when input is focused add focused class for style
function focused (el) {
  if (el.parentElement.classList.contains('input-group')) {
    el.parentElement.classList.add('focused')
  }
}

// when input is focused remove focused class for style
function defocused (el) {
  if (el.parentElement.classList.contains('input-group')) {
    el.parentElement.classList.remove('focused')
  }
}

// helper for adding on all elements multiple attributes
function setAttributes (el, options) {
  Object.keys(options).forEach(function (attr) {
    el.setAttribute(attr, options[attr])
  })
}

// adding on inputs attributes for calling the focused and defocused functions
if (document.querySelectorAll('.input-group').length != 0) {
  const allInputs = document.querySelectorAll('input.form-control')
  allInputs.forEach((el) =>
    setAttributes(el, {
      onfocus: 'focused(this)',
      onfocusout: 'defocused(this)'
    })
  )
}

// Fixed Plugin
if (document.querySelector('.fixed-plugin')) {
  const fixedPlugin = document.querySelector('.fixed-plugin')
  const fixedPluginButton = document.querySelector('.fixed-plugin-button')
  const fixedPluginButtonNav = document.querySelector(
    '.fixed-plugin-button-nav'
  )
  const fixedPluginCard = document.querySelector('.fixed-plugin .card')
  const fixedPluginCloseButton = document.querySelectorAll(
    '.fixed-plugin-close-button'
  )
  const navbar = document.getElementById('navbarBlur')
  const buttonNavbarFixed = document.getElementById('navbarFixed')

  if (fixedPluginButton) {
    fixedPluginButton.onclick = function () {
      if (!fixedPlugin.classList.contains('show')) {
        fixedPlugin.classList.add('show')
      } else {
        fixedPlugin.classList.remove('show')
      }
    }
  }

  if (fixedPluginButtonNav) {
    fixedPluginButtonNav.onclick = function () {
      if (!fixedPlugin.classList.contains('show')) {
        fixedPlugin.classList.add('show')
      } else {
        fixedPlugin.classList.remove('show')
      }
    }
  }

  fixedPluginCloseButton.forEach(function (el) {
    el.onclick = function () {
      fixedPlugin.classList.remove('show')
    }
  })

  document.querySelector('body').onclick = function (e) {
    if (
      e.target != fixedPluginButton &&
      e.target != fixedPluginButtonNav &&
      e.target.closest('.fixed-plugin .card') != fixedPluginCard
    ) {
      fixedPlugin.classList.remove('show')
    }
  }

  if (navbar) {
    if (navbar.getAttribute('data-scroll') == 'true' && buttonNavbarFixed) {
      buttonNavbarFixed.setAttribute('checked', 'true')
    }
  }
}

// Set Sidebar Color
function sidebarColor (a) {
  const parent = a.parentElement.children
  const color = a.getAttribute('data-color')

  for (let i = 0; i < parent.length; i++) {
    parent[i].classList.remove('active')
  }

  if (!a.classList.contains('active')) {
    a.classList.add('active')
  } else {
    a.classList.remove('active')
  }

  const sidebar = document.querySelector('.sidenav')
  sidebar.setAttribute('data-color', color)

  if (document.querySelector('#sidenavCard')) {
    const sidenavCard = document.querySelector('#sidenavCard+.btn+.btn')
    const sidenavCardClasses = [
      'btn',
      'btn-sm',
      'w-100',
      'mb-0',
      'bg-gradient-' + color
    ]
    sidenavCard.removeAttribute('class')
    sidenavCard.classList.add(...sidenavCardClasses)
  }
}

// Set Sidebar Type
function sidebarType (a) {
  const parent = a.parentElement.children
  const color = a.getAttribute('data-class')
  const body = document.querySelector('body')
  const bodyWhite = document.querySelector('body:not(.dark-version)')
  const bodyDark = body.classList.contains('dark-version')

  const colors = []

  for (let i = 0; i < parent.length; i++) {
    parent[i].classList.remove('active')
    colors.push(parent[i].getAttribute('data-class'))
  }

  if (!a.classList.contains('active')) {
    a.classList.add('active')
  } else {
    a.classList.remove('active')
  }

  const sidebar = document.querySelector('.sidenav')

  for (let i = 0; i < colors.length; i++) {
    sidebar.classList.remove(colors[i])
  }

  sidebar.classList.add(color)

  // Remove text-white/text-dark classes
  if (color == 'bg-white') {
    const textWhites = document.querySelectorAll('.sidenav .text-white')
    for (let i = 0; i < textWhites.length; i++) {
      textWhites[i].classList.remove('text-white')
      textWhites[i].classList.add('text-dark')
    }
  } else {
    var textDarks = document.querySelectorAll('.sidenav .text-dark')
    for (let i = 0; i < textDarks.length; i++) {
      textDarks[i].classList.add('text-white')
      textDarks[i].classList.remove('text-dark')
    }
  }

  if (color == 'bg-default' && bodyDark) {
    var textDarks = document.querySelectorAll('.navbar-brand .text-dark')
    for (let i = 0; i < textDarks.length; i++) {
      textDarks[i].classList.add('text-white')
      textDarks[i].classList.remove('text-dark')
    }
  }

  // Remove logo-white/logo-dark

  if (color == 'bg-white' && bodyWhite) {
    var navbarBrand = document.querySelector('.navbar-brand-img')
    var navbarBrandImg = navbarBrand.src

    if (navbarBrandImg.includes('logo-ct.png')) {
      var navbarBrandImgNew = navbarBrandImg.replace('logo-ct', 'logo-ct-dark')
      navbarBrand.src = navbarBrandImgNew
    }
  } else {
    var navbarBrand = document.querySelector('.navbar-brand-img')
    var navbarBrandImg = navbarBrand.src
    if (navbarBrandImg.includes('logo-ct-dark.png')) {
      var navbarBrandImgNew = navbarBrandImg.replace('logo-ct-dark', 'logo-ct')
      navbarBrand.src = navbarBrandImgNew
    }
  }

  if (color == 'bg-white' && bodyDark) {
    var navbarBrand = document.querySelector('.navbar-brand-img')
    var navbarBrandImg = navbarBrand.src

    if (navbarBrandImg.includes('logo-ct.png')) {
      var navbarBrandImgNew = navbarBrandImg.replace('logo-ct', 'logo-ct-dark')
      navbarBrand.src = navbarBrandImgNew
    }
  }
}

// Set Navbar Fixed
function navbarFixed (el) {
  const classes = [
    'position-sticky',
    'bg-white',
    'left-auto',
    'top-2',
    'z-index-sticky'
  ]
  const navbar = document.getElementById('navbarBlur')

  if (!el.getAttribute('checked')) {
    toggleNavLinksColor('blur')
    navbar.classList.add(...classes)
    navbar.setAttribute('data-scroll', 'true')
    navbarBlurOnScroll('navbarBlur')
    el.setAttribute('checked', 'true')
  } else {
    toggleNavLinksColor('transparent')
    navbar.classList.remove(...classes)
    navbar.setAttribute('data-scroll', 'false')
    navbarBlurOnScroll('navbarBlur')
    el.removeAttribute('checked')
  }
}

// Set Navbar Minimized
function navbarMinimize (el) {
  const sidenavShow = document.getElementsByClassName('g-sidenav-show')[0]

  if (!el.getAttribute('checked')) {
    sidenavShow.classList.remove('g-sidenav-pinned')
    sidenavShow.classList.add('g-sidenav-hidden')
    el.setAttribute('checked', 'true')
  } else {
    sidenavShow.classList.remove('g-sidenav-hidden')
    sidenavShow.classList.add('g-sidenav-pinned')
    el.removeAttribute('checked')
  }
}

function toggleNavLinksColor (type) {
  const navLinks = document.querySelectorAll(
    '.navbar-main .nav-link, .navbar-main .breadcrumb-item, .navbar-main .breadcrumb-item a, .navbar-main h6'
  )
  const navLinksToggler = document.querySelectorAll(
    '.navbar-main .sidenav-toggler-line'
  )

  if (type === 'blur') {
    navLinks.forEach((element) => {
      element.classList.remove('text-white')
    })

    navLinksToggler.forEach((element) => {
      element.classList.add('bg-dark')
      element.classList.remove('bg-white')
    })
  } else if (type === 'transparent') {
    navLinks.forEach((element) => {
      element.classList.add('text-white')
    })

    navLinksToggler.forEach((element) => {
      element.classList.remove('bg-dark')
      element.classList.add('bg-white')
    })
  }
}

// Navbar blur on scroll
function navbarBlurOnScroll (id) {
  const navbar = document.getElementById(id)
  const navbarScrollActive = navbar
    ? navbar.getAttribute('data-scroll')
    : false
  const scrollDistance = 5
  const classes = ['bg-white', 'left-auto', 'position-sticky']
  const toggleClasses = ['shadow-none']

  if (navbarScrollActive == 'true') {
    window.onscroll = debounce(function () {
      if (window.scrollY > scrollDistance) {
        blurNavbar()
      } else {
        transparentNavbar()
      }
    }, 10)
  } else {
    window.onscroll = debounce(function () {
      transparentNavbar()
    }, 10)
  }

  const isWindows = navigator.platform.indexOf('Win') > -1

  if (isWindows) {
    const content = document.querySelector('.main-content')
    if (navbarScrollActive == 'true') {
      content.addEventListener(
        'ps-scroll-y',
        debounce(function () {
          if (content.scrollTop > scrollDistance) {
            blurNavbar()
          } else {
            transparentNavbar()
          }
        }, 10)
      )
    } else {
      content.addEventListener(
        'ps-scroll-y',
        debounce(function () {
          transparentNavbar()
        }, 10)
      )
    }
  }

  function blurNavbar () {
    navbar.classList.add(...classes)
    navbar.classList.remove(...toggleClasses)

    toggleNavLinksColor('blur')
  }

  function transparentNavbar () {
    navbar.classList.remove(...classes)
    navbar.classList.add(...toggleClasses)

    toggleNavLinksColor('transparent')
  }
}

// Debounce Function
// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.
function debounce (func, wait, immediate) {
  let timeout
  return function () {
    const context = this
    const args = arguments
    const later = function () {
      timeout = null
      if (!immediate) func.apply(context, args)
    }
    const callNow = immediate && !timeout
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
    if (callNow) func.apply(context, args)
  }
}

// Toggle Sidenav
const iconNavbarSidenav = document.getElementById('iconNavbarSidenav')
const iconSidenav = document.getElementById('iconSidenav')
const sidenav = document.getElementById('sidenav-main')
const body = document.getElementsByTagName('body')[0]
const className = 'g-sidenav-pinned'

if (iconNavbarSidenav) {
  iconNavbarSidenav.addEventListener('click', toggleSidenav)
}

if (iconSidenav) {
  iconSidenav.addEventListener('click', toggleSidenav)
}

function toggleSidenav () {
  if (body.classList.contains(className)) {
    body.classList.remove(className)
    setTimeout(function () {
      sidenav.classList.remove('bg-white')
    }, 100)
    sidenav.classList.remove('bg-transparent')
  } else {
    body.classList.add(className)
    sidenav.classList.add('bg-white')
    sidenav.classList.remove('bg-transparent')
    iconSidenav.classList.remove('d-none')
  }
}

const html = document.getElementsByTagName('html')[0]

html.addEventListener('click', function (e) {
  if (
    body.classList.contains('g-sidenav-pinned') &&
    !e.target.classList.contains('sidenav-toggler-line')
  ) {
    body.classList.remove(className)
  }
})

// Resize navbar color depends on configurator active type of sidenav

const referenceButtons = document.querySelector('[data-class]')

window.addEventListener('resize', navbarColorOnResize)

function navbarColorOnResize () {
  if (window.innerWidth > 1200) {
    if (
      referenceButtons.classList.contains('active') &&
      referenceButtons.getAttribute('data-class') === 'bg-transparent'
    ) {
      sidenav.classList.remove('bg-white')
    } else {
      if (!body.classList.contains('dark-version')) {
        sidenav.classList.add('bg-white')
      }
    }
  } else {
    sidenav.classList.add('bg-white')
    sidenav.classList.remove('bg-transparent')
  }
}

// Deactivate sidenav type buttons on resize and small screens
window.addEventListener('resize', sidenavTypeOnResize)
window.addEventListener('load', sidenavTypeOnResize)

function sidenavTypeOnResize () {
  const elements = document.querySelectorAll('[onclick="sidebarType(this)"]')
  if (window.innerWidth < 1200) {
    elements.forEach(function (el) {
      el.classList.add('disabled')
    })
  } else {
    elements.forEach(function (el) {
      el.classList.remove('disabled')
    })
  }
}

// Tabs navigation

const total = document.querySelectorAll('.nav-pills')

total.forEach(function (item, i) {
  let moving_div = document.createElement('div')
  const first_li = item.querySelector('li:first-child .nav-link')
  const tab = first_li.cloneNode()
  tab.innerHTML = '-'

  moving_div.classList.add('moving-tab', 'position-absolute', 'nav-link')
  moving_div.appendChild(tab)
  item.appendChild(moving_div)

  const list_length = item.getElementsByTagName('li').length

  moving_div.style.padding = '0px'
  moving_div.style.width =
    item.querySelector('li:nth-child(1)').offsetWidth + 'px'
  moving_div.style.transform = 'translate3d(0px, 0px, 0px)'
  moving_div.style.transition = '.5s ease'

  item.onmouseover = function (event) {
    const target = getEventTarget(event)
    const li = target.closest('li') // get reference
    if (li) {
      const nodes = Array.from(li.closest('ul').children) // get array
      const index = nodes.indexOf(li) + 1
      item.querySelector('li:nth-child(' + index + ') .nav-link').onclick =
        function () {
          moving_div = item.querySelector('.moving-tab')
          let sum = 0
          if (item.classList.contains('flex-column')) {
            for (var j = 1; j <= nodes.indexOf(li); j++) {
              sum += item.querySelector('li:nth-child(' + j + ')').offsetHeight
            }
            moving_div.style.transform = 'translate3d(0px,' + sum + 'px, 0px)'
            moving_div.style.height = item.querySelector(
              'li:nth-child(' + j + ')'
            ).offsetHeight
          } else {
            for (var j = 1; j <= nodes.indexOf(li); j++) {
              sum += item.querySelector('li:nth-child(' + j + ')').offsetWidth
            }
            moving_div.style.transform = 'translate3d(' + sum + 'px, 0px, 0px)'
            moving_div.style.width =
              item.querySelector('li:nth-child(' + index + ')').offsetWidth +
              'px'
          }
        }
    }
  }
})

// Tabs navigation resize

window.addEventListener('resize', function (event) {
  total.forEach(function (item, i) {
    item.querySelector('.moving-tab').remove()
    const moving_div = document.createElement('div')
    const tab = item.querySelector('.nav-link.active').cloneNode()
    tab.innerHTML = '-'

    moving_div.classList.add('moving-tab', 'position-absolute', 'nav-link')
    moving_div.appendChild(tab)

    item.appendChild(moving_div)

    moving_div.style.padding = '0px'
    moving_div.style.transition = '.5s ease'

    const li = item.querySelector('.nav-link.active').parentElement

    if (li) {
      const nodes = Array.from(li.closest('ul').children) // get array
      const index = nodes.indexOf(li) + 1

      let sum = 0
      if (item.classList.contains('flex-column')) {
        for (var j = 1; j <= nodes.indexOf(li); j++) {
          sum += item.querySelector('li:nth-child(' + j + ')').offsetHeight
        }
        moving_div.style.transform = 'translate3d(0px,' + sum + 'px, 0px)'
        moving_div.style.width =
          item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px'
        moving_div.style.height = item.querySelector(
          'li:nth-child(' + j + ')'
        ).offsetHeight
      } else {
        for (var j = 1; j <= nodes.indexOf(li); j++) {
          sum += item.querySelector('li:nth-child(' + j + ')').offsetWidth
        }
        moving_div.style.transform = 'translate3d(' + sum + 'px, 0px, 0px)'
        moving_div.style.width =
          item.querySelector('li:nth-child(' + index + ')').offsetWidth + 'px'
      }
    }
  })

  if (window.innerWidth < 991) {
    total.forEach(function (item, i) {
      if (!item.classList.contains('flex-column')) {
        item.classList.add('flex-column', 'on-resize')
      }
    })
  } else {
    total.forEach(function (item, i) {
      if (item.classList.contains('on-resize')) {
        item.classList.remove('flex-column', 'on-resize')
      }
    })
  }
})

function getEventTarget (e) {
  e = e || window.event
  return e.target || e.srcElement
}

// End tabs navigation

// Light Mode / Dark Mode
function darkMode (el) {
  const body = document.body
  const navbarBrand = document.querySelector('.navbar-brand-img')
  const cardNavLinksIcons = document.querySelectorAll('.card .nav .nav-link i')
  const cardNavSpan = document.querySelectorAll('.card .nav .nav-link span')
  const elementsToToggle = [
    { selector: 'hr.dark', classToRemove: 'dark', classToAdd: 'light' },
    {
      selector: '.text-dark',
      classToRemove: 'text-dark',
      classToAdd: 'text-white'
    },
    {
      selector: '.text-secondary',
      classToRemove: 'text-secondary',
      classToAdd: 'text-white opacity-8'
    },
    {
      selector: '.bg-gray-100',
      classToRemove: 'bg-gray-100',
      classToAdd: 'bg-gray-600'
    },
    {
      selector: '.btn.btn-link .ni.text-dark',
      classToRemove: 'text-dark',
      classToAdd: 'text-white'
    },
    {
      selector: '.btn.btn-link .ni.text-white',
      classToRemove: 'text-white',
      classToAdd: 'text-dark'
    }
  ]

  function toggleClassList (elements, classToRemove, classToAdd) {
    elements.forEach(function (element) {
      element.classList.remove(classToRemove)
      element.classList.add(classToAdd)
    })
  }

  if (!el.checked) {
    body.classList.add('dark-version')
    if (navbarBrand.src.includes('logo-ct-dark.png')) {
      navbarBrand.src = navbarBrand.src.replace('logo-ct-dark', 'logo-ct')
    }
    toggleClassList(cardNavLinksIcons, 'text-dark', 'text-white')
    toggleClassList(cardNavSpan, 'text-sm', 'text-white')
    elementsToToggle.forEach(function (item) {
      toggleClassList(
        document.querySelectorAll(item.selector),
        item.classToRemove,
        item.classToAdd
      )
    })
  } else {
    body.classList.remove('dark-version')
    if (navbarBrand.src.includes('logo-ct.png')) {
      navbarBrand.src = navbarBrand.src.replace('logo-ct', 'logo-ct-dark')
    }
    toggleClassList(cardNavLinksIcons, 'text-white', 'text-dark')
    toggleClassList(cardNavSpan, 'text-white', 'text-sm')
    elementsToToggle.forEach(function (item) {
      toggleClassList(
        document.querySelectorAll(item.selector),
        item.classToAdd,
        item.classToRemove
      )
    })
  }
}
