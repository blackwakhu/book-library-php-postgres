"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
// other parameters
const axios = require("axios");
const url = "http://locahost:4000";
// anchor elements
let book_sel = document.querySelector("#book_sel");
let add_book_sel = document.querySelector("#add_book_sel");
// div elements
let book_div = document.querySelector(".books");
let add_div = document.querySelector(".add");
let book_table_div = document.querySelector(".single_table_book_div");
let author_book_div = document.querySelector(".single_book_add_author");
let genre_book_div = document.querySelector(".single_book_add_genre");
// button elements
let author_book_btn = document.querySelector("#single_book_add_author_btn");
let genre_book_btn = document.querySelector("#single_book_add_genre_btn");
// input elements
let book_edit_btn = document.querySelector(".book_edit_btn");
// select elements
let book_author_select = document.querySelector("#book_author_select");
// span elements
let book_author_table_list = document.querySelector("#book_author_table_list");
// functions
const toggleHideElement = function (elem, elements) {
    elem.classList.remove("hiddenClass");
    elements.forEach(function (x) {
        x.classList.add("hiddenClass");
    });
};
function addAuthorToBook(isdn, authorId) {
    return __awaiter(this, void 0, void 0, function* () {
        const apiUrl = 'http://localhost:4000/api/book_author.php';
        try {
            const response = yield axios.post(apiUrl, {
                isdn,
                authorId
            });
            return response.data;
        }
        catch (error) {
            console.error('Error:', error);
            throw error;
        }
    });
}
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
    let selectedValue = book_author_select === null || book_author_select === void 0 ? void 0 : book_author_select.value;
    console.log(selectedValue);
    if (book_author_table_list) {
        book_author_table_list.innerHTML = "";
        let book_isdn = (_b = (_a = document.querySelector("#book_isdn_span")) === null || _a === void 0 ? void 0 : _a.innerText) !== null && _b !== void 0 ? _b : '';
        console.log("book isdn => ", book_isdn);
        addAuthorToBook(Number(book_isdn), Number(selectedValue))
            .then((data) => {
            console.log('Data: ', data);
        }).catch((error) => {
            console.error('Error: ', error);
        });
    }
});
