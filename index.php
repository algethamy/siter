<?php

    if(!empty($_POST)){
        if(is_writable('C:\Windows\System32\drivers\etc\hosts')){       
            file_put_contents('C:\Windows\System32\drivers\etc\hosts', "\n127.0.0.1 $_POST[site]", FILE_APPEND);
            file_put_contents('C:\xampp\apache\conf\extra\httpd-vhosts.conf', 
            
            
            '
            
    <VirtualHost *:80>
    
        ServerName '.$_POST['site'].'
    
        DocumentRoot "'.str_replace('\\', '/', $_POST['path']).'"
    
        <Directory "'.str_replace('\\', '/', $_POST['path']).'">
            Options Indexes FollowSymLinks
            AllowOverride All
            Require all granted
        </Directory>
    
    </VirtualHost>
    
    '
            
            
            
            , FILE_APPEND);
            
            $done = 1;
        }else{
            $error = 1;
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Siter</title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      
      <form class="form-signin" action="" method="post" role="form">
        <?php if(isset($done)){ ?>
         <p class="bg-success" style="padding: 10px;direction: rtl;text-align: center;font-size: 20px;">
            تم الحفظ بنجاح <br />
            يجب إعادة تشغيل الاباتشي
         </p>
        <?php } ?>
        <?php if(isset($error)){ ?>
         <p class="bg-danger" style="padding: 10px;direction: rtl;text-align: center;font-size: 20px;">
            لا نستطيع الكتابة في ملف hosts
         </p>
        <?php } ?>
        <h2 class="form-signin-heading">New local site</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="site" type="text" id="inputEmail" class="form-control" placeholder="shaleeh.dev" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="path" type="text" id="inputPassword" class="form-control" placeholder="C:\Users\Toshiba\Documents\shaleeh" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
      </form>

    </div> <!-- /container -->


  </body>
</html>