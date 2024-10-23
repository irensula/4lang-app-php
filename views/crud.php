<?php
include 'all_process.php';
if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;

		$record = mysqli_query($conn, "SELECT * FROM data WHERE id=$id");
$data = mysqli_fetch_array($record);
			$name = $data['name'];
			$address = $data['address'];
			$mobile_number = $data['mobile_number'];

	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Crud Operation In PHP</title>
</head>
<body>
<div>
	<?php if (isset($_SESSION['message'])):?>
		<div class="message">
			<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
	<h1>Crud Operation in PHP (makcode.in)</h1>
	 <form class="form-inline" method="POST" action="all_process.php">
	 	<input type="hidden" name="id" value="<?php echo $id; ?>">
	 	<input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
	 	<input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>">
	 	<input type="text" name="mobile_number" placeholder="Mobile Number" value="<?php echo $mobile_number; ?>">
	<?php if ($edit_state == false): ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php else: ?>
	<button class="btn" type="submit" name="update" >Update</button>
<?php endif ?>

	 </form>
<table>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Address</th>
		<th>Mobile Number</th>
		<th>Action</th>
	</tr>
	<?php
	$result = mysqli_query($conn, "SELECT * FROM data");
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
	?>
	<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["address"]; ?></td>
	<td><?php echo $row["mobile_number"]; ?></td>
	<td><a href="index.php?edit=<?php echo $row["id"]; ?>" class="edit_btn">Edit</a></td>
	<td><a href="all_process.php?delete=<?php echo $row["id"]; ?>" class="del_btn">Delete</a></td>
	</tr>
	<?php
	$i++;
}
	?>
</table>
</div>
</body>
</html>

<!-- ALL PHP -->
<?php
session_start();
include_once 'db.php';
$name = "";
$address = "";
$mobile_number = "";
$id = 0;
$edit_state = false;
if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];
	$mobile_number = $_POST['mobile_number'];
 $sql = "INSERT INTO data (name,address,mobile_number) VALUES ('$name','$address','$mobile_number')";
 if (mysqli_query($conn, $sql)) {
 	$_SESSION['message'] = "Data Saved Successfully";
		header("Location: index.php");
	 } else {
		mysqli_close($conn);
	 }

}
// For updating records
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$mobile_number = $_POST['mobile_number'];
	mysqli_query($conn, "UPDATE data SET name='$name', address='$address', mobile_number='$mobile_number' WHERE id=$id");
	$_SESSION['message'] = "Data Updated Successfully";
	header('location: index.php');
}
// For deleteing records
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	mysqli_query($conn, "DELETE FROM data WHERE id=$id");
	$_SESSION['message'] = "Data Deleted Successfully";
	header('location:index.php');
}
?>