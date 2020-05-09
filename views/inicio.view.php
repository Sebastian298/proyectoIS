<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosRegistro.css">
    <link rel="shortcut icon" href="img/index.ico">
    <title>Inicio de Sesión</title>
</head>
<body>
<form id="my-form" name="login" class="box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
<h1>Iniciar Sesión</h1>
<input type="text" placeholder="Usuario" id="usuario" name="Usuario">
<input type="password" placeholder="Password" id="password" name="Password">
<button onclick="login.submit()">Aceptar</button>
<?php if(!empty($errores)):?>
    <div class="error">
        <ul>
            <?php
             echo $errores;
            ?>
        </ul>
    </div>
<?php endif; ?>
</form>
</body>
</html>