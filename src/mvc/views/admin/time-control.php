<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:th="https://www.thymeleaf.org" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HoaiBao_WebMovie</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <link href="../../public/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../../public/bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/sl-1.6.2/datatables.min.css" rel="stylesheet" />

    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/sl-1.6.2/datatables.min.js"></script>
    <link rel="stylesheet" href="../../public/css/homepage.css" />
    <link rel="stylesheet" href="../../public/css/admin/time-control-page/style.css" />
</head>

<body>
    <!-- SideBar -->

    <div class="body-container">
        <div class="header-container">
            <div class="title-place">
                <h1 class="title-heading">Danh sách lịch chiếu</h1>
            </div>
            <div class="function_place">
                <button class="btn-outline content-type-normal">Thêm file</button>
                <button class="btn-outline content-type-normal">In danh sách</button>
                <button class="btn-main content-type-normal" data-bs-toggle="modal" data-bs-target="#ModalAddUser">
                    + Thêm form
                </button>
            </div>
        </div>
        <div class="divider-container"></div>
        <div class="search-place">
            <div class="input-group rounded input-place me-auto" style="margin-bottom: 0; position: relative">
                <img src="../../../images/search.svg" alt="" style="
              position: absolute;
              left: 20px;
              z-index: 10;
              top: 50%;
              transform: translateY(-50%);
            " />
                <input type="search" class="form-control rounded" placeholder="Tìm kiếm theo id" aria-label="Search" aria-describedby="search-addon" />
            </div>
            <select id="select-movie" class="form-select">
                <option selected value="">Phim</option>
            </select>
            <select id="select-room" class="form-select">
                <option selected value="">Phòng chiếu</option>
            </select>
            <select id="select-format" class="form-select">
                <option selected value="">Định dạng</option>
            </select>

            <button class="btn-main content-type-normal" id="btn-search">
                Tìm kiếm
            </button>
        </div>
        <div class="divider-container"></div>
        <div class="transition-place">
            <div class="item-choosing-block">
                <p class="all-showtime" style="margin-bottom: 12px !important">
                    Tất cả lịch chiếu
                </p>
                <div class="divider-mini"></div>
            </div>
            <div class="item-choosing-block">
                <p class="search-result" style="margin-bottom: 12px !important">
                    Kết quả tìm kiếm
                </p>
                <div class="divider-mini hidden"></div>
            </div>
        </div>
        <div class="divider-container"></div>

        <div class="datagrid-place">
            <table id="table-content" class="table table-striped table-place" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Giờ chiếu</th>
                        <th>Giờ kết thúc</th>
                        <th>Giá</th>
                        <th>Mã phim</th>
                        <th>Mã Phòng chiếu</th>
                        <th>Định dạng</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="sidebar-container">
        <div class="logo-container">
            <p class="logo-heading">HB</p>
        </div>
        <a href="/admin/user">
            <div class="item-container">
                <span class="item-icon">
                    <svg width="24" height="19" viewBox="0 0 24 19" fill="#474851" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 0C14.0913 0 15.6174 0.632141 16.7426 1.75736C17.8679 2.88258 18.5 4.4087 18.5 6C18.5 7.5913 17.8679 9.11742 16.7426 10.2426C15.6174 11.3679 14.0913 12 12.5 12C10.9087 12 9.38258 11.3679 8.25736 10.2426C7.13214 9.11742 6.5 7.5913 6.5 6C6.5 4.4087 7.13214 2.88258 8.25736 1.75736C9.38258 0.632141 10.9087 0 12.5 0ZM12.5 3C11.7044 3 10.9413 3.31607 10.3787 3.87868C9.81607 4.44129 9.5 5.20435 9.5 6C9.5 6.79565 9.81607 7.55871 10.3787 8.12132C10.9413 8.68393 11.7044 9 12.5 9C13.2956 9 14.0587 8.68393 14.6213 8.12132C15.1839 7.55871 15.5 6.79565 15.5 6C15.5 5.20435 15.1839 4.44129 14.6213 3.87868C14.0587 3.31607 13.2956 3 12.5 3ZM12.5 13.5C16.505 13.5 24.5 15.495 24.5 19.5V24H0.5V19.5C0.5 15.495 8.495 13.5 12.5 13.5ZM12.5 16.35C8.045 16.35 3.35 18.54 3.35 19.5V21.15H21.65V19.5C21.65 18.54 16.955 16.35 12.5 16.35Z" />
                        <defs>
                            <linearGradient id="paint0_linear_258_515" x1="0" y1="28" x2="28" y2="28" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#784BA0" />
                                <stop offset="1" stop-color="#FF3CAC" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <p class="item-description">Người dùng</p>
            </div>
        </a>
        <a href="/admin/film">
            <div class="item-container">
                <span class="item-icon">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="#474851" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.06 22H18.72C19.56 22 20.25 21.35 20.35 20.53L22 4.05H17V0H15.03V4.05H10.06L10.36 6.39C12.07 6.86 13.67 7.71 14.63 8.65C16.07 10.07 17.06 11.54 17.06 13.94V22ZM0 21V20H15.03V21C15.03 21.54 14.58 22 14 22H1C0.45 22 0 21.54 0 21ZM15.03 14C15.03 6 0 6 0 14H15.03ZM0 16H15V18H0V16Z" />
                        <defs>
                            <linearGradient id="paint0_linear_389_1281" x1="0" y1="22" x2="22" y2="22" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#784BA0" />
                                <stop offset="1" stop-color="#FF3CAC" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <p class="item-description">Danh sách phim</p>
            </div>
        </a>
        <a href="/admin/history">
            <div class="item-container">
                <span class="item-icon">
                    <svg width="24" height="22" viewBox="0 0 24 22" fill="#474851" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.2857 6.11111H12.5714V12.2222L17.4629 15.3267L18.2857 13.8478L14.2857 11.3056V6.11111ZM13.7143 0C10.9863 0 8.37013 1.15893 6.44119 3.22183C4.51224 5.28473 3.42857 8.08262 3.42857 11H0L4.52571 15.9256L9.14286 11H5.71429C5.71429 8.73093 6.55714 6.55479 8.05743 4.95031C9.55772 3.34583 11.5926 2.44444 13.7143 2.44444C15.836 2.44444 17.8708 3.34583 19.3711 4.95031C20.8714 6.55479 21.7143 8.73093 21.7143 11C21.7143 13.2691 20.8714 15.4452 19.3711 17.0497C17.8708 18.6542 15.836 19.5556 13.7143 19.5556C11.5086 19.5556 9.50857 18.59 8.06857 17.0378L6.44571 18.7733C8.30857 20.7778 10.8571 22 13.7143 22C16.4422 22 19.0584 20.8411 20.9874 18.7782C22.9163 16.7153 24 13.9174 24 11C24 8.08262 22.9163 5.28473 20.9874 3.22183C19.0584 1.15893 16.4422 0 13.7143 0Z" />

                        <defs>
                            <linearGradient id="paint0_linear_258_515" x1="0" y1="28" x2="28" y2="28" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#784BA0" />
                                <stop offset="1" stop-color="#FF3CAC" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <p class="item-description">Lịch sử đặt vé</p>
            </div>
        </a>
        <a href="/admin/time">
            <div class="item-container">
                <span class="item-icon">
                    <svg width="24" height="24" viewBox="0 0 25 24" fill="#474851" xmlns="http://www.w3.org/2000/svg" class="active">
                        <path d="M22.875 0H22.5V0.976562C22.5 1.29883 22.2469 1.5625 21.9375 1.5625H20.0625C19.7531 1.5625 19.5 1.29883 19.5 0.976562V0H4.5V0.976562C4.5 1.29883 4.24687 1.5625 3.9375 1.5625H2.0625C1.75313 1.5625 1.5 1.29883 1.5 0.976562V0H1.125C0.501562 0 0 0.522461 0 1.17188V17.5781C0 18.2275 0.501562 18.75 1.125 18.75H1.5V17.7734C1.5 17.4512 1.75313 17.1875 2.0625 17.1875H3.9375C4.24687 17.1875 4.5 17.4512 4.5 17.7734V18.75H19.5V17.7734C19.5 17.4512 19.7531 17.1875 20.0625 17.1875H21.9375C22.2469 17.1875 22.5 17.4512 22.5 17.7734V18.75H22.875C23.4984 18.75 24 18.2275 24 17.5781V1.17188C24 0.522461 23.4984 0 22.875 0ZM4.5 15.0391C4.5 15.3613 4.24687 15.625 3.9375 15.625H2.0625C1.75313 15.625 1.5 15.3613 1.5 15.0391V13.0859C1.5 12.7637 1.75313 12.5 2.0625 12.5H3.9375C4.24687 12.5 4.5 12.7637 4.5 13.0859V15.0391ZM4.5 10.3516C4.5 10.6738 4.24687 10.9375 3.9375 10.9375H2.0625C1.75313 10.9375 1.5 10.6738 1.5 10.3516V8.39844C1.5 8.07617 1.75313 7.8125 2.0625 7.8125H3.9375C4.24687 7.8125 4.5 8.07617 4.5 8.39844V10.3516ZM4.5 5.66406C4.5 5.98633 4.24687 6.25 3.9375 6.25H2.0625C1.75313 6.25 1.5 5.98633 1.5 5.66406V3.71094C1.5 3.38867 1.75313 3.125 2.0625 3.125H3.9375C4.24687 3.125 4.5 3.38867 4.5 3.71094V5.66406ZM17.25 15.8203C17.25 16.1426 16.9969 16.4062 16.6875 16.4062H7.3125C7.00313 16.4062 6.75 16.1426 6.75 15.8203V11.1328C6.75 10.8105 7.00313 10.5469 7.3125 10.5469H16.6875C16.9969 10.5469 17.25 10.8105 17.25 11.1328V15.8203ZM17.25 7.61719C17.25 7.93945 16.9969 8.20312 16.6875 8.20312H7.3125C7.00313 8.20312 6.75 7.93945 6.75 7.61719V2.92969C6.75 2.60742 7.00313 2.34375 7.3125 2.34375H16.6875C16.9969 2.34375 17.25 2.60742 17.25 2.92969V7.61719ZM22.5 15.0391C22.5 15.3613 22.2469 15.625 21.9375 15.625H20.0625C19.7531 15.625 19.5 15.3613 19.5 15.0391V13.0859C19.5 12.7637 19.7531 12.5 20.0625 12.5H21.9375C22.2469 12.5 22.5 12.7637 22.5 13.0859V15.0391ZM22.5 10.3516C22.5 10.6738 22.2469 10.9375 21.9375 10.9375H20.0625C19.7531 10.9375 19.5 10.6738 19.5 10.3516V8.39844C19.5 8.07617 19.7531 7.8125 20.0625 7.8125H21.9375C22.2469 7.8125 22.5 8.07617 22.5 8.39844V10.3516ZM22.5 5.66406C22.5 5.98633 22.2469 6.25 21.9375 6.25H20.0625C19.7531 6.25 19.5 5.98633 19.5 5.66406V3.71094C19.5 3.38867 19.7531 3.125 20.0625 3.125H21.9375C22.2469 3.125 22.5 3.38867 22.5 3.71094V5.66406Z" />

                        <defs>
                            <linearGradient id="paint0_linear_258_515" x1="0" y1="28" x2="28" y2="28" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#784BA0" />
                                <stop offset="1" stop-color="#FF3CAC" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <p class="item-description active">Lịch chiếu</p>
            </div>
        </a>
        <a href="/admin/combo">
            <div class="item-container">
                <span class="item-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#474851" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.8182 17.4545V7.63636H6.54545V17.4545H21.8182ZM21.8182 2.18182C23.0182 2.18182 24 3.16364 24 4.36364V17.4545C24 18.6545 23.0182 19.6364 21.8182 19.6364H6.54545C5.33455 19.6364 4.36364 18.6545 4.36364 17.4545V4.36364C4.36364 3.16364 5.34545 2.18182 6.54545 2.18182H7.63636V0H9.81818V2.18182H18.5455V0H20.7273V2.18182H21.8182ZM2.18182 21.8182H17.4545V24H2.18182C0.970909 24 0 23.0182 0 21.8182V8.72727H2.18182V21.8182Z" />
                        <defs>
                            <linearGradient id="paint0_linear_258_515" x1="0" y1="28" x2="28" y2="28" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#784BA0" />
                                <stop offset="1" stop-color="#FF3CAC" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <p class="item-description">Combo</p>
            </div>
        </a>
        <a href="/admin/statistics">
            <div class="item-container">
                <span class="item-icon">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="#474851" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 18.6667H5.83333V9.33333H8.5V18.6667ZM13.8333 18.6667H11.1667V5.33333H13.8333V18.6667ZM19.1667 18.6667H16.5V13.3333H19.1667V18.6667ZM21.8333 21.3333H3.16667V2.66667H21.8333V21.4667M21.8333 0H3.16667C1.7 0 0.5 1.2 0.5 2.66667V21.3333C0.5 22.8 1.7 24 3.16667 24H21.8333C23.3 24 24.5 22.8 24.5 21.3333V2.66667C24.5 1.2 23.3 0 21.8333 0Z" />

                        <defs>
                            <linearGradient id="paint0_linear_258_515" x1="0" y1="28" x2="28" y2="28" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#784BA0" />
                                <stop offset="1" stop-color="#FF3CAC" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <p class="item-description">Thống kê</p>
            </div>
        </a>>
        <div onclick="window.location='/logout'" class="item-container logout-container">
            <span class="item-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="#474851" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.7733 16.7867L18.2267 13.3333H5.33333V10.6667H18.2267L14.7733 7.21333L16.6667 5.33333L23.3333 12L16.6667 18.6667L14.7733 16.7867ZM21.3333 0C22.0406 0 22.7189 0.280951 23.219 0.781048C23.719 1.28115 24 1.95942 24 2.66667V8.89333L21.3333 6.22667V2.66667H2.66667V21.3333H21.3333V17.7733L24 15.1067V21.3333C24 22.0406 23.719 22.7189 23.219 23.219C22.7189 23.719 22.0406 24 21.3333 24H2.66667C1.18667 24 0 22.8 0 21.3333V2.66667C0 1.18667 1.18667 0 2.66667 0H21.3333Z" />

                    <defs>
                        <linearGradient id="paint0_linear_258_515" x1="0" y1="28" x2="28" y2="28" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#784BA0" />
                            <stop offset="1" stop-color="#FF3CAC" />
                        </linearGradient>
                    </defs>
                </svg>
            </span>
            <p class="item-description">Đăng xuất</p>
        </div>
    </div>
    <!-- Modal Add-->
    <div class="modal fade" id="ModalAddUser" tabindex="-1" aria-labelledby="ModalAddtUserLable" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content p-3">
                <div class="modal-body">
                    <div class="input-group flex-nowrap">
                        <form class="container-fluid" action="#" method="post" enctype="multipart/form-data">
                            <div class="row gy-3 gx-5">
                                <div class="col-6">
                                    <span class="form-title"> Giờ chiếu </span>
                                    <input type="datetime-local" class="form-control StartTime" aria-label="StartTime" aria-describedby="addon-wrapping" name="StartTime" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Giờ kết thúc </span>
                                    <input type="datetime-local" class="form-control EndTime" aria-label="EndTime" aria-describedby="addon-wrapping" name="EndTime" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Giá </span>
                                    <input type="text" class="form-control Price" aria-label="Price" aria-describedby="addon-wrapping" name="Price" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Mã phim </span>
                                    <input type="text" class="form-control MovieID" aria-label="MovieName" aria-describedby="addon-wrapping" name="MovieID" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Mã phòng chiếu </span>
                                    <input type="text" class="form-control RoomID" aria-label="RoomID" aria-describedby="addon-wrapping" name="RoomID" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Định dạng </span>
                                    <input type="text" class="form-control FormatName" aria-label="FormatName" aria-describedby="addon-wrapping" name="FormatName" />
                                </div>
                                <div class="col-6"></div>
                            </div>
                        </form>
                    </div>
                    <div class="message"></div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4" style="
                  display: flex;
                  align-items: center;
                  justify-content: center;
                ">
                            <button type="button" class="btn mt-2 text-white btn-main" id="btn-add" style="border-radius: 10px">
                                Thêm lịch chiếu
                            </button>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit-->
    <div class="modal fade" id="ModalEditUser" tabindex="-1" aria-labelledby="ModalEditUserLable" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content p-3">
                <div class="modal-body">
                    <div class="input-group flex-nowrap">
                        <form class="container-fluid" action="#" method="post" enctype="multipart/form-data">
                            <div class="row gy-3 gx-5">
                                <div class="col-6">
                                    <span class="form-title"> ID </span>
                                    <input type="text" class="form-control showtimeID" aria-label="showtimeID" aria-describedby="addon-wrapping" name="showtimeID" disabled />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Giờ chiếu </span>
                                    <input type="datetime-local" class="form-control StartTime" aria-label="StartTime" aria-describedby="addon-wrapping" name="StartTime" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Giờ kết thúc </span>
                                    <input type="datetime-local" class="form-control EndTime" aria-label="EndTime" aria-describedby="addon-wrapping" name="EndTime" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Giá </span>
                                    <input type="text" class="form-control Price" aria-label="Price" aria-describedby="addon-wrapping" name="Price" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Mã phim </span>
                                    <input type="text" class="form-control MovieID" aria-label="MovieName" aria-describedby="addon-wrapping" name="MovieID" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Mã phòng chiếu </span>
                                    <input type="text" class="form-control RoomID" aria-label="RoomID" aria-describedby="addon-wrapping" name="RoomID" />
                                </div>
                                <div class="col-6">
                                    <span class="form-title"> Định dạng </span>
                                    <input type="text" class="form-control FormatName" aria-label="FormatName" aria-describedby="addon-wrapping" name="FormatName" />
                                </div>
                                <div class="col-6"></div>
                            </div>
                        </form>
                    </div>
                    <div class="message"></div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4" style="
                  display: flex;
                  align-items: center;
                  justify-content: center;
                ">
                            <button type="button" class="btn mt-2 text-white btn-main" id="btn-edit" style="border-radius: 10px">
                                Sửa phim
                            </button>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="../../public/js/admin/time-control-page.js"></script>
</body>

</html>