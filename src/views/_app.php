
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    <?php

use app\core\Application;

    include_once Application::$ROOT.'views/components/Navbar.php';
    ?>
    <div class="container mt-4">
      <?php
      $flag = Application::$app->session->getFlash('register_success');
      if($flag) {
        echo '
        <div class="bg-success py-4"> '.$flag.' </div>
        ';
      }
      ?>
    {{content}}    
    </div>
  </body>
</html>