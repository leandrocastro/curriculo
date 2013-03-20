<!DOCTYPE html>
<html lang="pt-br">
  
  <head>
    <title><?php echo $title ?></title>
    <?php
      echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');

      $meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'content' => $descricao_header),
        array('name' => 'keywords', 'content' => $palavras_chave),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
        array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=8'),
        array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0'),
        array('name' => 'author', 'content' => 'Leandro de Castro @leandrophp')
      );

      echo meta($meta);
    ?>
    <!-- Le styles -->
    <link href="<?php echo(base_url());?>assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body { padding-top: 60px; }
    </style>
    <link href="<?php echo(base_url());?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
      </script>
    <![endif]-->
  </head>