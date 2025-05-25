function ex1() {
    let n1 = Number(prompt("Veuillez entrer le premier nombre :"));
    let n2 = Number(prompt("Veuillez entrer le deuxième nombre :"));

    let somme = n1 + n2;
    let difference = n1 - n2;
    let produit = n1 * n2;
    let quotient = n1 / n2;

    console.log("Résultats des opérations entre " + n1 + " et " + n2 + ":");
    console.log("Somme: " + n1 + " + " + n2 + " = " + somme);
    console.log("Différence: " + n1 + " - " + n2 + " = " + difference);
    console.log("Produit: " + n1 + " * " + n2 + " = " + produit);
    console.log("Quotient: " + n1 + " / " + n2 + " = " + quotient);
}
 function ex2() {
    const n = Math.floor(Math.random() * 10) + 1;
    let score = 0;
    let a;

    do {
        a = Number(prompt("Devinez un nombre entre 1 et 10 :"));
        score++;

        if (isNaN(a) || a < 1 || a > 10) {
            alert("Veuillez entrer un nombre valide entre 1 et 10.");
        } else if (a > n) {
            alert("Trop grand !");
        } else if (a < n) {
            alert("Trop petit !");
        }

    } while (a !== n);

    alert("Bravo ! Vous avez trouvé le nombre en " + score + " tentative(s).");
}

    
	function ex3() {
    const questions = [
        ["Quelle est la capitale du Maroc ?", "Rabat"],
        ["Quelle est la capitale de la France ?", "Paris"],
        ["Quelle est la capitale de l'Algérie ?", "Alger"]
    ];
    
    let score = 0;

    for (let i = 0; i < 3; i++) { 
        let reponse = prompt(questions[i][0]);  
        
        if (reponse && reponse.trim().toLowerCase() === questions[i][1].toLowerCase()) {
            alert("Bonne réponse !");
            score++;
        } else {
            alert("Mauvaise réponse. La bonne réponse était : " + questions[i][1]);
        }
    }

    alert("Votre score final est : " + score + " / 3" );
}
