<?php
$conn = mysqli_connect('localhost', 'jduckworthf20', 'jduckworthf20424', 'C354_jduckworthf20');
 
function check_validity($username, $password)
{ 
    global $conn;

    $sql = "select * from Users where Username = '$username' and Password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
} 
 
function check_existence($username)
{ 
    global $conn;

    $sql = "select * from Users where Username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
} 
 
function join_a_user($username, $password, $email)
{ 
    global $conn;

    $date = date("Ymd");
 
    $sql = "Insert into Users values (NULL, '$username', '$password', '$email', $date)";
    $result = mysqli_query($conn, $sql);
 
    return $result;
} 
 
function get_user_id($username)
{ 
     global $conn;
 
    $sql = "select * from Users where Username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['Id'];
    } else
        return -1;
} 

function send_tweet($tweet, $username)
{
    global $conn;
 
    $uid = get_user_id($username);
    $current_date = date("Ymd");
    $sql = "insert into Tweets values(NULL, '$tweet', $uid, $current_date)";
    $result = mysqli_query($conn, $sql);
    if ($result)
        return true;
    else
        return false;
}
?>
