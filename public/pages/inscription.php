<link href="path/to/select2.min.css" rel="stylesheet" />
<script src="path/to/select2.min.js"></script>

<?php
session_start();

if (isset($_SESSION['id'])) {
    include('../traitement/traite_inscription.php')
?>

    <?php require_once('../inc/sidebare.php'); ?>

    <div class='main-content'>
        <p class='logo'>
            <img src="../../image/Background_1_-removebg-preview.png" alt="logo">

        </p>


        <div class='register'>
            <div class="header">

            </div>


            <style>
                .select-block {
                    width: 100px;
                    margin: 50px auto 30px;
                    position: relative;
                }

                select {
                    width: 100%;
                    height: 35px;
                    font-size: 100%;
                    font-weight: bold;
                    cursor: pointer;
                    border-radius: 0;

                    border: none;
                    border: 2px solid #D3D3D3;
                    border-radius: 4px;


                }


                .selectIcon {
                    top: 7px;
                    right: 15px;
                    width: 30px;
                    height: 36px;
                    padding-left: 5px;
                    pointer-events: none;
                    position: absolute;
                    transition: background-color 0.3s ease, border-color 0.3s ease;
                }

                .selectIcon svg.icon {
                    transition: fill 0.3s ease;
                    fill: white;
                }

                select:hover,
                select:focus {
                    color: #000000;
                    background-color: white;
                }

                select:hover~.selectIcon,
                select:focus~.selectIcon {
                    background-color: white;
                }

                select:hover~.selectIcon svg.icon,
                select:focus~.selectIcon svg.icon {
                    fill: #1A33FF;
                }
            </style>
            <form action="" method="POST" enctype="multipart/form-data">


                <div class="page" id="page1">

                    <div class="form1">

                        <h6>Identification du pélérin</h6>
                        <div class="form-group row">

                            <div class='form-group col-md-6'>
                                <small style="color:red;"><?= $nom_err ?></small>
                                <input type="text" placeholder="Nom" class="form-control" name="nom">
                                <small style="color:red;"><?= $prenom_err ?></small>
                                <input type="text" placeholder="Prenom" class="form-control" name="prenom">
                                <small style="color:red;"><?= $date_err ?></small>
                                <input type="date" placeholder="Date de naissance" class="form-control" name="date_naissance">
                                <small style="color:red;"><?= $passposrt_err ?></small>
                                <input type="text" placeholder="Passeport" class="form-control" name="passport">
                            </div>


                            <div class='form-group col-md-6'>
                                <small style="color:red;"><?= $profession_err ?></small>
                                <input type="text" placeholder="Profession" class="form-control" name="profession">
                                <small style="color:red;"><?= $niveau_err ?></small>
                                <input type="text" placeholder="Niveau d'étude " class="form-control" name="niveau_etude">
                                <small style="color:red;"><?= $contact_err ?></small>
                                <input type="number" placeholder="Contact" class="form-control" name="contact">
                                <small style="color:red;"><?= $email_err ?></small>
                                <input type="email" placeholder="Email" class="form-control" name="email">
                            </div>

                        </div>

                        <div class="form-group">
                            <small style="color:red;"><?= $langue_parler_err ?></small>
                            <input type="text" placeholder="Langues Parlées" class="form-control" name="langue_parler">
                            <!-- <input type="text" placeholder="Affinité" class="form-control" name="affinite_langue"> -->
                        </div>
                        <h6>Adresse géographique:</h6>
                        <div class="form-group row">

                            <div class="form-group col-md-6">

                                <small style="color:red;"><?= $ville_err ?></small>
                                <input type="text" placeholder="ville" class="form-control" name="ville">
                                <input type="text" placeholder="commune" class="form-control" name="commune">
                                <small style="color:red;"><?= $quatier_err ?></small>
                                <input type="text" placeholder="Quartier" class="form-control" name="quartier">
                                <input type="text" placeholder="Rue" class="form-control" name="rue_geo">
                                <input type="number" placeholder="Porte" class="form-control" name="porte_geo">
                            </div>
                            <div class="form-group col-md-6">

                                <input type="number" placeholder="Nombre de participation" class="form-control" name="nbr_participation">
                                <small style="color:red;"><?= $situa_matri_err ?></small>
                                <select name="situation_matri" id="situation_matri">
                                    <option value="" disabled selected>Situation Matrimoniale</option>
                                    <option value="Celibataire">Celibataire</option>
                                    <option value="Marié">Marié(e)</option>
                                    <option value="Veuf">Veuf(ve)</option>
                                    <option value="Divorcé">Divorcé(e)</option>

                                </select>

                                <br></br>

                                <input type="text" placeholder="Nom et prenoms du conjoint" class="form-control" name="nom_conjoint">
                                <input type="number" placeholder="Contact du conjoint" class="form-control" name="conjoint_cont">
                                <small style="color:red;"><?= $nbr_enfant_err ?></small>
                                <input type="number" placeholder="nombre d'enfant" class="form-control" name="nbr_enfant">

                            </div>

                        </div>
                        <div class="">
                            <small style="color:red;"><?= $origine_err ?></small>
                            <input type="text" placeholder="Origine" class="form-control" name="origine">
                        </div>
                    </div>

                    <button class="next" type="button">Suivant</button>

                </div>
                <div class="page" id="page2">
                    <h6 style="padding-left: 38px;">Personne à contacter en cas d'urgence</h6>
                    <div class="form2 ">
                        <div class='form-group '>
                            <small style="color:red;"><?= $nom_per_urgence_err ?></small>
                            <input type="text" placeholder="Nom" class="form-control" name="nom_per_urgence">
                            <small style="color:red;"><?= $prenom_per_urgence_err ?></small>
                            <input type="text" placeholder="Prenom" class="form-control" name="prenom_per_urgence">
                            <input type="text" placeholder="Langues parlées" class="form-control" name="langue_per_urgence">
                            <small style="color:red;"><?= $contact_per_urgence_err ?></small>
                            <input type="number" placeholder="Contact" class="form-control" name="contact_per_urgence">
                        </div>
                        <div class="form-group">
                            <small style="color:red;"><?= $contact_per_urgence_err ?></small>
                            <input type="text" placeholder="ville" class="form-control" name="ville_urgence">
                            <input type="text" placeholder="commune" class="form-control" name="commune_urgence">
                            <input type="text" placeholder="Lien de parenté" class="form-control" name="afinite_resto">

                            <div class="row" style="padding:0px 12px">
                                <input type="text" placeholder="Quartier" class="form-control col-md-4" name="quartier_urgence">
                                <input type="text" placeholder="Rue" class="form-control col-md-4" name="rue_urgence">
                                <input type="number" placeholder="Porte" class="form-control col-md-4" name="porte_urgence">
                            </div>
                        </div>
                    </div>

                    <button class="prev" type="button">Précédent</button>
                    <button class="next" type="button">Suivant</button>

                </div>

                <div class="page" id="page3">
                    <h6 style="padding-left: 38px;">Informations Medicales</h6>
                    <div class="form3 row">
                        <div class="group-form col-md-6">
                            <input type="text" placeholder="Certificat d'aptitude medicale " class="form-control" name="certificat_AM_numero">
                            <input type="text" placeholder="Centre de delivrance" class="form-control" name="centre_delivr">
                            <input type="text" placeholder="Nom du medecin delivreur" class="form-control" name='medecin'>
                            <input type="text" placeholder="Traitements suivis" class="form-control" name='traitement_suivi'>


                        </div>


                        <div class="form-group col-md-6">

                            <select name="grp_sangin" id="grp_sangin">
                                <option value="" disabled selected>Choississez votre groupe sanguin</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>

                            <input type="text" placeholder="Maladie a Signaler" class="form-control" name="mal_signale">
                            <input type="text" placeholder="Autre Information" class="form-control" name="autre_info">
                            <label for="">Cas de vulnérabilité</label><br>
                            <INPUT type="radio" name="cas_vulnerabilite" VALUE="cas_vulnerabilite"> OUI <BR>
                            <INPUT type="radio" name="cas_vulnerabilite" VALUE="cas_vulnerabilite">NON


                        </div>
                    </div>
                    <button class="prev" type="button">Précédent</button>
                    <button class="next" type="button">Suivant</button>
                </div>

                <div class="page" id="page4">
                    <h6 style="padding-left: 38px;">Informations restaurations et hebergement</h6>
                    <div class="form4">
                        <input type="text" placeholder="Alergie" class="form-control" name="alergie">
                        <input type="text" placeholder="Plats preferer" class="form-control" name="plat">
                        <input type="number" placeholder="nombre de plats par jour" class="form-control" name="nbr_plat">

                        <select name="clim" id="clim">
                            <option value="" disabled selected>Tolérance à la climatisation</option>
                            <option value="Pas du tout">Pas du tout</option>
                            <option value="Bien">Bien</option>
                            <option value="Moins">Moins bien</option>

                        </select>

                    </div>
                    <button class="prev" type="button">Précédent</button>

                    <button class="next" type="button">Suivant</button>


                </div>

                <div class="page" id="page5">
                    <h6 style="padding-left: 38px;">Documents et pièces à fournir</h6>
                    <div class="form4">
                        <label for="photo"> 1-Photo du pèlerin</label>
                        <input type="file" id="file" name="photo" value="upload" class="form-control" accept="image/*,.pdf">

                        <label for="image"> 2-Certificat médical d'aptitude du Hadj</label>
                        <input type="file" id="file" name="image[]" value="upload" class="form-control" accept="image/*,.pdf" multiple />


                        <label for="paiement"> 3-Reçu de paiement du prix du Hadj</label>

                        <input type="file" id="file" name="paiement[]" value="upload" class="form-control" accept="image/*,.pdf" multiple />

                        <label for="recu"> 4-Reçu de règlement des frais complémentaires</label>


                        <input type="file" id="file" name="recu[]" value="upload" class="form-control" accept="image/*,.pdf">

                        <label for="passeport"> 5-Passeport</label>
                        <input type="file" id="file" name="passeport[]" value="upload" class="form-control" accept="image/*,.pdf" multiple />

                        <label for="CNI"> 6-Carte d'identité</label>

                        <input type="file" id="file" name="CNI[]" value="upload" class="form-control" accept="image/*,.pdf" multiple />

                        <label for="vaccination"> 7-Photo carnet de vaccination</label>
                        <input type="file" id="file" name="vaccination[]" value="upload" class="form-control" accept="image/*,.pdf" multiple />

                        <label for="carnet"> 8-Photo carnet de santé</label>
                        <input type="file" id="file" name="carnet[]" value="upload" class="form-control" accept="image/*,.pdf" multiple />

                        <label for="contrat"> 9-Photo du contrat</label>
                        <input type="file" id="file" name="contrat[]" value="upload" class="form-control" accept="image/*,.pdf" multiple />


                    </div>

                    <button class="prev" type="button">Précédent</button>

                    <input type="submit" class="terminer next" name="submit" value="Enregistrer">
                </div>


            </form>

        </div>
    </div>


    <script>

    </script>

    <script>
        function formusubmit() {

        }
    </script>
    <?php require_once('../inc/footer.php'); ?>

<?php
} else {
    header('location:../../index.php');
}

?>