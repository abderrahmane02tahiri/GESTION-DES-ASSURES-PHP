<!DOCTYPE html>
<html>

<head>
    <title>Purple Gradient Page</title>
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
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
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

        .form-group select {
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
    <div class="container">
        <div class="form-container">
            <h2>Entrez les information du dossier a modifié</h2>
            <form method="post">
                <div class="form-group">
                    <label for="param1">Numero de doosier:</label>
                    <input type="text" id="param1" name="numdossier">
                </div>
                <div class="form-group">
                    <label for="param2">matricule:</label>
                    <input type="text" id="param2" name="matricule">
                </div>
                <button class="submit-button" name="select" type="submit">chercher</button>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['select'])) {
        $matricule = $_POST['matricule'];
        $numdossier = $_POST['numdossier'];

        $pdo = new PDO("mysql:host=localhost;dbname=ifrane", 'root', '');
        $requete = $pdo->prepare("SELECT *from dossier where matricule=? and numdossier=?");
        $requete->execute([$matricule, $numdossier]);
        if ($requete->rowCount() > 0) {
            session_start();
            $_SESSION['dossier'] = $requete->fetch();
            header("location: dossier.php");
        } else {
            echo "<script>alert('info est incorecte n\'est pas valide');</script>";
        }
    }
    ?>
</body>

</html>