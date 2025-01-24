function showSectionDashboard(sectionId) {
    document.querySelectorAll('.dashboard-section').forEach(section => {
        section.style.display = 'none';
    });


    document.getElementById(sectionId).style.display = 'block';
}


function showSectionRules(sectionId) {
    document.querySelectorAll('.rules-section').forEach(section => {
        section.style.display = 'none';
    });

    document.getElementById(sectionId).style.display = 'block';
}

window.onload = function () {
    const hash = window.location.hash.substring(1);
    if (hash) {
        showSection(hash);
    } else {
        showSection('users');
    }
};