<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <style>
        .dropdown-menu>li.kopie>a {
            padding-left: 5px;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu>a:after {
            border-color: transparent transparent transparent #333;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            content: " ";
            display: block;
            float: right;
            height: 0;
            margin-right: -10px;
            margin-top: 5px;
            width: 0;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #555;
        }

        .dropdown-menu>li>a:hover,
        .dropdown-menu>.active>a:hover {
            text-decoration: none;
        }

        @media (max-width: 767px) {

            .navbar-nav {
                display: inline;
            }

            .navbar-default .navbar-brand {
                display: inline;
            }

            .navbar-default .navbar-toggle .icon-bar {
                background-color: #fff;
            }

            .navbar-default .navbar-nav .dropdown-menu>li>a {
                color: red;
                background-color: #ccc;
                border-radius: 4px;
                margin-top: 2px;
            }

            .navbar-default .navbar-nav .open .dropdown-menu>li>a {
                color: #333;
            }

            .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
            .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
                background-color: #ccc;
            }

            .navbar-nav .open .dropdown-menu {
                border-bottom: 1px solid white;
                border-radius: 0;
            }

            .dropdown-menu {
                padding-left: 10px;
            }

            .dropdown-menu .dropdown-menu {
                padding-left: 20px;
            }

            .dropdown-menu .dropdown-menu .dropdown-menu {
                padding-left: 30px;
            }

            li.dropdown.open {
                border: 0px solid red;
            }

        }

        @media (min-width: 768px) {
            ul.nav li:hover>ul.dropdown-menu {
                display: block;
            }

            #navbar {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div id="navbar">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="#">Active Link</a></li> -->
                    <li><a href="#">HOME</a></li>
                    <!-- <li><a href="#">HOME</a></li> -->
                    <!-- <li><a href="#">HOME</a></li> -->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">FACULTY <b class="caret"></b></a>

                        <ul class="dropdown-menu">
                            <!-- <li class="kopie"><a href="#">Dropdown</a></li> -->
                            <li><a href="#">ADD</a></li>
                            <!-- <li class="active"><a href="#">Dropdown Link 2</a></li> -->
                            <li><a href="#">REMOVE</a></li>
                            <li><a href="#">UPDATE</a></li>
                            <li><a href="#">ASSIGN</a></li>
                            <li><a href="#">VIEW TT</a></li>
                        </ul>

                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">STUDENT <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <!-- <li class="kopie"><a href="#">Dropdown</a></li> -->
                            <li><a href="#">ADD</a></li>
                            <!-- <li class="active"><a href="#">Dropdown Link 2</a></li> -->
                            <li><a href="#">REMOVE</a></li>
                            <li><a href="#">UPDATE</a></li>
                            <li><a href="#">ASSIGN</a></li>
                            <li><a href="#">VIEW TT</a></li>
                        </ul>


                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</body>

</html>