<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $title ?></title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>
      <div class="container-fluid">
      <?php
      if(isset($_GET['page']) && $_GET['page']=='login'){
        include('body/topbar.php');
      }
      else{
        include('body/topbar2.php');
      }
      ?>
      </div>
  </header>
  <main>
  <?= $content ?>
  </main>

  <footer>
      <div class="container-fluid">
      <?php
      include('body/footer.php');
      ?>
      </div>
  </footer>
    
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="../public/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="../public/js/bootstrap.js"></script>
    <script type="text/javascript" src="public/js/script.js"></script>
    <script type="text/javascript" src="public/js/tinymce/tinymce.js">></script>
    <script>
  tinymce.init({
    //selector: 'textarea ',
    //theme: 'modern',
    //toolbar:" forecolor backcolor code restoredraft emoticons fullscreen",
    //plugins:"code textcolor autoresize autosave emoticons fullscreen",

    selector: 'textarea',
  height: 300,
  theme: 'modern',
  plugins: 'print preview fullpage searchreplace directionality code visualblocks visualchars fullscreen image  charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
    
    
    
   
   

  });
  </script>
  </body>
</html>