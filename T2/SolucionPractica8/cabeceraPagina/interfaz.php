<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz MayorMenor</title>
    <style>
        label{
            display: block;
            margin-bottom: 10px;
        }
        form{
            width:30%;
            margin:0 auto;
            border:1px solid black;
            border-radius: 10px;
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
        }
        div{
            margin:0 auto;
            width:70%;
        }
    </style>
</head>
<body>
    
    <form method="POST" action="">
        <label>Introduce un Título:<input type="type" name="titulo"></label>
        <label>Introduce color de Fondo:<input type="color" name="colorFondo"></label>
        <label>Introduce color de texto:<input type="color" name="colortexto"></label>
        <label>
            Introduce Ubicacion:
            <select name="ubicacion">
                <option value="center">center</option>
                <option value="left">left</option>
                <option value="right">right</option>
            </select>
        </label>
        <input type="submit" name="mostrar" value="Mostrar">       
    </form>
    <?php
        require_once("Cabecera.php");
       if (isset($_POST['mostrar'])){
        $titulo=$_POST['titulo'];
        $colorFondo=$_POST['colorFondo'];
        $colorTexto=$_POST['colortexto'];
        $ubicacion=$_POST['ubicacion'];
        $cabecera=new Cabecera($titulo,$ubicacion,$colorTexto,$colorFondo);
        echo $cabecera->dibujar();
       }
    ?>
</body>
</html>