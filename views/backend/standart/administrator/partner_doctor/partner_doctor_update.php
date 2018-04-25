
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Partner Doctor        <small>Edit Partner Doctor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/partner_doctor'); ?>">Partner Doctor</a></li>
        <li class="active">Edit</li>
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
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Partner Doctor</h3>
                            <h5 class="widget-user-desc">Edit Partner Doctor</h5>
                            <hr>
                        </div>
						<?php $partner_doctor->LOC_CODE == "" ? $loc_code = "empty_loc" : $loc_code = $partner_doctor->LOC_CODE; ?>
                        <?= form_open(base_url('administrator/partner_doctor/edit_save/'.$partner_doctor->PARTNER_CODE .'/'.$partner_doctor->DR_CODE.'/'.$partner_doctor->PARTNER_DR_CODE.'/'.$loc_code), [
                            'name'    => 'form_partner_doctor', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_partner_doctor', 
                            'method'  => 'POST'
                            ]); ?>
                         
                        <div class="form-group">
						   <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="DR_CODE" id="DR_CODE"  value="<?= set_value('DR_CODE', $partner_doctor->DR_CODE); ?>" readonly>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
                         
						<div class="form-group">
						   <label for="PARTNER_CODE" class="col-sm-2 control-label">Partner Code 
						   </label>
						   <div class="col-sm-8 cust-required-select">
							  <input type="text" class="form-control" name="PARTNER_CODE" id="PARTNER_CODE"  value="<?= set_value('PARTNER_CODE', $partner_doctor->PARTNER_CODE); ?>" readonly>
								<small class="info help-block">
								 </small>
						   </div>
						</div>
						
						<div class="form-group ">
							  <label for="PARTNER_DR_CODE" class="col-sm-2 control-label">Partner Dr Code 
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE"  value="<?= set_value('PARTNER_DR_CODE', $partner_doctor->PARTNER_DR_CODE); ?>" readonly>
								 <small class="info help-block"></small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="LOC_CODE" class="col-sm-2 control-label">Loc Code 
							  </label>
							  <div class="col-sm-8">
								 <input type="text" class="form-control" name="LOC_CODE" id="LOC_CODE"  value="<?= set_value('LOC_CODE', $partner_doctor->LOC_CODE); ?>" readonly>
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							<label for="TERM_DATE" class="col-sm-2 control-label">Term Date								
							</label>
							<div class="col-sm-8">
								<input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('LOC_CODE', $partner_doctor->TERM_DATE); ?>">
								<small class="info help-block">　</small>
							</div>
						</div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save">
                            <i class="fa fa-save" ></i> Save
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go to The List
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel">
                            <i class="fa fa-undo" ></i> Cancel
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i>Loading, Saving data</i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>


    $(document).ready(function(){
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/partner_doctor';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_partner_doctor = $('#form_partner_doctor');
        var data_post = form_partner_doctor.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_partner_doctor.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#partner_doctor_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
           
    
    }); /*end doc ready*/
</script>