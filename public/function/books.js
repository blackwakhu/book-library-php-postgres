"use strict";
// anchor elements
var book_sel = document.querySelector("#book_sel");
var add_book_sel = document.querySelector("#add_book_sel");
// div elements
var book_div = document.querySelector(".books");
var add_div = document.querySelector(".add");
var book_table_div = document.querySelector(".single_table_book_div");
// button elements
var author_book_btn = document.querySelector("#single_book_add_author_btn");
var genre_book_btn = document.querySelector("#single_book_add_genre_btn");
// functions
var toggleHideElement = function (elem, elements) {
    elem.classList.remove("hiddenClass");
    elements.forEach(function (x) {
        x.classList.add("hiddenClass");
    });
};
// event listeners
add_book_sel === null || add_book_sel === void 0 ? void 0 : add_book_sel.addEventListener("click", function () {
    toggleHideElement(add_div, [book_div]);
});
book_sel === null || book_sel === void 0 ? void 0 : book_sel.addEventListener("click", function () {
    toggleHideElement(book_div, [add_div]);
});
