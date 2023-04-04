<?php
require_once __DIR__ . '/core.php';

$locations = json_read(__DIR__ . '/data.json');

$current_location = array_key_exists('loc', $_GET ) ? $_GET['loc']  :  'crimea';
$current_places = $current_location ? $locations[$current_location] : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Resort Places</title>

    <style>
        .card {
            width: 18em;
            background-color: #fffdd0;
            border-radius: 10px;
        }

        .image {
            border-radius: 10px 10px 0 0;
            width: 100%;
            height: 200px;
            margin: 0 -0.75em;
            width: calc(100% + 0.75em * 2);
            overflow: hidden;
        }

        .image img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .cards {
            gap: 1em;
        }

        .location {
            width: 100%;
            margin-right: 0;
            margin-left: 0;
        }

        .location .dropdown {
            width: 100%;
        }

        .location .dropdown .btn {
            width: 100%;
        }

        .location .dropdown ul {
            width: 100%;
        }
    </style>
</head>

<body class="mb-5">
    <center>
        <br>
        <br>
        <h1>
            Не знаешь где отдохнуть?
        </h1>
        <p>
            Скажи спасибо: Лере Ехно, Ване Захарьяну и Феде Никонову!!!
        </p>
        <p>
            <em>&copy; MIT 04.03.2023</em>
        </p>
        <br>
        <br>
    </center>

    <div class="container">
        <div class="row location">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Плэйс
                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <?php foreach ($locations as $name => $places) : ?>
                        <?php $active_class = ($current_location === $name) ? 'active' : ''; ?>
                        <li>
                            <a class="dropdown-item <?= $active_class ?>" href="?loc=<?= $name ?>">
                                <?= $name ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
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
                            <img 
                                src="https://sun9-6.userapi.com/impg/_8as6Hye4jSXKo0RudoSR1zOKQ4D_h0RgjY4zQ/hocwA6uo3V0.jpg?size=480x360&quality=95&sign=631debc4f7aa09a20ed006d0cc65cb40&type=album"
                                alt="..."
                            />
                        <?php } else { ?>
                            <img 
                                src="<?= $place['picture'] ?>" 
                                alt="..."
                            />
                        <?php } ?>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title"><?= $place["title"] ?></h5>
                        <p class="card-text"><?= $place["description"] ?></p>
                        <a href="<?= $wiki_link ?>" class="btn btn-primary">Wiki</a>
                        <a href="<?= $place["original_url"] ?>" class="btn btn-primary">Site</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>