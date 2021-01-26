<?php require_once "app/config.php"; ?>
<?php require_once "app/get_categories.php"; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="public/libs/bootstrap.min.css">
    <link rel="stylesheet" href="public/libs/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="header__content">
                <a href="index.php" class="header__logo">CRM</a>
                <nav class="main-nav">
                    <ul class="main-nav__menu">
                        <?php foreach ($categories as $row) { ?>
                            <li class="main-nav__item">
                                <a href="category.php?category=<?php echo $row['id']; ?>" class="main-nav__link main-nav__link-menu"><?php echo $row['category']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <div class="header__burger">
                    <span class="header__burger-item"></span>
                </div>
            </div>
        </header>