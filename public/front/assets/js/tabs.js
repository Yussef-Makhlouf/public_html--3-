const tabs = document.querySelectorAll('.tabs li')
const tabsArray = Array.from(tabs)

const divs = document.querySelectorAll('.tab-content > div')
const divsArray = Array.from(divs)

tabsArray.forEach((el) => {
    el.addEventListener('click', (e) => {
        tabsArray.forEach((el) => {
            el.classList.remove('active')
        })
        e.currentTarget.classList.add('active')
        divsArray.forEach((div) => {
            div.style.display = 'none'
        })
        // console.log(e.currentTarget.dataset.cont)
        document.querySelector(e.currentTarget.dataset.cont).style.display = 'block'
    })
    
    
})