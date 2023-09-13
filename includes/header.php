<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script defer src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <title> Hospital Management System: <?php echo isset($pageTitle) ? $pageTitle : 'Homepage'; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info d-flex justify-content-between align-middle px-4">
        <h5 class="text-white">Hospital Management System</h5>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="adminlogin.php" class="nav-link text-white">Admin</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">Doctor</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">Patient</a>
            </li>
        </ul>
    </nav>
        