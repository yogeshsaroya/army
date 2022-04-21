
<div class="col-md-7">
<div id="top-drp-down">
<div class="top-drp-down ">
<ul class="drp-box">

<li class="dropdown">
<button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SELECT OTHER BRANDS<span class="caret"></span></button>
<ul class="dropdown-menu" aria-labelledby="dLabel">
<div class="scroll-dvc content_3">
<?php if(isset($arrList['Brand']) && !empty($arrList['Brand'])){
foreach ($arrList['Brand'] as $k=>$v){?>
<li> <a href="<?php echo $k;?>"> <?php echo $v;?> </a></li>
<?php }}?>
</div>
</ul></li>


<li class="dropdown">
<button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SELECT OTHER CAR MODELS<span class="caret"></span></button>
<ul class="dropdown-menu" aria-labelledby="dLabel">
<div class="scroll-dv content_2">
<?php if(isset($arrList['Model']) && !empty($arrList['Model'])){
foreach ($arrList['Model'] as $k=>$v){?>
<li> <a href="<?php echo $k;?>"> <?php echo $v;?> </a></li>
<?php }}?>
</ul></li>

</ul>
</div>
</div>
</div>
</div>