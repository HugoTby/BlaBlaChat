window.scrollTo(0, document.body.scrollHeight);

setInterval(function() {
  $.ajax({
    url: 'PageMessage.php',
    success: function(data) {
      // mettre à jour le contenu de la page avec les données reçues
      $('#bas').html(data);
    }
  });
}, 1000);


// -> a mettre dans le .php : <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
