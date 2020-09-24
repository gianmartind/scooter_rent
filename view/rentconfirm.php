<title>rent_confirm</title>
<div class="main container">
    <h1>Rent Confirmation</h1>
    <form action="scooterRent" method="post">
       <table>
            <tr>
                <td><label for="idOp">Operator ID</label></td>
                <td>: <input type="text" name="idOp" value="<?php echo $idOp?>" readOnly></td>
            </tr>
            <tr>
                <td><label for="ScooterID">Scooter ID</label></td>
                <td>: <input type="text" name="ScooterID" value="<?php echo $ScooterID?>" readOnly></td>
            </tr>
            <tr>
                <td><label for="noktp">No.KTP Penyewa</label></td>
                <td>: <input type="text" name="noktp" value="<?php echo $noktp?>" readOnly></td>
            </tr>
            <tr>
                <td><label for="nama">Nama Penyewa</label></td>
                <td>: <input type="text" name="nama" value="<?php echo $nama?>" readOnly></td>
            </tr>
            <tr>
                <td><label for="idKel">ID Kelurahan Penyewa</label></td>
                <td>: <input type="text" name="idKel" value="<?php echo $idKel?>" readOnly></td>
            </tr>
            <tr>
                <td><label for="rentTime">Waktu Penyewaan</label></td>
                <td>: <input type="text" name="rentTime" value="<?php echo $rentTime?>" readOnly></td>
            </tr>
            <tr>
                <td><label for="hargaAwal">Biaya Awal (Rp)</label></td>
                <td>: <input type="text" name="hargaAwal" value="<?php echo $hargaAwal?>" readOnly></td>
            </tr>
       </table> 
       <input type="submit" value="Confirm" class="add" id="confirm">
    </form>
</div>
<button onclick="printPage()" id="printButton">Download this page</button>
<script>
    function printPage(){
        document.getElementById("printButton").style.display = "none";
        document.getElementById("confirm").style.display = "none";
        
        window.print();

        document.getElementById("printButton").style.display = "block";
        document.getElementById("confirm").style.display = "block";
    }
</script>
<link rel="stylesheet" type="text/css" href="view/style/confirmstyle.css"></link>


