

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi SuccyLaundry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
    
    <style>
        body {
            background: #D6E6F2;
            font-family: 'Nanum Gothic', sans-serif;
        }
        .container {
            margin-top: 60px;
            max-width: 400px; 
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 20px 40px #769fcd;
            padding: 60px; 
            text-align: center;
            opacity: 0; 
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease; 
        }
        .container.visible {
            opacity: 1; 
            transform: translateY(0); 
        }
        h2 {
            margin-bottom: 40px; 
            color: #769fcd; 
            font-weight: bold;
            font-size: 28px;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .highlight {
            color: #FFD43B; 
        }
        hr {
            border: 1px solid #769fcd; 
            margin: 20px 0; 
        }
        .form-control {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
            outline: none;
        }
        .btn-custom {
            background-color: #769fcd;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
            font-size: 16px;
        }
        .btn-custom:hover {
            background-color: #357ABD;
            transform: translateY(-2px);
        }
        .alert {
            margin-bottom: 20px;
            border-radius: 4px;
            padding: 10px;
            font-size: 14px;
        }
        .alert-danger {
            background-color: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }
        .alert-success {
            background-color: #dff0d8;
            border-color: #d6e9c6;
            color: #3c763d;
        }
        .alert-warning {
            background-color: #fcf8e3;
            border-color: #faebcc;
            color: #8a6d3b;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-lock"></i> SISTEM INFORMASI <span class="highlight">SuccyLaundry</span></h2>
        <hr>
        <?php if(isset($_GET['pesan'])){
                if($_GET['pesan']=="gagal"){
                    echo "<div class='alert alert-danger'>Login gagal! Username dan Password salah!</div>";
                } elseif($_GET['pesan']=="logout"){
                    echo "<div class='alert alert-success'>Anda telah berhasil logout.</div>";
                } elseif($_GET['pesan']=="belum_login"){
                    echo "<div class='alert alert-warning'>Anda harus login untuk mengakses halaman ini.</div>";
                }
            }
        ?>
        <form action="login.php" method="post">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <button type="submit" class="btn-custom">Login</button>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(window).on('scroll', function() {
                $('.container').each(function() {
                    var elementTop = $(this).offset().top;
                    var windowBottom = $(window).scrollTop() + $(window).height();
                    if (elementTop < windowBottom) {
                        $(this).addClass('visible');
                    }
                });
            }).trigger('scroll'); 
        });
    </script>
</body>
</html>