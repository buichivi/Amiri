// Slider product

// Product Man
const ulProduct_man = document.querySelector(".list-product--man");
const listProd_man = document.querySelectorAll(".product--man");
const moveProductRight_man = document.querySelector(".move-product-right--man");
const moveProductLeft_man = document.querySelector(".move-product-left--man");

listProd_man.forEach(function (product, index) {
    product.style.left = index * (product.clientWidth + 34) + "px";
});
var idxProduct = 0;
moveProductRight_man.addEventListener("click", function () {
    if (idxProduct == listProd_man.length - 5) {
        return;
    }
    idxProduct++;
    ulProduct_man.style.left =
        "-" + idxProduct * (listProd_man[0].clientWidth + 34) + "px";
});
moveProductLeft_man.addEventListener("click", function () {
    idxProduct--;
    if (idxProduct < 0) {
        idxProduct = 0;
        return;
    }
    ulProduct_man.style.left =
        "-" + idxProduct * (listProd_man[0].clientWidth + 34) + "px";
});


// Product Moda
const ulProduct_moda = document.querySelector(".list-product--moda");
const listProd_moda = document.querySelectorAll(".product--moda");
const moveProductRight_moda = document.querySelector(
    ".move-product-right--moda"
);
const moveProductLeft_moda = document.querySelector(".move-product-left--moda");

listProd_moda.forEach(function (product, index) {
    product.style.left = index * (product.clientWidth + 34) + "px";
});
var idxProduct = 0;
moveProductRight_moda.addEventListener("click", function () {
    if (idxProduct == listProd_moda.length - 5) {
        return;
    }
    idxProduct++;
    ulProduct_moda.style.left =
        "-" + idxProduct * (listProd_moda[0].clientWidth + 34) + "px";
});
moveProductLeft_moda.addEventListener("click", function () {
    idxProduct--;
    if (idxProduct < 0) {
        idxProduct = 0;
        return;
    }
    ulProduct_moda.style.left =
        "-" + idxProduct * (listProd_moda[0].clientWidth + 34) + "px";
});