
<?php
        if (
            isset($_POST['nom']) && !empty($_POST['nom']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['message']) && !empty($_POST['message'])
            ) 
            {$nom =$_POST['nom'];
            $email = $_POST['email'];
            $message =$_POST['message'];
             echo "<h2>Message reçu :</h2>";
             echo "<p><b>Nom :</b> $nom</p>";
             echo "<p><b>Email :</b> $email</p>";
             echo "<p><b>Message :</b> $message</p>";
            } 
	    else {echo "<p style='color:red;'>Veuillez remplir tous les champs.</p>";}
    ?>