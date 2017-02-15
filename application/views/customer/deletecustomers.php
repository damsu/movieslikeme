<h1>Delete Customers from database</h1>
<TABLE border="1">
<TR><TH>Firstname</TH><TH>Lastname</TH><TH>Select to delete</TH></TR>
<?php
	foreach ($customer as $row) {
		echo '<tr><td>'.$row['fname'].'</td>';
		echo '<td>'.$row['lname'].'</td>';
		echo '<td>';
		echo '<a href="'.site_url('customer/deleteThis').'/'
		.$row['id'].'">';
		echo '<button>Delete</button>';
		echo '</a>';
		echo '</td></tr>';
	}
?>
</TABLE>