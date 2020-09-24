<title>login_page</title>
<div class="container main">
    <h1>login_page</h1>
    <form action="login" method="post">
        <table>
            <tr>
                <td><label for="id">User ID</label></td>
                <td><input type="text" name="id" id="id" class="inputtext"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password" class="inputtext"></td>
            </tr>
        </table>
        <br>
        <div id="alert">Insert ID and Password</div>
        <button type="button" class="check" onclick=check()>check</button>
        <input type="submit" class="add" value="LOGIN">
    </form>
    
</div>

<script>
    function check(){
        let id = document.getElementById("id").value;
        let pass = document.getElementById("password").value;
        let input = "id="+id+"&password="+pass;
        var url = '/SCOOTERRENT/index/check?';
		fetch(url+input)
			.then(function(response){
				return response.text();
			})
			.then(function(body){
				document.getElementById("alert").innerHTML = body;
			})
    }
</script>

<link rel="stylesheet" type="text/css" href="view/style/indexstyle.css"></link>