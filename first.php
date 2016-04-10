<?php
include_once('db.php');
$naveen_ne_connection_banaya = custom_db_connection();
if(isset($_POST['save_data']))
{
	$name = $_POST['stupid_name'];
	$fname = $_POST['father_name'];
	
	$susmeet_ki_command = "insert into tbl_stupid_records (name, fname) values ('".$name."', '".$fname."');";
	$query_ka_result = mysqli_query($naveen_ne_connection_banaya, $susmeet_ki_command);
	if($query_ka_result)
	{
		echo "Record entered successfully.";
	}
	else
	{
		echo "Something went wrong.";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<form name="savedata" action="" method="post">
        <table cellpadding="10">
            <tr>
                <td>
                    Enter Your Stupid Name: 
                </td>
                <td>
                    <input type="text" name="stupid_name" maxlength="100" required />
                </td>
            </tr>
            <tr>
                <td>
                    Enter Your Great Father Name: 
                </td>
                <td>
                    <input type="text" name="father_name" maxlength="100" required />
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" name="save_data" value="Save Data" />
                </td>
            </tr>
        </table>
    </form>
    <table border="1" cellpadding="10">
    	<tr>
        	<td>S#</td>
            <td>Name</td>
            <td>Father Name</td>
        </tr>
        <?php
			$sql = "select * from tbl_stupid_records";
			$naveen_ne_connection_banaya = custom_db_connection();
			$result = mysqli_query($naveen_ne_connection_banaya, $sql);
			echo "No of rows = ".mysqli_num_rows($result);
			if(mysqli_num_rows($result) > 0)
			{
				$i=1;
				while($row = mysqli_fetch_assoc($result))
				{
					echo "<tr>";                    
                    echo "<td>".$i++."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['fname']."</td>";
                    echo "</tr>";
				}
			}
			else
			{
				echo "No record found.";
			}
		?>
    </table>
</body>
</html>