"use strict"
// anchor elements
let book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#book_sel")
let add_book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#add_book_sel")

// div elements
let book_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".books")
let add_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".add")
let book_table_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".single_table_book_div")

// button elements
let author_book_btn: HTMLButtonElement | null = document.querySelector<HTMLButtonElement>("#single_book_add_author_btn")
let genre_book_btn: HTMLButtonElement | null = document.querySelector<HTMLButtonElement>("#single_book_add_genre_btn")

// functions
const toggleHideElement = function (elem: any, elements: any[])  {
    elem.classList.remove("hiddenClass")
    elements.forEach(function (x)  {
        x.classList.add("hiddenClass")
    })
}

// event listeners
add_book_sel?.addEventListener("click", function ()  {
    toggleHideElement(add_div, [book_div])
})

book_sel?.addEventListener("click", function ()  {
    toggleHideElement(book_div, [add_div])
})
