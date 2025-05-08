// Fonction de confirmation avant suppression
function confirmerSuppression() {
    return confirm("Es-tu sûr de vouloir supprimer cette propriété ?");
}

// Affichage d'une alerte Bootstrap en fonction des paramètres de l'URL
window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    const container = document.querySelector('.container');

    if (params.get('deleted')) {
        afficherAlerte("✅ Propriété supprimée avec succès !", "danger", container);
    } else if (params.get('success')) {
        afficherAlerte("✅ Propriété ajoutée avec succès !", "success", container);
    } else if (params.get('updated')) {
        afficherAlerte("✅ Propriété modifiée avec succès !", "info", container);
    }
});

// Fonction utilitaire pour créer une alerte Bootstrap
function afficherAlerte(message, type, container) {
    const alert = document.createElement("div");
    alert.className = `alert alert-${type} alert-dismissible fade show mt-3`;
    alert.role = "alert";
    alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    container.prepend(alert); // Ajoute l'alerte en haut de la page
}

function ouvrirFormulaire() {
    document.getElementById('formulaireAjout').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function fermerFormulaire() {
    document.getElementById('formulaireAjout').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
