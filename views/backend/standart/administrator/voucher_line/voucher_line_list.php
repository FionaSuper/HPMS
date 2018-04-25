
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Voucher_line/add';
       return false;
   });

   $('*').bind('keydown', 'Ctrl+f', function assets() {
       $('#sbtn').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
       $('#reset').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+b', function assets() {

       $('#reset').trigger('click');
       return false;
   });
}

jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Voucher Line<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Voucher Line</li>
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
                        <?php is_allowed('voucher_line_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Voucher Line (Ctrl+a)" href="<?=  site_url('administrator/voucher_line/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Voucher Line</a>
                        <?php }) ?>
                        <?php is_allowed('voucher_line_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Voucher Line" href="<?= site_url('administrator/voucher_line/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('voucher_line_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Voucher Line" href="<?= site_url('administrator/voucher_line/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Voucher Line</h3>
                     <h5 class="widget-user-desc">List All Voucher Line <i class="label bg-yellow"><?= $voucher_line_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_voucher_line" id="form_voucher_line" action="<?= base_url('administrator/voucher_line/index'); ?>">
                  

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>
                            <input type="checkbox" class="flat-red toltip" id="check_all" name="check_all" title="check all">
                           </th>
                           <th>BATCH NO</th>
                           <th>BATCH DATE</th>
                           <th>PARTNER CODE</th>
                           <th>VOUCHER NO</th>
                           <th>CLASS CODE</th>
                           <th>TREATMENT DATE</th>
                           <th>DR CODE</th>
                           <th>COMPANY DR CODE</th>
                           <th>DR E NAME</th>
                           <th>DR C NAME</th>
                           <th>MEMBER CODE</th>
                           <th>MEMBER CLASS</th>
                           <th>MEMBER HKID</th>
                           <th>MEMBER E NAME</th>
                           <th>MEMBER C NAME</th>
                           <th>MEMBER STAFF NO</th>
                           <th>DEPD NAME</th>
                           <th>DEPD CODE</th>
                           <th>SICK LEAVE</th>
                           <th>SL FROM</th>
                           <th>SL TO</th>
                           <th>POLICY NO</th>
                           <th>INSURED NO</th>
                           <th>POLICY YEAR</th>
                           <th>DP TYPE</th>
                           <th>DIAG CODE1</th>
                           <th>DIAG CODE2</th>
                           <th>DIAG CODE3</th>
                           <th>DIAG CODE4</th>
                           <th>TYPE</th>
                           <th>REFERRAL DR</th>
                           <th>REFERRAL TYPE</th>
                           <th>CO PAY</th>
                           <th>EXTRA MED BOL</th>
                           <th>EXTRA MED</th>
                           <th>EXTRA MED REMARK</th>
                           <th>LAB XRAY BOL</th>
                           <th>LAB XRAY</th>
                           <th>LAB XRAY CODE</th>
                           <th>SURGICAL BOL</th>
                           <th>SURGICAL</th>
                           <th>SURGICAL CODE</th>
                           <th>APPROVAL CODE</th>
                           <th>FEE AMT</th>
                           <th>OS AMT</th>
                           <th>PAY AMT</th>
                           <th>DR CODE DE</th>
                           <th>FEE AMT DE</th>
                           <th>PAY AMT DE</th>
                           <th>STATUS</th>
                           <th>ENTRY TIME DE</th>
                           <th>LAST MODIFIER VE</th>
                           <th>LAST MODIFIER DE</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_voucher_line">
                     <?php foreach($voucher_lines as $voucher_line): ?>
                        <tr>
                           <td width="5">
                              <input type="checkbox" class="flat-red check" name="id[]" value="<?= $voucher_line->VOUCHER_NO; ?>">
                           </td>
                           
                           <td><?= _ent($voucher_line->BATCH_NO); ?></td> 
                           <td><?= _ent($voucher_line->BATCH_DATE); ?></td> 
                           <td><?= _ent($voucher_line->PARTNER_CODE); ?></td> 
                           <td><?= _ent($voucher_line->VOUCHER_NO); ?></td> 
                           <td><?= _ent($voucher_line->CLASS_CODE); ?></td> 
                           <td><?= _ent($voucher_line->TREATMENT_DATE); ?></td> 
                           <td><?= _ent($voucher_line->DR_CODE); ?></td> 
                           <td><?= _ent($voucher_line->COMPANY_DR_CODE); ?></td> 
                           <td><?= _ent($voucher_line->DR_E_NAME); ?></td> 
                           <td><?= _ent($voucher_line->DR_C_NAME); ?></td> 
                           <td><?= _ent($voucher_line->MEMBER_CODE); ?></td> 
                           <td><?= _ent($voucher_line->MEMBER_CLASS); ?></td> 
                           <td><?= _ent($voucher_line->MEMBER_HKID); ?></td> 
                           <td><?= _ent($voucher_line->MEMBER_E_NAME); ?></td> 
                           <td><?= _ent($voucher_line->MEMBER_C_NAME); ?></td> 
                           <td><?= _ent($voucher_line->MEMBER_STAFF_NO); ?></td> 
                           <td><?= _ent($voucher_line->DEPD_NAME); ?></td> 
                           <td><?= _ent($voucher_line->DEPD_CODE); ?></td> 
                           <td><?= _ent($voucher_line->SICK_LEAVE); ?></td> 
                           <td><?= _ent($voucher_line->SL_FROM); ?></td> 
                           <td><?= _ent($voucher_line->SL_TO); ?></td> 
                           <td><?= _ent($voucher_line->POLICY_NO); ?></td> 
                           <td><?= _ent($voucher_line->INSURED_NO); ?></td> 
                           <td><?= _ent($voucher_line->POLICY_YEAR); ?></td> 
                           <td><?= _ent($voucher_line->DP_TYPE); ?></td> 
                           <td><?= _ent($voucher_line->DIAG_CODE1); ?></td> 
                           <td><?= _ent($voucher_line->DIAG_CODE2); ?></td> 
                           <td><?= _ent($voucher_line->DIAG_CODE3); ?></td> 
                           <td><?= _ent($voucher_line->DIAG_CODE4); ?></td> 
                           <td><?= _ent($voucher_line->TYPE); ?></td> 
                           <td><?= _ent($voucher_line->REFERRAL_DR); ?></td> 
                           <td><?= _ent($voucher_line->REFERRAL_TYPE); ?></td> 
                           <td><?= _ent($voucher_line->CO_PAY); ?></td> 
                           <td><?= _ent($voucher_line->EXTRA_MED_BOL); ?></td> 
                           <td><?= _ent($voucher_line->EXTRA_MED); ?></td> 
                           <td><?= _ent($voucher_line->EXTRA_MED_REMARK); ?></td> 
                           <td><?= _ent($voucher_line->LAB_XRAY_BOL); ?></td> 
                           <td><?= _ent($voucher_line->LAB_XRAY); ?></td> 
                           <td><?= _ent($voucher_line->LAB_XRAY_CODE); ?></td> 
                           <td><?= _ent($voucher_line->SURGICAL_BOL); ?></td> 
                           <td><?= _ent($voucher_line->SURGICAL); ?></td> 
                           <td><?= _ent($voucher_line->SURGICAL_CODE); ?></td> 
                           <td><?= _ent($voucher_line->APPROVAL_CODE); ?></td> 
                           <td><?= _ent($voucher_line->FEE_AMT); ?></td> 
                           <td><?= _ent($voucher_line->OS_AMT); ?></td> 
                           <td><?= _ent($voucher_line->PAY_AMT); ?></td> 
                           <td><?= _ent($voucher_line->DR_CODE_DE); ?></td> 
                           <td><?= _ent($voucher_line->FEE_AMT_DE); ?></td> 
                           <td><?= _ent($voucher_line->PAY_AMT_DE); ?></td> 
                           <td><?= _ent($voucher_line->STATUS); ?></td> 
                           <td><?= _ent($voucher_line->ENTRY_TIME_DE); ?></td> 
                           <td><?= _ent($voucher_line->LAST_MODIFIER_VE); ?></td> 
                           <td><?= _ent($voucher_line->LAST_MODIFIER_DE); ?></td> 
                           <td width="200">
                              <?php is_allowed('voucher_line_view', function($voucher_line) use ($voucher_line){?>
                              <a href="<?= site_url('administrator/voucher_line/view/' . $voucher_line->VOUCHER_NO); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('voucher_line_update', function($voucher_line) use ($voucher_line){?>
                              <a href="<?= site_url('administrator/voucher_line/edit/' . $voucher_line->VOUCHER_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('voucher_line_delete', function($voucher_line) use ($voucher_line){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/voucher_line/delete/' . $voucher_line->VOUCHER_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($voucher_line_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Voucher Line data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
               <div class="row">
                  <div class="col-md-8">
                     <div class="col-sm-2 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="bulk" id="bulk" placeholder="Site Email" >
                           <option value="">Bulk</option>
                           <option value="delete">Delete</option>
                        </select>
                     </div>
                     <div class="col-sm-2 padd-left-0 ">
                        <button type="button" class="btn btn-flat" name="apply" id="apply" title="apply bulk actions">Apply</button>
                     </div>
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'BATCH_NO' ? 'selected' :''; ?> value="BATCH_NO">BATCH NO</option>
                           <option <?= $this->input->get('f') == 'BATCH_DATE' ? 'selected' :''; ?> value="BATCH_DATE">BATCH DATE</option>
                           <option <?= $this->input->get('f') == 'PARTNER_CODE' ? 'selected' :''; ?> value="PARTNER_CODE">PARTNER CODE</option>
                           <option <?= $this->input->get('f') == 'VOUCHER_NO' ? 'selected' :''; ?> value="VOUCHER_NO">VOUCHER NO</option>
                           <option <?= $this->input->get('f') == 'CLASS_CODE' ? 'selected' :''; ?> value="CLASS_CODE">CLASS CODE</option>
                           <option <?= $this->input->get('f') == 'TREATMENT_DATE' ? 'selected' :''; ?> value="TREATMENT_DATE">TREATMENT DATE</option>
                           <option <?= $this->input->get('f') == 'DR_CODE' ? 'selected' :''; ?> value="DR_CODE">DR CODE</option>
                           <option <?= $this->input->get('f') == 'COMPANY_DR_CODE' ? 'selected' :''; ?> value="COMPANY_DR_CODE">COMPANY DR CODE</option>
                           <option <?= $this->input->get('f') == 'DR_E_NAME' ? 'selected' :''; ?> value="DR_E_NAME">DR E NAME</option>
                           <option <?= $this->input->get('f') == 'DR_C_NAME' ? 'selected' :''; ?> value="DR_C_NAME">DR C NAME</option>
                           <option <?= $this->input->get('f') == 'MEMBER_CODE' ? 'selected' :''; ?> value="MEMBER_CODE">MEMBER CODE</option>
                           <option <?= $this->input->get('f') == 'MEMBER_CLASS' ? 'selected' :''; ?> value="MEMBER_CLASS">MEMBER CLASS</option>
                           <option <?= $this->input->get('f') == 'MEMBER_HKID' ? 'selected' :''; ?> value="MEMBER_HKID">MEMBER HKID</option>
                           <option <?= $this->input->get('f') == 'MEMBER_E_NAME' ? 'selected' :''; ?> value="MEMBER_E_NAME">MEMBER E NAME</option>
                           <option <?= $this->input->get('f') == 'MEMBER_C_NAME' ? 'selected' :''; ?> value="MEMBER_C_NAME">MEMBER C NAME</option>
                           <option <?= $this->input->get('f') == 'MEMBER_STAFF_NO' ? 'selected' :''; ?> value="MEMBER_STAFF_NO">MEMBER STAFF NO</option>
                           <option <?= $this->input->get('f') == 'DEPD_NAME' ? 'selected' :''; ?> value="DEPD_NAME">DEPD NAME</option>
                           <option <?= $this->input->get('f') == 'DEPD_CODE' ? 'selected' :''; ?> value="DEPD_CODE">DEPD CODE</option>
                           <option <?= $this->input->get('f') == 'SICK_LEAVE' ? 'selected' :''; ?> value="SICK_LEAVE">SICK LEAVE</option>
                           <option <?= $this->input->get('f') == 'SL_FROM' ? 'selected' :''; ?> value="SL_FROM">SL FROM</option>
                           <option <?= $this->input->get('f') == 'SL_TO' ? 'selected' :''; ?> value="SL_TO">SL TO</option>
                           <option <?= $this->input->get('f') == 'POLICY_NO' ? 'selected' :''; ?> value="POLICY_NO">POLICY NO</option>
                           <option <?= $this->input->get('f') == 'INSURED_NO' ? 'selected' :''; ?> value="INSURED_NO">INSURED NO</option>
                           <option <?= $this->input->get('f') == 'POLICY_YEAR' ? 'selected' :''; ?> value="POLICY_YEAR">POLICY YEAR</option>
                           <option <?= $this->input->get('f') == 'DP_TYPE' ? 'selected' :''; ?> value="DP_TYPE">DP TYPE</option>
                           <option <?= $this->input->get('f') == 'DIAG_CODE1' ? 'selected' :''; ?> value="DIAG_CODE1">DIAG CODE1</option>
                           <option <?= $this->input->get('f') == 'DIAG_CODE2' ? 'selected' :''; ?> value="DIAG_CODE2">DIAG CODE2</option>
                           <option <?= $this->input->get('f') == 'DIAG_CODE3' ? 'selected' :''; ?> value="DIAG_CODE3">DIAG CODE3</option>
                           <option <?= $this->input->get('f') == 'DIAG_CODE4' ? 'selected' :''; ?> value="DIAG_CODE4">DIAG CODE4</option>
                           <option <?= $this->input->get('f') == 'TYPE' ? 'selected' :''; ?> value="TYPE">TYPE</option>
                           <option <?= $this->input->get('f') == 'REFERRAL_DR' ? 'selected' :''; ?> value="REFERRAL_DR">REFERRAL DR</option>
                           <option <?= $this->input->get('f') == 'REFERRAL_TYPE' ? 'selected' :''; ?> value="REFERRAL_TYPE">REFERRAL TYPE</option>
                           <option <?= $this->input->get('f') == 'CO_PAY' ? 'selected' :''; ?> value="CO_PAY">CO PAY</option>
                           <option <?= $this->input->get('f') == 'EXTRA_MED_BOL' ? 'selected' :''; ?> value="EXTRA_MED_BOL">EXTRA MED BOL</option>
                           <option <?= $this->input->get('f') == 'EXTRA_MED' ? 'selected' :''; ?> value="EXTRA_MED">EXTRA MED</option>
                           <option <?= $this->input->get('f') == 'EXTRA_MED_REMARK' ? 'selected' :''; ?> value="EXTRA_MED_REMARK">EXTRA MED REMARK</option>
                           <option <?= $this->input->get('f') == 'LAB_XRAY_BOL' ? 'selected' :''; ?> value="LAB_XRAY_BOL">LAB XRAY BOL</option>
                           <option <?= $this->input->get('f') == 'LAB_XRAY' ? 'selected' :''; ?> value="LAB_XRAY">LAB XRAY</option>
                           <option <?= $this->input->get('f') == 'LAB_XRAY_CODE' ? 'selected' :''; ?> value="LAB_XRAY_CODE">LAB XRAY CODE</option>
                           <option <?= $this->input->get('f') == 'SURGICAL_BOL' ? 'selected' :''; ?> value="SURGICAL_BOL">SURGICAL BOL</option>
                           <option <?= $this->input->get('f') == 'SURGICAL' ? 'selected' :''; ?> value="SURGICAL">SURGICAL</option>
                           <option <?= $this->input->get('f') == 'SURGICAL_CODE' ? 'selected' :''; ?> value="SURGICAL_CODE">SURGICAL CODE</option>
                           <option <?= $this->input->get('f') == 'APPROVAL_CODE' ? 'selected' :''; ?> value="APPROVAL_CODE">APPROVAL CODE</option>
                           <option <?= $this->input->get('f') == 'FEE_AMT' ? 'selected' :''; ?> value="FEE_AMT">FEE AMT</option>
                           <option <?= $this->input->get('f') == 'OS_AMT' ? 'selected' :''; ?> value="OS_AMT">OS AMT</option>
                           <option <?= $this->input->get('f') == 'PAY_AMT' ? 'selected' :''; ?> value="PAY_AMT">PAY AMT</option>
                           <option <?= $this->input->get('f') == 'DR_CODE_DE' ? 'selected' :''; ?> value="DR_CODE_DE">DR CODE DE</option>
                           <option <?= $this->input->get('f') == 'FEE_AMT_DE' ? 'selected' :''; ?> value="FEE_AMT_DE">FEE AMT DE</option>
                           <option <?= $this->input->get('f') == 'PAY_AMT_DE' ? 'selected' :''; ?> value="PAY_AMT_DE">PAY AMT DE</option>
                           <option <?= $this->input->get('f') == 'STATUS' ? 'selected' :''; ?> value="STATUS">STATUS</option>
                           <option <?= $this->input->get('f') == 'ENTRY_TIME_DE' ? 'selected' :''; ?> value="ENTRY_TIME_DE">ENTRY TIME DE</option>
                           <option <?= $this->input->get('f') == 'LAST_MODIFIER_VE' ? 'selected' :''; ?> value="LAST_MODIFIER_VE">LAST MODIFIER VE</option>
                           <option <?= $this->input->get('f') == 'LAST_MODIFIER_DE' ? 'selected' :''; ?> value="LAST_MODIFIER_DE">LAST MODIFIER DE</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/voucher_line');?>" title="reset filters">
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
      var serialize_bulk = $('#form_voucher_line').serialize();

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
               document.location.href = BASE_URL + '/administrator/voucher_line/delete?' + serialize_bulk;      
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