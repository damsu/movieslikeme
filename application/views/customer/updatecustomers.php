<h1>Update Customers</h1>
<FORM action="<?php echo site_url('customer/doUpdate');?>" method="POST">
<TABLE >
<TR><TH>Firstname</TH><TH>Lastname</TH></TR>
<?php
	foreach ($customer as $row) {
		echo '<input type="hidden" name="id[]" value="'.$row['id_customers'].'"/>';
		echo '<tr><td><input type="text" name="fn[]" value="'.$row['fname'].'"/></td>';
		echo '<td><input type="text" name="ln[]" value="'.$row['lname'].'"/></td></tr>';
	}
?>
<tr><td></td>
	<td><input type="submit" name="btnSave" value="Update"/></td>
</tr>
</TABLE>
</FORM>
