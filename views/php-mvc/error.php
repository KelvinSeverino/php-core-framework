<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= CONF_SITE_TITLE ?> | Erro</title>
</head>
<body>
    <article>
        <header>
            <h1><?= $error->code ?> | <?= $error->title ?></h1>
        </header>

        <p>
            <?= $error->message ?>
        </p>

        <a href="<?= $error->link ?>"><?= $error->linkMessage ?></a>
    </article>
    
    
</body>
</html>