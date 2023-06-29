// Đóng mở product size
const listSizeProds = document.querySelectorAll(".product__size i");
listSizeProds.forEach(function (listSize, index) {
    listSize.addEventListener("click", function () {
        const prodSizeItem = listSize.nextElementSibling;
        if (prodSizeItem.classList.contains("open-product__size")) {
            prodSizeItem.classList.add("close-product__size-animation");
            setTimeout(function () {
                prodSizeItem.classList.remove("open-product__size");
                prodSizeItem.classList.remove("close-product__size-animation");
            }, 150);
            return;
        }
        prodSizeItem.classList.add("open-product__size");
    });
});


// Like product
const likeIcons = document.querySelectorAll('.product__like');
likeIcons.forEach(function(likeIcon) {
    likeIcon.addEventListener('click', function() {
        const likedIcon = this.querySelector('.product__like-icon--filled');
        if (likedIcon.classList.contains('active')) {
            likedIcon.classList.remove('active');
        }
        else {
            likedIcon.classList.add('active');
        }
    });
});