<?php                                                                                               
    if (!isset($_SESSION['SignIn'])) {                                                              
        include('login.php');                                                              
        exit();                                                                                     
    }                                                                                               
?>

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
    }
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

    /* modal window */
    .modal-window {
        display: none;
        background-color: #AAB8C2;
        width: 300px; height: 250px; border: 1px solid black;
        position: absolute; top: 50px; left: calc(50% - 150px);
        z-index: 999;
        padding: 10px;
    }
    .modal-label {
        display: inline-block;
        width: 80px;
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
        
        <!-- search button, sign out button, welcome @user -->
        <button type="button" class="btn" id="search-button">Submit</button>
        <button type="button" class="btn btn-danger" id="sign-out" style="float:right; margin-top:9px; margin-right:10px;">Sign Out</button>
        <p style="color:#1DA1F2; float:right; padding-top:16px; padding-right:6px">Welcome, <?php echo $_SESSION['username']; ?> </p>

    </div>

    <!-- side navigation -->
    <div class="sidebar">

        <img src='logo.png' width='60px' height='56px' style='padding-left:10px'>
        <a href="#home">Home</a>
        <a href="#services">Profile</a>
        <a href="#clients">Notifications</a>
        <a href="#contact">Edit Profile</a>
        <br>
        <button type="button" class="btn btn-primary" id="sendTweet" data-toggle="modal" data-target="#modal-send-tweet"  style="width:160px">Tweet</button>
    </div>

    <div class="main">
        <h2>Sidebar with Icons</h2>
    </div>

    <!-- tweet modal -->
    <div class="modal fade" id="modal-send-tweet" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">What's happening?</h2>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="page" value="HomePage">
                        <input type="hidden" name="command" value="SendTweet">
                        <div class="form-group">
                            <label class="control-label" for="tweet">Tweet:</label> 
                            <textarea col="50" rows="5" class="form-control" id="tweet" name="tweet" placeholder="Enter Tweet here..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group"> 
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" id="tweet-submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- sign out form -->
    <form method="post" action="twitter3.php" id="form-sign-out" style="display:none">
        <input type="hidden" name="page" value="HomePage">
        <input type="hidden" name="command" value="SignOut">
    </form>

</body>



</html>

<script>

    $('#sign-out').click(function() {
        $('#form-sign-out').submit();
    })

    $('#tweet-submit').click(send_tweet);
    function send_tweet() {
        var url = "twitter3.php";
        var query = { page: 'HomePage', command: 'SendTweet', tweet: $('#tweet').val()};
        $.post(url, query,
            function(data) {
                var result = JSON.parse(data);
                $('#pane-result').html(result);
            });
    }

</script>
