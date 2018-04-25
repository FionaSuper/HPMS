
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
//This page is a result of an autogenerated content made by running test.html with firefox.
function domo(){
 
   // Binding keys
   $('*').bind('keydown', 'Ctrl+e', function assets() {
      $('#btn_edit').trigger('click');
       return false;
   });

   $('*').bind('keydown', 'Ctrl+x', function assets() {
      $('#btn_back').trigger('click');
       return false;
   });
    
}


jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Partner Contract      <small>Detail Partner Contract</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/partner_contract'); ?>">Partner Contract</a></li>
      <li class="active">Detail</li>
   </ol>
</section>

<style type="text/css">
.form-group {
  width: 50%;
  padding-top:3px;
  padding-bottom: 3px;
  margin-left: 20%!important;
}
.control-label {
  border-right: 1px solid #f4f4f4;
}
.form-group .control-label{
  width: 30%;
}
  .form-group{
    border: 1px solid #f4f4f4;
  }
</style>
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
                     <h3 class="widget-user-username"> <?= _ent($partner_contract->PARTNER_CODE); ?>  <?= _ent($partner_contract->CONTRACT_NAME); ?></h3>
                     <h5 class="widget-user-desc">Detail</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_partner_contract" id="form_partner_contract" >
                   
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">PARTNER CODE </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->PARTNER_CODE); ?>
                        </div>
                    </div>
                                         
    
                       <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CARD TYPE</label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->CARD_TYPE); ?>
                        </div>
                    </div>
                       <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CONTRACT NAME </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->CONTRACT_NAME); ?>
                        </div>
                    </div>
                               <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">STATUS </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->STATUS); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">START DATE </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->START_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">ORIGINAL TERM DATE </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->TERM_DATE); ?>
                        </div>
                    </div>
                       <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">TERM DATE </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->ORIGINAL_TERM_DATE); ?>
                        </div>
                    </div>
                                         
         
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">EXTEND CONTRACT </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->EXTEND_CONTRACT); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">REMARK </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->REMARK); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CREATOR </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">CREATE DATE </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">LAST MODIFIER </label>

                        <div class="col-sm-8">
                           <?= _ent($partner_contract->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">LAST UPDATE </label>
                        <div class="col-sm-8">
                           <?= _ent($partner_contract->LAST_UPDATE); ?>
                        </div>
                    </div>
                                        
                    <br>
                    <br>

                    <div class="view-nav">
                        <?php is_allowed('partner_contract_update', function($partner_contract) use ($partner_contract){?>
                        <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit partner_contract (Ctrl+e)" href="<?= site_url('administrator/partner_contract/edit/' . $partner_contract->PARTNER_CODE.'/'.$partner_contract->CARD_TYPE); ?>"><i class="fa fa-edit" ></i> Edit Partner Contract</a>
                        <?php }) ?>
                        <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/partner_contract/'); ?>"><i class="fa fa-undo" ></i> Go Partner Contract List</a>
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
