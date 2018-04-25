<link rel="stylesheet" type="text/css" href="<?= BASE_ASSET; ?>css/rest.css">
<link rel="stylesheet" href="<?= BASE_ASSET; ?>jquery-ui/jquery-ui.css">
<style type="text/css">
  .method {
    color: #EC682E;
    font-weight: bolder;
  }

  input.key, input.value  {
    border-top: none !important; 
    border-right: none !important; 
    border-left: none !important; 
    background: none !important;
  }

  .btn-remove {
    color: #D7D6D6;
    background: #F8F8F8
  }

  table tr td{
    padding-left: 5px !important; 
  }

  .table-request tr:first-child .btn-remove {
    display: none;
  }

  select.switch-input-type {
      background: transparent;
      width: 50px;
      padding: 5px;
      font-size: 16px;
      border: 1px solid #ccc;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
  }

  .result-preview {
    border:1px solid #ccc;
    border-radius: 3px;
    height: 400px;
    overflow-y:auto;
    padding: 5px;
  }
   .file-styling input[type=file] {
      opacity: 0;
   }
   .file-styling .info-file {
      padding:10px;
      padding-top: 20px;
      margin-top: 20px;
   }
</style>
<link rel="stylesheet" href="<?= BASE_ASSET; ?>/json-view/jquery.jsonview.css" />
<link rel="stylesheet" href="<?= BASE_ASSET; ?>/json-editor/dist/jsoneditor.css" />
<script type="text/javascript" src="<?= BASE_ASSET; ?>/json-view/jquery.jsonview.js"></script>
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>

<script src="<?= BASE_ASSET; ?>ace-master/build/src/ace.js"></script>
<script src="<?= BASE_ASSET; ?>ace-master/build/src/ext-language_tools.js"></script>
<script src="<?= BASE_ASSET; ?>ace-master/build/src/ext-beautify.js"></script>

<script src="<?= BASE_ASSET; ?>json-editor/dist/jsoneditor.min.js"></script>

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
      Rest      <small>Tool Rest</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a  href="<?= site_url('administrator/rest'); ?>">Rest</a></li>
      <li class="active">Tool</li>
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
                        <a class="btn btn-flat btn-success " title="Api Keys" href="<?= site_url('administrator/keys'); ?>"><i class="fa fa-key" ></i> API Key</a>
                        <a class="btn btn-flat btn-success " title="Api Documentation" href="<?= site_url('administrator/doc/api'); ?>"><i class="fa fa-book" ></i> API Documentation</a>
                      </div>
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/view.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <h3 class="widget-user-username">Rest</h3>
                     <h5 class="widget-user-desc">Tool Rest</h5>
                     <hr>
                  </div>

                 
                  <div class="form-horizontal" name="form_rest" id="form_rest" >
                  <div class="row">
                    <div class="col-md-10">
                     <div class="input-group input-group-lg">
                      <div class="input-group-btn ">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="method-selected">POST</span>
                          <span class="fa fa-caret-down"></span></button>
                        <ul class="dropdown-menu">
                          <?php foreach ($methods as $met): ?>
                          <li><a href="#" class="switch-method" data-value="<?=  strtoupper($met); ?>"><?= strtoupper($met); ?></a></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                      <!-- /btn-group -->
                      <input class="form-control" id="url" placeholder="Enter request URL" type="text">
                      <a href="#" class="btn btn-lg btn-block btn-primary input-group-addon btn-toggle-param">Params</a>
                    </div>
                    </div>

                    <div class="col-md-2">
                      <a href="" class="btn btn-lg btn-block btn-primary btn-flat btn-send">Send</a>
                    </div>
                  </div>
                    <br>
                     <div class="col-md-12 padding-left-0 padding-right-0">
                        <!-- Custom Tabs -->
                        <table class="table-request display-none"  id="table-param" width="100%">
                          <tbody>
                            <tr>
                             <td>
                              <div class="col-md-12">
                               <div class="form-group ">
                                <input type="text" name="key" placeholder="Key" class='form-control key'>
                              </div>
                            </div> 
                          </td>
                          <td>
                            <div class="col-md-12">
                             <div class="form-group ">
                              <input type="text" name="value" placeholder="Value" class='form-control value'>
                            </div>
                          </div>
                        </td>
                        <td>
                          <a class="btn btn-default  btn-remove btn-sm"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li><a href="#tab_1" data-toggle="tab">Headers </a></li>
                            <li class="active"><a href="#tab_2" data-toggle="tab" class="active">Body </a></li>
                          </ul>
                          <div class="tab-content">

                            <div class="tab-pane rest-page-test" id="tab_1">
                              <table class="table-request"  id="table-headers" width="100%">
                                <tbody>
                                
                                <tr>
                                   <td>
                                      <div class="col-md-12">
                                         <div class="form-group ">
                                            <input type="text" name="key" placeholder="Key" class='form-control key'>
                                         </div>
                                      </div> 
                                   </td>
                                   <td>
                                      <div class="col-md-12">
                                         <div class="form-group ">
                                            <input type="text" name="value" placeholder="Value" class='form-control value'>
                                         </div>
                                      </div>
                                   </td>
                                   <td>
                                    <a class="btn btn-default  btn-remove btn-sm"><i class="fa fa-times"></i></a>
                                  </td>
                                </tr>
                               </tbody>
                            </table>
                            </div>
                            <!-- end tab -->

                            <div class="tab-pane active" id="tab_2">
                            <form>
                              
                              <table class="table-request"  id="table-body" width="100%">
                                <tbody>
                                
                                <tr>
                                   <td width="40%">
                                      <div class="col-md-12">
                                         <div class="form-group ">
                                            <input type="text" name="key" placeholder="Key" class='form-control key'>
                                         </div>
                                      </div> 
                                   </td>
                                   <td width="40%">
                                      <div class="col-md-12">
                                         <div class="form-group container-input-type container-text ">
                                            <input type="text" name="value" placeholder="Value" class='form-control value'>
                                         </div>
                                         <label class="file-styling container-input-type container-file display-none">
                                            <div class="btn btn-flat btn-default col-md-4">Select file </div><span class="info-file"> No File Chosen</span>
                                            <input type="file" name="file" class="file">
                                         </label>
                                      </div>
                                   </td>
                                   <td width="20px">
                                      <select class="switch-input-type form-control type rubah">
                                        <option value="text">Text</option>
                                        <option value="file">File</option>
                                      </select>
                                   </td>
                                   <td>
                                    <a class="btn btn-default  btn-remove btn-sm"><i class="fa fa-times"></i></a>
                                  </td>
                                </tr>
                               </tbody>
                            </table>
                            </form>
                            </div>
                            <!-- /.tab-pane -->
                          </div>
                          <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                      </div>
                      <!-- /.col -->
                  </div>
               </div>

              <div class="row">
                
              </div>
              <div class="row container-mode margin-top-10">
                <div class="col-md-7">
                   <div class="btn-group">
                    <a  href="#result-pretty" data-toggle="tab" type="button" class="btn btn-mode btn-default btn-mode-pretty ">Pretty</a>
                    <a  href="#result-raw" data-toggle="tab" type="button" class="btn btn-mode btn-default btn-mode-raw">Raw</a>
                    <a  href="#result-preview " data-toggle="tab" type="button" class="btn btn-mode btn-default btn-mode-preview active">Preview</a>
                  </div>
                  <div class="btn-group margin-left-10">
                    <button type="button" class="btn btn-default btn-flat"><span class="mode-preview-type-selected">JSON</span></button>
                    <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#" class="btn-mode-preview-type" data-value="html">HTML</a></li>
                      <li><a href="#" class="btn-mode-preview-type" data-value="json">JSON</a></li>
                    </ul>
                  </div>
                </div>
                
                 <div class="col-md-3">
                    <div class="col-xs-12"><b>Status : </b><span class="status text-blue"></span></div>
                 </div>
                 <div class="col-md-2">
                    <div class="col-xs-12"><b>Time : </b><span class="time-requested text-blue"></span></div>
                 </div>

              </div>
              </form>
              
              <div class="tab-content" style="margin-top: 20px;">
                <pre class="result-pretty tab-pane " style="height: 400px" id="result-pretty">
                </pre>
                <pre class="result-raw tab-pane" style="height: 400px" id="result-raw">
                </pre>
                <div class="result-preview tab-pane active" id="result-preview">
                </div>
                <textarea class="source-fresh display-none"></textarea>
              </div>
            </div>
            <!--/box body -->
         </div>
         <!--/box -->

      </div>
   </div>
</section>
<!-- /.content -->

<script src="<?= BASE_ASSET; ?>/js/rest-tool.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
     var segment = '<?= $this->uri->segment(4); ?>';

     if (segment == 'get-token') {
         $('#url').val('{api_endpoint}user/request_token');
         addHeaderRequest('X-Api-Key', '');
         addBodyRequest('username', '');
         addBodyRequest('password', '');

         swal({
             title: 'Introduction',
             text: '<p style="text-align:left; line-height:25px;" align="left"><b>1)</b> fill <span class="text-green">username / email</span> and <span class="text-green">password</span> in request body<br> <b>2)</b> switch to tab header and fill <span class="text-green">x-api-key</span> header <br> <b>3)</b> and then click send button.</p>',
             html: true
         });

         $(document).ajaxComplete(function(event, xhr, settings) {
             if (typeof xhr.responseJSON == 'object') {
                 if (typeof xhr.responseJSON.message != 'undefined') {
                     var message = xhr.responseJSON.message.trim().toLowerCase();
                     if (message == 'invalid api key') {
                         swal({
                             title: 'API Key Is not valid!',
                             text: 'if you do not have key, get the key by visiting <a href="' + BASE_URL + 'administrator/keys" target="blank">this page</a>',
                             html: true
                         });
                         return false;
                     } else if (message == 'wrong number of segments') {
                         swal({
                             title: 'Token Is not valid!',
                             text: 'following <a href="' + BASE_URL + 'administrator/rest/tool/get-token" target="blank">this URL</a> guide to get a token ',
                             html: true
                         });
                         return false;
                     }
                 }
             }
         });
     }

     $('#url').autocomplete({
         source: function(request, response) {
             $.ajax({
                 url: BASE_URL + 'administrator/rest/get_resource',
                 dataType: "json",
                 data: {
                     term: request.term
                 },
                 success: function(data) {
                     response(data);
                 }
             });
         }
     });
 });
</script>