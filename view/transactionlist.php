<title>transaction_list</title>
<form action="">
    <label for="month">Filter by Month</label>
    <select name="month" id="month" class="inputtext" onchange="showFiltered()">
        <option value="" style="color: rgb(60,60,60)">select month..</option>
        <option value="1">Januari</option>
        <option value="2">Febuari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>
    <span>&emsp;</span>
    <label for="nama">Filter by Name</label>
    <input type="text" name="nama" class="inputtext" id="nama" oninput="showFiltered()">
    <br><br>
    <label for="kelurahan">Filter by Kelurahan</label>
    <input type="text" name="kelurahan" class="inputtext" id="kelurahan" oninput="showFiltered()">
    <span>&emsp;</span>
    <label for="id">Filter by ScooterID</label>
    <input type="text" name="id" class="inputtext" id="id" oninput="showFiltered()">
</form>
<div class="container main" id="translist">
    <p>Total: Rp <?php echo $sum?></p>
    <table>
        <tr>
            <th>No</th>
            <th>Transaction ID</th>
            <th>Operator ID</th>
            <th>Scooter ID</th>
            <th>No KTP</th>
            <th>Nama Penyewa</th>
            <th>Kelurahan</th>
            <th>Waktu Sewa</th>
            <th>Biaya Awal</th>
            <th>Waktu Pengembalian</th>
            <th>Biaya Tambahan</th>
        </tr>
        <hr>
        <?php
            foreach ($result as $key => $row) {
                echo "<tr>";
                echo "<td>".($key + 1)."</td>";
                echo "<td>".$row->getTransactionID()."</td>";
                echo "<td>".$row->getUserID()."</td>";
                echo "<td>".$row->getScooterID()."</td>";
                echo "<td>".$row->getNoKTP()."</td>";
                echo "<td>".$row->getNama()."</td>";
                echo "<td>".$row->getNamaKel()."</td>";
                echo "<td>".$row->getRentTime()."</td>";
                echo "<td>".$row->getHargaAwal()."</td>";
                echo "<td>".$row->getReturnTime()."</td>";
                echo "<td>".$row->getHargaTambahan()."</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <hr>
</div>
<script>
    function showFiltered(){
        let month = document.getElementById("month").value;
        let nama = document.getElementById("nama").value;
        let kelurahan = document.getElementById("kelurahan").value;
        let id = document.getElementById("id").value;
        let input = "month="+month+"&nama="+nama+"&kelurahan="+kelurahan+"&id="+id;
        var url = '/scooter_rent/showFiltered?';
		fetch(url+input)
			.then(function(response){
				return response.text();
			})
			.then(function(body){
				document.getElementById("translist").innerHTML = body;
			})
    }
</script>

<link rel="stylesheet" type="text/css" href="view/style/transactionstyle.css"></link>