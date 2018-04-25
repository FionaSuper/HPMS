<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Excel docs reader</title>
</head>
<body>
	<?php echo form_open_multipart(site_url('administrator/patient_upload/do_upload'));?>
		<h3>　</h3>
		<div class="form-group ">
		   <label for="PARTNER_CODE" class="col-sm-2 control-label">Partner Code 
		   <i class="required">*</i>
		   </label>
		   <div class="col-sm-3">
			  <select  class="form-control chosen chosen-select-deselect" name="PARTNER_CODE" id="PARTNER_CODE" data-placeholder="" >
				 <option value="tokio">Tokio marine </option>
				 <option value="scb">SCB </option>
				 <option value="now">Now Health Intl</option>
				 <option value="mass">Mass Mutual</option>
				 <option value="ka">KA-QHMS </option>
				 <option value="gen">Generali </option>
			  </select>
			   <small class="info help-block">
			  </small>
		   </div>
		</div>
		<div class="form-group ">
			<label class="col-sm-2"></label>
			
			<div class="col-sm-3">
				<input type="file" name="excelFile[]" accept=".txt, .xlsx, .xls" multiple>
			</div>
		</div>
		
		<div class="form-group ">
			<label class="col-sm-2"></label>
	
			<div class="col-sm-3">
				<input type="submit" name="submit" value="Submit">
			</div>
		</div>
		
		<input type="hidden" name="user" value="<?= $user; ?>">
		
	</form>
	<br><br><hr>	
</body>
