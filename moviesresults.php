<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->

<?php
  $moviequery = urlencode($_POST['q']);
  include_once('inc/re_skinning_header.php'); 
  if (!empty($moviequery)) {
  $str = file_get_contents('https://api.themoviedb.org/3/search/movie?api_key='.$Re_skinning_Grp_ImdbApi.'&query='.$moviequery);
  $json = json_decode($str, true);
?>
<div class="container">
  <div class="spaces" ></div>
  <div class="result">
    <div class="card-deck">
      <?php if ($json['results'] != null) {
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
          <?php }
        }
      }else{ ?>
        <div class="s006">
          <legend>No Movies Found !</legend>
        </div>  
      <?php } ?>
    </div>    
  </div>
</div>
<?php 
  }else{ ?>
    <div class="s006">
      <legend>Can you enter a movie name please !</legend>
    </div>  
  <?php
  }
include_once('inc/re_skinning_footer.php'); ?>

<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->