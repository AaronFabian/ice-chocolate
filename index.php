<?php
session_start();

include_once "./utils/PDOUtil.php";

include_once "./controller/LoginController.php";
include_once "./controller/HomeController.php";
include_once "./controller/StaffController.php";
include_once "./controller/ClientController.php";
include_once "./controller/ClientController.php";
include_once "./controller/SettingController.php";
include_once "./controller/ResultController.php";
include_once "./controller/TableController.php";
include_once "./controller/PrinterController.php";
include_once "./dao/WorkerDaoImpl.php";
include_once "./dao/FoodDaoImpl.php";
include_once "./dao/TableConfigDaoImpl.php";
include_once "./dao/CategoryDaoImpl.php";
include_once "./dao/TableDaoImpl.php";
include_once "./dao/DocumentDaoImpl.php";
include_once "./dao/ResultDaoImpl.php";
include_once "./models/Worker.php";
include_once "./models/Role.php";
include_once "./models/Food.php";
include_once "./models/Category.php";
include_once "./models/TableConfig.php";
include_once "./models/Table.php";
include_once "./models/Document.php";
include_once "./models/Result.php";

$menu = filter_input(INPUT_GET, 'menu');

if (!$menu) $menu = '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;800&display=swap" rel="stylesheet" />
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;800&display=swap" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
   <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
   <?php if ($menu === 'result-view') : ?>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <?php endif; ?>

   <?php if ($menu !== 'table-view') : ?>
      <script src="https://cdn.tailwindcss.com"></script>
      <script>
         tailwind.config = {
            content: ['./views/*'],
            theme: {
               fontFamily: {
                  body: ['Inter, sans-serif'],
               },
               extend: {
                  colors: {
                     main: '#5e72e4',
                     secondary: '#8392ab',
                     warning: '#fb6340',
                     danger: '#f5365c',
                     success: '#2dce89',
                     info: '#11cdef',
                     blue: '#63b3ed',
                     purple: '#6f42c1',
                     pink: '#d63384',
                     orange: '#fd7e14',
                     yellow: '#fbd38d',
                     green: '#81e6d9',
                     teal: '#20c997',
                     cyan: '#0dcaf0',
                     gray: '#6c757d',
                     gray_dark: '#343a40',
                     gradient_one: 'rgba(147, 26, 222, 0.83)',
                     gradient_two: 'rgba(28, 206, 234, 0.82)',
                     gradient_three: '#7EE8FA',
                     gradient_four: '#EEC0C6',
                     border_seperator: 'rgba(195,202,216,.5)'
                  },
               },
            },
            plugins: [],
         };
      </script>
   <?php endif; ?>


   <!-- <link rel="stylesheet" href="dist/output.css" /> -->

   <title>Food Manager | <?= $menu ? str_replace('-view', '', $menu) : 'welcome'; ?></title>
</head>

<body class="font-body">
   <?php
   if (isset($_SESSION['web-user'])) :
      switch ($menu) {
         case 'staff-view':
            $staffController = new StaffController();
            $staffController->index();
            break;
         case 'client-view':
            $clientController = new ClientController();
            $clientController->index();
            break;
         case 'printer-view':
            $printerController = new PrinterController();
            $printerController->index();
            break;
         case 'result-view':
            $resultController = new ResultController();
            $resultController->index();
            break;
         case 'setting-view':
            $settingController = new SettingController();
            $settingController->index();
            break;
         case 'food-view':
            $settingController = new SettingController();
            $settingController->food();
            break;
         case 'table-view':
            $settingController = new SettingController();
            $settingController->table();
            break;
         default:
            $homeController = new HomeController();
            $homeController->index();
            break;
      };
   else :
      $loginController = new LoginController();
      $loginController->index();
   endif;
   ?>
</body>

</html>