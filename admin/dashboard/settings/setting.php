<div class="row">
     <div class="col-lg-12">
             <h1 class="page-header"><i class="fa fa-gear fa-fw"></i> <?php echo @LA_LB_SETTING;?></h1>
     </div>
</div>
<ol class="breadcrumb">
  <li><a href="index.php"><?php echo @LA_MN_HOME;?></a></li>
  <li class="active"><?php echo @LA_LB_SETTING;?></li>
</ol>
<div class="button_center">

<?php
if($system_info->system_need_update == 1){
	$software_update = 'btn-warning';
	$software_update_icon = 'fa-spin';
}else{
	$software_update = 'btn-primary';
	$software_update_icon = '';
}
?>
<div class="panel panel-primary">
     <div class="panel-heading">การตั้งค่าการใช้งาน</div>
         <div class="panel-body">
          <a href="?p=setting_slider" class="btn btn-primary btn_main_wd"><i class="fa fa-desktop fa-fw fa-6x"></i><br/><br/>Slid Bar</a>
          <a href="?p=setting_card" class="btn btn-primary btn_main_wd"><i class="fa fa-info-circle fa-fw fa-6x"></i><br/><br/>Card</a>
          <!--a href="?p=test" class="btn btn-primary btn_main_wd"><i class="fa flaticon-bullet1 fa-fw fa-6x"></i><br/><br/>รายการสินค้า</a>
          <a href="?p=member" class="btn btn-primary btn_main_wd"><i class="fa fa-users fa-fw fa-6x"></i><br/><br/>ผู้จำหน่าย</a>
          <a href="?p=setting_type" class="btn btn-primary btn_main_wd"><i class="fa fa-navicon fa-fw fa-6x"></i><br/><br/>ประเภทสินค้า</a>
          <a href="?p=setting_brand" class="btn btn-primary btn_main_wd"><i class="fa fa-cubes fa-fw fa-6x"></i><br/><br/>ยี่ห้อสินค้า</a>
          <a href="?p=setting_model" class="btn btn-primary btn_main_wd"><i class="fa fa-cube fa-fw fa-6x"></i><br/><br/>รุ่นสินค้า</a-->

         </div>

</div>
<div class="panel panel-primary">
     <div class="panel-heading"><?php echo @LA_LB_ABOUT_SYSTEM;?></div>
         <div class="panel-body">
          <a href="?p=setting_system" class="btn btn-primary btn_main_wd"><i class="fa fa-wrench fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_SYSTEM_SETTING;?></a>

               <a href="?p=setting_users" class="btn btn-primary btn_main_wd"><i class="fa fa-user fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_SYSTEM_USER;?></a>
        </div>

</div>
<div class="panel panel-primary">
     <div class="panel-heading"><?php echo @LA_LB_USER_DATA;?></div>
         <div class="panel-body">
               <a href="?p=setting_info" class="btn btn-primary btn_main_wd"><i class="fa flaticon-id fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_USER_DATA;?></a>

         </div>

</div>


<?php

if(@$_SESSION['uclass'] == 3){
?>
<div class="panel panel-danger">
     <div class="panel-heading"><?php echo @LA_LB_ADMINISTRATOR;?></div>
         <div class="panel-body">
               <a href="?p=administrator_cases" class="btn btn-danger btn_main_wd"><i class="fa fa-chain fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_ADMIN_PAGE_LINK;?></a>
               <a href="?p=administrator_menus" class="btn btn-danger btn_main_wd"><i class="fa fa-sitemap fa-fw fa-6x"></i><br/><br/><?php echo @LA_LB_ADMIN_MENU;?></a>
        </div>

</div>
<?php
}
?>
</div>
