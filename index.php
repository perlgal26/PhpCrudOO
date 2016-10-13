<?php
include_once 'dbcrud.php';
$con = new connect();

// delete condition
if(isset($_GET['delete_id']))
{
 $con->delete("DELETE FROM users WHERE user_id=".$_GET['delete_id']);
 header("Location: index.php");
}
// delete condition

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD Operations Using PHP Oops - By Cleartuts</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript">
function edt_id(id)
{
 //if(confirm('Sure to edit ?'))
// {
  window.location.href='insert_update.php?edit_id='+id;
 //}
}
function delete_id(id)
{
 if(confirm('this record will be deleted ?'))
 {
  window.location.href='index.php?delete_id='+id;
 }
}
</script>
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>CRUD Operations Using PHP Oops</a></label>
    </div>
</div>

<div id="body">
 <div id="content">
    <table align="center">
    <tr>
    <th colspan="5"><a href="insert_update.php">Add Record</a></th>
    </tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City Name</th>
    <th colspan="2">Operations</th>
    </tr>
    <?php
$res=$con->getdata("SELECT * FROM users");
if(mysql_num_rows($res)==0)
{
 ?>
    <tr>
    <td colspan="5">Nothing Found Here !</td>
    </tr>
    <?php
}
else
{
 while($row=mysql_fetch_array($res))
 {
  ?>
        <tr>
        <td><?php echo $row['first_name'];  ?></td>
        <td><?php echo $row['last_name'];  ?></td>
        <td><?php echo $row['user_city'];  ?></td>
        <td align="center"><a href="javascript:edt_id('<?php echo $row['user_id']; ?>')">EDIT</a></td>
        <td align="center"><a href="javascript:delete_id('<?php echo $row['user_id']; ?>')">DELETE</a></td>
        </tr>
        <?php
 }
}
?>
    </table>
    </div>
</div>

</center>
</body>
</html>