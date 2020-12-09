<div class="left">
    <div class="lefttop">
        <h2 class="recentTitle">Daftar Scooter</h2>
        <form action=""> 
            <select name="scooter" onchange="showScooter(this.value)" class="inputtext">
                <option value="">Select a Scooter..</option>
                <?php
                    for($i = 1; $i <= $count; $i++){
                        echo "<option value='$i'>"."Scooter $i"."</option>";
                    }
                ?>
            </select>
        </form>
        <div id="scooterdiv">

        </div>
    </div>
    <hr class="partition">

    <div class="leftbotom">
        <h2 class="recentTitle">Statistik Bulan Ini</h2>
        <form action="">
            <select name="stats" class="inputtext" onchange="showStats(this.value)">
                <option value="">Select one..</option>
                <option value="scooter">Scooter paling banyak disewa</option>
                <option value="penyewa">Penyewa paling banyak menyewa</option>
                <option value="kelurahan">Kelurahan paling banyak menyewa</option>
            </select>
        </form>
        <div id="statsdiv">

        </div>
    </div>
    <hr class="partition">
</div>
<div class="right">
<div class="container daftar"><a href="transactionList" id="daftar"><i class='fa fa-clipboard'></i> Daftar Transaksi</a></div>
    <h2 class="recentTitle">Recent</h2>
    <?php
        foreach ($recent as $key => $row) {
            echo "<div class='container recentDiv'><table class='recentTable'>";
            echo "<tr>";
            echo "<th class='recentTh'>".$row->getBerita()."</th>";
            echo "<tr>";
            echo "<tr>";
            echo "<td>"."with ID: ".$row->getBeritaID()."</td>";
            echo "<tr>";
            echo "<tr>";
            echo "<td>".$row->getTime()."</td>";
            echo "<tr>";
            echo "</table></div>";
            echo "<br>";
        }
    ?>    
</div>
<script>
    function showScooter(value){
        let input = "id="+value;
        var url = '/scooter_rent/showScooter?';
		fetch(url+input)
			.then(function(response){
				return response.text();
			})
			.then(function(body){
				document.getElementById("scooterdiv").innerHTML = body;
			})
    }

    function showStats(value){
        let input = "stats="+value;
        var url = '/scooter_rent/showStats?';
		fetch(url+input)
			.then(function(response){
				return response.text();
			})
			.then(function(body){
				document.getElementById("statsdiv").innerHTML = body;
			})
    }

</script>
<link rel="stylesheet" type="text/css" href="view/style/managerstyle.css"></link>
