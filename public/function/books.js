"use strict";
// other parameters
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g = Object.create((typeof Iterator === "function" ? Iterator : Object).prototype);
    return g.next = verb(0), g["throw"] = verb(1), g["return"] = verb(2), typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
Object.defineProperty(exports, "__esModule", { value: true });
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
function addAuthorToBook(isdn, authorId) {
    return __awaiter(this, void 0, void 0, function () {
        var apiurl, response, data, error_1;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0:
                    apiurl = "".concat(url, "/api/book_author.php");
                    _a.label = 1;
                case 1:
                    _a.trys.push([1, 4, , 5]);
                    return [4 /*yield*/, fetch(apiurl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                book_isdn: isdn,
                                author_id: authorId
                            })
                        })];
                case 2:
                    response = _a.sent();
                    if (!response.ok) {
                        throw new Error("HTTP error! status: ".concat(response.status));
                    }
                    return [4 /*yield*/, response.json()];
                case 3:
                    data = _a.sent();
                    console.log(data);
                    return [2 /*return*/, data];
                case 4:
                    error_1 = _a.sent();
                    console.error('Error: ', error_1);
                    throw error_1;
                case 5: return [2 /*return*/];
            }
        });
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
    var selectedValue = book_author_select === null || book_author_select === void 0 ? void 0 : book_author_select.value;
    console.log(selectedValue);
    if (book_author_table_list) {
        book_author_table_list.innerHTML = "";
        var book_isdn = (_b = (_a = document.querySelector("#book_isdn_span")) === null || _a === void 0 ? void 0 : _a.innerText) !== null && _b !== void 0 ? _b : '';
        console.log("book isdn => ", book_isdn);
        addAuthorToBook(book_isdn, selectedValue)
            .then(function (data) {
            console.log('Data: ', data);
        }).catch(function (error) {
            console.error('Error: ', error);
        });
    }
});
