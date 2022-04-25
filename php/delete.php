<?php 
session_start();
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["scart"] as $keys => $values)
		{
			if($values["id"] == $_GET["id"])
			{
				unset($_SESSION["scart"][$keys]);
				echo '<script>window.history.back();</script>';
			}
		}
	}
}
  ?>