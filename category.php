<?php //Файл, в котором выводятся перечни судов и компаний из БД ?>
<?php session_start(); ?>
<?php require_once "app/config.php"; ?>
<?php require_once "app/delete_vessel.php"; ?>
<?php require_once "app/delete_company.php"; ?>
<?php require_once "app/get_category.php"; ?>
<?php //if (!empty($_SESSION["auth"])) { ?>
<?php require_once "app/layouts/header.php"; ?>

    <main class="content">
        <?php if (isset($category) && ($category == 1)) { ?>
            <p class="content__title"><?php if (isset($title)) echo $title; ?></p>
            <a href="add_vessel.php" class="btn btn-success btn-add-vessel">Добавить</a>
            <table class="table table-responsive content__information-table">
                <tr>
                    <th>IMO</th>
                    <th>Проект</th>
                    <th>Название судна</th>
                    <th>Тип судна</th>
                    <th>Строительный номер</th>
                    <th>Стадия проекта</th>
                    <th>Стадия закупки</th>
                    <th>Проектант</th>
                    <th>Верфь</th>
                    <th>Заказчик</th>
                    <th>Изменить</th>
                    <th>Удалить</th>
                </tr>
                    <?php while ($row = $query_result->fetch()) { ?>
                        <tr>
                            <td><?php echo $row["IMO"]; ?></td>
                            <td><a href="vessel.php?vessel=<?php echo $row["id"]; ?>"><?php echo $row["project"]; ?></a></td>
                            <td><?php echo $row["ship_name"]; ?></td>
                            <td><?php echo $row["ship_type"]; ?></td>
                            <td><?php echo $row["building_number"]; ?></td>
                            <td><?php echo $row["project_stage"]; ?></td>
                            <td><?php echo $row["purchase_stage"]; ?></td>
                            <td><a href="company.php?designer=<?php echo $row["id_designer"]; ?>"><?php echo $row["designer_working_name"]; ?></a></td>
                            <td><a href="company.php?shipyard=<?php echo $row["id_shipyard"]; ?>"><?php echo $row["shipyard_working_name"]; ?></a></td>
                            <td><a href="company.php?customer=<?php echo $row["id_customer"]; ?>"><?php echo $row["customer_working_name"]; ?></a></td>
                            <td><a class="btn btn-primary" href="change_vessel.php?update_vessel=<?php echo $row["id"]; ?>">Изменить</a></td>
                            <td><a class="btn btn-danger" href="?delete_vessel=<?php echo $row["id"]; ?>">Удалить</a></td>
                        </tr>
                    <?php } ?>
                
            </table>
        <?php } ?>
        
    </main>

<?php require_once "app/layouts/footer.php"; ?>
<?php /*} else {
    header("Location: sign_in.php");
}*/ ?>