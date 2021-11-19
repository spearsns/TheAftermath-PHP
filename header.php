<?php
    if (isset($_SESSION['ID']) == true){
        $username = $_SESSION['username'];
    }
    
    include('modals/messageListModal.php');
?>

    <div class='row metal' id='navBar'>
        <div class='order-1 col-6 col-md-2 py-1' id='loginBx'>
            <a href='login.php#start' role='button' id='loginBtn' class="btn btn-primary btn-lg btn-block border p-2">LOG IN</a>
        </div>

        <div class='order-3 col-6 col-md-2 py-1' id='joinBx'>
            <a href='signup.php#start' role='button'><img src='img/buttons/join_0.png' id='joinBtn' class='img-fluid h-100 mx-auto d-block' /></a>
        </div>

        <div class='order-4 col-6 col-md-2 py-1 pr-1' id='userGraffitiBx'>
            <img src='img/graffiti/usernameX.png' class='img-fluid h-100 mx-auto d-block' id='usernameGraffiti' />
        </div>

        <div class='order-5 col-6 col-md-2 py-1 pl-1' id='usernameBx'>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control border text-center" placeholder='Login 1st' id='usernameArea' readonly />
            
                <script>
                    var username = "";
                    username = "<?php echo $username; ?>";
                </script>
            </div>
        </div>

        <div class='order-6 col-12 col-sm-6 col-md-2 py-1 d-none' id='messageBx'>
            <button id='messageListBtn' class='btn btn-light btn-lg btn-block border px-0'>MESSAGES</button>
        </div>
        
        <div class='order-2 order-md-last col-6 col-md-2 offset-md-2 py-1 d-none' id='logoutBx'>
            <form id="logout" action="inc/processLogout.php" method="post">
                <button type="submit" class="btn btn-primary btn-lg btn-block border" id='logoutBtn'>LOG OUT</button>
            </form>
        </div>
    </div>

    <div class='row black'>
        <div class='col-sm-1 col-md-2 col-lg-3'></div>
        <div class='col-12 col-sm-10 col-md-8 col-lg-6'>
            <a href='index.php' id='carousel'>
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/banners/Aftermath1.jpg" alt="First slide" id='carousel1'>
                    </div>
                                        
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/banners/Aftermath2.jpg" alt="Second slide" id='carousel2'>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/banners/Aftermath3.jpg" alt="Third slide" id='carousel3'>
                    </div>

                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/banners/Aftermath4.jpg" alt="Fourth slide" id='carousel4'>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class='col-sm-1 col-md-2 col-lg-3'></div>
    </div>

    <div id='messageModalArea'></div>