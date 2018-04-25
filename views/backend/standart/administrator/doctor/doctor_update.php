
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Doctor        <small>Edit Doctor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/doctor'); ?>">Doctor</a></li>
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
                            <h3 class="widget-user-username">Doctor</h3>
                            <h5 class="widget-user-desc">Edit Doctor</h5>
							 <ul class="nav nav-tabs">
							  <li id="doctortab" class="active"><a id="btn_doctor">Doctor</a></li>
							  <li id="paymenttab" class=""><a id="btn_payment">Payment</a></li>
							</ul>
                        </div>
                        <?= form_open(base_url('administrator/doctor/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_doctor', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_doctor', 
                            'method'  => 'POST'
                            ]); ?>
                         
                            <div id="doctorDiv">
                     <h1>Doctor Info.</h1>
					 
                     <div class="form-group ">
                        <label for="DR_CODE" class="col-sm-2 control-label">Dr Code 
                        </label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control" name="DR_CODE" id="DR_CODE" value="<?= set_value('DR_CODE', $doctor->DR_CODE); ?>" readonly>
							<small class="info help-block">　</small>
						</div>
                     </div>
					 
					 <div class="form-group ">
						<label for="JOIN_DATE" class="col-sm-2 control-label">Join Date
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control pull-right datepicker" name="JOIN_DATE" id="JOIN_DATE" value="<?= set_value('JOIN_DATE', ($doctor->JOIN_DATE == "0000-00-00" ? "" : $doctor->JOIN_DATE)); ?>">
							<small class="info help-block">　</small>
						</div>
						
						<label for="JOIN_DATE" class="col-sm-2 control-label">Term Date
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control pull-right datepicker" name="TERM_DATE" id="TERM_DATE" value="<?= set_value('TERM_DATE', ($doctor->TERM_DATE == "0000-00-00" ? "" : $doctor->TERM_DATE)); ?>">
							<small class="info help-block">　</small>
						</div>
					</div>
					 
                     <div class="form-group ">
                        <label for="E_NAME" class="col-sm-2 control-label">English Name 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-2 ">
							<select  class="form-control cust-required" name="E_TITLE[]" id="E_TITLE" >
								<option <?= $doctor->E_TITLE == "Dr" ? 'selected' :''; ?> value="Dr" id="et1">Dr</option>
								<option <?= $doctor->E_TITLE == "Mr" ? 'selected' :''; ?> value="Mr" id="et1">Mr</option>
								<option <?= $doctor->E_TITLE == "Mrs" ? 'selected' :''; ?> value="Mrs" id="et2">Mrs</option>
								<option <?= $doctor->E_TITLE == "Ms" ? 'selected' :''; ?> value="Ms" id="et3">Ms</option>
								<option <?= $doctor->E_TITLE == "Miss" ? 'selected' :''; ?> value="Miss" id="et4">Miss</option>
							</select>
						   <small class="info help-block">　</small>
                        </div>

                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="E_NAME" id="E_NAME" value="<?= set_value('E_NAME', $doctor->E_NAME); ?>" style="background-color:#f9f906;">
							<small class="info help-block">　</small>
						</div>
                     </div>
					 
                     <div class="form-group ">
                        <label for="C_NAME" class="col-sm-2 control-label">Chinese Name 
                        </label>
                        <div class="col-sm-2">
							<select  class="form-control" name="C_TITLE[]" id="C_TITLE" >
								<option <?= $doctor->C_TITLE == "醫生" ? 'selected' :''; ?> value="醫生" id="ct1">醫生</option>
								<option <?= $doctor->C_TITLE == "先生" ? 'selected' :''; ?> value="先生" id="ct2">先生</option>
								<option <?= $doctor->C_TITLE == "太太" ? 'selected' :''; ?> value="太太" id="ct2">太太</option>
								<option <?= $doctor->C_TITLE == "女士" ? 'selected' :''; ?> value="女士" id="ct3">女士</option>
								<option <?= $doctor->C_TITLE == "小姐" ? 'selected' :''; ?> value="小姐" id="ct4">小姐</option>
							</select>
						   <small class="info help-block">　</small>
                        </div>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="C_NAME" id="C_NAME" value="<?= set_value('C_NAME', $doctor->C_NAME); ?>">
							<small class="info help-block">　</small>
						</div>
                     </div>

                     <div class="form-group  wrapper-options-crud">
                        <label for="GENDER" class="col-sm-2 control-label">Gender 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-8">
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="M" <?= $doctor->GENDER == "M" ? "checked" : ""; ?>> M                                    </label>
							  <small class="info help-block">　</small>
                           </div>
                           <div class="col-md-3 padding-left-0">
                              <label>
                              <input type="radio" class="flat-red" name="GENDER" value="F" <?= $doctor->GENDER == "F" ? "checked" : ""; ?>> F                                    </label>
							  <small class="info help-block">　</small>
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
                                    <input 
									<?=  in_array($row->DT_CODE, explode(',', $doctor->TYPE1)) ? 'checked' : ''; ?>
									<?=  in_array($row->DT_CODE, explode(',', $doctor->TYPE2)) ? 'checked' : ''; ?> 
									<?=  in_array($row->DT_CODE, explode(',', $doctor->TYPE3)) ? 'checked' : ''; ?> 
									
									type="checkbox" class="flat-red" name="TYPE[]"  
									value="<?= $row->DT_CODE ?>"> <?= $row->DT_CODE; ?>
                              </label>
                           </div>
                           <?php endforeach; ?>    
							<small class="info help-block">　</small>
						</div>
                     </div>
                    <div class="form-group ">
                        <label for="MOBILE" class="col-sm-2 control-label">Mobile 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="MOBILE" id="MOBILE" value="<?= set_value('MOBILE', $doctor->MOBILE); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
						
						<label for="PAGER" class="col-sm-2 control-label">Pager 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="PAGER" id="PAGER" value="<?= set_value('PAGER', $doctor->PAGER); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>
					 
					 <div class="form-group ">
						<label for="EMAIL" class="col-sm-2 control-label">Email 
                        </label>
                        <div class="col-sm-3">
                           <input type="email" class="form-control" name="EMAIL" id="EMAIL" value="<?= set_value('EMAIL', $doctor->EMAIL); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
					 
						<label for="LANG" class="col-sm-2 control-label">Special Language 
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="LANG" id="LANG" placeholder='Except "English" and "Chinese"' value="<?= set_value('LANG', $doctor->LANG); ?>">
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>
                    
                     <div class="form-group">
                        <label for="DOB" class="col-sm-2 control-label">DOB
                        </label>
                        <div class="col-sm-3">
                           <input type="text" name="DOB" id="DOB" class="form-control datepicker pull-right " value="<?= set_value('DOB', ($doctor->DOB == "0000-00-00" ? "" : $doctor->DOB)); ?>">
                           <small class="info help-block">
                           </small>
                        </div>
						
						<label for="HKID" class="col-sm-2 control-label">HKID 
                        </label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="HKID" id="HKID" value="<?= set_value('HKID', $doctor->HKID); ?>">
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>

                     <div class="form-group ">
                        <label for="MPS_EXPIRY_DATE" class="col-sm-2 control-label">MPS Expiry Date 
                        </label>
                        <div class="col-sm-6">
                           <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="MPS_EXPIRY_DATE" id="MPS_EXPIRY_DATE" value="<?= set_value('MPS_EXPIRY_DATE', ($doctor->MPS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->MPS_EXPIRY_DATE)); ?>">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="APS_EXPIRY_DATE" class="col-sm-2 control-label">APS Expiry Date 
                        </label>
                        <div class="col-sm-6">
                           <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="APS_EXPIRY_DATE" id="APS_EXPIRY_DATE" value="<?= set_value('APS_EXPIRY_DATE', ($doctor->APS_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->APS_EXPIRY_DATE)); ?>">
                           </div>
                           <small class="info help-block">
                           </small>
                        </div>
                     </div>
                     <div class="form-group ">
                        <label for="BR_EXPIRY_DATE" class="col-sm-2 control-label">BR Expiry Date 
                        </label>
                        <div class="col-sm-6">
                           <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="BR_EXPIRY_DATE" id="BR_EXPIRY_DATE" value="<?= set_value('BR_EXPIRY_DATE', ($doctor->BR_EXPIRY_DATE == "0000-00-00" ? "" : $doctor->BR_EXPIRY_DATE)); ?>">
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
                           <input type="text" class="form-control" name="GP_REG_NO" id="GP_REG_NO" value="<?= set_value('GP_REG_NO', $doctor->GP_REG_NO); ?>" style="background-color:#f9f906;">
							<small class="info help-block">
                           </small>
						</div>
						
						<label for="SP_REG_NO" class="col-sm-2 control-label">SP Reg No. 
                        <i class="required">*</i>
                        </label>
                        <div class="col-sm-3">
                           <input type="text" class="form-control" name="SP_REG_NO" id="SP_REG_NO" value="<?= set_value('SP_REG_NO', $doctor->SP_REG_NO); ?>" style="background-color:#f9f906;">
							<small class="info help-block">
                           </small>
						</div>
                     </div>
                     <div class="form-group ">
                        
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE; ?>" <?= $doctor->SP_CODE1 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
								
									<p class="medical-list-1">
										<?php 
											$first_1 = true;
											
											if ($first_1){
												if ($doctor->SP_CODE1 != "" && $doctor->MEDICAL_PROCEDURES != ""){
													$this->db->where("SP_CODE", $doctor->SP_CODE1); 
													$this->db->order_by("CLINIC_PROCEDURE", "ASC");
													foreach (db_get_all_data('medical_procedures') as $index=>$row): 
														if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
															$check_option = "checked";
														}else{
															$check_option = "";
														}
														echo "<div class='col-md-6  padding-left-0 first-sp-1'><input type='checkbox' ".$check_option.
														" class='flat-red' name='MEDICAL_PROCEDURES1[]' value='".$row->AUTO_NO."'>".
														$row->CLINIC_PROCEDURE."<small class='info help-block'>".
														"</small></div>";
														
													endforeach; 
												}  
											}
										?>
									</p>
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $row->SP_CODE ?>" <?= $doctor->SP_CODE2 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
									<p class="medical-list-2">
										<?php 
											if ($doctor->SP_CODE2 != "" && $doctor->MEDICAL_PROCEDURES != ""){
												$this->db->where("SP_CODE", $doctor->SP_CODE2); 
												$this->db->order_by("CLINIC_PROCEDURE", "ASC");
												foreach (db_get_all_data('medical_procedures') as $index=>$row): 
												if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
													$check_option = "checked";
												}else{
													$check_option = "";
												}
										?>
										
											<?= "<div class='col-md-6  padding-left-0 first-sp-2'><input type='checkbox' ".$check_option.
											" class='flat-red' name='MEDICAL_PROCEDURES2[]' value='".$row->AUTO_NO."'>".$row->CLINIC_PROCEDURE."<small class='info help-block'>".
											"</small></div>"; ?>
										
										<?php endforeach; } ?>
									</p>
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $doctor->SP_CODE3 ?>" <?= $doctor->SP_CODE3 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
									<p class="medical-list-3">
										<?php 
											if ($doctor->SP_CODE3 != "" && $doctor->MEDICAL_PROCEDURES != ""){
												$this->db->where("SP_CODE", $doctor->SP_CODE3); 
												$this->db->order_by("CLINIC_PROCEDURE", "ASC");
												foreach (db_get_all_data('medical_procedures') as $index=>$row): 
												if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
													$check_option = "checked";
												}else{
													$check_option = "";
												}
										?>
										
											<?= "<div class='col-md-6  padding-left-0 first-sp-3'><input type='checkbox' ".$check_option.
											" class='flat-red' name='MEDICAL_PROCEDURES3[]' value='".$row->AUTO_NO."'>".$row->CLINIC_PROCEDURE."<small class='info help-block'>".
											"</small></div>"; ?>
										
										<?php endforeach; } ?>
									</p>
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
								   
								   $this->db->order_by("E_DESC", "ASC");
								   foreach (db_get_all_data('doctor_specialty_desc') as $index=>$row): 
								   
								   ?>
								   <option value="<?= $doctor->SP_CODE4 ?>" <?= $doctor->SP_CODE4 == $row->SP_CODE ? "selected" : ""; ?>><?= $row->C_DESC; ?> &nbsp; <?= $row->E_DESC; ?></option>

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
									<p class="medical-list-4">
										<?php 
											if ($doctor->SP_CODE4 != "" && $doctor->MEDICAL_PROCEDURES != ""){
												$this->db->where("SP_CODE", $doctor->SP_CODE4); 
												$this->db->order_by("CLINIC_PROCEDURE", "ASC");
												foreach (db_get_all_data('medical_procedures') as $index=>$row): 
												if (in_array($row->AUTO_NO, explode(', ', $doctor->MEDICAL_PROCEDURES))){
													$check_option = "checked";
												}else{
													$check_option = "";
												}
										?>
										
											<?= "<div class='col-md-6  padding-left-0 first-sp-4'><input type='checkbox' ".$check_option.
											" class='flat-red' name='MEDICAL_PROCEDURES4[]' value='".$row->AUTO_NO."'>".$row->CLINIC_PROCEDURE."<small class='info help-block'>".
											"</small></div>"; ?>
										
										<?php endforeach; } ?>
									</p>
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
							<input <?=  in_array($row->SHORT_NAME, explode(', ', $doctor->ADMISSION_RIGHT)) ? 'checked' : ''; ?> type="checkbox" class="flat-red" name="ADMISSION_RIGHT[]" value="<?= $row->SHORT_NAME ?>"> 
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
                           <textarea id="REMARK" name="REMARK" rows="5" cols="80"><?= set_value('REMARK', $doctor->REMARK); ?></textarea>
						   <small class="info help-block">
                           </small>
                        </div>
                     </div>

                  </div>
				  
				  <div id="paymentDiv">
					<div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Cheque
                        </label>
                     </div>
					  
					 
					<div class="form-group ">
					   <label for="PAYEE_NAME" class="col-sm-2 control-label">Payee Name
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" value="<?= set_value('PAYEE_NAME', ($doctor_payment == "" ? "" : $doctor_payment->PAYEE_NAME)); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" value="<?= set_value('PAYEE_ADDR1', ($doctor_payment == "" ? "" : $doctor_payment->PAYEE_ADDR1)); ?>">
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" value="<?= set_value('PAYEE_ADDR2', ($doctor_payment == "" ? "" : $doctor_payment->PAYEE_ADDR2)); ?>">
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" value="<?= set_value('PAYEE_ADDR3', ($doctor_payment == "" ? "" : $doctor_payment->PAYEE_ADDR3)); ?>">
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" value="<?= set_value('PAYEE_ADDR4', ($doctor_payment == "" ? "" : $doctor_payment->PAYEE_ADDR4)); ?>">
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" value="<?= set_value('PAYEE_ADDR5', ($doctor_payment == "" ? "" : $doctor_payment->PAYEE_ADDR5)); ?>">
						<small class="info help-block">
                              </small>
					  </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
					   </label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" value="<?= set_value('PAYEE_DISTRICT', ($doctor_payment == "" ? "" : $doctor_payment->PAYEE_DISTRICT)); ?>">
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
								<option <?php if ($doctor_payment != "") { echo $row->CLEARING_CODE == $doctor_payment->BANK_CLEARING_CODE ? 'selected' : ''; }  ?> value="<?= $row->CLEARING_CODE ?>"><?= $row->C_NAME; ?> &nbsp; <?= $row->E_NAME; ?></option>
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
							 <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO" value="<?= set_value('ACCOUNT_NO', ($doctor_payment == "" ? "" : $doctor_payment->ACCOUNT_NO)); ?>">
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
							 <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER" value="<?= set_value('ACCOUNT_HOLDER', ($doctor_payment == "" ? "" : $doctor_payment->ACCOUNT_HOLDER)); ?>">
							 <small class="info help-block">
                              </small>
						  </div>
					   </div>
					</div>
				  </div>
                        </div>
                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="save (Ctrl+s)">
                            <i class="fa fa-save" ></i> Save
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
		
		//$(".expand-medical").hide();

		jQuery(window).on("load", function(){
			$("#paymentDiv").hide();
		});
		
		
		/*$('.expand-medical-list-1').hide();
		$('.expand-medical-list-2').hide();
		$('.expand-medical-list-3').hide();
		$('.expand-medical-list-4').hide();*/
		
		
		if (<?= $doctor->SP_CODE1 == "" ? true : 0; ?>){
			$(".expand-medical-1").hide();
		}

		if (<?= $doctor->SP_CODE2 == "" ? true : 0; ?>){
			$(".expand-medical-2").hide();
		}
		
		if (<?= $doctor->SP_CODE3 == "" ? true : 0; ?>){
			$(".expand-medical-3").hide();
		}
		
		if (<?= $doctor->SP_CODE4 == "" ? true : 0; ?>){
			$(".expand-medical-4").hide();
		}
		
		

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
						
						$('.medical-list-'+sp_num).html("");
						$('.first-sp-'+sp_num).remove();
						
						
						if (data['has_medical_procedures']){
							$.each(data['medical_procedures'], function(index, val) {
							
								$('.medical-list-'+sp_num).append("<div class='col-md-6  padding-left-0'><input type='checkbox' class='flat-red' name='MEDICAL_PROCEDURES" + sp_num + "[]' value='" + 
								val.AUTO_NO + "'>" + val.CLINIC_PROCEDURE + "<small class='info help-block'></small></div>");
								
							});
							
						}else{
							$(medical_list).append("(No medical procedures)");
						}
						
						
						$('input[type="checkbox"].flat-red').iCheck({
							checkboxClass: 'icheckbox_flat-green',
							radioClass: 'iradio_flat-green'
						});
						
						$('input[name="MEDICAL_PROCEDURES' + sp_num + '"]').iCheck('uncheck');
						
						
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
		
		$('#btn_doctor').click(function(){
		  $('#doctorDiv').show();
		  $('#doctortab').addClass('active');
		  $('#paymentDiv').hide();
		  $('#paymenttab').removeClass('active');
	  });

	  $('#btn_payment').click(function(){
		  $('#paymentDiv').show();
		  $('#paymenttab').addClass('active');
		  $('#doctorDiv').hide();
		  $('#doctortab').removeClass('active');
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
          url: form_doctor.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#doctor_image_galery').find('li').attr('qq-file-id');
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