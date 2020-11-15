<html>
    <title></title>
    <body style="background-color: #669900">
        <form id="myForm">
            a:  <input type="number" name="a"  value="200" style="width:99px;height: 66px;background-color: #ffcc33;text-align: center;font-size: 40px " />

            b:<input type="number" name="b"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>
            c:<input type="number" name="c"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/><p></p>
            m:<input type="number" name="m"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>
            n:<input type="number" name="n"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>
            l:<input type="number" name="l"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>


        </form>
        <button onmouseover="takeDataForPiramide()" style="background-color: chocolate;height:55px">get parameters</button>
        <button onmouseover="main()" style = "background-color: darkslategrey;height: 55px">double click to show diagram</button>

        <a id="hello"></a>

        <canvas id="myCanvas" height="300" width="300"></canvas>        

        <script>
            function main() {

                var a = document.getElementById("myForm").elements[0].value;
                var b = document.getElementById("myForm").elements[1].value;
                var c = document.getElementById("myForm").elements[2].value;
                var m = document.getElementById("myForm").elements[3].value;
                var n = document.getElementById("myForm").elements[4].value;
                var l = document.getElementById("myForm").elements[5].value;

                var cos_ab = cosinus(a, b, c);

                var cos_al = cosinus(a, l, n);
                var cos_bl = cosinus(b, l, m);
//                document.getElementById("hello").innerHTML=l+"<p></p>";
                var a_middle = l * cos_al;

                var b_middle = l * cos_bl;
//                document.getElementById("hello").innerHTML=a_middle+"<p></p>";
                var c_middle = sideByTwoSidesAndCos(a_middle, b_middle, cos_ab);

                var h_a = hByCosFiAndL(l, cos_al);
                var h_b = hByCosFiAndL(l, cos_bl);
                var hPyramude = hByThreeSides(h_a, h_b, c_middle);
                document.getElementById("hello").innerHTML = hPyramude;

            }
            /**
             * 
             * @param {type} a side one 
             * @param {type} b side two
             * @param {type} c  side three
             * @returns {Number}
             */
            function hByThreeSides(a, b, c) {
                let cos_ab = cosinus(a, b, c);
                let h = hByCosFiAndL(a, cos_ab);
                return h;

            }
            /**
             * 
             * @param {type} a side a
             * @param {type} b side b
             * @param {type} cos cos_f
             * @returns {undefined}
             */
            function sideByTwoSidesAndCos(a, b, cos) {
                var c = Math.sqrt(a * a + b * b - cos * 2 * a * b);
                return c;
            }
            /**
             * 
             * @param {number} l length of the side 
             * @param {number} cos cos f on the angle
             * @returns {Number}
             */
            function hByCosFiAndL(l, cos) {

                var h = Math.sqrt(l * l - (l * cos * l * cos));
                return h;
            }
            /**
             * a,b,c side of the triangle
             * @param {type} a
             * @param {type} b
             * @param {type} c
             * @returns {Array|calcCoordinateX.coordinates}
             */
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
            /**
             * 
             * @param {type} a one side 
             * @param {type} b another side of triangle
             * @param {type} sin sinOf angle
             * @returns {Number}
             */
            function areaTwoSidesSinus(a, b, sin) {

                return a * b * sin / 2;
            }
            /**
             * 
             * @param {type} a first side
             * @param {type} b second side
             * @param {type} c tird side
             * @returns {undefined}
             */
            function areaThreeSides(a, b, c) {
                let x = 0.25 * Math.sqrt((a + b + c) * (a + b - c) * (a + c - b) * (b + c - a));
                return x;
            }
            /**
             * 
             * @param {type} a betwin a side
             * @param {type} b betwin b side
             * @param {type} c is oposit at the angle
             * @returns {undefined}
             */
            function cosinus(a, b, c) {
                let x = (a * a + b * b - c * c) / (2 * a * b);

                return x;
            }
            /**
             * 
             * @param {type} coordinates array 
             * @param {type} coorRim      array
             * @param {type} a    first side of triangle 
             * @returns {undefined}
             */
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



            function takeDataForPiramide() {


                var a = document.getElementById("myForm").elements[0].value;
                var b = document.getElementById("myForm").elements[1].value;
                var c = document.getElementById("myForm").elements[2].value;
                var m = document.getElementById("myForm").elements[3].value;
                var n = document.getElementById("myForm").elements[4].value;
                var l = document.getElementById("myForm").elements[5].value;
                var edges = [];
                edges.push(a);
                edges.push(b);
                edges.push(c);
                edges.push(m);
                edges.push(n);
                edges.push(l);

                var coordinates = calcCoordinateX(a, b, c);
                var coorRim = calcCoordinateX(a, m, n);
                showDiagram(coordinates, coorRim, a);
                return edges;
            }

        </script>

    </body>
</html>