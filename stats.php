<?php
session_start();

require_once 'DB/DatabaseProc.php';

function estadisticas(){
    $db = new DatabaseProc("localhost", "root", "minanu2016", "m07uf3");
    $db->connect();
    $sql = $db->selectAll();
    
    echo '<table style="width:100%; border:1px solid;">';
    echo '<tr style="border:1px solid;">';
    echo '<th style="border:1px solid;">ID</th>';
    echo '<th style="border:1px solid;">Modalidad</th>';
    echo '<th style="border:1px solid;">Nivel</th>';
    echo '<th style="border:1px solid;">Fecha</th>';
    echo '<th style="border:1px solid;">Intentos</th>';
    echo '</tr>' . "\n";
    foreach ($sql as $key => $value) {
        echo '<tr style="border:1px solid;">';
        echo '<td style="border:1px solid;">' . $value['id'] . '</td>';
        echo '<td style="border:1px solid;">' . $value['modalitat'] . '</td>';
        echo '<td style="border:1px solid;">' . $value['nivell'] . '</td>';
        echo '<td style="border:1px solid;">' . $value['data_partida'] . '</td>';
        echo '<td style="border:1px solid;">' . $value['intents'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>
<html>
    <head>
        <link rel=StyleSheet href="CSS/general.css" type="text/css" media=screen>
        <meta charset="UTF-8">
        <title>Guess my Number</title>
    </head>
    <body>
        <center>
            <h1>Estadísticas</h1>
            
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="id" placeholder="Pon la ID">
                <input type="text" name="stat" placeholder="Estadistica (Mod, Niv, Int)">
                <input type="text" name="canvi" placeholder="Pon el cambio">
                <input type="submit" value="Elimina" name="sub_maq">
                <input type="submit" value="Modifica" name="sub_maq">
                <input type="submit" value="Busca por ID" name="sub_maq">
            </form>
            <?php
                if (!isset($_POST['sub_maq'])) { 
                    estadisticas();
                }
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                    $db = new DatabaseProc("localhost", "root", "minanu2016", "m07uf3");
                    $db->connect();
                    $sql = $db->selectAll();

                    if (isset($_POST['sub_maq'])){
                        if ($_POST['sub_maq'] == "Elimina"){
                            $id = $_POST['id'];
                            $db->delete($id);
                            estadisticas();
                        }
                        else if ($_POST['sub_maq'] == "Modifica"){
                            $id = $_POST['id'];     
                            if($_POST['stat'] == 'mod' || $_POST['stat'] == 'Mod' ){
                                $stat = 'modalitat';
                                if($_POST['canvi'] == 'Huma'){
                                    $cnv = 'Huma';
                                    $db->update($id, $stat, $cnv);
                                }
                                else if($_POST['canvi'] == 'Maquina'){
                                    $cnv = 'Maquina';
                                    $db->update($id, $stat, $cnv);
                                }
                            }
                            else if($_POST['stat'] == 'niv' || $_POST['stat'] == 'Niv' ){
                                $stat = 'nivell';
                                $cnv = $_POST['canvi'];
                                $db->update($id, $stat, $cnv);
                            }
                            else if($_POST['stat'] == 'int' || $_POST['stat'] == 'Int' ){
                                $stat = 'intents';
                                $cnv = $_POST['canvi'];
                                $db->update($id, $stat, $cnv);
                            }
                            estadisticas();
                        }
                        else if ($_POST['sub_maq'] == "Busca por ID"){
                            if($_POST['id'] == ''){
                                estadisticas();
                            }
                            else{
                                $id = $_POST['id'];
                                $sql = $db->findById($id);
                                echo '<table style="width:100%; border:1px solid;">';
                                echo '<tr style="border:1px solid;">';
                                echo '<th style="border:1px solid;">ID</th>';
                                echo '<th style="border:1px solid;">Modalidad</th>';
                                echo '<th style="border:1px solid;">Nivel</th>';
                                echo '<th style="border:1px solid;">Fecha</th>';
                                echo '<th style="border:1px solid;">Intentos</th>';
                                echo '</tr>' . "\n";
                                foreach ($sql as $key => $value) {
                                    echo '<tr style="border:1px solid;">';
                                    echo '<td style="border:1px solid;">' . $value['id'] . '</td>';
                                    echo '<td style="border:1px solid;">' . $value['modalitat'] . '</td>';
                                    echo '<td style="border:1px solid;">' . $value['nivell'] . '</td>';
                                    echo '<td style="border:1px solid;">' . $value['data_partida'] . '</td>';
                                    echo '<td style="border:1px solid;">' . $value['intents'] . '</td>';
                                    echo '</tr>';
                                }
                                echo '</table>';
                            }
                        }
                    }
                }
            ?>
        </center>
        
        <br>
        <form name="volver" method="post" action="index.php">
            <input type="submit" value="Volver a inicio">
        </form>
    </body>
</html>
