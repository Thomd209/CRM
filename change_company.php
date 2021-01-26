<?php session_start(); ?>
<?php require_once "app/config.php"; ?>
<?php require_once "app/change_company_script.php"; ?>
<?php //if (!empty($_SESSION["auth"])) { ?>
<?php require_once "app/layouts/header.php"; ?>

    <main class="content">
        <div class="change-worker">
            <p class="add-title"><?php if (isset($_SESSION["title"])) echo $_SESSION["title"]; ?></p>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <label for="name">Название:</label>
                <input type="text" name="name" id="name" value="<?php if (isset($_POST["name"])) echo $_POST["name"]; ?>">
                <label for="entity">Юридическое лицо:</label>
                <input type="text" name="entity" id="entity" value="<?php if (isset($_POST["entity"])) echo $_POST["entity"]; ?>">
                <label for="INN">ИНН:</label>
                <input type="text" name="INN" id="INN" value="<?php if (isset($_POST["INN"])) echo $_POST["INN"]; ?>">
                <label for="contacts">Контакты:</label>
                <input type="text" name="contacts" id="contacts" value="<?php if (isset($_POST["contacts"])) echo $_POST["contacts"]; ?>">
                <input type="submit" class="submit-company-data" name="submit" value="Отправить">
            </form>
        </div>
    </main>

<?php require_once "app/layouts/footer.php"; ?>
<?php /*} else {
    header("Location: sign_in.php");
}*/ ?>