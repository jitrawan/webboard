<?php
session_start();
error_reporting(0);
?>
<style>
#slider {
  position: relative;
  width: 100%;
  overflow: hidden;
}

#slider.show , #sliderCard.show {
  animation-name: slideLoaded;
  animation-duration: 1s;
}

@keyframes slideLoaded {
  from {
    opacity: 0
  }
  to {
    opacity: 1
  }
}

#slider .owl-item {
  -webkit-animation-duration: 1.5s;
  -moz-animation-duration: 1.5s;
  animation-duration: 1.5s;
}

#slider .owl-carousel {
  margin: 0;
}

#slider img {
  width: 100%;
  min-height: 150px;
  max-height: 370px;
}

#sliderCard .container {
  padding: 2.2rem;
}


  .carousel-indicators .active {
      width: 12px;
      height: 12px;
      margin: 0;
      background-color: #337AB7;
  }
  .carousel-indicators li {
      display: inline-block;
      width: 10px;
      text-indent: -999px;
      cursor: pointer;
      background-color: #8dbce4;
      border-radius: 10px;
    }


  </style>
  <?php
  if($_SESSION['uname']==NULL || $_SESSION['uclass'] == 1){
  	echo '<script>window.location="../"</script>';
  }

  ?>


<div class="testcontainer">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
      <ol class="carousel-indicators">
    <?php
    $x=0;
    $getcat = $getdata->my_sql_select(NULL,"All_IMG","img_status = '1' and img_type = 'beaner' order by img_num ");
    while($showcat = mysql_fetch_object($getcat)){
        if(@$showcat->img_num == 1){
          ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo @$x;?>" class="active"></li>
          <?
        }else{
        ?>
         <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo @$x;?>"></li>

        <?
        }
      $x++;
        }
    ?>
</ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php
      $y=0;
      $getimg = $getdata->my_sql_select(" i.*, d.* ","All_IMG i left join All_IMG_Detail d on i.id = d.id_img ","i.img_type = 'beaner' order by i.img_num ");
      while($showimg = mysql_fetch_object($getimg)){
        if(@$showimg->img_num == 1){
          ?>
          <div class="carousel-item active">
            <img src="../admin/resource/beaner/thumbs/<?php echo @$showimg->img;?>" alt="Chicago"/>
            <div class="carousel-caption d-none d-md-block">
              <h2 style="color: <?php echo @$showimg->img_h2_color;?>;"><?php echo @$showimg->img_h2;?></h2>
              <p style="color: <?php echo @$showimg->img_p_color;?>;"><?php echo @$showimg->img_p;?></p>
            </div>
          </div>
          <?
        }else{
        ?>
        <div class="carousel-item">
          <img src="../admin/resource/beaner/thumbs/<?php echo @$showimg->img;?>" alt="Chicago">
          <div class="carousel-caption d-none d-md-block">
            <h2 style="color: <?php echo @$showimg->img_h2_color;?>;"><?php echo @$showimg->img_h2;?></h2>
            <p style="color: <?php echo @$showimg->img_p_color;?>;"><?php echo @$showimg->img_p;?></p>
          </div>
        </div>

        <?
        }
      $y++;
        }
    ?>

    </div>

  </div>
</div>
