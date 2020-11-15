<html>
    <title></title>
    <body style="background-color: #669900">
        <form id="myForm">
            a:  <input type="number" name="a"  value="100" required>

            b:<input type="number" name="b"  value="200"/>
            c:<input type="number" name="c"  value="333"/><p></p>
            m:<input type="number" name="m"  value="167"/>
            n:<input type="number" name="n"  value="298"/>
            l:<input type="number" name="l"  value="400"/>


        </form>
        <button onmouseover="myFunction()" style="background-color: chocolate;height:55px">get parameters</button>
        <button onmouseover="cosinus(1,1,1)" style = "background-color: darkslategrey;height: 55px">double click to show diagram</button>

        <a id="hello"></a>
        
        <canvas id="myCanvas" height="500" width="500"></canvas>        

        <script>

            function calcCoordinateX(a, b, c) {
            let coordinates = [];
            let x = (a * a + c * c - b * b) / (2 * b);
            let y;
            y = c * c - x * x;
            y = Math.sqrt(y);
            coordinates.push(a);
            coordinates.push(x);
            coordinates.push(y);
            return coordinates;
            }

        </script>
        
        <script>
            function areaTwoSidesSinus(a,b,sin) {
   document.getElementById("hello").innerHTML = a*b*sin/2;
   return a*b*sin/2;
}

        </script> 
        <script>
            
function areaThreeSides(a,b,c){
    let x=0.25*Math.sqrt((a+b+c)*(a+b-c)*(a+c-b)*(b+c-a));
    document.getElementById("hello").innerHTML=x;
}
            </script>
        <script>
            function cosinus(a, b, c){
                let x=(a*a +b*b -c*c)/(2*a*b);
                document.getElementById("hello").innerHTML=x;
            }
            
        </script>

        <script>

            function showDiagram(coordinates, coorRim, a) {

            var canvas = document.getElementById("myCanvas");
            var ctx = canvas.getContext("2d");
            ctx.moveTo(0, 0)
                    ctx.lineTo(0, a);
            ctx.moveTo(0, a);
            ctx.lineTo(coordinates[2], coordinates[1]);
            ctx.moveTo(coordinates[2], coordinates[1]);
            ctx.lineTo(0, 0);
            ctx.moveTo(0, 0)
                    ctx.lineTo(coorRim[0], coorRim[1]);
            ctx.moveTo(coorRim[0], coorRim[1]);
            ctx.lineTo(coordinates[2], coordinates[1]);
            ctx.moveTo(coorRim[0], coorRim[1]);
            ctx.lineTo(0, a);
            ctx.stroke();
            }


        </script>
        <script>
            function myFunction() {


            var a = document.getElementById("myForm").elements[0].value;
            var b = document.getElementById("myForm").elements[1].value;
            var c = document.getElementById("myForm").elements[2].value;
            var m = document.getElementById("myForm").elements[3].value;
            var n = document.getElementById("myForm").elements[4].value;
            var l = document.getElementById("myForm").elements[5].value;
            var coordinates = calcCoordinateX(a, b, c);
            var coorRim = calcCoordinateX(a, m, n);
            showDiagram(coordinates, coorRim, a);
            }

        </script>

    </body>
</html>