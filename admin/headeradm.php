<head>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <base href=".">
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Quản trị hệ thống</title>
         <link rel="shortcut icon" href="favicon.png">
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <link href="css/font-awesome.min.css" rel="stylesheet">
         <link href="css/admin.css" rel="stylesheet">
         <link href="css/introjs.min.css" rel="stylesheet">
         <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
         <script type="text/javascript" src="js/bootstrap.min.js"></script>
         <script type="text/javascript" src="js/intro.min.js"></script>
         <script type="text/javascript" src="js/admin.js"></script>
         <!--Hỗ trợ IE nhận dạng thẻ HTML5-->
         <!--[if lt IE 9]>
         <script src="js/html5shiv.min.js"></script>
         <script src="js/respond.min.js"></script>
         <![endif]-->
     </head>
     <?php

    if (isset($_SESSION['username'])) {
		     $sql_query = mysqli_query($conn,"SELECT * from user where username='".$_SESSION['username']."'");
    $result = mysqli_fetch_array($sql_query);
    $level = $result['level'];	
        if ($level == '1') {
            ?>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-cogs"></i> Quản trị hệ thống</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Xin chào <?php echo $_SESSION['username'] ?><b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Chỉnh sửa tài khoản</a></li>
                                <li><a href="../logout.php"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <?php
        } else {
            die("Bạn không đủ quyền");
        }
    }
    else{
        header("location: ../login.php");
    }
        ?>
