<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #272727, #77268b);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .submit-button {
            width: 100%;
            background: linear-gradient(135deg, #4c4c4c, #77268b);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background: linear-gradient(135deg, #77268b, #272727);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .submit-button:active {
            animation: pulse 0.3s;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Matricule:</label>
                <input type="text" id="username" name="matricule" placeholder="Entrer votre matricule" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button class="submit-button" type="conexion" name="conexion">Submit</button>
        </form>
    </div>

    <?php
    if (isset($_POST['conexion'])) {
        $matricule = $_POST['matricule'];
        $mot_depasse = $_POST['password'];

        $pdo = new PDO("mysql:host=localhost;dbname=ifrane", 'root', '');
        $requete = $pdo->prepare("SELECT *from assure where matricule=? and mot_depasse=?");
        $requete->execute([$matricule, $mot_depasse]);
        if ($requete->rowCount() > 0) {
            session_start();
            $_SESSION['assure'] = $requete->fetch();
            header("location: profile.php");
        } else {
            echo "<script>alert('Mot de depasse n\'est pas valide');</script>";
        }
    }


    ?>
</body>

</html>