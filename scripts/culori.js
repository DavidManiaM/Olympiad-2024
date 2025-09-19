const colors = ["#800000", "brown", "#c1423d", "#c35817" ,"#ed820e", "#ed820e", "#c35817", "#c1423d", "brown", "#800000"];

window.onload = function(){
    let wordContainers = document.getElementsByClassName('color');

    for (let i = 0; i < wordContainers.length; i++) {
        let words = wordContainers[i].textContent;
        wordContainers[i].innerHTML = '';
        for (let j = 0; j < words.length; j++) {
            let letterSpan = document.createElement('span');
            letterSpan.textContent = words[j];
            letterSpan.style.color = colors[j % colors.length];
            wordContainers[i].appendChild(letterSpan);
        }
    }
}