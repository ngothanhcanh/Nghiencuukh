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
                background-color: rgba(255, 255, 255, 0.9);
                padding: 70px;
                top: 5vw;
                left: 50%;
                transform: translateX(-50%);
                border-radius: 10px;
                box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.2);
            }
            .sample-banner .primary-title {
                font-size: 2rem;
                text-align: center;
                font-weight: bold;
            }
            .sample-banner .primary-title span {
                font-size: 2.5rem;
                text-decoration: solid;
            }
            .sample-banner .sub-title {
                font-size: 2rem;
                text-align: center;
            }
            .sample-banner .list-stat {
                position: absolute;
                top: 28vw;
                left: 50%;
                transform: translateX(-50%);
                padding: 20px 40px;
                display: flex;
                width: 100%;
                justify-content: space-around;
            }
            .list-stat .stat {
                box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.2);
                background-color: rgba(255, 255, 255, 0.9);
                border-radius: 10px;
                padding: 20px 40px;
                text-align: center;
            }
            .list-stat .stat .number {
                font-size: 2rem;
                font-weight: bold;
            }
            .list-stat .stat .des {
                font-size: 1.4rem;
                text-transform: uppercase;
            }
            .list-stat h2 {
                display: none;
            }
            @media (max-width: 575px) {
                .sample-banner img {
                    margin-top: 50px;
                }
                .sample-banner .title {
                    width: 100%;
                    top: 0;
                    padding: 0;
                    background-color: transparent;
                    box-shadow: none;
                }
                .sample-banner .primary-title {
                    position: relative;
                    background-color: #fff;
                    padding: 10px 6px;
                    font-size: 1.6rem;
                    text-align: left;
                }
                .sample-banner .primary-title span {
                    font-size: 2rem;
                }
                .sample-banner .sub-title {
                    display: none;
                }
                .sample-banner .list-stat {
                    position: relative;
                    display: flex;
                    width: 100%;
                    border-radius: 0px;
                    padding: 0;
                    margin-top: 120px;
                    justify-content: space-around;
                    flex-direction: column;
                }
                .list-stat h2 {
                    display: block;
                    text-align: center;
                    font-weight: bold;
                    font-size: 2rem;
                    width: 100%;
                    position: relative;
                }
                .list-stat h2::after {
                    content: "";
                    position: absolute;
                    top: 130%;
                    left: 0;
                    width: 100%;
                    height: 1px;
                    background-color: rgb(0, 0, 0, 0.4);
                }
                .list-stat .stat {
                    border-radius: 0px;
                    margin-top: 20px;
                    box-shadow: none;
                    width: 100%;
                    height: 100%;
                    justify-content: space-between;
                    border-bottom: #ccc;
                }
            }
            @media (min-width: 576px) and (max-width: 767px) {
                .sample-banner img {
                    margin-top: 20px;
                    position: static;
                }
                .sample-banner .title {
                    width: 100%;
                    top: 0;
                    padding: 0;
                    padding: 0;
                    background-color: transparent;
                    box-shadow: none;
                }
                .sample-banner .sub-title {
                    display: none;
                }
                .sample-banner .primary-title {
                    font-size: 1.6rem;
                    text-align: left;
                    font-weight: bold;
                    padding: 4px;
                }
                .sample-banner .primary-title span {
                    font-size: 2rem;
                }

                .sample-banner .list-stat {
                    top: 34vw;
                    left: 0;
                    transform: translateX(0);
                    padding: 0;
                }
                .list-stat .stat {
                    padding: 18px 26px;
                    text-align: center;
                    background-color: rgba(255, 255, 255, 0.9);
                }
                .list-stat .stat .number {
                    font-size: 1.6rem;
                    font-weight: bold;
                }
                .list-stat .stat .des {
                    font-size: 1.1rem;
                    text-transform: uppercase;
                }
            }
            @media (min-width: 768px) and (max-width: 991px) {
                .sample-banner .title {
                    top: 5vh;
                    padding: 40px;
                    width: 60%;
                }
                .sample-banner .list-stat {
                    top: 30vh;
                    padding: 10px 20px;
                }
                .list-stat .stat {
                    box-shadow: 1px 5px 10px rgba(0, 0, 0, 0.2);
                    background-color: rgba(255, 255, 255, 0.9);
                    border-radius: 10px;
                    padding: 20px 40px;
                    text-align: center;
                }
                .list-stat .stat .number {
                    font-size: 1.6rem;
                    font-weight: bold;
                }
                .list-stat .stat .des {
                    font-size: 1.2rem;
                    text-transform: uppercase;
                }
            }
        </style>
        <section class="sample-banner">
            <img src="<?=URL ?>/public/images/slide2.jpg" alt="dhpt" />
            <div class="title">
                <h1 class="primary-title">
                    Welcome to dashboard,Teacher
                </h1>
                <h1 class="sub-title">Xin Chào! <?=$_SESSION['namegv']; ?></h1>
            </div>
            <div class="list-stat">
                <h2>Stats</h2>
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
