<h2>Login</h2>

<FORM action="<?php echo site_url('user/loginuser');?>" method="POST" id="login" data-toggle="validator" role="form">

<div style="width:100%; max-width: 400px;">
<div class="form-group">
  <label for="usr">Username:</label>
  <input type="text" name="username" class="form-control input-sm btn-default">
</div>

<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" name="password" class="form-control input-sm btn-default">
</div>
<input type="submit" name="btnLogin" value="Login" class="btn btn-success"/>
</div>



</FORM>

<script>
$(document).ready(function() {
    $('#login').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The Username is required and cannot be empty'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required and cannot be empty'
                    }
                }
            }
        }
    })
  });
    </script>