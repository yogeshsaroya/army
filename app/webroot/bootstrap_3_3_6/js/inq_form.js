$(document).ready(function(){
			
		file_style();
		



}); 



function file_style(){

	var wrapper = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
	var fileInput = $(':file').wrap(wrapper);

	fileInput.change(function(){
		$this = $(this);
	})

	$('#file').click(function(){
		fileInput.click();
	}).show();
}


(function () {
	var input = document.getElementById("images"), 
		   form = document.getElementById("image-form"),
		   dropbox = document.getElementById("file"),
		formdata = false;

	function showUploadedItem (source) {
  		$("#image-list").html("<li><img src='"+source+"' />");
	}   
	
	function dragEnter(evt) {
	  evt.stopPropagation();
	  evt.preventDefault();
	}

	function dragOver(evt) {
	  evt.stopPropagation();
	  evt.preventDefault();
	   $('#file').css("background-position" , "center -140px");
	  $('#file p').text("Release to add image").css("cursor" , "alias");
	}
	
	function dragExit(evt) {
	  evt.stopPropagation();
	  evt.preventDefault();
	  $('#file').css("background-position" , "center 35px");
	  $('#file p').text("Click or Drag in an image to upload").css("cursor" , "pointer");
	}
	
	function handleFiles(files) {
		var file = files[0]; 
		if (!!file.type.match(/image.*/)) {
			if ( window.FileReader ) {
						reader = new FileReader();
						reader.onloadend = function (e) { 
							showUploadedItem(e.target.result, file.fileName);
						};
						reader.readAsDataURL(file);
					}
			}
	}
	
	function drop(evt){
		evt.stopPropagation();
		evt.preventDefault();
		 
		var files = evt.dataTransfer.files;
		var count = files.length;	
		// Only call the handler if 1 or more files was dropped.
		if (count > 0){
			handleFiles(files);
		}
	}
	
	if (window.FormData) {
  		formdata = new FormData();
	}
	
	// init event handlers
	dropbox.addEventListener("dragenter", dragEnter, false);
	dropbox.addEventListener("dragexit", dragExit, false);
	dropbox.addEventListener("dragover", dragOver, false);
	dropbox.addEventListener("drop", drop, false);
	
	
 	input.addEventListener("change", function (evt) {
 		//document.getElementById("response").innerHTML = "Uploading . . ."
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
	
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}
				if (formdata) {
					formdata.append("images[]", file);
				}
			}	
		}
	}, false);
			
}());