//Fonction d'ajout d'un horloge (Date et heure sur la page)
function afficherDateHeure() {
    maintenant = new Date();
    const options = { day:'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
    const dateHeure = maintenant.toLocaleDateString('fr-FR', options);
    document.getElementById('date-heure').textContent = dateHeure;
}

setInterval(afficherDateHeure, 1000); 
 afficherDateHeure();