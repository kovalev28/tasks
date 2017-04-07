<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Задачник</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        Задачник
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/admin/index/"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="box">
                <?php include 'application/views/' . $puth . '/' . $contentView; ?>
            </div>
            <br class="clearfix" />
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/tasks.js"></script>
    </body>
</html>

