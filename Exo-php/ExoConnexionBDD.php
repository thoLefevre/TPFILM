<?php 

    //try = essaye / catch = si erreur
    try{
        //PDO attend 3 parametre : IP , Login , PASS
            //mysql:host = ip ou localhost    /    dbname = nom de la base de donnée    /    login , pass
        $BDD = new PDO('mysql:host = 192.168.65.226; dbname=cabinet; charset=utf8','userWeb', 'YES');
        echo "Connexion OK <br>";


        //SELECT * FROM = select TOUS de NOM DE LA COLONE
            //rowCount = retourne le nombre des lignes
        $DonneeColone = $BDD->query("SELECT * FROM `Patient`");
        echo "Requête :".$DonneeColone->rowCount()." id  <br> <br>";


    //------------------------------------------------------EXO 2-----------------------------------------------------//


        $marequete = $BDD->query('SELECT * FROM Medicament');

        
        function afficher_requet_select($marequete)
        {
            while($TabCreat2 = $marequete->fetch())
            { 
                echo $TabCreat2["codeSS"]." ".$TabCreat2["nomCommercial"]." ".$TabCreat2["prix"]."€"."<br>";
            }

            VerifTabCreat2();

        }


        function VerifTabCreat2()
        {
            if ($TabCreat2["numSS"] = false) 
            {
                echo "<div style='color: red;'> pas de résultat </div>";
            }
        }

    //----------------------------------------------------------------------------------------------------------------//


        //Ici on crée un while afin de pouvoir metre sous tableau les donnée
            //fetch = mettre les donnée sous forme de tableau
        while($TabCreat1 = $DonneeColone->fetch())
        { 
            echo $TabCreat1["numSS"]." ".$TabCreat1["nom"]." ".$TabCreat1["prenom"]."<br>";
        };

        echo "<br> <br>"; 

        afficher_requet_select($marequete);
        
        echo "<br> <br>"; 


    }catch(Exception $MessageErreur)
    {
        //Cette partie nous permet de dire quoi faire si erreur
            //Message Erreur = Variable qui donne l'erreur
            //getMessage = retourne l'erreur
        echo "Connexion erreur :".$MessageErreur->getMessage();
        
    }
?>