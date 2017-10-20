<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title><?php echo $titulo; ?></title>
        <meta name="description" content="" />
        <meta name="author" content="Raquel" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    </head>
        <style type="text/css">
            form{
                margin: 10px;
            }
            form label{
                display: block;
            }
            form input[type=text]{
                width: 250px;
                border: 1px solid #ggg;
                padding: 5px;
            }
            form input[type=password]{
                width: 150px;
                border: 1px solid #ggg;
                padding: 5px;
            }
            form input[type=text]:focus, form input[type=password]:focus{
                border: 1px solid #0cf;
            }
            form input[type=submit]{
                border: 1px solid #ggg;
                padding: 5px;
                cursor: pointer;
                display: block;
                margin-top: 10px;
            }
        </style>
    <body>
        <div>