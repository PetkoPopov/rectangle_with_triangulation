<html>
    <title></title>
    <body style="background-color: #669900">
        <form id="myForm">
            a:  <input type="number" name="a"  value="111" style="width:99px;height: 66px;background-color: #ffcc33;text-align: center;font-size: 40px " />
            b:<input type="number" name="b"  value="111" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>
            c:<input type="number" name="c"  value="111" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/><p></p>
            m:<input type="number" name="m"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>
            n:<input type="number" name="n"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>
            l:<input type="number" name="l"  value="200" style="width:99px;height: 66px;background-color: #ffcc33; text-align: center;font-size: 40px"/>


        </form>
        <button onclick="takeDataForPiramide()" style="background-color: chocolate;height:55px">get parameters</button>
        <button onclick="main()" style = "background-color: darkslategrey;height: 55px">double click to show diagram</button>

        <a id="hello" style="font-size:35px;></a>

        <canvas id="myCanvas" height="300" width="300" ></canvas>        

        <script>
            function main() {
                var pyramide = [];

                var a = document.getElementById("myForm").elements[0].value;
                var b = document.getElementById("myForm").elements[1].value;
                var c = document.getElementById("myForm").elements[2].value;
                var m = document.getElementById("myForm").elements[3].value;
                var n = document.getElementById("myForm").elements[4].value;
                var l = document.getElementById("myForm").elements[5].value;

                var cos_ab = cosinus(a, b, c);
                var hlp = "<p>---" + cos_ab + " --->cosinus betwin a and b ----";
                pyramide.push(hlp);

                let angle = Math.acos(cos_ab);
                angle *= (180 / 3.1415)
                angle = Math.round(angle);
                hlp = "---" + angle + " --->angle  betwin a and b  ----</p>";
                pyramide.push(hlp);

                var cos_al = cosinus(a, l, n);
                hlp = "---" + cos_al + "--->cosinus betwin a and l";
                pyramide.push(hlp);

                angle = Math.acos(cos_al);
                angle *= (180 / 3.1415)
                angle = Math.round(angle);
                hlp = "---" + angle + "---> a  &#8738  l";
                pyramide.push(hlp);

                var cos_bl = cosinus(b, l, m);
                hlp = "<p>" + cos_bl + "&#8611 cosinus betwin b and l";
                pyramide.push(hlp);

                angle = Math.acos(cos_bl);
                angle *= (180 / 3.1415)
                angle = Math.round(angle);
                hlp = "---" + angle + "---> &#8738  betwin b and l</p>";
                pyramide.push(hlp);

                var a_middle = l * cos_al;
                hlp = '<p style="font-size:35px;">' + Math.round(a_middle) + "&#8614 a middle</p>"

                pyramide.push(hlp);
                var b_middle = l * cos_bl;
                var c_middle = sideByTwoSidesAndCos(a_middle, b_middle, cos_ab);
                var h_a = hByCosFiAndL(l, cos_al);

                hlp = "<p>" + Math.round
                (h_a) + '---->h-a</p>';
                pyramide.push(hlp);
                var h_b = hByCosFiAndL(l, cos_bl);
                
                hlp = "<p>" + Math.round(h_b) + '---->h-b</p>';
                pyramide.push(hlp);
                ////////////////////////
                var hPyramude = hByThreeSides(h_a, h_b, c_middle);
                hlp = "<p>" + hPyramude + "-------->h Pyramide</p>";
                pyramide.push(hlp);
                var baseArea = areaThreeSides(a, b, c);
                hlp = baseArea + " base area";
                pyramide.push(hlp);
                var areaLeftSide = areaThreeSides(a, l, n);
                hlp = "<p>" + areaLeftSide + "arae left side</p>";
                pyramide.push(hlp);
                var areaRightSide = areaThreeSides(b, l, m);
                hlp = hlp = areaRightSide + "area right side";
                pyramide.push(hlp);
                var areaBackSide = areaThreeSides(c, m, n);
                hlp = "<p>" + areaBackSide + "area back side</p>";
                pyramide.push(hlp);
                document.getElementById("hello").innerHTML = pyramide;
            }

            /**
             * 
             * @param {type} a kated one 
             * @param {type} b kated two
             * @param {type} c  side three hipotenuse
             * @returns {Number}
             */
            function hByThreeSides($a, $b, $c) {
                $a = Number($a);
                $b = Number($b);
                $c = Number($c);
                let areaHlp=areaThreeSides($a,$b,$c);
                let hByOtherWay=2*areaHlp/$c;
                let $cos_ac=cosinus($a, $c,$b);
                let h = hByCosFiAndL($a, $cos_ac);
                return hByOtherWay;
            }
            /**
             * 
             * @param {type} a side a
             * @param {type} b side b
             * @param {type} cos cos_f
             * @returns {undefined}
             */
            function sideByTwoSidesAndCos(a, b, cos) {
                a = Number(a);
                b = Number(b);
                cos = Number(cos);
                var c = Math.sqrt(a * a + b * b - cos * 2 * a * b);
                return c;
            }
            /**
             * 
             * @param {number} l length of the side 
             * @param {number} cos cos f on the angle
             * @returns {Number}
             */
            function hByCosFiAndL(k, cos) {

                k = Number(k);
                cos = Number(cos);
                let hlp=(k*k)-(k*cos)*(k*cos);
                var h = Math.sqrt(hlp);
                return h;
            }
            /**
             * a,b,c side of the triangle
             * изчислява координатите на върховете на триъгълник по дадени дължините на три страни
             * @param {type} a
             * @param {type} b
             * @param {type} c
             * @returns {Array|calcCoordinateX.coordinates}
             */
            function calcCoordinateX(a, b, c) {
                a = Number(a);
                b = Number(b);
                c = Number(c);
                let coordinates = [];
                let x = (c * c - a * a - b * b) / (2 * a);
                if (x < 0) {
                    x *= -1;
                    x = a - x;
                } else {

                    x += a;
                }




                let y;
                y = (c * c) - (x * x); //Питагорова теорема
                y = Math.sqrt(y);
                coordinates.push(a);
                coordinates.push(y);
                coordinates.push(x);
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
                a = Number(a);
                b = Number(b);
                sin = Number(sin);
                return a * b * sin / 2;
            }
            /**
             * 
             * @param {type} a first side
             * @param {type} b second side
             * @param {type} c tird side
             * @returns {undefined}
             */
            function areaThreeSides(a = 0, b = 0, c = 0) {
                if (a == 0 && b == 0 && c == 0) {
                    var $e = takeDataForPiramide();
                    let a = Number($e[0]);
                    let b = Number($e[1]);
                    let c = Number($e[2]);
                } else {
                    a = Number(a);
                    b = Number(b);
                    c = Number(c);
                }
                let x = 0.25 * (Math.sqrt((a + b + c) * (a + b - c) * (a + c - b) * (b + c - a)));
                x = Math.round(x);
//                document.getElementById("hello").innerHTML = x


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
            function showDiagram(coordinates) {

                var canvas = document.getElementById("myCanvas");
                var ctx = canvas.getContext("2d");
                ctx.lineWidth = 2;
                ctx.lineJoin = 'round';
                ctx.moveTo(0, 0)

                ctx.lineTo(0, coordinates[0]); //coordinates[0]=a;

                ctx.moveTo(0, coordinates[0]);
                ctx.lineTo(coordinates[1], coordinates[2]);
                ctx.moveTo(coordinates[1], coordinates[2]);
                ctx.lineTo(0, 0);
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
                showDiagram(coordinates);
                return edges;
            }

        </script>

    </body>
</html>