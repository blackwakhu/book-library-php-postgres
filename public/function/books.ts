let book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#book_sel")
let add_book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#add_book_sel")

let book_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".books")
let add_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".add")

const toggleHideElement = function (elem: HTMLDivElement, elements: HTMLDivElement[])  {
    elem.style.display = "block"
}

add_book_sel?.addEventListener("click", function ()  {
    alert("clicked")
    toggleHideElement(add_div, [book_div])
})
