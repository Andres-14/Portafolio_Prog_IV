<?php
include('db.php');

$edit_mode = false;
$id_edit = ""; $nombre_edit = ""; $email_edit = ""; $nota_edit = "";

if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    mysqli_query($conexion, "DELETE FROM notas WHERE id_nota=$id");
    header("Location: index.php#academico");
}

if (isset($_GET['editar'])) {
    $edit_mode = true;
    $id = $_GET['editar'];
    $res = mysqli_query($conexion, "SELECT * FROM notas WHERE id_nota=$id");
    $data = mysqli_fetch_array($res);
    $id_edit = $data['id_nota'];
    $nombre_edit = $data['nombre_apellido'];
    $email_edit = $data['email'];
    $nota_edit = $data['nota'];
}

if (isset($_POST['enviar'])) {

    date_default_timezone_set('America/Caracas');

    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre_apellido']);
    $email  = mysqli_real_escape_string($conexion, $_POST['email']);
    $nota   = mysqli_real_escape_string($conexion, $_POST['nota']);
    $fecha  = date("d/m/Y H:i:s");

    if (!empty($_POST['id_form'])) {
        $id = $_POST['id_form'];
        $query = "UPDATE notas SET nombre_apellido='$nombre', email='$email', nota='$nota' WHERE id_nota=$id";
    } else {
        $query = "INSERT INTO notas (nombre_apellido, email, nota, fechanota) VALUES ('$nombre', '$email', '$nota', '$fecha')";
    }
    mysqli_query($conexion, $query);
    header("Location: index.php#academico");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/carpetas.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Portafolio - Andrés Jiménez</title>
</head>

<body>
    <header>
        <h1><a class="logo" href="#">Portafolio</a></h2>
        <nav>
            <a href="#sobre-mi">Sobre Mi</a>
            <a href="#academico">Academico</a>
            <a href="#comentarios">Comentarios</a>
            <a href="#contacto">Contacto</a>
        </nav>
    </header>

    <section id="sobre-mi" class="rpd">
        <div>
            <h3>Sobre Mi</h3>
            <img src="assets/perfil.jpg" alt="Foto de perfil" class="profile-img">
            <h2>Andrés Jiménez - 7mo Trimestre Ing.Sistemas</h1>
            <p>Me gusta la tecnologia y todo lo relacionado a ella como las computadoras, la programacion y mucho más. Mis pasatiempos son hacer ejercicio y jugar videojuegos, siendo mis favoritos la saga de Resident Evil como se podra notar xd. A parte de eso tambien me gustan los autos y los dinosaurios, mi pelicula favorita es Jurassic Park y vivo en la isla.</p>
        </div>
    </section>

    <section id="academico" class="info">
        <h3>Academico</h2>
        <div class="cards-info">
            <div class="cards">
                <img src="assets/formacion.png" alt="formacion" class="card-img">
                <h4>Formacion</h3>
                <p>Estudie en el I.E Arcoiris hasta mi graduacion en 2023, llevo estudiando en la Unimar desde el 2024 y actualmente estoy cursando el 7mo trimestre de Ingenieria en Sistemas. He aprendido varios lenguajes de programacion como CSharp, Flutter, Java, Python y HTML/CSS ademas de SQL.</p>
            </div>
            <div class="cards">
                <img src="assets/proyectos.jpg" alt="proyectos" class="card-img">
                <h4>Materias y Proyectos</h4>
                <p>Hasta ahora mis materias favoritas serian las asociadas a la progrmacion y las bases de datos. He tenido la oportunidad de trabajar en disintos proyectos utilizando diferentes lenguajes de programacion como CSharp, Flutter, Java, etc. Entre mis mejores proyectos estan el haber hecho aplicaciones moviles con Flutter y un minijuego de carreras en CSharp.</p>
            </div>
            <div class="cards">
                <img src="assets/metas.jpg" alt="metas" class="card-img">
                <h4>Metas</h4>
                <p>Mis metas más que nada son aprender y ser cada vez más capaz de entender como funcionan los codigos y las funciones de los mismos pudiendo programar sin necesidad de pedir ayuda o consejos a la IA por ejemplo. Tambien poder trabajar en proyectos reales y quizas en algun momento hacer un juego o app por mi cuenta.</p>
            </div>
        </div>
    </section>

    <section id="comentarios" class="notes">
        <h3>Notas y Comentarios</h3>
        <h2>Apartado para dejar comentarios sobre mi o el portafolio</h2>

        <form action="index.php" method="POST" class="form-container">
            <h4 id="form-notas">
                <?php echo $edit_mode ? "Editar Nota" : "Escribir nueva nota"; ?>
            </h4>
            
            <input type="hidden" name="id_form" value="<?php echo $id_edit; ?>">
            
            <input type="text" name="nombre_apellido" placeholder="Nombre y Apellido" required value="<?php echo $nombre_edit; ?>">
            
            <input type="email" name="email" placeholder="Correo electrónico" required value="<?php echo $email_edit; ?>">
            
            <textarea name="nota" placeholder="Escribe tu nota aquí..." required><?php echo $nota_edit; ?></textarea>
            
            <button type="submit" name="enviar" class="btn-enviar">
                <?php echo $edit_mode ? "Guardar Cambios" : "Enviar Nota"; ?>
            </button>
            
            <?php if($edit_mode): ?>
                <a href="index.php#comentarios" class="cancel-link">Cancelar</a>
            <?php endif; ?>
        </form>

        <div class="cards-info" style="flex-wrap: wrap; margin-top: 3rem;">
            <?php
            $resultado = mysqli_query($conexion, "SELECT * FROM notas ORDER BY id_nota DESC");
            while ($fila = mysqli_fetch_array($resultado)):
            ?>
                <div class="cards-notes card-note">
                    <h4><?php echo $fila['nombre_apellido']; ?></h4>
                    <small class="date"><?php echo $fila['fechanota']; ?></small>
                    <p><?php echo $fila['nota']; ?></p>
                    
                    <div class="note-actions">
                        <a href="index.php?editar=<?php echo $fila['id_nota']; ?>#form-notas" class="edit-link">Editar</a>
                        <a href="index.php?borrar=<?php echo $fila['id_nota']; ?>" onclick="return confirm('¿Eliminar?')" class="delete-link">Eliminar</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <section id="contacto" class="suitcase-info">
        <h3>Contacto</h3>
        <div class="suitcase">
            <div>
                <img src="assets/gmail.png" alt="Correo">
                <p>ajimenez.8132<br>@unimar.edu.ve</p>
            </div>
            <div>
                <a href="https://github.com/Andres-14" target="_blank">
                    <img src="assets/github.png" alt="GitHub">
                </a>
                <p>Andres-14</p>
            </div>
            <div>
                <a href="http://t.me/Anzu365" target="_blank">
                    <img src="assets/telegrama.png" alt="Telegram">
                </a>
                <p>@Anzu365</p>
            </div>
        </div>
    </section>

    <footer>
        <p>2026 Andrés Jiménez. Todos los derechos reservados.</p>
        <a href="https://www.residentevil.com/requiem/es-es/">www.residentevil.com</a>
    </footer>
</body>
</html>