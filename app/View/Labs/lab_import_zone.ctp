<div style="max-width:700px;margin:20px auto" class="gn_new_pop" id="rental_all_history">
<?php echo $this->Html->script(array('jquery.form.min'));?>
    <div class="content-wrapper edit_lib">
        <section class="content-header">
            <h1>Import Zone and Car Product Shipping</h1>
        </section>
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                    <?php echo $this->Form->create('Import',['id'=>'proFrm','type' => 'file']);?>
                                    <div class="box-body">
                                        <div class="form-group">
                                                <?php
                                                echo $this->Form->input('import_file', ['between' => '<br />','type' => 'file','label' => 'Upload CSV File','accept'=>'.csv']);
                                                ?>
                                        </div>
                                        <div class="clearfix b-buffer"></div>
                                    </div>

                                    <div id="app_err"></div>
                                    <div class="box-footer">
                                        <div class="col-sm-4 pull-right"><input type="button" class="btn btn-success  pull-right" value="Update" id="lib_save"></div>
                                        <div class="col-sm-4 pull-left"><button type="button" class="btn btn-default " onclick="$.magnificPopup.close();">Close</button></div>
                                    </div>
                                    </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
                  window['btnState'] = function() {
                    $("#lib_save").prop("disabled", false);
                    $("#lib_save").val('Update');
                  };
                  $(document).ready(function() {
                    
                    $("#lib_save").click(function() {
                      $("#app_err").html('');
                      $("#proFrm").ajaxForm({
                        target: '#app_err',
                        beforeSubmit: function() {
                          $("#lib_save").prop("disabled", true);
                          $("#lib_save").val('Please wait...');
                        },
                        success: function(response) {
                          btnState();
                        },
                        error: function(response) {
                          btnState();
                        }
                      }).submit();
                    });
                  });
                </script>
</div>