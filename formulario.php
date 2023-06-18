<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="style.css" as="style">
    <script type="text/javascript" charset="utf-8" src="index.js"></script>
  </head>
  <body>
    <div class="container border">
      <div  class="title">
        <h2 class="default-text-color">Create Account</h2>
      </div>

      <form method="POST" action="">
        <div id="nombreRow" class="row-inputs">
          <label class="default-text-color" for="nombre">Nombre</label>
          <input class="border" name="nombre" type="text" id="nombre" required/>
        </div>

        <div id="apellidoRow" class="row-inputs">
          <label class="default-text-color" for="apellido">Nombre</label>
          <input class="border" name="apellido" type="text" id="apellido" required/>
        </div>

        <div id="emailRow" class="row-inputs">
          <label class="default-text-color" for="email">Email</label>
          <input class="border" name="email" type="email" id="mail" required/>
        </div>

        <div class="row-button">
          <input class="form-btn border button1" name="submit" type="submit" value="Suscribirse"/>
        </div>
        <?php
          if($_POST){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cursosql";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if($conn->connect_error){
              die("Connection failed: " . $conn->connect_error);
            }

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];

            $insert ="INSERT INTO usuario (nombre, apellido, email) 
            VALUES ('$nombre', '$apellido', '$email')";

            if($conn->query($insert) === TRUE) {
              echo "New record created succesfully";
            } else{
              echo "Error: " . $insert . "<br>" . $conn->error;
            }
            $conn->close();
          }
        ?>
      </form>
    </div>
  </body>
</html>