<body style="background-color: cadetblue;">
    <a id="test" onmouseover="func()" style="position: absolute;left: 444px;"><h1>test</h1></a>
    <a id="test2">test</a>
    <script>


        var table = document.createElement("TABLE");
        table.setAttribute("border", 1);
        table.setAttribute('position', 'relative');
        table.setAttribute("bottom", 10);
        table.setAttribute("left", 250);
        table.setAttribute('id', "myTable");
        document.body.appendChild(table);

        for (var e = 0; e <9; e++) {
            var row = table.insertRow(e);

            var a = row.insertCell();
            
            a.innerHTML = e;

            a.setAttribute("bgcolor", "olive");
            a.setAttribute("width", 44);
            a.setAttribute("height", 44);

            a.setAttribute("id", e);
            a.setAttribute("name", "index");
            a.setAttribute("onclick", "myFunction()");
            
            
            

    }

        document.getElementById('test2').innerHTML = xcutter;
        function myFunction() {
            for (var f = 0; f < 8; f++) {

              
                if(5 === document.getElementById(f).id){
                    alert("hh")
                }



            }
            document.getElementById(index);

        }
    </script>

















