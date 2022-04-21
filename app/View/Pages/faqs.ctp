<?php if(isset($IsMobile) && $IsMobile == 'yes'){
echo $this->Html->css(array('theme','responsive','custom')); 
echo $this->Html->script(array('modules','theme'));
}?>
<style>
h1{font-size:32px}
.sub_head{font-size:20px}
@media (max-width:900px){
#main_sec {  margin-top: 16%;color: #fff}
}
h5.shortcode_toggles_item_title.expanded_no {
    font-weight: 500;
    background: #f5f5f5;
    border-color: #ddd;
}
.shortcode_toggles_item_body {
    border: 1px solid #ddd;
    padding: 0 0 0 5%;
}
</style>
<div class="col-md-12" id="faq_div">
<div class="fw_content_wrapper" id="pad-set-bd">
<div class="fw_content_padding">
<div class="contentarea">
 
<h1 class="hid-mbl" style="text-align: center;">Tuning Wikipedia</h1>


<div class="module_tabs">
                                        	
<div class="shortcode_tabs type1">
<div class="all_head_sizer"><div class="all_heads_cont">

<?php
$n = 1;
foreach ($data as $c){
if(!empty($c['Faq'])){?>              
<div class="shortcode_tab_item_title <?php echo "it".$n." head".$n; if($n == 1){ echo " active";}?>" whatopen="body<?php echo $n;?>"><?php echo $c['Category']['name'];?></div>
<?php $n++;}}?> 
</div></div>
<div class="all_body_sizer"><div class="all_body_cont">

<?php
$n1 = 1;
foreach ($data as $c){
if(!empty($c['Faq'])){?>
<div class="shortcode_tab_item_body tab-content clearfix <?php echo "body".$n1." it".$n1; if($n1 == 1){ echo " active";}?>">
<div class="ip">
<div class="shortcode_toggles_shortcode toggles">

<?php 
	foreach ($c['Faq'] as $f){ ?>

<h5 data-count="1" class="shortcode_toggles_item_title expanded_no"><?php echo $f['title'];?><span class="ico"></span></h5>
<div class="shortcode_toggles_item_body" style="display: none;">
<div class="ip">
<p><?php echo $f['description'];?></p></div></div>	
<?php  }?>
</div></div></div>
<?php $n1++; }}?>
</div>
</div>
</div>
</div>
</div>
</div>
</div></div>