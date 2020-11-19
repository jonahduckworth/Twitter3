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

    /* split view */
    .split {
        height: 100%;
        width: 50%;
        position: fixed;
        z-index: 1;
        top: 0;
        overflow-x: hidden;
        padding-top: 20px;
    }
    .left {
        left: 0;
        background-color: #14171A;
    }
    .right {
        right: 0;
        background-color: #1DA1F2;
    }
    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
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

    <!-- left side -->
    <div class='split left'>
    <div class='centered'>

        <img src='logo.png' width='420px' height='310px'>
        <br>
        <h1 style='color:#FFFFFF'>Twitter3</h1>

    </div>
    </div>

    <!-- right side -->
    <div class='split right'>
        <div class='centered'>
            
        <!-- sign in --><br><br><br>
        <p>Sign in to enter</p>
        <br>            
        <form method='post' action='twitter3.php'>
            <input type='hidden' name='page' value='SignInPage'>
            <input type='hidden' name='command' value='SignIn'>

            <!-- input fields -->
            <label class='modal-label'>Username:</label>
            <input type='text' name='username' required> <?php if (!empty($error_msg_username)) echo $error_msg_username; ?> <br>
            <label class='modal-label'>Password:</label>
            <input type='password' name='password' required> <?php if (!empty($error_msg_password)) echo $error_msg_password; ?> <br>

            <!-- submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br>

        <!-- register -->
        <p>Don't have an account?<button type='button' class='btn btn-link' id='register' data-toggle='modal' data-target='#sign-up-modal'>Register</button></p>

    </div>
</div>

    <!-- sign up modal window-->
    <div id='sign-up-modal' class='modal fade' style='display: none' aria-hidden='true'>
    <div class="modal-dialog">
    <div class="modal-content">

        <!-- title -->       
        <div class="modal-header">
            <h2 class="modal-title" style='color:black'>Sign Up</h2>
        </div>

        <!-- body -->
        <div class="modal-body">
        <form id="form-sign-up" method="POST" action="twitter3.php">
            <input type='hidden' name='page' value='SignInPage'> 
            <input type='hidden' name='command' value='SignUp'> 

            <!-- input fields -->
            <div class="form-group">
                <label for="username" style='color:black'>Username:</label>
                <input type="text" class="form-control" id="username" name="username"> <?php if (!empty($join_error_msg_username)) echo $join_error_msg_username; ?>
            </div>
            <div class="form-group">
                <label for="password" style='color:black'>Password:</label> 
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="email" style='color:black'>Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <!-- buttons -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
        </div>

    </div>
    </div>
    </div>   

</body>
</html>

<script>

    <?php
    //    if($display_type == 'signup')
    //        echo 'show_modal();';
    //    else
    //        ;
    ?>

    $(document).ready(function() {
        $('#register').click(function() {
            show_modal();
        });
    });

    function show_modal() { 
        $('#sign-up-modal').css('display', 'block');
    }

</script>
