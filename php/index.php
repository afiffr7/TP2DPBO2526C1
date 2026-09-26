<?php
    require_once 'Bosses.php';

    session_start();

    // semisal mau reset session
    // session_destroy();

    // set session data penampung alert "id sudah digunakan!"
    if(!isset($_SESSION['alertId'])){
        $_SESSION['alertId'] = 0;
    }

    // set session list of object
    if(!isset($_SESSION['listBosses'])){
        $_SESSION['listBosses'] = [];
        // initial dummy data
        $_SESSION['listBosses'][] = new Bosses("boss01", "Malenia", 10, 20, 2.5, 1200, 30, 45, "Blade of Miquella", 2, 3);
        $_SESSION['listBosses'][] = new Bosses("boss02", "Radahn", -15, 8, 3.2, 1800, 50, 60, "Starscourge", 2, 5);
        $_SESSION['listBosses'][] = new Bosses("boss03", "Ranni", 0, -12, 1.8, 900, 20, 25, "Lunar Princess", 1, 4);
        $_SESSION['listBosses'][] = new Bosses("boss04", "Godfrey", 25, 30, 2.7, 1500, 40, 55, "First Elden Lord", 2, 6);
        $_SESSION['listBosses'][] = new Bosses("boss05", "Morgott", -8, 14, 2.1, 1100, 35, 40, "Omen King", 2, 2);
        $_SESSION['isEdited']["boss01"] = 0;
        $_SESSION['isEdited']["boss02"] = 0;
        $_SESSION['isEdited']["boss03"] = 0;
        $_SESSION['isEdited']["boss04"] = 0;
        $_SESSION['isEdited']["boss05"] = 0;
    }

    // set session list boolean isEdited untuk penanda data yang sedang diedit
    if(!isset($_SESSION['isEdited'])){
        $_SESSION['isEdited'] = [];
    }

    // jika server menerima request POST
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_SESSION['alertId'] = 0; // reset alertId

        // deklarasi variabel nilai attribut boss yang diambil dari form method POST
        $id = $_POST['id'];
        $name = $_POST['name'];
        $positionX = (int) $_POST['positionX'];
        $positionY = (int) $_POST['positionY'];
        $collisionRadius = (float) $_POST['collisionRadius'];
        $health = (int) $_POST['health'];
        $defense = (int) $_POST['defense'];
        $contactDamage = (int) $_POST['contactDamage'];
        $epithet = $_POST['epithet'];
        $phase = (int) $_POST['phase'];
        $attackPattern = (int) $_POST['attackPattern'];

        // deklarasi variabel penampung jenis button yang ditekan
        $button = $_POST['inibtn'];

        if($button == 'addBtn'){ // jika button untuk menambah data
            // cek apakah id sudah digunakan dalam list of object
            foreach($_SESSION['listBosses'] as $data){
                if($data->getId() == $id){ // jika terdeteksi
                    echo "<p>id sudah digunakan!</p>";
                    $_SESSION['alertId'] = 1; // ganti session alertId menjadi true
                }
            }
            if(!$_SESSION['alertId']){ // jika id adalah id baru
                // instansiasi object dan masukkan ke list
                $_SESSION['listBosses'][] = new Bosses($id, $name, $positionX, $positionY, $collisionRadius, $health, $defense, $contactDamage, $epithet, $phase, $attackPattern);
                $_SESSION['isEdited'][$id] = 0; // set isEdited menjadi false
            }
        }else if($button == 'editBtn'){ // jika button edit
            foreach($_SESSION['listBosses'] as $data){ // search id dari row table yang diedit
                if($data->getId() == $id){
                    $_SESSION['isEdited'][$data->getId()] = 1; // set isEdited menjadi true
                }
            }
        }else if($button == 'okBtn'){ // jika button Ok
            foreach($_SESSION['listBosses'] as $data){
                if($data->getId() == $id){
                    // update data dari inputan table
                    $data->setName($name);
                    $data->setXpos($positionX);
                    $data->setYpos($positionY);
                    $data->setCollisionRadius($collisionRadius);
                    $data->setHealth($health);
                    $data->setDefense($defense);
                    $data->setContactDamage($contactDamage);
                    $data->setEpithet($epithet);
                    $data->setPhase($phase);
                    $data->setAttackPattern($attackPattern);
                    $_SESSION['isEdited'][$data->getId()] = 0; // set isEdited false
                }
            }
        }else if($button == 'delBtn'){ // jika button hapus
            foreach($_SESSION['listBosses'] as $idx => $data){
                if($data->getId() == $id){
                    unset($_SESSION['listBosses'][$idx]); // hapus object dari list
                }
            }
            // rearrange array agar index tidak bolong
            $_SESSION['listBosses'] = array_values($_SESSION['listBosses']);
        }

        // mengembalikan halaman ke index.php untuk mencegah form resubmission saat reload
        header("Location: index.php");
        exit();
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
                        <thead>
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
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- membuat row per data boss di dalam list -->
                            <?php
                                foreach($_SESSION['listBosses'] as $data){
                                    if($data !== null){ // Error handling jika data null masih terhitung
                                        $isEdited = $_SESSION['isEdited'][$data->getId()]; // cek apakah data sedang diedit
                                        echo "<form id=\"iniForm\" method=\"POST\">"; // memisah elemen form per row
                                        echo "<tr>";
                                        // data id tersimpan permanen, tidak bisa diedit
                                        echo "<td><input type=\"text\" name=\"id\" value=\"".$data->getId()."\" readonly></input></td>";
                                        if($isEdited){ // jika data sedang diedit
                                            // write cell dengan elemen input yang bisa diedit
                                            echo "<td><input type=\"text\" name=\"name\" value=\"".$data->getName()."\"></input></td>";
                                            echo "<td><input type=\"number\" name=\"positionX\" value=\"".$data->getXpos()."\"></input></td>";
                                            echo "<td><input type=\"number\" name=\"positionY\" value=\"".$data->getYpos()."\"></input></td>";
                                            echo "<td><input type=\"number\" step=\"0.1\" name=\"collisionRadius\" value=\"".$data->getCollisionRadius()."\"></input></td>";
                                            echo "<td><input type=\"number\" name=\"health\" value=\"".$data->getHealth()."\"></input></td>";
                                            echo "<td><input type=\"number\" name=\"defense\" value=\"".$data->getDefense()."\"></input></td>";
                                            echo "<td><input type=\"number\" name=\"contactDamage\" value=\"".$data->getContactDamage()."\"></input></td>";
                                            echo "<td><input type=\"text\" name=\"epithet\" value=\"".$data->getEpithet()."\"></input></td>";
                                            echo "<td><input type=\"number\" name=\"phase\" value=\"".$data->getPhase()."\"></input></td>";
                                            echo "<td><input type=\"number\" name=\"attackPattern\" value=\"".$data->getAttackPattern()."\"></input></td>";
                                            echo "<td><button type=\"submit\" name=\"inibtn\" value=\"okBtn\">Ok</button></td>"; // button Ok
                                        }else{ // jika tidak sedang diedit
                                            // write cell dengan elemen input readonly
                                            echo "<td><input type=\"text\" name=\"name\" value=\"".$data->getName()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"positionX\" value=\"".$data->getXpos()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"positionY\" value=\"".$data->getYpos()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" step=\"0.1\" name=\"collisionRadius\" value=\"".$data->getCollisionRadius()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"health\" value=\"".$data->getHealth()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"defense\" value=\"".$data->getDefense()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"contactDamage\" value=\"".$data->getContactDamage()."\" readonly></input></td>";
                                            echo "<td><input type=\"text\" name=\"epithet\" value=\"".$data->getEpithet()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"phase\" value=\"".$data->getPhase()."\" readonly></input></td>";
                                            echo "<td><input type=\"number\" name=\"attackPattern\" value=\"".$data->getAttackPattern()."\" readonly></input></td>";
                                            echo "<td><button type=\"submit\" name=\"inibtn\" value=\"editBtn\">Edit</button></td>"; // button Edit
                                        }
                                        echo "<td><button type=\"submit\" name=\"inibtn\" value=\"delBtn\">Hapus</button></td>"; // button Hapus
                                        echo "</tr>";
                                        echo "</form>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- form untuk menambahkan data -->
            <div class="card">
                <h2>Tambah Bosses</h2>
                <form id="iniForm" method="POST">
                    <!-- inputan Id -->
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" id="id" name="id" required>
                    </div>

                    <!-- inputan Nama -->
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <!-- inputan posisi x -->
                    <div class="form-group">
                        <label for="positionX">Posisi X</label>
                        <input type="number" id="positionX" name="positionX" required>
                    </div>

                    <!-- inputan posisi y -->
                    <div class="form-group">
                        <label for="positionY">Posisi Y</label>
                        <input type="number" id="positionY" name="positionY" required>
                    </div>

                    <!-- inputan collisionRadius -->
                    <div class="form-group">
                        <label for="collisionRadius">Collision Radius</label>
                        <input type="number" step="0.1" id="collisionRadius" name="collisionRadius" required>
                    </div>

                    <!-- inputan health -->
                    <div class="form-group">
                        <label for="health">Health</label>
                        <input type="number" id="health" name="health" required>
                    </div>

                    <!-- inputan defense -->
                    <div class="form-group">
                        <label for="defense">Defense</label>
                        <input type="number" id="defense" name="defense" required>
                    </div>

                    <!-- inputan contactDamage -->
                    <div class="form-group">
                        <label for="contactDamage">Contact Damage</label>
                        <input type="number" id="contactDamage" name="contactDamage" required>
                    </div>

                    <!-- inputan epithet -->
                    <div class="form-group">
                        <label for="epithet">Epithet</label>
                        <input type="text" id="epithet" name="epithet" required>
                    </div>

                    <!-- inputan phase -->
                    <div class="form-group">
                        <label for="phase">Phase</label>
                        <input type="number" id="phase" name="phase" required>
                    </div>

                    <!-- inputan attackPattern -->
                    <div class="form-group">
                        <label for="attackPattern">Attack Pattern</label>
                        <input type="number" id="attackPattern" name="attackPattern" required>
                    </div>

                    <!-- button submit -->
                    <button type="submit" name="inibtn" value="addBtn">Tambah</button>
                    <?php
                        if($_SESSION['alertId']){ // jika terdapat alert menambah data dengan id yang sudah ada
                            echo "<div class=\"alert\">";
                            echo "<p>Id sudah digunakan!</p>";
                            echo "</div>";
                        }
                    ?>
                </form>
            </div>
        </main>
    </div>
</body>
</html>