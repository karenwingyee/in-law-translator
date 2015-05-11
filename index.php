<!DOCTYPE html>

<?php
include("database.php");
session_start();
?>
<style type="text/css">
	#main{
		display:none;
	}
</style>
<?php
// check if table passed as a get
if(isset($_POST['table_name']))
{

	// store in session
	$_SESSION['table_name'] = $_POST['table_name'];

	// set table
	$table_name = $_SESSION['table_name'];
	?>
	<style type="text/css">
	#gender{
		display:none;
	}
	#main{
		display:block;
	}
	</style>

	<script>
		$('html, body').animate({scrollTop: $("#main").offset().top}, 2000);
	</script>

	<?php
}
else if(isset($_SESSION['table_name']))
{
	// set table
	$table_name = $_SESSION['table_name'];
	?>
	<style type="text/css">
	#gender{
		display:none;
	}
	#main{
		display:block;
	}
	</style>
	<?php
}
else 
{
	$table_name = 'not set';
}
//var_dump($table_name);

if(isset($_POST["translate"])){
	$id = $_POST["phrases"];
	$query="SELECT * FROM $table_name WHERE id = $id ";
	$res=mysql_query($query);
	$row = mysql_fetch_assoc($res);	

    if($_POST["phrases"] == $id){
        $results = $row['meaning'];
    }
}
if(isset($_POST["change"])){
	session_unset(); //unset session info when user want to choose a different gender
	?>
	<style type="text/css">
	#gender{
		display:block;
	}
	#main{
		display:none;
	}
	</style>
	<?php
}
?>
<html lang="en">
<head>
	<title>In-Law Translator</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<link rel="shortcut icon" href="images/favicon.png" type="image/png"> 
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,600,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="title" content="In-Law Translator" />
    <meta name="description" content="Builders need our acknowledgement. Norminate them on twitter with the relevant hashtag that fixes them best!" />
    <meta name="og:title" content="In-Law Translator" />
    <meta name="og:description" content="Builders need our acknowledgement. Norminate them on twitter with the relevant hashtag that fixes them best!" />
    <meta name="og:image" content="http://localhost/in-law-translator/images/header.png" />
    <meta property="og:title" content="In-Law Translator" />
    
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Builders need our acknowledgement. Norminate them on twitter with the relevant hashtag that fixes them best!" />
    <meta property="og:url" content="http://localhost/in-law-translator/" />
    <meta property="fb:app_id" content="1571134259820360" />
    <meta property="og:image" content="./images/header.png" />
    <meta property="article:author" content="http://localhost/in-law-translator/" />
	<meta property="article:publisher" content="http://localhost/in-law-translator/" />

    <meta property="og:image:type" content="image/png">

    <link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1571134259820360',
      xfbml      : true,
      version    : 'v2.3'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.cta.fb').click(function(e){
	e.preventDefault();
	FB.ui({
	  method: 'share_open_graph',
	  action_type: 'og.likes',
	  action_properties: JSON.stringify({
	      object:'http://localhost/in-law-translator/',
	  })
	}, function(response){});
	});
});
</script>
<div class="section" id="header">
	<div class="sticky-share">
		<a href="" target="_blank" class="cta fb"><i class="fa fa-facebook"></i> Share</a>
		<a href="http://twitter.com/intent/tweet?url=http://localhost/in-law-translator/&source=tweetbutton&text=Check+out+the+In+Law+Translator." target="_blank" class="cta tw"><i class="fa fa-twitter"></i> Tweet</a>
	</div>
	<div class="container tac">
		<h1>In-Law Translator</h1>
		<p class="bold white">About to meet the in-laws, or met them recently. Worried about what they are going to say, or what they said.
		This guide can help! Translate common phrases that in-laws say to what they really mean.</p>		
		<a href="#gender" class="cta getHelp">Get help now!</a>
	</div>
</div>
<div class="section" id="gender">
	<div class="container">
		<label><h2 class="white">What gender is your partner?</h2></label>
		<div class="center">
			<form action="http://localhost/in-law-translator/#main" method="POST">
				<!-- <a href="?table_name=female" class="cta submit gender">Female</a>
				<a href="?table_name=male" class="cta submit gender">Male</a> -->
				<input type="submit" class="cta submit" name="table_name" value="female">
				<input type="submit" class="cta submit" name="table_name" value="male">
			</form>
		</div>
	</div>
</div>
<?php
if(isset($_SESSION['table_name'])){ ?>
<div class="section" id="change">
	<div class="container">
	<label><h2 class="white">Your partner's gender: <?php echo $_SESSION['table_name']?></h2></label>
		<div class="center">
			<form action="http://localhost/in-law-translator/#gender" method="POST">
			<input type="submit" class="cta submit" name="change" value="Change Gender?"> 
			</form>
		</div>
	</div>
</div>	
<?php }
?>
<div class="section" id="main">
	<div class="container">
		<form action="http://localhost/in-law-translator/#main" method="POST" id="form"> <!-- action set to go to results div -->		
		<label for="phrases"><h2>Choose a Phrase</h2></label>
		<div class="center">
			<select id="phrases" name="phrases">
				<?php 
				$sql = mysql_query("SELECT * FROM $table_name ");
				while ($row = mysql_fetch_array($sql)){
				echo "<option value=\"".$row["id"]."\"";
	              if(isset($_POST['phrases']) && $_POST['phrases'] == $row['id'])
	                    echo 'selected';
	              echo ">".$row["phrase"]."</option>"; 
				} ?>
			</select>		
			<input type="submit" name="translate" value="Translate" class="cta submit">
		</div>				
		</form>		
	</div>
</div>
<?php if(isset($results)){ ?>
<div class="section" id="results">
	<div class="container tac">	
		<h2 class="white">What they mean:</h2>	
		<?php echo '<p class="bold white">' .$results. '</p>' ?>		
	</div>
</div>
<?php } ?>
<div class="section">
	<div class="container tac">
		<h2>Share this Guide</h2>
		<p>Help others understand what their in-laws have been saying!</p>		
	</div>
	<div class="share">
		<a href="" target="_blank" class="cta fb"><i class="fa fa-facebook"></i> Share</a>
		<a href="http://twitter.com/intent/tweet?url=http://localhost/in-law-translator/&source=tweetbutton&text=Check+out+the+In+Law+Translator." target="_blank" class="cta tw"><i class="fa fa-twitter"></i> Tweet</a>
	</div>
</div>
<div class="section foot">
	<div class="container tac">
		<a href="http://twitter.com/vouchercodespro" class="cta tw" target="_blank"><i class="icon-twitter"></i> @vouchercodespro</a>
		<p class="section-small">Made by the kind folks @ <a href="http://vouchercodespro.co.uk" title="Voucher Codes" target="_blank">VoucherCodesPro</a></p>
	</div>
</div>
</body>
</html>