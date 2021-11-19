<?php
    include("inc/config.php");
    session_start();
  
    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $game = parse_url($url, PHP_URL_QUERY);
    $gameName = rawurldecode($game); 
    $_SESSION['gameName'] = $gameName;

    $character = null;

    if (isset($_SESSION['ID']) == false){
        header("Location: login.php");
    }

    if (isset($game) == true){
        $target = 'games/'. $_SESSION['gameName'] .'_Play.php?';
        $focus = '#chat-area';
    } else {
        $target = 'characterManagement.php?';
        $focus = '#start';
    } 

    $userID = $_SESSION['ID'];
?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Character Select</title>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
      <link rel="stylesheet" type="text/css" href="css/styles.css" />

      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php include("header.php");   
            include('modals/idMarksModal.php');  
        ?>

        <div class="container-fluid black">

            <div class='row metal'>
                <div class='col py-2'>
                  <img src='img/graffiti/characterChoice.png' id='start' class='img-fluid h-100 mx-auto d-block' />
                </div>
            </div>

            <div class='row black'>
                <div class='col-md py-1 d-none d-md-block'></div>
                <div class='col-md py-1'>
                    <img src='img/graffiti/nameStencilWhite.png' class='img-fluid h-100 mx-auto d-none d-md-block' />
                </div>
                <div class='col-md py-1'>
                    <img src='img/graffiti/backgroundStencilWhite.png' class='img-fluid h-100 mx-auto d-none d-md-block' />
                </div>
                <div class='col-md py-1'>
                    <img src='img/graffiti/expStencilRed.png' class='img-fluid h-100 mx-auto d-none d-md-block' />
                </div>
                <div class='col-md py-1 d-none d-md-block'></div>
            </div>

            <div id='characterList'>
            <?php
                $sql = "SELECT ID, CharacterName, Background, TotalExp FROM characters WHERE UserID = '$userID' AND Deceased = '0' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "
                        <div class='row black'>

                            <div class='col-6 py-1 d-block d-md-none'>
                                <img src='img/graffiti/nameStencilWhite.png' class='img-fluid h-100 mx-auto' />
                            </div>

                            <div class='col-6 col-md order-md-2 py-1'>
                                <div class='input-group input-group-lg'>
                                    <input type='text' class='form-control border text-center' value='". $row['CharacterName'] ."' readonly />
                                </div>
                            </div>

                            <div class='col-6 py-1 d-block d-md-none'>
                                <img src='img/graffiti/backgroundStencilWhite.png' class='img-fluid h-100 mx-auto' />
                            </div>

                            <div class='col-6 col-md order-md-3 py-1'>
                                <div class='input-group input-group-lg'>
                                    <input type='text' class='form-control border text-center' value='". $row['Background'] ."' readonly />
                                </div>
                            </div>

                            <div class='col-6 py-1 d-block d-md-none'>
                                <img src='img/graffiti/expStencilRed.png' class='img-fluid h-100 mx-auto' />
                            </div>

                            <div class='col-6 col-md order-md-4 py-1'>
                                <div class='input-group input-group-lg'>
                                    <input type='text' class='form-control border text-center' value='". $row['TotalExp'] ."' readonly />
                                </div>
                            </div>

                            <div class='col-6 col-md order-md-1 py-1'>
                                <button class='btn btn-info btn-lg btn-block border idMarksBtn' data-reference='". $row['ID'] ."' type='button'>ID MARKS</button>
                            </div>

                            <div class='col-6 col-md order-md-5 py-1'>
                                <a href='". $target . $row['CharacterName'] . $focus ."' role='button' class='btn btn-warning btn-lg btn-block border'>SELECT</a>
                            </div>
                        </div>
                        <hr class='hr-white my-0 d-block d-md-none' />
                        ";
                    }
                } else {
                echo "
                    <div class='row black'>
                        <div class='col-sm'></div>
                        <div class='col py-1'>
                            <h4 class='text-white text-center TNR'>Zero Results:<br />You have to build a character first!</h4>
                        </div>
                        <div class='col-sm'></div>
                    </div>
                    ";
                }
            ?>
            </div>

            <?php include("footer.php"); ?>
        </div>

        <script type='text/javascript'>
        
            $(document).ready(function(){
                /* ID MARKS */
                var character = '';
                $('#characterList').on('click', '.idMarksBtn', function(e){ 
                    e.preventDefault(); 
                    var characterID = $(this).data('reference');
                    character = $(this).data('character');
                    $.ajax({
                        type:       "POST",
                        url:        "inc/getIDMarks.php",
                        data:       {
                                    'characterID' : characterID
                                    },
                        dataType:   "json",
                        success:    function(idmarks){
                                        $('#CharacterID').val(characterID);

                                        Object.keys(idmarks).forEach(function(key){
                                            $('.idMarks').each(function(){
                                                if( $(this).attr('id') == key){
                                                    $(this).val(idmarks[key]);
                                                }
                                            })
                                        });
                                    $('#virtruvian').attr('src', 'img/virtruvian/sketchyvirtruvian.jpg'); 
                                    $('#idMarksModal').modal('toggle');
                                    }
                    });
                });
            });

        </script>
        <script type="text/javascript" src="js/navigation.js"></script>
    </body>
</html>