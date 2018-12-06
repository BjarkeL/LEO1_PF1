<!DOCTYPE html>
<html>
<head>
	<title> LEO1_PF2 </title>
	<link type="text/css" rel="stylesheet" href="./snow.css">
</head>

<style>
html, body {
	font-family: "Lucida Console", Monaco, monospace;
	font-size: 15px;
	margin: 0;
	padding: 0;
	height: 100%;
	background: linear-gradient(217deg, rgba(255,0,0,.8), rgba(255,0,0,0) 70.71%),
		linear-gradient(127deg, rgba(0,255,0,.8), rgba(0,255,0,0) 70.71%),
		linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);
	background-size: 400% 400%;
	animation: fadeBack 15s ease infinite;
}

@keyframes fadeBack {
	0% {
		background-position: 100% 0%;
	}
	25% {
		background-position: 100% 100%;
	}
	50% {
		background-position: 0% 100%;
	}
	75% {
		background-position: 0% 0%;
	}
	100% {
		background-position: 100% 0%;
	}
}

body {
	display: flex;
	flex-direction: column;
	justify-content: center;
}
.content {
	margin: 0 auto;
	padding: 50px;
	width: -moz-fit-content;
	border: solid rgba(255, 0, 0, 0.5);
	border-width: 0 25px;
	background: linear-gradient(rgba(0, 255, 255, 0.5), rgba(255, 0, 255, 0.5));
	border-radius: 15%;
	box-shadow: 0 0 50px black;
	z-index: 1000;
}
#split {
	justify-content: center;
	display: grid;
	grid-template-columns: min-content min-content min-content min-content;
	grid-gap: 1em 3em;
	margin-top: 25px;
}
span {
	display: block;
	text-align: right;
}
button {
	background-color: rgba(200, 0, 0, 0.2);
	padding: 15px;
	margin-top: 25px;
	width: 100%;
	border: none;
	color: white;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 15px;
	box-shadow: 0 0 5px black;
	border-radius: 15px;
}
.footer {
	padding: 10px 0;
	position: absolute;
	bottom: 0;
	margin: 0 auto;
	text-align: center;
	width: 100%;
}
</style>
	<body>

	<div class="winter-is-coming">
	  
	    	<div class="snow snow--near"></div>
	      	<div class="snow snow--near snow--alt"></div>
	        
		<div class="snow snow--mid"></div>
		<div class="snow snow--mid snow--alt"></div>
		      
		<div class="snow snow--far"></div>
		<div class="snow snow--far snow--alt"></div>
	</div>


	<div class="content">
			<h2>Random numbers from the second container</h2>
		<div id="split">
		
		</div>
		<button onclick="request()">Click to refresh the numbers</button>
	</div>
	<div class="footer">
		2018 - Bjarke Larsen, Jens Beltman Jørgensen
	</div>
	</body>
<script>
function request() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
			var myArr = JSON.parse(this.responseText);
			
			document.getElementById("split").innerHTML = "";

			var i;
			for (i = 0; i < myArr.length - 1; i++) {
			var span = document.createElement("span");
			var node = document.createTextNode(myArr[i]);
			span.appendChild(node);
			var element = document.getElementById("split");
			element.appendChild(span);
			}

		}
	};
	xmlhttp.open("GET", "./getNumbers.php", true);
	xmlhttp.send();
}
request();
setInterval(request, 5000);
</script>
</html>
