<!DOCTYPE html>
<html lang="fr" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <!-- Lien vers Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color:rgb(235, 239, 239);
}

header {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar {
    background-color:rgb(145, 3, 1); /* Couleur bleu foncé similaire */
}

.navbar-brand, .nav-link {
    font-weight: bold;
}

.nav-link:hover {
    color: #FFD700; /* Couleur dorée pour les liens */
}
.nav-link {
    text-decoration: none; /* Supprime le soulignement par défaut */
    position: relative;
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #FFD700; /* Couleur de la bordure ou du soulignement */
    transition: width 0.3s ease; /* Animation de l'effet */
}

.nav-link:hover::after {
    width: 100%; /* Le soulignement occupe toute la largeur lors du survol */
}

.bg-secondary {
    background-color: #595959; /* Couleur grise similaire au site */
}

.table thead {
    background-color: #003366;
    color: white;
}

.btn-outline-primary {
    border-color: #003366;
    color: #003366;
}

.btn-outline-primary:hover {
    background-color:rgb(11, 108, 205);
    color: white;
}

.btn-outline-danger {
    border-color:rgb(249, 67, 67);
    color:rgb(241, 36, 36);
}

.btn-outline-danger:hover {
    background-color: #cc0000;
    color: white;
}

    </style>
</head>
<body>
    <!-- Barre de navigation -->
    <header class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Agenda du Chambre</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reunions.list') }}">Réunions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organs.list') }}">Organes</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
    <li class="nav-item dropdown">
        <button class="btn btn-sm btn-outline-warning dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->prenom }} {{ Auth::user()->name}}
        </button>
        <ul class="dropdown-menu dropdown-menu-end p-0 border-0 shadow-sm" aria-labelledby="userDropdown" style="min-width: auto;">
            <li>
                <form id="logout-form" action="{{ route('utilisateur.logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="dropdown-item btn btn-sm btn-outline-secondary w-100 text-start">
                        Se déconnecter
                    </button>
                </form>
            </li>
        </ul>
    </li>
</ul>

            </div>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
