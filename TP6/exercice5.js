 let par = document.getElementById("par");
        par.textContent = "Le texte a été modifié";
        par.style.backgroundColor = "lightblue";
        par.style.textAlign = "center";

   
    let EX = document.getElementById("exercice");
        EX.addEventListener("click", function () {
        par.textContent = "Un clic a été détecté";
    });