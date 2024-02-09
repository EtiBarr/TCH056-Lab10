<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Messages du Forum</h2>
    <div id="messages"></div>
    <form id="nouveauMessageForm">
        <div class="form-group">
            <label for="messageTexte">Votre Message</label>
            <textarea class="form-control" id="messageTexte" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <button onclick="deconnexion()" class="btn btn-danger">Déconnexion</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Charger les messages
function chargerMessages() {
    axios.get('/chemin/vers/api.php?action=lireMessages')
        .then(function (response) {
            const messages = response.data;
            let html = '';
            messages.forEach(message => {
                html += `<div class="message"><p>${message.texte}</p><button onclick="supprimerMessage(${message.id})">Supprimer</button></div>`;
            });
            document.getElementById('messages').innerHTML = html;
        })
        .catch(function (error) {
            console.log(error);
        });
}

  // Envoyer un nouveau message
document.getElementById('nouveauMessageForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const texte = document.getElementById('messageTexte').value;
    axios.post('/chemin/vers/api.php?action=creerMessage', {
        texte: texte
    })
    .then(function (response) {
        chargerMessages(); // Recharger les messages après l'ajout
    })
    .catch(function (error) {
        console.log(error);
    });
});

// Supprimer un message
function supprimerMessage(id) {
    axios.post('/chemin/vers/api.php?action=supprimerMessage', {
        id: id
    })
    .then(function (response) {
        chargerMessages(); // Recharger les messages après la suppression
    })
    .catch(function (error) {
        console.log(error);
    });
}


function deconnexion() {
    // il me manque la fonction deconexion ici 


}
// Charger les messages 
chargerMessages();
</script>
</body>
</html>
