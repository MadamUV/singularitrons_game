<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Intelligent eCards</title>
        <link rel="stylesheet" href="../style.css" type="text/css" media="screen">
        <script src="../scripts/jquery.js"></script>
</head>
<body>
        <script>
                var canvas = document.createElement("canvas");
                var cx = canvas.getContext("2d");
                canvas.width=768;
                canvas.height=500;
                document.body.appendChild(canvas);
                var bgOk = false;
                var humanOk = false;
                var robot1Ok = false;
                var robot1Img = new Image();
                robot1Img.onload = function(){
                        robot1Ok = true;
                };
                var bgImg = new Image();
                bgImg.onload = function(){
                        bgOk = true;
                };
                bgImg.src="assets_and_scenes/singularitrons-1.jpg";
                var humanImg = new Image();
                humanImg.onload = function(){
                        humanOk = true;
                };
                humanImg.width=100;
                humanImg.height=100;
                humanImg.src="assets_and_scenes/spriteMain.png";
                var human = {speed:256, x:120, y:120};
                var robot1 = {speed:200, xy:[[620, 420], [420, 420]]};
                var keysDown={};
                addEventListener("keydown", function(e){
                        keysDown[e.keyCode] = true;
                }, false);
                addEventListener("keydown", function(e){
                        delete keysDown[e.keyCode];
                }, false);
                function robotWalk(robot, mod) {
                        robot.x=robot.xy[0][0];
                        robot.y=robot.xy[0][1];
                        var n=0;
                        var m=1;
                        var p=0;
                        var robotWalkLen = robot.xy.length-1;
                        var touching = false;
                     while(!Math.abs(robot.x-human.x<90)&&Math.abs(robot.y-human.y<90)){
                        if(robot.xy.length>1) {
                                for(n=0; n<robotWalkLen-1; n++) {
                                        for(m=1; m<robot.xy.length; m++) {
                                                if(robot.x==robot.xy[n][0]&&robot.y==robot.xy[n][1]){
                                                        if(robot.xy[n][0]<robot.xy[m][0]){
                                                                robot.x -= robot.speed*mod;
                                                           }
                                                        else if(robot.xy[n][1]<robot.xy[m][1]){
                                                                robot.y -= robot.speed*mod;
                                                           }
                                                        if(robot.xy[n][0]>robot.xy[m][0]){
                                                                robot.x += robot.speed*mod;
                                                           }
                                                        else if(robot.xy[n][1]>robot.xy[m][1]){
                                                                robot.y += robot.speed*mod;
                                                           }
                                                        if (robot.x==robot.xy[robotWalkLen][0]&&robot.y==robot.xy[robotWalkLen][1]){
                                                                if(robot.xy[n][0]<robot.xy[0][0]){
                                                                robot.x -= robot.speed*mod;
                                                                   }
                                                                else if(robot.xy[n][1]<robot.xy[0][1]){
                                                                        robot.y -= robot.speed*mod;
                                                                   }
                                                                if(robot.xy[n][0]>robot.xy[0][0]){
                                                                        robot.x += robot.speed*mod;
                                                                   }
                                                                else if(robot.xy[n][1]>robot.xy[0][1]){
                                                                        robot.y += robot.speed*mod;
                                                                   }
                                                        }
                                                }
                                        }
                                }
                        }
                     }
                }
                function update(mod){
                              if(37 in keysDown) {
                                      human.x -= human.speed*mod;
                             }
                             if(38 in keysDown) {
                                      human.y -= human.speed*mod;
                             }
                             if(39 in keysDown) {
                                      human.x += human.speed*mod;
                             }
                             if(40 in keysDown) {
                                      human.y -= human.speed*mod;
                             }
                             robotWalk(robot1, robot1.speed);
                }
                    function render(){
                            if(bgOk){
                                    cx.drawImage(bgImg, 0, 0);
                            }
							if(humanOk){
									cx.drawImage(humanImg, human.x, human.y);
							}
							if(robot1Ok){
									
							}
                    }
					function main() {
						while(human.x>-3&&human.y>-3&&human.x<canvas.width+3&&human.y<canvas.height+3){
						var now=Date.now();
						var timePass = now - then;
						update(timePass / 1000);
						render();
						then = now;
						}
					}
					var then = Date.now();
					main();
        </script>
</body>
</html>