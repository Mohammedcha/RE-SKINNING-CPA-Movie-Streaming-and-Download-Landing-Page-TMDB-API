<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->

<?php include_once('inc/re_skinning_header.php'); ?>
  <div class="s006">
    <form method="post" action="moviesresults.php" id="searchsubmit">
      <div id="dontfuck" class="switchform">
        <p class="text-center" href="index.php"><img src="imgs/big_logo.png" style="max-width:300px;"/></p>
        <fieldset>
            <legend>Download any Movie for free</legend>
            <p class="text-center sublegend">Just enter the name of the movie you want and click START button to get it for free</p>
          <div class="inner-form">
            <div class="input-field">
              <button class="btn-search" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
              </button>
              <input name="q" id="q" type="text" placeholder="Movie Name" />
              <input name="jsonResponse" id="jsonResponse" type="hidden" value="" />
            </div>
          </div>
          <div class="suggestion-wrap">
            <button id="searchBtn" type="submit">Start DownLoad</button>
          </div>
        </fieldset>
      </div>
    </form>
  </div>
<?php  if($Re_skinning_Grp_comingsoon == 1 ){ ?>
  <h2 class="latest">Recently added movies</h2>
  <div class="container">
    <div class="result">
      <div class="card-deck">
        <?php
          $str = file_get_contents('https://api.themoviedb.org/3/movie/upcoming?api_key='.$Re_skinning_Grp_ImdbApi);
          $json = json_decode($str, true);
        foreach ($json['results'] as $k => $v) { 
          if ( $v['poster_path'] != null ) { 
            $moviescover = $v['poster_path'];
            $id = $v['id'];
            if(strlen($v['title']) > 20){
              $title = substr($v['title'], 0,20).'...';
            }else{
              $title = $v['title'];
            }
          ?>
            <div id="cardcss" class="card" >
            <a href="movie.php?id=<?php echo $id ?>"><img class="card-img-top img-fluid" src="https://www.themoviedb.org/t/p/w220_and_h330_face<?php echo $moviescover ;?>"></a>
              <div class="card-body">
                <p id="cardtextcss" class="card-text"><?php echo  $title; ?></p>
              </div>
              <a href="movie.php?id=<?php echo $id ?>" id="viewbook" class="btn moviebtn btn-sm"><i class="fas fa-eye"></i> View</a>
            </div>
        <?php  }
        }?>
      </div>    
    </div>
  </div>
<?php } ?>
<?php include_once('inc/re_skinning_footer.php'); ?>

<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->