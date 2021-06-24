
var searchPhone = document.getElementById('searchPhone');
var searchBtn = document.getElementById('searchBtn');
var tablee = document.getElementById('tablee');

searchPhone.addEventListener('keyup',function(){
	//object ajax
	var xhr = new XMLHttpRequest();

	//memastikan data ada
	xhr.onreadystatechange = function(){
		if( xhr.readyState == 4 && xhr.status == 200){
			tablee.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET','ajax/browseGadgetSearch.php?phone=' + searchPhone.value, true);
	xhr.send();

});