<?php //На этой странице выводятся проекты (суда) ?>
<?php session_start(); ?>
<?php require_once "app/config.php"; ?>
<?php require_once "app/get_projects.php"; ?>
<?php //if (!empty($_SESSION["auth"])) { ?>
<?php require_once "app/layouts/header.php"; ?>

    <main class="content">
        <p class="content__title">Проекты:</p>
        <div class="table-responsive">
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
                </tr>
                <?php while ($projects = $query_result->fetch()) { ?>
                    <tr>
                        <td><?php echo $projects["IMO"]; ?></td>
                        <td><?php echo $projects["project"]; ?></td>
                        <td><?php echo $projects["ship_name"]; ?></td>
                        <td><?php echo $projects["ship_type"]; ?></td>
                        <td><?php echo $projects["building_number"]; ?></td>
                        <td><?php echo $projects["project_stage"]; ?></td>
                        <td><?php echo $projects["purchase_stage"]; ?></td>
                        <td><?php echo $projects["designer_working_name"]; ?></td>
                        <td><?php echo $projects["shipyard_working_name"]; ?></td>
                        <td><?php echo $projects["customer_working_name"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </main>

<?php require_once "app/layouts/footer.php"; ?>
<?php /*} else {
    header("Location: sign_in.php");
} */ ?>

