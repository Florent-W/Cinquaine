<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Site web service</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/nav.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!"><img class="brand" src="assets/css/Service.jpg" alt="logo"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"><i class="bi bi-house-fill me-2"></i>Accueil</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"><i class="bi bi-headset me-2"></i>Contact</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"><i class="bi bi-tools me-2"></i>Aide</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Service</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Tous nos services</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Service populaire</a></li>
                        <li><a class="dropdown-item" href="#!">Nouveau service</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item me-1"><a class="nav-link active" aria-current="page" href="#!"><i class="bi bi-plus-circle"style="margin-right:0.5rem"></i>Proposer un Service</a></li>
                <li class="nav-item me-1"><a class="nav-link active" aria-current="page" href="index.php?controller=controllerHome&action=displayProfile"><i class="bi bi-person-circle"style="margin-right:0.5rem"></i>Compte</a></li>
            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>Panier<span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>