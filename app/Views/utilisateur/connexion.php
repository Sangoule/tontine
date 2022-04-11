

    



  <main class="<?= $menuActif=="connexion"?"form-signin text-center":""?>">
      <h1>Login et password</h1>
      <?php if(isset($validation)):?>
     <div class="row alert alert-danger">
       <?= $validation->listErrors();?>
     </div>    
     <?php endif;?>
      <?php if(session()->get('success')):?>
        <div class="alert-success alert" role="alert">
            <?= session()->get('success')?>
        </div>
        <?php endif ?>
      

    <form method="post">
       

        <div class="form-floating">
          <input type="text" name="login" class="form-control" id="login" placeholder="Entrer le login" value="<?= set_value("login")?>">
          <label for="login">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" name="motPasse" class="form-control" id="MotPasse" placeholder="Entrer le mot de passe">
          <label for="MotPasse">Mot de passe</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
       
   </form>

  </main>
  
</div>


<?= script_tag("js/bootstrap.bundle.min.js") ?>

      
  </body>
</html>
