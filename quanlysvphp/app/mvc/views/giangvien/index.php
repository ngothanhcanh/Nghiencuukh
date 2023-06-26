<?php include '../quanlysvphp/app/mvc/views/layout/header-siba-GV.php' ?>
<!--main content start-->
<section id="main-content">
<style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Plus Jakarta Sans", sans-serif;
            }
            html {
                font-size: 62.5%;
            }
            .sample-banner {
                position: relative;
                object-fit: cover;
                padding: 20px 0;
            }
            .sample-banner img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
            .sample-banner .title {
                position: absolute;
                background-color: #fff;
                padding: 100px;
                top: 6vw;
                left: 50%;
                transform: translateX(-50%);
                border-radius: 10px;
                box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.2);
            }
            @media (max-width: 3px) {
            }
            .sample-banner .primary-title {
                font-size: 2.5rem;
                text-align: center;
                font-weight: bold;
            }
            .sample-banner .primary-title span {
                font-size: 3rem;
                text-decoration: solid;
            }
            .sample-banner .sub-title {
                font-size: 2rem;
                text-align: center;
                font-weight: bold;
            }
            .sample-banner .cta-title {
                font-size: 1rem;
                margin-top: 10px;
                text-align: center;
            }
            .sample-banner .list-stat {
                position: absolute;
                top: 30vw;
                left: 50%;
                transform: translateX(-50%);
                padding: 20px 40px;
                display: flex;
                width: 60%;
                justify-content: space-around;
            }
            .list-stat .stat {
                box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.2);
                background-color: #fff;
                border-radius: 10px;
                padding: 25px 50px;
                text-align: center;
            }
            .list-stat .stat .number {
                font-size: 2.6rem;
                font-weight: bold;
            }
            .list-stat .stat .des {
                font-size: 1.5rem;
                text-transform: uppercase;
            }
        </style>
        <section class="sample-banner">
            <img src="<?=URL ?>/public/images/slide2.jpg" alt="dhpt" />
            <div class="title">
                <h1 class="primary-title">
                  Welcome to dashboard,Teacher
                </h1>
                <h1 class="sub-title">Xin Chào! <?=$_SESSION['namegv']; ?></h1>
                <p class="cta-title">Let's start now.</p>
            </div>
            <div class="list-stat">
                <div class="stat">
                <span class="number">120000</span>
                    <p class="des">diện tích(m<sup>2</sup>)</p>
                </div>
                <div class="stat">
                    <span class="number"><?=$result_sv ?></span>
                    <p class="des">Tổng sinh viên</p>
                </div>
                <div class="stat">
                    <span class="number"><?=$result_gv ?></span>
                    <p class="des">Tổng giảng viên</p>
                </div>
                <div class="stat">
                    <span class="number"><?=$result_kh ?></span>
                    <p class="des">Tổng ngành</p>
                </div>
            </div>
        </section>
<!--main content end-->
<!--right sidebar start-->
<!--right sidebar end-->
</section>
<?php include '../quanlysvphp/app/mvc/views/layout/footerGV.php' ?>