<?php

// Error Reporting

ini_set('display_errors', 'on'); // Making The  'display_errors' Setting To Be On For This Project
error_reporting(E_ALL); // For Displaying All Types Of Errors



if (isset($_SESSION['Username']))
    
{
	
include "config.php";


$sql = "SELECT * FROM users WHERE id = ". $_SESSION['ID'];
$result = mysqli_query($conn, $sql);


echo  "<div class='container'>";
 
echo "<div class='upper-bar pull-right'>";

				 			
			$row = mysqli_fetch_assoc($result);
	
	  		?>

				<div class="btn-group my-info">
					<span class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<?php echo $_SESSION['Username'] ?>
						<span class="caret"></span>
					</span>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>

				<?php

} else {
			?>

			<a href="login.php" class="btn btn-primary login-signup pull-right">
				Login/Signup
			</a>
			
			<?php } ?>
			
		</div>
  
</div>
 

 <nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php"></a>
    </div>
    <div class="collapse navbar-collapse" id="app-nav">
        
      <ul class="nav navbar-nav">
       <li><a href="index.php">Homepage</a></li>
      </ul>

    </div>
  </div>
</nav>