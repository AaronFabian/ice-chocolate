<style>
   .parent {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(5, 1fr);
      grid-column-gap: 8px;
      grid-row-gap: 8px;
   }

   .div1 {
      grid-area: 1 / 1 / 3 / 2;
   }

   .div2 {
      grid-area: 1 / 2 / 2 / 4;
   }

   .div3 {
      grid-area: 2 / 2 / 3 / 4;
   }

   .div4 {
      grid-area: 3 / 1 / 4 / 4;
   }

   .div5 {
      grid-area: 4 / 1 / 5 / 4;
   }

   /* <!-- top-1/2 z-10 left-1/2  -translate-x-1/2 -translate-y-1/2 --> */
   .editor-container.active {
      left: 50%;
      top: 50%;
      /* transform: translateX(0); */
   }

   /* top-0
-left-full */

   .icon-animate:hover>img {
      animation: spin-hover 4.8s linear infinite;
   }

   @keyframes spin-hover {
      0% {
         transform: rotateY(0);
      }

      50% {
         transform: rotateY(360deg);
      }

      100% {
         transform: rotateY(0);
      }
   }
</style>
<main class="flex items-center w-full h-screen bg-gradient-to-br from-gradient_one to-gradient_two">
   <div class="w-10/12 pt-4 mx-auto text-2xl font-medium bg-white h-fit rounded-2xl drop-shadow-2xl max-w-[720px] fields-select">
      <h1 class="text-center text-gray_dark">Select to edit field</h1>
      <div class="flex flex-wrap justify-center w-11/12 gap-1 pb-4 mx-auto mt-2 group field-item">
         <div class="w-[48%] h-32 max-w-[160px] rounded-lg bg-purple hover:opacity-80 hover:cursor-pointer icon-animate" id="inpStaff">
            <img src="src/svg/group.svg" alt="group staff icon" class="w-20 pt-1 mx-auto" />
            <h3 class="pb-4 mx-auto text-center text-white">
               Staff list
            </h3>
         </div>
         <a href="?menu=food-view&staff=<?= $_SESSION['worker-id']; ?>" class="w-[48%] h-32 max-w-[160px] rounded-lg bg-orange hover:opacity-80 hover:cursor-pointer icon-animate" id="inpFood">
            <img src="src/svg/shopping-bag.svg" alt="food list icon" class="w-20 pt-1 mx-auto" />
            <h3 class="pb-4 mx-auto text-center text-white">Food List</h3>
         </a>
         <a href="?menu=table-view&staff=<?= $_SESSION['worker-id']; ?>" class="w-[48%] max-w-[160px] h-32 rounded-lg bg-danger hover:opacity-80 hover:cursor-pointer icon-animate" id="inpTable">
            <img src="src/svg/table-row.svg" alt="food list icon" class="w-20 pt-1 mx-auto" />
            <h3 class="pb-4 mx-auto text-center text-white">Table Row</h3>
         </a>
         <div class="w-[48%] max-w-[160px] h-32 rounded-lg bg-success hover:opacity-80 hover:cursor-pointer icon-animate" id="inpPrinter">
            <img src="src/svg/printer.svg" alt="food list icon" class="w-20 pt-1 mx-auto" />
            <h3 class="pb-4 mx-auto text-center text-white">Printer</h3>
         </div>
         <a class="w-[48%] max-w-[160px] h-32 rounded-lg bg-gray_dark hover:opacity-80 hover:cursor-pointer icon-animate" href="index.php">
            <img src="src/svg/return.svg" alt="food list icon" class="w-20 pt-1 mx-auto" />
            <h3 class="pb-4 mx-auto text-center text-white">Return</h3>
         </a>
      </div>
   </div>
   <section class="absolute w-11/12 -translate-x-1/2 -translate-y-1/2 bg-white rounded-2xl top-1/2 z-10 -left-full h-[94%] editor-container max-w-[720px] duration-300">
      <div class="absolute top-0 right-0 z-10 w-10 h-10 text-2xl font-medium text-center text-white rounded-full bg-danger close-editor">
         <p>x</p>
      </div>
      <div class="flex flex-wrap items-center justify-around w-full h-full wrapper-staff-list">
         <section class="w-11/12 h-[94%] bg-main rounded-2xl">
            <h2 class="py-1 text-2xl font-medium text-center text-white">
               All staff list
            </h2>
            <div class="h-[76%] mx-auto mt-2 list-staff-container flex flex-col gap-2 overflow-y-scroll py-1 mb-2">
               <?php foreach ($workerList as $w) : ?>
                  <a id="staff-item" class="flex hover:opacity-90 w-11/12 h-10 mx-auto text-[18px] bg-white rounded-bl-2xl rounded-tr-2xl rounded-tl-md hover:cursor-pointer rounded-br-md text-white leading-9" href="?menu=setting-view&staff=<?= $w->getWorkerID(); ?>">
                     <span class="w-[16%] text-center bg-warning rounded-tl-md rounded-bl-2xl">
                        <?= $w->getWorkerID(); ?>
                     </span>
                     <span class="w-[84%] text-center bg-success rounded-tr-2xl rounded-br-md">
                        <?= $w->getName(); ?>
                     </span>
                  </a>
               <?php endforeach; ?>
            </div>
            <div class="relative flex items-center justify-center w-11/12 h-12 mx-auto overflow-hidden text-xl bg-white div2 rounded-2xl">
               <input type="text" id="floating_outlined" class="block px-2.5 pb-2.5 pt-4 text-lg text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none text-gray_dark focus:outline-none focus:ring-0 focus:border-blue-600 peer mr-auto w-3/4" value="" placeholder=" " />
               <label for="floating_outlined" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-2 scale-75 top-2 z-10 origin-[0] bg-transparent px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-2 left-1">Search name...</label>
               <div class="w-1/4 h-14 bg-danger">
                  <img class="scale-50 -translate-y-2" src="src/svg/search.svg" alt="search button" />
               </div>
            </div>
         </section>
      </div>
   </section>
   <!-- <section></section>
         <section></section> -->
</main>
<script>
   const fieldsSelect = document.querySelector('.fields-select');
   const editorContainer = document.querySelector('.editor-container');
   const btnCloseEditor = document.querySelector('.close-editor');

   fieldsSelect.addEventListener('click', function(e) {
      const element = e.target.closest('.icon-animate');
      if (!element) return;

      switch (element.id) {
         case 'inpStaff':
            editorContainer.classList.add('active');
            break;
         case 'inpFood':
            break;
         case 'inpTable':
            break;
         case 'inpPrinter':
            break;
      }
   });

   btnCloseEditor.onclick = () => {
      editorContainer.classList.remove('active');
   };
</script>