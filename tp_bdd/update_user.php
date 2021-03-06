<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // fichier de connection BDD 
    include 'path_bdd.php';
    //  function requete SQL 
    include 'tp_function.php';
    ?>
    <!-- menu: -->
    <div>
    <ul id="menu">
        <li><a href="add_user.php" title="aller à la section 1">Ajouter un utilisateur</a></li>
        <li><a href="show_user.php" title="aller à la section 2">Gérer les utilisateurs</a></li>
    </ul>
</div>
    <!-- formulaire pour modification de compte -->
    <form action="" method="post">
        <label for="name">Nom :</label>
            <input type="text" name="name" id="name">
        <label for="firstname">Prénom :</label>
            <input type="text" name="firstname" id="firstname">
        <label for="mail">E-mail :</label>
            <input type="mail" name="mail" id="mail">
        <label for="pass">Mot de passe :</label>
            <input type="password" name="pass" id="pass">
        <input type="submit" value="enregistrer">
    </form>
    <?php
    //test si $_GET['id'] existe
    if(isset($_GET['id']) AND $_GET['id'] !=''){
        //stocke $_GET['id'] dans une variable $value
        $value = $_GET['id'];
        //test des champs
    if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['pass']) 
    && $_POST['name'] != '' && $_POST['firstname'] != '' && $_POST['mail'] != '' && $_POST['pass'] != '')
    {//recuperation des infos
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        //methode de hash du pass (pas tres safe, ne pas trop utiliser)
        $pass = md5($_POST['pass']);
        update_user($bdd, $name, $firstname, $mail, $pass, $value);
        echo "Utilisateur modifié";
        }
        //test si les champs du formulaire ne sont pas remplis
        else{
            echo '<p>Veuillez remplir les champs du  formulaire</p>';
        }
    }
    //test si l'id n'existe pas 
    else{
        header('Location: add_user.php?error');
    }
?>
</body>
</html>