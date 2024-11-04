var book_sel = document.querySelector("#book_sel");
var add_book_sel = document.querySelector("#add_book_sel");
var book_div = document.querySelector(".books");
var add_div = document.querySelector(".add");
var toggleHideElement = function (elem, elements) {
    elem.classList.remove("hiddenClass");
    elements.forEach(function (x) {
        x.classList.add("hiddenClass");
    });
};
add_book_sel === null || add_book_sel === void 0 ? void 0 : add_book_sel.addEventListener("click", function () {
    alert("clicked");
    toggleHideElement(add_div, [book_div]);
});
