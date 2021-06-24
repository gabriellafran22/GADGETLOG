var searchPhone2 = document.getElementById('sPhone2');
var searchBtn2 = document.getElementById('btnPhone2');
var container2 = document.getElementById('d-phones2');
var phoneid1 = document.getElementById('phoneid1');

searchPhone2.addEventListener('keyup',function(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if( xhr.readyState == 4 && xhr.status == 200){
			container2.innerHTML = xhr.responseText;
			container2.style.display = "grid";
			container2.style.zIndex = 999;
			if(searchPhone2.value == ''){
				container2.style.display = "none";
			}
		}
	}

	xhr.open('GET','comPhone2.php?ph=' + searchPhone2.value + '&phoneid1=' + phoneid1.value, true);
	xhr.send();

});