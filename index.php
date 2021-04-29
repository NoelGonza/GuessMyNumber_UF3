<?php
    session_start();
?>
<html>
    <head>
        <link rel=StyleSheet href="CSS/general.css" type="text/css" media=screen>
        <meta charset="UTF-8">
        <title>Guess my Number</title>
    </head>
    <body>
        <h1>Guess my Number Objetos</h1>
        
        <h2>Nivel 1-10</h2>        
        <form name="form10" method="post" action="lvl10.php">
            <input type="submit" value="Adivina el número de la máquina 1-10">
        </form>
        <form name="form10_m" method="post" action="lvl10_m.php">
            <input type="submit" value="La maquina adivina tu número 1-10">
        </form>
        
        <h2>Nivel 1-50</h2> 
        <form name="form50" method="post" action="lvl50.php">
            <input type="submit" value="Adivina el número de la máquina 1-50">
        </form>
        <form name="form50_m" method="post" action="lvl50_m.php">
            <input type="submit" value="La maquina adivina tu número 1-50">
        </form>
        
        <h2>Nivel 1-100</h2>
        <form name="form100" method="post" action="lvl100.php">
            <input type="submit" value="Adivina el número de la máquina 1-100">
        </form>
        <form name="form100_m" method="post" action="lvl100_m.php">
            <input type="submit" value="La maquina adivina tu número 1-100">
        </form>
        <br>
        <form name="stats" method="post" action="stats.php">
            <input type="submit" value="Ver Estadísticas">
        </form>
        <input type="submit" value="Creditos" id="creditos">
        <script src="credits.js"></script>
    </body>
</html>
