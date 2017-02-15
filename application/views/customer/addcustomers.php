<h1>Register</h1>
<FORM action="<?php echo site_url('customer/addCustomers');?>" method="POST">
<TABLE>
<tr><td>Firstname</td><td><input type="text" name="fn"/></td></tr>
<tr><td>Lastname</td><td><input type="text" name="ln"/></td></tr>
<tr><td></td><td><input type="submit" name="btnSave" value="Save"/></td></tr>
</TABLE>
</FORM>

<?php
if ($test>0) {
	//echo 'Inserted successfully';
	echo '<script>alert("Success")</script>';
}
;?>