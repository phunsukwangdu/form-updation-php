<?php
function custom_db_connection()
{
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'test';
	$dblink = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname );
	if( mysqli_connect_errno())
	{
		die( mysqli_error( $dblink ) );
	}
	return $dblink;
}
		
function add_update_in_database($query)
{
	$con = self::custom_db_connection();
	$result = mysqli_query($con, $query);
	return $result;
}
		
function select_from_database($query)
		{
			$con = self::custom_db_connection();
			$result = mysqli_query($con, $query);
			$res_array = array();
			if(!empty($result) && count(mysqli_num_rows($result)) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$res_array[] = $row;
				}
				return $res_array;
			}
			return "";
		}