const slides = document.querySelector('.slides');
const slide = document.querySelectorAll('.slide');
const next = document.getElementById('next');
const prev = document.getElementById('prev');
let index = 0;
function showSlide(index) {
    slides.style.transform = `translateX(${-index * 100}%)`;
}
next.addEventListener('click', () => {
    index = (index + 1) % slide.length;
    showSlide(index);
});
prev.addEventListener('click', () => {
    index = (index - 1 + slide.length) % slide.length;
    showSlide(index);
});
showSlide(index);