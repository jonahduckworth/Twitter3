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
        padding-top: 16px;
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
        padding: 0px 10px;
    }
    @media screen and (max-height: 450px) {
        .sidebar {padding-top: 15px;}
        .sidebar a {font-size: 18px;}
    }
    </style>

</head>

<body>

    <div class="sidebar">
        <img src='logo.png' width='60px' height='56px' style='padding-left:10px'>
        <a href="#home">Home</a>
        <a href="#services">Profile</a>
        <a href="#clients">Notifications</a>
        <a href="#contact">Edit Profile</a>
        <br>
        <button type="button" class="btn btn-primary" style="width:160px;">Tweet</button> 
    </div>

    <div class="main">
        <h2>Sidebar with Icons</h2>
    </div>

</body>
</html>
