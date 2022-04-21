<div id="rotateepic" class="white-popup-block" style="max-width:500px;">
<?php $t = 1; if(isset($reload) && $reload == "here"){ $t =2; }?>
<div class="" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="" role="document">
    <div class="modal-content">
      <div class="modal-body"> <h2 class="bigMsg"><?php echo $msg;?></h2> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success margin" data-dismiss="modal" onclick="c(<?php echo $t;?>);">Okay</button>
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript">
function c(t){
	if(t == 1){ $.magnificPopup.close(); }
	else if(t == 2){ parent.location.reload(); $.magnificPopup.close();  }
	else{ $.magnificPopup.close(); }
}
</script>
</div>