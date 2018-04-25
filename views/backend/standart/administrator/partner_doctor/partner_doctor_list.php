
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Partner Doctor<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Partner Doctor</li>
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
                     <div class="row pull-right">
                        <?php is_allowed('partner_doctor_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Partner Doctor" href="<?=  site_url('administrator/partner_doctor/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Partner Doctor</a>
                        <?php }) ?>
                        <?php is_allowed('partner_doctor_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Partner Doctor" href="<?= site_url('administrator/partner_doctor/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('partner_doctor_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Partner Doctor" href="<?= site_url('administrator/partner_doctor/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Partner Doctor</h3>
                     <h5 class="widget-user-desc">List All Partner Doctor <i class="label bg-yellow"><?= $partner_doctor_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_partner_doctor" id="form_partner_doctor" action="<?= base_url('administrator/partner_doctor/index'); ?>">
                  
				  
				  <div class="row">
                  <div class="col-md-8">

                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'PARTNER_CODE' ? 'selected' :''; ?> value="PARTNER_CODE">Partner Code</option>
                           <option <?= $this->input->get('f') == 'DR_CODE' ? 'selected' :''; ?> value="DR_CODE">Dr Code</option>
                           <option <?= $this->input->get('f') == 'PARTNER_DR_CODE' ? 'selected' :''; ?> value="PARTNER_DR_CODE">Partner Dr Code</option>
                           <option <?= $this->input->get('f') == 'LOC_CODE' ? 'selected' :''; ?> value="LOC_CODE">Loc Code</option>
                          </select>
                     </div>
					  <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/partner_doctor');?>" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                  </form>                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                     </div>
                  </div>
               </div>

                  <div class="table-responsive"> 
                  <table class="table table-bordered dataTable">
                     <thead>
                        <tr class="">

                           <th>Partner Code</th>
                           <th>Dr Code</th>
                           <th>Partner Dr Code</th>
                           <th>Loc Code</th>
                           <th>Term Date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_doctor">
                     <?php foreach($partner_doctors as $partner_doctor): ?>
						<?php $partner_doctor->LOC_CODE == "" ? $loc_code = "empty_loc" : $loc_code = $partner_doctor->LOC_CODE; ?>
                        <tr data-href='<?= site_url('administrator/partner_doctor/view/' . $partner_doctor->PARTNER_CODE .'/'.$partner_doctor->DR_CODE.'/'.$partner_doctor->PARTNER_DR_CODE.'/'.$loc_code); ?>'>

                           <td class="clickable-row"><?= _ent($partner_doctor->PARTNER_CODE); ?></td> 
                           <td class="clickable-row"><?= _ent($partner_doctor->DR_CODE); ?></td> 
                           <td class="clickable-row"><?= _ent($partner_doctor->PARTNER_DR_CODE); ?></td> 
                           <td class="clickable-row"><?= _ent($partner_doctor->LOC_CODE); ?></td> 
                           <td class="clickable-row"><?= _ent($partner_doctor->TERM_DATE); ?></td> 
						   
                           <td width="200">
                              <?php is_allowed('partner_doctor_view', function($partner_doctor) use ($partner_doctor){?>
                              <?php $partner_doctor->LOC_CODE == "" ? $loc_code = "empty_loc" : $loc_code = $partner_doctor->LOC_CODE; ?>
							  <a href="<?= site_url('administrator/partner_doctor/view/'.$partner_doctor->PARTNER_CODE .'/'.$partner_doctor->DR_CODE.'/'.$partner_doctor->PARTNER_DR_CODE.'/'.$loc_code); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('partner_doctor_update', function($partner_doctor) use ($partner_doctor){?>
                              <?php $partner_doctor->LOC_CODE == "" ? $loc_code = "empty_loc" : $loc_code = $partner_doctor->LOC_CODE; ?>
							  <a href="<?= site_url('administrator/partner_doctor/edit/'.$partner_doctor->PARTNER_CODE .'/'.$partner_doctor->DR_CODE.'/'.$partner_doctor->PARTNER_DR_CODE.'/'.$loc_code); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('partner_doctor_delete', function($partner_doctor) use ($partner_doctor){?>
                              <?php $partner_doctor->LOC_CODE == "" ? $loc_code = "empty_loc" : $loc_code = $partner_doctor->LOC_CODE; ?>
							  <a href="javascript:void(0);" data-href="<?= site_url('administrator/partner_doctor/delete/'.$partner_doctor->PARTNER_CODE .'/'.$partner_doctor->DR_CODE.'/'.$partner_doctor->PARTNER_DR_CODE.'/'.$loc_code); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($partner_doctor_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Partner Doctor data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
</section>
<!-- /.content -->

<!-- Page script -->
<style type="text/css">
table thead{
	background-color:#00cec9
}

table tbody tr:hover{
	background:#dfe6e9!important
}

tbody tr:nth-child(odd){
	background-color:#f3f6f7
}
</style>
<script>
  $(document).ready(function(){
	  
	$('.clickable-row').on('click',function(){
		window.location = $(this).parent().data('href');
	});
   
    $('.remove-data').click(function(){

      var url = $(this).attr('data-href');

      swal({
          title: "Are you sure?",
          text: "data to be deleted can not be restored!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: true,
          closeOnCancel: true
        },
        function(isConfirm){
          if (isConfirm) {
            document.location.href = url;            
          }
        });

      return false;
    });


    $('#apply').click(function(){

      var bulk = $('#bulk');
      var serialize_bulk = $('#form_partner_doctor').serialize();

      if (bulk.val() == 'delete') {
         swal({
            title: "Are you sure?",
            text: "data to be deleted can not be restored!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
               document.location.href = BASE_URL + '/administrator/partner_doctor/delete?' + serialize_bulk;      
            }
          });

        return false;

      } else if(bulk.val() == '')  {
          swal({
            title: "Upss",
            text: "Please choose bulk action first!",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Okay!",
            closeOnConfirm: true,
            closeOnCancel: true
          });

        return false;
      }

      return false;

    });/*end appliy click*/


    //check all
    var checkAll = $('#check_all');
    var checkboxes = $('input.check');

    checkAll.on('ifChecked ifUnchecked', function(event) {   
        if (event.type == 'ifChecked') {
            checkboxes.iCheck('check');
        } else {
            checkboxes.iCheck('uncheck');
        }
    });

    checkboxes.on('ifChanged', function(event){
        if(checkboxes.filter(':checked').length == checkboxes.length) {
            checkAll.prop('checked', 'checked');
        } else {
            checkAll.removeProp('checked');
        }
        checkAll.iCheck('update');
    });

  }); /*end doc ready*/
</script>