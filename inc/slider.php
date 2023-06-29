    <!-- Slideshow container -->
    <div class="slider-container">
        <div class="slider">
            <div class="aspect-ratio-169">
                <img src="./assets/slider/slider-0.jpg" alt="">
                <img src="./assets/slider/slider-1.jpg" alt="">
                <img src="./assets/slider/slider-2.jpg" alt="">
                <img src="./assets/slider/slider-3.jpg" alt="">
                <img src="./assets/slider/slider-4.jpg" alt="">
            </div>
            <div class="dot-container">
                <div class="dot dot--active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <div class="move-right-btn">
                <i class="move-slide-icon fa-solid fa-arrow-right"></i>
            </div>
            <div class="move-left-btn">
                <i class="move-slide-icon fa-solid fa-arrow-left"></i>
            </div>
        </div>
    </div>

    <!-- JS slider -->
    <script>
        const imgPos = document.querySelectorAll('.aspect-ratio-169 img');
        const imgContainer = document.querySelector('.aspect-ratio-169');
        const dotItem = document.querySelectorAll('.dot');
        const moveRightArrow = document.querySelector('.move-right-btn');
        const moveLeftArrow = document.querySelector('.move-left-btn');

        let idx = 0;
        imgPos.forEach(function (img, index) {
            img.style.left = index * 100 + '%';
            dotItem[index].addEventListener('click', function () {
                changeSlideByDot(index);
                idx = index;
            });
        });

        function imgSlide() {
            if (idx == imgPos.length - 1) { idx = -1; }
            idx++;
            changeSlideByDot(idx);
        }

        function changeSlideByDot(index) {
            imgContainer.style.left = '-' + index * 100 + '%';
            dotItem.forEach(function (dot) {
                dot.classList.remove('dot--active');
            });
            dotItem[index].classList.add('dot--active');
        }
        const autoChangeSlide = setInterval(imgSlide, 5000);

        moveRightArrow.addEventListener('click', function () {
            if (idx == imgPos.length - 1) {
                idx = -1;
            }
            idx++;
            changeSlideByDot(idx);
            clearInterval(autoChangeSlide);
        });
        moveLeftArrow.addEventListener('click', function () {
            if (idx == 0) {
                idx = imgPos.length
            }
            idx--;
            changeSlideByDot(idx);
            clearInterval(autoChangeSlide);
        });

    </script>

    <!-- End JS slider -->