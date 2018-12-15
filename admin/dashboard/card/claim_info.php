<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-desktop fa-fw"></i> ตรวจการเคลม</h1>
     </div>        
</div>
<ol class="breadcrumb">
<li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active">ตรวจการเคลม</li>
</ol>
<?php

if(isset($_POST['save_new_status'])){
	$getdata->my_sql_update("card_info","card_status='".htmlentities($_POST['card_status'])."'","card_key='".htmlentities($_POST['card_key'])."'");
	$cstatus_key=md5(htmlentities($_POST['card_status']).time("now"));
	$getdata->my_sql_insert("card_status","cstatus_key='".$cstatus_key."',card_key='".htmlentities($_POST['card_key'])."',card_status='".htmlentities($_POST['card_status'])."',card_status_note='".htmlentities($_POST['card_status_note'])."',user_key='".$userdata->user_key."'");
	$alert = '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>บันทึกข้อมูลสถานะ สำเร็จ</div>';
}
?>
<!-- Modal Edit -->
<div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <form method="post" enctype="multipart/form-data" name="form2" id="form2">
     
     <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo @LA_BTN_CLOSE;?></span></button>
                    <h4 class="modal-title" id="memberModalLabel">เปลี่ยนสถานะ</h4>
                </div>
                <div class="ct">
              
                </div>
            </div>
        </div>
  </form>
</div>


   <?php
   echo @$alert;?>
     
 <nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-search"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <form class="navbar-form navbar-left" role="search" method="get">
        <div class="form-group">
        <input type="hidden" name="p" id="p" value="claim_info" >
        <input type="text" class="form-control" name="q" placeholder="ระบุชื่อ/รหัสสินค้า/รายละเอียดชั้นวาง เพื่อค้นหา" value="<?php echo @htmlentities($_GET['q']);?>" size="100">
        </div>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i> <?php echo @LA_BTN_SEARCH;?></button>
      </form>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?
 if(htmlentities($_GET['q']) != ""){
  $getcard = $getdata->my_sql_selectJoin(NULL,"reserve","product s on p.ProductID = s.ProductID ","p.reserveId = ".htmlentities($_GET['q']));
  $showcard = mysql_fetch_object($getcard);
  ?>

<div class="panel panel-primary" style="margin: auto; width: 90%;">
  <div class="panel-heading">
    <div style="margin: auto; width: 90%;">

        <div class="form-group">
          <div class="col-md-6">
              <label for="edit_shelf_color">เลขที่ใบเสร็จ</label>
              <input type="text" name="edit_shelf_color" id="edit_shelf_color" class="form-control" value="<?php echo @$showcard->reserveId;?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-4">
                <label for="edit_shelf_color">วันที่ใบเสร็จ</label>
                <input type="text" name="edit_shelf_color" id="edit_shelf_color" class="form-control" value="<?php echo @$showcard->reserveDate;?>" readonly>
            </div>
        </div>

         <div class="form-group">
          <div class="col-md-4">
              <label for="edit_shelf_color">รหัสสินค้า</label>
              <input type="text" name="edit_shelf_color" id="edit_shelf_color" class="form-control" value="<?php echo @$showcard->ProductID;?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-5">
              <label for="edit_shelf_color">ชื่อสินค้า</label>
              <input type="text" name="edit_shelf_color" id="edit_shelf_color" class="form-control" value="<?php echo @$showcard->ProductName;?>" readonly>
          </div>
        </div>

    </div>
  </div>
</div>

  <?
}
   
?>


 

</div>
<script language="javascript">
$('#edit_status').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'key=' + recipient;

            $.ajax({
                type: "GET",
                url: "card/edit_status.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })

function deleteCard(cardkey){
	if(confirm('คุณต้องการลบใบสั่งซ่อม/เคลมนี้ใช่หรือไม่ ?')){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById(cardkey).innerHTML = '';
  		}
	}
	xmlhttp.open("GET","function.php?type=delete_card&key="+cardkey,true);
	xmlhttp.send();
	}
}
function hideCard(cardkey){
	if(confirm('คุณต้องการซ่อนใบสั่งซ่อม/เคลมนี้ใช่หรือไม่ ?')){
	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	 	xmlhttp=new XMLHttpRequest();
	}else{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
  		if (xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById(cardkey).innerHTML = '';
  		}
	}
	xmlhttp.open("GET","function.php?type=hide_card&key="+cardkey,true);
	xmlhttp.send();
	}
}
</script>