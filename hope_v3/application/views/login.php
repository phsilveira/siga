<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <title>SIGA - BETA</title>
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>

  <body>
    <div class="container login">
      <?php 
      $attributes = array('class' => 'form-signin');
      echo form_open('login/validate_credentials', $attributes);
      echo '<h2 class="form-signin-heading">Entrar</h2>';
      echo form_input('user_name', '', 'placeholder="Usuário"');
      echo form_password('password', '', 'placeholder="Senha"');
      if(isset($message_error) && $message_error){
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Ops!</strong> Usuário ou senha inválidos.';
          echo '</div>';             
      }
      echo "<br />";
      // echo anchor('signup', 'Signup!');
      echo "<br />";
      echo "<br />";
      echo form_submit('submit', 'Login', 'class="btn btn-large btn-primary"');
      echo form_close();
      ?>      
    </div><!--container-->
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
