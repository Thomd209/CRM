<?php session_start(); ?>
<?php require_once "app/config.php"; ?>
<?php require_once "app/get_companies.php"; ?>
<?php require_once "app/change_vessel_script.php"; ?>
<?php //if (!empty($_SESSION["auth"])) { ?>
<?php require_once "app/layouts/header.php"; ?>

    <main class="content">
        <div class="form-container">
            <p class="add-title">Изменить судно:</p>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <label for="IMO">IMO:</label>
                <input type="text" name="IMO" id="IMO" value="<?php if (isset($_POST["IMO"])) echo $_POST["IMO"]; ?>">
                <label for="project">Проект:</label>
                <input type="text" name="project" id="project" value="<?php if (isset($_POST["project"])) echo $_POST["project"]; ?>">
                
                <label for="ship_name">Имя судна:</label>
                <input type="text" name="ship_name" id="ship_name" value="<?php if (isset($_POST["ship_name"])) echo $_POST["ship_name"]; ?>">
                <label for="ship_type">Тип судна:</label>
                <input type="text" name="ship_type" id="ship_type" value="<?php if (isset($_POST["ship_type"])) echo $_POST["ship_type"]; ?>">
                
                <label for="building_number">Строительный номер:</label>
                <input type="text" name="building_number" id="building_number" value="<?php if (isset($_POST["building_number"])) echo $_POST["building_number"]; ?>">
                <label for="project_stage">Стадия проекта:</label>
                <input type="text" name="project_stage" id="project_stage" value="<?php if (isset($_POST["project_stage"])) echo $_POST["project_stage"]; ?>">
                
                <label for="purchase_stage">Стадия закупки:</label>
                <input type="text" name="purchase_stage" id="purchase_stage" value="<?php if (isset($_POST["purchase_stage"])) echo $_POST["purchase_stage"]; ?>">

                <select name="designers">
                    <?php while ($row = $query_designers_result->fetch()) { ?>
                        <option value="<?php echo $row["id_designer"]; ?>"><?php echo $row["designer_working_name"]; ?></option>
                    <?php } ?>
                </select>
                <select name="shipyards">
                    <?php while ($row = $query_shipyards_result->fetch()) { ?>
                        <option value="<?php echo $row["id_shipyard"]; ?>"><a href="?shipyard_id=<?php echo $row["shipyard_working_name"]; ?>"><?php echo $row["shipyard_working_name"]; ?></a></option>
                    <?php } ?>
                </select>
                <select name="customers">
                    <?php while ($row = $query_customers_result->fetch()) { ?>
                        <option value="<?php echo $row["id_customer"]; ?>"><a href="?customer_id=<?php echo $row["customer_working_name"]; ?>"><?php echo $row["customer_working_name"]; ?></a></option>
                    <?php } ?>
                </select>
                
                <input type="submit" class="submit-vessel-data" name="submit" value="Отправить">
                
            </form>
        </div>
    </main>

<?php require_once "app/layouts/footer.php"; ?>
<?php /*} else {
    header("Location: sign_in.php");
}*/ ?>