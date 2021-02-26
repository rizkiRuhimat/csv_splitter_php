<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSV Splitter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .fakeimg {
        height: 200px;
        background: #aaa;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>CSV File Splitter</h1>
        <hr>
        <a href="index.php" class="btn btn-primary"> Kembali</a>
        <div class="row mt-4">
            <div class="col md-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>File Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $path    = 'upload/';
                        $files = scandir($path);
                        $files = array_diff(scandir($path), array('.', '..'));
                        foreach ($files as $file) {
                            $filesize = filesize($path . $file); // bytes
                            $filesize = round($filesize / 1024, 2); // kilobytes with two digits
                        ?>
                        <tr>
                            <td><?= $file; ?></td>
                            <td><?= $filesize; ?> KB</td>
                            <td>
                                <a href="<?= $file; ?>" class="btn btn-primary">Download</a>
                                <a href="delete.php?file=<?= $file; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                        };
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>