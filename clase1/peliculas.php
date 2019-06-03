<?php
require_once("autoload.php");
$sql = $pdo->prepare("select movies.id, movies.title, movies.rating from movies order by movies.title");
$sql->execute();
$resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
//var_dump($resultado);
//var_dump($_POST);

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>PDO</title>
  </head>
  <body>
    <div class="form-group col-md-5">
        <h1>Listado de Peliculas</h1>
    </div>
    <form class="datopelicula" action="" method="POST" enctype= "multipart/form-data"  >
	            <div class="form-group col-md-5">
					<label for="pelicula">Peliculas</label>
						<select id="id" class="form-control" name="pelicula" id="pelicula">
							<option value="">Seleccione....</option>
                            <?php
							foreach ($resultado as $key =>$value) :?>
                                <option value="<?=$value["id"]; ?>"><?=$value["title"] ; ?></option>";
                            <?php endforeach;?>
						</select>
				</div>
                <div class="form-group col-md-5">
                    <button type="submit" class="">Enviar</button>
                </div>
    </form>
<br>
    <div class="form-group col-md-10">
        <?php
        if ($_POST){
        $mov=$_POST["pelicula"];
        $sql2 = $pdo->prepare("select * from movies where movies.id='$mov' ");
        $sql2->execute();
        $peli= $sql2->fetch(PDO::FETCH_ASSOC);
        //var_dump($peli);
        //exit;
        }

        ?>

        <ul>
          <?php if ($_POST):?>
                <h3><?= $peli["title"];?></h3>
            <?php foreach($peli as $key => $value):?>
                <li> <?=  $key . ":" . $value; ?></li>
            <?php endforeach;?>
          <?php endif; ?>
        </ul>

    </div>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>

</html>
