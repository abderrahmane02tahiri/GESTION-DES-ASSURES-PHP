<!DOCTYPE html>
<html>

<head>
    <title>Folder Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #6a11cb, #2575fc);
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100vh;
            width: 100vw;
            padding: 0;

            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            height: 100vh;
        }

        .table-container {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-in-out;
            margin-bottom: 30px;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table-container h1,
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #fff;
        }

        th {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .submit-button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            background-color: #fff;
            color: #6a11cb;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .submit-button:hover {
            background-color: #d7d7d7;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $numdossier = $_SESSION['dossier']['numdossier'];
    $pdo = new PDO("mysql:host=localhost;dbname=ifrane", 'root', '');
    $data = $pdo->query("SELECT *from dossier where numdossier= $numdossier");
    $dossier = $data->fetchAll(PDO::FETCH_ASSOC);
    $entredata = $pdo->query("SELECT *from entreprise INNER JOIN assure on entreprise.num_entreprise = assure.num_entreprise");
    $entreprise = $entredata->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div class="table-container">
            <h1>Folder Information</h1>
            <table>
                <thead>
                    <tr>
                        <th>numero de dossier</th>
                        <th>date de depot</th>
                        <th>montant_r</th>
                        <th>datetraitement</th>
                        <th>lien_malade</th>
                        <th>matricule</th>
                        <th>num_maladie</th>
                        <th>total_dossier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dossier as $case) { ?>
                        <tr>
                            <td>
                                <?php echo $case['numdossier'] ?>
                            </td>
                            <td>
                                <?php echo $case['datedepot'] ?>
                            </td>
                            <td>
                                <?php echo $case['montant_r'] ?>
                            </td>
                            <td>
                                <?php echo $case['datetraitement'] ?>
                            </td>
                            <td>
                                <?php echo $case['lien_malade'] ?>
                            </td>
                            <td>
                                <?php echo $case['matricule'] ?>
                            </td>
                            <td>
                                <?php echo $case['num_maladie'] ?>
                            </td>
                            <td>
                                <?php echo $case['total_dossier'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="form-container">
            <h1>Update Folder Information</h1>
            <form method="post">
                <div class="form-group">
                    <label for="date-depot">datedepot:</label>
                    <input type="date" id="date-depot" name="datedepot">
                </div>
                <div class="form-group">
                    <label for="montant-r">montant_r:</label>
                    <input type="text" id="montant-r" name="montant_r">
                </div>
                <div class="form-group">
                    <label for="date-traitement">datetraitement:</label>
                    <input type="date" id="date-traitement" name="datetraitement">
                </div>
                <div class="form-group">
                    <label for="lien-malade">lien_malade:</label>
                    <input type="text" id="lien-malade" name="lien_malade">
                </div>
                <div class="form-group">
                    <label for="matricule">matricule:</label>
                    <input type="text" id="matricule" name="matricule">
                </div>
                <div class="form-group">
                    <label for="num-maladie">num_maladie:</label>
                    <input type="text" id="num-maladie" name="num_maladie">
                </div>
                <div class="form-group">
                    <label for="total-dossier">total_dossier:</label>
                    <input type="text" id="total-dossier" name="total_dossier">
                </div>
                <button class="submit-button" name="update" type="submit">Update</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['update'])) {
        $numdossier = $_SESSION['dossier']['numdossier'];
        $datedepot = $_POST['datedepot'];
        $datetraitement = $_POST['datetraitement'];
        $lien_malade = $_POST['lien_malade'];
        $montant_r = $_POST['montant_r'];
        $matricule = $_POST['matricule'];
        $num_maladie = $_POST['num_maladie'];
        $total_dossier = $_POST['total_dossier'];
        $pdo = new PDO("mysql:host=localhost;dbname=ifrane", 'root', '');
        $requete = $pdo->prepare('UPDATE  dossier SET datedepot=? , montant_r=? ,datetraitement= ? , lien_malade=?, matricule=?, num_maladie= ? , total_dossier=?  WHERE dossier.numdossier = ?');
        $requete->execute([$datedepot, $montant_r, $datetraitement, $lien_malade, $matricule, $num_maladie, $total_dossier, $numdossier]);
        if ($requete->rowCount() > 0) {
            echo "upadate reeusiii";
        } else {
            echo "<script>alert('ereude mise a jour n\'est pas valide');</script>";
        }
    }
    ?>

</body>

</html>