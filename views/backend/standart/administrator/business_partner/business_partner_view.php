<style type="text/css">
  table thead{
    background-color: #00cec9;
  }
  i{
    display: inline-block;
    font-weight: 200!important;
    font-size: 15px;
    padding-right: 5px;
  }
  .widget-user-2 .widget-user-header {
   padding:10px;
}
.widget-user-2 .widget-user-username, 
.widget-user-2 .widget-user-desc{
  margin-left: 20px;
}
  .form-horizontal .control-label{
    text-align: left;
  }
  .form-group{ 
    border:1px solid #f4f4f4;
    padding-bottom: 3px;
    margin-bottom: 5px;
}
  .addButton{
    float: right;
    margin-top:15px;
    margin-bottom: 5px;
  }

  #Partner_doctors table{
    width: 100%;
  }
  #Partner_doctors thead,#Partner_doctors tbody, #Partner_doctors tr,#Partner_doctors td{
      display: block;

  }
  #Partner_doctors thead tr{
    width: 97%;

  }
  #Partner_doctors tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

   #Partner_doctors tbody{
    max-height: 500px;
    overflow-y: auto;
    overflow-x: auto;
  }
  #Partner_doctors th,#Partner_doctors td{
    float: left;
    height: 35px;
    width: 20%;
  }

  #Partner_contract table{
    width: 100%;
  }
  #Partner_contract thead,#Partner_contract tbody, #Partner_contract tr,#Partner_contract td{
      display: block;

  }
  #Partner_contract thead tr{
    width: 99%;

  }
  #Partner_contract tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

   #Partner_contract tbody{
    max-height: 150px;
    overflow-y: auto;
    overflow-x: auto;
  }
  #Partner_contract th,#Partner_contract td{
    float: left;
     height: 35px;
    width: 12%;
  }
   #Partner_contract .big-cell{
    width: 16%;

  }
  #Partner_contract .sbig-cell{
    width: 18%;
  }
    #agreed_fee table{
    width: 100%;
  }
  #agreed_fee thead,#agreed_fee tbody, #agreed_fee tr,#agreed_fee td{
      display: block;
  }
  #agreed_fee thead tr{
    width: 99%;

  }
  #agreed_fee tr:after {  /* clearing float */
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

   #agreed_fee tbody{
    max-height: 280px;
    overflow-y: auto;
    overflow-x: auto;
  }
  #agreed_fee th,#agreed_fee td{
    overflow: visible;
    height: 35px;
    float: left;
    width: 5%;
  }
  #agreed_fee .big-cell{
    width: 10%;

  }
  #contact {
    padding-top: 20px;
  }
  #contact .form-group{
    border:1px solid #f4f4f4;
    height: 45px;
    padding-top: 10px;
    margin-bottom: 10px;
  }
  #fee .btn.btn-default{
    width: 40px;
    height: 30px;
  }
  #fee input[type="text"]{
    padding-left: 3px;
    border:2px solid #f4f4f4;
    border-radius: 7px;
    height: 30px;
  }

</style>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
    BUSINESS PARTNER  <small><?= _ent($business_partner->PARTNER_CODE); ?> Detail </small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/business_partner'); ?>"></a></li>
      <li class="active">Detail</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row" >     
      <div class="col-md-12">
         <div class="box box-warning">
            <div class="box-body ">
       
          <ul class="nav nav-tabs">
            <li class="nav-item active">
              <a class="nav-link" id="home_tab" data-toggle="tab">Partner Information</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="fee_tab" data-toggle="tab" >Agreed Fee</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact_tab" data-toggle="tab">Contact Information</a>
            </li>
          </ul>
                  
          <div id="home">
             <div class="form-horizontal" name="form_business_partner" id="form_business_partner" >
                   <div id="business_partner" class="col-sm-5">
                    <h3> <?= _ent($business_partner->PARTNER_CODE); ?>' BASIC INFO</h3>
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Partner Code </label>

                        <div class="col-sm-7" id="partner_code">
                           <?= _ent($business_partner->PARTNER_CODE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">English Name </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->E_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Chinese Name </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->C_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Join Date</label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->JOIN_DATE); ?>
                        </div>
                    </div>
                      <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">STATUS</label>

                        <div class="col-sm-7">

                           <?php if ($BP_STATUS !=false){
                            echo $BP_STATUS[0]->STATUS; 
                          } else{
                            echo 'not undifned';
                          }
                            ?> </div>
                    </div>                     
                                    
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">English Address</label>

                        <div class="col-sm-7">
                          <?php echo ($business_partner->E_ADDR1) .', '. $business_partner->E_ADDR2 .', '. $business_partner->E_ADDR3 .', '.$business_partner->E_ADDR4 . ', '.$business_partner->E_ADDR5 .', '. $business_partner->E_DISTRICT; ?>
                        </div>
                    </div>
                                        
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">Chinese Address</label>

                        <div class="col-sm-7">
                          <?php echo ($business_partner->C_ADDR1) .', '.  $business_partner->C_ADDR2 .', '. $business_partner->C_ADDR3 .', '.$business_partner->C_ADDR4 . ', '.$business_partner->C_ADDR5 .', '. $business_partner->C_DISTRICT; ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">BILLING DEPT NAME </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->BILLING_DEPT_NAME); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">SURGICAL RATING </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->SURGICAL_RATING); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">DIAG CODE STANDARD </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->DIAG_CODE_STANDARD); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">CREATOR </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->CREATOR); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">CREATE DATE </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->CREATE_DATE); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">LAST MODIFIER </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->LAST_MODIFIER); ?>
                        </div>
                    </div>
                                         
                    <div class="form-group ">
                        <label for="content" class="col-sm-5 control-label">LAST UPDATE </label>

                        <div class="col-sm-7">
                           <?= _ent($business_partner->LAST_UPDATE); ?>
                        </div>
                    </div>
                  </div> <!--end of company infor-->                 
                  <div class="col-sm-7">
                
                  <div id="Partner_doctors" > 
                   <div class=""  > 
                       <h3 style="width:50%;display: inline-block;"> <?= _ent($business_partner->PARTNER_CODE); ?>' DOCTORS</h3>
                       <?php is_allowed('partner_doctor_contract_add', function(){?>
                      <a target="_blank" href="<?=  site_url('administrator/partner_doctor/add');?>" type="button" id="add_btn" class="btn btn-primary addButton" style="">Add doctor</a> 
                        <?php }) ?>

                   <table class="table table-bordered table-striped dataTable" >
                     <thead>
                        <tr class="">
                           <th>DR Code</th> 
                           <th>Partner Doctor Code</th>
                           <th>Location Code</th>
                           <th>Term date</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_doctor_contract">
                     <?php 
                        if ($partner_doctor_contract_counts !=0){
                        foreach($partner_doctor_contracts as $partner_doctor_contract){ ?>
                        <tr> 
                           <td><?= _ent($partner_doctor_contract->DR_CODE); ?></td>
                           <td><?= _ent($partner_doctor_contract->PARTNER_DR_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->LOC_CODE); ?></td> 
                           <td><?= _ent($partner_doctor_contract->TERM_DATE); ?></td> 
                           <td>
                             <?php is_allowed('partner_doctor_contract_update', function($partner_doctor_contract) use ($partner_doctor_contract){?>
                              <a target="_blank" href="<?= site_url('administrator/partner_doctor_contract/edit/'.$partner_doctor_contract->PARTNER_CODE .'/'.$partner_doctor_contract->DR_CODE .'/'.$partner_doctor_contract->PARTNER_DR_CODE.'/'.$partner_doctor_contract->LOC_CODE); ?>" class="label-default"><i class="fa fa-edit "></i> Update</a>
                              <?php }) ?>
                           </td>
                        </tr>
                      <?php }} else{?>
                        <tr>
                           <td colspan="400">
                        
                           </td>
                         </tr>
                         <?php }?> 
                     </tbody>
                  </table>
                  </div>
                  </div> 
                  <!--partner_doctor-->
                  </div>
                  </div>
            </div> 
            <!--home tab-->
        <div class="" id="fee">
            <div id="Partner_contract">
                    <h3 style="width: 16%;display: inline-block;">ALL CARDS</h3>
                    <a target="_blank" type="button" class="btn btn-primary addButton" href="<?= site_url('administrator/partner_contract/add_1/'.$business_partner->PARTNER_CODE) ;?>" >ADD CARD</a>
                    <label>Card Type</label>
                    <input type="text" name="" list="card_type_list" value="" id="card_type">

                    <datalist id="card_type_list">
                    </datalist>

                     <label>Status</label>
                    <input type="text" name="" list="Status_list" id="Status">
                    <datalist id="Status_list">
                      <option>Active</option>
                      <option>Not Start</option>
                      <option>Terminate</option>
                    </datalist>

                    <button type="button" class="btn btn-default" id="search_card"><i class="glyphicon glyphicon-search"></i></button>
                    <button type="button" class="btn btn-default" id="reset_card"><i class="fa fa-repeat"></i></button>

                  <div class=""> 

                  <table class="table table-bordered table-striped dataTable">
                     <thead>
                        <tr class="">
                          <th>Partner Code</th>
                           <th>CARD TYPE</th>
                           <th class="big-cell">Contract Name</th>
                           <th>Term Date</th>
                           <th>Status</th>
<!--                            <th>Extend Contract</th>
 -->                           <th class="big-cell">Remark</th>
                           <th class="sbig-cell">Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_partner_contract">
                     <?php 
                     if($partner_contract_counts!=0){
                        foreach($partner_contracts as $partner_contract){ ?>
                        <tr>
                          <td><?= _ent($partner_contract->PARTNER_CODE); ?></td>
                           <td><?= _ent($partner_contract->CARD_TYPE); ?></td>
                           <td class="big-cell"><?= _ent($partner_contract->CONTRACT_NAME); ?></td>
                           <td><?= _ent($partner_contract->TERM_DATE); ?></td> 
                           <td><?= _ent($partner_contract->STATUS); ?></td> 
                     
                           <td class="big-cell"><?= _ent($partner_contract->REMARK); ?></td> 
                           <td class="sbig-cell"> <a href="<?= site_url('administrator/partner_contract/view/' . $partner_contract->PARTNER_CODE.'/'.$partner_contract->CARD_TYPE); ?>" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="<?= site_url('administrator/partner_contract/edit/' .$partner_contract->PARTNER_CODE.'/'.$partner_contract->CARD_TYPE); ?>" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="<?= site_url('administrator/agreed_fee/add_2/' .$partner_contract->PARTNER_CODE.'/'.$partner_contract->CARD_TYPE ); ?>" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a>  </td>
                        </tr>
                      <?php }} ?>
                      <?php if ($partner_contract_counts == 0) :?>
                         <tr>
                           <td class="big-cell">
                           </td>
                         </tr>
                      <?php endif; ?> 
                     </tbody>
                  </table>
                 </div>
            </div><!--end partner contract view-->
         <div class="table-responsive" id="agreed_fee"> <!--start of agree fee view-->

              <h3 style="width: 15%;margin-top:0;display: inline-block;">ALL AGREED FEE</h3>
                <label for="agreed_fee_filter2">Card type:</label>
                <input type="text" name="f_card_type" value="" id="card_type_2">
                <label >Type</label>
                <input type="text" name="type" id="m_type">
                <button type="button" class="btn btn-default " id="search_fee"><i class="glyphicon glyphicon-search"></i></button>
             <table class="table table-bordered table-striped dataTable" id="">
                     <thead>
                        <tr class="">
                          <th>Auto_no</th>
                           <th class="big-cell">Partner Code</th>
                           <th class="big-cell">CARD TYPE</th>
                           <th>Type</th>
                           <th class="big-cell">Med Days</th>
                           <th>Co-pay</th>
                           <th>Fee</th>
                           <th>Pay</th>
                           <th class="big-cell">Extra Med/ REF</th>
                           <th  class="big-cell">Lab X-ray/ REF</th>
                           <th  class="big-cell">Surgical/ REF</th>
                           <th class="big-cell">Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbody_agreed_fee">
                     <?php if ($agreed_fee_counts!=0){
                      foreach($agreed_fees as $agreed_fee){ ?>
                        <tr>
                          <td><?= _ent($agreed_fee->AUTO_NO); ?></td>
                           <td class="big-cell"><?= _ent($agreed_fee->PARTNER_CODE); ?></td>
                           <td class="big-cell"><?= _ent($agreed_fee->CARD_TYPE); ?></td>
                           <td><?= _ent($agreed_fee->TYPE); ?></td> 
                           <td class="big-cell"><?= _ent($agreed_fee->MED_DAYS); ?></td> 
                           <td><?= _ent($agreed_fee->CO_PAY); ?></td> 
                           <td><?= _ent($agreed_fee->FEE); ?></td> 
                           <td><?= _ent($agreed_fee->PAY); ?></td> 
                           <td class="big-cell"><?php if ($agreed_fee->EXTRA_MED_BOL==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }if ($agreed_fee->EXTRA_MED_REF==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }?></td> 
                           <td class="big-cell"><?php if ($agreed_fee->LAB_XRAY_BOL==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }if ($agreed_fee->LAB_XRAY_REF==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }?></td> 
                          <td class="big-cell"><?php if ($agreed_fee->SURGICAL_BOL==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }if ($agreed_fee->SURGICAL_REF==1) {
                             echo '<i class="fa fa-check"></i>'; }else{
                            echo ' <i class="fa fa-circle-o"></i> ';
                           }?></td> 
                            
                            <td class="big-cell"> <a target="_blank" href="<?= site_url('administrator/agreed_fee/view/' . $agreed_fee->AUTO_NO); ?>" class="label-default"><i class="fa fa-eye" ></i></a>
                           <a target="_blank" href="<?= site_url('administrator/agreed_fee/edit/' . $agreed_fee->AUTO_NO); ?>" class="label-default"><i class="fa fa-edit " ></i></a>

                           </td>
                        </tr>
                      <?php } } ?>

                      <?php if ($agreed_fee_counts == 0) :?>
                         <tr>
                           <td colspan="100">
                           </td>
                         </tr>
                      <?php endif; ?>
                     </tbody>
                  </table>
                </div>
         </div>
        <div id="contact">
          <?php 
             $i = 0;
             if (count($partner_contacts)>0) {
                     foreach ($partner_contacts as $partner_contact){?>
                          <div class="col-sm-4">
                                     <div class="form-group ">
                            <label for="CONTACT_NO" class="col-sm-4">Contact No</label>
                            
                            <div class="col-sm-8 float" id="CONTACT_NO">
                              <?= _ent($partner_contact->CONTACT_NO);?>
                              </div>
                        </div>
                                                <div class="form-group ">
                            <label for="E_NAME" class="col-6 col-sm-4">English Name </label>
                            
                            <div class="col-sm-8 float" id="E_NAME"> 
                              <?= _ent($partner_contact->E_NAME);?>
                              </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="C_NAME" class="col-sm-4">Chinese Name </label> 
                            <div class="col-sm-8 float" id="C_NAME">
                                <?= _ent($partner_contact->C_NAME);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TITLE" class="col-sm-4">Title </label>
                             <div class=" col-sm-8 float" id="TITLE">
                                <?= _ent($partner_contact->TITLE);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="DEPARTMENT" class="col-sm-4">Department </label> 
                            <div class="col-sm-8 float" id="DEPARTMENT">
                                <?= _ent($partner_contact->DEPARTMENT);?>
                              </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TEL" class="col-sm-4">TEL </label> 
                            <div class="col-sm-8 float" id="TEL">
                               <?= _ent($partner_contact->TEL);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="FAX" class="col-sm-4">FAX </label> 
                            <div class="col-sm-8 float" id="FAX">
                                <?= _ent($partner_contact->FAX);?>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="EMAIL" class="col-sm-4">EMAIL </label>
                             <div class="col-sm-8 float" id="EMAIL">
                                <?= _ent($partner_contact->EMAIL);?>
                            </div>
                        </div>
                   </div>
               <?php $i++ ;}}else{
                echo 'NO CONTACT INFOMATION';
               }?>
           </div>
         
                 
            <div class="view-nav col-sm-12">
              <?php is_allowed('business_partner_update', function($business_partner) use ($business_partner){?>
              <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit business_partner (Ctrl+e)" href="<?= site_url('administrator/business_partner/edit/'.$business_partner->PARTNER_CODE); ?>"><i class="fa fa-edit" ></i> Edit Business Partner</a><?php }) ?>
              <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/business_partner/'); ?>"><i class="fa fa-undo" ></i> Go Business Partner List</a>
            </div> 
      </div>
            <!--/box body -->
      </div>
         <!--/box -->

      </div>
   </div>
   <script type="text/javascript">
      $('#fee').hide();
       $('#contact').hide();
     $(document).ready(function(){

          $('#search_card').on('click',function(){
              var partner_code = $('#partner_code').text().trim();
              var card_type_input = $('#card_type').val();
              var status = $('#Status').val();
               $('#card_type_2').val(card_type_input);
              $.ajax({
                  url:BASE_URL+'administrator/Business_partner/getCard/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'partner_code':partner_code,'card_type':card_type_input,'status':status},
                  success: function(res){
                   var filtered_cards = res.filtered_cards;
                   console.log(filtered_cards);
                   var size = res.size;
                   var content="";
                  if (filtered_cards!=undefined) {
                      for(var i=0; i<filtered_cards.length; i++){

                      // str = (filtered_cards[i]['EXTEND_CONTRACT']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      content = content + 
                      '<tr><td>'+
                        filtered_cards[i]['PARTNER_CODE']+'</td><td>' +
                        filtered_cards[i]['CARD_TYPE'] +'</td><td class="big-cell">' +
                        filtered_cards[i]['CONTRACT_NAME'] + '</td><td>'+
                        filtered_cards[i]['TERM_DATE']+'</td><td>'+ 
                        filtered_cards[i]['STATUS']+'</td><td class="big-cell">'+
                        filtered_cards[i]['REMARK']+'</td><td class="sbig-cell">'+
                        '<a href="'+ BASE_URL+'administrator/partner_contract/view/' + filtered_cards[i]["PARTNER_CODE"]+'/' + filtered_cards[i]["CARD_TYPE"]+'" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="' +  BASE_URL + 'administrator/partner_contract/edit/' +filtered_cards[i]["PARTNER_CODE"]+'/'+ filtered_cards[i]["CARD_TYPE"] +'" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="' + BASE_URL + 'administrator/agreed_fee/add_2/' + filtered_cards[i]["PARTNER_CODE"] + '/' +filtered_cards[i]["CARD_TYPE"]+ '" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a></td></tr>';
                      }
                    var result_fee = res.result_fee;
                    console.log(result_fee);

                   var contentFEE = '';
                   if (result_fee.length>0 || result_fee==undefined) {
                      for(var j=0; j<result_fee.length; j++){
                       console.log('result_fee:' + result_fee[j].AUTO_NO);
                      var s1 = (result_fee[j]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      var s2 = (result_fee[j]['EXTRA_MED_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var s3 = (result_fee[j]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      var s4 = (result_fee[j]['LAB_XRAY_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      var s5 =  (result_fee[j]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      var s6 = (result_fee[j]['SURGICAL_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                      contentFEE = contentFEE + 
                      '<tr><td>'+
                        result_fee[j]['AUTO_NO']+ '</td><td class="big-cell">' +
                        result_fee[j]['PARTNER_CODE']+'</td><td class="big-cell">' +
                        result_fee[j]['CARD_TYPE'] +'</td><td>' +
                        result_fee[j]['TYPE']+'</td><td class="big-cell">'+ 
                        result_fee[j]['MED_DAYS']+ '</td><td>' +
                        result_fee[j]['CO_PAY']+'</td><td>' +
                        result_fee[j]['FEE']+ '</td><td>'+ 
                        result_fee[j]['PAY']+'</td><td class="big-cell">'+
                        s1+s2+'</td><td class="big-cell">'+
                        s3+s4+'</td> <td class="big-cell">'+ 
                        s5+s6+'</td><td class="big-cell"><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/view/' + result_fee[j]['AUTO_NO']+'" class="label-default"><i class="fa fa-eye" ></i></a><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/edit/' + result_fee[j]['AUTO_NO']+'" class="label-default"><i class="fa fa-edit"></i></a></td></tr>';
                       }
                    }   
                    else{
                    contentFEE = '<tr><td class="big-cell">no result</td><tr>';
                    }
                  }
                else{

                    content = '<tr><td>no result</td><tr>';
                    contentFEE = '<tr><td class="big-cell">no result</td><tr>';

                  }
               $('#tbody_partner_contract').html(content);
               $('#tbody_agreed_fee').html(contentFEE);

                }
           
              });

          });

       $('#search_fee').on('click',function(){
                 var partner_code = $('#partner_code').text().trim();
                 var card_type_2 = $('#card_type_2').val();
                 var m_type = $('#m_type').val();
                 // var med_days =$('#m_med_days').val();
    
                 $.ajax({
                 url:BASE_URL + 'administrator/Business_partner/getAgreedfee/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'card_type_2':card_type_2 ,'m_type':m_type,'partner_code':partner_code},
                 success: function(res){
       
                var agreed_fee = res.selectedFees;
                var content2="";
                if (agreed_fee.length>0) {
                  for(var i=0; i<agreed_fee.length; i++){
                  var str1 = (agreed_fee[i]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                  var str2 = (agreed_fee[i]['EXTRA_MED_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str3 = (agreed_fee[i]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                  var str4 = (agreed_fee[i]['LAB_XRAY_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str5 =  (agreed_fee[i]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                  var str6 = (agreed_fee[i]['SURGICAL_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      content2 = content2 + 
                      '<tr><td>'+
                        agreed_fee[i]['AUTO_NO']+ '</td><td class="big-cell">' +
                        agreed_fee[i]['PARTNER_CODE']+'</td><td class="big-cell">' +
                        agreed_fee[i]['CARD_TYPE'] +'</td><td>' +
                        agreed_fee[i]['TYPE']+'</td><td class="big-cell">'+ 
                        agreed_fee[i]['MED_DAYS']+ '</td><td>' +
                        agreed_fee[i]['CO_PAY']+'</td><td>' +
                        agreed_fee[i]['FEE']+ '</td><td>'+ 
                        agreed_fee[i]['PAY']+'</td><td class="big-cell">'+
                       str1+str2+'</td><td class="big-cell">'+
                       str3+str4+'</td> <td class="big-cell">'+ 
                       str5+str6+'</td><td class="big-cell"><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/view/' + agreed_fee[i]['AUTO_NO']+'" class="label-default"><i class="fa fa-eye" ></i></a><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/edit/' + agreed_fee[i]['AUTO_NO']+'" class="label-default"><i class="fa fa-edit " ></i></a></td></tr>';
                   }
                 }
              else{
                  content2 ='<tr><td class="big-cell">no result</td><tr>';
                }
                 $('#tbody_agreed_fee').html(content2);
               }
               
              });// end of ajax on select filter1 
            });

          $('#reset_card').on('click',function(){
              var partner_code = $('#partner_code').text().trim();
              var card_type_input = $('#card_type').val("");
              var status = $('#Status').val("");

              $('#card_type_2').val("");
              $('#m_type').val("");
                $.ajax({
                  url:BASE_URL+'administrator/Business_partner/getCard_reset/',
                  method:'GET',
                  dataType:'JSON',
                  data:{'partner_code':partner_code},
                  success: function(res){
                   var cards = res.cards;
                   console.log(cards);
                   var size = res.size;
                  var content="";
                  for(var i=0; i<cards.length; i++){
                   // var str = (cards[i]['EXTEND_CONTRACT']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>'; 
                      content = content + 
                      '<tr><td>'+
                        cards[i]['PARTNER_CODE']+'</td><td>' +
                        cards[i]['CARD_TYPE'] +'</td><td class="big-cell">' +
                        cards[i]['CONTRACT_NAME'] + '</td><td>'+
                        cards[i]['TERM_DATE']+'</td><td>'+ 
                        cards[i]['STATUS']+'</td><td class="big-cell">'+
                        cards[i]['REMARK']+'</td> <td class="sbig-cell"><a href="'+ BASE_URL+'administrator/partner_contract/view/' + cards[i]['PARTNER_CODE']+'/' + cards[i]['CARD_TYPE']+'" class="label-default"><i class="fa fa-eye"></i>View</a><a target="_blank" href="' +  BASE_URL + 'administrator/partner_contract/edit/' + cards[i]['PARTNER_CODE']+'/'+ cards[i]['CARD_TYPE'] +'" class="label-default"><i class="fa fa-edit " ></i>Update</a> <a target="_blank" href="' + BASE_URL + 'administrator/agreed_fee/add_2/' + cards[i]['PARTNER_CODE'] + '/' +cards[i]['CARD_TYPE']+ '" class="label-default"><i class="fa fa-plus-square-o" ></i>Fee</a></td></tr>';
                  }
                 $('#tbody_partner_contract').html(content);
                   var fees = res.fees;

                  var contentHTML = '';
                   for(var j=0; j<fees.length; j++){
                  var str1 = (fees[i]['EXTRA_MED_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                  var str2 = (fees[i]['EXTRA_MED_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str3 = (fees[i]['LAB_XRAY_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                  var str4 = (fees[i]['LAB_XRAY_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';

                  var str5 =  (fees[i]['SURGICAL_BOL']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                  var str6 = (fees[i]['SURGICAL_REF']==1)? '<i class="fa fa-check"></i>' :'<i class="fa fa-circle-o"></i>';
                      contentHTML = contentHTML + 
                      '<tr><td>'+
                        fees[j]['AUTO_NO']+ '</td><td class="big-cell">' +
                        fees[j]['PARTNER_CODE']+'</td><td class="big-cell">' +
                        fees[j]['CARD_TYPE'] +'</td><td>' +
                        fees[j]['TYPE']+'</td><td class="big-cell">'+ 
                        fees[j]['MED_DAYS']+ '</td><td>' +
                        fees[j]['CO_PAY']+'</td><td>' +
                        fees[j]['FEE']+ '</td><td>'+ 
                        fees[j]['PAY']+'</td><td class="big-cell">'+
                        str1+str2+'</td><td class="big-cell">'+
                        str3+str4+'</td> <td class="big-cell">'+ 
                        str5+str6+'</td><td class="big-cell"><a target="_blank" href="'+ BASE_URL + 'administrator/agreed_fee/view/' + fees[j]['AUTO_NO']+'" class="label-default"><i class="fa fa-eye"></i></a><a target="_blank" href="'+ BASE_URL+'administrator/agreed_fee/edit/' + fees[i]['AUTO_NO']+'" class="label-default"><i class="fa fa-edit " ></i></a></td></tr>';
                      }
                  console.log(contentHTML);
                 $('#tbody_agreed_fee').html(contentHTML);

                   }

              });

          });

            $('#agreed_fee_filter2').on('change',function(){
               var partner_code = $('#partner_code').text().trim();    
               var selectNo = $('#agreed_fee_filter1').val();
               var contract_name = $('#agreed_fee_filter2').val();

                $.ajax({
                 url:BASE_URL + 'administrator/Business_partner/getAgreedfee2/',
                 method:'GET',
                 dataType:'JSON',
                 data:{'selectNo':selectNo ,'partner_code':partner_code,'contract_name':contract_name},
                 success: function(res){
                    // update filter2 result UI 
                    var agreed_fee = res.contract_filter_results;

                    console.log(res.message);
                     console.log(agreed_fee);
                     var content="";
                  if (agreed_fee !=false) {
                       var length = agreed_fee.length;
                      for(var i=0; i<length; i++){
                       content = content + 
                        '<tr><td>'+
                        agreed_fee[i]['AUTO_NO']+ '</td><td>' +
                        agreed_fee[i]['PARTNER_CODE']+'</td><td>' +
                        agreed_fee[i]['PARTNER_CONTRACT_NO'] + '</td><td>' + 
                        agreed_fee[i]['CARD_TYPE'] +'</td><td>' +
                        agreed_fee[i]['CONTRACT_NAME'] + '</td><td>'+
                        agreed_fee[i]['TYPE']+'</td><td>'+ 
                        agreed_fee[i]['MED_DAYS']+ '</td><td>' +
                        agreed_fee[i]['CO_PAY']+'</td><td>' +
                        agreed_fee[i]['FEE']+ '</td><td>'+ 
                        agreed_fee[i]['PAY']+'</td><td>'+
                        agreed_fee[i]['EXTRA_MED_BOL']+'</td><td>'+
                        agreed_fee[i]['EXTRA_MED_REF']+'</td> <td>'+
                        agreed_fee[i]['LAB_XRAY_BOL']+'</td> <td>'+ 
                        agreed_fee[i]['LAB_XRAY_REF']+'</td> <td>'+ 
                        agreed_fee[i]['SURGICAL_BOL']+'</td><td>'+ 
                        agreed_fee[i]['SURGICAL_REF']+'</td><td>'+'<a target="_blank" href=' + '"'+ BASE_URL + 'administrator/agreed_fee/edit/'+agreed_fee[i]['AUTO_NO']+ '"'+'class="label-default"><i class="fa fa-edit " ></i>Update</a>'
                        '</td></tr>'
                     }
                        $('#tbody_agreed_fee').html(content);
                    } else{
                        $('#tbody_agreed_fee').html('No data available');
                    }
                
               }
            });
            });

           $('#home_tab').on('click',function(){
                  $('#home').show();
                  $('#fee').hide();
                  $('#contact').hide();
            });
           $('#fee_tab').on('click',function(){
                  $('#home').hide();
                  $('#fee').show();
                  $('#contact').hide();
            });
           $('#contact_tab').on('click',function(){
                 $('#home').hide();
                  $('#fee').hide();
                  $('#contact').show();
            });
         });
   </script>
</section>
<!-- /.content -->
