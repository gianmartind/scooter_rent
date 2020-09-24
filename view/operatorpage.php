    <div class="container left">
            <form action="operator">
                <h1>Filter</h1>
                <h3>Harga</h3>
                <label for="min">Min</label>
                <input type="number" placeholder="Harga Min" class="inputtext" name="min" value="<?php echo $hargaMin?>"><br><br>
                <label for="max">Max</label>
                <input type="number" placeholder="Harga Max" class="inputtext" name="max" value="<?php echo $hargaMax?>">
                <hr class="partition">
                <br>
                <h3>Warna</h3>
                <input type="radio" value="" name="warna" id="Semua" class="radiobutton" <?php echo (($warna==="") ? "checked" : "") ?>>
                <label for="Semua">Semua</label><br>        
                <input type="radio" value="Merah" name="warna" id="Merah" class="radiobutton" <?php echo (($warna==="Merah") ? "checked" : "") ?>>
                <label for="Merah">Merah</label><br>
                <input type="radio" value="Hitam" name="warna" id="Hitam" class="radiobutton" <?php echo (($warna==="Hitam") ? "checked" : "") ?>>
                <label for="Hitam">Hitam</label><br>
                <input type="radio" value="Biru" name="warna" id="Biru" class="radiobutton" <?php echo (($warna==="Biru") ? "checked" : "") ?>>
                <label for="Biru">Biru</label><br>
                <input type="radio" value="Hijau" name="warna" id="Hijau" class="radiobutton" <?php echo (($warna==="Hijau") ? "checked" : "") ?>>
                <label for="Hijau">Hijau</label>
                <hr class="partition">
                <br>
                <h3>Urutkan</h3>
                <input type="radio" value="ScooterID" name="sort" id="ID" class="radiobutton" <?php echo (($sort==="ScooterID") ? "checked" : "") ?>>
                <label for="ID">ScooterID</label><br>
                <input type="radio" value="Harga" name="sort" id="Harga" class="radiobutton" <?php echo (($sort==="Harga") ? "checked" : "") ?>>
                <label for="Harga">Harga</label><br>              
                <!--
                <input type="radio" value="(warna)" name="warna" id="warna" class="radiobutton" <?#php echo (($warna==="(warna)") ? "checked" : "")?>>
                <label for="(warna)">Merah</label><br>
                -->
                <hr class="partition">
                <br>
                <input type="submit" class="add" value="Apply filter">
                <input type="button" class="add" value="Reset filter" onclick="window.location.href='operator'">
            <br>
            </form>
    </div>
    <div class="container right">
        <div class="tablecontainer tablecontainershow" id="scooterlist">
            <table>
                <tr>
                    <th>No</th>
                    <th>ScooterID</th>
                    <th>Warna</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Sewa</th>
                </tr>
                    <?php
                        foreach ($scooterlist as $key => $row) {
                            $ScooterID = $row->getScooterID();
                            $status = $row->getStatus();
                            $color = "";
                            if($status === "Available"){
                                $color = "green";
                            }
                            else{
                                $color = "red";
                            }
                            echo "<tr>";
                            echo "<td>".($key + 1)."</td>";
                            echo "<td>".$row->getScooterID()."</td>";
                            echo "<td>".$row->getWarna()."</td>";
                            echo "<td>".$row->getHarga()."</td>";
                            echo "<td style='color: $color; width: 300px'>".$row->getStatus()."</td>";
                            if($status == "Available"){
                                echo "<td class='mod'>"."<button class='modButton' onclick=window.location.href='rent?ScooterID=$ScooterID&id=$id'><i class='fa fa-edit'></i> Rent</button>"."</td>";
                            } else{
                                echo "<td class='mod'>"."<button class='modButton' onclick=window.location.href='return?ScooterID=$ScooterID'><i class='fa fa-edit'></i> Return</button>"."</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                </table>
                <br>
        </div>
        <?php
            $sort = "ScooterID";
            $min = 0;
            $max = 100000;
            $warna = "";
            if(isset($_GET['min'])){
                $min = $_GET['min'];
            }
            if(isset($_GET['max'])){
                $max = $_GET['max'];
            }
            if(isset($_GET['warna'])){
                $warna = $_GET['warna'];
            }
            if(isset($_GET['sort'])){
                $sort = $_GET['sort'];
            }
            $idx = 1;
            $x = 0;
            while($idx <= $pageCount){
                echo "<a class='pagination' href='operator?min=$min&max=$max&warna=$warna&sort=$sort&start=$x'>$idx</a>";		
		        $idx = $idx + 1;
		        $x = $x + 10;
            }
        ?>
    </div>     
<link rel="stylesheet" type="text/css" href="view/style/operatorstyle.css"></link>