<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3D Model Example</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.137.5/examples/js/loaders/GLTFLoader.js"></script>
    <link rel="stylesheet" href="../styles/viewer3d.css">
</head>

<body>
    <?php $name = $_GET["name"];
    $symbol = $_GET["symbol"];
    $id = $_GET["id"];
    $mass = $_GET["mass"] ?>
    <div id="infoTable1">
        <span id="span1" class="colspan"><?php echo $id; ?></span><br>
        <span id="span2" class="colspan"><?php echo $symbol; ?></span>
    </div>
    <span id="spanRight" class="colspan"><?php echo $name; ?></span>
    <div id="container"></div>
    <div id="scaleDiv">
        <div id="line1"></div>
        <div id="line2"></div>
        <div id="line3"></div>
        <span id="scale"><?php echo $mass; ?> fm</span>
    </div>
    <script>
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();

        const colors = ["lightgreen", "#ff9cee", "#c5a3ff", "#fbe4ff", "#aff8db", "#85e3ff", "#dbffd6", "#ffbebc", "#fdfd96"];

        let dist = <?php echo $mass; ?>;
        dist = 1.2 * Math.pow(dist, 1/3);

        renderer.setSize(window.innerWidth, window.innerHeight);

        let canvas = document.getElementById('container');
        canvas.appendChild(renderer.domElement);

        let col = colors[Math.floor(Math.random() * colors.length)];
        let spans = document.querySelectorAll(".colspan");
        spans.forEach((s) => {
            s.style.color = col;
        });
        scene.background = new THREE.Color(col);

        let zoom = 1;
        camera.position.z = zoom;

        let mousePrev = {
                x: 0,
                y: 0
            },
            mouse = {
                x: 0,
                y: 0
            },
            delta = {
                x: 0,
                y: 0
            };
        let isMousePressed = false;

        canvas.addEventListener("mousemove", (e) => {
            if (isMousePressed) {
                mousePrev.x = mouse.x;
                mousePrev.y = mouse.y;
                mouse.x = e.offsetX;
                mouse.y = e.offsetY;
                delta.x = mousePrev.x - mouse.x;
                delta.y = mousePrev.y - mouse.y;
                scene.rotation.x -= delta.y / 100;
                scene.rotation.y -= delta.x / 100;
            }
        });

        canvas.addEventListener("mousedown", (e) => {
            mousePrev.x = mouse.x = e.offsetX;
            mousePrev.y = mouse.y = e.offsetY;
            isMousePressed = true;
        });

        canvas.addEventListener("mouseup", (e) => {
            isMousePressed = false;
        });

        let model;
        const loader = new THREE.GLTFLoader();
        let modelURL = '<?php echo isset($_GET["src"]) ? htmlspecialchars($_GET["src"]) : ""; ?>';

        if (modelURL) {
            loader.load(modelURL, function(gltf) {
                gltf.scene.scale.set(3, 3, 3);
                model = gltf.scene;
                scene.add(gltf.scene);
            });
        }

        function updateScale(){
            let d = Math.round(dist * 100) / 100;
            document.querySelector("#scale").textContent = "";
            document.querySelector("#scale").textContent = `${d} fm`;
        }
        updateScale();

        window.addEventListener("wheel", (e) => {
            let prevZoom = zoom;
            if (e.deltaY > 0) {
                zoom += 0.1;
            } else {
                zoom -= 0.1;
            }
            zoom = Math.max(0.1, Math.min(zoom, 10));
            camera.position.z = zoom;

            let ratio = zoom / prevZoom;
            dist *= ratio;
            updateScale();
        });

        function animate() {
            requestAnimationFrame(animate);
            renderer.render(scene, camera);
        }
        animate();
    </script>
</body>

</html>