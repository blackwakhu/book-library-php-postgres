// anchor elements
let book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#book_sel");
let add_book_sel: HTMLAnchorElement | null = document.querySelector<HTMLAnchorElement>("#add_book_sel");

// div elements
let book_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".books");
let add_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".add");
let book_table_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".single_table_book_div");
let author_book_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".single_book_add_author");
let genre_book_div: HTMLDivElement | null = document.querySelector<HTMLDivElement>(".single_book_add_genre");

// button elements
let author_book_btn: HTMLButtonElement | null = document.querySelector<HTMLButtonElement>("#single_book_add_author_btn");
let genre_book_btn: HTMLButtonElement | null = document.querySelector<HTMLButtonElement>("#single_book_add_genre_btn");

// input elements
let book_edit_btn: HTMLInputElement | null = document.querySelector<HTMLInputElement>(".book_edit_btn");

// select elements
let book_author_select: HTMLSelectElement | null = document.querySelector<HTMLSelectElement>("#book_author_select");

// span elements
let book_author_table_list: HTMLSpanElement | null = document.querySelector<HTMLSpanElement>("#book_author_table_list");

// functions
const toggleHideElement = function (elem: any, elements: any[])  {
    elem.classList.remove("hiddenClass");
    elements.forEach(function (x)  {
        x.classList.add("hiddenClass");
    });
};



// event listeners
add_book_sel?.addEventListener("click", function ()  {
    toggleHideElement(add_div, [book_div]);
});

book_sel?.addEventListener("click", function ()  {
    toggleHideElement(book_div, [add_div]);
});

author_book_btn?.addEventListener("click", function ()  {
    toggleHideElement(author_book_div, [genre_book_div]);
});

genre_book_btn?.addEventListener("click", function () {
    toggleHideElement(genre_book_div, [author_book_div]);
});

book_edit_btn?.addEventListener("click", function ()  {
    
})
