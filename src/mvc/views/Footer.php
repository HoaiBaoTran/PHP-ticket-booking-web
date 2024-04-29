<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body style="background-color: black">
    <!-- "background-image: url('../images/homepage-banner-background-1.png');" -->
    <style>
        @font-face {
            font-family: "Modern No. 20";
            src: url("https://fonts.cdnfonts.com/css/modern-no-20");
        }

        .navbar {
            padding: 0 10px;
            background-color: rgba(0, 0, 0, 0.01);
            backdrop-filter: blur(5px);
        }

        .logo {
            background-image: linear-gradient(to right, #784ba0 0%, #ff3cac 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-family: "Modern No. 20";
            font-size: 48px;
            margin: 0;
            float: left;
        }

        .navbar-collapse {
            margin-left: 50px;
        }

        .navbar-collapse ul {
            gap: 20px;
        }

        .nav-item a {
            padding-right: 0;
            font-size: 16px;
            color: #cfcece;
            transition: 0.2s ease-in-out;
        }

        .nav-item a:hover {
            color: white;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler:focus {
            text-decoration: none;
            outline: 0;
            box-shadow: none;
        }

        #login-accout {
            margin-left: auto;
        }

        .footer {
            border-top: 2px solid #2b2b2b;
            background-color: black;
            color: #9e9e9e;
        }

        .footer ul {
            margin: 0;
            padding: 0;
        }

        .footer ul li {
            list-style: none;
            margin-bottom: 20px;
        }

        .footer a {
            text-decoration: none;
            color: #9e9e9e;
        }

        .col-lg-3 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 30px;
        }

        .btn-footer {
            margin-bottom: 20px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 10px;
            gap: 13px;

            width: 179px;
            height: 44px;

            border: 1px solid #9e9e9e;
            border-radius: 10px;
        }

        .footer-icon {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 0px;
            gap: 29px;

            width: 176px;
            height: 50px;
        }

        @media only screen and (max-width: 575px) {
            .navbar-collapse ul {
                height: 90vh;
            }

            .nav-item {
                margin-top: 20px;
                margin-right: 20px;
            }

            .nav-link {
                float: right;
            }

            #create-accout,
            #login-accout {
                display: flex;
                justify-content: center;
                align-items: center;
                clear: right;
                margin: 0 auto;
                width: 124px;
                height: 46px;
                border: 1px solid #9e9e9e;
                border-radius: 10px;
            }

            #login-accout {
                margin-top: 100px;
            }

            #create-accout a,
            #login-accout a {
                text-transform: uppercase;
            }

            .footer ul,
            .footer-logo {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .footer-logo p {
                text-align: center;
            }

            #footer-first {
                order: 3;
            }
        }
    </style>
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="logo">5CT</div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars" style="color: #cfcece; font-size: 28px"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto d-flex w-100">
                    <li class="nav-item">
                        <a class="nav-link" href="#">PHIM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LỊCH CHIẾU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ƯU ĐÃI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">THÔNG TIN</a>
                    </li>
                    <li class="nav-item" id="login-accout">
                        <a class="nav-link" href="#">Đăng nhập</a>
                    </li>
                    <li class="nav-item" id="create-accout">
                        <a class="nav-link" href="#">Đăng ký</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="footer">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" id="footer-first">
                    <div class="footer-logo" style="margin-top: 0">
                        <a href="#">
                            <p class="logo" style="font-size: 60px">5CT</p>
                        </a>
                        <p style="font-size: 12px; max-width: 200px; clear: left">
                            COPYRIGHT © 5CODERCUTE.COM ALL RIGHTS RESERVED.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <ul style="margin-top: 20px">
                        <li>
                            <a href="#" style="color: white; font-size: 18px">
                                Về chúng tôi
                            </a>
                        </li>
                        <li><a href="#"> Liên hệ </a></li>
                        <li><a href="#"> Tuyển dụng </a></li>
                        <li><a href="#"> Blog </a></li>
                        <li><a href="#"> FAQ </a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <ul style="margin-top: 20px">
                        <li>
                            <a href="#" style="color: white; font-size: 18px">
                                Điều khoản sử dụng
                            </a>
                        </li>
                        <li><a href="#"> Điều khoản chung </a></li>
                        <li><a href="#"> Điều khoản giao dịch </a></li>
                        <li><a href="#"> Điều khoản thanh toán </a></li>
                        <li><a href="#"> Chính sách bảo mật </a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div style="margin-top: 20px">
                        <div>
                            <a href="#" class="btn-footer">
                                <img src="../images/email-multiple-outline.png" />
                                hoidap@5ct.vn
                            </a>
                        </div>
                        <div>
                            <a href="#" class="btn-footer">
                                <img src="../images/phone.png" /> 1900 1008
                            </a>
                        </div>
                        <div class="footer-icon">
                            <a href="#"> <img src="../images/facebook.png" /> </a>
                            <a href="#"> <img src="../images/twitter.png" /> </a>
                            <a href="#"> <img src="../images/google-plus.png" /> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".navbar-toggler").click(function() {
                var color = $(".navbar").css("background-color");
                if (color == "rgba(0, 0, 0, 0.01)") {
                    $(".navbar").css("background", "rgba(0, 0, 0, 0.85)");
                } else {
                    $(".navbar").css("background", "rgba(0, 0, 0, 0.01)");
                }
            });
        });
    </script>
</body>

</html>