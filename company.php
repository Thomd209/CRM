<?php //Страница одной компании (проектанта, верфи, заказчика) ?>
<?php session_start(); ?>
<?php require_once "app/config.php"; ?>
<?php require_once "app/delete_history_record.php"; ?>
<?php require_once "app/delete_company.php"; ?>
<?php require_once "app/add_history.php"; ?>
<?php require_once "app/get_company.php"; ?>
<?php //if (!empty($_SESSION["auth"])) { ?>
<?php require_once "app/layouts/header.php"; ?>

    <main class="content">
        <p class="content__title"><?php if (isset($title)) echo $title; ?></p>
        <div class="company-data">
            <?php foreach ($company as $row) { ?>
                <?php if (isset($_GET["designer"])) { ?>
                    <a class="btn btn-success" href="add_company.php?company=designer">Добавить</a>
                    <a class="btn btn-primary" href="change_company.php?change_designer_id=<?php echo $row["id_designer"]; ?>">Изменить</a>
                    <a class="btn btn-danger company-data__delete-btn" href="?delete_designer_id=<?php echo $row["id_designer"]; ?>">Удалить</a>
                <?php } ?>
                <?php if (isset($_GET["shipyard"])) { ?>
                    <a class="btn btn-success" href="add_company.php?company=shipyard">Добавить</a>
                    <a class="btn btn-primary" href="change_company.php?change_shipyard_id=<?php echo $row["id_shipyard"]; ?>">Изменить</a>
                    <a class="btn btn-danger company-data__delete-btn" href="?delete_shipyard_id=<?php echo $row["id_shipyard"]; ?>">Удалить</a>
                <?php } ?>
                <?php if (isset($_GET["customer"])) { ?>
                    <a class="btn btn-success" href="add_company.php?company=customer">Добавить</a>
                    <a class="btn btn-primary" href="change_company.php?change_customer_id=<?php echo $row["id_customer"]; ?>">Изменить</a>
                    <a class="btn btn-danger company-data__delete-btn" href="?delete_customer_id=<?php echo $row["id_customer"]; ?>">Удалить</a>
                <?php } ?>
                <?php if (isset($_GET["designer"])) { ?>
                    <p>Рабочее название: <?php echo $row["designer_working_name"]; ?></p>
                <?php } ?>
                <?php if (isset($_GET["shipyard"])) { ?>
                    <p>Рабочее название: <?php echo $row["shipyard_working_name"]; ?></p>
                <?php } ?>
                <?php if (isset($_GET["customer"])) { ?>
                    <p>Рабочее название: <?php echo $row["customer_working_name"]; ?></p>
                <?php } ?>
                <p>Название юридического лица: <?php echo $row["entity"]; ?></p>
                <p>ИНН: <?php echo $row["INN"]; ?></p>
                <p>Контакты: <?php echo $row["contacts"]; ?></p>
            <?php } ?>
        </div>
        <div class="add-history">
            <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
                <p class="add-history__title">Пополнить историю:</p>
                <textarea class="add-history__field" name="history" rows="5" cols="10"><?php if (isset($_POST["history"])) echo $_POST["history"]; ?></textarea>
                <input type="submit" class="add-history__submit" value="Пополнить" name="submit_history">
            </form>
        </div>
        <div class="history-container">
            <p class="history-container__title">История взаимоотношений:</p>
            <?php while ($row = $query_result->fetch()) { ?>
                <div class="history-container__history-record">
                    <p class="history-container__text"><?php echo $row["history"]; ?></p>
                    <a href="?&history_record_id=<?php echo $row["id"]; ?>" class="btn btn-danger history-container__link">Удалить</a>
                </div>
            <?php } ?>
        </div>
    </main>

<?php require_once "app/layouts/footer.php"; ?>
<?php /*} else {
    header("Location: sign_in.php");
}*/ ?>