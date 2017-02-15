<h1>Customers</h1>
<?php
foreach ($customers as $row) {
	echo $row['fn'].' '.$row['ln'].'<br>';
}
?>