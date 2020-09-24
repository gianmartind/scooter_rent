<html>
    <head>
        <title><?php echo $role?>_page</title>
        <link rel="stylesheet" type="text/css" href="view/layout/style.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="header">
            <div class="bigTitle">
                <h1 id="bigTitle"><?php echo $role?>_page</h1>
            </div>
            <div class="rightSide">
                <p id="greet">hi, <?php echo $role?>!</p>
                <p id="userID">Your ID: <?php echo $id?></p>
                <a href="index/logout" class="logout">log out</a>
            </div>
        </div>
        <br>
        <div class="content">
            <?php echo $content?>
        </div> 
    </body>
</html>