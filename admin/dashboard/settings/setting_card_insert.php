
<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-info-circle fa-fw"></i> แก้ไข Card Info  </h1>
     </div>
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
   <li><a href="?p=setting"><?php echo @LA_LB_SETTING;?></a></li>
   <li><a href="?p=setting_slider">จัดการ Card Info</a></li>
  <li class="active">แก้ไข Card Info</li>
</ol>
<?php
$x=0;
$getcat = $getdata->my_sql_select(" i.*, d.* "," All_IMG i left join Card_Detail d on i.id = d.id_img "," i.id = '".addslashes($_GET['id'])."' and i.img_type = 'card' ");
$showcat = mysql_fetch_object($getcat);
?>

 <?php
 if(isset($_POST['save_bar'])){
		if (!defined('UPLOADDIR2')) define('UPLOADDIR2','../resource/card/images/');
				if (is_uploaded_file($_FILES["slid_img"]["tmp_name"])) {

        $File_name2 = $_FILES["slid_img"]["name"];
				$File_tmpname2 = $_FILES["slid_img"]["tmp_name"];
				$File_ext2 = pathinfo($File_name2, PATHINFO_EXTENSION);
				$newfilename2 = 'card'.$showcat->img_num.'.' .$File_ext2;

        if($File_name2 != NULL){
          $Getunlink = deleteFile($showcat->img,$showcat->img_type);
          if (move_uploaded_file($File_tmpname2, (UPLOADDIR2.$newfilename2)));
          if($Getunlink){
            resizeCardThumb($File_ext2,$newfilename2);
          }
          $getdata->my_sql_update(" All_IMG ",
          " img='".$newfilename2."' "
          ," id = '".htmlentities($_POST['img_id'])."' ");
        }

}

$getdata->my_sql_update(" Card_Detail ",
" text_h2='".addslashes($_REQUEST['text_h2'])."'
, text_p='".addslashes($_REQUEST['text_p'])."'  "
," id_img = '".addslashes($_GET['id'])."' ");

if(addslashes($_POST['slid_detail']) != NULL){
  $getdata->my_sql_update("All_IMG","img_detail = '".addslashes($_REQUEST['slid_detail'])."', img_link = '".addslashes($_REQUEST['slid_link'])."' ","id = '".addslashes($_POST['img_id'])."' ");
  echo "<script>window.location=\"../dashboard?p=setting_card\"</script>";
}

	/*if($File_name2 != NULL){
		resizeBeanerThumb($File_ext2,$newfilename2);
		 $getdata->my_sql_insert("All_IMG",
     "img_detail='".htmlentities($_POST['slid_detail'])."'
     ,img_status='".htmlentities($_POST['shelf_status'])."'
     ,img='".$newfilename2."'
     ,img_type='beaner'
     ,img_link='' ");
  }*/

	$_SESSION['lang'] = addslashes($_REQUEST['mlanguage']);
	 $alert = '<div class="alert alert-block alert-success fade in"><button data-dismiss="alert" class="close" type="button">×</button>'.LA_ALERT_EDIT_DATA_INFO_DONE.'</div>';
 }



 echo @$alert;
 ?>
 <style>
	body{
		<?php echo @$userdata->font_size_text;?>
	}
  .box_img{
    height: 100px;
    overflow: hidden;
    position: relative;
  }
	</style>
 <ul class="nav nav-tabs">
                                <li class="active"><a href="#info_data" data-toggle="tab">จัด slid bar</a>
                                </li>
                                <!--li><a href="#password_change" data-toggle="tab"><--?php echo @LA_LB_PASSWORD_CHANGE;?></a-->
                                </li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="info_data">
                                <br/>
                                  <form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <div class="panel panel-primary">

                        <div class="panel-body">
                          <div class="form-group">
                            <label for="shelf_detail">รายละเอียด : <?php echo @$showcat->img;?></label>
                            <input type="hidden" name="img_id" id="img_id" class="form-control" value="<?php echo @$showcat->id;?>">
                            <input type="text" name="slid_detail" id="slid_detail" class="form-control" value="<?php echo @$showcat->img_detail;?>" autofocus>
                          </div>

                          <div class="form-group row">
                             <div class="col-xs-3"><center><div class="box_img"><img src="../resource/card/thumbs/<?php echo @$showcat->img;?>" <?php echo getPhotoSize('../resource/card/thumbs/'.@$showcat->img.'');?> id="img_cyclex"  alt=""/></div></center></div>
                             <div class="col-xs-9">
                               <label for="slid_img"><?php echo @LA_LB_PHOTO;?></label>
                               <input type="file" accept="image/x-png,image/gpg,image/jpeg" name="slid_img" id="slid_img" class="form-control">
                             </div>
                           </div>

                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="shelf_color">link</label>
                              <input type="text" name="slid_link" id="slid_link" class="form-control" value="<?php echo @$showcat->img_link;?>">
                            </div>
                          </div>

                            <hr>
                            <div class="form-group row">
                              <div class="col-md-9">
                                <label for="text_h2">ข้อความหัวข้อใหญ่ :</label>
                                <textarea type="text" name="text_h2" id="text_h2" class="form-control" ><?php echo @$showcat->text_h2;?></textarea>
                              </div>
                          </div>

                            <div class="form-group row">
                              <div class="col-md-9">
                                <label for="text_p">ข้อความรายละเอียด :</label>
                                <textarea type="text" name="text_p" id="text_p" class="form-control" ><?php echo @$showcat->text_p;?></textarea>
                              </div>
                                </div>


                        </div>
                        <div class="panel-footer">
                          <button type="submit" name="save_bar" class="btn btn-primary"><i class="fa fa-save fa-fw"></i> <?php echo @LA_BTN_SAVE;?></button>
                        </div>
  </div>
</form>
                                </div>


                            </div>
