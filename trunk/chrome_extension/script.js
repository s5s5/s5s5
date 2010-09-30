function bgrunSave(id) {
	var bgs = document.getElementById('bgrunsave').checked;
	localStorage.setItem('bgs_s5',bgs ? '1' : '0');
}
function bgrun() {
	if (localStorage.getItem('bgs_s5') == '1'){
		getUserScribble2();
	} else {
		document.getElementById('ifrsrc2').src = 'wel.html';
	}
}
function storeUserScribble(id) {
	var scribble = document.getElementById('scribble').value;
	localStorage.setItem('userDIYPopup_s5',scribble);
}
function getUserScribble() {
	if ( localStorage.getItem('userDIYPopup_s5')) {
		var scribble = localStorage.getItem('userDIYPopup_s5');
	} else {
		var scribble = 'wel.html';
	}
	if (scribble == 'wel.html'){
		document.getElementById('scribble').value = '输入网址后请按回车';
	}else{
		document.getElementById('scribble').value = scribble;
	}
	document.getElementById('ifrsrc').src = scribble;
	document.getElementById('bgrunsave').checked = localStorage.getItem('bgs_s5') == '1';
	showload();
}
function getUserScribble2() {
	var test1 = document.getElementById('ifrsrc2').src;
	if (localStorage.getItem('userDIYPopup_s5')) {
		var scribble = localStorage.getItem('userDIYPopup_s5');
	} else {
		var scribble = 'wel.html';
	}
	if (test1 != scribble){
		document.getElementById('ifrsrc2').src = scribble;
	}
}
function showload(){
	var loading = document.getElementById('loading');
	loading.className="showload"
	setTimeout("hideload()",3210);
	localStorage.setItem('bgs_s5','0');
	document.getElementById('bgrunsave').checked = localStorage.getItem('bgs_s5') == '1';
}
function hideload(){
	loading.className="hideload"
}
