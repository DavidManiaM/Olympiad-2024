let buttons = document.querySelectorAll(".bx-copy-alt");
let copyConfirmationMessages = document.querySelectorAll(".copyConfirmationMessage");
let copyTexts = ["chimia.ro-helpline@gmail.com", "+40 727 000 000", "chimia.ro-feedback@gmail.com", "+40 727 999 999"];

for (let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("mousedown", async (e) => {

        if (navigator.clipboard && navigator.clipboard.writeText) {
            try {
                await navigator.clipboard.writeText(copyTexts[i]);
                console.log('Text copiat: ' + copyTexts[i]);
                copyConfirmationMessages[i].style.transition = 100 + "ms";
                copyConfirmationMessages[i].style.opacity = 1;

                setTimeout(() => {
                    copyConfirmationMessages[i].style.transition = 300 + "ms";
                    copyConfirmationMessages[i].style.opacity = 0;
                }, 1000);
            } catch (error) {
                console.error('Eroare la copierea textului: ' + error);
                alert('Eroare la copierea textului: ' + error);
            }
        } else {
            console.error('Nu se poate copia textul');
            alert('Nu se poate copia textul');
        }
    });
}