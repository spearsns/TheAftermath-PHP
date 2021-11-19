$(document).ready(function(){

// HEADER
	if(username){
	    $('#loginBx').removeClass('order-1').addClass('d-none');
	    $('#joinBx').removeClass('order-3').addClass('d-none');
	    $('#messageBx').removeClass('order-6 col-12 col-md-2 d-none').addClass('order-1 col-6 col-md-2');
	    $('#userGraffitiBx').removeClass('order-4 col-5 col-md-2 pr-1').addClass('order-3 col-12 col-sm-6 col-md-3 offset-md-1');
	    $('#usernameBx').removeClass('order-5 col-7 col-md-2 pl-1').addClass('order-4 col-12 col-sm-6 col-md-3');
	    $('#logoutBx').removeClass('order-2 offset-md-2 d-none').addClass('order-2 col-6 col-md-2 offset-md-1');
	    $('#usernameArea').val(username);   
	}

	//IN GAME
	if(gamename){
		$('#logout').attr('action', '../inc/processLogout.php');
		$('#usernameGraffiti').attr('src', '../img/graffiti/usernameX.png');
		$('#carousel').attr('href', '../index.php');
		$('#carousel1').attr('src', '../img/banners/Aftermath1.jpg');
		$('#carousel2').attr('src', '../img/banners/Aftermath2.jpg');
		$('#carousel3').attr('src', '../img/banners/Aftermath3.jpg');
		$('#carousel4').attr('src', '../img/banners/Aftermath4.jpg');
		$('#FAQBtn').attr('src', '../img/buttons/FAQ_0.png');
		$('#shortsBtn').attr('src', '../img/buttons/shorts_0.png');
		$('#conceptArtBtn').attr('src', '../img/buttons/concept_0.png');
		$('#documentsBtn').attr('src', '../img/buttons/docfolder_0.png');
	}

//INDEX

});