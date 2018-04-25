
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Partner Contract<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Partner Contract</li>
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
                        <?php is_allowed('partner_contract_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Partner Contract (Ctrl+a)" href="<?=  site_url('administrator/partner_contract/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Partner Contract</a>
                        <?php }) ?>
                        <?php is_allowed('partner_contract_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Partner Contract" href="<?= site_url('administrator/partner_contract/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('partner_contract_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Partner Contract" href="<?= site_url('administrator/partner_contract/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Partner Contract</h3>
                     <h5 class="widget-user-desc">List All Partner Contract <i class="label bg-yellow"><?= $partner_contract_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_partner_contract" id="form_partner_contract" action="<?= base_url('administrator/partner_contract/index'); ?>">
                   <div class="row" style="margin-bottom: 5PX;">
                  <div class="col-md-8">
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                            <option <?= $this->input->get('f') == 'PARTNER_CODE' ? 'selected' :''; ?> value="PARTNER_CODE">PARTNER CODE</option>
                           <option <?= $this->input->get('f') == 'START_DATE' ? 'selected' :''; ?> value="START_DATE">START DATE</option>
                           <option <?= $this->input->get('f') == 'TERM_DATE' ? 'selected' :''; ?> value="TERM_DATE">TERM DATE</option>
                           <option <?= $this->input->get('f') == 'STATUS' ? 'selected' :''; ?> value="STATUS">STATUS</option>
                           <option <?= $this->input->get('f') == 'EXTEND_CONTRACT' ? 'selected' :''; ?> value="EXTEND_CONTRACT">EXTEND CONTRACT</option>
                           <option <?= $this->input->get('f') == 'REMARK' ? 'selected' :''; ?> value="REMARK">REMARK</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/partner_contract');?>" title="reset filters">
                        <i class="fa fa-undo"></i>
                        </a>
                     </div>
                  </div>
                                  <div class="col-md-4">
                     <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate" >
                        <?= $pagination; ?>
                     </div>
                  </div>
               </div>

                  <div class="table-responsive"> 
                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                           <th>PARTNER CODE</th>
                           <th>CONTRACT NO</th>
                           <th>Contract Name</th>
                           <th>START DATE</th>
                           <th>TERM DATE</th>
                           <th>STATUS</th>
                           <th>EXTEND CONTRACT</th>
                           <th>REMARK</th>
                           <th>Last Update</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_contract">
                     <?php foreach($partner_contracts as $partner_contract): ?>
                        <tr class="clickable-row"  class="label-default" data-href='<?= site_url('administrator/partner_contract/view/' . $partner_contract->PARTNER_CODE.'/'.$partner_contract->CARD_TYPE); ?>'>
                           <td><?= _ent($partner_contract->PARTNER_CODE); ?></td> 
                           <td><?= _ent($partner_contract->CARD_TYPE); ?></td>
                           <td><?= _ent($partner_contract->CONTRACT_NAME); ?></td>
                           <td><?= _ent($partner_contract->START_DATE); ?></td> 
                           <td><?= _ent($partner_contract->TERM_DATE); ?></td> 
                           <td><?= _ent($partner_contract->STATUS); ?></td> 
                           <td><?= _ent($partner_contract->EXTEND_CONTRACT); ?></td> 
                           <td><?= _ent($partner_contract->REMARK); ?></td> 
                           <td><?= _ent($partner_contract->LAST_UPDATE); ?></td>
                           <td width="200">
                              <?php is_allowed('partner_contract_view', function($partner_contract) use ($partner_contract){?>
                              <a href="<?= site_url('administrator/partner_contract/view/' . $partner_contract->PARTNER_CODE.'/'.$partner_contract->CARD_TYPE); ?>" class="label-default"><i class="fa fa-newspaper-o"></i> View
                              <?php }) ?>
                              <?php is_allowed('partner_contract_update', function($partner_contract) use ($partner_contract){?>
                              <a href="<?= site_url('administrator/partner_contract/edit/' . $partner_contract->PARTNER_CODE.'/'.$partner_contract->CARD_TYPE); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('partner_contract_delete', function($partner_contract) use ($partner_contract){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/partner_contract/delete/' . $partner_contract->PARTNER_CODE); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($partner_contract_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Partner Contract data is not available
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                  </div>
               </div>
               <hr>
               <!-- /.widget-user -->
              
               </form>  
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
     $('.clickable-row').on('click',function(){
      window.location = $(this).data('href');
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
      var serialize_bulk = $('#form_partner_contract').serialize();

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
               document.location.href = BASE_URL + '/administrator/partner_contract/delete?' + serialize_bulk;      
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