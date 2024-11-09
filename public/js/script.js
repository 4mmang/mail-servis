window.onscroll = function () {
    const header = document.querySelector('header');
    const fixedNav = header.offsetTop;
    if (window.pageYOffset > fixedNav) {
        header.classList.add('navbar-fixed')
    } else {
        header.classList.remove('navbar-fixed')
    }
}

const hamburger = document.querySelector('#hamburger')
const navMenu = document.querySelector('#nav-menu');
hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('hamburger-active')
    navMenu.classList.toggle('hidden')
})

// slideshow

let currentSlide = 0;
const slides = document.getElementById("slides");
const indicators = document.querySelectorAll("#indicators div");

// function showSlide(index) {
//     const totalSlides = indicators.length;
//     if (index >= totalSlides) {
//         currentSlide = 0;
//     } else if (index < 0) {
//         currentSlide = totalSlides - 1;
//     } else {
//         currentSlide = index;
//     }

//     // Update transform untuk menggeser slide
//     slides.style.transform = `translateX(-${currentSlide * 100}%)`;

//     // Update indikator
//     indicators.forEach((indicator, i) => {
//         indicator.classList.toggle("active", i === currentSlide);
//     });
// }

// Automatic Slide
// setInterval(() => {
//     showSlide(currentSlide + 1);
// }, 3000); // Ganti slide setiap 3 detik

// // Show first slide
// showSlide(currentSlide);

// dropdown menu
// const publikasi = document.querySelector('.group.relative');
// const dropdown = publikasi.querySelector('ul');