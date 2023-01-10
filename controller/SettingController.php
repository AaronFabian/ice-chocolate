<?php

class SettingController
{

   private $workerDaoImpl;
   private $foodDaoImpl;
   private $tableConfigDaoImpl;
   private $categoryDaoImpl;

   public function __construct()
   {
      $this->workerDaoImpl = new WorkerDaoImpl();
      $this->foodDaoImpl = new FoodDaoImpl();
      $this->tableConfigDaoImpl = new TableConfigDaoImpl();
      $this->categoryDaoImpl = new CategoryDaoImpl();
   }

   public function index()
   {
      $staffId = filter_input(INPUT_GET, 'staff');
      $btnSubmitChange = filter_input(INPUT_POST, 'btnSubmitChange');

      if (isset($staffId) and $staffId === $_SESSION['worker-id'] and $_SESSION['worker-role'] === 'manager') :

         $workerList = $this->workerDaoImpl->fetchAllWorkerList();
         include_once "./views/setting-view.php";
      elseif (isset($staffId) and $_SESSION['worker-role'] === 'manager' and $staffId !== '') :

         if (isset($btnSubmitChange))
            echo $this->handleUpdate() ? "<p>update success !</p>" : 'oops something wrong';

         $profile = $this->workerDaoImpl->fetchWorkerWorkerId($staffId);
         $profile ? include_once "./views/bio-view.php" : header('Location: index.php');
      else :

         $worker = new Worker();
         $worker->setName($_SESSION['name']);
         $worker->setNik($_SESSION['nik']);
         $worker->setWorkerId($_SESSION['worker-id']);

         $profile = $this->workerDaoImpl->fetchWorker($worker);
         include_once "./views/bio-view.php";
      endif;
   }


   public function handleUpdate()
   {
      $about = filter_input(INPUT_POST, 'bio');
      $name = filter_input(INPUT_POST, 'name');
      $nik = filter_input(INPUT_POST, 'nik');
      $id = filter_input(INPUT_POST, 'id');
      $country = filter_input(INPUT_POST, 'country');
      $gender = filter_input(INPUT_POST, 'gender');
      $date = filter_input(INPUT_POST, 'date');
      $city = filter_input(INPUT_POST, 'city');

      $newWorker = new Worker();
      $newWorker->setAbout($about);
      $newWorker->setName(ucfirst($name));
      $newWorker->setNik($nik);
      $newWorker->setWorkerId($id);
      $newWorker->setCountry($country);
      $newWorker->setGender($gender);
      $newWorker->setJoinAt($date);
      $newWorker->setCity($city);

      $statusUpdate = $this->workerDaoImpl->updateWorker($newWorker);

      if ($statusUpdate)
         return true;
      else
         return false;
   }

   public function food()
   {
      $errorArr = [];
      $PERPAGE = 5;

      $pagenow = filter_input(INPUT_GET, 'page');
      $staffId = filter_input(INPUT_GET, 'staff');
      $category = filter_input(INPUT_GET, 'category');
      $btnSave = filter_input(INPUT_POST, 'btnSave');
      $btnAdd = filter_input(INPUT_POST, 'btnAdd');

      if (isset($staffId) and $staffId === $_SESSION['worker-id'] and $_SESSION['worker-role'] === 'manager') :

         if (isset($btnSave) or isset($btnAdd)) {
            $inpFoodName = filter_input(INPUT_POST, 'inpFoodName');
            $inpOldName = filter_input(INPUT_POST, 'oldName');
            $inpCategory = filter_input(INPUT_POST, 'inpCategory');
            $inpPrice = filter_input(INPUT_POST, 'inpPrice');
            $inpDescription = filter_input(INPUT_POST, 'inpDescription');
            $image = '';

            if (empty($inpFoodName) || empty($inpCategory) || empty($inpPrice))
               $errorArr['empty-input'] = 'please fill all fields';

            if (empty($errorArr)) { // all fields ok !
               if ($_FILES["inpImage"]["name"]) {
                  $directory = "src/img/uploads";
                  $fileExtension = pathinfo($_FILES['inpImage']['name'], PATHINFO_EXTENSION);
                  $newFileName = uniqid() . "." . $fileExtension;
                  $targetFile = "$directory/$newFileName";
                  if ($_FILES['inpImage']['size'] > 1024 * 2048) {
                     echo "<div class='py-2 bg-danger'>Upload error. File size exceed 2MB</div>";
                  } else {
                     move_uploaded_file($_FILES['inpImage']['tmp_name'], $targetFile);
                     $image = $newFileName; // success !
                  }
               }

               switch ($btnSave) {
                  case 'save':
                     $food = new Food();
                     $food->setFoodName(ucfirst($inpFoodName));
                     $food->setCategory(ucfirst($inpCategory));
                     $food->setPrice($inpPrice);
                     $food->setDescription($inpDescription);
                     $food->setImage($image);

                     $updateStatus = $this->foodDaoImpl->updateFood($food, $inpOldName);

                     echo $updateStatus ? "success" : 'error saving data';
                     break;
                  case 'add':
                     $newFood = new Food();
                     $newFood->setFoodName(ucfirst($inpFoodName));
                     $newFood->setCategory(ucfirst($inpCategory));
                     $newFood->setPrice($inpPrice);
                     $newFood->setDescription($inpDescription);
                     $newFood->setImage($image);

                     $addedStatus = $this->foodDaoImpl->addFood($newFood);

                     echo $addedStatus ? "success" : 'error saving data';
                     break;
               }
            } else if ($btnSave === 'category') { // adding category
               if (!empty($inpCategory)) {
                  $newCategory = new Category();
                  $newCategory->setfoodCategory($inpCategory);

                  $status = $this->categoryDaoImpl->addNewCategory($newCategory);
                  echo $status ? 'adding new category success' : 'fatal error';
               } else {

                  echo 'please input the category fields !';
               }
            } else {
               echo 'please input all fields';
            }
         }


         if (!isset($pagenow) || $pagenow <= 0) $pagenow = 1;
         $startPage = ($pagenow - 1) * $PERPAGE;

         $fetchAllCategories = $this->categoryDaoImpl->fetchAllCategory();
         $defaultFoodList = $this->foodDaoImpl->fetchAllFoods($startPage, $PERPAGE, $category);
         $categories = $this->foodDaoImpl->fetchCategory();
         $dataTotal = count($defaultFoodList);

         include_once './views/food-view.php';
      else :
         header('Location: index.php');
      endif;
   }

   public function table()
   {
      $staffId = filter_input(INPUT_GET, 'staff');
      $btnSave = filter_input(INPUT_POST, 'btnSave');

      if (isset($staffId) and $staffId === $_SESSION['worker-id'] and $_SESSION['worker-role'] === 'manager') :
         if (isset($btnSave)) {
            $columnConfig = filter_input(INPUT_POST, 'column-config');
            $rowConfig = filter_input(INPUT_POST, 'row-config');
            $floor = filter_input(INPUT_POST, 'floor');

            if (!empty($columnConfig) and !empty($rowConfig) and !empty($floor)) {

               $isTableAvailable = $this->tableConfigDaoImpl->fetchTableConfig($floor);

               $newTableConfig = new TableConfig();
               $newTableConfig->setTotalColumn($columnConfig);
               $newTableConfig->setTotalRow($rowConfig);
               $newTableConfig->setFloor($floor);

               if ($isTableAvailable) {
                  $updateStatus = $this->tableConfigDaoImpl->updateTableConfig($newTableConfig);
                  echo $updateStatus ? 'successfully updated !' : 'fatal : something wrong !';
               } else {
                  $saveStatus = $this->tableConfigDaoImpl->saveTableConfig($newTableConfig);
                  echo $saveStatus ? 'successfully saved ! ' : ' fatal: something wrong !. ';
               }
            } else {
               echo 'please fill all column to save data !';
            }
         }

         include_once './views/table-view.php';
      else :
         header('Location: index.php');
      endif;
   }
}
