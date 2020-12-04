<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/dist/img/favicon.png" type="image/x-icon">
    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.css">
    <title>Perpustakaan</title>
</head>

<body>
    <!--===== HEADER =====-->
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>
                <a href="#" class="nav_logo">Perpustakaan</a>
            </div>

            <div class="nav_menu" id="nav-menu">
                <ul class="nav_list">
                    <li class="nav_item"><a href="#home" class="nav_link active">Home</a></li>
                    <li class="nav_item"><a href="daftarbuku.php" class="nav_link">Daftar Buku</a></li>
                    <li class="nav_item"><a href="#about" class="nav_link">About</a></li>
                    <li class="nav_item"><a href="#contact" class="nav_link">Contact</a></li>
                    <li class="nav_item"><a href="login.php" class="nav_link">Login</a></li>
                </ul>
            </div>

            <div class="nav_toggle" id="nav-toggle">
                <i class='fas fa-bars'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--===== HOME =====-->
        <section class="home bd-grid column" id="home">
            <div class="home_data row">
                <h1 class="home_title">Perpus<span class="home_title-color">takaan</span></h1>
            </div>

            <div class="home_social">
                <a href="" class="home_social-icon"><i class='fab fa-facebook'></i></a>
                <a href="" class="home_social-icon"><i class='fab fa-twitter'></i></a>
                <a href="" class="home_social-icon"><i class='fab fa-instagram'></i></a>
            </div>

            <div class="home_img row">
                <img src="assets/img/landing.jpg" alt="">
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section " id="about">
            <h2 class="section-title">About</h2>

            <div class="about_container bd-grid">
                <div class="about_img">
                    <img src="assets/img/about.jpg" alt="">
                </div>

                <div>
                    <h2 class="about_subtitle">Perpustakaan</h2>
                    <p class="about_text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate cum expedita quo culpa tempora, assumenda, quis fugiat ut voluptates soluta, aut earum nemo recusandae cumque perferendis! Recusandae alias accusamus atque.</p>
                </div>
            </div>
        </section>

        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Contact</h2>

            <div class="contact_container bd-grid">
                <form action="" class="contact_form">
                    <input type="text" placeholder="Name" class="contact_input">
                    <input type="mail" placeholder="Email" class="contact_input">
                    <textarea name="" id="" cols="0" rows="10" class="contact_input" style="resize: none;"></textarea>
                    <input type="button" value="Submit" class="contact_button button">
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
    <footer class="footer">
        <p class="footer_title">Perpustakaan</p>
        <div class="footer_social">
            <p class="">Source Code</p>

            <a href="#" class="footer_icon"><i class="far fa-arrow-alt-circle-down"></i></a>
            <a href="#" class="footer_icon"><i class='fab fa-github'></i></a>
        </div>
        <p>&#169; 2020 copyright all right reserved</p>
    </footer>


    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>
</body>

</html>