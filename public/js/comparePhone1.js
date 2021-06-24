var searchPhone1 = document.getElementById('sPhone1');
var searchBtn1 = document.getElementById('btnPhone1');
var container1 = document.getElementById('d-phones1');
var phoneid2 = document.getElementById('phoneid2');

searchPhone1.addEventListener('keyup',function(){
	var xhr = new XMLHttpRequest();

    // kalau udah kelar change nya ini ya gais
	xhr.onreadystatechange = function(){
		if( xhr.readyState == 4 && xhr.status == 200){
			container1.innerHTML = xhr.responseText;
			container1.style.display = "grid";
			container1.style.zIndex = 999;
			if(searchPhone1.value == ''){
				container1.style.display = "none";
			}
		}
	}

	xhr.open('GET','comPhone1.php?ph=' + searchPhone1.value + '&phoneid2=' + phoneid2.value, true);
	xhr.send();

});