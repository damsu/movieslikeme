<?php
foreach ($movie as $row) {
	$movie = $row;
}
$rating = 7.2;
$ratingpercent = $rating*10;
if ($rating < 5){
	$color = 'progress-bar-danger';
} else if (($rating >= 5) && ($rating < 7)){
	$color = 'progress-bar-warning';
} else if ($rating >= 7){
	$color = 'progress-bar-success';
}
?>

<div style="clear:both; padding-top: 1em;">
	<?php if ($comefrom == 'addmovie'){
	  	echo '<a href="'.site_url('movies/addmovie').'"><button type="button" class="btn btn-primary">< Back</button></a>';
	} else if ($comefrom == 'listmovies') {
		echo '<a href="'.site_url('movies/listmovies').'"><button type="button" class="btn btn-primary">< Back</button></a>';
	}
	?>
</div>

<?php echo '<h2>'.$movie['mname'].'</h2>'; ?>

<div id="image_big">
	<img class="img-responsive" style="width: 100%;" src="<?php echo $movie['image']; ?>"></img>
</div>
<div id="details">
	<?php
		echo '<p><b>Directed By :</b></br>'.$movie['mdirector'].'</p>';
		echo '<p><b>Date of release :</b></br>'.$movie['mdate'].'</p>';
		echo '<p><b>Genre :</b></br>'.$movie['mgenre'].'</p>';
		echo '<p><b>Plot :</b></br>'.$movie['mplot'].'</p>';
		echo '<p><b>Rating :</b></br></p>';

  		echo '<div class="progress" style="width:100%;">';
  		echo '<div class="progress-bar '.$color.'" role="progressbar" style="width:'.$ratingpercent.'%">';
    	echo '<p>'.$rating.'</p>';
  		echo '</div></div>';
  		?>
</div>
 
<div style="clear:both; padding-top: 1em;">
<p>Rate this Movie :</p>
<form id="addrating" data-toggle="validator" role="form">
<div class="row">
  
  <div class="form-group col-sm-2">
    <label for="rating_select">Rating :</label>
    <select class="form-control selectpicker" id="rating_select" name="rating">
      <?php
        for ($x = 0; $x <= 10; $x++) {
          echo '<option style="align" value="'.$x.'">'.$x.'</option>';
        }
      ?>
    </select>
    <span class="input-group-btn"><i class="glyphicon glyphicon-menu-down"></i></span>
  </div>
  <div class="form-group col-sm-8">
    <div class="form-group">
	  <label for="pwd">Comment:</label>
	  <textarea name="comment" rows="5" class="form-control input-sm btn-default"></textarea>
	</div>
	<input type="submit" name="btnAddRating" value="Add" class="btn btn-success pull-right"/>
  </div>
</div>
</form>
</div>


<script>
$(document).ready(function() {
    $('#addrating').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            comment: {
                validators: {
                    notEmpty: {
                        message: 'The Comment field is required and cannot be empty'
                    }
                }
            }
        }
    })
  });
    </script>