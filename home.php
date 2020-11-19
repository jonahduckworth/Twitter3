<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>

    /* side navigation */
    .sidebar {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        color: #FFFFFF;
        background-color: #14171A;
        overflow-x: hidden;
      /*  padding-top: 9px; */
    }
    .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #FFFFFF;
        display: block;
    }
    .sidebar a:hover {
        color: #1DA1F2;
    }
    .main {
        margin-left: 160px; /* Same as the width of the sidenav */
      /*  padding: 0px 10px; */
    }
    @media screen and (max-height: 450px) {
       /* .sidebar {padding-top: 15px;}*/
        .sidebar a {font-size: 18px;}
    }

    /* top navigation */
    * {box-sizing: border-box;}
    body {
        margin: 0;
        }
    .topnav {
        overflow: hidden;
        background-color: #14171A;
    }/*
    .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }
    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }
    .topnav a.active {
        background-color: #2196F3;
        color: white;
    } */
    .topnav .search-container {
        float: left;
        margin-left: 170px;
        margin-bottom: 9px; 
        width: 200px;
    }
    .topnav input[type=text] {
        padding: 6px;
        margin-top: 8px;
        font-size: 17px;
        border: none;
    }
    .topnav button {
        float: left;  
        padding: 6px;
        margin-top: 9px;
        margin-left: 6px;
        background: #ddd;
        font-size: 17px;
        color: #14171A;
        border: none;
        cursor: pointer;
    }
    .topnav .search-container button:hover {
        background: #ccc;
    }
    @media screen and (max-width: 600px) {
        .topnav .search-container {
        float: none;
        }
        .topnav a, .topnav input[type=text], .topnav .search-container button {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }
        .topnav input[type=text] {
            border: 1px solid #ccc;  
        }
    }    

    </style>

</head>

<body>
    
    <!-- top navigation bar -->
    <div class="topnav">

        <!-- search -->
        <div class="search-container">
        
            <form method="post" id="form-search" action="twitter3.php">
                <input type="hidden" name="page" value="HomePage">
                <input type="hidden" name="command" value="Search">
                <input class="form-control mr-sm-2" type="text" id="search" name="search" placeholder="Search">
            </form>
            
        </div>

        <button type="button" class="btn" id="search-button">Submit</button>
        <button type="button" class="btn btn-danger" style="float:right; margin-top:9px; margin-right:10px;">Sign Out</button>

    </div>

    <!-- side navigation -->
    <div class="sidebar">

        <img src='logo.png' width='60px' height='56px' style='padding-left:10px'>
        <a href="#home">Home</a>
        <a href="#services">Profile</a>
        <a href="#clients">Notifications</a>
        <a href="#contact">Edit Profile</a>
        <br>
        <button type="button" class="btn btn-primary" style="width:160px">Tweet</button>
    </div>

    <div class="main">
        <h2>Sidebar with Icons</h2>
    </div>

</body>
</html>
