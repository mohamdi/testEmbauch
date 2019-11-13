<html>
<head>
    <!-- l'imporation des fichiers css et js du bootstrap et le js du jquery -->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />
    <script src="bootstrap-4.3.1-dist/js/jquery.min.js"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <title>
        Gestion des consultations
    </title>
</head>
<body>
<!-- Le block contenant le formulaire -->
<div id="container" class="container" style="padding: 30px; position: fixed; width:100%">
<!-- Le formulaire de saisi -->
<form method="POST" action="post.php" enctype="multipart/form-data">
    <!-- Le block contenant les champs de saisi de l'etat civil -->
    <div id="etatCivil" style="border-width: 1px; border-color:black; border-style: solid; border-radius: 5%; width:50%; float:left; padding: 10px;">
            <div class="form-group form-row">
                <label for="Nom" class="col-sm-5 col-form-label">Nom</label>
                <!-- le Nom de la personne -->
                <div class="col-sm-6">
                    <input name="nom" type="text" id="Nom" class="form-control" style="width:100%" required/>
                </div>
            </div>
            <div class="form-group form-row">
                <label for="Prenom" class="col-sm-5 col-form-label">Prenom</label>
                <!-- Le prenom de la personne -->
                <div class="col-sm-6">
                    <input name="prenom" type="text" id="Prenom" class="form-control" style="width:100%" required/>
                </div>
            </div>
            <div class="form-group form-row">
                <label for="Date de naissance" class="col-sm-5 col-form-label">Date de naissance</label>
                <!-- La date de naissance de la personne -->
                <div class="col-sm-6">
                    <input name="dateNaiss" type="date" class="form-control" required/>
                </div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-6 col-form-label"></label>
                <div class="col-sm-5">
                    <!-- le genre de la personne -->
                    <select name="sex" class="custom-select" required>
                        <option value="femme">Femme</option>
                        <option value="homme">Homme</option>
                    </select>
                </div>
            </div>
    </div>
    <!-- Le block contenant l'image a selectionner pour la personne ou l'etat civil -->
    <div id="imageContainer" style="width: 200px; height: 200px; float:left; padding-left: 10px;">
        <label for="file-input" width="100%">
            <img name="image" alt="image" width="200px" height="200px" src="images/imagePlaceHolder.png"/>
        </label>
        <input name="image" style="display: none;" id="file-input" type="file" />        
    </div>
    <!-- Le block contenant les champs de saisi de la consultation de l'etat civil -->
    <div id="consultation" class="container" style="border-width:1px; border-color: black; border-style: solid; border-radius: 5%; width: 65%; padding: 10px; float:left; margin-top: 40px;">
        <span class="btn btn-primary" style="margin-top:-25px">Consultation</span>
            <div class="form-group form-row">
                <label for="GroupeSanguin" class="col-sm-5 col-form-label">Groupe Sanguin</label>
                <div class="col-sm-3">
                    <!-- Liste des groupes sanguins -->
                    <select required name="sang" class="custom-select" required>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
            </div>
            <div class="form-group form-row">
                <label for="Poids" class="col-sm-5 col-form-label">Poids</label>
                <!-- le poids en Kg -->
                <div class="col-sm-3">
                    <input required name="poids" type="text" id="Poids" class="form-control"/>
                </div>
                <label for="Poids" class="col-sm-4 col-form-label">Kg</label>
            </div>   
            <div class="form-group form-row">
                <label for="Taille" class="col-sm-5 col-form-label">Taille</label>
                <!-- La taille en cm -->
                <div class="col-sm-3">
                    <input required name="taille" type="text" id="Taille" class="form-control"/>
                </div>
                <label for="Taille" class="col-sm-4 col-form-label">cm</label>
            </div>   
            <div class="form-group form-row">
                <label for="Observations" class="col-sm-5 col-form-label">Observations</label>
                <!-- Les observations -->
                <div class="col-sm-4">
                    <textarea required name="observations" id="Observations" class="form-control"></textarea>
                </div>
            </div>
           
    </div>
    <div style="width: 65%; float: left; padding-top: 10px;">
        <!-- Le bouttant de la submission du formulair -->
        <input required type="submit" name="submit" class="btn btn-primary" value="Submit" style="float: right;"/>            
    </div>    
    </form>
</div>

</body>
</html>