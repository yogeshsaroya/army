<div class="content-wrapper" style="min-height: 1066px;">
<style>
@media (max-width: 767px) { .col-xs-2 { width: auto; } }
</style>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Manage Country and States </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-body">
            
            <div id="app_err"></div>
            <?php echo $this->Session->flash('msg');?>

		<div class="col-md-12">
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">Add New Country </h3> 
                
                </div>
                
                <div class="box-body">
                  <div class="row">
                    
                    
                    
<div class="col-md-12">            

<div class="box box-success">

<div class="box-body">
<div class="row">
<div class="col-xs-12"><div class="form-group"><?php echo $this->Form->input('World.name',array('type'=>'text','maxlength'=>50,'class'=>'form-control','label'=>'Country name'));?></div></div>
</div></div></div></div>
                    

<div class="col-md-6">            

<div class="box box-danger">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Cat Back Exhaust</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('Shipping.type1.for_customer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('Shipping.type1.for_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>


<div class="col-md-6">            

<div class="box box-info">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Catalytic Converter</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('Shipping.type2.for_customer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('Shipping.type2.for_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>


<div class="col-md-6">            

<div class="box box-success">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Tuning Box</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('Shipping.type3.for_customer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('Shipping.type3.for_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>


<div class="col-md-6">            

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Shipping cost for Extra Product</h3></div>
<div class="box-body">
<div class="row">
<div class="col-xs-5"><div class="form-group"><label>For Customer</label><?php echo $this->Form->input('Shipping.type3.for_customer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>
<div class="col-xs-5"><div class="form-group"><label>For Dealer</label><?php echo $this->Form->input('Shipping.type3.for_dealer',array('type'=>'number','class'=>'form-control','label' => false,'required'=>true,'min'=>1,'max'=>500));?></div></div>

</div></div></div></div>                    
                    
                    
                    
                    <div class="col-md-6"> 
                    <label for=""> &nbsp;&nbsp; </label>
                    <input type="button" value="Save" id="ct" name="ct" class="btn btn-primary form-control"> </div>
                  </div>
                </div>
              </div>
              
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">Add New State</h3> </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-4"> <?php echo $this->Form->input('World.in_location_1',array('options'=>$this->Lab->getCountry(),'selected'=>$id,'empty'=>' ---Select Country name--- ','class'=>'form-control','label'=>'Country name'));?> </div>
                    <div class="col-md-4"> <?php echo $this->Form->input('World.name',array('type'=>'text','id'=>'state_name_add','maxlength'=>50,'class'=>'form-control','label'=>'State Name'));?> </div>
                    <div class="col-md-4"> <label for=""> &nbsp;&nbsp; </label> <input type="button" value="Save" id="st" name="st" class="btn btn-primary form-control"> </div>
                  </div>
                </div>
              </div>
              
              <div class="box box-success">
                <div class="box-header"> <h3 class="box-title">All Country and state</h3> </div>
                <div class="box-body">
                  								<div class="row">
									<div class="col-sm-12" id="lab_table">
										<table class="table table-bordered table-hover dataTable" id="example2" role="grid" aria-describedby="example2_info">
											<thead>
											
					<tr role="row">
                        <th><?php echo $this->Paginator->sort('World.id', 'ID', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('World.name', 'Name', array('escape' => false)); ?></th>
                        <th><?php echo $this->Paginator->sort('World.created', 'Created', array('escape' => false)); ?></th>
                    </tr>
</thead>
<tbody id="table_rows">

<?php
if (!empty($data)) {
    foreach ($data as $list) { ?>
        <tr class="odd gradeX">
           <td class="center gnTxt"><?php echo $list['World']['id'];?></td>
           <td class="center gnTxt"><a href="<?php
           if($list['World']['type'] == 'co'){ echo SITEURL."lab/labs/country/".$list['World']['id'];}
           elseif($list['World']['type'] == 'st'){ echo SITEURL."lab/labs/country/";}
           ?>"><?php echo $list['World']['name'];?></a></td>
           <td class="center gnTxt"> <?php echo date('M d,y',strtotime($list['World']['created'])); ?> </td>
           </tr>
	<?php } }else{ ?>
	<tr class="odd gradeX"><td colspan="3"> <center>Record not found <a href="<?php echo SITEURL."lab/labs/country/";?>">Go Back</a></center></td></tr>
	<?php }?>
</tbody>
											
</table>
									</div>
                  </div>
                </div>
              </div>
            </div>              
            </div>
            
          </div>
<?php echo $this->Form->end();?>
        </section><!-- /.content -->
      </div>
      
<script>

$(document).ready(function() {

	$( "#WorldInLocation1" ).change(function() { window.location.href = '<?php echo SITEURL."lab/labs/country/";?>'+this.value; });

	
	$( "#ct" ).click(function() {
		var WorldName = $.trim($('#WorldName').val());
		if(WorldName != ""){
			$("#ct").prop("disabled",true); $("#ct").val('Please wait...');			    
	        $.ajax({type: 'POST',
	            url: '<?php echo SITEURL;?>lab/labs/api_country',
	            data: 'c_name='+WorldName+'&type=country',
	            success: function(data) { $("#app_err").html(data); },
	            error: function(comment) { $("#app_err").html(comment); $("#ct").prop("disabled",false); $("#ct").val('Save');}});
		}else{ $('#WorldName').focus(); }
	});


	$( "#st" ).click(function() {
		$("#app_err").html('');
		var st_name = $.trim($('#state_name_add').val());
		var c_id = $.trim($('#WorldInLocation1').val());
		
		if(c_id == ""){ $("#app_err").html('<div class="alert alert-danger fadeIn animated">Please select Country name.</div>'); }
		else if(st_name != ""){
			$("#st").prop("disabled",true); $("#st").val('Please wait...');			    
	        $.ajax({type: 'POST',
	            url: '<?php echo SITEURL;?>lab/labs/api_country',
	            data: 'c_name='+st_name+'&cid='+c_id+'&type=state',
	            success: function(data) { $("#app_err").html(data); $('#state_name_add').val(''); $("#st").prop("disabled",false); $("#st").val('Save');},
	            error: function(comment) { $("#app_err").html(comment); $("#st").prop("disabled",false); $("#st").val('Save');}});
		}else{ $('#state_name_add').focus(); }
	});

	
});

</script>      