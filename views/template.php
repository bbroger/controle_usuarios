<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Usuários</title>

    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/styles.css">
</head>

<body>
    <div class="container">
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>

    <script src="<?php echo BASE_URL ?>assets/js/jquery.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/bootstrap.js"></script>
</body>

</html>