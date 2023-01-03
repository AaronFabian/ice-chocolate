<style>
   ::-webkit-scrollbar {
      display: none;
   }

   @media only screen and (max-height: 760px) {
      .container-food-confirm {
         margin-top: 86px;
      }
   }

   @media only screen and (max-height: 670px) {
      .container-food-confirm {
         height: 520px;
      }

      #btnSendData {
         margin-top: 0px;
      }
   }

   @media only screen and (max-width: 495px) {
      .section-wrapper {
         width: 94%;
      }
   }

   @media only screen and (max-width: 440px) {
      #categoryMenu {
         font-size: 10px;
      }

      .category-item {
         padding-left: 4px;
      }

      .aside-wrapper {
         width: 100px;
      }

      .btnAdd {
         padding-left: 9px;
         font-size: 10px;
         height: 22px;
         width: 37px;
      }

      .notification-text {
         font-size: 10px;
      }
   }

   @media only screen and (max-width: 420px) {
      .item-container {
         width: 47%;
      }

      .food-img {
         width: 6.8rem;
      }
   }

   .shadow-deco {
      box-shadow: -1px 1px 2px black;
   }

   .button-add {
      box-shadow: 0 3px 1px 0px black;
      transition: 0.1s;
   }

   .button-add:active {
      transform: translateY(3px);
      box-shadow: 0 1px 0 0 black;
   }

   .selected-category {
      clip-path: polygon(90% 20%,
            100% 46%,
            90% 80%,
            90% 100%,
            0 100%,
            0 0,
            90% 0);
      background-color: #5e72e4;
      color: #fff;
   }

   .unselected-category {
      clip-path: polygon(90% 20%,
            90% 46%,
            90% 80%,
            90% 100%,
            0 100%,
            0 0,
            90% 0);

      background-color: #fff;
      color: #343a40;
   }

   .modal-menu {
      opacity: 0;
      visibility: hidden;
   }

   .active-modal-menu {
      opacity: 1;
      visibility: visible;
   }

   .visibility-hidden {
      opacity: 0;
      visibility: hidden;
   }

   .confirm-order {
      transform: translateX(130%);
   }

   .confirm-decoration {
      transform: translateX(100%);
   }

   .active-animate {
      transform: translateX(0);
   }

   .animate-pulse {
      animation: start-pulse 8s linear infinite;
   }

   .lockscreen-container {
      transition: 0.6s;
      clip-path: polygon(-1% -1%,
            0 100%,
            50% 100%,
            50% 0,
            50% 0,
            50% 100%,
            100% 100%,
            100% 0);
   }

   .active-client {
      clip-path: polygon(0% 0%,
            0% 100%,
            0 100%,
            0 0,
            100% 0,
            100% 100%,
            100% 100%,
            100% 0%);
   }

   @keyframes start-pulse {
      0% {
         transform: translate(0);
      }

      50% {
         opacity: 0;
      }

      100% {
         opacity: 1;
      }
   }
</style>
<!-- Start navbar -->
<nav class="fixed top-0 left-0 z-10 w-full h-20 bg-white drop-shadow-xl">
   <ul class="flex items-center h-full">
      <li class="ml-10 text-4xl font-medium">Logo</li>
      <li class="flex justify-end h-full ml-auto w-96">
         <div class="flex items-center justify-center border-gray_dark w-44">
            <p class="pr-2 font-medium text-center text-gray_dark notification-text">
               Welcome
            </p>
         </div>
         <div class="flex items-center border-gray_dark bg-main justify-center w-32 border-r-[1px]">
            <p class="pr-2 font-medium text-white table-number"><?= $tableNumber; ?></p>
            <img src="src/svg/user.svg" alt="" class="w-6" />
         </div>
         <div class="w-16 bg-main btn-toggle-modal">
            <img src="src/svg/bag.svg" alt="" class="block w-6 mx-auto translate-y-7" />
         </div>
      </li>
   </ul>
</nav>
<!-- End navbar -->

<!-- Start Content -->
<main class="w-screen h-fit bg-gray_dark" id="page">
   <section class="w-4/5 mx-auto section-wrapper">
      <div class="h-40"></div>
      <h1 class="pb-6 text-5xl font-medium text-center text-white main-title-category">
         <?= ucfirst($loadCategory[0]->getCategory()->getFoodCategory()); ?>
      </h1>
      <div class="text-center text-white opacity-80">
         <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Consequuntur tempore quo, esse cum deserunt natus architecto
            harum rerum libero autem.
         </p>
      </div>
      <div id="containerMenu" class="flex w-full gap-4 mt-10 justify-evenly">
         <aside class="w-40 h-[620px] aside-wrapper">
            <div class="sticky w-full m-1 text-sm h-fit top-24 drop-shadow-2xl" id="categoryMenu">
               <?php foreach ($loadCategory as $key => $category) :  ?>
                  <?php if ($key === 0) : ?>
                     <p class="py-2 pl-2 mb-1 font-medium duration-200 rounded-sm cursor-pointer shadow-deco selected-category category-item" data-category="<?= $category->getCategory()->getFoodCategory(); ?>">
                        <?= ucfirst($category->getCategory()->getFoodCategory()); ?>
                     </p>
                  <?php else : ?>
                     <p class="py-2 pl-2 mb-1 font-medium duration-200 rounded-sm cursor-pointer shadow-deco unselected-category category-item" data-category="<?= $category->getCategory()->getFoodCategory(); ?>">
                        <?= ucfirst($category->getCategory()->getFoodCategory()); ?>
                     </p>
                  <?php endif ?>
               <?php endforeach; ?>
               <!-- <p class="py-2 pl-2 mb-1 font-medium duration-200 rounded-sm cursor-pointer shadow-deco category-item unselected-category">
                  WESTERN FOOD
               </p> -->
            </div>
         </aside>
         <div class="h-fit max-w-md bg-[rgba(255,255,255,0.1)] w-[67%] rounded-sm pl-4 pt-4 pr-2 pb-4 flex flex-wrap gap-2 justify-start drop-shadow-2xl" id="containerFoodList">
            <!-- <div class="w-[23%] min-h-[8rem] bg-white rounded-lg">
               <img src="src/img/Mashed-Potatoes-thumb.png" alt="Mashed Potatoes" class="food-img" />
               <h3 class="text-[10px] text-center h-10 pt-2">
                  Mashed Potatoes
               </h3>
               <button type="button" data-food="Mashed Potatoes" class="block px-4 py-1 mx-auto mt-4 text-xs text-white rounded-lg btnAdd bg-main button-add">
                  Add
               </button>
            </div> -->

         </div>
      </div>
   </section>

   <footer class="relative flex justify-start w-full h-32 mt-32 bg-main">
      <div class="w-1/5 h-full font-medium bg-white logo">
         <p class="leading-10 text-center">LOGO</p>
      </div>
      <div class="w-3/5 h-full pt-2 font-medium bg-white logo">
         <ul class="flex flex-wrap justify-start gap-2 text-xs">
            <li class="w-48">TERMS & CONDITIONS</li>
            <li class="w-48">FEEDBACK</li>
            <li class="w-48">LOCATIONS</li>
            <li class="w-48">ACCESSIBILITY</li>
            <li class="w-48">GIFT CARDS</li>
            <li class="w-48">NUTRIONS</li>
            <li class="w-48">CONTACT US</li>
            <li class="w-48">CAREERS</li>
         </ul>
         <div></div>
      </div>
   </footer>
</main>
<!-- End Content -->

<!-- Start Lockscreen -->
<div class="fixed top-0 left-0 z-[998] w-screen h-screen bg-black lockscreen-container flex items-center justify-center duration-500">
   <div class="relative flex items-center justify-center w-full h-full bg-black lockscreen-content">
      <video autoplay muted loop plays-inline class="block w-full h-full bg-video">
         <source src="src/video/lockscreenAds.mp4" type="video/mp4" />
      </video>
      <div class="absolute top-0 left-0 w-full h-full bg-[rgba(0,0,0,0.6)] flex flex-col justify-center items-center welcome-screen">
         <div class="animate-pulse">
            <h4 class="font-bold text-white text-8xl">Welcome</h4>
            <p class="text-2xl text-center text-white">
               press anywhere to start order
            </p>
         </div>
      </div>
   </div>
</div>
<!-- End Lockscreen -->

<!-- Start Modal -->
<div class="fixed duration-200 top-0 right-0 z-[5] w-screen h-screen bg-[rgba(0,0,0,0.6)] modal-menu">
   <div class="flex h-screen ml-auto w-96">
      <div class="w-[83%] duration-500 bg-white h-full confirm-order">
         <div class="flex flex-wrap gap-2 p-2 mt-28 container-food-confirm h-[580px] overflow-y-auto">
            <!-- <div
                     class="relative w-[23%] h-[14rem] bg-gray rounded-lg item-order"
                     data-key="Garlic Dill New Potatoes"
                  >
                     <img
                        src="src/img/Menu_Nav-Image-Thumb_Side_GarlicDill.png"
                        alt="garlic"
                     />
                     <h3 class="text-[10px] text-center h-10 pt-2 text-white">
                        Garlic Dill New Potatoes
                     </h3>
                     <button
                        type="button"
                        data-command="add"
                        class="block px-4 py-1 mx-auto mt-4 text-xs font-extrabold text-white rounded-lg btnAdd bg-main button-add modal-btn"
                     >
                        +
                     </button>
                     <input
                        type="text"
                        value="1"
                        disabled
                        class="block w-6 mx-auto translate-y-2 food-quantity"
                     />
                     <button
                        type="button"
                        data-command="decrease"
                        class="block px-4 py-1 mx-auto mt-4 text-xs font-extrabold text-white rounded-lg btnAdd bg-main button-add modal-btn"
                     >
                        -
                     </button>
                     <button
                        type="button"
                        data-command="delete"
                        class="absolute top-0 right-0 w-4 h-4 text-xs font-bold text-white -translate-y-1/2 rounded-full translate-x- bg-danger modal-btn"
                     >
                        X
                     </button>
                  </div> -->
         </div>
         <div class="w-full h-full pt-2 mt-2 bg-gray_dark">
            <button class="block px-6 py-2 mx-auto mt-6 font-semibold text-white rounded-2xl bg-danger" id="btnSendData">
               Order !
            </button>
         </div>
      </div>
      <div class="w-[17%] duration-200 bg-main h-full confirm-decoration"></div>
   </div>
</div>
<!-- End Modal -->

<div class="fixed bottom-0 w-8 h-8 text-2xl font-bold text-center text-white translate-x-1/2 translate-y-1/2 rounded-full cursor-pointer btn-go-up right-1/2 bg-danger">
   <p class="leading-5">^</p>
</div>

<button class="fixed bottom-[3%] right-[3%] rounded-full w-14 h-14 bg-danger z-20 btn-toggle-modal">
   <img src="src/svg/list-menu.svg" alt="list menu" class="absolute w-8 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" />
</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js" integrity="sha512-6+YN/9o9BWrk6wSfGxQGpt3EUK6XeHi6yeHV+TYD2GR0Sj/cggRpXr1BrAQf0as6XslxomMUxXp2vIl+fv0QRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
   const loadJSON = <?= $loadJson ?>;
   console.log(loadJSON);
   const allMenu = loadJSON.data.allMenu;
   const loadmarkup = (foodName, imageSrc) => {
      return ` <div class="w-[23%] min-h-[10rem] bg-white rounded-lg item-container ">
                  <div class="h-[4.6rem] overflow-hidden" data-src="./src/img/uploads/${imageSrc}">
                     <img src="./src/img/uploads/${imageSrc}" alt="${foodName}" class="w-24 m-auto food-img" />
                  </div>
                  <h3 class="text-[10px] text-center h-10 pt-2">
                     ${foodName}
                  </h3>
                  <button type="button" data-food="${foodName}" class="block px-4 py-1 mx-auto mt-2 text-xs text-white rounded-lg btnAdd bg-main button-add" data-src="./src/img/uploads/${imageSrc}">
                     Add
                  </button>
               </div>
      `
   };
   const markupMap = new Map();
   for (let [key, value] of Object.entries(allMenu)) {
      let data = [];
      value.forEach(el => {
         const {
            foodName,
            image
         } = el;
         data.push(loadmarkup(foodName, image));
      })
      markupMap.set(key, data.join(' '));
   }
</script>

<script>
   const audio = {
      addSound: new Howl({
         src: 'src/music/add3.flac',
      }),
      decreaseSound: new Howl({
         src: 'src/music/decrease.wav',
      }),
      changeCategory: new Howl({
         src: 'src/music/add2.wav',
      }),
      complete: new Howl({
         src: 'src/music/completetask.mp3',
      }),
   };
</script>

<script>
   const lockscreenContainer = document.querySelector(
      '.lockscreen-container'
   );
   const welcomeScreen = document.querySelector('.welcome-screen');
   const modalMenu = document.querySelector('.modal-menu');
   const notificationText = document.querySelector('.notification-text');
   const btnToggleModal = document.querySelectorAll('.btn-toggle-modal');
   const btnGoUp = document.querySelector('.btn-go-up');
   const confirmOrder = document.querySelector('.confirm-order');
   const confirmDecoration = document.querySelector(
      '.confirm-decoration'
   );
   const mainTitleCategory = document.querySelector(
      '.main-title-category'
   );
   const containerFoodList = document.getElementById('containerFoodList');
   const containerFoodModal = document.querySelector(
      '.container-food-confirm'
   );
   const btnSendData = document.getElementById('btnSendData');
   const categoryMenu = document.getElementById('categoryMenu');
   const categoriesEl = document.querySelectorAll('.category-item');

   const table = document.querySelector('.table-number').innerText;
   let orderedMenu = {}; // { key => value }

   /////////////////////////////
   const markupHelper = function(foodName, imageSrc) {
      return `
            <div
               class="relative duration-500 w-[23%] h-[14rem] bg-gray rounded-lg item-order"
               data-key="${foodName}"
            >
               <img
                  src="${imageSrc}"
                  alt="garlic"
               />
               <h3 class="text-[10px] text-center h-10 pt-2 text-white">
                  ${foodName}
               </h3>
               <button
                  type="button"
                  data-command="add"
                  class="block px-4 py-1 mx-auto mt-4 text-xs font-extrabold text-white rounded-lg btnAdd bg-main button-add modal-btn"
               >
                  +
               </button>
               <input
                  type="text"
                  value="1"
                  disabled
                  class="block w-6 mx-auto translate-y-2 food-quantity"
               />
               <button
                  type="button"
                  data-command="decrease"
                  class="block px-4 py-1 mx-auto mt-4 text-xs font-extrabold text-white rounded-lg btnAdd bg-main button-add modal-btn"
               >
                  -
               </button>
               <button
                  type="button"
                  data-command="delete"
                  class="absolute top-0 right-0 w-4 h-4 text-xs font-bold text-white -translate-y-1/2 rounded-full translate-x- bg-danger modal-btn"
               >
                  X
               </button>
            </div>
            `;
   };

   ///////////////////////////////
   // Event Listener
   categoryMenu.addEventListener('click', function(el) {
      const selected = el.target.closest('.category-item');
      if (!selected) return;
      const category = selected.dataset.category

      categoriesEl.forEach(el => {
         el.classList.remove('selected-category');
         el.classList.add('unselected-category');
      });

      containerFoodList.innerHTML = '';
      containerFoodList.insertAdjacentHTML('beforeend', markupMap.get(category));

      selected.classList.remove('unselected-category');
      selected.classList.add('selected-category');
      mainTitleCategory.innerText = selected.innerText;
      audio.changeCategory.play();
   });

   containerFoodList.addEventListener('click', function(el) {
      const btnAdd = el.target.closest('.button-add');
      if (!btnAdd) return;

      const food = btnAdd.dataset.food;

      if (food in orderedMenu) {
         orderedMenu[food]++;
         const elementToIncrease = document.querySelector(
            `.item-order[data-key="${food}"]`
         );
         elementToIncrease.querySelector('.food-quantity').value++;
      } else {
         orderedMenu[food] = 1;
         const imgSrc = btnAdd.dataset.src;

         containerFoodModal.insertAdjacentHTML(
            'beforeend',
            markupHelper(food, imgSrc)
         );
      }
      audio.addSound.play();

      console.log(orderedMenu);
   });

   containerFoodModal.addEventListener('click', function(el) {
      const selected = el.target.closest('.item-order'); // container
      const btnCommand = el.target.closest('.modal-btn');

      if (!selected || !btnCommand) return;

      const inpSelectedEl = selected.querySelector('.food-quantity');

      const command = btnCommand.dataset.command;
      const key = selected.dataset.key;

      if (command === 'decrease' && inpSelectedEl.value > 0) {
         inpSelectedEl.value--;
         orderedMenu[key]--;
         if (orderedMenu[key] === 0) {
            delete orderedMenu[key];
            selected.classList.add('visibility-hidden');
            setTimeout(() => {
               selected.remove();
            }, 500);
         }
         audio.decreaseSound.play();
      } else if (command === 'add') {
         orderedMenu[selected.dataset.key]++;
         inpSelectedEl.value++;
         audio.addSound.play();
      } else if (command === 'delete') {
         delete orderedMenu[selected.dataset.key];
         selected.classList.add('visibility-hidden');
         setTimeout(() => {
            selected.remove();
         }, 500);
      }

      console.log(orderedMenu);
   });

   btnSendData.addEventListener('click', function() {
      if (Object.keys(orderedMenu).length === 0) return;

      const readyToSendData = JSON.stringify({
         request: 'request-client-sendfood',
         data: {
            seat: table,
            menuList: orderedMenu,
         },
      });

      modalMenu.classList.remove('active-modal-menu');
      confirmDecoration.classList.remove('active-animate');
      confirmOrder.classList.remove('active-animate');
      containerFoodModal.innerHTML = '';
      notificationText.innerText = 'Thank You for your order ! food is coming :)';
      setTimeout(() => {
         notificationText.innerText = 'Welcome';
      }, 10000);

      orderedMenu = {};

      console.log(readyToSendData);
      audio.complete.play();
   });

   btnToggleModal.forEach(
      el =>
      (el.onclick = () => {
         modalMenu.classList.toggle('active-modal-menu');
         confirmDecoration.classList.toggle('active-animate');
         confirmOrder.classList.toggle('active-animate');
      })
   );

   btnGoUp.onclick = () =>
      window.scrollTo({
         top: 0,
         behavior: 'smooth'
      });

   // delete soon in production
   welcomeScreen.onclick = () => {
      lockscreenContainer.classList.add('active-client');
   };
</script>