<?php
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

<h2>Movies</h2>
<TABLE  class="table table-striped table-hover">
<thead><TR><TH></TH><TH>Movie</TH><TH>Plot</TH><TH>Directed By</TH><TH>Year</TH><TH>Rating</TH></TR></thead><tbody>
<?php
  foreach ($movie as $row) {
    echo '<tr><td width="50px" height="50px"><div class="image"><img src="'.$row['image'].'" class="img img-responsive full-width"></div></td>';
    echo '<td><a href="'.site_url('movies/moviedetails/'.'listmovies/'.$row['movieID']).'">'.$row['mname'].'</a></td>';
    echo '<td>'.$row['mplot'].'</td>';
    echo '<td>'.$row['mdirector'].'</td>';
    echo '<td>'.$row['mdate'].'</td>';
    echo '<td><div class="progress" style="width:100px;">';
      echo '<div class="progress-bar '.$color.'" role="progressbar" style="width:'.$ratingpercent.'%">';
      echo '<p>'.$rating.'</p>';
      echo '</div></div></td></tr>';
  }
?></tbody>
</TABLE>