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
                var pyramide = [];
                let hlp = "<a><p>" + hPyramude + "h Pyramide</p></a>";
                pyramide.push(hlp);
                var baseArea = areaThreeSides(a, b, c);
                hlp = "<a><p>" + baseArea + " base ArEA</p></a>";
                pyramide.push(hlp);
                var areaLeftSide = areaThreeSides(a, l, n);

                hlp = "<a><p>" + areaLeftSide + "arae left side</p></a>";
                pyramide.push(hlp);
                var areaRightSide = areaThreeSides(b, l, m);
                hlp = hlp = "<a><p>" + areaRightSide + "area right side</p></a>";
                pyramide.push(hlp);

                var areaBackSide = areaThreeSides(c, m, n);
                hlp = hlp = "<a><p>" + areaBackSide + "area back side</p></a>";

                pyramide.push(hlp);
                document.getElementById("hello").innerHTML = pyramide;

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
             * изчислява координатите на върховете на триъгълник по дадени дължините на три страни
             * @param {type} a
             * @param {type} b
             * @param {type} c
             * @returns {Array|calcCoordinateX.coordinates}
             */
            function calcCoordinateX(a, b, c) {
                let coordinates = [];
                let x = (c * c - a * a - b * b) / (2 * a);
                if (x < 0) {
                    x *= -1;
                    x = a - x;
                } else {

                    x += a;
                }




                let y;
                y = (c * c) - (x * x);//Питагорова теорема
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

                return a * b * sin / 2;
            }
            /**
             * 
             * @param {type} a first side
             * @param {type} b second side
             * @param {type} c tird side
             * @returns {undefined}
             */
            function areaThreeSides(a=0,b=0,c=0) {
                if(a==0&&b==0&&c==0){
                var $e = takeDataForPiramide();
                let a =Number($e[0]);
                let b = Number($e[1]);
                let c = Number($e[2]);}
            else{
        a=Number(a);
        b= Number(b);
        c=Number(c);
        }
                let x = 0.25 * (Math.sqrt((a + b + c) * (a + b - c) * (a + c - b) * (b + c - a)));
                x=Math.round(x);
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

                ctx.lineTo(0, coordinates[0]);//coordinates[0]=a;

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