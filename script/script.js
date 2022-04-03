'use strict'

const main = () => {
    const burger  = (burgerBtn, closeBtn, modal, activeClass) => {
        const menuOpen = document.querySelector(`.${burgerBtn}`)
        const menuClose = document.querySelector(`.${closeBtn}`)
        const menu = document.querySelector(`.${modal}`)

        menuOpen.addEventListener('click', () => {
            menu.classList.add(`${activeClass}`)
        })
        menuClose.addEventListener('click', () => {
            menu.classList.remove(`${activeClass}`)
        })
        menu.addEventListener('click', (e) => {
            if (e.target.closest('li')) {
                menu.classList.remove(`${activeClass}`)
            }
        })
    }

    const scrollTo = (list, link, dataName) => {
        const listLinks = document.querySelector(`.${list}`)
        const sections = document.querySelectorAll('section')

        listLinks.addEventListener('click', (e) => {
            if (e.target.closest(`.${link}`) && e.target.getAttribute(`${dataName}`)) {
                e.preventDefault()
                sections.forEach(item => {
                    if (e.target.getAttribute(`${dataName}`)
                    === item.classList.value) {
                        item.scrollIntoView({block: "start", behavior: "smooth"});
                    }
                })
            }
        })
    }


    scrollTo('header__list', 'header__link', 'data-name')
    burger('header__burger', 'header__close', 'header__inner', 'header__inner_active')
}

main()