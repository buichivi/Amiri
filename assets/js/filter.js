// Select size
const listSizes = document.querySelectorAll('.size-item');
listSizes.forEach(function(size) {
    size.addEventListener('click', function() {
        if (this.classList.contains('size-item--selected')) {
            this.classList.remove('size-item--selected');
        }
        else
            this.classList.add('size-item--selected');
    })
})


// Show filter item hidden
const filterItems = document.querySelectorAll('.filter-item .filter-item-name');

filterItems.forEach(function(filterItem) {
    filterItem.addEventListener('click', function(e) {
        const plusIcon = this.querySelector('.icon-plus');
        plusIcon.style.display = (plusIcon.style.display == 'none') ? 'block' : 'none' ;

        const hiddenFilter = this.nextElementSibling;
        if (hiddenFilter.classList.contains('active')) {
            hiddenFilter.classList.add('close-filter-animation');
            setTimeout(function() {
                hiddenFilter.classList.remove('active');
            }, 200);
        }
        else  {
            hiddenFilter.classList.remove('close-filter-animation');
            hiddenFilter.classList.add('active');
        }
    });
})


// Show sort list
const sortHeading = document.querySelector('.sort-group__heading');
const sortList = document.querySelector('.sort-list');
const iconSortList = document.querySelector('.sort-group__icon');
iconSortList.style.transform = 'rotate(0)';

sortHeading.addEventListener('click', function() {
    iconSortList.style.transform = (iconSortList.style.transform == 'rotate(0deg)') ? 'rotate(180deg)' : 'rotate(0deg)';
    if (sortList.classList.contains('active')) {
        sortList.classList.add('close-sort-list-animation');
        setTimeout(function() {
            sortList.classList.remove('active');
        }, 150);
    }
    else {
        sortList.classList.remove('close-sort-list-animation');
        sortList.classList.add('active');
    }
});