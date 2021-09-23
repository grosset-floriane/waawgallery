<?php
    
    // Opening the channel to the database
	require_once '../../private/accessWAAW.php';
    $conn = new mysqli($host, $username, $password, $database);
    
	// Testing if the connection is established
	if($conn->connect_error) {
		die($conn->connect_error);
    }


    // Transform string text numbers into int
    function isInteger($input){
        return(ctype_digit(strval($input)));
    }

    // if a user logs out
    $logout = "";
    if (isset($_GET['logout'])) $logout = $_GET['logout'];

    
    if($logout && $logout == "1") {
        if(isset($_COOKIE['user']) && isset($_COOKIE['temptoken'])) {
            $cookieuser = $_COOKIE['user'];

                // reset temp token in user table
            $logoutQuery = "UPDATE emilie_users SET temp_token = '' WHERE user_id = '$cookieuser'";
            $resultLogout = $conn->query($logoutQuery);

            if($resultLogout < 1) {
                // temptoken reset didn't success
                

            } else {
                // temptoken reset success
                // Detroy coockies link to session
            setcookie('user', '', FALSE, '/');
            setcookie('temptoken', '', FALSE, '/');

            // redirect to index to display message
            header('Location: index.php?logout=success');
            }

            

            

        }
        

    } elseif ($logout && $logout == "success") {
        $logoutmessage = "<p class=\"success\">You are now log out.</p>";
    }

    // if a user is already logged in = coockies set and match session -> redirection to main.php
    if (isset($_COOKIE['user']) || isset($_COOKIE['temptoken'])) {
        // we found both cookies.
			// check if they are valid (= match the database)

			// extract values from cookies

			$cookieuser = $_COOKIE['user'];
			$cookietoken = $_COOKIE['temptoken'];

			// connect to database to match the cookie values
			// outsource this later

			// query for both user and temptoken at once

			$query = "SELECT * FROM emilie_users WHERE user_id = '$cookieuser'
						AND temp_token LIKE '$cookietoken'";

			$result = $conn->query($query);

			if ($result->num_rows == 1) {

				// cookies match exactly one row. user is legit.
				// Redirect to the main page
				header('Location: insertSentence.php');

			}
    }

    // initialise the variables

	$name = "";
	$password = "";
    $message = "";

    $signin = isset($_POST['submit']) && $_POST['submit'] == 'Login' &&
                isset($_POST['name']) && $_POST['name'] != '' &&
                isset($_POST['password']) && $_POST['password'] != '';

    $incompletesignin = isset($_POST['name']) && $_POST['name'] != '' XOR
    isset($_POST['password']) && $_POST['password'] != '';

    if ($signin) {

		// someone wants to log in, meaning:
		// submit button has been pushed
		// this is the second run of the file
		// overwrite initialized variables

		$name = $_POST['name'];
		$password = $_POST['password'];

		// password is not stored in clear text in the database
		// compare the hashed version of it

		$hashedpassword = sha1($password);

		// contact the database to compare form fields with stored values



		// check both values at the same time

		$query = "SELECT * FROM emilie_users WHERE name LIKE '$name'
						AND password LIKE '$hashedpassword'  ";

		$result = $conn->query($query);

		if ($result->num_rows == 1) {

			// we have a match: name is found,
			// password in db equals the hashed clear password provided

			// we don't want to store the name in the cookie
			// retrieve the id

			$userid = $result->fetch_assoc()['user_id'];

			// now SET the user cookies

			setcookie('user', $userid, time() + 3600, '/');

			// avoid setting the password in the cookie
			// make a temporary string
			// this should be outsourced as a utility (function) later

			$temptoken = "";
		    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

			// iterating 24 times = adding one random character each time
			// the value 24 is arbitrary; seems secure enough

			for ($i = 0; $i < 24; $i++) {
				$temptoken .= $characters[rand(0, strlen($characters) - 1)];
			}

			// 1. set a cookie with that string

			setcookie('temptoken', $temptoken, time() + 3600, '/');

			// 2. set the same string in the database in the user row
			// we know id, name, password; use the id to identify user

			$query = "UPDATE emilie_users SET temp_token='$temptoken'
						WHERE user_id = $userid ";

			$result = $conn->query($query);

			// this should have worked
			// maybe add a check later

			// prepare a statement of success
			// we could add a CSS "success" class to make it green
			// change this later to an automatic redirect to main page

			header('Location: insertSentence.php');

		} else {

			// something went wrong, most probably a wrong password
			// don't give away what went wrong for security reasons
			// prepare a statement of failure
			// we could add a CSS "failure" class to make it red

			$message = "<p class=\"fail\"><em>The username and password don't match.</em>. <br>
						Please try again.</p>";

		}





	} elseif ($incompletesignin) {
        $message = "<p class=\"fail\">Please fill up the form completely.</p>";
    }

    

    // always clean up connections!
    $conn->close();


    ?>

<!DOCTYPE html>



<html lang="en">
<head>
<title>Inabsence - Login</title>
</head>

<body>



<main>

<form action="" method="POST" class="loggin-form" id="loggin-form">
<legend>LOGIN</legend>
<?php if (isset($message)) echo $message;
        ?>
<p>
    <input type="text" id="name" name="name"
        value="<?php echo $name; ?>" placeholder="Your name">
</p>

<p>
    <input type="password" id="login-password" name="password" placeholder="Password">
</p>

    <div class="submits">
        <input type="submit" name="submit" value="Login">
    </div>

</form>







</main>

</body>
