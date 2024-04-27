<link rel="stylesheet" href="../../public/css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-hgsCvwr/5AApSTX9n+dxD1NvZDxN+HT7nMw6HbbV4v4JGqWV7+s9zHxbRVm6Zv8E2m7yyHuzCUwIZl4V4oq8Ww==" crossorigin="anonymous" />
<section>
    <div class="form-box">
        <div class="form-value">
            <form method="POST" action="">
                <h2>Đăng nhập</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input name="email" class="input" type="email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input name="password" class="input" type="password" required>
                    <label for="">Mật khẩu</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Ghi nhớ đăng nhập</label>
                </div>

                <div class="custom-btn alert fade show">
                    <a class="close" data-dismiss="alert">&times;</a>
                </div>

                <button class="custom-btn" type="submit">Đăng nhập</button><br>
                <div class="register">
                    <p>Bạn chưa có tài khoản? <a href="/account/register">Đăng ký</a></p>
                    <p>Quay về trang chủ -> <a href="/">Trang chủ</a></p>
                </div> <br>

            </form>
        </div>
    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>