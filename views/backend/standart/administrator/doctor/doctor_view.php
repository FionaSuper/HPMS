
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Doctor      <small>Detail Doctor</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/doctor'); ?>">Doctor</a></li>
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
                     <a class="nav-link" id="doctor_tab" data-toggle="tab">Doctor</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="payment_tab" data-toggle="tab" >Payment</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="consult_tab" data-toggle="tab">Consultation</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="quali_tab" data-toggle="tab">Qualification</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="spfee_tab" data-toggle="tab">Special Fee</a>
                  </li>
				  <li class="nav-item">
                     <a class="nav-link" id="website_tab" data-toggle="tab">Website Login</a>
                  </li>
               </ul>
			   
			    <!------------------------------- Doctor div ------------------------------->
               <div id="doctor">
                  <div class="form-horizontal" name="form_doctor" id="form_doctor" >

					<small class="info help-block">
					</small>
					
					<div class="view-nav col-sm-12">
					  <?php is_allowed('doctor_update', function($doctor) use ($doctor){?>
					  <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor" href="<?= site_url('administrator/doctor/edit/'.$doctor->DR_CODE); ?>"><i class="fa fa-edit" ></i> Edit Doctor</a><?php }) ?>
					  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
					</div>
					<!-- Doctor info 1 -->
                     <div id="doctor_info1" class="col-sm-12">
						<div class="form-group ">
							<label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
							</label>
							<div class="col-sm-5">
							   <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $doctor->DR_CODE); ?>" disabled>
								<small class="info help-block">
								</small>
							</div>
							
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="STATUS" id="STATUS" value="<?= set_value('STATUS', $doctor->STATUS); ?>" disabled>
								<small class="info help-block">
								</small>
							</div>
						 </div>
						 
						 
						 <div class="form-group ">
							<label for="JOIN_DATE" class="col-sm-2 control-label">Join Date
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE" value="<?= set_value('JOIN_DATE', ($doctor->JOIN_DATE == "0000-00-00" ? "" : $doctor->JOIN_DATE)); ?>" disabled>
								<small class="info help-block">
							 </small>
							</div>
							
							<label for="JOIN_DATE" class="col-sm-2 control-label">Term Date
							</label>
							<div class="col-sm-3">
							   <input type="text" style="margin-bottom:10px;"class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('TERM_DATE', ($doctor->TERM_DATE == "0000-00-00" ? "" : $doctor->TERM_DATE)); ?>" disabled>
							</div>
						</div>
						 
						 <div class="form-group ">
							<label for="E_NAME" class="col-sm-2 control-label">Doctor Name 
							</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?= "English: ".$doctor->E_TITLE." ".$doctor->E_NAME; ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
							
							<div class="col-sm-4">
								<input type="text" class="form-control" value="<?= $doctor->C_NAME == "" ? "Chinese: " : "Chinese: ".$doctor->C_NAME." ".$doctor->C_TITLE; ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
						 </div>


						 <div class="form-group  wrapper-options-crud">
							<label for="GENDER" class="col-sm-2 control-label">Gender 
							</label>
							<div class="col-sm-1">
							   <input type="text" class="form-control" value="<?= $doctor->GENDER; ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="TYPE" class="col-sm-2 control-label">Type
							</label>
							<div class="col-sm-5">
							   <input type="text" class="form-control" value="<?= $doctor->TYPE1." &nbsp; ".$doctor->TYPE2." &nbsp; ".$doctor->TYPE3; ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
						</div>
						
						 <div class="form-group ">
							<label for="MOBILE" class="col-sm-2 control-label">Mobile 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE', $doctor->MOBILE); ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="PAGER" class="col-sm-2 control-label">Pager 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="PAGER" id="PAGER" value="<?= set_value('PAGER', $doctor->PAGER); ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
						 </div>
						 
						 <div class="form-group  wrapper-options-crud">
							<label for="EMAIL" class="col-sm-2 control-label">Email 
							</label>
							<div class="col-sm-3">
							   <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL', $doctor->EMAIL); ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
						 
							<label for="LANG" class="col-sm-2 control-label">Special Langauge 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="LANG" id="LANG" value="<?= set_value('LANG', $doctor->LANG); ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
						 </div>
						 
						 <div class="form-group">
							<label for="DOB" class="col-sm-2 control-label">DOB 
							</label>
							<div class="col-sm-3">
								<input type="text" style="margin-bottom:10px;" class="form-control pull-right datepicker" name="DOB" id="DOB" value="<?= set_value('DOB', ($doctor->DOB == "0000-00-00" ? "" : $doctor->DOB)); ?>" disabled>
							  <small class="info help-block">
							   </small>
							</div>
							
							<label for="HKID" class="col-sm-2 control-label">HKID 
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID', $doctor->HKID); ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
						 </div>


						 <div class="form-group ">
							<label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE" value="<?= set_value('MPS_EXPIRY_DATE', ($doctor->MPS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->MPS_EXPIRY_DATE)); ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="GP_REG_NO" class="col-sm-2 control-label">GP Reg No. 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="GP_REG_NO" id="GP_REG_NO" value="<?= set_value('GP_REG_NO', $doctor->GP_REG_NO); ?>" disabled>
								<small class="info help-block">
							   </small>
							</div>
						 </div>
						 <div class="form-group ">
							<label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
							</label>
							<div class="col-sm-3">
								<input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE" value="<?= set_value('APS_EXPIRY_DATE', ($doctor->APS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->APS_EXPIRY_DATE)); ?>" disabled>
							   <small class="info help-block">
							   </small>
							</div>
							
							<label for="SP_REG_NO" class="col-sm-2 control-label">SP Reg No. 
							</label>
							<div class="col-sm-3">
							   <input type="text" class="form-control" name="SP_REG_NO" id="SP_REG_NO" value="<?= set_value('SP_REG_NO', $doctor->SP_REG_NO); ?>" disabled>
								<small class="info help-block">
							   </small>
							</div>
						 </div>
						 
						 
						 <div class="form-group ">
							<label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
							</label>
							<div class="col-sm-3">
								<input type="text" style="margin-bottom:10px;" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE" value="<?= set_value('BR_EXPIRY_DATE', ($doctor->BR_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->BR_EXPIRY_DATE)); ?>" disabled>
							</div>
						 </div>

						 
					

						 <!-- Specialty 1, 2 input field -->
						 <div class="form-group ">
							<label for="SP_CODE1" class="col-sm-2 control-label">Specialty
							</label>
							<?php
								if ($doctor->SP_CODE1 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE1);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code1 = "1: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code1 = "1: ".$doctor->SP_CODE1;
									}
									
								}else{
									$sp_code1 = "1: (Empty)";
								}
								
								if ($doctor->SP_CODE2 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE2);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code1 = "2: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code1 = "2: ".$doctor->SP_CODE2;
									}
								}else{
									$sp_code2 = "2: (Empty)";
								}
							?>
							<div class="col-sm-5">
								<input type="text" class="form-control" value="<?= $sp_code1; ?>" disabled>   
								<small class="info help-block">
								</small>
							</div>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" value="<?= $sp_code2; ?>" disabled>   
								<small class="info help-block">
								</small>
							</div>
						</div>
						
						<!--Specialty 1, 2 checkbox-->
						<div class="form-group ">	
							<label class="col-sm-2"></label>
							<div class="col-sm-4">
								<?php
									if ($doctor->SP_CODE1 != "" && $doctor->MEDICAL_PROCEDURES != "" && $doctor->MEDICAL_PROCEDURES != NULL){
										
										$this->db->where("SP_CODE", $doctor->SP_CODE1);
										$this->db->order_by("CLINIC_PROCEDURE", "ASC");
										
										foreach (db_get_all_data('medical_procedures') as $index=>$row):
										
										if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
								?>
								
								<?php 
									 if (strlen($row->CLINIC_PROCEDURE) > 21){
								?>
									<div class='col-md-12  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div> 
								<?php }else{ ?>
								
									<div class='col-md-6  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div>
								<?php } ?>
								<?php } endforeach; } ?>
									
							</div>
						</div>
						
						<small class="info help-block">　</small>
						
						<!-- Specialty 3, 4 input field -->
						
						<div class="form-group ">
							<label class="col-sm-2">
							</label>
							<?php
								if ($doctor->SP_CODE3 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE3);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code1 = "3: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code1 = "3: ".$doctor->SP_CODE3;
									}
								}else{
									$sp_code3 = "3: (Empty)";
								}
								
								if ($doctor->SP_CODE4 != ""){
									$this->db->where("SP_CODE", $doctor->SP_CODE4);
									$query = $this->db->get("doctor_specialty_desc");
									
									if ($query->num_rows() > 0){
										$query = $query->row();
										
										$sp_code1 = "4: ".$query->C_DESC." &nbsp; ".$query->E_DESC;
									}else{
										$sp_code1 = "4: ".$doctor->SP_CODE4;
									}
								}else{
									$sp_code4 = "4: (Empty)";
								}
							?>
							<div class="col-sm-5">
								<input type="text" class="form-control" value="<?= $sp_code3; ?>" disabled>   
								<small class="info help-block">
								</small>
							</div>
							
							<div class="col-sm-5">
								<input type="text" class="form-control" value="<?= $sp_code4; ?>" disabled>   
								<small class="info help-block">
								</small>
							</div>
						</div>
						
						<!-- Specialty 3, 4 checkbox -->
						
						<div class="form-group ">	
							<label class="col-sm-2"></label>
							<div class="col-sm-4">
								<?php
									if ($doctor->SP_CODE3 != "" && $doctor->MEDICAL_PROCEDURES != ""){
										
										$this->db->where("SP_CODE", $doctor->SP_CODE3);
										$this->db->order_by("CLINIC_PROCEDURE", "ASC");
										foreach (db_get_all_data('medical_procedures') as $index=>$row):
										
										if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
								?>
								
								<?php 
									 if (strlen($row->CLINIC_PROCEDURE) > 21){
								?>
									<div class='col-md-12  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div> 
								<?php }else{ ?>
								
									<div class='col-md-6  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div>
								<?php } ?>
								<?php } endforeach; } ?>
									
							</div>
							
							<div class="col-sm-4">
								<?php
									if ($doctor->SP_CODE4 != "" && $doctor->MEDICAL_PROCEDURES != ""){
										
										$this->db->where("SP_CODE", $doctor->SP_CODE4);
										$this->db->order_by("CLINIC_PROCEDURE", "ASC");
										foreach (db_get_all_data('medical_procedures') as $index=>$row):
										
										if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
								?>
								
								<?php 
									 if (strlen($row->CLINIC_PROCEDURE) > 21){
								?>
									<div class='col-md-12  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div> 
								<?php }else{ ?>
								
									<div class='col-md-6  padding-left-0'>
										<input checked type="checkbox" class="flat-red" value="<?= $row->AUTO_NO ?>"> <?= $row->CLINIC_PROCEDURE; ?>
									</div>
								<?php } ?>
								<?php } endforeach; } ?>
									
							</div>
						</div>
						
						<small class="info help-block">　</small>
						
						<div class="form-group ">
							<label for="ADMISSION_RIGHT" class="col-sm-2 control-label">Admission Right
							</label>
							<div class="col-sm-4">
								<textarea rows="5" cols="50" disabled><?php 
										if ($has_admission){
											$admission = explode(", ", $doctor->ADMISSION_RIGHT);
										
											foreach ($admission as $ar){
												$this->db->where("SHORT_NAME", $ar);
												$query = $this->db->get("ADMISSION_RIGHT")->row();
												echo $query->HOSPITAL_NAME." (".$query->SHORT_NAME.") \n";
											}
										}
									?>
								</textarea>
							</div>
							
							<label for="REMARK" class="col-sm-2 control-label">Remark
							</label>
							<div class="col-sm-4">
								<textarea rows="5" cols="50" id="REMARK" name="REMARK" disabled><?= set_value('REMARK', $doctor->REMARK); ?></textarea>
								<small class="info help-block">
							   </small>
							</div>
						</div>
						 
						 
						 <hr>
						 <div class="form-group ">
							<label class="col-sm-1 control-label" style="color:blue;">Doctor
							</label>
						 </div>
						 
						 <div class="form-group ">
                           <label for="content" class="col-sm-2 control-label">Creator</label>
                           <div class="col-sm-1">
                              <?= _ent($doctor->CREATOR); ?>
							  <small class="info help-block">　</small>
                           </div>
						   
						   <label for="content" class="col-sm-2 control-label">Create Date</label>
                           <div class="col-sm-2">
                              <?= _ent($doctor->CREATE_DATE); ?>
							  <small class="info help-block">　</small>
                           </div>
						  
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-2 control-label">Last Modifier</label>
                           <div class="col-sm-1">
                              <?= _ent($doctor->LAST_MODIFIER); ?>
							  <small class="info help-block">　</small>
                           </div>
						   
						   <label for="content" class="col-sm-2 control-label">Last Update</label>
                           <div class="col-sm-2">
                              <?= _ent($doctor->LAST_UPDATE); ?>
							  <small class="info help-block">　</small>
                           </div>
                        </div>

                     </div>
                     <!-- End Doctor info 1 --> 

				  </div>
				  <!--- End Doctor form div --->
				  
               </div>
			   <!------------------------------- End Doctor div ------------------------------->

			   
			   
			   <!------------------------------- Payment div ------------------------------->
			   <div id="paymentDiv">
				<small class="info help-block">
					</small>
					<div class="view-nav col-sm-12">
						  <?php is_allowed('doctor_update', function($doctor) use ($doctor){?>
						  <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit payment" href="<?= site_url('administrator/doctor/edit/'.$doctor->DR_CODE); ?>"><i class="fa fa-edit" ></i> Edit Payment</a><?php }) ?>
						  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
							<small class="info help-block">
							</small>
					   </div>
			   
					<div class="form-horizontal" name="form_payment" id="form_payment" >
						<small class="info help-block">
						</small>
						 <?php if ($has_payment){ ?>
							<div class="form-group ">
								<label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Cheque
								</label>
							 </div>
						 
						
						 
						<div class="form-group ">
						   <label for="PAYEE_NAME" class="col-sm-2 control-label">Payee Name
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" value="<?= $doctor_payment->PAYEE_NAME == "" ? "(This doctor has no Cheque payment information)" : $doctor_payment->PAYEE_NAME ; ?>" disabled> 
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" value="<?= set_value('PAYEE_ADDR1', $doctor_payment->PAYEE_ADDR1); ?>" disabled>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" value="<?= set_value('PAYEE_ADDR2', $doctor_payment->PAYEE_ADDR2); ?>" disabled>
							<small class="info help-block">
								  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" value="<?= set_value('PAYEE_ADDR3', $doctor_payment->PAYEE_ADDR3); ?>" disabled>
							<small class="info help-block">
								  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" value="<?= set_value('PAYEE_ADDR4', $doctor_payment->PAYEE_ADDR4); ?>" disabled>
							<small class="info help-block">
								  </small>
						   </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" value="<?= set_value('PAYEE_ADDR5', $doctor_payment->PAYEE_ADDR5); ?>" disabled>
							<small class="info help-block">
								  </small>
						  </div>
						</div>
						
						<div class="form-group ">
						   <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
						   </label>
						   <div class="col-sm-4">
							  <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" value="<?= set_value('PAYEE_DISTRICT', $doctor_payment->PAYEE_DISTRICT); ?>" disabled>
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
								<?php
									if ($doctor_payment->BANK_CLEARING_CODE != ""){
										$this->db->where("CLEARING_CODE", $doctor_payment->BANK_CLEARING_CODE);
										$query = $this->db->get("bank")->row();
										
									}else{
										$query = "";
									}
								
									
								?>
								<input type="text" class="form-control" value="<?= $query == "" ? "(This doctor has no Auto Pay payment information)" : $query->C_NAME." &nbsp; ".$query->E_NAME; ?>" disabled>
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
								 <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO" value="<?= set_value('ACCOUNT_NO', $doctor_payment->ACCOUNT_NO); ?>" disabled>
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
								 <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER" value="<?= set_value('ACCOUNT_HOLDER', $doctor_payment->ACCOUNT_HOLDER); ?>" disabled>
								 <small class="info help-block">
								 </small>
							  </div>
						   </div>
						</div>
						
						<hr>
						
						<div class="form-group ">
							<label class="col-sm-1 control-label" style="color:blue;">Payment
							</label>
						 </div>
						 
						 <div class="form-group ">
                           <label for="content" class="col-sm-2 control-label">Creator</label>
                           <div class="col-sm-1">
                              <?= _ent($doctor->CREATOR); ?>
							  <small class="info help-block">　</small>
                           </div>
						   
						   <label for="content" class="col-sm-2 control-label">Create Date</label>
                           <div class="col-sm-2">
                              <?= _ent($doctor->CREATE_DATE); ?>
							  <small class="info help-block">　</small>
                           </div>
						   
						</div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-2 control-label">Last Modifier</label>
                           <div class="col-sm-1">
                              <?= _ent($doctor->LAST_MODIFIER); ?>
							  <small class="info help-block">　</small>
                           </div>
						   
						   <label for="content" class="col-sm-2 control-label">Last Update</label>
                           <div class="col-sm-2">
                              <?= _ent($doctor->LAST_UPDATE); ?>
							  <small class="info help-block">　</small>
                           </div>
                        </div>
					
					<?php }else{ echo "\t\tThis doctor has no payment method"; } ?>

				  </div>
				  <!--- End Payment form --->
				</div>
			   <!------------------------------- End Payment div ------------------------------->
			   
			   
			   
			   <!------------------------------- Consultation div ------------------------------->
			    <div id="consultDiv">
					 <small class="info help-block">
					 </small>
					<div class="view-nav col-sm-12">
					  <?php is_allowed('doctor_consult_hour_add', function($doctor) use ($doctor){?>
					  <a class="btn btn-flat btn-info btn_add btn_action" id="btn_add" data-stype='back' title="add consultation" href="<?= site_url('administrator/doctor/add_consult/'.$doctor->DR_CODE); ?>"><i class="fa fa-newspaper-o" ></i> Add Consultation</a><?php }) ?>
					  
					<?php if ($has_consult){ ?>
						<?php is_allowed('doctor_consult_hour_update', function($doctor) use ($doctor){?>
						<a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit consultation" href="<?= site_url('administrator/doctor_consult_hour/index?bulk=&q='.$doctor->DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>"><i class="fa fa-edit" ></i> Edit Consultation</a><?php }) ?>
					<?php } ?>
					
					  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
					</div>
				
					<form class="form-horizontal" name="form_doctor" id="form_doctor" >
						<small class="info help-block">　</small>
						
						<?php if ($has_consult){ ?>
					   
						<div class="form-group">
						
							<label for="CENTER_CODE" class="col-sm-2 control-label">Center Code						   
						   </label>
						   <div class="col-sm-3">
							   <select class="form-control chosen chosen-select-deselect" name="CENTER_CODE" id="CENTER_CODE">
								   <?php foreach ($doctor_center as $center): ?>
								   <option <?= $center->CENTER_CODE == $doctor_consult_hour->CENTER_CODE ? 'selected' : ''; ?> value="<?= $center->CENTER_CODE; ?>"><?= $center->CENTER_CODE; ?></option>
								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
							  </small>
						   </div>
						
						   <label for="CONTACT_PERSON" class="col-sm-2 control-label">Contact Person 
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control cust-consult-reset" name="CONTACT_PERSON" id="CONTACT_PERSON" value="<?= $doctor_consult_hour->CONTACT_PERSON; ?>" disabled>
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						
						
						<div class="form-group">
							<?php 
								$this->db->where("CENTER_CODE", $center->CENTER_CODE);
								$center_details = $this->db->get('center')->row();
							?>
						
							<label for="CENTER_TEL" class="col-sm-2 control-label">Center Tel						   
						   </label>
						   <div class="col-sm-3">
							   <input type="text" class="form-control cust-consult-reset" name="CENTER_TEL" id="CENTER_TEL" value="<?= $center_details->TEL; ?>" disabled>
							   <small class="info help-block">
							  </small>
						   </div>
						
						   <label for="CENTER_FAX" class="col-sm-2 control-label">Center Fax 
						   </label>
						   <div class="col-sm-3">
							  <input type="text" class="form-control cust-consult-reset" name="CENTER_FAX" id="CENTER_FAX" value="<?= $center_details->FAX; ?>" disabled>
							  <small class="info help-block">
							  </small>
						   </div>

						</div>
						

						<hr>
						<!--	Schedule day 1	-->
						<div class="form-group">

						   <label class="col-sm-2 control-label">Schedule Day1
						   </label>
						   <div class="col-sm-3">
								<textarea id="sdt1" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
											echo $doctor_consult_hour->SCHEDULE_DAY_C1." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E1."\n";
											if ($doctor_consult_hour->SCHEDULE_DAY_C1 != "" && $doctor_consult_hour->SCHEDULE_DAY_C1 != NULL){
												echo "--------------------------------------------------\n";
											}
											echo $doctor_consult_hour->TIMESLOT1_1."\n";
											echo $doctor_consult_hour->TIMESLOT1_2."\n";
											echo $doctor_consult_hour->TIMESLOT1_3;
										
									?>
								</textarea>
							  <small class="info help-block">
							  </small>
						   </div>
						   
						   <label class="col-sm-2 control-label">Schedule Day2
						   </label>
						   <div class="col-sm-3">
								<textarea id="sdt2" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
											echo $doctor_consult_hour->SCHEDULE_DAY_C2." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E2."\n";
											if ($doctor_consult_hour->SCHEDULE_DAY_C2 != ""){
												echo "--------------------------------------------------\n";
											}
											echo $doctor_consult_hour->TIMESLOT2_1."\n";
											echo $doctor_consult_hour->TIMESLOT2_2."\n";
											echo $doctor_consult_hour->TIMESLOT2_3;
									?>
								</textarea>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						
						
						<div class="form-group">
						   <label class="col-sm-2 control-label">Schedule Day3
						   </label>
						   <div class="col-sm-3">
								<textarea id="sdt3" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
											echo $doctor_consult_hour->SCHEDULE_DAY_C3." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E3."\n";
											if ($doctor_consult_hour->SCHEDULE_DAY_C3 != ""){
												echo "--------------------------------------------------\n";
											}
											echo $doctor_consult_hour->TIMESLOT3_1."\n";
											echo $doctor_consult_hour->TIMESLOT3_2."\n";
											echo $doctor_consult_hour->TIMESLOT3_3;
									?>
								</textarea>
							  <small class="info help-block">
							  </small>
						   </div>
						   
						   <label class="col-sm-2 control-label">Schedule Day4
						   </label>
						   <div class="col-sm-3">
								<textarea id="sdt4" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
											echo $doctor_consult_hour->SCHEDULE_DAY_C4." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E4."\n";
											if ($doctor_consult_hour->SCHEDULE_DAY_C4 != ""){
												echo "--------------------------------------------------\n";
											}
											echo $doctor_consult_hour->TIMESLOT4_1."\n";
											echo $doctor_consult_hour->TIMESLOT4_2."\n";
											echo $doctor_consult_hour->TIMESLOT4_3;
									?>
								</textarea>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<div class="form-group">
						   <label class="col-sm-2 control-label">Schedule Day5
						   </label>
						   <div class="col-sm-3">
								<textarea id="sdt5" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
											echo $doctor_consult_hour->SCHEDULE_DAY_C5." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E5."\n";
											if ($doctor_consult_hour->SCHEDULE_DAY_C5 != ""){
												echo "--------------------------------------------------\n";
											}
											echo $doctor_consult_hour->TIMESLOT5_1."\n";
											echo $doctor_consult_hour->TIMESLOT5_2."\n";
											echo $doctor_consult_hour->TIMESLOT5_3;
									?>
								</textarea>
							  <small class="info help-block">
							  </small>
						   </div>
						   
						   <label class="col-sm-2 control-label">Schedule Day6
						   </label>
						   <div class="col-sm-3">
								<textarea id="sdt6" class="cust-consult-reset-sd" rows="5" cols="40" disabled><?php 
											
											echo $doctor_consult_hour->SCHEDULE_DAY_C6." &nbsp; ".$doctor_consult_hour->SCHEDULE_DAY_E6."\n";
											if ($doctor_consult_hour->SCHEDULE_DAY_C6 != ""){
												echo "--------------------------------------------------\n";
											}
											echo $doctor_consult_hour->TIMESLOT6_1."\n";
											echo $doctor_consult_hour->TIMESLOT6_2."\n";
											echo $doctor_consult_hour->TIMESLOT6_3;
									?>
								</textarea>
							  <small class="info help-block">
							  </small>
						   </div>
						
						</div>
						
						<hr>
						<div class="form-group ">
							<label class="col-sm-1 control-label" style="color:blue;">Consultation
							</label>
						 </div>
						
						<div class="form-group ">
						   <label for="content" class="col-sm-2 control-label">Creator</label>
						   <div class="col-sm-1">
							  <p id="consult_creator" class="cust-consult-reset"><?= _ent($doctor_consult_hour->CREATOR); ?></p>
							  <small class="info help-block">　</small>
						   </div>
						   
						   <label for="content" class="col-sm-2 control-label">Create Date</label>
						   <div class="col-sm-2">
							  <p id="consult_create_date" class="cust-consult-reset"><?= _ent($doctor_consult_hour->CREATE_DATE); ?></p>
							  <small class="info help-block">　</small>
						   </div>
						  
						</div>
						
						<div class="form-group ">
						   <label for="content" class="col-sm-2 control-label">Last Modifier</label>
						   <div class="col-sm-1">
							  <p id="consult_last_modifier" class="cust-consult-reset"><<?= _ent($doctor_consult_hour->LAST_MODIFIER); ?></p>
							  <small class="info help-block">　</small>
						   </div>
						   
						   <label for="content" class="col-sm-2 control-label">Last Update</label>
						   <div class="col-sm-2">
							   <p id="consult_last_update" class="cust-consult-reset"><?= _ent($doctor_consult_hour->LAST_UPDATE); ?></p>
							  <small class="info help-block">　</small>
						   </div>
						</div>
						<?php }else{ echo "\t\tThis doctor has no consultation record"; } ?>
					</form>
					<!--- End Consultation form --->
				</div>
			   <!------------------------------- End Consultation div ------------------------------->
			   
			   
			   <!------------------------------- Qualification div ------------------------------->
			   <div id="qualiDiv">
					<small class="info help-block">
					 </small>
					<div class="view-nav col-sm-12">
					  <?php is_allowed('doctor_qualification_add', function($doctor) use ($doctor){?>
					  <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="add qualification" href="<?= site_url('administrator/doctor/add_quali/'.$doctor->DR_CODE); ?>"><i class="fa fa-newspaper-o" ></i> Add Qualification</a><?php }) ?>
					  
					<?php if ($has_consult){ ?>
						<?php is_allowed('doctor_qualification_update', function($doctor) use ($doctor){?>
						<a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit qualification" href="<?= site_url('administrator/doctor_qualification/index?bulk=&q='.$doctor->DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>"><i class="fa fa-edit" ></i> Edit Qualification</a><?php }) ?>
					<?php } ?>
					
					  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
					</div>
			   
					<div class="form-horizontal" name="form_doctor_qualification" id="form_doctor_qualification" >
					<small class="info help-block">　</small>
					<?php if ($has_quali){ ?>
					
                    <div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Qualification </label>

                        <div class="col-sm-8">
                           <select class="form-control chosen chosen-select-deselect" name="QUALIFICATION" id="QUALIFICATION">
							   <?php foreach ($doctor_qualification2 as $index=>$quali): ?>
							   <option <?= $index == 0 ? "selected" : ""; ?> value="<?= $quali->QUALIFICATION; ?>"><?= $quali->QUALIFICATION; ?> (<?= $quali->CERT_YEAR; ?>)</option>
							   <?php endforeach; ?>  
						   </select>
						   <small class="info help-block">　</small>
                        </div>
                    </div>
					
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label">Cert Year </label>

                        <div class="col-sm-8">
							<input type="text" class="form-control cust-quali-reset" name="CERT_YEAR" id="CERT_YEAR" value="<?= $doctor_qualification->CERT_YEAR; ?>" disabled> 
							<small class="info help-block">　</small>
						</div>
                    </div>
                                     
					<div class="form-group ">
                        <label for="content" class="col-sm-2 control-label"> Cert Copy </label>
                        <div class="col-sm-8">
                             <?php if (is_image($doctor_qualification->CERT_COPY)): ?>
                              <a class="fancybox" id="fancy_CERT_COPY" rel="group" href="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                <img id="img_CERT_COPY" src="<?= BASE_URL . 'uploads/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>" class="image-responsive" alt="image doctor_qualification" title="cert copy" width="40px">
                              </a>
                              <?php else: ?>
                              <label>
                                <a id="href_CERT_COPY" href="<?= BASE_URL . 'administrator/file/download/doctor_qualification/' . $doctor_qualification->CERT_COPY; ?>">
                                 <img id="img_CERT_COPY2" src="<?= get_icon_file($doctor_qualification->CERT_COPY); ?>" class="image-responsive" alt="image doctor_qualification" title="cert copy <?= $doctor_qualification->CERT_COPY; ?>" width="40px"> 
                               <?= $doctor_qualification->CERT_COPY ?>
                               </a>
                               </label>
                              <?php endif; ?>
							  <small class="info help-block">　</small>
                        </div>
                    </div>
					
					<hr>
					<div class="form-group ">
						<label class="col-sm-1 control-label" style="color:blue;">Qualification
						</label>
					 </div>
                                       
                    <div class="form-group ">
					   <label for="content" class="col-sm-2 control-label">Creator</label>
					   <div class="col-sm-1">
						  <p id="quali_creator" class="cust-quali-reset"><?= _ent($doctor_qualification->CREATOR); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					   
					   <label for="content" class="col-sm-2 control-label">Create Date</label>
					   <div class="col-sm-2">
						  <p id="quali_create_date" class="cust-quali-reset"><?= _ent($doctor_qualification->CREATE_DATE); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					  
					</div>
					
					<div class="form-group ">
					   <label for="content" class="col-sm-2 control-label">Last Modifier</label>
					   <div class="col-sm-1">
						  <p id="quali_last_modifier" class="cust-quali-reset"><?= _ent($doctor_qualification->LAST_MODIFIER); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					   
					   <label for="content" class="col-sm-2 control-label">Last Update</label>
					   <div class="col-sm-2">
						  <p id="quali_last_update" class="cust-quali-reset"><?= _ent($doctor_qualification->LAST_UPDATE); ?></p>
						  <small class="info help-block">　</small>
					   </div>
					</div>

					<?php }else{ echo "\t\tThis doctor has no any qualification"; } ?>
                    
                  </div>
               </div>
			   <!------------------------------- End Qualification div ------------------------------->
			   
			   
			   <!------------------------------- Special fee div ------------------------------->
			    <div id="spfeeDiv">
					<small class="info help-block">
					 </small>
					<div class="view-nav col-sm-12">
					  <?php is_allowed('doctor_special_fee_add', function($doctor) use ($doctor){?>
					  <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor" href="<?= site_url('administrator/doctor/add_fee/'.$doctor->DR_CODE); ?>"><i class="fa fa-edit" ></i> Add Special Fee</a><?php }) ?>
					  
					<?php if ($has_doctor_partner){ ?>
						<?php is_allowed('doctor_special_fee_update', function($doctor) use ($doctor){?>
						<a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor" href="<?= site_url('administrator/doctor_special_fee/index?bulk=&q='.$doctor->DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>"><i class="fa fa-edit" ></i> Edit Special Fee</a><?php }) ?>
					<?php } ?>
					
					  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
					</div>
				
					<form class="form-horizontal" name="form_doctor" id="form_doctor" >
					
						<small class="info help-block">　</small>
						
						<?php if($has_doctor_partner){ ?>
						<div class="form-group ">
						   <label for="CONTRACT_PARTNER_CODE" class="col-sm-2 control-label">Partner Code 
						   </label>
						   <div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect" name="CONTRACT_PARTNER_CODE" id="CONTRACT_PARTNER_CODE">
								   <?php foreach ($doctor_partners as $index=>$doctor_partner): ?>
								   <option <?= $index == 0 ? "selected" : ""; ?> value="<?= $doctor_partner->PARTNER_CODE; ?>"><?= $doctor_partner->PARTNER_CODE; ?></option>
								   <?php endforeach; ?>  
							   </select>
								<small class="info help-block">
								</small>
						   </div>

						</div>
						
						<div class="form-group ">
							 <label for="PARTNER_CONTRACT_NAME" class="col-sm-2 control-label">Partner Contract 
						   </label>
						   <div class="col-sm-8">
								<select class="form-control chosen chosen-select-deselect cust-contract-reset-select-1" name="PARTNER_CONTRACT_NAME" id="PARTNER_CONTRACT_NAME">
								   <option value=""></option>
								   <?php foreach ($partner_contracts as $index=>$contract): ?>
								   <option <?= $index == 0 ? "selected" : ""; ?> value="<?= $contract->CARD_TYPE; ?>"><?= $contract->CONTRACT_NAME." &nbsp; (Contract No: ".$contract->CARD_TYPE.")"; ?></option>
								   <?php endforeach; ?>  
							   </select>
							   <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<input type="hidden" name="POLICY_NO" id="POLICY_NO" value="">
							
							<div class="form-group ">
								<label for="content" class="col-sm-2 control-label">Partner Dr Code </label>

								<div class="col-sm-3">
									<input type="text" class="form-control cust-contract-reset-input-1 cust-contract-reset-input-2" name="PARTNER_DR_CODE" id="PARTNER_DR_CODE" value="<?= $doctor_partners[0]->PARTNER_DR_CODE; ?>" disabled> 
									<small class="info help-block">
									</small>
								</div>
								
								<label for="content" class="col-sm-2 control-label">Loc Code </label>

								<div class="col-sm-3">
									<input type="text" class="form-control cust-contract-reset-input-1 cust-contract-reset-input-2" name="LOC_CODE" id="LOC_CODE" value="<?= $doctor_partners[0]->LOC_CODE; ?>" disabled> 
									<small class="info help-block">
									</small>
								</div>
							</div>

							<div class="form-group ">
								<label for="content" class="col-sm-2 control-label">Start Date </label>

								<div class="col-sm-3">
									<input type="text" class="form-control cust-contract-reset-input-1 cust-contract-reset-input-2" name="doctor_contract_START_DATE" id="doctor_contract_START_DATE" value="<?= $contract_detail->START_DATE;; ?>" disabled> 
									<small class="info help-block">
									</small>
								</div>
								
								<label for="content" class="col-sm-2 control-label">Term Date </label>

								<div class="col-sm-3">
									<input type="text" class="form-control cust-contract-reset-input-1 cust-contract-reset-input-2" name="doctor_contract_TERM_DATE" id="doctor_contract_TERM_DATE" value="<?= $contract_detail->TERM_DATE;; ?>" disabled> 
									<small class="info help-block">
									</small>
								</div>
							</div>			
							
							<hr>
							
							<div class="table-responsive"> 
							  <table class="table table-bordered dataTable my-table">
								 <thead>
									<tr class="">
									   <th>Type</th>
									   <th>Med Days</th>
									   <th>Agreed pay to Dr</th>
									   <th>Special Fee</th>
									   <th>After calculated</th>
									   <th>Remark</th>
									   <th>Creator</th>
									   <th>Create Date</th>
									   <th>Last Modifier</th>
									   <th>Last Update</th>
									</tr>
								 </thead>
								 <tbody id="tbody_doctor" class="cust-sp">
								 <?php if ($has_special_fee) {?>
									<?php foreach ($doctor_special_fees as $doctor_special_fee) : ?>
									<tr>
									   <td><?= $doctor_special_fee->TYPE; ?></td> 
									   <td><?= $doctor_special_fee->MED_DAYS; ?></td> 
									   <?php 
											$this->db->where("PARTNER_CODE", $doctor_partner->PARTNER_CODE);
											$this->db->where("CARD_TYPE", $contract_detail->CARD_TYPE);
											$this->db->where("TYPE", $doctor_special_fee->TYPE);
											$this->db->where("MED_DAYS", $doctor_special_fee->MED_DAYS);
											$agreed_fee = $this->db->get("agreed_fee")->row();
									   ?>
									   <td><?= "$".$agreed_fee->PAY; ?></td> 
									   <td><?= "$".$doctor_special_fee->SPECIAL_FEE; ?></td> 
									   <td style="color:red;"><?= "$".($agreed_fee->PAY + $doctor_special_fee->SPECIAL_FEE); ?></td>
									   <td><?= $doctor_special_fee->REMARK; ?></td> 
									   <td><?= $doctor_special_fee->CREATOR; ?></td>
									   <td><?= $doctor_special_fee->CREATE_DATE; ?></td>
									   <td><?= $doctor_special_fee->LAST_MODIFIER; ?></td>
									   <td><?= $doctor_special_fee->LAST_UPDATE; ?></td>
									</tr>
									<?php endforeach; ?>
								<?php }else{ echo "<tr><td>No special fee in this contract</td></tr>"; } ?>
								 </tbody>
							  </table>
							</div>
							
						<?php }else{ echo "\t\tThis doctor has no business partner"; } ?>
					
					</form>
					<!--- End form div --->
				</div>
				<!------------------------------- End Special fee div ------------------------------->
				
				
				<!------------------------------- Website div ------------------------------->
				<div id="websiteDiv">
					<small class="info help-block">
					 </small>
					<div class="view-nav col-sm-12">
					  <?php is_allowed('website_login_add', function($doctor) use ($doctor){?>
					  <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="add website login" href="<?= site_url('administrator/doctor/add_website/'.$doctor->DR_CODE); ?>"><i class="fa fa-newspaper-o" ></i> Add Website Login</a><?php }) ?>
					  
					<?php if ($has_website){ ?>
						<?php is_allowed('website_login_update', function($doctor) use ($doctor){?>
						<a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit website login" href="<?= site_url('administrator/website_login/index?bulk=&q='.$doctor->DR_CODE.'&f=DR_CODE&sbtn=Apply'); ?>"><i class="fa fa-edit" ></i> Edit Website Login</a><?php }) ?>
					<?php } ?>
					
					  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
					</div>
				
					<form class="form-horizontal" name="form_doctor" id="form_doctor" >
						<small class="info help-block">　</small>
							  
						<?php if ($has_website){ ?>
						<div class="form-group ">
						   <label for="WEBSITE_PARTNER_CODE" class="col-sm-2 control-label">Partner Code 
						   </label>
						   <div class="col-sm-8">
							  <select  class="form-control chosen chosen-select-deselect" name="WEBSITE_PARTNER_CODE" id="WEBSITE_PARTNER_CODE">
								 <?php foreach ($website_login as $index=>$website): ?>
								 <option <?=  $index == 0 ? "selected" : ""; ?> value="<?= $website->PARTNER_CODE ?>" ><?= $website->PARTNER_CODE; ?></option>
								 <?php endforeach; ?> 
							  </select>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="WEBSITE_ACCOUNT" class="col-sm-2 control-label">Website Account 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-website-reset" name="WEBSITE_ACCOUNT" id="WEBSITE_ACCOUNT" value="<?= $website_login[0]->WEBSITE_ACCOUNT; ?>" disabled>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						<div class="form-group ">
						   <label for="WEBSITE_PASSWORD" class="col-sm-2 control-label">Website Password 
						   </label>
						   <div class="col-sm-8">
							  <input type="text" class="form-control cust-website-reset" name="WEBSITE_PASSWORD" id="WEBSITE_PASSWORD" value="<?= $website_login[0]->WEBSITE_PASSWORD; ?>" disabled>
							  <small class="info help-block">
							  </small>
						   </div>
						</div>
						
						<?php }else{ echo "\t\tThis doctor has no any website account"; } ?>
					</form>
				</div>
				
			   <br>

            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
   
   <script>
   $(document).ready(function(){
		
	   jQuery(window).on("load", function(){
			$("#paymentDiv").hide();
		   $("#consultDiv").hide();
		   $("#qualiDiv").hide();
		   $("#spfeeDiv").hide();
		   $("#websiteDiv").hide();

		});
	   
	   $("#CENTER_CODE").change(function() {
		    var dr_code = $("#DR_CODE").val();
			var center_code = $("#CENTER_CODE").val();
			
			$("#CENTER_CODE").prop("disabled", true).trigger('chosen:updated');
			
			$.ajax({
				type: "GET",
				url: BASE_URL + '/administrator/doctor/view_consult/',
				dataType: "json",
				data: {dr_code: dr_code, center_code: center_code},
				success: function(data) {
					$('.cust-consult-reset').val("");
					$('.cust-consult-reset-sd').text("");
					
					var value = data['specific_consult'];
					var center_details = data['center_details'];
					
					$('#CONTACT_PERSON').val(value.CONTACT_PERSON);
					$('#CENTER_TEL').val(center_details.TEL);
					$('#CENTER_FAX').val(center_details.FAX);
					
					$('#consult_creator').text(value.CREATOR);
					$('#consult_create_date').text(value.CREATE_DATE);
					$('#consult_last_modifier').text(value.LAST_MODIFIER);
					$('#consult_last_update').text(value.LAST_UPDATE);


					if (value.SCHEDULE_DAY_E1 != ""){
						$('#sdt1').val(value.SCHEDULE_DAY_C1 + "\t" + value.SCHEDULE_DAY_E1 + 
						"\n--------------------------------------------------\n" + 
						value.TIMESLOT1_1 + "\n" + value.TIMESLOT1_2 + "\n" + value.TIMESLOT1_3);
					}
					
					if (value.SCHEDULE_DAY_E2 != ""){
						$('#sdt2').val(value.SCHEDULE_DAY_C2 + "\t" + value.SCHEDULE_DAY_E2 + 
						"\n--------------------------------------------------\n" + 
						value.TIMESLOT2_1 + "\n" + value.TIMESLOT2_2 + "\n" + value.TIMESLOT2_3);
					}
					
					
					if (value.SCHEDULE_DAY_E3 != ""){
						$('#sdt3').val(value.SCHEDULE_DAY_C3 + "\t" + value.SCHEDULE_DAY_E3 + 
						"\n--------------------------------------------------\n" + 
						value.TIMESLOT3_1 + "\n" + value.TIMESLOT3_2 + "\n" + value.TIMESLOT3_3);
					}

					
					if (value.SCHEDULE_DAY_E4 != ""){
						$('#sdt4').val(value.SCHEDULE_DAY_C4 + "\t" + value.SCHEDULE_DAY_E4 + 
						"\n--------------------------------------------------\n" + 
						value.TIMESLOT4_1 + "\n" + value.TIMESLOT4_2 + "\n" + value.TIMESLOT4_3);
					}
					
					if (value.SCHEDULE_DAY_E5 != ""){
						$('#sdt5').val(value.SCHEDULE_DAY_C5 + "\t" + value.SCHEDULE_DAY_E5 + 
						"\n--------------------------------------------------\n" + 
						value.TIMESLOT5_1 + "\n" + value.TIMESLOT5_2 + "\n" + value.TIMESLOT5_3);
					}
					
					if (value.SCHEDULE_DAY_E6 != ""){
						$('#sdt6').val(value.SCHEDULE_DAY_C6 + "\t" + value.SCHEDULE_DAY_E6 + 
						"\n--------------------------------------------------\n" + 
						value.TIMESLOT6_1 + "\n" + value.TIMESLOT6_2 + "\n" + value.TIMESLOT6_3);
					}

					$("#CENTER_CODE").prop("disabled", false).trigger('chosen:updated');
					
				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})
			
		});
		
		$("#QUALIFICATION").change(function() {
			
			var dr_code = $("#DR_CODE").val();
			var quali = $("#QUALIFICATION").val();
			
			$("#QUALIFICATION").prop("disabled", true).trigger('chosen:updated');
			
			$.ajax({
				type: "GET",
				url: BASE_URL + '/administrator/doctor/view_quali/',
				dataType: "json",
				data: {dr_code: dr_code, quali: quali},
				success: function(data) {
					$('.cust-quali-reset').val("");
					$('.cust-quali-reset').text("");
					
					var value = data['specific_quali'];
					
					$('#CERT_YEAR').val(value.CERT_YEAR);
					
					$('#fancy_CERT_COPY').prop("href", "<?= BASE_URL . 'uploads/doctor_qualification/'; ?>"+value.CERT_COPY);
					$('#img_CERT_COPY').attr("src", "<?= BASE_URL . 'uploads/doctor_qualification/'; ?>" + value.CERT_COPY);

					$('#href_CERT_COPY').prop("href", "<?= BASE_URL . 'administrator/file/download/doctor_qualification/'; ?>" + value.CERT_COPY);
					$('#href_CERT_COPY').text(value.CERT_COPY);
					
					
					$('#img_CERT_COPY2').attr("title", "cert copy " + value.CERT_COPY);
					
					
					$('#quali_creator').text(value.CREATOR);
					$('#quali_create_date').text(value.CREATE_DATE);
					$('#quali_last_modifier').text(value.LAST_MODIFIER);
					$('#quali_last_update').text(value.LAST_UPDATE);
					
					
					$("#QUALIFICATION").prop("disabled", false).trigger('chosen:updated');
					
				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})
		});

		$("#CONTRACT_PARTNER_CODE").change(function() {
			
			var dr_code = $("#DR_CODE").val();
			var partner_code = $("#CONTRACT_PARTNER_CODE").val();
			
			$("#CONTRACT_PARTNER_CODE").prop("disabled", true).trigger('chosen:updated');
			
			$(".cust-sp").html("");
			
			$('.cust-contract-reset-select-1')[0].selectedIndex = -1;
			$('.cust-contract-reset-select-1').attr("data-placeholder", "　");
			$('.cust-contract-reset-select-1').prop("disabled", true).trigger('chosen:updated');
			
			$('.cust-contract-reset-select-1').empty();
			$('.cust-contract-reset-input-1').val("");
			
			if (partner_code != ""){
			
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/view_partner/',
					dataType: "json",
					data: {dr_code: dr_code, partner_code: partner_code},
					success: function(data) {

						var partner_doctor = data['partner_doctor'];
						var specific_partner_contract = data['specific_partner_contract'];
						
						$.each(specific_partner_contract, function(index, val) {
							$('#PARTNER_CONTRACT_NAME').append("<option value='" + val.CARD_TYPE + "'>" + 
							val.CONTRACT_NAME + " &nbsp; (Contract No: " + val.CARD_TYPE + ") &nbsp; - &nbsp; " + 
							val.STATUS + "</option>");
						});
						
						$("#PARTNER_DR_CODE").val(partner_doctor.PARTNER_DR_CODE);
						$("#LOC_CODE").val(partner_doctor.LOC_CODE);
						$("#doctor_contract_START_DATE").val(specific_partner_contract[0].START_DATE);
						$("#doctor_contract_TERM_DATE").val(specific_partner_contract[0].TERM_DATE);
						
						if (data['has_sp_fee']){
							$.each(data['special_fee'], function(index, val) {
								var sp_table = $('.cust-sp').html();
								var agreed_pay = "0";
								
								$.each(data['agreed_fee'], function(idx, value) {
									if (value.TYPE == val.TYPE && value.MED_DAYS == val.MED_DAYS){
										agreed_pay = value.PAY;
									}
								});
								
								
								$('.cust-sp').html(sp_table + "<tr><td>" + val.TYPE + "</td>" + 
								"<td>" + val.MED_DAYS + "</td>" + 
								"<td>$" + agreed_pay + "</td>" + 
								"<td>$" + val.SPECIAL_FEE + "</td>" + 
								"<td style='color:red;'>$" + (parseInt(agreed_pay) + parseInt(val.SPECIAL_FEE)) + "</td>" + 
								"<td>" + val.REMARK + "</td>" + 
								"<td>" + val.CREATOR + "</td>" + 
								"<td>" + val.CREATE_DATE + "</td>" + 
								"<td>" + val.LAST_MODIFIER + "</td>" + 
								"<td>" + val.LAST_UPDATE + "</td>" + "</tr>");
							});
							
						}else{
							$(".cust-sp").html("<tr><td>No special fee in this contract</td></tr>");
						}

						$("#CONTRACT_PARTNER_CODE").prop("disabled", false).trigger('chosen:updated');
						
						$("#PARTNER_CONTRACT_NAME").prop("disabled", false);
						$("#PARTNER_CONTRACT_NAME").attr("data-placeholder", "Select an option").trigger('chosen:updated');

					},
					error: function(jqXHR) {
						
						alert("發生錯誤: " + jqXHR.status);
					}
				})
				
			}
			
		});
		
		$("#PARTNER_CONTRACT_NAME").change(function() {
			var dr_code = $("#DR_CODE").val();
			var partner_code = $("#CONTRACT_PARTNER_CODE").val();
			var contract_no = $("#PARTNER_CONTRACT_NAME").val();
			
			$("#CONTRACT_PARTNER_CODE").prop("disabled", true).trigger('chosen:updated');
			$("#PARTNER_CONTRACT_NAME").prop("disabled", true).trigger('chosen:updated');
			
			$(".cust-sp").html("");
			
			$('.cust-contract-reset-input-2').val("");
			
			if (contract_no != ""){
				
				$.ajax({
					type: "GET",
					url: BASE_URL + '/administrator/doctor/view_contract/',
					dataType: "json",
					data: {dr_code: dr_code, partner_code: partner_code, contract_no: contract_no},
					success: function(data) {
						
						if (data['has_sp_fee']){
							$.each(data['special_fee'], function(index, val) {
								var sp_table = $('.cust-sp').html();
								var agreed_pay = "0";
								
								$.each(data['agreed_fee'], function(idx, value) {
									if (value.TYPE == val.TYPE && value.MED_DAYS == val.MED_DAYS){
										agreed_pay = value.PAY;
									}
								});
								
								
								$('.cust-sp').html(sp_table + "<tr><td>" + val.TYPE + "</td>" + 
								"<td>" + val.MED_DAYS + "</td>" + 
								"<td>$" + agreed_pay + "</td>" + 
								"<td>$" + val.SPECIAL_FEE + "</td>" + 
								"<td style='color:red;'>$" + (parseInt(agreed_pay) + parseInt(val.SPECIAL_FEE)) + "</td>" + 
								"<td>" + val.REMARK + "</td>" + 
								"<td>" + val.CREATOR + "</td>" + 
								"<td>" + val.CREATE_DATE + "</td>" + 
								"<td>" + val.LAST_MODIFIER + "</td>" + 
								"<td>" + val.LAST_UPDATE + "</td>" + "</tr>");
							});
							
						}else{
							$(".cust-sp").html("<tr><td>No special fee in this contract</td></tr>");
						}
					
					},
					error: function(jqXHR) {
						
						alert("發生錯誤: " + jqXHR.status);
					}
				})

			}else{
				$('.cust-contract-reset-input-2').val("");
				$(".cust-sp").html("");
			}
			
			$("#CONTRACT_PARTNER_CODE").prop("disabled", false).trigger('chosen:updated');
			$("#PARTNER_CONTRACT_NAME").prop("disabled", false).trigger('chosen:updated');
		
		});
		
		
		$("#WEBSITE_PARTNER_CODE").change(function() {
			
			var dr_code = $("#DR_CODE").val();
			var partner_code = $("#WEBSITE_PARTNER_CODE").val();
			
			$("#WEBSITE_PARTNER_CODE").prop("disabled", true).trigger('chosen:updated');
			
			$.ajax({
				type: "GET",
				url: BASE_URL + '/administrator/doctor/view_website/',
				dataType: "json",
				data: {dr_code: dr_code, partner_code: partner_code},
				success: function(data) {
					$('.cust-website-reset').val("");
					
					var value = data['specific_website'];
					
					$('#WEBSITE_ACCOUNT').val(value.WEBSITE_ACCOUNT);
					$('#WEBSITE_PASSWORD').val(value.WEBSITE_PASSWORD);

					$("#WEBSITE_PARTNER_CODE").prop("disabled", false).trigger('chosen:updated');
					
				},
				error: function(jqXHR) {
					
					alert("發生錯誤: " + jqXHR.status);
				}
			})
		});

	   $('#doctor_tab').on('click',function(){
			  $('#doctor').show();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#spfeeDiv').hide();
			  $('#websiteDiv').hide();
		});
	   
	   $('#payment_tab').on('click',function(){
			  $('#paymentDiv').show();
			  $('#doctor').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#spfeeDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		$('#consult_tab').on('click',function(){
			  $('#consultDiv').show();
			  $('#doctor').hide();
			  $('#paymentDiv').hide();
			  $('#qualiDiv').hide();
			  $('#spfeeDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		
		$('#quali_tab').on('click',function(){
			  $('#qualiDiv').show();
			  $('#doctor').hide();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#spfeeDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		$('#spfee_tab').on('click',function(){
			  $('#spfeeDiv').show();
			  $('#doctor').hide();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#websiteDiv').hide();
		});
		
		$('#website_tab').on('click',function(){
			  $('#websiteDiv').show();
			  $('#doctor').hide();
			  $('#paymentDiv').hide();
			  $('#consultDiv').hide();
			  $('#qualiDiv').hide();
			  $('#spfeeDiv').hide();
		});
		
		
		
   });
   </script>
</section>
<!-- /.content -->