<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <link rel="stylesheet" href="<?= base_url('public') ?>/css/employee.css">
</head>

<body>
    <div class="container-cover">
        <div class="employee-container">
            <div class="heading">
                <div class="left-logo">
                    <p>IGB HR</p>
                </div>
                <div class="right-section">

                    <ul>
                        <?php if (isset($avatar)) : ?>
                            <?php foreach ($avatar->getResult() as $row) : ?>
                                <li><img src="<?php echo $row->avatar ?>" alt=""></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <li><a href="">Setting</a></li>
                        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="main-container">
                <div class="left-contain">
                    <legend>List Views</legend>
                    <ul>
                        <li>
                            <a href="<?= base_url('employee_view') ?>">Employee View</a>
                        </li>
                        <li>
                            <a href="<?= base_url('department_view') ?>">Department View</a>
                        </li>
                        <li>
                            <a href="<?= base_url('employee_list') ?>">Employee list</a>
                        </li>
                    </ul>
                </div>
                <div class="right-contain">
                    <div class="head-bar">
                        <form action="">
                            <input type="search" name="search" placeholder="Search...">
                            <input type="submit" class="button" value="Search">
                            <input type="search" name="search1" id="sort" placeholder="Searching by deparment name...">
                            <input type="submit" value="Search">
                            <input type="submit" class="button" value="maxage" name="maxage">
                            <input type="submit" class="button" value="minage" name="minage">
                            <input type="submit" class="button" value="maxsalary" name="maxsalary">
                        </form>
                        <div class="right">
                            <a href="<?= base_url('add_employee') ?>">Add new employee</a>
                        </div>
                    </div>
                    <div class="list-employee">
                        <?= $this->renderSection("content"); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <?= $this->renderSection("scripts"); ?>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>