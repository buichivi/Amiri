// Open and close cart info
const cart = document.querySelector(".cart__icon");
const cartInfo = document.querySelector(".cart-info");
const closeCartInfoBtn = document.querySelector(".cart-info__close");

function showCartInfo() {
    cartInfo.classList.remove("close-cart-animation");
    cartInfo.classList.add("open-cart-info");
}

function closeCartInfo() {
    cartInfo.classList.add("close-cart-animation");
    setTimeout(function () {
        cartInfo.classList.remove("open-cart-info");
    }, 400);
}

cart.addEventListener("click", showCartInfo);
closeCartInfoBtn.addEventListener("click", closeCartInfo);

// Slider img
// const imgPos = document.querySelectorAll('.aspect-ratio-169 img');
// const imgContainer = document.querySelector('.aspect-ratio-169');
// const dotItem = document.querySelectorAll('.dot');
// const moveRightArrow = document.querySelector('.move-right-btn');
// const moveLeftArrow = document.querySelector('.move-left-btn');

// let idx = 0;
// imgPos.forEach(function(img, index) {
//     img.style.left = index*100 + '%';
//     dotItem[index].addEventListener('click', function() {
//         changeSlideByDot(index);
//         idx = index;
//     });
// });

// function imgSlide() {
//     if (idx == imgPos.length - 1) { idx = -1; }
//     idx++;
//     changeSlideByDot(idx);
// }

// function changeSlideByDot(index) {
//     imgContainer.style.left = '-' + index*100 + '%';
//     dotItem.forEach(function(dot) {
//         dot.classList.remove('dot--active');
//     });
//     dotItem[index].classList.add('dot--active');
// }
// const autoChangeSlide = setInterval(imgSlide, 5000);

// moveRightArrow.addEventListener('click', function() {
//     if (idx == imgPos.length - 1) {
//         idx = -1;
//     }
//     idx++;
//     changeSlideByDot(idx);
//     clearInterval(autoChangeSlide);
// });
// moveLeftArrow.addEventListener('click', function() {
//     if (idx == 0) {
//         idx = imgPos.length
//     }
//     idx--;
//     changeSlideByDot(idx);
//     clearInterval(autoChangeSlide);
// });



// // Select size
// const listSizes = document.querySelectorAll('.size-item');
// listSizes.forEach(function(size) {
//     size.addEventListener('click', function() {
//         if (this.classList.contains('size-item--selected')) {
//             this.classList.remove('size-item--selected');
//         }
//         else
//             this.classList.add('size-item--selected');
//     })
// })


// // Show filter item hidden
// const filterItems = document.querySelectorAll('.filter-item .filter-item-name');

// filterItems.forEach(function(filterItem) {
//     filterItem.addEventListener('click', function(e) {
//         const plusIcon = this.querySelector('.icon-plus');
//         plusIcon.style.display = (plusIcon.style.display == 'none') ? 'block' : 'none' ;

//         const hiddenFilter = this.nextElementSibling;
//         if (hiddenFilter.classList.contains('active')) {
//             hiddenFilter.classList.add('close-filter-animation');
//             setTimeout(function() {
//                 hiddenFilter.classList.remove('active');
//             }, 200);
//         }
//         else  {
//             hiddenFilter.classList.remove('close-filter-animation');
//             hiddenFilter.classList.add('active');
//         }
//     });
// })


// // Show sort list
// const sortHeading = document.querySelector('.sort-group__heading');
// const sortList = document.querySelector('.sort-list');
// const iconSortList = document.querySelector('.sort-group__icon');
// iconSortList.style.transform = 'rotate(0)';

// sortHeading.addEventListener('click', function() {
//     iconSortList.style.transform = (iconSortList.style.transform == 'rotate(0deg)') ? 'rotate(180deg)' : 'rotate(0deg)';
//     if (sortList.classList.contains('active')) {
//         sortList.classList.add('close-sort-list-animation');
//         setTimeout(function() {
//             sortList.classList.remove('active');
//         }, 150);
//     }
//     else {
//         sortList.classList.remove('close-sort-list-animation');
//         sortList.classList.add('active');
//     }
// });

// Product quantity
const productQuantities = document.querySelectorAll('.item-quantity-wrap');
productQuantities.forEach(function(productQuantity) {
    var numberOfProduct = productQuantity.querySelector('.item-quantity');
    var upBtn = productQuantity.querySelector('.item-increase-btn');
    var downBtn = productQuantity.querySelector('.item-decrease-btn');
    upBtn.onclick = function() {
        numberOfProduct.value++;
    }

    downBtn.onclick = function() {
        numberOfProduct.value--;
        if (numberOfProduct.value < numberOfProduct.min) 
            numberOfProduct.value = numberOfProduct.min;
    }
});

function sortHref(value) {
    var curHref = window.location.href;
    var sortNewHref;
    if (curHref.search('&sort') > 0) {
        var pos =curHref.search('&sort');
        sortNewHref = curHref.substring(pos, -1) + '&sort=' + value ;
    }
    else
        sortNewHref = curHref + '&sort=' + value;
    return sortNewHref;
}

function pageHref(value) {
    var curHref = window.location.href;
    var sortNewHref;
    if (curHref.search('&page') > 0) {
        var pos =curHref.search('&page');
        sortNewHref = curHref.substring(pos, -1) + '&page=' + value ;
    }
    else
        sortNewHref = curHref + '&page=' + value;
    return sortNewHref;
}


function accountPageLiActive(liElement) {
    document.querySelectorAll('.info-sidebar > ul > li')[liElement].classList.add('active');
}