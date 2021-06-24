var searchPhone = document.getElementById('search-Phone');
var searchBtn = document.getElementById('submitSearch');
var container = document.getElementById('dropdown-phones');

searchPhone.addEventListener('keyup',function(){
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){
		if( xhr.readyState == 4 && xhr.status == 200){
			container.innerHTML = xhr.responseText;
			container.style.display = "grid";
			container.style.zIndex = 999;
			if(searchPhone.value == ''){
				container.style.display = "none";
			}
		}
	}

	xhr.open('GET','searchPhone.php?phone=' + searchPhone.value, true);
	xhr.send();

});