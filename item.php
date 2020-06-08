<?php

/* 
** ob_start(ob_gzhandler());
* ob_start(): Outbut Buffering => For Storing The Output Of The Script On The Server Other Than Headers, This Method Is Used To Avoid The Header Method Problems.
* ob_gzhandler(): For Compressing The Output Of The Script Before Sending It To The Server Other Than Headers,    This Callback Method Is Used To Gain Some Speed On Sending The Output To The Server Specially On Large-Sized Scripts Stored On Memory.
* Turning On The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/

session_start();

$title = "Show Details";
?>
<style>
.item-info
    {
        background-color: #888;
        font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, "sans-serif";
        max-width: 500px;
        max-height: 500px;
        margin-bottom: 20px;
        border-radius: 5px;
        color: #DDD;
        padding: 10px;
    }
.item-name
    {
        text-align: center;
    }
.item-description
    {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
    }
.item-price
    {
        text-align: center;
        margin-bottom: 10px;
    }
.item-price span
    {
        font-size: 22px;
    }
.item-country
    {
        text-align: center;
    }
.item-country span
    {
        font-size: 22px;
    }
</style>
<?php
include "includes/templates/header.php";
include "config.php";

if(isset($_SESSION['Username']))
	
{
 
	   if(isset($_GET['id']) && is_numeric($_GET['id']))
		   
		   {

			   $id = intval($_GET['id']);
		   }
	   
	   else
		   
		   {
			   $id = 0;
		   }

    $sql = "SELECT * FROM items WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

echo "<div class='container item-info'>";

	 if($count > 0 )
	 {
		 $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
		 foreach($rows as $row)
		 {
			 
             echo "<h3 class='item-name'>". $row['ItemName'] ."</h3>";;
			 echo "<p class='item-description'>". $row['ItemDescription']. "</p>";
             
             echo "<section class='item-price'>";	
             echo "<span>".$row['ItemPrice']. " $"."</span>";
             echo "</section>";

             echo "<section class='item-country'>";	
             echo "<span>".$row['ItemCountry']."</span>";
             echo "</section>";		 
			  
         }
        
                            
echo "</div>";
                echo "<hr class='custom-hr'>";
 } else
		 
	 {
		 echo "<div class='alert alert-danger'>Theres No Such ID</div>";
	 }
	 
	  
} else
	
		{

			include "includes/templates/header.php";
		
            $user_error = "<span class='message-error alert alert-danger'>You Are Not Permited To Access This Page Directly</span>";

            redirect_login($user_error, 5);

		}

include "includes/templates/fotter.php"; 

/*
** ob_end_flush();
* Cleaning The Output Buffer & Turning Off The Buffering Of The Output.
* This Is The Right Place To Invoke This Builtin Method.
*/