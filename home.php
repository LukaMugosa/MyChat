<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>My Chat-HOME</title>
  </head>
  <body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group-searchbox">
                    <div class="input-group-btn">
                        <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add new user</button></a></center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_users_data.php")?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <?php
                        $user = $_SESSION['user_email'];
                        $get_user = "select * from users where user_email='$user'";
                        $run_user = mysqli_query($con, $get_user);
                        $row = mysqli_fetch_array($run_user);

                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];
                    ?>
                    <?php
                        if(isset($_GET['user_name'])){
                            global $con;
                            $get_username = $_GET['user_name'];
                            $get_user = "select * from users where user_name='$get_username'";
                            $run_user = mysqli_query($con, $get_user);
                            $row_user = mysqli_fetch_array($run_user);
                            $username = $row_user['user_name'];
                            $user_profile_image = $row['user_profile'];
                        }
                        $total_messages = "select * from users_chats where (sender_username='$user_name' AND reciver_username='$username') OR (reciver_username='$user_name' AND sender_username='$username')";
                        $run_messages = mysqli_query($con, $total_messages);
                        $total=mysqli_num_rows($run_messages);
                    ?>
                    <div class="col-md-12 rigth-header">
                        <div class="right-header-img">
                            <img src="<?php echo "$user_profile_image"; ?>" alt="">
                        </div>
                        <div class="rgiht-header-detail">
                            <form method="post">
                                <p><?php echo $username; ?></p>
                                <span><?php echo $total; ?></span>&nbsp &nbsp
                                <button name="logout" class="btn btn-danger">Logout</button>
                            </form>
                            <?php
                                if(isset($_POST['logout'])){
                                    $update_msg = mysqli_query($con, "UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");
                                    header('Location: logout.php');
                                    exit();
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                        <?php
                            $update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND reciver_username='$user_name'");
                            $sel_msg = "select * from users_chat where(sender_username='$user_name' AND reciver_username='$username') OR (reciver_username='$user_name' AND sender_username='$username') ORDER BY 1 ASC";
                            $run_msg = mysqli_query($con, $sel_msg);
                            while($row = mysqli_fetch_array($run_msg)){
                                $sender_username = $row['sender_username'];
                                $reciver_username = $row['reciver_username'];
                                $msg_content = $row['msg_content'];
                                $msg_date = $row['msg_date'];
                            
                        ?>
                        <ul>
                            <?php
                                if($user_name === $sender_username && $username === $reciver_username){
                                    echo "
                                        <li>
                                            <div class='rightside-chat'>
                                                <span>$username <small>$msg_date</small></span>
                                                <p>$msg_content</p>
                                            </div>
                                        </li>
                                    ";
                                }
                                else if($user_name === $reciver_username && $username === $sender_username){
                                    echo "
                                        <li>
                                            <div class='rightside-chat'>
                                                <span>$username <small>$msg_date</small></span>
                                                <p>$msg_content</p>
                                            </div>
                                        </li>
                                    ";
                                }
                            ?>
                        </ul>
                            <?php } ?>
                    </div>
                </div$>
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">
                        <form method="post">
                            <input autocomplete="off" type="text" name="msg_content" placeholder="Write your message...">
                            <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <?php 
        if(isset($_POST['submit'])){
            $msg = htmlentities($_POST['msg_content']);
            if($msg === ""){
                echo "
                    <div class='alert alert-danger'>
                        <strong><center>Message was unable to send</center></strong>
                    </div>
                ";
            }
            else if(strlen($msg) > 100){
                echo "
                    <div class='alert alert-danger'>
                        <strong><center>Message is too long.Use only 100 characters!</center></strong>
                    </div>
                ";
            }
            else{
                $insert = "insert into users_chats(sender_username, reciver_username, msg_content, msg_status, msg_date) values('{$user_name}',{$username},'{$msg_content}','unread',NOW())";
                $run_insert = mysqli_query($con, $insert);

            }
        }
        
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>