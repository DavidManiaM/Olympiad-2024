let menuIcon = document.querySelector("#menuIcon");
let sidebar = document.querySelector("#sidebar");
let body = document.querySelector("body");
let mouseTracker = {
    x: 0,
    y: 0
};
let header = document.querySelector("header");
let mouseTimer = 500;

setInterval(() => {
    mouseTimer += 100
}, 100);

window.addEventListener("mousemove", (e) => {
    mouseTracker.x = e.clientX;
    mouseTracker.y = e.clientY;

    if (mouseTracker.x < 5 && mouseTracker.y >= header.clientHeight && mouseTimer >= 500) {
        if (sidebar.classList.contains("closed")) {
            sidebar.classList.remove("closed");
            sidebar.classList.add("open");
            mouseTimer = 0;
        } else if (sidebar.classList.contains("open")) {
            sidebar.classList.remove("open");
            sidebar.classList.add("closed");
            mouseTimer = 0;
        }
    }
});

menuIcon.addEventListener("mousedown", (e) => {
    if (sidebar.classList.contains("open")) {
        sidebar.classList.remove("open");
        sidebar.classList.add("closed");
    } else if (sidebar.classList.contains("closed")) {
        sidebar.classList.remove("closed");
        sidebar.classList.add("open");
    }
});


let sidebarRows = document.querySelectorAll(".sidebarRow");

for (let i = 0; i < sidebarRows.length; i++) {
    sidebarRows[i].addEventListener("mousedown", (e) => {
        if (e.button == 0) {
            if (i == 0) {
                window.location.href = "../php/index.php";
            }
            if (i == 1) {
                window.location.href = "../php/elemente.php";
            }
            if (i == 2) {
                window.location.href = "../php/tabelulPeriodic.php";
            }
            if (i == 3) {
                window.location.href = "../php/contact.php";
            }
        }
    });
}

let closeSidebars = document.getElementsByClassName("closeSidebar");
for (let i = 0; i < closeSidebars.length; i++) {
    closeSidebars[i].addEventListener("mousedown", (e) => {
        if (sidebar.classList.contains("open")) {
            sidebar.classList.remove("open");
            sidebar.classList.add("closed");
        }
    });
}