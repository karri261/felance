<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel & MySQL Connection</title>
</head>

<body>
    <div>
        <?php
        use Illuminate\Support\Facades\DB;
        
        if (DB::connection()->getPdo()) {
            echo 'Succes, Connected to DB. Name: ' . DB::connection()->getDatabaseName();
        }
        ?>
    </div>
</body>

</html>
