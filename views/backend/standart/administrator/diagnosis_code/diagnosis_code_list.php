
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+a', function assets() {
       window.location.href = BASE_URL + '/administrator/Diagnosis_code/add';
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
      Diagnosis Code<small>List All</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Diagnosis Code</li>
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
                        <?php is_allowed('diagnosis_code_add', function(){?>
                        <a class="btn btn-flat btn-success btn_add_new" id="btn_add_new" title="add new Diagnosis Code (Ctrl+a)" href="<?=  site_url('administrator/diagnosis_code/add'); ?>"><i class="fa fa-plus-square-o" ></i> Add New Diagnosis Code</a>
                        <?php }) ?>
                        <?php is_allowed('diagnosis_code_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export Diagnosis Code" href="<?= site_url('administrator/diagnosis_code/export'); ?>"><i class="fa fa-file-excel-o" ></i> Export XLS</a>
                        <?php }) ?>
                        <?php is_allowed('diagnosis_code_export', function(){?>
                        <a class="btn btn-flat btn-success" title="export pdf Diagnosis Code" href="<?= site_url('administrator/diagnosis_code/export_pdf'); ?>"><i class="fa fa-file-pdf-o" ></i> Export PDF</a>
                        <?php }) ?>
                     </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Diagnosis Code</h3>
                     <h5 class="widget-user-desc">List All Diagnosis Code <i class="label bg-yellow"><?= $diagnosis_code_counts; ?>  items</i></h5>
                  </div>

                  <form name="form_diagnosis_code" id="form_diagnosis_code" action="<?= base_url('administrator/diagnosis_code/index'); ?>">
                  
                <div class="row" style="margin-bottom: 5px;">
                  <div class="col-md-8">
                     <div class="col-sm-3 padd-left-0  " >
                        <input type="text" class="form-control" name="q" id="filter" placeholder="Filter" value="<?= $this->input->get('q'); ?>">
                     </div>
                     <div class="col-sm-3 padd-left-0 " >
                        <select type="text" class="form-control chosen chosen-select" name="f" id="field" >
                           <option value="">All</option>
                           <option <?= $this->input->get('f') == 'DIAG_CODE' ? 'selected' :''; ?> value="DIAG_CODE">DIAG CODE</option>
                           <option <?= $this->input->get('f') == 'DIAG_CODE_STANDARD' ? 'selected' :''; ?> value="DIAG_CODE_STANDARD">DIAG CODE STANDARD</option>
                           
                           <option <?= $this->input->get('f') == 'E_DESC' ? 'selected' :''; ?> value="E_DESC">ENG DESC</option>
                          </select>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <button type="submit" class="btn btn-flat" name="sbtn" id="sbtn" value="Apply" title="filter search">
                        Filter
                        </button>
                     </div>
                     <div class="col-sm-1 padd-left-0 ">
                        <a class="btn btn-default btn-flat" name="reset" id="reset" value="Apply" href="<?= base_url('administrator/diagnosis_code');?>" title="reset filters">
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
                            <th>DIAGNOSIS CODE</th>
                           <th>DIAGNOSIS CODE STANDARD</th>
                           <th>ENGLISH DESCRIPTION</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_diagnosis_code">
                     <?php foreach($diagnosis_codes as $diagnosis_code): ?>
                        <tr class="clickable-row" data-href='<?= site_url('administrator/diagnosis_code/view/' . $diagnosis_code->AUTO_NO); ?>'>
                           <td><?= _ent($diagnosis_code->DIAG_CODE); ?></td> 
                           <td><?= _ent($diagnosis_code->DIAG_CODE_STANDARD); ?></td> 
                           <td><?= _ent($diagnosis_code->E_DESC); ?></td> 
                           <td width="200">
                              <?php is_allowed('diagnosis_code_update', function($diagnosis_code) use ($diagnosis_code){?>
                              <a href="<?= site_url('administrator/diagnosis_code/edit/' . $diagnosis_code->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                              <?php is_allowed('diagnosis_code_delete', function($diagnosis_code) use ($diagnosis_code){?>
                              <a href="javascript:void(0);" data-href="<?= site_url('administrator/diagnosis_code/delete/' . $diagnosis_code->AUTO_NO); ?>" class="label-default remove-data"><i class="fa fa-close"></i> Remove</a>
                               <?php }) ?>
                           </td>
                        </tr>
                      <?php endforeach; ?>
                      <?php if ($diagnosis_code_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           Diagnosis Code data is not available
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
      var serialize_bulk = $('#form_diagnosis_code').serialize();

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
               document.location.href = BASE_URL + '/administrator/diagnosis_code/delete?' + serialize_bulk;      
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