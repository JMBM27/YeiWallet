    espacio = {
        resize: null,
        init: function() {
            var colores =[
                ["#fff","linear-gradient(to bottom right, #0B0B3B , #000000)"],
                
            ];

            var r=Math.floor(Math.random()*colores.length);
            document.getElementById("espacio").style.background=colores[r][1];
            
            this.canvas = document.querySelector("canvas");
            this.crearEspacio(colores[r][0]);
        },
        crearEspacio: function(color) {
            function punto() {
                this.x = Math.random() * espacio.canvas.width; 
                this.y = Math.random() * espacio.canvas.height; 
                this.vx = -.5 + Math.random(); 
                this.vy = -.5 + Math.random();
                this.radio = (Math.random()*3)+1;
            }

            function pintar() {
                var i;
                c.clearRect(0,0,espacio.canvas.width,espacio.canvas.height);
                if (e.puntos.length < 1)
                    for (i = 0; i < e.n; i++) 
                        e.puntos.push(new punto);
                for (i = 0; i < e.n; i++) {
                    e.puntos[i].create();
                }
                punto.pintarLinea();
                punto.animacion();
            }
            var c = this.canvas.getContext("2d");
            this.resize = function() {
                punto.reiniciar();
            }, $(window).on("resize", espacio.resize);
            
            punto.prototype = {
                create: function() {
                    c.beginPath(),c.arc(this.x, this.y, this.radio, 0, 9 * Math.PI, !1), c.fill()
                }
            },
            punto.reiniciar = function(){
                espacio.canvas.width = document.getElementById("espacio").offsetWidth;
                espacio.canvas.height = document.getElementById("espacio").offsetHeight; 
                c.fillStyle = color, 
                c.lineWidth = .1; 
                c.strokeStyle = color;
                e={
                    x           : 30 * espacio.canvas.width / 100,
                    y           : 30 * espacio.canvas.height / 100,
                    n           : espacio.canvas.width /5,
                    distancia   : 80,
                    radio       : espacio.canvas.height /4,
                    puntos      : []
                };
            },
            punto.animacion = function() {
                var a, b;
                for (a = 0; a < e.n; a++) 
                    b = e.puntos[a], b.y < 0 || b.y > espacio.canvas.height ? (b.vx = b.vx, b.vy = -b.vy) : (b.x < 0 || b.x > espacio.canvas.width) && (b.vx = -b.vx, b.vy = b.vy), b.x += b.vx, b.y += b.vy
            }, 
            punto.pintarLinea = function() {
                var i, j, v, w;
                for (i = 0; i < e.n; i++){
                    v = e.puntos[i];
                    for (j = 0; j < e.n; j++){
                        w = e.puntos[j];
                        if(v.x - e.x < +e.radio && v.y - e.y < +e.radio && 
                           v.x - e.x > -e.radio && v.y - e.y > -e.radio &&
                           v.x - w.x < +e.distancia && v.y - w.y < +e.distancia && 
                           v.x - w.x > -e.distancia && v.y - w.y > -e.distancia){
                            c.beginPath();
                            c.moveTo(v.x, v.y);
                            c.lineTo(w.x, w.y);
                            c.stroke(); 
                            c.closePath();
                        }
                    }
                }
            },
            $("#espacio").on("mousemove", function(a) {
                "mousemove" == a.type && (e.x = a.pageX, e.y = a.pageY) 
            }),
            punto.reiniciar();
            this.interval = setInterval(pintar, 1e3 / 10)
        },
        destroy: function() {
            this.interval && clearInterval(this.interval), espacio.resize && $(window).on("resize", espacio.resize)
        }
    };
