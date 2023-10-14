<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->

<?php
    $movieid = $_GET['id'];
    include_once('inc/re_skinning_header.php');
    if (!empty($movieid)) {
    $str = file_get_contents('https://api.themoviedb.org/3/movie/'.$movieid.'?api_key='.$Re_skinning_Grp_ImdbApi);
    $json = json_decode($str, true);
    $title = $json['title'];
    $moviescover = 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2'.$json['poster_path'];
    $description = $json['overview'];   
    $backdrop = $json['backdrop_path'];
?>
<style>
    .backdrop {
    background-image: url();
    -webkit-mask-image:-webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,0.3)), to(rgba(0,0,0,0)));
    mask-image: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0));
    position: absolute;
    max-width:100%;
    }
</style>
<img class="backdrop" src="https://www.themoviedb.org/t/p/w1920_and_h800_multi_faces<?php echo $backdrop; ?>" />
<div class="container">
  <div class="spaces" ></div>
    <article class="mt-4 tmdbreskin">
        <div class="row">
            <div class="col-md-6">
                <div class="tmdbimgholder">
                <img src="<?php echo $moviescover; ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="tmdbtitle">Watch <?php echo $title; ?> Online</h3>
                <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
                <span class="avlbl">Avalaible Now</span> 
                <span class="avlblfree mobile"> [ FREE ] </span>
                <div class="tmdbdescript">
                    <div class="langselect">
                    <b class="mobile">Select your </b>Language : 
                    <a id="BTNUS"> <img src="imgs/flags/US.png" /> </a>
                    <a id="BTNES"> <img src="imgs/flags/ES.png" /> </a>
                    <a id="BTNIT"> <img src="imgs/flags/IT.png" /> </a>
                    <a id="BTNFR"> <img src="imgs/flags/FR.png" /> </a>
                    <a id="BTNDE"> <img src="imgs/flags/DE.png" /> </a>
                    </div>
                    <?php
                    $desc = file_get_contents('https://api.themoviedb.org/3/movie/'.$movieid.'/translations?api_key='.$Re_skinning_Grp_ImdbApi);
                    $jsondesc = json_decode($desc, true);
                    foreach ($jsondesc['translations'] as $k => $v) { 
                        if(strlen($v['data']['overview']) > 240){
                            $descr = substr($v['data']['overview'], 0,240).'...';
                        }else{
                            $descr = $v['data']['overview'];
                        }
                        echo '<p class="disp tmdbdescript" style="display:none;" id="'.$v['iso_3166_1'].'">'.$descr.'<p>';
                    }
                    ?>
                </div>
                <a href="dow.php?id=<?php echo $movieid ?>" class="btn btn-outline-light mt-3 waves-effect btn-lg z-depth-0 btn-block">
                    <i class="fas fa-play"></i> Watch movie online <b class="langflag"> - EN </b>
                </a>     
                <button type="button" class="btn btn-dark video-btn btn-lg mt-3 btn-block" data-toggle="modal"  data-target="#myModal">
                    <i class="fas fa-eye"></i> Watch Movie trailer 
                </button>
                <h2 class="downlinks">Download Links <b class="langflag"> - EN </b> Language</h2>
                <div class="row">
                <div class="col-md-6">
                    <a onclick="_gD()" class="btn btndown btn-lg btn-block mb-3 mt-3"><i class="fas fa-download"></i> SD Quality <b class="langflag"> - EN </b></a>
                    <a onclick="_gD()" class="btn btndown btn-lg btn-block mb-3"><i class="fas fa-download"></i> HQ Quality <b class="langflag"> - EN </b></a>
                    <a onclick="_gD()" class="btn btndown btn-lg btn-block"><i class="fas fa-download"></i> HD Quality <b class="langflag"> - EN </b></a>
                </div>
                <div class="col-md-6">
                    <a onclick="_gD()" class="btn btndown btn-lg btn-block mb-3 mt-3"><i class="fas fa-download"></i> HD Quality <b class="langflag"> - EN </b></a>
                    <a onclick="_gD()" class="btn btndown btn-lg btn-block mb-3"><i class="fas fa-download"></i> 4K Quality <b class="langflag"> - EN </b></a>
                    <a onclick="_gD()" class="btn btndown btn-lg btn-block mb-3"><i class="fas fa-download"></i> 8K Quality <b class="langflag"> - EN </b></a>
                </div>
                </div>      
            </div>
        </div>
    </article>
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
    <div class="spaces" ></div>
    <?php
        $str = file_get_contents('https://api.themoviedb.org/3/movie/'.$movieid.'/videos?api_key='.$Re_skinning_Grp_ImdbApi);
        $json = json_decode($str, true);
    ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $json['results']['0']['key'];?>" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
            </div>
            </div>
        </div>
        </div>
    </div>
  <?php }else{ ?>
    <div class="s006">
      <legend>No Movie Selected !</legend>
    </div>  
  <?php } ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript"> var CPABUILDSETTINGS={"it":"<?php echo $Re_skinning_Grp_adbluemedia_it ; ?>","key":"<?php echo $Re_skinning_Grp_adbluemedia_key ; ?>"};</script>
  <script src="https://d1xv7hxes9rviq.cloudfront.net/2a613d7.js"></script>	  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
        $("#US").show();
        $("#BTNUS").click(function(){
            $(".disp").hide();
            $("#US").show();
            $("b.langflag").html(" - EN");
        });
        $("#BTNFR").click(function(){
            $(".disp").hide();
            $("#FR").show();
            $("b.langflag").html(" - FR");
        });
        $("#BTNES").click(function(){
            $(".disp").hide();
            $("#ES").show();
            $("b.langflag").html(" - ES");
        });
        $("#BTNIT").click(function(){
            $(".disp").hide();
            $("#IT").show();
            $("b.langflag").html(" - IT");
        });
        $("#BTNDE").click(function(){
            $(".disp").hide();
            $("#DE").show();
            $("b.langflag").html(" - DE");
        });
        $("#BTNRU").click(function(){
            $(".disp").hide();
            $("#RU").show();
            $("b.langflag").html(" - RU");
        });
    });
    document.onkeydown = function(e) {
        if(event.keyCode == 123) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }
    </script>
</body>
</html>

<!-- ================================================================= -->
<!-- ================================================================= -->
<!-- ============ By Mohammed Cha 2023 : Re-skinning GRP ============= -->
<!-- ================================================================= -->
<!-- ================================================================= -->