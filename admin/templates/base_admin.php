<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
    <div class="container">
        <form action="/<?=basename(DIR)?>/" method="post">
    
            <div class="form-group">
                <label for=" image_banner">image banner</label>
                <input type="text" name="image_banner" class="form-control">
            </div>
            <input type="hidden" name="path" value="admin">
            <button type="submit" class="btn btn-primary">valider</button>
        </form>
    </div>
</body>
</html>