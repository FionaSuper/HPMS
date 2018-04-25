<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
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
               </ul>
			   
			    <!------------------------------- Doctor div ------------------------------->
               <div id="doctor">
                  <div class="form-horizontal" name="form_doctor" id="form_doctor" >
					
					<!-- Doctor info 1 -->
                     <div id="doctor_info1" class="col-sm-6">
						<h3>&nbsp;</h3>
                        <div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Doctor Code </label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->DR_CODE); ?>
							  <small class="info help-block">
							  </small>
                           </div>
                        </div>
						
                        <div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">English Name </label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->E_TITLE); ?> <?= _ent($doctor->E_NAME); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
                        <div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Chinese Name </label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->C_NAME) == "" ? "" : _ent($doctor->C_NAME)." &nbsp; "._ent($doctor->C_TITLE); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Gender </label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->GENDER); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
                        <div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Type</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->TYPE1); ?><br>
							  <?= _ent($doctor->TYPE2); ?><br>
							  <?= _ent($doctor->TYPE3); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Mobile</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->MOBILE); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Email</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->EMAIL); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Language</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->LANG); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">DOB</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->DOB); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">HKID</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->HKID); ?>
							  <small class="info help-block">
								</small>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">MPS Expiry Date</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->MPS_EXPIRY_DATE) == "0000-00-00" ? "" : _ent($doctor->MPS_EXPIRY_DATE) ; ?>
							  <small class="info help-block">
								</small>
							</div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">APS Expiry Date</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->APS_EXPIRY_DATE) == "0000-00-00" ? "" : _ent($doctor->APS_EXPIRY_DATE) ; ?>
							  <small class="info help-block">
								</small>
							</div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">BR Expiry Date</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->BR_EXPIRY_DATE) == "0000-00-00" ? "" : _ent($doctor->BR_EXPIRY_DATE) ; ?>
							  <small class="info help-block">
								</small>
							</div>
                        </div>
						
						<h3>&nbsp;</h3>

                     </div>
                     <!-- End Doctor info 1 --> 

					 

					 <!-- Doctor info 2 --> 
					<div class="col-sm-6" id="doctor_info2">
							<h3>&nbsp;</h3>
						   <div class="form-group ">
							  <label for="content" class="col-sm-3 control-label">GP Reg No</label>
							  <div class="col-sm-9">
								 <?= _ent($doctor->GP_REG_NO); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   <div class="form-group ">
							  <label for="content" class="col-sm-3 control-label">SP Reg No</label>
							  <div class="col-sm-9">
								 <?= _ent($doctor->SP_REG_NO); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   <div class="form-group ">
							  <label for="content" class="col-sm-3 control-label">Specialty</label>
							  <div class="col-sm-9">
								 <?php
									if (_ent($doctor->SP_CODE1) != ""){
										$this->db->where("SP_CODE", _ent($doctor->SP_CODE1));
										$query = $this->db->get("doctor_specialty_desc")->row();
										
										echo $query->C_DESC." &nbsp; ".$query->E_DESC.
										"<small class='info help-block'>
										</small><br>";
									}
									?>
								 <?php
									if (_ent($doctor->SP_CODE2) != ""){
										$this->db->where("SP_CODE", _ent($doctor->SP_CODE2));
										$query = $this->db->get("doctor_specialty_desc")->row();
										
										echo $query->C_DESC." &nbsp; ".$query->E_DESC.
										"<small class='info help-block'>
										</small><br>";
									}
									?>
								 <?php
									if (_ent($doctor->SP_CODE3) != ""){
										$this->db->where("SP_CODE", _ent($doctor->SP_CODE3));
										$query = $this->db->get("doctor_specialty_desc")->row();
										
										echo $query->C_DESC." &nbsp; ".$query->E_DESC.
										"<small class='info help-block'>
										</small><br>";
									}
									?>
								 <?php
									if (_ent($doctor->SP_CODE4) != ""){
										$this->db->where("SP_CODE", _ent($doctor->SP_CODE4));
										$query = $this->db->get("doctor_specialty_desc")->row();
										
										echo $query->C_DESC." &nbsp; ".$query->E_DESC.
										"<small class='info help-block'>
										</small><br>";
									}
									?>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="content" class="col-sm-4 control-label">Admission Right</label>
							  <div class="col-sm-8">
								 <?= _ent($doctor->ADMISSION_RIGHT); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="content" class="col-sm-4 control-label">Medical Procedures</label>
							  <div class="col-sm-7">
								 <?= _ent($doctor->MEDICAL_PROCEDURES); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="content" class="col-sm-3 control-label">Join Date</label>
							  <div class="col-sm-7">
								 <?= _ent($doctor->JOIN_DATE); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="content" class="col-sm-3 control-label">Term Date</label>
							  <div class="col-sm-7">
								 <?= _ent($doctor->TERM_DATE); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="content" class="col-sm-3 control-label">STATUS</label>
							  <div class="col-sm-7">
								 <?= _ent($doctor->STATUS); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   
						   <div class="form-group ">
							  <label for="content" class="col-sm-3 control-label">Remark</label>
							  <div class="col-sm-7">
								 <?= _ent($doctor->REMARK); ?>
								 <small class="info help-block">
								</small>
							  </div>
						   </div>
						   
						   <h3>&nbsp;</h3>
					</div>
					 <!--- End Doctor div 2--->
					 
					 <div>
					<div class="form-group ">
                           <label for="content" class="col-sm-2 control-label">Creator</label>
                           <div class="col-sm-8">
                              <?= _ent($doctor->CREATOR); ?>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Create Date</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->CREATE_DATE); ?>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Last Modifier</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->LAST_MODIFIER); ?>
                           </div>
                        </div>
						
						<div class="form-group ">
                           <label for="content" class="col-sm-5 control-label">Last Update</label>
                           <div class="col-sm-7">
                              <?= _ent($doctor->LAST_UPDATE); ?>
                           </div>
                        </div>
						</div>
					 
                  </div>
				  <!--- End Doctor form div --->
				  
               </div>
			   <!------------------------------- End Doctor div ------------------------------->

			   
			   
			   <!------------------------------- Payment div ------------------------------->
			   <div id="paymentDiv">
					 <div class="form-horizontal" name="form_payment" id="form_payment" >
						<div class="form-group ">
                        <label for="PAYMENT" class="col-sm-1 control-label" style="color:blue;">Cheque
                        </label>
                     </div>
					 
					<div class="form-group ">
					   <label for="PAYEE_NAME" class="col-sm-2 control-label">Payee Name
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_NAME" id="PAYEE_NAME" value="<?= set_value('PAYEE_NAME', $doctor_payment->PAYEE_NAME); ?>" readonly> 
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					<div class="form-group ">
					   <label for="PAYEE_ADDR1" class="col-sm-2 control-label">Payee Addr
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR1" id="PAYEE_ADDR1" value="<?= set_value('PAYEE_ADDR1', $doctor_payment->PAYEE_ADDR1); ?>" readonly>
						  <small class="info help-block">
						  </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR2" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR2" id="PAYEE_ADDR2" value="<?= set_value('PAYEE_ADDR2', $doctor_payment->PAYEE_ADDR2); ?>" readonly>
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR3" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR3" id="PAYEE_ADDR3" value="<?= set_value('PAYEE_ADDR3', $doctor_payment->PAYEE_ADDR3); ?>" readonly>
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR4" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR4" id="PAYEE_ADDR4" value="<?= set_value('PAYEE_ADDR4', $doctor_payment->PAYEE_ADDR4); ?>" readonly>
						<small class="info help-block">
                              </small>
					   </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_ADDR5" class="col-sm-2 control-label">
					   </label>
					   <div class="col-sm-8">
						  <input type="text" class="form-control" name="PAYEE_ADDR5" id="PAYEE_ADDR5" value="<?= set_value('PAYEE_ADDR5', $doctor_payment->PAYEE_ADDR5); ?>" readonly>
						<small class="info help-block">
                              </small>
					  </div>
					</div>
					
					<div class="form-group ">
					   <label for="PAYEE_DISTRICT" class="col-sm-2 control-label">Payee District
					   </label>
					   <div class="col-sm-4">
						  <input type="text" class="form-control" name="PAYEE_DISTRICT" id="PAYEE_DISTRICT" value="<?= set_value('PAYEE_DISTRICT', $doctor_payment->PAYEE_DISTRICT); ?>" readonly>
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
								$this->db->where("CLEARING_CODE", $doctor_payment->BANK_CLEARING_CODE);
								$query = $this->db->get("bank");
								
								if ($query->num_rows() > 0){
									$query = $query->row();
							?>
							<input type="text" class="form-control" value="<?= $query->C_NAME." &nbsp; ".$query->E_NAME; ?>" readonly>
							<?php
								}
							?>
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
							 <input type="text" class="form-control" name="ACCOUNT_NO" id="ACCOUNT_NO" value="<?= set_value('ACCOUNT_NO', $doctor_payment->ACCOUNT_NO); ?>" readonly>
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
							 <input type="text" class="form-control" name="ACCOUNT_HOLDER" id="ACCOUNT_HOLDER" value="<?= set_value('ACCOUNT_HOLDER', $doctor_payment->ACCOUNT_HOLDER); ?>" readonly>
							 <small class="info help-block">
                              </small>
						  </div>
					   </div>
					</div>
				  </div>
				</div>
			   <!------------------------------- End Payment div ------------------------------->
			   
			   <br>
			   
               <div class="view-nav col-sm-12">
                  <?php is_allowed('doctor_update', function($doctor) use ($doctor){?>
                  <a class="btn btn-flat btn-info btn_edit btn_action" id="btn_edit" data-stype='back' title="edit doctor (Ctrl+e)" href="<?= site_url('administrator/doctor/edit/'.$doctor->DR_CODE); ?>"><i class="fa fa-edit" ></i> Edit Doctor</a><?php }) ?>
                  <a class="btn btn-flat btn-default btn_action" id="btn_back" title="back (Ctrl+x)" href="<?= site_url('administrator/doctor/'); ?>"><i class="fa fa-undo" ></i> Go Doctor List</a>
               </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->
      </div>
   </div>
   
   <script>
   $(document).ready(function(){
	   
	   $("#paymentDiv").hide();
	   
	   
	   $('#doctor_tab').on('click',function(){
			  $('#doctor').show();
			  $('#paymentDiv').hide();
			  //$('#qualiDiv').hide();
		});
	   
	   $('#payment_tab').on('click',function(){
			  $('#paymentDiv').show();
			  $('#doctor').hide();
			  //$('#qualiDiv').hide();
		});
		
		
		
   });
   </script>
</section>
<!-- /.content -->