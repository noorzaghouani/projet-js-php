// Exemple : Message de déconnexion ou redirection automatique
window.addEventListener('DOMContentLoaded', () => {
    const msg = document.querySelector('.logout-message');
    if (msg) {
        setTimeout(() => {
            msg.style.display = 'none';
        }, 3000); // Cache le message après 3 secondes
    }
});
