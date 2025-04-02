let track = document.querySelector('.product-carousel-track');
let slides = Array.from(track.children);
let slideWidth = slides[0].getBoundingClientRect().width;
let currentIndex = 0;

const firstClone = slides[0].cloneNode(true);
const lastClone = slides[slides.length - 1].cloneNode(true);

track.appendChild(firstClone);
track.insertBefore(lastClone, slides[0]);

let totalSlides = track.children.length;

track.style.transform = 'translateX(' + (-slideWidth * (currentIndex + 1)) + 'px)';

function moveToSlide(index) {
    track.style.transition = 'transform 0.5s ease-in-out';
    track.style.transform = 'translateX(' + (-slideWidth * (index + 1)) + 'px)';
    currentIndex = index;
}

function rotateProducts() {
    currentIndex++;
    moveToSlide(currentIndex);

    if (currentIndex >= totalSlides - 2) { 
        setTimeout(() => {
            track.style.transition = 'none';
            currentIndex = 0;
            track.style.transform = 'translateX(' + (-slideWidth * (currentIndex + 1)) + 'px)';
        }, 500); 
    }

    if (currentIndex < 0) {
        setTimeout(() => {
            track.style.transition = 'none';
            currentIndex = totalSlides - 3; 
            track.style.transform = 'translateX(' + (-slideWidth * (currentIndex + 1)) + 'px)';
        }, 500);
    }
}

setInterval(rotateProducts, 3000);
