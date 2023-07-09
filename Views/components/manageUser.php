<div class="header">----Nombre d'utilisateurs
   <?= count($users) ?>-----

</div>
<div class="body">
   <?php foreach ($users as $user) { ?>
   <div class="user">

      <div class="user-info">
         <p class="username">
            <?= $user['username'] ?>
         </p>
         <p class="email">
            <?= $user['email'] ?>
         </p>
      </div>
      <?php if ($user['role'] != 'admin') { ?>
      <p class="action">
         <a href="#">supprimer</a>
      </p>
      <?php } ?>
   </div>
   <?php } ?>
</div>
<style>
.header {
   text-align: center;
}

.body {
   display: flex;
   flex-direction: column;
   /* align-items: center; */
   /* justify-content: center; */
}

.user {
   display: flex;
   flex-direction: row;
}

.user-info {
   display: flex;
   flex-direction: row;
   gap: 20px
}

.action {
   text-align: center;
   margin-left: 30px;
}

.action a {
   text-decoration: none;

}
</style>