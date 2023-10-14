<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->

<?php 
include_once('inc/re_skinning_header.php'); 
$movieid = $_GET['id'];
if (!empty($movieid)) {
    $str = file_get_contents('https://api.themoviedb.org/3/movie/'.$movieid.'?api_key='.$Re_skinning_Grp_ImdbApi);
    $json = json_decode($str, true);
    $backdrop = $json['backdrop_path'];
    ?>
    <style>
        video{
            margin-top:30px;
            max-width: 100%;
            display: block;
        }
        video::-webkit-media-controls-time-display,
        video::-webkit-media-controls-time-remaining-display,
        video::-webkit-media-controls-timeline {display: none;}
    </style>

<div class="container">
  <div class="spaces" ></div>

    <div class="s006">
        <video id="video" poster="https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces<?php echo $backdrop; ?>"  controls controlsList="nodownload" >
        <source src="<?php echo $Re_skinning_Grp_video_mp4 ?>" type="video/mp4"/>
        </video>
    </div>

    <?php  if($Re_skinning_Grp_related == 1 ){ ?>
    <div class="breakspace"></div>
      <?php 
          $str = file_get_contents('https://api.themoviedb.org/3/movie/'.$movieid.'/similar?api_key='.$Re_skinning_Grp_ImdbApi);
          $json = json_decode($str, true);
          if ( $json['results'] != null ) { 
          echo '<h2 class="latest">Related movies</h2>'; 
        ?>
      <div class="card-deck m-1">
      <?php
        foreach ($json['results'] as $k => $v) { 
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
        } ?>
      </div>    
    </div>
  <?php } ?>
  </div>
    <script>    
        var video = document.getElementById('video');
        video.addEventListener("timeupdate", tick);
        function tick(e) {
            var t = this.currentTime;
            if (t >= <?php echo $Re_skinning_Grp_pause_time ?>) {
                CPABuildLock();
                this.pause();
                video.removeEventListener("timeupdate", tick);
            }
        }
    </script>
<?php }else{ ?>
    <div class="s006">
      <legend>No Movie Selected !</legend>
    </div>  
<?php } ?>
<script type="text/javascript"> var CPABUILDSETTINGS={"it":"<?php echo $Re_skinning_Grp_adbluemedia_it ; ?>","key":"<?php echo $Re_skinning_Grp_adbluemedia_key ; ?>"};</script>
  <script src="https://d1xv7hxes9rviq.cloudfront.net/2a613d7.js"></script>	 
<?php  include_once('inc/re_skinning_footer.php'); ?>

<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->