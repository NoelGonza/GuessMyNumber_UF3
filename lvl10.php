<?php
require 'funciones.php';

require_once 'DB/DatabaseProc.php';

$db = new DatabaseProc("localhost", "root", "minanu2016", "m07uf3");
$db->connect();
?>

<html>
    <head>
        <link rel=StyleSheet href="CSS/general.css" type="text/css" media=screen>
        <meta charset="UTF-8">
        <title>Guess my Number</title>
    </head>
    <body>
        
        <h1>Nivel 1-10</h1>
        
        <?php
            if (!isset($_SESSION['vic10'])) {
                $_SESSION['vic10'] = 0;
            }
            echo "Total de victorias: " . $_SESSION['vic10'];
        ?>
        
        <br><br>
        
        <h2>Adivina el número de la máquina</h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            Numero: <input type="text" name="num">
            <input type="submit">
            <br><br>
            
            <?php
            if (!isset($_SESSION['secret_10'])){
                $num_maq = new Num();
                $num_maq->setNum_m(rand(1, 10));
                $_SESSION['secret_10'] = $num_maq;
            }
            
            
            $obj = $_SESSION['secret_10'];
            $secretNumber = $obj->getNum_m();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // collect value of input field
                //LIMPIA CADENAS
                if (empty($_REQUEST['num'])){
                    echo '';
                }
                else{
                    $num_for = htmlspecialchars($_REQUEST['num']);
                }
                if (empty($num_for)) {
                    echo "";
                } else {
                    if ($num_for >= 1 && $num_for <= 10){
                        if ($num_for < $obj->getNum_m()) {
                            $obj->setCont_gen($obj->getCont_gen() + 1);
                            echo $num_for . " es mas pequeño que el número que buscamos, llevas " . $obj->getCont_gen() . " intentos";
                        } else if ($num_for > $obj->getNum_m()) {
                            $obj->setCont_gen($obj->getCont_gen() + 1);
                            echo $num_for . " es mas grande que el número que buscamos, llevas " . $obj->getCont_gen() . " intentos";
                        } else {
                            echo "Felicidades lo has acertado\n";
                            $contador = $obj->getCont_gen();
                            $db->insert('Huma', '10', $contador);
                            unset($_SESSION['secret_10']);
                            $_SESSION['vic10']++;
                            echo "<input type='submit' value='Vuelve a jugar'>";
                            
                        }
                    }
                    else{
                        echo 'El numero ' . $num_for . ' no es valido (1-10)';
                    }                    
                }
            }
            ?>
        </form>
        
        <form name="volver" method="post" action="index.php">
            <input type="submit" value="Volver a inicio">
        </form>

    </body>
</html>