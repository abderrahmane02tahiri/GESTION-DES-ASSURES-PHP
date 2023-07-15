<!DOCTYPE html>
<html>

<head>
    <title>Beautiful Form Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #272727, #77268b);

        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 35px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="number"]:focus {
            border-color: #0066cc;
        }

        .add-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #77268b;
            color: #272727;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .add-button:hover {
            background-color: #4c4c4c;
        }

        .form-header {
            background: linear-gradient(to right, #77268b, #272727);
            color: #ffffff;
            padding: 15px;
            border-radius: 5px 5px 0 0;
        }

        .form-header h2 {
            margin: 0;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['add'])) {

        $datedepot = $_POST['datedepot'];
        $datetraitement = $_POST['datetraitement'];
        $lien_malade = $_POST['lien_malade'];
        $montant_r = $_POST['montant_r'];
        $matricule = $_POST['matricule'];
        $num_maladie = $_POST['num_maladie'];
        $total_dossier = $_POST['total_dossier'];


        $pdo = new PDO("mysql:host=localhost;dbname=ifrane", 'root', '');


        $requete = $pdo->prepare('INSERT INTO dossier VALUES (null,?,?,?,?,?,?,?)');
        $requete->execute([$datedepot, $montant_r, $datetraitement, $lien_malade, $matricule, $num_maladie, $total_dossier]);
    }
    ?>


    <div class="container">
        <div class="form-header">
            <h2>Ajouter un nouveau dossier</h2>
        </div>
        <form method="post">
            <div class="form-group">
                <label for="datedepot">Date Depot</label>
                <input type="date" id="datedepot" name="datedepot">
            </div>
            <div class="form-group">
                <label for="montant_r">Montant R</label>
                <input type="text" id="montant_r" name="montant_r">
            </div>
            <div class="form-group">
                <label for="datetraitement">Date Traitement</label>
                <input type="date" id="datetraitement" name="datetraitement">
            </div>
            <div class="form-group">
                <label for="lien_malade">Lien Malade</label>
                <input type="text" id="lien_malade" name="lien_malade">
            </div>
            <div class="form-group">
                <label for="matricule">Matricule</label>
                <input type="text" id="matricule" name="matricule">
            </div>
            <div class="form-group">
                <label for="num_maladie">Num Maladie</label>
                <input type="text" id="num_maladie" name="num_maladie">
            </div>
            <div class="form-group">
                <label for="total_dossier">Total Dossier</label>
                <input type="text" id="total_dossier" name="total_dossier">
            </div>
            <button class="add-button" value="add" name="add" type="submit">ajouter dossier</button>
        </form>


    </div>
</body>

</html>