"use strict"
let book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#book_sel")
let add_book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#add_book_sel")

let book_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".books")
let add_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".add")

const toggleHideElement = function (elem: HTMLDivElement, elements: HTMLDivElement[])  {
    elem.classList.remove("hiddenClass")
    elements.forEach(function (x)  {
        x.classList.add("hiddenClass")
    })
}

add_book_sel?.addEventListener("click", function ()  {
    toggleHideElement(add_div, [book_div])
})

book_sel?.addEventListener("click", function ()  {
    toggleHideElement(book_div, [add_div])
})
