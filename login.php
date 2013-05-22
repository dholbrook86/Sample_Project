<?php
/*Commeneted out the permission requirement for the sake of the demo*/

//require_once("models/config.php");
//if (!securePage($_SERVER['PHP_SELF'])){die();}

//Prevent the user visiting the logged in page if he/she is already logged in
//if(isUserLoggedIn()) { header("Location: dashboard.php"); die(); }

//Forms posted
if(!empty($_POST))
{
	$errors = array();
	$username = sanitize(trim($_POST["username"]));
	$password = trim($_POST["password"]);
	
	//Perform some validation
	if($username == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
	}
	if($password == "")
	{
		$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
	}

	if(count($errors) == 0)
	{
		//A security note here, never tell the user which credential was incorrect
		if(!usernameExists($username))
		{
			$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
		}
		else
		{
			$userdetails = fetchUserDetails($username);
			//See if the user's account is activated
			if($userdetails["active"]==0)
			{
				$errors[] = lang("ACCOUNT_INACTIVE");
			}
			else
			{
				//Hash the password and use the salt from the database to compare the password.
				$entered_pass = generateHash($password,$userdetails["password"]);
				
				if($entered_pass != $userdetails["password"])
				{
					$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
				}
				else
				{
					//Passwords match! we're good to go'
					
					//Construct a new logged in user object
					//Transfer some db data to the session object
					$loggedInUser = new loggedInUser();
					$loggedInUser->email = $userdetails["email"];
					$loggedInUser->user_id = $userdetails["id"];
					$loggedInUser->hash_pw = $userdetails["password"];
					$loggedInUser->title = $userdetails["title"];
					$loggedInUser->displayname = $userdetails["display_name"];
					$loggedInUser->username = $userdetails["user_name"];
					
					//Update last sign in
					$loggedInUser->updateLastSignIn();
					$_SESSION["userCakeUser"] = $loggedInUser;
					
					//Redirect to user account page
					header("Location: dashboard.php");
					die();
				}
			}
		}
	}
}
?>

<?php
require 'lib/db.php';
require 'lib/names.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo "$maintitle"; ?> </title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
        	<link rel="stylesheet" href="models/site-templates/default.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/glow/1.7.0/core/core.js" type="text/javascript"></script>
		<script src="js/glow/1.7.0/widgets/widgets.js" type="text/javascript"></script>
		<link href="js/glow/1.7.0/widgets/widgets.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript">
			glow.ready(function(){
				new glow.widgets.Sortable(
					'#content .grid_5, #content .grid_6',
					{
						draggableOptions : {
							handle : 'h2'
						}
					}
				);
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>
		
<h1 id="head" style="text-align: left;"><a href="dashboard.php"><img alt="" style="padding-top: 13px" src="images/logoshort.png"/></a><span style="vertical-align: 57%; position: relative; left: 217px;"></span></h1>
<ul id="navigation">
		</ul>

			<div id="content" class="container_16 clearfix" style="padding: 100px 0px 100px 0px;">
				<div id="center" style="width: 75%; margin: auto;">
<div class="box" style="max-width: 300px; margin-left: auto; margin-right: auto;">
	<h2>Employee Login</h2>
	<form name="login" action="dashboard.php" method="post">
			<p style="margin-bottom: -10px;">
				<label for="username">Username </label>
				<input type="text" id="username" name="username" style="width: 265px;"/>
			</p>
			<p>
				<label for="password">Password </label>
				<input type="password" id="password" name="password" style="width: 265px;"/>
			</p>
			<p style="margin-bottom: 5px;">
				<input type="submit" class="submit" value="Login" />
			</p>

	</form>
</div>
            <div id="loginerror" style="width: 250px; margin-left: auto; margin-right: auto;" >
<?php //echo resultBlock($errors,$successes); ?>
            </div>
                </div>
			</div>
<div id="foot">
<!--TODO: Need to create Debugging app-->
					<a href="#">Debug Code</a>
                    <a href="logout.php">Logout</a>
                    <a href="admin_login.php">Admin Login</a>
					<p style="float: right">&copy; Varsity Facility Services | Salt Lake City, Utah</p>
		</div>
	</body>
    		
</html>