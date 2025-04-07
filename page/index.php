        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../css/style_nav1.css">
            <link rel="stylesheet" href="../css/style_footer1.css">
            <link rel="stylesheet" href="../css/style_index.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        </head>

        </head>

        <body>
            <?php
            include "../component/nav.php";
            ?>
            <header class="carousel slide" data-bs-ride="carousel">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="../assets/img/hero01.jpg" alt="hero 1" class="d-block w-100">
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="../assets/img/hero02.jpg" alt="hero 2" class="d-block w-100">
                        </div>
                        <div class="carousel-item">
                            <img src="../assets/img/hero3.jpg" alt="hero 3" class="d-block w-100">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <h1 class="text-hero">ASTRANTIA</h1>
            </header>

            <main class="container">
                <h2>FILOSOFI</h2>
                <div class="filos">
                    <img src="../assets/img/astrantia.jpg" alt="" class="img-fluid">
                    <p class="filos-text">Nama Astrantia kami pilih sebagai identitas kelas bukan hanya karena keindahannya sebagai bunga, tetapi juga karena makna mendalam yang terkandung di dalamnya. Astrantia major, bunga yang tumbuh di dataran tinggi Eropa, dikenal karena tampilannya yang unik serta kemampuannya untuk bertahan dalam kondisi lingkungan yang sulit. Kami merasa bahwa filosofi ini selaras dengan semangat kami sebagai sebuah kelas: tumbuh, bertahan, dan mekar bersama meski menghadapi berbagai tantangan. <br> <br> Salah satu keunikan bunga Astrantia terletak pada kelopaknya yang membentuk pola seperti bintang, mengelilingi bagian tengah bunga layaknya pelindung dan pemersatu. Kelopak-kelopak itu tampak seperti satu kesatuan yang utuh, namun jika diperhatikan, masing-masing memiliki detail dan lekuk yang khas. Ini menginspirasi kami dalam melihat keberagaman di antara kami—bahwa setiap individu memiliki karakter dan peran yang berbeda, namun bersama-sama menciptakan satu harmoni yang indah dan kuat. <br><br>Bagi kami, Astrantia adalah simbol dari keunikan, kebersamaan, dan perlindungan. Seperti kelopak-kelopaknya yang saling melingkupi, kami pun berusaha menjadi ruang yang aman dan saling menjaga. Kami percaya bahwa dalam perbedaan ada kekuatan, dan dalam kebersamaan ada ketahanan.</p>
                </div>
                <!-- <p></p> -->
                <p>Lebih dari sekadar nama, Astrantia juga menjadi pengingat akan pentingnya proses tumbuh bersama. Dalam perjalanan menempuh ilmu, tidak semua hari mudah. Ada kalanya kita jatuh, lelah, atau merasa tersesat. Tapi seperti bunga Astrantia yang tetap berdiri tegak di bawah terik maupun hujan, kami pun berkomitmen untuk saling menopang, menyemangati, dan menguatkan.</p>
                <p>Dengan nama ini, kami berharap dapat terus membawa semangat kebersamaan, ketangguhan, dan keindahan dalam setiap langkah yang kami ambil—baik sebagai individu maupun sebagai satu keluarga kelas yang utuh.</p>
            </main>
            <?php
            include "../component/footer.php";
            ?>
            <script src="../js/nav.js"></script>
            <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        </body>

        </html>