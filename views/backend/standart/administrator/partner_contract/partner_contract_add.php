
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Partner Contract        <small>New Partner Contrac</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/partner_contract'); ?>">Partner Contract</a></li>
        <li class="active">New</li>
    </ol>
</section>
<style type="text/css">
 legend{
  text-shadow:5px 5px 10px #d35400;
  font-weight: 600;
   padding-left: 20px;
 }
 label{
      font-weight: 600;
      font-size: 15px;

 }
  select,input {
    width: 200px;
    height: 30px!important; 
    padding: 5px 5px;
    margin-bottom: 10px;
  }
  textarea {
    width: 91%!important;
    margin-left: 20px;
    margin-top: 20px;
  }

</style>
<style type="text/css">
    *{
      box-sizing: border-box;;
    }
    .hint1{
        font-size: 20px;
        display: none;
        text-align: center;;
        color: green;
    }
    .hint2 {
        font-size: 18px;
        display: none;
        text-align: center;
        color: red;
    }
    .form-group{
        margin-bottom: 10px;
        margin-right: 20px;
    }
 .policy_header {
    width: 95%!important;
    margin-left: auto!important;
    margin-right: auto!important;
    margin-bottom: 10px;
    padding-bottom: 5px;
    font-size: 15px;
    font-weight: 600!important;
    border-bottom: 1px solid #f4f4f4;
 }
 #Policy_group {
  padding-top:20px;
 }

.remove_btn  {
  margin-left: 30px;
 }
 .policy_header div, .policy_container div{
  margin-right: 15px;
 }
 .policy_container .datepicker{
  width: 100px!important;
 }
 .Remark input{
  width: 300px;
 }

</style>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body" style="padding-top: 30px;">
                        <?= form_open('', [
                            'name'    => 'form_partner_contract', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_partner_contract', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                           <fieldset class="col-sm-12">
                              <legend>CHOOSE PARTNER</legend>
                              <label for="PARTNER_CODE" class="col-sm-2 control-label">Partner Code<i class="required">*</i>
                              </label>
                              <div class="col-sm-2">
                                 <select name="PARTNER_CODE" class="partner_code chosen chosen-select-deselect cust-required" id="partner_code">
                                      <?php if($partner_code!=''){;?>
                                       <option value="<?php echo $partner_code;?>"><?php echo $partner_code;?></option>
                                      <?php }?>

                                      <option value="">Select Partner Code</option>
                                      <?php if ($partner_codes_total >0) {
                                              foreach ($partner_codes as $partner_code) {; ?>
                                                  <option value="<?php echo $partner_code->PARTNER_CODE; ?>"><?php echo $partner_code->PARTNER_CODE;?></option>
                                     <?php }}else{ echo 'No partner code available'; }  ?>
                                  </select>
                            
                              </div>
                          
                            <label for="partner_Ename" class="col-sm-2 control-label">English Name:</label>
                            <div  class="col-sm-2">
                              <?php  if($partner_name) {
                                echo ' <input type="text" name="" value="'.$partner_name->E_NAME .'" id="partner_Ename" readonly >';}
                                else {
                                    echo  '<input type="text" name="" value="" class="" id="partner_Ename" readonly >';
                                   }
                               ?>
                            </div>
                            <br><br> 
                       </fieldset>
                      <FIELDSET class="col-md-12">
                          <legend>NEW CONTRCT</legend>
                          <div class="form-group policy_header">
                            <div class="col-sm-2">Card Type</div>
                            <div class="col-sm-2">Contract Name</div>
                            <div  class="col-sm-1">Start Date</div>
                            <div class="col-sm-1">Term Date</div>
                            <div class="col-sm-2">Remark</div>
                          </div>
                          <div id="Policy">
                            <div class="policy_container form-group">
                                 <div class="col-sm-2">
                                    <input type="text" name="CARD_TYPE[]" value="">
                                 </div>  
                                  <div class="col-sm-2">
                                     <input type="text" name="CONTRACT_NAME[]" value="">
                                 </div>

                                <div class="date col-sm-1">
                                  <input type="text" class="datepicker" name="START_DATE[]"  id="START_DATE" placeholder="Start Date" value="">
                                </div>

                                  <div class="date col-sm-1">
                                    <input type="text" class= "datepicker" name="TERM_DATE[]" id="TERM_DATE" placeholder="Term Date " value="">
                                  </div>
                                 <div class="col-sm-3 Remark">
                                 <input type="text" name="REMARK[]">
                                </div>
                                <div class="col-sm-1">
                                  <button type="button" class="btn-danger btn remove_btn">Remove</button>
                              </div>
                            </div>
                            
                            <div class="policy_container form-group">
                              <div class="col-sm-2">
                                    <input type="text" name="CARD_TYPE[]" value="">
                                 </div>  
                                  <div class="col-sm-2">
                                     <input type="text" name="CONTRACT_NAME[]" value="">
                                 </div>

                                <div class="date col-sm-1">
                                  <input type="text" class="datepicker" name="START_DATE[]"  id="START_DATE" placeholder="Start Date" value="">
                                </div>

                                  <div class="date col-sm-1">
                                    <input type="text" class= "datepicker" name="TERM_DATE[]" id="TERM_DATE" placeholder="Term Date " value="">
                                  </div>
                                 <div class="col-sm-3 Remark" style="">
                                 <input type="text" name="REMARK[]">
                                </div>
                                <div class="col-sm-1">
                                  <button type="button" class="btn-danger btn remove_btn">Remove</button>
                              </div>
                            </div>
                              
                            <div class="policy_container form-group">
                             <div class="col-sm-2">
                                    <input type="text" name="CARD_TYPE[]" value="">
                                 </div>  
                                  <div class="col-sm-2">
                                     <input type="text" name="CONTRACT_NAME[]" value="">
                                 </div>

                                <div class="date col-sm-1">
                                  <input type="text" class="datepicker" name="START_DATE[]"  id="START_DATE" placeholder="Start Date" value="">
                                </div>

                                  <div class="date col-sm-1">
                                    <input type="text" class= "datepicker" name="TERM_DATE[]" id="TERM_DATE" placeholder="Term Date " value="">
                                  </div>
                                 <div class="col-sm-3 Remark">
                                 <input type="text" name="REMARK[]">
                                </div>
                                <div class="col-sm-1">
                                  <button type="button" class="btn-danger btn remove_btn">Remove</button>
                              </div>
                            </div>                          
                         </div> 

                            <button type="button" class="btn-info btn col-sm" id="add_more" style="">Add More</button>
                        </FIELDSET>
                        <div class="message"></div>
                        <div class="row-fluid col-md-7" style="margin-top:30px; ">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)">
                            <i class="fa fa-save"></i> Save
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="save and back to the list (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> Save and Go to The List
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="cancel (Ctrl+x)">
                            <i class="fa fa-undo" ></i> Cancel
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i>Loading, Saving data</i>
                            </span>
                        </div>
                        <?= form_close(); ?>
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
    //  $("#START_DATE").datetimepicker({
    //                  format:'Y-m-d',
    //                   onShow:function( ct ){
    //                    this.setOptions({
    //                     maxDate:jQuery('#TERM_DATE').val()?jQuery('#TERM_DATE').val():false
    //                    })
    //                   },
    //                   timepicker:false                            
    //      });
    // $("#TERM_DATE").datetimepicker({
    //                 format:'Y-m-d',
    //                  onShow:function( ct ){
    //                 this.setOptions({
    //                 minDate:jQuery('#START_DATE').val()?jQuery('#START_DATE').val():false
    //                 })
    //                },
    //                timepicker:false
    //             });
    $(document).ready(function(){
         $('.partner_code').on('change',function(){
           var partner_code = $('#partner_code').val();

           if (partner_code !='') {
                    $.ajax({
                    url: BASE_URL + "administrator/partner_contract/add_Contract/",
                    method: 'GET',
                    dataType: 'JSON',
                    data: { 'partner_code':partner_code},
                    success: function(res){
                        $('#partner_Ename').attr('value',res.Ename);      
                     }
                });
            }
          });
    
    //     $('#term_btn').on('click',function(){
    //       var partner_code = $('#partner_code').val();
    //       var Latest_Contract_No = $('#Latest_Contract_No').val();
    //       swal({
    //         title: "Are you sure to Terminate the contract?",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Yes!",
    //         cancelButtonText: "No!",
    //         closeOnConfirm: true,
    //         closeOnCancel: true
    //       },
    //       function(isConfirm){
    //         if (isConfirm) {
    //          $.ajax({
    //         url: BASE_URL + "administrator/partner_contract/term_contract/",
    //         method: 'GET',
    //         dataType: 'JSON',
    //         data:{'partner_code':partner_code,'Latest_Contract_No': Latest_Contract_No},
    //         success :function(res){
    //         if (res.affected_rows) {
    //          alert(res.affected_rows);
    //          window.location.href = BASE_URL + 'administrator/partner_contract/add';
    //           }
    //         }
    //       });
    //         }
    //       });
    //   });
    // }); 
    $('.remove_btn').css('display','none');
    idx = 1;
    $('#add_more').on('click',function(){
          var htmltext = '<div class="policy_container form-group">   <div class="col-sm-2"><input type="text" name="CARD_TYPE[]" value=""></div>  <div class="col-sm-2"><input type="text" name="CONTRACT_NAME[]" value=""></div> <div class="date col-sm-1"><input type="text" class="datepicker" name="START_DATE[]"  id="START_DATE-idx" placeholder="Start Date" value=""></div><div class="date col-sm-1"><input type="text" class= "datepicker" name="TERM_DATE[]" id="TERM_DATE-idx" placeholder="Term Date " value=""></div><div class="col-sm-3 Remark"><input type="text" name="REMARK[]"> </div><div class="col-sm-1"><button type="button" class="btn-danger btn remove_btn">Remove</button></div></div>';
            
            htmltext = htmltext.replace(/idx/g, idx);
            idx ++;
 
          $(htmltext).insertBefore('#add_more');

          $('#START_DATE-'+idx).datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                onShow:function( ct ){
                this.setOptions({
                maxDate:jQuery('#TERM_DATE-'+idx).val()?jQuery('#TERM_DATE-'+idx).val():false
             })
            }
          });

       $('#TERM_DATE-'+idx).datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                onShow:function( ct ){
                this.setOptions({
                minDate:jQuery('#START_DATE-'+idx).val()?jQuery('#START_DATE-'+idx).val():false
          })
         }
       });


          $('.remove_btn').on('click', function() {
          $(this).closest('.policy_container').remove();
          });

          $('.remove_btn').css('display','block');


    });
    $('.remove_btn').on('click', function() {
         $(this).closest('.policy_container').remove();
    });
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
              window.location.href = BASE_URL + 'administrator/partner_contract';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_partner_contract = $('#form_partner_contract');
        var data_post = form_partner_contract.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/partner_contract/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            } 
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
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