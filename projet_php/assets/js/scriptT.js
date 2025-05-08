// Confirmation de suppression
function confirmerSuppression() {
    return confirm("Êtes-vous sûr(e) de vouloir supprimer cette transaction ?");
}

// Ajout d’un petit effet de fade sur la notification (si tu veux l’utiliser dans listeT.php)
document.addEventListener("DOMContentLoaded", function () {
    const notif = document.querySelector(".notification");
    if (notif) {
        setTimeout(() => {
            notif.style.opacity = "0";
            setTimeout(() => {
                notif.remove();
            }, 1000);
        }, 3000);
    }
});
