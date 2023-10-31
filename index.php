<?php
    include_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>AUTOMATAS</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-lg-6" action="test.php" method="post">
                <h1>DIAGRAMA DE ESTADOS</h1>
    
                <div class="row mb-4">
                    <div class="col table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ESTADOS</th>
                                    <th>+</th>
                                    <th>E</th>
                                    <th>-</th>
                                    <th>*</th>
                                    <th>/</th>
                                    <th>DIGITO</th>
                                    <th>FDC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i=0; $i < 7 ; $i++) :?>
                                    <tr>
                                        <th><?= "q$i"?></th>
                                        <td><?= selectEstados(7, $i) ?></td>
                                        <td><?= selectEstados(7, $i) ?></td>
                                        <td><?= selectEstados(7, $i) ?></td>
                                        <td><?= selectEstados(7, $i) ?></td>
                                        <td><?= selectEstados(7, $i) ?></td>
                                        <td><?= selectEstados(7, $i) ?></td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="q<?= $i ?>[]" id="q<?= $i ?>" value="1">
                                        </td>
                                    </tr>
                                <?php endfor ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cadena">Cadena a probar:</label>
                        <input class="form-control" type="text" name="cadena" id="cadena">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </div>
                    <div class="col">
                        <button type="reset" class="btn btn-secondary w-100">Limpiar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>