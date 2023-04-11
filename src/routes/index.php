<?php
$VER = time();

require_once __DIR__ . '/../core/autoload.php';

$locations = json_read(FILES['places']);
$previews = json_read(FILES['previews']);

$current_location = isset($_GET['loc']) ? $_GET['loc']  :  'crimea';
$current_places = $locations[$current_location];

$preview = $previews[$current_location];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/base.css?v=<?= $VER ?>">
    <link rel="stylesheet" href="./styles/style.css?v=<?= $VER ?>">

    <title>Resort Places</title>
</head>

<body class="mb-5">
    <!-- This code running public parser -->
    <script>
        fetch('./parse-public.php');
    </script>

    <center>
        <br><br>

        <h1>
            Не знаешь <u>где отдохнуть</u>?
        </h1>
        <p>
            Скажи спасибо: Лере Ехно, Ване Захарьяну и Феде Никонову!!!
        </p>
        <p id="copyright">
            <em>&copy; MIT 04.03.2023</em>
        </p>

        <br><br>
    </center>

    <div class="container">
        <div class="row location">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $preview['name'] ?>
                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php foreach ($locations as $name => $places) : ?>
                        <?php $active_class = ($current_location === $name) ? 'active' : ''; ?>
                        <li>
                            <a class="dropdown-item <?= $active_class ?>" href="?loc=<?= $name ?>">
                                <?= $previews[$name]['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center mt-4 preview">
        <img class="preview-image" src="<?= $preview['picture'] ?>" alt="..." />
        <div class="preview-description ms-4">
            <h2 class="mb-0"><?= $preview['name'] ?></h2>
            <p class="preview-description mb-0 mt-0"><?= $preview['description'] ?></p>
        </div>
    </div>

    <div class="container">
        <div class="row cards justify-content-center mt-4">
            <?php foreach ($current_places as $place) : ?>
                <?php $title_encoded = urlencode($place["title"]) ?>
                <?php $wiki_link = "https://ru.wikipedia.org/w/index.php?search={$title_encoded}&ns0=1" ?>

                <div class="card">
                    <div class="card-top-img image">
                        <?php if ($place['picture'] == null) { ?>
                            <img src="https://sun9-6.userapi.com/impg/_8as6Hye4jSXKo0RudoSR1zOKQ4D_h0RgjY4zQ/hocwA6uo3V0.jpg?size=480x360&quality=95&sign=631debc4f7aa09a20ed006d0cc65cb40&type=album" alt="..." />
                        <?php } else { ?>
                            <img src="<?= $place['picture'] ?>" alt="..." />
                        <?php } ?>
                    </div>

                    <div class="card-body">
                        <div class="content">
                            <h5 class="card-title"><?= $place["title"] ?></h5>
                            <p class="card-text"><?= $place["description"] ?></p>
                        </div>
                        <div class="buttons">
                            <a target="_blank" href="<?= $wiki_link ?>" class="btn btn-primary">⛵ Wiki</a>
                            <a target="_blank" href="<?= $place["original_url"] ?>" class="btn btn-secondary">🍊 Site</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>