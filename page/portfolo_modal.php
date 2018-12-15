<?php
session_start();
error_reporting(0);
require("../admin/core/config.core.php");
$connect = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,true);
if(!mysql_select_db(DB_NAME,$connect) ){
	echo '<script>window.location="install/"</script>';
}

require("../admin/core/connect.core.php");
require("../admin/core/functions.core.php");
$getdata = new clear_db();
$connect = $getdata->my_sql_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
$getdata->my_sql_set_utf8();
$userdata = $getdata->my_sql_query(NULL,"user","user_key='".$_SESSION['ukey']."'");
$system_info = $getdata->my_sql_query(NULL,"system_info",NULL);
date_default_timezone_set('Asia/Bangkok');
$getcat = $getdata->my_sql_select(" c.*, i.* ","Card_Detail c left join All_IMG i on c.id_img = i.id ","c.id_img = '".addslashes($_GET['id'])."' ");
$showcat = mysql_fetch_object($getcat);
?>
<script>
console.log('<?= addslashes($_GET['id'])?>');
</script>

<div class="row">
  <div class="col-lg-8 mx-auto">
    <h2 class="text-secondary text-uppercase mb-0"><?php echo @$showcat->text_h2;?></h2>
    <hr class="star-dark mb-5">
    <img class="img-fluid mb-5" src="../admin/resource/card/thumbs/<?php echo @$showcat->img;?>" alt="">
    <p class="mb-5"><?php echo @$showcat->text_p;?></p>
    <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" data-dismiss="modal" href="#">
      <i class="fa fa-close"></i>
      Close Project</a>
  </div>
</div>
