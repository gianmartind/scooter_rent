<div class="container middle">
    <h1 class="sub">Rent Page</h1>
    <form action="rentConfirm" method="post">
        <table>
            <tr>
                <td>
                    <label for="idOp">Operator ID</label>
                </td>
                <td>
                    <input type="number" name="idOp" value="<?php echo $id?>" readOnly class="inputtextdis"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="id">Scooter ID</label>
                </td>
                <td>
                    <input type="number" name="id" value="<?php echo $result['ScooterID']?>" readOnly class="inputtextdis"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="warna">Warna</label>
                </td>
                <td>
                    <input type="text" value="<?php echo $result['Warna']?>" readOnly class="inputtextdis"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="harga">Harga</label>
                </td>
                <td>
                    <input type="number" name="harga" value="<?php echo $result['Harga']?>" readOnly class="inputtextdis"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="nama">Nama</label>            
                </td>
                <td>
                    <input type="text" name="nama" id="nama" required class="inputtext">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="noktp">No.KTP</label>
                </td>
                <td>
                    <input type="number" name="noktp" id="noktp" required class="inputtext">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kelurahan">Kelurahan</label>           
                </td>
                <td>
                <select name="kelurahan" id="kelurahan" required class="inputtext">
                        <option value="">Select an option...</option>
                        <option value="1">(1) Pasteur</option>
                        <option value="2">(2) Cipedes</option>
                        <option value="3">(3) Sukarasa</option>
                        <option value="4">(4) Gegerkalong</option>
                        <option value="5">(5) Pasir Kaliki</option>
                        <option value="6">(6) Pajajaran</option>
                        <option value="7">(7) Ciumbuleuit</option>
                        <option value="8">(8) Hegarmanah</option>
                        <option value="9">(9) Dago</option>
                        <option value="10">(10) Cipaganti</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="button" class="floatleft add" onclick="showPenyewa()">Daftar Penyewa</button>
        <input type="submit" class="add" value="Confirm"><br>   
    </form>
    
</div>
<div id="modalPenyewa" class="modal">
    <div class="modal-content">
        <table>
            <tr>
                <th>No</th>
                <th>NoKTP</th>
                <th>Nama</th>
                <th>idKelurahan</th>
                <th style="width: 40px;"></th>
            </tr>
            <?php
                foreach ($list as $key => $row) {
                    $noktp = $row['NoKTP'];
                    echo "<tr>";
                    echo "<td>".($key + 1)."</td>";
                    echo "<td name='$noktp'>".$row['NoKTP']."</td>";
                    echo "<td name='$noktp'>".$row['Nama']."</td>";
                    echo "<td name='$noktp'>".$row['idKelurahan_fk']."</td>";
                    echo "<td style='width: 40px'><button id='$noktp' onclick='copyValue(this.id)' class='modButton'><i class='fa fa-check'></i></button></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
<script>
    function showPenyewa(){
        var modalS = document.getElementById("modalPenyewa");
        modalS.style.display = "block";
        window.onclick = function(event) {
            if (event.target == modalS) {
                 modalS.style.display = "none";
            }
        }
    }

    function copyValue(x){
        let arr = document.getElementsByName(x);
        document.getElementById("noktp").value = arr[0].innerHTML;
        document.getElementById("nama").value = arr[1].innerHTML;
        document.getElementById("kelurahan").value = arr[2].innerHTML;
        var modalS = document.getElementById("modalPenyewa");
        modalS.style.display = "none";
    }
</script>
<link rel="stylesheet" type="text/css" href="view/style/rentstyle.css"></link>