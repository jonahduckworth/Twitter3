<?php                

/* initial display */
if(empty($_POST['page'])) {
    $display_type = 'none';                   
    $error_message_username = "";                                                                   
    $error_message_password = "";                                                                   
    include('login.php');                                                                 
    exit();                                                                                         
}                                                                                                   

require('model.php');                                

session_start();                                                                                    
                                                                                                     
/* when command comes from SignInPage */                                                               
if($_POST['page'] == 'SignInPage')                                                                  
{                                                                                                   
    $command = $_POST['command'];                                                                   
    switch($command) 
    {                                   
        case 'SignIn':                  

            /* display error messages */
            if (!check_validity($_POST['username'], $_POST['password'])) {                          
                $error_msg_username = '* Wrong username, or';                                       
                $error_msg_password = '* Wrong password';  
                $display_type = 'signin';
                include('login.php');                                                      
            }

            /* go to home page */           
            else {                                                                                  
                $_SESSION['SignIn'] = 'Yes';                                                        
                $_SESSION['username'] = $_POST['username'];                                         
                include('home.php');                                                       
            }                                                                                       
            exit();                                                                                 
                                                                                                     
        case 'SignUp':    

            /* check if username exists */            
            if (check_existence($_POST['username'])) {                                              
                $join_error_msg_username = '* Username exists';                                     
                $display_type = 'signup';
                include('login.php');                                                      
            }                                             

            /* add user to database */            
            else if (join_a_user($_POST['username'], $_POST['password'], $_POST['email'])) {        
                $error_msg_username = '';                                                           
                $error_msg_password = '';                                                           
                $display_type = 'signin';                                                           
                include('login.php');                                                      
            }                         

            /* display error message */            
            else {                                                                                  
                $join_error_msg_username = '* Something wrong';                                     
                $display_type = 'signup';     
                include('login.php');                                                      
            }                                                                                       
            exit();
    }
}

// When commands come from 'HomePage'                                                               
else if ($_POST['page'] == 'HomePage')                                                              
{                                                                                                   
    if (!isset($_SESSION['SignIn'])) {                                                              
        $display_type = 'none';                                                                     
        include('login.php');                                                              
        exit();                                                                                     
    }                                                                                               
                                                                                                     
    $command = $_POST['command'];                                                                   
    switch($command) {                                                                              
        case 'SendTweet':                                                                       
            $result = send_tweet($_POST['tweet'], $_SESSION['username']);                   
            if ($result)                                                                            
                $result = "Succesful!";                                                             
            else                                                                                    
                $result = "Unsuccessful!";                                                          
                                                                                                     
            echo json_encode($result);                                                              
            break;                                                                                  
        case 'SearchQuestions':                                                                     
            $data = search_questions($_POST['searchTerm']);                                         
            echo json_encode($data);                                                                
            break;                                                                                  
        case 'SignOut':                                                                             
            session_unset();                                                                        
            session_destroy();  // It does not unset session variables. session_unset() is needed.  
            $display_type = 'none';                                                                 
            include ('login.php');                                                         
            break;                                                                                  
    }                                                                                               
}                                                                                                   
                                                                                                     
else {                                                                                              
    //...                                                                                           
}

?>
