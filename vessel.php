<?php //Страница, на которой выводится информация об одном судне ?>
<?php session_start(); ?>
<?php require_once "app/config.php"; ?>
<?php require_once "app/delete_vessel.php"; ?>
<?php require_once "app/get_vessel.php"; ?>
<?php //if (!empty($_SESSION["auth"])) { ?>
<?php require_once "app/layouts/header.php"; ?>

    <main class="content">
        <p class="content__title"><?php if (isset($title)) echo $title; ?></p>
        <div class="company-data">
            <?php foreach ($vessel as $row) { ?>
                <a href="add_vessel.php" class="btn btn-success">Добавить</a>
                <a class="btn btn-primary" href="change_vessel.php?update_vessel=<?php echo $row["id"]; ?>">Изменить</a>
                <a class="btn btn-danger" href="?delete_vessel=<?php echo $row["id"]; ?>">Удалить</a>
                <p>IMO: <?php echo $row["IMO"]; ?></p>
                <p>Проект: <?php echo $row["project"]; ?></p>
                <p>Название судна: <?php echo $row["ship_name"]; ?></p>
                <p>Тип судна: <?php echo $row["ship_type"]; ?></p>
                <p>Строительный номер: <?php echo $row["building_number"]; ?></p>
                <p>Стадия проекта: <?php echo $row["project_stage"]; ?></p>
                <p>Стадия закупки: <?php echo $row["purchase_stage"]; ?></p>
            <?php } ?>
        </div>
    </main>

<?php require_once "app/layouts/footer.php"; ?>
<?php /*} else {
    header("Location: sign_in.php");
}*/ ?>