<?php
    include "util/conexion.php";
    if(!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $rut = $_POST['rut'];
        $telefono = $_POST['telefono'];
        $region = $_POST['region'];
        $comuna = $_POST['comuna'];
        $direccion = $_POST['direccion'];
        $fecha = $_POST['fecha'];
        $fecha_registro = date("Y-m-d H:i:s");

        $sql = "INSERT INTO usuarios ";
        $sql .= "(nombre, apellido, correo, clave, rut, telefono, region, comuna, direccion, fecha, fecha_registro ) ";
        $sql .= "VALUES ('$nombre', '$apellido', '$correo', '$clave','$rut','$telefono','$region','$comuna','$direccion','$fecha','$fecha_registro')";
        $result = $conn->query($sql);
        if($result === TRUE) {
            echo '<script>alert("Usuario registrado correctamente!");</script>';
            echo '<script>window.location="index.php";</script>';
        } else {
            echo '<script>alert("Error al intentar crear usuario! ERROR: ' . $result . ');</script>';
            echo '<script>window.location="index.php";</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/main.css">
    
    <title>Juegoteca</title>
</head>
<body>
    <div class="main-div container-fluid flex-column align-items-center text-white">
        <h1 class="sz4 py-4 text-center">Registro</h1>
        <form action="registro.php" method="POST" id="formRegistro">
            <div class="row w-75 text-center mx-auto">
                <div class="col">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="apodo">Apodo (visible para el resto)</label>
                        <input type="text" class="form-control" id="apodo" name="apodo" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="correo2">Repetir Correo</label>
                        <input type="email" class="form-control" id="correo2" required>
                    </div>
                    <div class="form-group">
                        <label for="clave">Contrase??a</label>
                        <input type="password" class="form-control" id="clave" name="clave" required>
                    </div>
                    <div class="form-group">
                        <label for="clave2">Repetir Contrase??a</label>
                        <input type="password" class="form-control" id="clave2" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="rut">Rut (Sin puntos ni gui??n)</label>
                        <input type="text" class="form-control" id="rut" name="rut" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Tel??fono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="region">Regi??n</label>
                        <select id="region" name="region" class="form-control">
                            <option value="0" selected="selected">Elige una Regi??n</option>
                            <option value="15">Regi??n de Arica y Parinacota</option>
                            <option value="1">Regi??n de Tarapac??</option>
                            <option value="2">Regi??n de Antofagasta</option>
                            <option value="3">Regi??n de Atacama</option>
                            <option value="4">Regi??n de Coquimbo</option>
                            <option value="5">Regi??n de Valpara??so</option>
                            <option value="13">Regi??n Metropolitana de Santiago</option>
                            <option value="6">Regi??n del Libertador Gral. Bernardo O???Higgins</option>
                            <option value="7">Regi??n del Maule</option>
                            <option value="16">Regi??n de ??uble</option>
                            <option value="8">Regi??n del Biob??o</option>
                            <option value="9">Regi??n de la Araucan??a</option>
                            <option value="14">Regi??n de Los R??os</option>
                            <option value="10">Regi??n de Los Lagos</option>
                            <option value="11">Regi??n Ais??n del Gral. Carlos Ib????ez del Campo</option>
                            <option value="12">Regi??n de Magallanes y de la Ant??rtica Chilena</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comuna">Comuna</label>
                        <select id="comuna" name="comuna" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direcci??n</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                </div>
            </div>
            
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg mt-4">Crear Cuenta</button>
            </div>
        </form>
        <div class="text-center">
            <a role="button" class="btn btn-light btn-lg py-1 mt-3" href="index.php">Volver</a>
        </div>
    </div>

    <script>
        $('#formRegistro').submit(function(e){
            var form = this;
            var correo = $('#correo');
            var correo2 = $('#correo2');
            var clave = $('#clave');
            var clave2 = $('#clave2');
            var region = $('#region');

            if(correo.val() != correo2.val()) {
                e.preventDefault();
                alert('Los correos ingresados no coinciden!');
                return;
            }

            if(clave.val() != clave2.val()) {
                e.preventDefault();
                alert('Las contrase??as ingresados no coinciden!');
                return;
            }

            if(region.val() == 0) {
                e.preventDefault();
                alert('Seleccione region y comuna!');
                return;
            }
        });

        $('#region').change(function(e) {
                var that = this;
                if($(that).val() < 1 || $(that).val() > 15) {
                    $('#comuna').html('');

                    return;
                }
                $.getJSON('res/data/comunas/' + $(that).val() + '.json', function(data) {
                    console.log(data);
                    var stComunas = '';
                    $.each(data, function(key, val) {
                        stComunas += '<option value="' + val.Comuna.COMUNA_ID + '">' + val.Comuna.COMUNA_NOMBRE + '</option>';
                    });
                    $('#comuna').html(stComunas);
                })
                    .fail(function() {

                    });
            });

            $('#region').trigger('change');
    </script>
</body>
</html>