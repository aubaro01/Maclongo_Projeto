    const menuToggle = document.getElementById("menu-toggle");
    const navItems = document.getElementById("nav_items");

    menuToggle.addEventListener("click", () => {
        navItems.classList.toggle("active");
    });


    window.addEventListener("scroll", function() {
        const header = document.querySelector("header");
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
    

    let currentSlide = 0;

    function moverSlide(direcao) {
        const slides = document.querySelector('.slides');
        const totalSlides = document.querySelectorAll('.slides img').length;

        currentSlide += direcao;

        if (currentSlide < 0) {
            currentSlide = totalSlides - 1;
        } else if (currentSlide >= totalSlides) {
            currentSlide = 0;
        }

        slides.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    setInterval(() => {
        moverSlide(1);
    }, 5000);


