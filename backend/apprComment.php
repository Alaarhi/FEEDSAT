<?php
include '../dbConnection.php';
?>

<?php
     //if ((isset($_SESSION['idEtudiant']!=[1400327, ]))) {
   // header ("location: index.php");
    //   }

     //$idEtudiant = $_SESSION['idEtudiant'];


     $requetecomments = $bd->query(
             'SELECT c.comment as commentaire, c.id as idcom,
        s.id as idAauteur, s.surname as prenomAuteur, s.name as nomAuteur,
        date_format(c.timestamp, \'%d-%m-%Y\') as dateCommentaire,
        p.id as idprof, p.surname as prenomprof, p.name as nomprof,
        c.approved as approve
        FROM comment as c
        INNER JOIN student as s 
        INNER JOIN professor as p
        ON (c.studentId = s.id) AND (c.profid = p.id)
        WHERE c.approved = 0
        ORDER BY dateCommentaire ');

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title> Admin Dashboard </title>

        <!-- Base Css Files -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="css/waves-effect.css" rel="stylesheet">

        <!-- Plugin Css-->
        <link rel="stylesheet" href="assets/magnific-popup/magnific-popup.css" />
        <link rel="stylesheet" href="assets/jquery-datatables-editable/datatables.css" />

        <!-- Custom Files -->
        <link href="css/helper.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <![endif]-->

        <script src="js/modernizr.min.js"></script>
        
    </head>



    <body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="index.php" class="logo"><i class="md md-terrain"></i> <span>FeedSAT </span></a>
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left">
                                <i class="fa fa-bars"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                        <form class="navbar-form pull-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                            </div>
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </form>

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                    <i class="md md-notifications"></i> <span class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="text-center notifi-title">Notification</li>
                                    <li class="list-group">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                </div>
                                                <div class="media-body clearfix">
                                                    <div class="media-heading">New comment registered</div>

                                                </div>
                                            </div>
                                        </a>
                                        <!-- last list item -->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <small>See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                            </li>
                            <li class="hidden-xs">
                                <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="images/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->

        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <div class="user-details">
                    <div class="pull-left">
                        <img src="images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                    </div>
                    <div class="user-info">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Alaa Riahi <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                                <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                            </ul>
                        </div>

                        <p class="text-muted m-0">Administrator</p>
                    </div>
                </div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.php" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Comments </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="apprComment.php">Moderation of Comments</a></li>
                            </ul>
                        </li>

                        <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Comments</h4>

                            </div>
                        </div>


                        <div class="panel">

                            <div class="panel-body">
                                <table class="table table-bordered table-striped" id="datatable-editable">
                                    <thead>
                                        <tr>
                                            <th>Comments</th>
                                            <th>about the Professor</th>
                                            <th>from the Student</th>
                                            <th>date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <trbody>

                                    <?php
                                    while($comments = $requetecomments->fetch())
                                    {
                                        ?>
                                    <tr class="gradeA">
                                        <td>  <?php echo $comments['commentaire']; ?>  </td>
                                        <td> <?php  echo $comments['prenomprof'] .$comments['nomprof']; ?>  </td>
                                        <td> <?php echo $comments['prenomAuteur'] .$comments['nomAuteur']; ?> </td>
                                        <td> <?php echo $comments['dateCommentaire']; ?> </td>
                                        <td class="actions">

                                            <form action="approuver.php" method="post">
                                                <input type="hidden" name =id value="<?php echo $comments['idcom']?>" name="id" />
                                                <input type="submit" value="approve" />
                                            </form>

                                            <form action="desapprouver.php" method="post">
                                                <input type="hidden" name =id value="<?php echo $comments['idcom']?>" name="id" />
                                                <input type="submit" value="delete" />
                                            </form>

                                        </td>
                                        </tr>

                                    <?php } ?>

                                    </body>
                                </table>
                            </div>
                            <!-- end: page -->

                        </div> <!-- end Panel -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © FEEDSAT.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/waves.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

    <!-- Examples -->
    <script src="assets/magnific-popup/magnific-popup.js"></script>
    <script src="assets/jquery-datatables-editable/jquery.dataTables.js"></script> 
    <script src="assets/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/jquery-datatables-editable/datatables.editable.init.js"></script>
	
	</body>
</html>