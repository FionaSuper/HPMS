
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Partner Doctor      <small>Detail Partner Doctor</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/partner_doctor'); ?>">Partner Doctor</a></li>
      <li class="active">Detail</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >
     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">

               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                    
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Partner Doctor</h3>
                     <h5 class="widget-user-desc">Detail Partner Doctor</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_partner_doctor" id="form_partner_doctor" >
              
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Partner Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->PARTNER_CODE); ?>
                        </div>
                    </div>
					
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->DR_CODE); ?>
                        </div>
                    </div>
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Partner Dr Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->PARTNER_DR_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Loc Code </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->LOC_CODE); ?>
                        </div>
                    </div>
					             
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Term Date </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->TERM_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Creator </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Create Date </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Modifier </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Last Update </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_doctor->LAST_UPDATE); ?>
                        </div>
                    </div>
                                        
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('partner_doctor_update', function($partner_doctor) use ($partner_doctor){?>
						<?php $partner_doctor->LOC_CODE == "" ? $loc_code = "empty_loc" : $loc_code = $partner_doctor->LOC_CODE; ?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit partner_doctor" href="<?= site_url('administrator/partner_doctor/edit/'.$partner_doctor->PARTNER_CODE .'/'.$partner_doctor->DR_CODE.'/'.$partner_doctor->PARTNER_DR_CODE.'/'.$loc_code); ?>"><i class="fa fa-edit" ></i> Edit Partner Doctor</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/partner_doctor/'); ?>"><i class="fa fa-undo" ></i> Go Partner Doctor List</a>
                     </div>
                    
                  </div>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->
