<ol class="breadcrumb">
<li><a href="javascript:void(0);" onclick="show_f();"><i class="fa fa-dashboard"></i> Folder</a></li>
<li><a href="javascript:void(0);"><?php echo uc($f);?></a></li>
</ol>
<?php if(isset($data) && !empty($data) ){ ?>
<?php foreach($data as $list){ $main = show_image('cdn/'.$list['Library']['folder'],$list['Library']['file_name'],100,100,100,'cf',null);?>
<div class="col-sm-1 col-md-2 lib_folder" id="<?php echo $list['Library']['folder']."_".$list['Library']['id'];?>" onclick="select(<?php echo $list['Library']['id'];?>,'<?php echo $list['Library']['folder'];?>');"><div class="thumbnail">
<div class="caption"> <p> &nbsp; </p></div>
<img src="<?php echo $main;?>" title="" alt="">
 <div class="caption"> <p></p></div></div></div>
<?php }?>
<?php }?>
<div id="my_app_err"></div>
<div class="clearfix">
<script type="text/javascript">

function up(arr,id,t){
	var array = arr.split(',');
	if(t == 'r'){ array = $.grep(array, function(value) { return value != id; }); }
	else{  array.push(id);  }
	var str = array.toString()
	str = str.replace(/^,|,$/g,'');
	return str; 
	
}

function save (str,pid,type,slider_for){
	    $.ajax({type: 'POST',
            url: '<?php echo SITEURL;?>lab/labs/up_details',
            data: 'id='+pid+'&slider='+str+'&type='+type+'&slider_for='+slider_for,
            success: function(data) { $("#my_app_err").html(data); },
            error: function(comment) { $("#my_app_err").html(comment); }});
    	
}
function select(id,fl){

<?php if(isset($type) && $type == 's'){?>

if( $('#'+fl+'_'+id).hasClass('active') == false){
	
	$('.lib_folder').removeClass('active');
	$('#'+fl+'_'+id).addClass('active');

	var p_image_path = $('#img_path').val();
	var p_lid = $('#lid').val();
	
	parent.$('#'+p_lid).val(id);
	var img = $('#'+fl+'_'+id+' img').attr('src');
	parent.$('#'+p_image_path+' img').attr('src',img);
}else{

	$('.lib_folder').removeClass('active');
	$('#'+fl+'_'+id).removeClass('active');

	var p_image_path = $('#img_path').val();
	var p_lid = $('#lid').val();
	
	parent.$('#'+p_lid).val('');
	var img = $('#'+fl+'_'+id+' img').attr('src');
	parent.$('#'+p_image_path+' img').attr('src','<?php echo SITEURL;?>cdn/img_text.png');
		
	}

<?php }else{?>
	
	var pid= $('#id').val();
	var type= $('#type').val();
	var slider_for= $('#for').val();
	var s= $.trim( parent.$('#slider').val() );
	if( $('#'+fl+'_'+id).hasClass('active') == false){
			$('#'+fl+'_'+id).addClass('active');
			n_str = up(s,id,'add');
			parent.$('#slider').val(n_str);
			console.log(n_str);
			save (n_str,pid,type,slider_for);
		}else{
			$('#'+fl+'_'+id).removeClass('active');
			n_str = up(s,id,'r');
			parent.$('#slider').val(n_str);
			console.log(n_str);
			save (n_str,pid,type,slider_for);
			}
	<?php }?>
}
function show_f(){
	$('#my_files').hide();
	$('#my_files').html('');
	$('#my_folder').show(); 
}
</script>