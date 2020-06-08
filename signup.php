<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers, This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

$title = "Sign Up";

include "includes/templates/header.php";

/* Preventing The Login Page To Be Reviewed To The User That Has Recently Logged In
 By Directing Him To His Dashboard */

include "config.php";

?>

<!-- Starting The 'Signup' Form -->

<div class="signup-bg">

<h1 style="font-weight: bold; font-family: sans-serif; color: #969696; margin-top: 0px;
           padding-top: 10px" class="text-center">Show Details</h1>
	<div class="container">
    <h1 class='edit text-center'>Sign Up</h1>
	<form class="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<!-- Starting The Username Field -->
		
		<div class="input-container">
			<input 
				pattern={4,}
				title="The Username Must Be Greater Than Three Characters"
				class="form-control" 
				type="text" 
				name="username" 
				autocomplete="off"
				placeholder="Type Your Username" 
				required />
				<span class="asterisk">*</span>
		</div>
		
		<!-- Starting The Password Field -->
		
		<div class="input-container">
			<input 
				minlength={6}
				title="The Password Must Be Greater Than Five Characters" 
				class="form-control"
				type="password" 
				name="password" 
				autocomplete="off"
				placeholder="Type a Complex Password" 
				required />
				<span class="asterisk">*</span>
		</div>
		
		<!-- Starting The Confirming Password Field -->
		
		<div class="input-container">
			<input 
				minlength={6}
				title="The Password Must Be Greater Than Five Characters" 
				class="form-control" 
				type="password" 
				name="password2" 
				autocomplete="off"
				placeholder="Type Your Password Again" 
				required />
				<span class="asterisk">*</span>
		</div>
		
				<!-- Starting The Submit Field -->
				
		<input class="btn btn-success btn-block" type="submit" value="Sign Up" />
	</form>
    </div>
        

<?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    
				$username = $_POST['username'];
				$password = $_POST['password'];
                $password2 = $_POST['password2'];
				
				$form_errors = array();
				
				// Checking If The Username Filed Was Set
				
        if(empty($username))
        {
            $form_errors[] = "<div class='alert alert-danger'>The Username Can Not Be Empty</div>";
        }
				
        if(strlen($username) < 4)
        {
            $form_errors[] = "<div class='alert alert-danger'>The Username Must Not Be Less Than 4 Characters</div>";
        }
        
        // Checking If There Is Matching Between The Two Input Passwords

        if(isset($password))
        {
            if(empty($password2))
            {
                $form_errors[] = "<div class='alert alert-danger'>The Password Can Not Empty</div>";
            }
            $pass = sha1($password);
            $pass2 = sha1($password2);

            if($pass !== $pass2)
            {
                $form_errors[] = "<div class='alert alert-danger'>The Passwords Must Be Matched</div>";
            }
        }
			
			if(empty($form_errors))
				
			{
                
          //  $filtered_username = filter_var($username, FILTER_SANITIZE_STRING);
			
			$query = "SELECT Username FROM Users WHERE Username = '{$username}' ";
			$result = mysqli_query($conn, $query);
			$count = mysqli_num_rows($result);
                
			if($count > 0)
			  {
				 $form_errors[] = "<div class='alert alert-danger'>This Username Is Already Existed, Please Select Another One</div>";
			  }
                else
            {
				
				$sql = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";
                    
                    if(mysqli_query($conn, $sql))
				{
					$user_signup_success = "<div class='alert alert-success'>You Are Signed Up Successfully</div>";
                    redirect_login($signup_message_success);

				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}	
                    
            }			

        }
        
        else 

            {
                foreach($form_errors as $error)

                     {
                         echo "<div class=container>";
                         echo "<span class='text-danger'>". $error. "</span>";
                         echo "</div>";
                     }		
            }
                
    }
          
	  include "includes/templates/fotter.php"; 
?>
    
</div>

<?php
/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/