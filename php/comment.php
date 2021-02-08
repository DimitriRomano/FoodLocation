<?php
require_once 'db.php';
require 'functions.php';
session_start();
logged_only();
$loggedIn = false;
if (isset($_SESSION['auth']) ) {
    $loggedIn = true;
}
$session = $_SESSION['auth'];


$conn = new mysqli('localhost', 'dimitri', 'mercanto1995', 'foodlocation');


$sql = $conn->query("SELECT idusers FROM users where username='$session'");
$user= $sql->fetch_assoc();
$coucou = implode('',$user);


function createCommentRow($data) {
    global $conn;

    $response = '
            <div class="comment">
                <div class="user">'.$data['username'].' <span class="time">'.$data['createdOn'].'</span></div>
                <div class="userComment">'.$data['comment'].'</div>
                <div class="reply"><a href="javascript:void(0)" data-commentID="'.$data['id'].'" onclick="reply(this)">REPLY</a></div>
                <div class="replies">';

    $sql = $conn->query("SELECT replies.id, username, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS createdOn 
    FROM replies INNER JOIN users ON replies.userID = users.idusers 
    WHERE replies.commentID = '".$data['id']."' ORDER BY replies.id DESC LIMIT 1");
    while($dataR = $sql->fetch_assoc())
        $response .= createCommentRow($dataR);

    $response .= '
                        </div>
            </div>
        ';
    return $response;
    
}

if (isset($_POST['getAllComments'])) {
    $start = $conn->real_escape_string($_POST['start']);

    $response = "";
    $sql = $conn->query("SELECT comments.id, username, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') AS 
    createdOn FROM comments INNER JOIN users ON comments.userID = users.idusers 
    ORDER BY comments.id");
    while($data = $sql->fetch_assoc())
        $response .= createCommentRow($data);

    exit($response);
}




if (isset($_POST['addComment'])) {
    $comment = $_POST['comment'];
    $isReply = $_POST['isReply'];
    $commentID = $_POST['commentID'];

    if ($isReply != 'false') {
        $conn->query("INSERT INTO replies (comment, commentID, userID, createdOn) 
        VALUES ('$comment', '$commentID', '$coucou', NOW())");
        $sql = $conn->query("SELECT replies.id, username, comment, DATE_FORMAT(replies.createdOn, '%Y-%m-%d') AS
         createdOn FROM replies INNER JOIN users ON replies.userID = users.idusers
          ORDER BY replies.id DESC LIMIT 1");
          
    } else {
        $conn->query("INSERT INTO comments (userID, comment, createdOn) VALUES
         ('$coucou','$comment',NOW())");
        $sql = $conn->query("SELECT comments.id, username, comment, DATE_FORMAT(comments.createdOn, '%Y-%m-%d') 
        AS createdOn FROM comments INNER JOIN users ON comments.userID = users.idusers 
        ORDER BY comments.id DESC LIMIT 1");
        
        
    }
   

    $data = $sql->fetch_assoc();
    exit(createCommentRow($data));
}



$sqlNumComments = $conn->query("SELECT id FROM comments");
$numComments = $sqlNumComments->num_rows;
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Restaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/Bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo.JPG" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/fixed.css">
    <link rel="stylesheet" href="../style.css">
        <style type="text/css">
        .comment {
            margin-bottom: 20px;
        }

        .user {
            font-weight: bold;
            color: black;
        }

        .time, .reply {
            color: gray;
        }

        .userComment {
            color: #000;
        }

        .replies .comment {
            margin-top: 20px;

        }

        .replies {
            margin-left: 20px;
        }

        input {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
             <h2 style="font-size:30px;">FOOD LOCATION</h2>
        </a>
        <form action="php/search.php" method="get">
            <div class="search-box">
                <input class="search-text" type="text" name="keywords" autocomplete="off" placeholder="Search..">
                <a class="search-btn" href="php/search.php">
                    <i class="fa fa-search"></i></a>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reservation">Reservation</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="container" style="margin-top:50px;">
    <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
        <div class="col-md-12" align="center">
        <img src="../images/logo.JPG" class="rounded float-left" alt="...">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <textarea class="form-control" name="comment" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
            <button style="float:right" class="btn-primary btn" onclick="isReply = false;" id="addComment">Add Comment</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2 style="color:black; font-size:28px;"><b id="numComments"><?php echo $numComments ?> Comments</b></h2>
            <div class="userComments">

            </div>
        </div>
    </div>
</div>

<div class="row replyRow" style="display:none">
    <div class="col-md-12">
        <textarea class="form-control" id="replyComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
        <button style="float:right" class="btn-primary btn" onclick="isReply = true;" id="addReply">Add Reply</button>
        <button style="float:right" class="btn-default btn" onclick="$('.replyRow').hide();">Close</button>
    </div>
</div>

<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
  var isReply = false, commentID = 0, max = <?php echo $numComments ?>;

$(document).ready(function () {
    $("#addComment, #addReply").on('click', function () {
        var comment;

        if (!isReply)
            comment = $("#mainComment").val();
        else
            comment = $("#replyComment").val();

        if (comment.length > 5) {
            $.ajax({
                url: 'comment.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    addComment: 1,
                    comment: comment,
                    isReply: isReply,
                    commentID: commentID
                }, success: function (response) {
                    max++;
                    $("#numComments").text(max + " Comments");

                    if (!isReply) {
                        $(".userComments").prepend(response);
                        $("#mainComment").val("");
                    } else {
                        commentID = 0;
                        $("#replyComment").val("");
                        $(".replyRow").hide();
                        $('.replyRow').parent().next().append(response);
                    }
                }
            });
        } else
            alert('Please Check Your Inputs');
    });
    getAllComments(0, max);
});

function reply(caller) {
    commentID = $(caller).attr('data-commentID');
    $(".replyRow").insertAfter($(caller));
    $('.replyRow').show();
}

function getAllComments(start, max) {
    if (start > max) {
        return;
    }

    $.ajax({
        url: 'comment.php',
        method: 'POST',
        dataType: 'text',
        data: {
            getAllComments: 1,
            start: start
        }, success: function (response) {
            $(".userComments").append(response);
            getAllComments((start+20), max);
        }
    });
}
</script>
</body>
</html>