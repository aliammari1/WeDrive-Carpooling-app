<?php
   include "C:/xampp/htdocs/xampp/crudtraject/Model/tarjects.php";
   include "C:/xampp/htdocs/xampp/crudtraject/Controller/trajectsC.php";

    $error = "";

    // create user
    $trajects = null;

    // create an instance of the controller
    $trajectC = new trajectsC();
    if (
		isset($_POST["idConducteur"]) &&		
        isset($_POST["lien_depar_arriver"]) &&
		isset($_POST["tarif"]) && 
        isset($_POST["Date_D"]) && 
        isset($_POST["img"] )) 
        {
        if (
			!empty($_POST["idConducteur"]) &&
            !empty($_POST["lien_depar_arriver"]) && 
			!empty($_POST["tarif"]) && 
            !empty($_POST["Date_D"]) && 
            !empty($_POST["img"])
        ) {
            $trajects = new traject(
				$_POST['idConducteur'],
                $_POST['lien_depar_arriver'], 
				$_POST['tarif'],
                $_POST['Date_D'],
                $_POST['img'],
            );
            $trajectC->Modifiertraject($trajects, $_POST["idtraject"]);
           
            header('Location:Affichertraject.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="material-dashbord.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>traject</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
    <body>
        <button><a href="Affichertrajects.php">Retour a la liste des trajects</a></button>
        <hr>
        
        <div id="#">
            <?php ?>
        </div>
        
        <form action="Affichertrajects.php" method="GET">
        <center><h2 class="card-title">modifer un trajects</h1></center>
            <table    class="table table-striped" border="1" align="center">
				<tr>
                    <td>
                        <label for="idConducteur">idConducteur:
                        </label>
                    </td>
                    <td><input type="text" name="idConducteur" id="idConducteur" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lien_depar_arriver">lien_depar_arriver:
                        </label>
                    </td>
                    <td><input type="text" name="lien_depar_arriver" id="lien_depar_arriver" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="tarif">tarif:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="tarif" id="tarif">
                    </td>
                </tr>
                <tr>
                    <td>
                    <label for="Date_D"> Date_De_depart:
                    </label>
                    </td>
                    <td>
                        <input type="date" name="Date_D" id="Date_D">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="img">Image de voiteur:
                        </label>
                    </td>
                    <td>
                        <input type="file" name="img" id="img" >
                    </td>
                </tr>  
                
         
                <tr>
                    <td></td>
                    <td>
                     <br>   <input type="submit" value="Modifier"> 
                        <input type="reset" value="Annuler" >
                    </td>
                    <td>
                       
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
