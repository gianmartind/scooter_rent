<div class="container">
    <div class="flag" onclick="showScooter()"><p class="inside">Scooter List</p></div>
    <div class="tablecontainer" id="scooterlist">
        <table>
            <tr>
                <th>No</th>
                <th>ScooterID</th>
                <th>Warna</th>
                <th>Harga</th>
                <th colspan="2">Modify</th>
            </tr>
            <?php
                foreach ($scooterlist as $key => $row) {
                    $ScooterID = $row->getScooterID();
                    echo "<tr>";
                    echo "<td>".($key + 1)."</td>";
                    echo "<td>".$row->getScooterID()."</td>";
                    echo "<td>".$row->getWarna()."</td>";
                    echo "<td>".$row->getHarga()."</td>";
                    echo "<td class='mod'>"."<button id='$ScooterID' class='modButton' onclick=UpdateScooter(this.id)><i class='fa fa-edit'></i> Update</button>"."</td>";
                    echo "<td class='mod'>"."<button class='modButton' onclick='ScooterDel($ScooterID)'><i class='fa fa-trash'></i> Delete</button>"."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
<hr class="partition">
<div class="container">
    <div class="flag" onclick="showUser()"><p class="inside">User List</p></div>
    
    <div class="tablecontainer" id="userlist">
        <table>
            <tr>
                <th>No</th>
                <th>UserID</th>
                <th>Password</th>
                <th>Type</th>
                <th colspan="2">Modify</th>
            </tr>
            <?php
                foreach ($userlist as $key => $row) {
                    $UserID = $row->getUserID();
                    echo "<tr>";
                    echo "<td>".($key + 1)."</td>";
                    echo "<td>".$row->getUserID()."</td>";
                    echo "<td>".$row->getPassword()."</td>";
                    echo "<td>".$row->getType()."</td>";
                    echo "<td class='mod'>"."<button id='$UserID' class='modButton' onclick=UpdateUser(this.id)><i class='fa fa-edit'></i> Update</button>"."</td>";
                    echo "<td class='mod'>"."<button class='modButton' onclick='UserDel($UserID)'><i class='fa fa-trash'></i> Delete</button>"."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</div>
<hr class="partition">
<button class="add" id="+scooter" onclick="showScooterModal()">+Scooter</button><button class="add" id="+user" onclick="showUserModal()">+User</button>
<br>
<br>
<!--Modal-->
<!--Insert New-->
<div id="modalScooter" class="modal">
    <div class="modal-content">
        <p class="modalName">Add Scooter</p>
        <form action="admin/addScooter" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="sID" required>ScooterID</label></td>
                    <td><input type="text" class="inputtext" name="sID"><br></td>
                </tr>
                <tr>
                    <td><label for="swarna" required>Warna</label></td>
                    <td><input type="text" class="inputtext" name="swarna"><br></td>
                </tr>
                <tr>
                    <td><label for="sharga" required>Harga</label></td>
                    <td><input type="text" class="inputtext" name="sharga"></td>
                </tr>
                <tr>
                    <td><label for="upload">Photo</label></td>
                    <td><input type="file" name="file"></td>
                </tr>
            </table>      
            <input type="submit" class="modalAdd" value="ADD"></input>
        </form>
    </div>
</div>
<div id="modalUser" class="modal">
    <div class="modal-content">
        <p class="modalName">Add User</p>
        <form action="admin/addUser" method="post">
            <table>
                <tr>
                    <td><label for="uname" required>UserID</label></td>
                    <td><input type="text" class="inputtext" name="uID"><br></td>
                </tr>
                <tr>
                    <td><label for="upassword" required>Password</label></td>
                    <td><input type="text" class="inputtext" name="upassword"><br></td>
                </tr>
                <tr>
                    <td><label for="utype">Type</label></td>
                    <td><select name="utype" class="inputtext" id="utype" required>
                            <option value="">Select an option...</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </td>
                </tr>
            </table>      
            <input type="submit" class="modalAdd" value="ADD"></input>
        </form>
    </div>
</div>
<!--Update Existing-->
<div id="updateScooter" class="modal">
    <div class="modal-content">
        <p class="modalName">Update Scooter</p>
        <form action="admin/updateScooter" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="textID">Update Scooter with ID</label></td>
                    <td><input type="text" class="inputtextdis" id="textScooter" name="textID" style="background-color: #d3d3d3" readOnly></td>
                </tr>
                <br>
                <tr>
                    <td><label for="Nswarna">New Warna</label></td>
                    <td><input type="text" class="inputtext" name="Nswarna"><br></td>
                </tr>
                <tr>
                    <td><label for="Nsharga">New Harga</label></td>
                    <td><input type="text" class="inputtext" name="Nsharga"></td>
                </tr>
                <tr>
                    <td><label for="upload">Photo</label></td>
                    <td><input type="file" name="file"></td>
                </tr>
            </table>      
            <input type="submit" class="modalAdd" value="UPDATE"></input>
        </form>
    </div>
</div>
<div id="updateUser" class="modal">
    <div class="modal-content">
        <p class="modalName">Update User</p>
        <form action="admin/updateUser" method="post">
            <table>
                <tr>
                    <td><label for="textID">Update User with ID</label></td>
                    <td><input type="text" class="inputtextdis" id="textUser" name="textID" style="background-color: #d3d3d3" readOnly></td>
                </tr>
                <br>
                <tr>
                    <td><label for="Nupass">New Password</label></td>
                    <td><input type="text" class="inputtext" name="Nupass"><br></td>
                </tr>
                <tr>
                    <td><label for="Nutype">New Type</label></td>
                    <td><select name="Nutype" class="inputtext" id="Nutype">
                            <option value="">Select an option...</option>
                            <option value="Admin">Admin</option>
                            <option value="Manager">Manager</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </td>
                </tr>
            </table>      
            <input type="submit" class="modalAdd" value="UPDATE"></input>
        </form>
    </div>
</div>
<!--Modal-->
<script>
    function showScooter(){
        if(document.getElementById("scooterlist").classList.contains("tablecontainershow")){
            document.getElementById("scooterlist").classList.remove("tablecontainershow");
        }else{
            document.getElementById("scooterlist").classList.add("tablecontainershow");
        }
        
    }

    function showUser(){
        if(document.getElementById("userlist").classList.contains("tablecontainershow")){
            document.getElementById("userlist").classList.remove("tablecontainershow")
        }else{
            document.getElementById("userlist").classList.add("tablecontainershow");
        }
    }

    function showScooterModal(){
        var modalS = document.getElementById("modalScooter");
        modalS.style.display = "block";
        window.onclick = function(event) {
            if (event.target == modalS) {
                 modalS.style.display = "none";
            }
        }
    }
    

    function showUserModal(){
        var modalU = document.getElementById("modalUser");
        modalU.style.display = "block";  
        window.onclick = function(event) {
            if (event.target == modalU) {
                modalU.style.display = "none";
            }
        }
    }

    function UpdateScooter(x){
        var modalUS = document.getElementById("updateScooter");
        modalUS.style.display = "block";
        window.onclick = function(event) {
            if (event.target == modalUS) {
                 modalUS.style.display = "none";
            }
        }
        document.getElementById("textScooter").value = x;

    }

    function UpdateUser(x){
        var modalUU = document.getElementById("updateUser");
        modalUU.style.display = "block";
        window.onclick = function(event) {
            if (event.target == modalUU) {
                 modalUU.style.display = "none";
            }
        }
        document.getElementById("textUser").value = x;s
    }

    function ScooterDel(x){
        let r = confirm("Delete Scooter?");
        if(r == true){
            window.location.href='DeleteScooter?ScooterID=' + x;
        }
    }

    function UserDel(x){
        let r = confirm("Delete User?");
        if(r == true){
            window.location.href='DeleteUser?UserID=' + x;
        }
    }
</script>
<link rel="stylesheet" type="text/css" href="view/style/adminstyle.css"></link>