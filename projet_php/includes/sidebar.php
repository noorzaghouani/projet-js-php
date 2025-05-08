<aside class="sidebar p-3">
    <h2 class="text-white">🏠 ImmoDash</h2>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link text-white" href="../dashboard.php">🏠 Accueil</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="../proprietes/listeP.php">🏢 Propriétés</a></li>

        <?php if ($_SESSION['role'] === 'admin'): ?>
            <li class="nav-item"><a class="nav-link text-white" href="../clients/listeC.php">👥 Clients</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="../transactions/listeT.php">💸 Transactions</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="../Demandes/demandes_admin.php">📥 Les demandes</a></li>


        <?php endif; ?>

        <?php if ($_SESSION['role'] === 'client'): ?>
            <li class="nav-item"><a class="nav-link text-white" href="../transactions/TransationC.php">💸 Transactions</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="../Demandes/mes_demandesC.php">⏳ Mes demandes</a></li>

            <?php endif; ?>

        <li class="nav-item"><a class="nav-link text-danger" href="../logout.php">🚪 Déconnexion</a></li>
        </ul>
</aside>
