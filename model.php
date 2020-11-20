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
    $sql = "insert into Tweets values(NULL, '$tweet', '$username', $current_date)";
    $result = mysqli_query($conn, $sql);
    if ($result)
        return true;
    else
        return false;
}

function search_tweet($term)
{ 
    global $conn;

    $sql = "select * from Tweets where Tweet like '%$term%'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while($row = mysqli_fetch_assoc($result))
        $data[] = $row;
    return $data;
}

function get_user_name($uid)
{
    global $conn;

    $sql = "select * from Users where Id = $uid";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        return "";
    else {
        $row = mysqli_fetch_assoc($result);
        return($row['Username']);
    }
}
?>
