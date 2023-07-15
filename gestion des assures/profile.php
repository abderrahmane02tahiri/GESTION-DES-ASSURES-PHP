<!DOCTYPE html>
<html>

<head>
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #272727, #77268b);

            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #ece;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th {
            background: linear-gradient(135deg, #77268b, #272727);
            color: #fff;
            padding: 12px 8px;
            text-align: left;
        }

        td {
            background: linear-gradient(135deg, #77268b, #272727);
            color: #fff;
            padding: 12px 8px;
        }

        tr:hover td {
            background: linear-gradient(135deg, #272727, #77268b);
        }
    </style>
</head>

<body>

    <h2>Profile</h2>
    <?php
    session_start();
    $cle = $_SESSION['assure']['matricule'];
    $pdo = new PDO("mysql:host=localhost;dbname=ifrane", 'root', '');
    $data = $pdo->query("SELECT *from assure where matricule= $cle");
    $assure = $data->fetchAll(PDO::FETCH_ASSOC);
    $entredata = $pdo->query("SELECT *from entreprise INNER JOIN assure on entreprise.num_entreprise = assure.num_entreprise");
    $entreprise = $entredata->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>Matricule</th>
            <th>Nom Assure</th>
            <th>Prenom Assure</th>
            <th>Date Naissance</th>
            <th>Nb Enfant</th>
            <th>Situation Familiale</th>
            <th>Num Entreprise</th>
            <th>Totale Remb</th>
            <th>Date Deces</th>
            <th>Mot de Passe</th>
        </tr>


        <?php
        foreach ($assure as $case) { ?>
            <tr>
                <td>
                    <?php echo $case['matricule'] ?>
                </td>
                <td>
                    <?php echo $case['nom_ass'] ?>
                </td>
                <td>
                    <?php echo $case['prenom_ass'] ?>
                </td>
                <td>
                    <?php echo $case['date_nessance'] ?>
                </td>
                <td>
                    <?php echo $case['nb_enfant'] ?>
                </td>
                <td>
                    <?php echo $case['situation_familiale'] ?>
                </td>
                <td>
                    <?php echo $case['num_entreprise'] ?>
                </td>
                <td>
                    <?php echo $case['totale_remb'] ?>
                </td>
                <td>
                    <?php echo $case['date_deces'] ?>
                </td>
                <td>
                    <?php echo $case['mot_depasse'] ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <br>
    <h2>Entreprise</h2>
    <table>
        <tr>
            <th>numero de lentreprise</th>
            <th>Nom d entreprise</th>
            <th>adresse</th>
            <th>telephone</th>
            <th>nobre d emploies</th>
            <th>email </th>
        </tr>


        <?php
        foreach ($entreprise as $block) { ?>
            <tr>
                <td>
                    <?php echo $block['num_entreprise'] ?>
                </td>
                <td>
                    <?php echo $block['nom_entreprise'] ?>
                </td>
                <td>
                    <?php echo $block['adresse'] ?>
                </td>
                <td>
                    <?php echo $block['telephone'] ?>
                </td>
                <td>
                    <?php echo $block['nbr_emploie'] ?>
                </td>
                <td>
                    <?php echo $block['email'] ?>
                </td>
            </tr>
        <?php } ?>


</body>

</html>