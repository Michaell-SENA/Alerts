<script type="text/javascript">
var time; var on = false; var seconds = 0; var minutes = 0;

var startTime = function(){
		seconds++;
		time = setTimeout("startTime()",1000);
		if(seconds > 59)  {seconds = 0; minutes++;}
		(minutes);
		// Mostar minutos

		// Mostar segundos
}

// startTime();

var stopStart = function(){
		document.getElementById("time").innerHTML = !on ? "Stop" : "Start";
		if(!on){
			on = true;	startTime();
		}else{
			on = false;	clearTimeout(time);
		}
}
</script>
