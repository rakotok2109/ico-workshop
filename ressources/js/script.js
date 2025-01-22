function showSection(sectionId) {
    // Cacher toutes les sections
    document.querySelectorAll('.dashboard-section').forEach(section => {
        section.style.display = 'none';
    });

    // Afficher la section demandée
    document.getElementById(sectionId).style.display = 'block';
}

// Vérifie l'URL pour afficher la section correcte au chargement de la page
window.onload = function () {
    const hash = window.location.hash.substring(1);
    if (hash) {
        showSection(hash);
    } else {
        showSection('users');  // Section par défaut
    }
};