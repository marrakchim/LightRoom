<? session_start(); ?>
    <!DOCTYPE html>

    <html>

    <head>
        <link rel="stylesheet" href="css/admin.css">

         <script type="text/javascript" src ="js/inscription.js"></script>
    
        <meta charset='utf-8'>

    </head>

    <body>

        <? include('menu.php'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Photo</th>
                        </br>
                        <th>id</th>
                        </br>
                        <th>Prénom</th>
                        </br>
                        <th>Nom</th>
                        </br>
                        <th>Naissance</th>
                        <th>Email</th>
                        <th>Pseudo</th>
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                </thead>


                <tbody class="users">

                    <? include('connectbdd.php');
    $sql = 'SELECT * FROM user';
    $req=$bdd->prepare($sql);
    $req ->execute();
    
    
while($u= $req->fetch())
{?>
                        <tr>


                            <td><img src="<?php echo $u['im_srcp']; ?>" id="image_arrondi"> </td>
                            <td>
                                <?php echo $u['id']; ?>
                            </td>
                            <td>
                                <?php echo $u['prenom']; ?>
                            </td>
                            <td>
                                <?php echo $u['nom']; ?>
                            </td>
                            <td>
                                <?php echo $u['naissance']; ?>
                            </td>
                            <td>
                                <?php echo $u['mail']; ?>
                            </td>
                            <td>
                                <?php echo $u['pseudo']; ?>
                            </td>
                            <td>
                                <?php echo $u['us_admin']; ?>
                            </td>
                            <td>

                                <?  if($u['us_admin'] == 0){ ?>
                                    <a href="<?php echo 'deleteUser.php?id='.$u['id'];?>" class="delete"><img id="corbeille" src="css/corbeille.png"></a>
                                    <?}?>

                            </td>
                        </tr>
                        <? }?>




                </tbody>
            </table>


            <!-- ajouter un bouton modal pour ajouter un nouvel utilisateur -->
            <script src="js/deleteUser.js">
            </script>

            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>

            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <script src="js/inscriptionAdmin.js">
            </script>


<!--
            <div id="dialog-form" title="Ajout d'un nouvel utilisateur">

                <form id="inscription" action="inscriptionbdd.php" method="post" onSubmit="return formValidation();">


                    <div>
                        <input id="nom" type="text" name="nom" placeholder="Nom">
                    </div>
                    </br>
                    <div id="errornom"> </div>
                    </br>
                    <div>
                        <input id="prenom" type="text" name="prenom" placeholder="Prénom">
                    </div>
                    </br>
                    <div id="errorprenom"> </div>
                    </br>

                    <div>
                        <input id="date" type="date" name="date" title="Date (jj-mm-aaaa)" placeholder="Naissance (jj/mm/aaaa)"> </div>
                    </br>
                    <div id="errordate"> </div>
                    </br>

                    <div>
                        <input id="email" type="email" name="email" autocomplete="off" placeholder="Adresse e-mail"> </div>
                    <br>
                    <div id="errormail"> </div>
                    </br>

                    <div>
                        <input type="text" name="pseudo" autocomplete="off" onkeyup="errorPseudo()" placeholder="Login" id="pseudo"> </div>
                    </br>

                    <div id="errorpseudo">
                        <?php if(isset($_GET['error'] )) {
			if($_GET['error'] == 1){?>
                            <p style="color:red;">Pseudo déjà pris </p>
                            <? }}?>
                    </div>
                    </br>
                    <div>
                        <input type="password" id="password1" autocomplete="off" name="password1" placeholder="password"> </div>
                    </br>
                    <div id="errormdp"> </div>
                    </br>
                    <div>
                        <input type="password" id="password2" name="password2" placeholder="password"> </div>

                    <div id="errordiv"> </div>
                    </br>

                </form>
            </div>

-->
            <button id="create-user" ><a href="inscription.php?id=<? echo $_SESSION['id']; ?>">Nouvel utilisateur</a></button>

            <!--id="create-user" -->

    </body>

    </html>