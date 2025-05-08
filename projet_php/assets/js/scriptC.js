// Confirmation avant suppression d’un client
function confirmerSuppression() {
    return confirm("Es-tu sûr de vouloir supprimer ce client ?");
}

// Gestion des alertes dynamiques selon les paramètres URL
window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const container = document.querySelector('.container');

    if (params.get('deleted')) {
        afficherAlerte("✅ Client supprimé avec succès !", "danger", container);
    } else if (params.get('success')) {
        afficherAlerte("✅ Client ajouté avec succès !", "success", container);
    } else if (params.get('updated')) {
        afficherAlerte("✅ Client modifié avec succès !", "info", container);
    }
});

// Fonction pour afficher une alerte Bootstrap
function afficherAlerte(message, type, container) {
    const alert = document.createElement("div");
    alert.className = `alert alert-${type} alert-dismissible fade show mt-3`;
    alert.role = "alert";
    alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
    `;
    container.prepend(alert); // Affiche l'alerte en haut du contenu
}

function ouvrirFormulaire() {
    document.getElementById('formulaireAjout').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function fermerFormulaire() {
    document.getElementById('formulaireAjout').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
