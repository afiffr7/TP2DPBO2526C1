<?php
    require_once 'Bosses.php';

    session_start();

    // set session list of object
    if(!isset($_SESSION['listBosses'])){
        $_SESSION['listBosses'] = [];
        // initial dummy data
        $_SESSION['listBosses'][] = new Bosses("boss01", "Malenia", 10, 20, 2.5, 1200, 30, 45, "Blade of Miquella", 2, 3);
        $_SESSION['listBosses'][] = new Bosses("boss02", "Radahn", -15, 8, 3.2, 1800, 50, 60, "Starscourge", 2, 5);
        $_SESSION['listBosses'][] = new Bosses("boss03", "Ranni", 0, -12, 1.8, 900, 20, 25, "Lunar Princess", 1, 4);
        $_SESSION['listBosses'][] = new Bosses("boss04", "Godfrey", 25, 30, 2.7, 1500, 40, 55, "First Elden Lord", 2, 6);
        $_SESSION['listBosses'][] = new Bosses("boss05", "Morgott", -8, 14, 2.1, 1100, 35, 40, "Omen King", 2, 2);
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afif Fadilah Rahman TP 1 DPBO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Data Boss</h1>
        </header>

        <main>

            <div class="card">
                <div class="table-container">
                    <!-- table untuk menampilkan data boss -->
                    <table border="1">
                        <thead> <!-- membuat header table -->
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Posisi X</th>
                                <th>Posisi Y</th>
                                <th>Collision Radius</th>
                                <th>Health</th>
                                <th>Defense</th>
                                <th>Contact Damage</th>
                                <th>Epithet</th>
                                <th>Phase</th>
                                <th>Attack Pattern</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- membuat row per data boss di dalam list -->
                            <?php
                                foreach($_SESSION['listBosses'] as $data){
                                    if($data !== null){ // Error handling jika data null masih terhitung
                                        echo "<tr>";
                                        echo "<td>".htmlspecialchars($data->getId(), ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".htmlspecialchars($data->getName(), ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".$data->getXpos()."</td>";
                                        echo "<td>".$data->getYpos()."</td>";
                                        echo "<td>".$data->getCollisionRadius()."</td>";
                                        echo "<td>".$data->getHealth()."</td>";
                                        echo "<td>".$data->getDefense()."</td>";
                                        echo "<td>".$data->getContactDamage()."</td>";
                                        echo "<td>".htmlspecialchars($data->getEpithet(), ENT_QUOTES, 'UTF-8')."</td>";
                                        echo "<td>".$data->getPhase()."</td>";
                                        echo "<td>".$data->getAttackPattern()."</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</body>
</html>