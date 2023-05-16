<script>
  let indexClicked;

  function handleClick(event) {
    // Récupérer l'index de l'élément cliqué à partir de son attribut data-index
    indexClicked = event.target.getAttribute('data-index');
    console.log(indexClicked);
    // Envoyer une requête XHR pour actualiser la page avec l'index cliqué
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/BlocESP/?index=' + indexClicked);
    xhr.onload = function() {
      // Mettre à jour le contenu de la page avec la réponse de la requête
      document.body.innerHTML = xhr.responseText;
    };
    xhr.send();
  }
</script>