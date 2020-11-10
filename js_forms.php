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
        <button onclick="myFunction()" style="background-color: chocolate;height:55px">get parameters</button>
        <button ondblclick="showDiagram()"style="background-color: darkslategrey;height: 55px">double click to show diagram</button>

        <a id="hello"></a>
        <canvas id="myCanvas" height="500" width="500"></canvas>        
        <script>
            function myFunction() {


                let a = document.getElementById("myForm").elements[0].value;
                var b = document.getElementById("myForm").elements[1].value;
                var c = document.getElementById("myForm").elements[2].value;
                var m = document.getElementById("myForm").elements[3].value;
                var n = document.getElementById("myForm").elements[4].value;
                var l = document.getElementById("myForm").elements[5].value;


                var canvas = document.getElementById("myCanvas");
                var ctx = canvas.getContext("2d");
                ctx.moveTo(0, 0)
                ctx.lineTo(0, a);
                ctx.moveTo(0, a);
                ctx.lineTo(a, b);
                ctx.moveTo(a, b);
                ctx.lineTo(0, 0);

                ctx.moveTo(0, 0);
                ctx.lineTo(222, c);

                ctx.moveTo(222, c);
                ctx.lineTo(m, n);
                ctx.moveTo(m, n);
                ctx.lineTo(0, 0);
                ctx.stroke();



            }

        </script>

    </body>
</html>