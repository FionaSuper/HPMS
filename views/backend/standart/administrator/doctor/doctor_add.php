
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor        <small>New Doctor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor'); ?>">Doctor</a></li>
        <li class="active">New</li>
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
                     <h3 class="widget-user-username">Doctor</h3>
                     <h5 class="widget-user-desc">New Doctor</h5>
					 <ul class="nav nav-tabs">
					  <li class="nav-item active">
						 <a class="nav-link" id="doctor_tab" data-toggle="tab">Doctor</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="payment_tab" data-toggle="tab" >Payment</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="center_tab" data-toggle="tab" >Center</a>
					  </li>
					  <li class="nav-item">
						 <a class="nav-link" id="consult_tab" data-toggle="tab" >Consultation</a>
					  </li>
					</ul>
                     
                  </div>
                  <?= form_open('', [
                     'name'    => 'form_doctor', 
                     'class'   => 'form-horizontal', 
                     'id'      => 'form_doctor', 
                     'enctype' => 'multipart/form-data', 
                     'method'  => 'POST'
                     ]); ?>
                  <div id="doctorDiv">
                     <h1>Doctor Info.</h1>
					 
                     <div class="form-group ">
                        <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE'); ?>">
						   <small class="info help-block">
						   </small>
                        </div>
						
						<label for="JOIN_DATE" class="col-sm-2 control-label">Join Date
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE">
							<small class="info help-block">
							</small>
						</div>
						
                     </div>
					 
                     <div class="form-group ">
                        <label for="E_NAME" class="col-sm-2 control-label">English Name 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-2">
                           <select  class="form-control cust-required" name="E_TITLE[]" id="E_TITLE" >
                              <option value="Dr" id="et0">Dr</option>
                              <option value="Mr" id="et1">Mr</option>
                              <option value="Mrs" id="et2">Mrs</option>
                              <option value="Ms" id="et3">Ms</option>
                              <option value="Miss" id="et4">Miss</option>
                           </select>
						   <small class="info help-block">
						   </small>
                        </div>

                        <div class="col-sm-6">
                           <input type="text" class="form-control cust-required" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME'); ?>">
							<small class="info help-block">
							</small>
						</div>
                     </div>
					 
                     <div class="form-group ">
                        <label for="C_NAME" class="col-sm-2 control-label">Chinese Name 
                        </label>
                        <div class="col-sm-2">
                           <select  class="form-control" name="C_TITLE[]" id="C_TITLE" >
                              <option value="醫生" id="ct0">醫生</option>
                              <option value="先生" id="ct1">先生</option>
                              <option value="太太" id="ct2">太太</option>
                              <option value="女士" id="ct3">女士</option>
                              <option value="小姐" id="ct4">小姐</option>
                           </select>
						   <small class="info help-block">
						   </small>
                        </div>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME'); ?>">
							<small class="info help-block">
							</small>
						</div>
                     </div>

                     <div class="form-group  wrapper-options-crud">
                        <label for="GENDER" class="col-sm-2 control-label">Gender 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="M" checked> M                                    </label>
							  <small class="info help-block">
							  </small>
                           </div>
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="F" > F                                    </label>
							  <small class="info help-block">
							  </small>
                           </div>
						   
                        </div>
                     </div>

                     <div class="form-group  wrapper-options-crud">
                        <label for="TYPE" class="col-sm-2 control-label">Type
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                           <?php foreach (db_get_all_data('doctor_type_desc') as $index=>$row): ?>
                           <div class="col-md-3  padding-left-0">
                              <label>
                              <input type="checkbox" class="flat-red" name="TYPE[]" value="<?= $row->DT_CODE ?>"> <?= $row->DT_CODE; ?>
                              </label>
                           </div>
                           <?php endforeach; ?>    
							<small class="info help-block">
							</small>
						</div>
                     </div>
                     <div class="form-group ">
                        <label for="MOBILE" class="col-sm-2 control-label">Mobile 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE'); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
						
						 <label for="MOBILE" class="col-sm-2 control-label">Pager 
                        </label>
						<div class="col-sm-3">
                           <input type="text" class="form-control" name="PAGER" id="PAGER" value="<?= set_value('PAGER'); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					 <div class="form-group ">
						<label for="EMAIL" class="col-sm-2 control-label">Email 
                        </label>
                        <div class="col-sm-3">
                           <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL'); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
					 
						<label for="LANG" class="col-sm-2 control-label">Special Language 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="LANG" id="LANG" placeholder='Except "English" and "Chinese"' value="<?= set_value('LANG'); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>
                    
                     <div class="form-group">
                        <label for="DOB" class="col-sm-2 control-label">DOB
                        </label>
                        <div class="col-sm-3">
                           <input type="text" name="DOB" id="DOB" class="form-control datepicker pull-right " >
                           <small class="info help-block">
                           </small>
                        </div>
						
						<label for="HKID" class="col-sm-2 control-label">HKID 
                        </label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID'); ?>">
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
                        </label>
                        <div class="col-sm-4">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
                        </label>
                        <div class="col-sm-4">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
                        </label>
                        <div class="col-sm-4">
                           <div class="input-group date col-sm-12">
                              <input type="text" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="GP_REG_NO" class="col-sm-2 control-label">GP Reg No. 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required" name="GP_REG_NO" id="GP_REG_NO" value="<?= set_value('GP_REG_NO'); ?>" >
							<small class="info help-block">
                           </small>
						</div>
						
						<label for="SP_REG_NO" class="col-sm-2 control-label">SP Reg No. 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control cust-required" name="SP_REG_NO" id="SP_REG_NO" value="<?= set_value('SP_REG_NO'); ?>" >
							<small class="info help-block">
                           </small>
						</div>
                     </div>

					 
					 <!--------- Specialty 1 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE1" class="col-sm-2 control-label">Specialty
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-1" name="SP_CODE1">
									<option value=""></option>
								   <?php 
								   
								   $this->db->group_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-1 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 1)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-1">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-1"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 1 --------->
					 
					 
					 <!--------- Specialty 2 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE2" class="col-sm-2 control-label">
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-2" name="SP_CODE2">
									<option value=""></option>
								   <?php 
								   
								   $this->db->group_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-2 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 2)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-2">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-2"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 2 --------->
					
					 
					 <!--------- Specialty 3 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE3" class="col-sm-2 control-label">
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-3" name="SP_CODE3">
									<option value=""></option>
								   <?php 
								   
								   $this->db->group_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-3 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 3)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-3">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-3"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 3 --------->

					 
					 <!--------- Specialty 4 --------->
					 <div class="sp-div">
						 <div class="form-group ">
							<label for="SP_CODE4" class="col-sm-2 control-label">
							</label>
							<div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect sp-code-change sp-code-4" name="SP_CODE4">
									<option value=""></option>
								   <?php 
								   
								   $this->db->group_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>"><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
								</small>
							</div>
						 </div>
						 
						<div class="expand-medical-4 expand-medical">
							<div class="form-group expand-medical-label">
								<label class="col-sm-2"></label>
								<p class="col-sm-3">Medical Procedures (Specialty 4)  <i class="fa fa-angle-down"></i></p>
							</div>
							
							<div class="form-group expand-medical-list-4">
								<label class="col-sm-2"></label>
								<div class="col-sm-9">
									<p class="medical-list-4"></p>
								</div>
							</div>
							<small class='info help-block'>　</small>
						</div>
					</div>

					<!--------- End Specialty 4 --------->
					
					
					
					<small class="info help-block">　</small>
					 
                     <div class="form-group ">
                        <label for="ADMISSION_RIGHT" class="col-sm-2 control-label">Admission Right
                        </label>
                        <div class="col-sm-9">
							<?php 
							
								$this->db->order_by("SHORT_NAME", "ASC");
								foreach (db_get_all_data('admission_right') as $row): 
							?>
							<div class="col-md-6  padding-left-0">
							<input type="checkbox" class="flat-red" name="ADMISSION_RIGHT[]" value="<?= $row->SHORT_NAME ?>"> 
							<?= $row->HOSPITAL_NAME; ?><?= " &nbsp; (".$row->SHORT_NAME.")"; ?>
							<small class="info help-block">
                           </small>
							</div>
							<?php endforeach; ?>  
						</div>
					</div>
					
					
					<small class="info help-block">　</small>


                     <div class="form-group ">
                        <label for="REMARK" class="col-sm-2 control-label">Remark 
                        </label>
                        <div class="col-sm-8">
                           <textarea id="REMARK" name="REMARK" rows="5" cols="80"><?= set_value('REMARK'); ?></textarea>
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>

                  </div>
				  
				  <div id="paymentDiv">
					<h1>Doctor Payment</h1>
					
					<div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Cheque
                        </label>
                     </div>
					 
					<div class="form-group ">
					   <label for="PAYEE_NAME" class="col-sm-2 control-label">Payee Name
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" value="<?= set_value('PAYEE_NAME'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" value="<?= set_value('PAYEE_ADDR1'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" value="<?= set_value('PAYEE_ADDR2'); ?>">
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" value="<?= set_value('PAYEE_ADDR3'); ?>">
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" value="<?= set_value('PAYEE_ADDR4'); ?>">
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" value="<?= set_value('PAYEE_ADDR5'); ?>">
						<small class="info help-block">
                              </small>
					  </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
					   </label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" value="<?= set_value('PAYEE_DISTRICT'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					
					<div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Auto Pay
                        </label>
                     </div>
					<div class="form-group ">
					   <label for="BANK_CLEARING_CODE" class="col-sm-2 control-label">Bank
					   </label>
					   <div class="col-sm-8">
						  <div>
							 <select  class="form-control chosen chosen-select-deselect" name="BANK_CLEARING_CODE" id="BANK_CLEARING_CODE">
								<option value=""></option>
								<?php foreach (db_get_all_data('bank') as $row): ?>
								<option value="<?= $row->CLEARING_CODE ?>"><?= $row->C_NAME; ?> &nbsp; <?= $row->E_NAME; ?></option>
								<?php endforeach; ?>  
							 </select>
							 <small class="info help-block">
                              </small>
						  </div>
					   </div>
					</div>
					<div class="form-group ">
					   <label for="ACCOUNT_NO" class="col-sm-2 control-label">Account No.
					   </label>
					   <div class="col-sm-8">
						  <div>
							 <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO">
							 <small class="info help-block">
                              </small>
						  </div>
					   </div>
					</div>
					<div class="form-group ">
					   <label for="ACCOUNT_HOLDER" class="col-sm-2 control-label">Account Holder
					   </label>
					   <div class="col-sm-8">
						  <div>
							 <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER">
							 <br><br><br>
						  </div>
					   </div>
					</div>
				  </div>
				  
				<div class="form-group insert-consult">
				<br>
					<label for="INSERT_CONSULT" class="col-sm-4 control-label">Insert Center and Consultation 
                    </label>
					<input type="checkbox" class="flat-red" name="INSERT_CONSULT[]" value="1">
					<small class="info help-block">
                    </small>
					<br>
				</div>
				  
				<div id="center_code_div">
					<div class="form-group ">
						<label class="col-sm-2"></label>
						<div class="col-sm-8">
							<p>Please choose one: <i class="required">*</i></p>
							
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2"></label>
						<div class="col-sm-8">
						   <div class="col-md-3 padding-left-0">
							  <label>
							  <input type="radio" name="HV_CENTER" value=1 checked>Existing Center                                 </label>
							  <small class="info help-block">
							  </small>
						   </div>
						   <div class="col-md-3 padding-left-0">
							  <label>
							  <input type="radio" name="HV_CENTER" value=0 >New Center                                    </label>
							  <small class="info help-block">
							  </small>
						   </div>
						   
						</div>
					 </div>
					 
					<div class="form-group cust-exist-center">
					 <label class="col-sm-2"></label>
					  <div class="col-sm-4 cust-required-select">
						  <select class="form-control chosen chosen-select-deselect" data-placeholder="Select an Existing Center" name="CENTER_CODE_SELECT" id="CENTER_CODE_SELECT">
							 <option value=""</option>
							 <?php foreach (db_get_all_data('center') as $index=>$row): ?>
							 <option value="<?= $row->CENTER_CODE; ?>"><?= $row->CENTER_CODE; ?></option>
							 <?php endforeach; ?>  
						  </select>
						</div>
					  <small class="info help-block">
					  </small>
					</div>
				
					<div class="form-group cust-new-center">
					  <label for="CENTER_CODE" class="col-sm-2 control-label">New Center
					  <i class="required">*</i>
					  </label>
					  <div class="col-sm-4">
						 <input type="text" class="form-control cust-required" name="CENTER_CODE" id="CENTER_CODE" value="<?= set_value('CENTER_CODE', "OWN-"); ?>">
						 <small class="info help-block">Please input the New Center Code
						 </small>
					  </div>
					</div>
					
					<hr>
				</div>
					  
				<div id="centerDiv">
					<div class="form-group ">
						  
					  <label for="OPEN_AFTER_EIGHT" class="col-sm-2 control-label">Open After 8:00pm
						<input type="checkbox" class="flat-red center-checkbox" id="OPEN_AFTER_EIGHT" name="OPEN_AFTER_EIGHT[]" value="1"></label>
					  </label>
				   </div>
					   
				   <div class="form-group ">
					  <label for="CENTER_E_NAME" class="col-sm-2 control-label">Center English Name 
					  </label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="CENTER_E_NAME" id="CENTER_E_NAME" value="<?= set_value('CENTER_E_NAME'); ?>">
						<small class="info help-block">
						 </small>
					  </div>
					  
					  <label for="CENTER_C_NAME" class="col-sm-2 control-label">Center Chinese Name 
					  </label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="CENTER_C_NAME" id="CENTER_C_NAME" value="<?= set_value('CENTER_C_NAME'); ?>">
						 <small class="info help-block">
						 </small>
					  </div>
					  
					  <label class="col-sm-2">Area & District
						<small class="info help-block">
						</small>
					   </label>
				   </div>
				   
				   <div class="form-group ">
					  <label for="CENTER_C_NAME" class="col-sm-2 control-label">English Addr 
					  </label>
					  
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR1" id="E_ADDR1" placeholder="Address line 1" value="<?= set_value('E_ADDR1'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  <label for="CENTER_C_NAME" class="col-sm-2 control-label">Chinese Addr 
					  </label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR1" id="C_ADDR1" placeholder="Address line 1" value="<?= set_value('C_ADDR1'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  
					   <div class="col-sm-2 select-region">
							<select  class="form-control chosen chosen-select-deselect center-checkbox" data-placeholder="Select an Area" name="AREA" id="AREA">
								<option value=""></option>
								<?php $this->db->group_by("REGION"); foreach (db_get_all_data('hk_district') as $row): ?>
								<option value="<?= $row->REGION ?>"><?= $row->REGION; ?></option>
								<?php endforeach; ?>  
							</select>
							<small class="info help-block">
							</small>
						</div>
						
						<div class="col-sm-2 input-region">
							<input type="text" class="form-control reset-center-select" name="AREA_SELECT" id="AREA_SELECT" value="" readonly>
						</div>
					  
				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR2" id="E_ADDR2" placeholder="Address line 2" value="<?= set_value('E_ADDR2'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR2" id="C_ADDR2" placeholder="Address line 2" value="<?= set_value('C_ADDR2'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  
						
						<div class="col-sm-2 select-region">
							<select  class="form-control chosen chosen-select-deselect center-checkbox" data-placeholder="Select a District" name="DISTRICT" id="DISTRICT" >
								<option value=""></option>
								<?php foreach (db_get_all_data('hk_district') as $row): ?>
								<option value="<?= $row->AUTO_NO ?>"><?= $row->ENG_DISTRICT; ?>&nbsp;<?= $row->CHI_DISTRICT; ?></option>
								<?php endforeach; ?>   
							</select>
						</div>
						
						<div class="col-sm-2 input-region">
							<input type="text" class="form-control reset-center-select" name="DISTRICT_SELECT" id="DISTRICT_SELECT" value="" readonly>
						</div>
				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR3" id="E_ADDR3" placeholder="Address line 3" value="<?= set_value('E_ADDR3'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR3" id="C_ADDR3" placeholder="Address line 3" value="<?= set_value('C_ADDR3'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  
				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR4" id="E_ADDR4" placeholder="Address line 4" value="<?= set_value('E_ADDR4'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR4" id="C_ADDR4" placeholder="Address line 4" value="<?= set_value('C_ADDR4'); ?>">
						<small class="info help-block">
						</small>
					  </div>
				   </div>
				   
				   <div class="form-group ">
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="E_ADDR5" id="E_ADDR5" placeholder="Address line 5" value="<?= set_value('E_ADDR5'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
					  <label class="col-sm-2"></label>
					  <div class="col-sm-3">
						 <input type="text" class="form-control center-input reset-center-select" name="C_ADDR5" id="C_ADDR5" placeholder="Address line 5" value="<?= set_value('C_ADDR5'); ?>">
						<small class="info help-block">
						</small>
					  </div>
					  
				   </div>						   
					
				   <div class="form-group ">
					  <label for="TEL" class="col-sm-2 control-label">Tel 
					  </label>
					  <div class="col-sm-8">
						 <input type="text" class="form-control center-input reset-center-select" name="TEL" id="TEL" value="<?= set_value('TEL'); ?>">
						 <small class="info help-block">
						 </small>
					  </div>						  
				   </div>
				   
				   <div class="form-group ">
						<label for="FAX" class="col-sm-2 control-label">Fax 
						</label>
						<div class="col-sm-8">
							 <input type="text" class="form-control center-input reset-center-select" name="FAX" id="FAX" value="<?= set_value('FAX'); ?>">
							 <small class="info help-block">
							 </small>
						</div>
					</div>
				</div>
				  
				  
				<div id="consultDiv">
					<!--	Schedule day 1	-->
					<br>
					
					<div class="form-group">
						<label for="CONTACT_PERSON" class="col-sm-2 control-label">Contact Person 
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="CONTACT_PERSON" id="CONTACT_PERSON" value="<?= set_value('CONTACT_PERSON'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					
					<div class="form-group">
						<div class="cust-d" id="cust-d1">
						   <label for="SCHEDULE_DAY_C1" class="col-sm-2 control-label">Opening hours1
						   <i class="required">*</i>
						   </label>
						   <div class="col-sm-2">
							  <select class="form-control cust-schedule-day-c1 cust-required" name="SCHEDULE_DAY_C1[]" id="SCHEDULE_DAY_C1" >
								 <option value=""></option>
								 <option value="星期一至五">星期一至五</option>
								 <option value="星期六、日" >星期六、日</option>
								 <option value="星期一">星期一</option>
								 <option value="星期二">星期二</option>
								 <option value="星期三">星期三</option>
								 <option value="星期四">星期四</option>
								 <option value="星期五">星期五</option>
								 <option value="星期六">星期六</option>
								 <option value="星期日">星期日</option>
								 <option value="公眾假期">公眾假期</option>
								 <option value="其他">其他 (於Timeslot欄列明)</option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						   <div class="col-sm-2">
							  <select class="form-control cust-schedule-day-e1 cust-required" name="SCHEDULE_DAY_E1[]" id="SCHEDULE_DAY_E1" >
								 <option value=""></option>
								 <option value="Mon to Fri">Mon to Fri</option>
								 <option value="Sat and Sun">Sat and Sun</option>
								 <option value="Monday">Monday</option>
								 <option value="Tuesday">Tuesday</option>
								 <option value="Wednesday">Wednesday</option>
								 <option value="Thursday">Thursday</option>
								 <option value="Friday">Friday</option>
								 <option value="Saturday">Saturday</option>
								 <option value="Sunday">Sunday</option>
								 <option value="Public holiday">Public holiday</option>
								 <option value="Other">Other (Specify on Timeslot)</option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
					   <div class="col-sm-4">
						  <input type="text" class="form-control cust-required" name="TIMESLOT1_1" id="TIMESLOT1_1" placeholder="Opening hours 1 : Timeslot 1" value="<?= set_value('TIMESLOT1_1'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					
					
					<div class="form-group">
					   <label class="col-sm-6"></label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT1_2" id="TIMESLOT1_2" placeholder="Opening hours 1 : Timeslot 2" value="<?= set_value('TIMESLOT1_2'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label class="col-sm-6"></label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT1_3" id="TIMESLOT1_3" placeholder="Opening hours 1 : Timeslot 3" value="<?= set_value('TIMESLOT1_3'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<!--	End Schedule day 1	-->
					<br><br>
					<!--	Schedule day 2	-->
					<div class="form-group">
						<div class="cust-d" id="cust-d2">
						   <label for="SCHEDULE_DAY_C2" class="col-sm-2 control-label">Opening hours2
						   </label>
						   <div class="col-sm-2">
							  <select class="form-control cust-schedule-day-c2" name="SCHEDULE_DAY_C2[]" id="SCHEDULE_DAY_C2" >
								 <option value=""></option>
								 <option value="星期一至五">星期一至五</option>
								 <option value="星期六、日" >星期六、日</option>
								 <option value="星期一">星期一</option>
								 <option value="星期二">星期二</option>
								 <option value="星期三">星期三</option>
								 <option value="星期四">星期四</option>
								 <option value="星期五">星期五</option>
								 <option value="星期六">星期六</option>
								 <option value="星期日">星期日</option>
								 <option value="公眾假期">公眾假期</option>
								 <option value="其他">其他 (於Timeslot欄列明)</option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						   <div class="col-sm-2">
							  <select class="form-control cust-schedule-day-e2" name="SCHEDULE_DAY_E2[]" id="SCHEDULE_DAY_E2" >
								 <option value=""></option>
								 <option value="Mon to Fri">Mon to Fri</option>
								 <option value="Sat and Sun">Sat and Sun</option>
								 <option value="Monday">Monday</option>
								 <option value="Tuesday">Tuesday</option>
								 <option value="Wednesday">Wednesday</option>
								 <option value="Thursday">Thursday</option>
								 <option value="Friday">Friday</option>
								 <option value="Saturday">Saturday</option>
								 <option value="Sunday">Sunday</option>
								 <option value="Public holiday">Public holiday</option>
								 <option value="Other">Other (Specify on Timeslot)</option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
					   </div>
					   
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT2_1" id="TIMESLOT2_1" placeholder="Opening hours 2 : Timeslot 1" value="<?= set_value('TIMESLOT2_1'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label class="col-sm-6"></label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT2_2" id="TIMESLOT2_2" placeholder="Opening hours 2 : Timeslot 2" value="<?= set_value('TIMESLOT2_2'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label class="col-sm-6"></label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT2_3" id="TIMESLOT2_3" placeholder="Opening hours 2 : Timeslot 3" value="<?= set_value('TIMESLOT2_3'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<!--	End Schedule day 2	-->
					<br><br>
					<!--	Schedule day 3	-->
					<div class="form-group">
						<div class="cust-d" id="cust-d3">
						   <label for="SCHEDULE_DAY_C3" class="col-sm-2 control-label">Opening hours3
						   </label>
						   <div class="col-sm-2">
							  <select class="form-control cust-schedule-day-c3" name="SCHEDULE_DAY_C3[]" id="SCHEDULE_DAY_C3" >
								 <option value=""></option>
								 <option value="星期一至五">星期一至五</option>
								 <option value="星期六、日" >星期六、日</option>
								 <option value="星期一">星期一</option>
								 <option value="星期二">星期二</option>
								 <option value="星期三">星期三</option>
								 <option value="星期四">星期四</option>
								 <option value="星期五">星期五</option>
								 <option value="星期六">星期六</option>
								 <option value="星期日">星期日</option>
								 <option value="公眾假期">公眾假期</option>
								 <option value="其他">其他 (於Timeslot欄列明)</option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						   <div class="col-sm-2">
							  <select class="form-control cust-schedule-day-e3" name="SCHEDULE_DAY_E3[]" id="SCHEDULE_DAY_E3" >
								 <option value=""></option>
								 <option value="Mon to Fri">Mon to Fri</option>
								 <option value="Sat and Sun">Sat and Sun</option>
								 <option value="Monday">Monday</option>
								 <option value="Tuesday">Tuesday</option>
								 <option value="Wednesday">Wednesday</option>
								 <option value="Thursday">Thursday</option>
								 <option value="Friday">Friday</option>
								 <option value="Saturday">Saturday</option>
								 <option value="Sunday">Sunday</option>
								 <option value="Public holiday">Public holiday</option>
								 <option value="Other">Other (Specify on Timeslot)</option>
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT3_1" id="TIMESLOT3_1" placeholder="Opening hours 3 : Timeslot 1" value="<?= set_value('TIMESLOT3_1'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label class="col-sm-6"></label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT3_2" id="TIMESLOT3_2" placeholder="Opening hours 3 : Timeslot 2" value="<?= set_value('TIMESLOT3_2'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label class="col-sm-6"></label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="TIMESLOT3_3" id="TIMESLOT3_3" placeholder="Opening hours 3 : Timeslot 3" value="<?= set_value('TIMESLOT3_3'); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<!--	End Schedule day 3	-->
					
					<br>
					
					<div class="form-group ">
					   <label class="col-sm-8"></label>
					   <div id="addBtn" class="col-sm-2" style="float:right;margin-right:15%;">
						  <a  class="btn btn-primary" id="more-day" style="width: 120px;">More day</a>
						  <small class="info help-block">　</small>
					   </div>
					</div>
					
					<br>
					
					<div class="form-group more-schedule">
					   <!--	Schedule day 4	-->
					   <div class="form-group">
						<div class="cust-d" id="cust-d4">
							  <label for="SCHEDULE_DAY_C4" class="col-sm-2 control-label">Opening hours4
							  </label>
							  <div class="col-sm-2">
								 <select class="form-control cust-schedule-day-c4" name="SCHEDULE_DAY_C4[]" id="SCHEDULE_DAY_C4" >
									<option value=""></option>
									<option value="星期一至五">星期一至五</option>
									<option value="星期六、日" >星期六、日</option>
									<option value="星期一">星期一</option>
									<option value="星期二">星期二</option>
									<option value="星期三">星期三</option>
									<option value="星期四">星期四</option>
									<option value="星期五">星期五</option>
									<option value="星期六">星期六</option>
									<option value="星期日">星期日</option>
									<option value="公眾假期">公眾假期</option>
									<option value="其他">其他 (於Timeslot欄列明)</option>
								 </select>
								 <small class="info help-block">
								 </small>
							  </div>
							  <div class="col-sm-2">
								 <select class="form-control cust-schedule-day-e4" name="SCHEDULE_DAY_E4[]" id="SCHEDULE_DAY_E4" >
									<option value=""></option>
									<option value="Mon to Fri">Mon to Fri</option>
									<option value="Sat and Sun">Sat and Sun</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
									<option value="Public holiday">Public holiday</option>
									<option value="Other">Other (Specify on Timeslot)</option>
								 </select>
								 <small class="info help-block">
								 </small>
							  </div>
							</div>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT4_1" id="TIMESLOT4_1" placeholder="Opening hours 4 : Timeslot 1" value="<?= set_value('TIMESLOT4_1'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <div class="form-group ">
						  <label class="col-sm-6"></label>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT4_2" id="TIMESLOT4_2" placeholder="Opening hours 4 : Timeslot 2" value="<?= set_value('TIMESLOT4_2'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <div class="form-group ">
						  <label class="col-sm-6"></label>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT4_3" id="TIMESLOT4_3" placeholder="Opening hours 4 : Timeslot 3" value="<?= set_value('TIMESLOT4_3'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <!--	End Schedule day 4	-->
					   
					   <br><br>
					   
					   <!--	Schedule day 5	-->
					   <div class="form-group">
							<div class="cust-d" id="cust-d5">
								  <label for="SCHEDULE_DAY_C5" class="col-sm-2 control-label">Opening hours5
								  </label>
								  <div class="col-sm-2">
									 <select class="form-control cust-schedule-day-c5" name="SCHEDULE_DAY_C5[]" id="SCHEDULE_DAY_C5" >
										<option value=""></option>
										<option value="星期一至五">星期一至五</option>
										<option value="星期六、日" >星期六、日</option>
										<option value="星期一">星期一</option>
										<option value="星期二">星期二</option>
										<option value="星期三">星期三</option>
										<option value="星期四">星期四</option>
										<option value="星期五">星期五</option>
										<option value="星期六">星期六</option>
										<option value="星期日">星期日</option>
										<option value="公眾假期">公眾假期</option>
										<option value="其他">其他 (於Timeslot欄列明)</option>
									 </select>
									 <small class="info help-block">
									 </small>
								  </div>
								  <div class="col-sm-2">
									 <select class="form-control cust-schedule-day-e5" name="SCHEDULE_DAY_E5[]" id="SCHEDULE_DAY_E5" >
										<option value=""></option>
										<option value="Mon to Fri">Mon to Fri</option>
										<option value="Sat and Sun">Sat and Sun</option>
										<option value="Monday">Monday</option>
										<option value="Tuesday">Tuesday</option>
										<option value="Wednesday">Wednesday</option>
										<option value="Thursday">Thursday</option>
										<option value="Friday">Friday</option>
										<option value="Saturday">Saturday</option>
										<option value="Sunday">Sunday</option>
										<option value="Public holiday">Public holiday</option>
										<option value="Other">Other (Specify on Timeslot)</option>
									 </select>
									 <small class="info help-block">
									 </small>
								  </div>
							</div>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT5_1" id="TIMESLOT5_1" placeholder="Opening hours 5 : Timeslot 1" value="<?= set_value('TIMESLOT5_1'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
						</div>
							
						   <div class="form-group ">
							  <label class="col-sm-6"></label>
							  <div class="col-sm-4">
								 <input type="text" class="form-control" name="TIMESLOT5_2" id="TIMESLOT5_2" placeholder="Opening hours 5 : Timeslot 2" value="<?= set_value('TIMESLOT5_2'); ?>">
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>

					   <div class="form-group ">
						  <label class="col-sm-6"></label>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT5_3" id="TIMESLOT5_3" placeholder="Opening hours 5 : Timeslot 3" value="<?= set_value('TIMESLOT5_3'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <!--	End Schedule day 5	-->
					   
					   <br><br>
					   
					   <!--	Schedule day 6	-->
					   <div class="form-group">
						<div class="cust-d" id="cust-d6">
							  <label for="SCHEDULE_DAY_C6" class="col-sm-2 control-label">Opening hours6
							  </label>
							  <div class="col-sm-2">
								 <select class="form-control cust-schedule-day-c6" name="SCHEDULE_DAY_C6[]" id="SCHEDULE_DAY_C6" >
									<option value=""></option>
									<option value="星期一至五">星期一至五</option>
									<option value="星期六、日" >星期六、日</option>
									<option value="星期一">星期一</option>
									<option value="星期二">星期二</option>
									<option value="星期三">星期三</option>
									<option value="星期四">星期四</option>
									<option value="星期五">星期五</option>
									<option value="星期六">星期六</option>
									<option value="星期日">星期日</option>
									<option value="公眾假期">公眾假期</option>
									<option value="其他">其他 (於Timeslot欄列明)</option>
								 </select>
								 <small class="info help-block">
								 </small>
							  </div>
							  <div class="col-sm-2">
								 <select class="form-control cust-schedule-day-e6" name="SCHEDULE_DAY_E6[]" id="SCHEDULE_DAY_E6" >
									<option value=""></option>
									<option value="Mon to Fri">Mon to Fri</option>
									<option value="Sat and Sun">Sat and Sun</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
									<option value="Public holiday">Public holiday</option>
									<option value="Other">Other (Specify on Timeslot)</option>
								 </select>
								 <small class="info help-block">
								 </small>
							  </div>
							</div>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT6_1" id="TIMESLOT6_1" placeholder="Opening hours 6 : Timeslot 1" value="<?= set_value('TIMESLOT6_1'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <div class="form-group ">
						  <label class="col-sm-6"></label>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT6_2" id="TIMESLOT6_2" placeholder="Opening hours 6 : Timeslot 2" value="<?= set_value('TIMESLOT6_2'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <div class="form-group ">
						  <label class="col-sm-6"></label>
						  <div class="col-sm-4">
							 <input type="text" class="form-control" name="TIMESLOT6_3" id="TIMESLOT6_3" placeholder="Opening hours 6 : Timeslot 3" value="<?= set_value('TIMESLOT6_3'); ?>">
							 <small class="info help-block">
							 </small>
						  </div>
					   </div>
					   <!--	End Schedule day 6	-->
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
		
		$(".expand-medical").hide();

		jQuery(window).on("load", function(){
			$("#paymentDiv").hide();
			$("#center_code_div").hide();
			$(".cust-new-center").hide();
			$("#centerDiv").hide();
			$("#consultDiv").hide();
			$(".insert-consult").hide();
			
			
			$(".center-checkbox").prop('disabled', true).trigger("chosen:updated");
			$(".center-input").attr('readonly', true);
			$(".select-region").hide();
			
			$(".more-schedule").hide();

		});
		
		$('#AREA').change(function() {
			var area = $("#AREA").val();
			
			if (area != ""){
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/center/search_district/',
					data:{'area': area},
					dataType: "json",
					success: function(data) {
						$("#DISTRICT").empty();
						
						$.each(data['district'], function(index, val) {
						  $('#DISTRICT').append("<option value='" + val.AUTO_NO + "'>" + val.ENG_DISTRICT + "  &nbsp;  " + val.CHI_DISTRICT + "</option>");
						});
						
						$("#DISTRICT")[0].selectedIndex = 0;
						$('#DISTRICT').trigger("chosen:updated");
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}else{
				$("#DISTRICT").empty();
				
				$('#DISTRICT').append("<option value=''></option>");
				
				  $('#DISTRICT').append("<?php foreach (db_get_all_data('hk_district') as $row): ?>" + "<option value='<?= $row->AUTO_NO ?>'><?= $row->ENG_DISTRICT; ?>  &nbsp;  <?= $row->CHI_DISTRICT; ?></option><?php endforeach; ?>");
				
				$("#DISTRICT")[0].selectedIndex = -1;
				$('#DISTRICT').trigger("chosen:updated");
			}
			
			
		});
		
		$('#DISTRICT').change(function() {
			var auto_no = $("#DISTRICT").val();
			
			if (auto_no != ""){

				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/center/search_area/',
					data:{'auto_no': auto_no},
					dataType: "json",
					success: function(data) {
						
						var area = data['area'].REGION;
						
						if (area != $("#AREA").val()){
							$('#AREA option[value=' + area +']').prop('selected',true);
							$('#AREA').trigger("chosen:updated");
						}
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
			
			}else{
				$("#DISTRICT")[0].selectedIndex = -1;
				$('#DISTRICT').trigger("chosen:updated");
			}
			
		});
		
		
		$("#more-day").click(function() {
			
			if ($("#more-day").text() == "More day"){
				$("#more-day").removeClass("btn-primary");
				$("#more-day").addClass("btn-danger");
				$("#more-day").text("Hide more day");
				
				$(".more-schedule").slideDown("slow");
				
			}else{
				$("#more-day").removeClass("btn-danger");
				$("#more-day").addClass("btn-primary");
				$("#more-day").text("More day");
				
				$(".more-schedule").slideUp("slow");
			}
			
		});
		
		//Auto change schedule-day
		$(".cust-d").change(function(e) {
			var schedule_day = $(this).attr("id");
			schedule_day = schedule_day.substr(schedule_day.length - 1);

			var is_chi = $(e.target).hasClass("cust-schedule-day-c" + schedule_day);
			var index = $(e.target)[0].selectedIndex;

			if (is_chi){
				$(".cust-schedule-day-e" + schedule_day)[0].selectedIndex = index;
			}else{
				$(".cust-schedule-day-c" + schedule_day)[0].selectedIndex = index;
			}
			
		});

		$("input[name='HV_CENTER").on("change",function(){
			
			var hv_center = $(this).val();
			
			if (hv_center > 0){
				$(".cust-exist-center").show();
				$(".cust-new-center").hide();
				$(".center-checkbox").prop('disabled', true).trigger("chosen:updated");
				$(".center-input").attr('readonly', true);
				$(".select-region").hide();
				$(".input-region").show();
				
				$('.reset-center-select').val("");
				$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
				$("#CENTER_CODE_SELECT")[0].selectedIndex = -1;
				$("#CENTER_CODE_SELECT").trigger("chosen:updated");
				
			}else{
				$(".cust-exist-center").hide();
				$(".cust-new-center").show();
				$(".center-checkbox").prop('disabled', false).trigger("chosen:updated");
				$(".center-input").attr('readonly', false);
				$(".select-region").show();
				$(".input-region").hide();
				
				$('.reset-center-select').val("");
				$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
			}
			
		});
		
		
		
		$("#DR_CODE").keyup(function(){
			var dr_code = $(this).val();
			var center_code = $("#CENTER_CODE").val();
			
			if (center_code != ""){
				$("#CENTER_CODE").val("OWN-" + dr_code);
			}
			
		});
		
		
		
		$('#CENTER_CODE_SELECT').on('change',function(){
			
			var center_selected = $(this).val();
			
			$('.reset-center-select').val("");
			$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
			
			
			if (center_selected == ""){
				$('#CENTER_CODE_SELECT').prop("disabled", false).trigger("chosen:updated");
			}else{
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/find_center/',
					data:{'center_code': center_selected},
					dataType: "json",
					success: function(data) {
						
						var center = data['center'];
						
						$("#CENTER_E_NAME").val(center.E_NAME);
						$("#CENTER_C_NAME").val(center.C_NAME);
						$("#E_ADDR1").val(center.E_ADDR1);
						$("#E_ADDR2").val(center.E_ADDR2);
						$("#E_ADDR3").val(center.E_ADDR3);
						$("#E_ADDR4").val(center.E_ADDR4);
						$("#E_ADDR5").val(center.E_ADDR5);
						$("#DISTRICT_SELECT").val(center.E_DISTRICT + "  " + center.C_DISTRICT);
						$("#C_ADDR1").val(center.C_ADDR1);
						$("#C_ADDR2").val(center.C_ADDR2);
						$("#C_ADDR3").val(center.C_ADDR3);
						$("#C_ADDR4").val(center.C_ADDR4);
						$("#C_ADDR5").val(center.C_ADDR5);
						$("#AREA_SELECT").val(center.AREA);
						$("#TEL").val(center.TEL);
						$("#FAX").val(center.FAX);
						
						if (center.OPEN_AFTER_EIGHT > 0){
							$("#OPEN_AFTER_EIGHT").prop("checked", true).iCheck('update');
						}else{
							$("#OPEN_AFTER_EIGHT").prop("checked", false).iCheck('update');
						}
						
					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				$('#CENTER_CODE_SELECT').prop("disabled", false).trigger("chosen:updated");
				
			}
			
		});
		
		
		$("input[name='INSERT_CONSULT[]'").on("ifChecked",function(){
			var is_center = $("#center_tab").parent().hasClass("active");

			$('#center_code_div').show();
			
			if (is_center){
				$('#centerDiv').show();
				$('#consultDiv').hide();
			}else{
				$('#centerDiv').hide();
				$('#consultDiv').show();
			}
			

		}).on("ifUnchecked",function(){
			$('#center_code_div').hide();
			$('#centerDiv').hide();
			$('#consultDiv').hide();
		});

		

		//Append Medical Procedures
		$('.sp-code-change').on('change',function(){
			var sp_code = $(this).val();
			var sp_num = 0;
			
			if ($(this).hasClass('sp-code-1')){
				sp_num = 1;
			}else if ($(this).hasClass('sp-code-2')){
				sp_num = 2;
			}else if ($(this).hasClass('sp-code-3')){
				sp_num = 3;
			}else{
				sp_num = 4;
			}
			
			var expand_medical = ".expand-medical-" + sp_num;
			var medical_list = ".medical-list-" + sp_num;
			
			$(this).prop('disabled', true).trigger("chosen:updated");
			$(expand_medical).slideUp();
		
			if (sp_code != ""){

				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/find_procedures/',
					data:{'sp_code': sp_code},
					dataType: "json",
					success: function(data) {
						
						$(medical_list).text("");
						
						if (data['has_medical_procedures']){
							$.each(data['medical_procedures'], function(index, val) {
							
								$(medical_list).append("<div class='col-md-6  padding-left-0'><input type='checkbox' class='flat-red' name='MEDICAL_PROCEDURES" + sp_num + "[]' value='" + 
								val.AUTO_NO + "'>" + val.CLINIC_PROCEDURE + "<small class='info help-block'>" + "</small></div>");
								
							});
							
						}else{
							$(medical_list).append("(No medical procedures)");
						}
						
						
						$('input[type="checkbox"].flat-red').iCheck({
							checkboxClass: 'icheckbox_flat-green',
							radioClass: 'iradio_flat-green'
						  });
						
						
						$(expand_medical).slideDown();
						$('.sp-code-change').prop('disabled', false).trigger("chosen:updated");
						

					},
					error: function(jqXHR) {
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}else{
				$(expand_medical).slideUp();
				$('.sp-code-change').prop('disabled', false).trigger("chosen:updated");
			}
			
			
		});
		
		
		//Control medical-list toggleSlide
		$('.expand-medical-label').on('click',function(){
			var sp_num = 0;

			if ($(this).parent().hasClass('expand-medical-1')){
				sp_num = 1;
			}else if ($(this).parent().hasClass('expand-medical-2')){
				sp_num = 2;
			}else if ($(this).parent().hasClass('expand-medical-3')){
				sp_num = 3;
			}else{
				sp_num = 4;
			}
			
			var expand_list = ".expand-medical-list-" + sp_num;
			$(expand_list).slideToggle();
		});
		



	   $('#doctor_tab').on('click',function(){
			  $(".insert-consult").hide();
		   
			  $('#doctorDiv').show();
			  $('#paymentDiv').hide();
			  $('#center_code_div').hide();
			  $('#centerDiv').hide();
			  $('#consultDiv').hide();
		});
	   
	   $('#payment_tab').on('click',function(){
			  $(".insert-consult").hide();
			  
			  $('#paymentDiv').show();
			  $('#doctorDiv').hide();
			  $('#center_code_div').hide();
			  $('#centerDiv').hide();
			  $('#consultDiv').hide();
		});
		
		 $('#center_tab').on('click',function(){
			 $(".insert-consult").show();
			 
			 var insert_c = $("input[name='INSERT_CONSULT[]'");
			 
			 if (insert_c.filter(":checked").length > 0){
				$('#center_code_div').show();
				$('#centerDiv').show();
			 }else{
				$('#center_code_div').hide();
				$('#centerDiv').hide();
			 }
			 
			  $('#doctorDiv').hide();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
		});
		
		 $('#consult_tab').on('click',function(){
			 $(".insert-consult").show();
			 
			 var insert_c = $("input[name='INSERT_CONSULT[]'");
			 
			 if (insert_c.filter(":checked").length > 0){
				$('#center_code_div').show();
				$('#consultDiv').show();
			 }else{
				$('#center_code_div').hide();
				$('#consultDiv').hide();
			 }
			 
			  $('#doctorDiv').hide();
			  $('#paymentDiv').hide();
			  $('#centerDiv').hide();
			  
		});
		
		
		var specialty = 0;
		var type_max = 3;
		
		//Limit Type less than 4
		$("input[name='TYPE[]'").on("ifChecked",function(){
			var checkboxes = $("input[name='TYPE[]'");//get all the checkbox
			
			if (checkboxes.filter(":checked").length > type_max) { 
				alert("The max. of doctor's type is 3")
				checkboxes.not(":checked, input[name='TYPE[]'").iCheck('disable'); 
			} else {
				 //else enable it all
				 checkboxes.not(":checked").iCheck('enable'); 
			}
		});

		//Auto change Chi Title
		$("#E_TITLE").change(function() {
			var index = $("#E_TITLE")[0].selectedIndex;
			$("#ct" + index).prop('selected','selected');
			
			if ($(this).val() == "Mr" || $(this).val() == "Dr"){
				$("input[name='GENDER'][value='F']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='M']").prop("checked", true).iCheck('update');

			}else{
				$("input[name='GENDER'][value='M']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='F']").prop("checked", true).iCheck('update');

			}
			
		});
		
		
		//Auto change Eng Title
		$("#C_TITLE").change(function() {
			var index = $("#C_TITLE")[0].selectedIndex;
			$("#et" + index).prop('selected','selected');
			
			if ($(this).val() == "醫生" || $(this).val() == "先生"){
				$("input[name='GENDER'][value='F']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='M']").prop("checked", true).iCheck('update');

			}else{
				$("input[name='GENDER'][value='M']").prop("checked", false).iCheck('update');
				$("input[name='GENDER'][value='F']").prop("checked", true).iCheck('update');

			}
			
		});

		
		//Default Join Date as current date
		var d = new Date();
		var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
		$('#JOIN_DATE').val(strDate);

		
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
              window.location.href = BASE_URL + 'administrator/doctor';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_doctor = $('#form_doctor');
        var data_post = form_doctor.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/doctor/add_save',
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
			
			setTimeout(function(){
				location.reload();
			}, 3000);
			
			$(".expand-medical").hide();
			$("input[name='GENDER'][value='M']").prop("checked", false).iCheck('update');
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
      
       var params = {};
       params[csrf] = token;

    }); /*end doc ready*/
</script>