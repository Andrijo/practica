<?php
include_once('conexion.php');
$conexion = mysqli_connect('localhost', 'root', '', 'proyecto'); //Conexión a base de datos

//Llamar clientes
$sql = 'SELECT * FROM clientes';
$sentencia = $pdo->prepare($sql);
$sentencia->execute();

$clientesxpag = 5;
//Contar articulos
$totalPageDB = $sentencia->rowCount(); //Contar filas
$paginas = $totalPageDB / $clientesxpag; //Dividir el número de filas entre los páginas a mostrar
$paginas = ceil($paginas); //Redondear filas
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css?5.0">
    <title>Práctica Inicial</title>
</head>

<body class="container my-5">
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1>Práctica Inicial</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum vitae nemo itaque! Enim obcaecati impedit sint sapiente, quaerat quidem pariatur. Deleniti, odit vel quo natus excepturi dicta sit nobis id deserunt mollitia alias explicabo et minima cum sunt laudantium facilis. Provident esse nulla impedit aperiam nobis temporibus et ad reprehenderit illo doloremque ex optio explicabo expedita, laudantium iusto cupiditate sed consequuntur id sint. Dolorem maiores sed ut amet quibusdam dolores, saepe dignissimos eum molestias quia minima a nostrum omnis! Repellat rem officia quam pariatur ratione harum delectus asperiores officiis modi cumque nam, natus explicabo consequatur enim. Porro facere, soluta aperiam autem commodi tempora nemo fugit expedita laborum nobis laudantium delectus sed omnis velit nostrum, repudiandae voluptatem magnam veritatis nisi nihil cumque non odit accusantium perferendis! Dolor sequi maiores officia reprehenderit rerum architecto accusantium beatae, delectus vel, aut quo inventore deserunt ipsam porro consectetur perferendis iure neque maxime adipisci? Eligendi, laudantium?</p>
            </div>
        </div>
        <div class="d-grid gap-2 col-4 mx-auto mt-3">
            <button id="myBoton2" class="btn btn-light btn-outline-dark" type="button" onclick="ocultarTabla()">Ocultar tabla</button>
            <button id="myBoton" class="btn btn-light btn-outline-dark" type="button" onclick="mostrarTabla()" value="actualizar" style="display: none;">Mostrar tabla</button>
            <button class="btn btn-light btn-outline-dark" type="button"> <a href="" download="archivo/clientes.xml">  Descargar XML </a></button>

            <!-- Modal -->
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light btn-outline-dark" data-bs-toggle="modal" data-bs-target="#añadirClienteModal">
                Añadir cliente
            </button>

            <!-- Modal -->
            <div class="modal fade" id="añadirClienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Añadir cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" id="formCliente">
                                <label for="">ID</label>
                                <input type="text" class="form-control" placeholder="ID" id="id" name="id">
                                <label for="">Clave</label>
                                <input type="text" class="form-control" placeholder="Clave" id="clave" name="clave">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido">
                                <label for="">Correo</label>
                                <input type="email" class="form-control" placeholder="Ejemplo@gmail.com" id="correo" name="correo">
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" placeholder="Teléfono" id="telefono" name="telefono">
                                <label for="">Sexo</label>
                                <select class="form-control" name="sexo" id="sexo">
                                    <option value="">H</option>
                                    <option value="">M</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" id="btnAgregar" class="btn btn-light btn-outline-dark">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <form style="text-align:right;" method="get" action="search.php">
            <label >
                <input type="text" name="keywords" autocomplete="off" placeholder="Buscar">
            </label>
            <input type="submit" value="Search"><br>
        </form>
        <div class="row">

            <table id="myTable" class="table table-bordered border-dark mt-5">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Sexo</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * from clientes"; //Traer todos los datos de la tabla
                $result = mysqli_query($conexion, $sql); //

                while ($mostrar = mysqli_fetch_array($result)) {

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['clave'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['apellido'] ?></td>
                            <td><?php echo $mostrar['correo'] ?></td>
                            <td><?php echo $mostrar['telefono'] ?></td>
                            <td><?php echo $mostrar['sexo'] ?></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
            <nav aria-label="..." id="myPagination">
                <ul class="pagination">
                    <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?pagina= <?php echo $_GET['pagina'] - 1 ?>">Anterior</a>
                    </li>

                    <?php for ($i = 0; $i < $paginas; $i++) : ?>
                        <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="index.php?pagina=<?php echo ($i + 1) ?>">
                                <?php echo ($i + 1) ?>
                            </a></li>
                    <?php endfor ?>

                    <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?pagina= <?php echo $_GET['pagina'] + 1 ?>"">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <script src=" js/script.js"> </script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>