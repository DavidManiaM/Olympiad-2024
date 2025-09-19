const carrContainer = document.querySelector('#carrDiv');
const images = document.querySelectorAll('.carrouselImg');
const totalSlides = images.length;
let currentIndex = 0;
let timer = 0;

let shadows = document.querySelectorAll(".shadow");

function nextSlide() {
    currentIndex = (currentIndex + 1 + totalSlides) % totalSlides;
    updateCarousel();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateCarousel();
}

function updateCarousel() {
    const translateValue = -currentIndex * (100 / totalSlides) + '%';
    carrContainer.style.transform = 'translateX(' + translateValue + ')';
}

setInterval(() => {
    timer += 100;
    if (timer >= 3000) {
        timer = 0;
        nextSlide();
    }
}, 100);

for (let i = 0; i < shadows.length; i++) {
    shadows[i].addEventListener("mousedown", (e) => {
        console.log(e.offsetX);
        if (i == 0) {
            prevSlide();
            timer = 0;
        } else if (i == 1) {
            nextSlide();
            timer = 0;
        }
    });
}

let selectionDiv = document.querySelector("#selectionDiv");
let imgBorders = document.querySelectorAll(".imgBorder");
let openedImg = null;

for (let i = 0; i < imgBorders.length; i++) {
    imgBorders[i].addEventListener("mousedown", (e) => {
        if (i != openedImg) {
            imgBorders[i].style.width = 75 + "%";
            for (let j = 0; j < imgBorders.length; j++)
                if (i != j)
                    imgBorders[j].style.width = 130 + "px";
            openedImg = i;
        } else {
            for (let j = 0; j < imgBorders.length; j++)
                imgBorders[j].style.width = 330 + "px";
            openedImg = null;
        }
    });
}