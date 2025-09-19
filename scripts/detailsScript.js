function mapValue(value, a, b, x, y) {
    const cv = Math.min(Math.max(value, a), b);
    const mappedValue = (cv - a) / (b - a) * (y - x) + x;
    return mappedValue;
}

let image = document.querySelector("#image");
let controller = document.querySelector("#controller");
let margin = 0, timer = 0, angle;
let range = document.querySelector("#range");
let shaderSelect = document.querySelector("#shaderSelect");
let shaderMode = shaderSelect.value;
let hoverOption = document.querySelector("#hoverOption");
let hoverMode = "integral";

setInterval(() => {
    timer += 100;
}, 100);

controller.addEventListener("mousemove", (e) => {
    if (shaderMode == "imgRotation") {
        if (timer > 200 && e.offsetX >= margin && e.offsetX <= controller.clientWidth - margin && e.offsetY >= margin && e.offsetY <= controller.clientHeight - margin) {
            let degX = mapValue(e.offsetX, 0, controller.clientWidth, -angle, angle);
            let degY = mapValue(e.offsetY, 0, controller.clientHeight, -angle, angle);
            image.style.transform = `rotateY(${degX}deg) rotateX(${-degY}deg)`;
        }
    }
});

controller.addEventListener("mouseout", (e) => {
    if (shaderMode == "imgRotation") {
        timer = 0;
        image.style.transition = `transform 0.3s ease-out`;
        image.style.transform = `rotateY(0deg) rotateX(0deg)`;
    }
});

function changeValues() {
    if (shaderMode == "imgRotation") {
        let val = Math.floor(mapValue(range.value, 0, 100, 10, 360));
        angle = val;
        image.style.filter = "none";
        circle.style.backdropFilter = "none";
        circle.style.visibility = "hidden";
    }
    else {
        if (hoverMode == "integral") {
            if (shaderMode == "sepia") {
                image.style.filter = `sepia(${range.value}%)`;
            }
            else if (shaderMode == "greyscale") {
                image.style.filter = `grayscale(${range.value}%)`;
            }
            else if (shaderMode == "hueRotate") {
                image.style.filter = `hue-rotate(${1.8 * range.value}deg)`;
            }
            else if (shaderMode == "invert") {
                image.style.filter = `invert(${range.value}%)`;
            }
            else if (shaderMode == "saturate") {
                image.style.filter = `saturate(${10 * range.value}%)`;
            }
        }
        else {
            image.style.filter = "none";
            if (hoverMode == "circle") {
                if (shaderMode == "sepia") {
                    circle.style.backdropFilter = `sepia(${range.value}%)`;
                }
                else if (shaderMode == "greyscale") {
                    circle.style.backdropFilter = `grayscale(${range.value}%)`;
                }
                else if (shaderMode == "hueRotate") {
                    circle.style.backdropFilter = `hue-rotate(${1.8 * range.value}deg)`;
                }
                else if (shaderMode == "invert") {
                    circle.style.backdropFilter = `invert(${range.value}%)`;
                }
                else if (shaderMode == "saturate") {
                    circle.style.backdropFilter = `saturate(${10 * range.value}%)`;
                }
            }
        }
    }
}

range.addEventListener("mousemove", changeValues);
range.addEventListener("mouseup", changeValues);

window.onload = function () {
    range.value = 15;
    angle = Math.floor(mapValue(range.value, 0, 100, 10, 360));
}

shaderSelect.addEventListener("change", (e) => {
    shaderMode = shaderSelect.value;
    image.style.filter = "none";

    range.value = 0;
    angle = 0;

    if (shaderMode == "imgRotation") {
        range.value = 15;
        angle = Math.floor(mapValue(range.value, 0, 100, 10, 360));
        timer = 201;
        controller.className = "open";
        hoverOption.className = "closed";
        circle.style.visibility = "hidden";
    }
    else {
        controller.className = "closed";
        hoverOption.className = "open";
    }
    if (shaderMode == "saturate") {
        range.value = 10;
        angle = range.value;
    }
    changeValues();
});

let mouse = { x: 0, y: 0 };
let circle = document.querySelector("#circle");

window.addEventListener("mousemove", (e) => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
    if (hoverMode == "circle") {
        if (mouse.x > image.clientWidth || mouse.y > image.clientHeight + 120 ||
            mouse.y < 120 || shaderMode == "imgRotation") {
            circle.style.visibility = "hidden";
        }
        else {
            circle.style.visibility = "visible";
        }
        circle.style.top = mouse.y - circle.clientHeight + "px";
        circle.style.left = mouse.x + "px";
    }
});

hoverOption.addEventListener("change", (e) => {
    if (shaderMode != "imgRotation") {
        hoverMode = hoverOption.value;

        if (hoverMode == "integral") {
            circle.style.visibility = "hidden";
        }
        else if (hoverMode == "circle") {
            circle.style.visibility = "visible";
        }
        changeValues();
    }
});

function min(x, y){
    return (x < y) ? x : y;
}

let scrollPower = 60;
let deltaY;
let s = scrollPower;
let minCircleDim = 50;
let maxCircleDim = min(image.clientWidth, image.clientHeight);
window.addEventListener("wheel", (e) => {
    console.log(e);
    deltaY = (e.deltaY > 0) ? -1 : 1;
    s = scrollPower;
    scrollSize();
});
function scrollSize() {
    if (s > 0) {
        circle.style.width = circle.clientWidth + s * deltaY * 0.02 + "px";
        circle.style.height = circle.clientHeight + s * deltaY * 0.02 + "px";

        circle.style.top = mouse.y - circle.clientHeight + "px";
        circle.style.left = mouse.x + "px";
        s--;
        setTimeout(scrollSize, 1);
    }
    if (circle.clientWidth < minCircleDim)
        circle.style.width = minCircleDim + "px";
    if (circle.clientHeight < minCircleDim)
        circle.style.height = minCircleDim + "px";

    if (circle.clientWidth > maxCircleDim)
        circle.style.width = maxCircleDim + "px";
    if (circle.clientHeight > maxCircleDim)
        circle.style.height = maxCircleDim + "px";
}

let tempOption = document.querySelector("#tempOption");
let tempNumber = document.querySelector("#tempNumber");
const defaultTempOption = Number(tempNumber.innerHTML);
tempOption.addEventListener("change", (e) => {
    if(tempOption.value == "kelvin")
        tempNumber.innerHTML = Math.round((defaultTempOption + Number.EPSILON) * 100) / 100;
    else if(tempOption.value == "celcius")
        tempNumber.innerHTML = Math.round((defaultTempOption - 273.15 + Number.EPSILON) * 100) / 100;
    else if(tempOption.value == "fahrenheit")
        tempNumber.innerHTML = Math.round((defaultTempOption * 1.8 - 459.67 + Number.EPSILON) * 100) / 100;
});