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