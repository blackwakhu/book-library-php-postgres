"use strict";
// other parameters
Object.defineProperty(exports, "__esModule", { value: true });
var api_1 = require("./api");
var url = "http://locahost:4000";
// anchor elements
var book_sel = document.querySelector("#book_sel");
var add_book_sel = document.querySelector("#add_book_sel");
// div elements
var book_div = document.querySelector(".books");
var add_div = document.querySelector(".add");
var book_table_div = document.querySelector(".single_table_book_div");
var author_book_div = document.querySelector(".single_book_add_author");
var genre_book_div = document.querySelector(".single_book_add_genre");
// button elements
var author_book_btn = document.querySelector("#single_book_add_author_btn");
var genre_book_btn = document.querySelector("#single_book_add_genre_btn");
// input elements
var book_edit_btn = document.querySelector(".book_edit_btn");
// select elements
var book_author_select = document.querySelector("#book_author_select");
// span elements
var book_author_table_list = document.querySelector("#book_author_table_list");
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
author_book_btn === null || author_book_btn === void 0 ? void 0 : author_book_btn.addEventListener("click", function () {
    toggleHideElement(author_book_div, [genre_book_div]);
});
genre_book_btn === null || genre_book_btn === void 0 ? void 0 : genre_book_btn.addEventListener("click", function () {
    toggleHideElement(genre_book_div, [author_book_div]);
});
book_edit_btn === null || book_edit_btn === void 0 ? void 0 : book_edit_btn.addEventListener("click", function () {
});
book_author_select === null || book_author_select === void 0 ? void 0 : book_author_select.addEventListener("change", function () {
    var _a, _b;
    var selectedValue = book_author_select === null || book_author_select === void 0 ? void 0 : book_author_select.value;
    console.log(selectedValue);
    if (book_author_table_list) {
        book_author_table_list.innerHTML = "";
        var book_isdn = (_b = (_a = document.querySelector("#book_isdn_span")) === null || _a === void 0 ? void 0 : _a.innerText) !== null && _b !== void 0 ? _b : '';
        console.log("book isdn => ", book_isdn);
        (0, api_1.addAuthorToBook)(book_isdn, Number(selectedValue))
            .then(function (data) {
            console.log('Data: ', data);
        }).catch(function (error) {
            console.error('Error: ', error);
        });
    }
});
