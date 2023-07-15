<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="dropdown">
            <div id="dropdown-btn">
                <span class="dropdown-name">menu</span>
            </div>
            <div class="dropdown-menu-box">
                <ul class="dropdown-menu">
                    <a href="auth.php">
                        <li class="dropdown-item">authentification</li>
                    </a>
                    <a href="ajouterdossier.php">
                        <li class="dropdown-item">ajouter un dossier</li>
                    </a>
                    <a href="miseajour_dossier.php">
                        <li class="dropdown-item">misé a jour un dossier </li>
                    </a>
                    <a href="profile.php">
                        <li class="dropdown-item">your profile</li>
                    </a>



                </ul>
            </div>
        </div>
    </div>

    <!-- js code -->
    <script>
        let dropdown = document.querySelector('.dropdown');
        let dropdownBtn = document.getElementById('dropdown-btn');

        dropdownBtn.addEventListener('click', () => {
            dropdown.classList.toggle('dropdown-active');
        });
    </script>
</body>

</html>