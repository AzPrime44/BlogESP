<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>404</title>
</head>

<body>
   <h3>
      Cette catégorie n'existe pas. Vous serez redirigé vers la page d'accueil dans <span id="countdown">5</span> secondes.';
   </h3>

</body>
<style>
   h3 {
      text-align: center;
      margin-top: 10rem;

   }

   h3 #countdown {
      font-size: 30px;
      color: #c778dd;
   }
</style>
<script>
   let countdownElement = document.getElementById("countdown");
   let countdown = 5;
   setInterval(function() {
      countdown--;
      countdownElement.innerHTML = countdown;
      if (countdown === 0) {
         window.location.href = "../index.php";
      }
   }, 1000); // 1000 ms = 1 seconde
</script>

</html>