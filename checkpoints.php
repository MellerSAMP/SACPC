<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<style type="text/css">
			body {
				background: url(radar.png) no-repeat;
				width: 1000px;
				height: 1000px;
				background-size: 1000px 1000px;
			}

			#alert {
				position: fixed;
				color: #FFF;
				font-size: 14pt;
				font-weight: bold;
				font-family: "Arial Black";
			}

			#cp {
				width: 16px;
				height: 16px;
				border-radius: 50%;
				background: #CC0000;
				position: absolute;
				text-align: center;
			}

			#CPs {
				position: fixed;
				bottom: 20px;
				right: 20px;
				color: #FFF;
				font-size: 14pt;
				font-weight: bold;
				font-family: "Arial Black";
			}
		</style>
		<script type="text/javascript">
			$( document ).on( "mousemove", function( event ) { //dab
				var x = event.pageX;
				x *= 6;
				x -= 3000;
				var y = event.pageY;
				y *= 6;
				y -= 3000;
				if(y < 0) {
					y = Math.abs(y);
				}
				else if(y > 1)
					y = -y;

			  $( "#alert" ).html( "pageX: " + x + "<br>pageY: " + y);
			});

			var nextID = 0;

			$("body").click(function(){
				var x = event.pageX;
				var y = event.pageY;
				$("body").append("<div id='cp' style='left: " + x + "px; top: " + y + "px'>" + nextID + "</div>");
				x *= 6;
				x -= 3000;
				y *= 6;
				y -= 3000;
				if(y < 0) {
					y = Math.abs(y);
				}
				else if(y > 1)
					y = -y;
				$("#CPs #textarea").append("\n\nMapAndreas_FindZ_For2DCoord(" + x + ", " + y + ", GameRaceCP[" + nextID + "][cpZ]);\nGameRaceCP[" + nextID + "][cpX] = " + x + ";\nGameRaceCP[" + nextID + "][cpY] = " + y + ";");
				$("#CPsql #textarea").append("\nINSERT INTO raceCPS SET cpid = " + nextID + ", x = " + x + ", y = " + y + ";");
				nextID += 1;
			});
		</script>
		<div id="alert">nun</div>
		<div id="CPs"><textarea id="textarea" rows="16" cols="100"></textarea></div>
	</body>
</html>
