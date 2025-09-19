let arrow = document.querySelector("#arrow");

arrow.addEventListener("click", (e) => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });

});