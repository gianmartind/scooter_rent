<div class="container statsview">
    <table style="width: 100%">
        <tr>
            <th>No</th>
            <th><?php echo $col1?></th>
            <th><?php echo $col2?></th>
            <th><?php echo $col3?></th>
            <th>Jumlah Penyewaan</th>
        </tr>
        <?php
            foreach ($result as $key => $row) {
                echo "<tr>";
                echo "<td class='statsview'>".($key + 1)."</td>";
                echo "<td class='statsview'>".$row[$col1]."</td>";
                echo "<td class='statsview'>".$row[$col2]."</td>";
                echo "<td class='statsview'>".$row[$col3]."</td>";
                echo "<td class='statsview'>".$row['Jumlah']."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>