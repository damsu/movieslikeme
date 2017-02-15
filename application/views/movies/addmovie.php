<h2>Add a Movie</h2>
<?php
if ($comefrom == 'addmovie'){
  echo '<div class="alert alert-success">
  <strong>Thanks!</strong> You succesfully added <a href="'.site_url('movies/moviedetails/addmovie/'.$movieID).'"><b>'.$mname.'</b></a> to the Database.
</div>';
}
else if ($comefrom == 'error'){
  echo'<div class="alert alert-danger">
  <strong>Error!</strong> It didn\'t work....
</div>';
}
?>
<FORM action="<?php echo site_url('movies/addmovie');?>" method="POST" id="addmovie" data-toggle="validator" role="form">

<div style="width:100%; max-width: 400px;">
<div class="form-group">
  <label for="usr">Movie Name:</label>
  <input type="text" name="mname" class="form-control input-sm btn-default">
</div>

<div class="form-group">
  <label for="pwd">Director(s):</label>
  <input type="test" name="mdirector" class="form-control input-sm btn-default">
</div>

<div class="form-group">
  <label for="pwd">Plot:</label>
  <textarea name="mplot" rows="5" class="form-control input-sm btn-default"></textarea>
</div>

<div class="form-group">
  <label for="pwd">Image Link:</label>
  <input type="text" name="image" class="form-control input-sm btn-default">
</div>

<div class="row">
  <div class="form-group col-sm-4">
    <label for="year_select">Year :</label>
    <select class="form-control selectpicker" id="year_select" name="year">
      <?php
        for ($x = 2017; $x >= 1900; $x--) {
          echo '<option value="'.$x.'">'.$x.'</option>';
        }
      ?>
    </select>
    <span class="input-group-btn"><i class="glyphicon glyphicon-menu-down"></i></span>
  </div>
  <div class="form-group col-sm-4">
    <label for="month_select">Month :</label>
    <select class="form-control selectpicker" id="month_select" name="month">
      <?php
        for ($x = 1; $x <= 12; $x++) {
          echo '<option style="align" value="'.$x.'">'.$x.'</option>';
        }
      ?>
    </select>
    <span class="input-group-btn"><i class="glyphicon glyphicon-menu-down"></i></span>
  </div>
  <div class="form-group col-sm-4">
    <label for="day_select">Day :</label>
    <select class="form-control selectpicker" id="day_select" name="day">
      <?php
        for ($x = 1; $x <= 31; $x++) {
          echo '<option value="'.$x.'">'.$x.'</option>';
        }
      ?>
    </select>
    <span class="input-group-btn"><i class="glyphicon glyphicon-menu-down"></i></span>
  </div>
</div>

<div class="form-group">
  <label for="year_select">Movie genre(s) : </label>
  <select class="selectpicker" multiple title="This Movies defines as" data-selected-text-format="count" name="mgenre[]">
    <?php
        $genres_array = ["Action","Adventure","Animation","Biography","Comedy","Crime","Documentary","Drama","Family","Fantasy","Film-noir","History","Horror","Music","Musical","Mystery","Romance","Sci-fi","Sport","Thriller","War","Western"];

        foreach ($genres_array as $genre) {
          echo '<option value="'.$genre.'">'.$genre.'</option>';
        }
    ?>
  </select>
  <p class="help-block">Select one or more.</p>
</div>
<input type="submit" name="btnAddMovie" value="Add" class="btn btn-success"/>

</div>



</FORM>
<script>
$(document).ready(function() {
    $('#addmovie').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            mname: {
                validators: {
                    notEmpty: {
                        message: 'The Movie Name field is required and cannot be empty'
                    }
                }
            },
            mdirector: {
                validators: {
                    notEmpty: {
                        message: 'The Director(s) field is required and cannot be empty'
                    }
                }
            },
            mplot: {
                validators: {
                    notEmpty: {
                        message: 'The Plot field is required and cannot be empty'
                    }
                }
            },
            image: {
                validators: {
                    notEmpty: {
                        message: 'The Image link is required and cannot be empty'
                    }
                }
            }
        }
    })
  });
    </script>