<style>
   .editor-modal {
      display: flex;
      visibility: hidden;
      opacity: 0;
      transition: .2s;
   }

   .active {
      visibility: visible;
      opacity: 1;
   }

   .category-modal {
      opacity: 0;
      visibility: hidden;
      transition: .3s;
   }

   .active-add-category {
      opacity: 1;
      visibility: visible;
   }
</style>
<div class="w-full xl:w-3/4 2xl:w-4/5">
   <div class="px-4 py-4 md:px-10 md:py-7">
      <div class="items-center justify-between sm:flex">
         <p tabindex="0" class="text-base font-bold leading-normal text-main focus:outline-none sm:text-lg md:text-xl lg:text-2xl ">Food Editor</p>
         <div class="mt-4 sm:mt-0">
            <label for="categories" class="block mb-2 text-sm font-medium text-main">Select an option</label>
            <select id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-main focus:ring-blue-500 focus:border-blue-500 border-main">
               <option value="">Category</option>
               <?php foreach ($categories as $c) : ?>
                  <option <?= (isset($_GET['category']) and $c->getCategory()->getFoodCategory() === $_GET['category']) ? 'selected' : '' ?> value="<?= $c->getCategory()->getfoodCategory(); ?>"><?= $c->getCategory()->getfoodCategory(); ?></option>
               <?php endforeach; ?>
            </select>
         </div>
      </div>
   </div>
   <div class="px-4 pb-5 bg-white dark:bg-gray-900 md:px-10">
      <div class="overflow-x-auto">
         <table class="w-full whitespace-nowrap">
            <tbody class="tbody-food-list">
               <?php foreach ($defaultFoodList as $d) : ?>
                  <tr tabindex="0" class="h-16 text-sm leading-none text-gray-600 focus:outline-none dark:text-gray-200" data-description="<?= $d->getDescription(); ?>" data-image-src="<?= $d->getImage(); ?>">
                     <td class="w-1/2">
                        <div class="flex items-center">
                           <?php if ($d->getImageThumb()) : ?>
                              <img src="<?= $d->getImageThumb(); ?>" alt="no image" class="w-8 rounded-sm image-thumb">
                           <?php else : ?>
                              <img src="src/img/uploads/<?= $d->getImage() ? $d->getImage() : 'default-food.png' ?>" alt="no image" class="w-8 rounded-sm image-thumb">
                           <?php endif; ?>
                           <div class="pl-2">
                              <p class="text-sm font-medium leading-none text-gray foodName"><?= $d->getFoodName(); ?></p>
                              <p class="mt-2 text-xs leading-3 text-gray-600 dark:text-gray-200 foodPrice"><?= $d->getPrice(); ?> 円</p>
                           </div>
                        </div>
                     </td>
                     <td class="pl-16">
                        <p class="foodCategory"><?= $d->getCategory()->getfoodCategory(); ?></p>
                     </td>
                     <td>
                        <?php
                        $tanggal = date_create($d->getAddedAt());
                        $format = date_format($tanggal, "d M Y");
                        ?>
                        <p class="pl-16">Shared on <?= $format; ?></p>
                     </td>
                  </tr>
               <?php endforeach; ?>

            </tbody>
         </table>
      </div>
   </div>
</div>

<!-- Pagination -->
<div class="">
   <div class="flex w-48 py-2 mx-auto mb-2 border rounded-2xl border-blue bg-main justify-evenly h-fit">
      <?php if ($pagenow > 1) : ?>
         <a class="w-8 h-8 font-medium text-center text-white rounded-full bg-main leading-[30px]" href="?menu=food-view&staff=<?= $_SESSION['worker-id'] ?>&page=<?= $pagenow - 1; ?>">
            < <a>
               <a class="w-8 h-8 font-medium text-center text-white rounded-full bg-main leading-[30px]" href="?menu=food-view&staff=<?= $_SESSION['worker-id'] ?>&page=<?= $pagenow - 1; ?>">
                  <?= $pagenow - 1; ?>
               </a>
            <?php endif; ?>
            <p class="w-8 h-8 font-medium text-center text-white rounded-full bg-warning leading-[30px]">
               <?= $pagenow; ?>
            </p>
            <?php if ($dataTotal >= 5) : ?>
               <a class="w-8 h-8 font-medium text-center text-white rounded-full bg-main leading-[30px]" href="?menu=food-view&staff=<?= $_SESSION['worker-id'] ?>&page=<?= $pagenow + 1; ?>">
                  <?= $pagenow + 1; ?>
               </a>
               <a class="w-8 h-8 font-medium text-center text-white rounded-full bg-main leading-[30px]" href="?menu=food-view&staff=<?= $_SESSION['worker-id'] ?>&page=<?= $pagenow + 1; ?>">
                  >
               </a>
            <?php endif; ?>
   </div>
   <div>
      <button class="block px-4 py-2 mx-auto font-bold text-white border border-blue-500 rounded bg-main hover:bg-blue" id="addNewFood">
         Add new food
      </button>
      <button name="btnAddCategory" class="block px-4 py-2 mx-auto my-2 font-bold text-white border border-blue-500 rounded bg-danger hover:bg-orange" id="btnAddCategory">
         New category
      </button>
   </div>

</div>




<!-- Main modal -->
<form action="" method="POST" enctype="multipart/form-data">
   <div class="fixed top-0 left-0 right-0 z-50 items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full editor-modal">
      <div class="relative w-full h-full max-w-2xl border rounded-lg md:h-auto border-main">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
               <h3 class="text-xl font-semibold text-main ">
                  Edit food :
               </h3>
               <div class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                  <img src="./src/svg/icon-close-food-editor.svg" alt="icon close food editor" class="w-5 h-5 close-editor">
                  <span class="sr-only">Close modal</span>
               </div>
            </div>
            <!-- Modal body -->
            <div class="p-6  overflow-y-auto h-[476px] relative">
               <!-- This is an example component -->
               <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                  <!-- Photo File Input -->
                  <input type="file" class="hidden">
                  <label class="block mb-2 text-sm font-bold text-center text-gray-700" for="photo">
                     Food photo <span class="text-red-600"> </span>
                  </label>

                  <div class="text-center">
                     <label for="inpImage" class="block mx-auto mb-2 rounded-lg shadow-sm label-for-edit drop-shadow-lg border-radius-lg profile-img" style="background-size: cover;height: 130px;width: 150px;cursor: pointer;"></label>
                     <input type="file" class="input-profile-img" id="inpImage" name="inpImage" accept="image/png, image/jpeg" hidden>
                  </div>
               </div>
               <div class="relative">
                  <input type="text" id="inpFoodName" class="block pr-2.5 pb-2.5 pt-4 text-lg text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none text-gray_dark focus:outline-none focus:ring-0 focus:border-blue-600 peer mr-auto w-3/4" value="" placeholder=" " name="inpFoodName" />
                  <label for="inpFoodName" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] bg-transparent pr-2 peer-focus:pr-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2">Food name&nbsp;</label>
                  <input type="hidden" id="hiddenInpFoodName" name="oldName">
                  <input type="hidden" id="hiddenInpFileImage" name="oldImage">
               </div>
               <div class="relative">
                  <input type="text" id="inpPrice" class="block pr-2.5 pb-2.5 pt-4 text-lg text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none text-gray_dark focus:outline-none focus:ring-0 focus:border-blue-600 peer mr-auto w-3/4" value="" placeholder=" " name="inpPrice" />
                  <label for="inpprice" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] bg-transparent pr-2 peer-focus:pr-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2">Price&nbsp;</label>
               </div>

               <div class="relative">
                  <select id="inpcategory" name="inpCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray_dark  focus:ring-blue-500 focus:border-blue-500 border-gray_dark my-2">
                     <option value="">Category</option>
                     <?php foreach ($fetchAllCategories as $c) : ?>
                        <option value="<?= $c->getfoodCategory(); ?>"><?= $c->getfoodCategory(); ?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

               <label for="inpDescription" class="block mt-6 mb-2 text-sm font-medium text-gray-900 dark:text-gray_dark">Desc&nbsp;:</label>
               <textarea id="inpDescription" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray_dark dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." name="inpDescription"></textarea>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 border-gray-600 rounded-b">
               <button data-modal-toggle="defaultModal" type="submit" class="text-main border border-main bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800" name="btnSave" id="btnSubmit">Save changes</button>
               <button data-modal-toggle="defaultModal" type="button" class="text-danger bg-white hover:bg-gray-100 focus:ring-4 active:outline-none active:ring-blue-300 rounded-lg border border-danger text-sm font-medium px-5 py-2.5 hover:text-gray-900 active:z-10 bg-gray-700 text-gray-300 border-gray-500 hover:text-white hover:bg-gray-600 active:ring-gray-600" id="btnCancel">Cancel</button>
            </div>
         </div>
      </div>
   </div>
</form>

<!-- Second modal -->
<div class="relative z-10 category-modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
   <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"

      .active-add-category {
         opacity: 100;
      }
  -->
   <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

   <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
         <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
         <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg">
            <form action="" method="POST">
               <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                  <div class="sm:flex sm:items-start">
                     <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation-triangle -->
                        <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                        </svg>
                     </div>
                     <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Add new category</h3>
                        <div class="relative my-4">
                           <input type="text" id="inpCategory" class="block pr-2.5 pb-2.5 pt-4 text-lg text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none text-gray_dark focus:outline-none focus:ring-0 focus:border-blue-600 peer mr-auto w-3/4" value="input..." placeholder=" " name="inpCategory" />
                           <label for="inpCategory" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] bg-transparent pr-2 peer-focus:pr-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2">Category&nbsp;</label>
                        </div>
                        <div class="mt-2">
                           <p class="text-sm text-gray-500">(caution : new category may cause system crash make sure you understand the system. )</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="px-4 py-3 bg-gray-50 sm:flex sm:flex-row-reverse sm:px-6">
                  <button type="submit" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm" name="btnSave" value="category">Add new !</button>
                  <button type="button" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm cancel-add-category-btn">Cancel</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End second modal -->
<a href="index.php" class="fixed rounded-full bottom-3 right-3 w-14 h-14 bg-danger">
   <img src="./src/svg/home.svg" alt="home button" class="absolute w-8 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
</a>
<script>
   const tbodyFoodList = document.querySelector('.tbody-food-list');
   const editorModal = document.querySelector('.editor-modal');
   const categoryModal = document.querySelector('.category-modal');
   const closeEditor = document.querySelector('.close-editor');
   const labelImage = document.querySelector('.profile-img');
   const inpImage = document.querySelector('.input-profile-img');
   const inpCategoriesForEvent = document.getElementById('categories');
   const hiddenInpFoodName = document.getElementById('hiddenInpFoodName');
   const inpFoodName = document.getElementById('inpFoodName');
   const inpPrice = document.getElementById('inpPrice');
   const inpCategory = document.getElementById('inpCategory');
   const inpDescription = document.getElementById('inpDescription');
   const labelForEdit = document.querySelector('.label-for-edit');
   const btnAddCategory = document.getElementById('btnAddCategory');
   const btnCancelAddCategory = document.querySelector('.cancel-add-category-btn');
   const btnCancel = document.getElementById('btnCancel');
   const btnAddNewFood = document.getElementById('addNewFood');
   const btnSubmit = document.getElementById('btnSubmit');

   const handleAutoForm = function(e) {
      const selected = e.target.closest('tr');
      if (!selected) return

      const foodName = selected.querySelector('.foodName').innerText;
      const foodPrice = selected.querySelector('.foodPrice').innerText.replace('円', '');
      const foodCategory = selected.querySelector('.foodCategory').innerText;
      const imgThumb = selected.querySelector('.image-thumb');

      const {
         description,
         imageSrc
      } = selected.dataset;

      inpFoodName.value = foodName;
      hiddenInpFoodName.value = foodName;
      inpPrice.value = foodPrice;
      inpCategory.value = foodCategory;
      labelForEdit.style.backgroundImage = `url("${imgThumb.src }")`;
      inpDescription.value = description || 'no description yet.';
      btnSubmit.innerText = 'Save changes';
      btnSubmit.value = 'save';

      editorModal.classList.add('active');
   }

   const handleLiveImageChange = function(el) {
      const changedValue = el.target.value;

      if (inpImage.files[0]?.size > 1024 * 2048) return alert('file sizes warning ! exceeded 2MB');

      let reader = new FileReader();
      reader.readAsDataURL(inpImage.files[0]);
      reader.onload = () => labelImage.style.backgroundImage = `url("${reader.result}")`;
   }

   const handleCategory = function(el) {
      const selected = el.target;
      document.location.href = `?menu=food-view&staff=<?= $_SESSION['worker-id'] ?>&category=${selected.value}`;
   }

   const handleBlankForm = function(el) {
      [inpFoodName, hiddenInpFoodName, inpPrice, inpDescription].forEach(el => el.value = '');
      labelForEdit.style.backgroundImage = `url("src/img/uploads/default-food.png")`;
      btnSubmit.innerText = 'Add menu !';
      btnSubmit.value = 'add';

      editorModal.classList.add('active');
   }

   const handleCategoryForm = function(el) {
      categoryModal.classList.add('active-add-category');
   }

   inpCategoriesForEvent.addEventListener('change', handleCategory);
   inpImage.addEventListener('change', handleLiveImageChange);
   tbodyFoodList.addEventListener('click', handleAutoForm);
   btnAddNewFood.addEventListener('click', handleBlankForm);
   btnAddCategory.addEventListener('click', handleCategoryForm);

   closeEditor.onclick = () => editorModal.classList.remove('active');
   btnCancel.onclick = () => editorModal.classList.remove('active');
   btnCancelAddCategory.onclick = () => categoryModal.classList.remove('active-add-category');
</script>