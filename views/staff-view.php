      <style>
         .active-menu {
            clip-path: polygon(0 -1%, 100% -1%, 100% 100%, 0% 100%) !important;
         }

         .unactive-menu {
            clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
            transition: .2s;
         }

         .active-selected {
            background-color: rgba(255, 252, 127, 0.4);
            font-style: italic;
            border-radius: 6px;
         }

         th {
            text-align: left;
            padding-right: 110px;
         }

         tbody {
            display: block;
            height: 30px;
         }

         tr {
            display: block;
         }

         td {
            display: inline;
         }

         .modal-input-menu {
            opacity: 0;
            visibility: hidden;
            transition: 0.75s;
         }

         .modal-input-menu.active {
            opacity: 1;
            visibility: visible;
         }

         .blurry-bg {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.63),
                  rgba(0, 0, 0, 0.623)),
               url(img/000333.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: 10;
         }

         .wrapper-deco {
            height: 6rem;
            transition: 0.1s;
         }

         .wrapper-deco.active {
            height: 21.2rem;
         }

         ::-webkit-scrollbar {
            display: none;
         }

         .categories-container {
            height: 2.6rem;
            transition: 0.1s;
         }

         .categories-container.active {
            height: fit-content;
         }

         .opening-animate {
            animation: open 1.6s linear 2.4s forwards;
         }

         .logo-animate {
            animation: logo-open 1s linear forwards;
         }

         .text-animate {
            animation: text-welcome 0.5s linear 1.2s forwards;
         }

         .animate-success-adding {
            animation: animate-success-adding 1.2s;
         }

         @keyframes animate-success-adding {
            0% {
               margin-top: 0;
            }

            50% {
               margin-top: -10px;
            }

            100% {
               margin-top: 0;
            }
         }

         /* -translate-y-[2px] translate-x-[12px] */

         @keyframes open {
            0% {
               clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
            }

            100% {
               clip-path: polygon(0 100%, 100% 100%, 100% 100%, 0% 100%);
               visibility: hidden;
            }
         }

         @keyframes logo-open {
            0% {
               width: 192px;
               height: 192px;
               opacity: 0;
            }

            50% {
               opacity: 100%;
            }

            100% {
               width: 144px;
               height: 144px;
               opacity: 100%;
            }
         }

         @keyframes text-welcome {
            0% {
               transform: translateY(-100%);
            }

            100% {
               transform: translateY(0);
            }
         }

         /* 192px */
         /* 144 px */
      </style>
      <!-- <div class="absolute top-0 left-0 z-[998] w-screen h-screen opening-animate bg-main">
         <div class="absolute z-[999] -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
            <div class="w-48 h-48 rounded-full opacity-0 bg-secondary drop-shadow-xl logo-animate">
               <img class="relative w-2/3 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" src="src/svg/eat.svg" alt="company logo" />
            </div>
            <div class="overflow-hidden">
               <p class="text-3xl font-medium text-center text-white -translate-y-full text-animate">
                  Welcome
               </p>
            </div>
         </div>
      </div> -->

      <main class="w-screen h-screen main-content">
         <div class="w-full h-full overflow-hidden duration1000 bg-gray_dark">
            <nav class="relative w-4/5 px-2 pt-4 pb-8 mx-auto text-base translate-y-3 bg-white h-28 rounded-2xl">
               <ul class="relative">
                  <li class="font-semibold text-gray_dark">
                     Name :
                     <span class="font-medium text-main"><?= $_SESSION['name']; ?></span>
                  </li>
                  <li class="font-medium text-gray_dark">
                     <h3>
                        Staff number :
                        <span class="font-bold text-success staff-id"><?= $_SESSION['worker-id']; ?></span>
                     </h3>
                  </li>
                  <li class="font-medium text-gray_dark">
                     <h3>
                        Seat selected :
                        <span class="font-bold text-warning" id="seatNumber">-</span>
                     </h3>
                  </li>
                  <li class="absolute top-0 rounded-full right-2 w-14 bg-success h-14">
                     <img src="src/svg/user.svg" alt="staff icon" class="relative w-10 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" />
                  </li>
               </ul>
            </nav>
            <div class="relative overflow-visible duration-300 slide-container">
               <section class="page-1">
                  <form>
                     <div class="w-4/5 pb-4 pl-2 mx-auto mt-8 bg-white h-fit rounded-2xl ">
                        <fieldset>
                           <label class="block">
                              <span class="block mt-4 text-lg font-medium text-gray_dark">Customer table number :
                              </span>
                              <input class="py-2 px-[2px] text-2xl border-2 border-main placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500 w-[96%]" id="inpTable" />
                           </label>

                           <input id="new-seat" class="peer/draft" type="radio" name="status" value="new" />
                           <label for="new-seat" class="peer-checked/draft:text-main">New table</label>

                           <input id="Addition" class="peer/published" type="radio" name="status" value="add" checked />
                           <label for="Addition" class="peer-checked/published:text-main">Addition</label>

                           <div class="hidden text-orange peer-checked/draft:block">
                              New Customer Seat
                           </div>
                           <div class="hidden peer-checked/published:block text-orange">
                              <strong>warning</strong> : input table
                              number before next slide.
                           </div>
                        </fieldset>
                        <label for="floorMap" class="">Floor</label>
                        <select id="floorMap" name="floorMap" class="h-12 py-0 pl-2 text-gray-500 bg-transparent border-transparent rounded-md pr-7 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                     </div>
                  </form>
                  <section>
                     <!-- <div class="grid grid-cols-3 grid-rows-4 gap-1 px-8 mt-8 text-5xl font-semibold keypad-grid text-gray_dark group hover:cursor-pointer">
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning rounded-tl-2xl active:text-pink hover:text-white active:translate-y-1">
                           7
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning active:text-pink hover:text-white active:translate-y-1">
                           8
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning rounded-tr-2xl active:text-pink hover:text-white active:translate-y-1">
                           9
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning active:text-pink hover:text-white active:translate-y-1">
                           4
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning active:text-pink hover:text-white active:translate-y-1">
                           5
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning active:text-pink hover:text-white active:translate-y-1">
                           6
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning active:text-pink hover:text-white active:translate-y-1">
                           1
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning active:text-pink hover:text-white active:translate-y-1">
                           2
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-warning active:text-pink hover:text-white active:translate-y-1">
                           3
                        </div>
                        <div class="flex items-center justify-center w-full h-16 duration-75 bg-danger rounded-bl-2xl active:text-pink hover:text-white active:translate-y-1">
                           del
                        </div>
                        <button id="nextBtn" class="flex items-center justify-center w-full h-16 col-span-2 text-center duration-75 bg-main rounded-br-2xl active:text-pink hover:text-white active:translate-y-1">
                           Next
                        </button>
                     </div> -->
                     <div class="relative w-4/5 p-2 mx-auto mt-2 bg-white h-fit container-table-layout rounded-2xl keypad-table">
                        <div class="overflow-y-auto text-center max-h-[12rem]" id="tableBody">
                           <!-- <ul class="mx-auto text-lg font-medium text-white w-fit">
                              <li class="inline-block p-1 border rounded-lg bg-gray" data-table="101">101</li>
                              <li class="inline-block p-1 border rounded-lg bg-main" data-table="102">102</li>
                              <li class="inline-block p-1 border rounded-lg bg-main" data-table="103">103</li>
                           </ul> -->
                        </div>
                        <button class="block px-16 py-1 m-auto mt-2 font-medium text-white rounded-2xl bg-warning item-table" data-table="next">Next</button>
                     </div>
                  </section>
               </section>
               <section class="absolute top-0 right-0 translate-x-full page-2">
                  <div class="w-screen h-fit">
                     <div class="w-4/5 h-24 px-2 pt-2 m-auto bg-white rounded-2xl">
                        <label class="block mb-2 text-lg font-medium tracking-wide text-gray-700" for="inpOptions">
                           Options
                        </label>
                        <div class="relative">
                           <select class="block w-full px-4 py-2 pr-8 leading-tight bg-gray-200 border border-gray-200 rounded appearance-none text-gray_dark focus:outline-main focus:bg-white focus:border-gray-500" id="inpOptions">
                              <option selected value="menu">Menu</option>
                              <option value="confirm">Confirm</option>
                              <option value="tableCheck">Table Check</option>
                              <option value="payment">Payment</option>
                              <option value="restart">restart</option>
                           </select>
                           <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                              <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                 <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="w-4/5 m-auto mt-4 bg-white h-[23rem] rounded-2xl relative option-screen ">
                        <div class="relative  h-[24rem] z-10 unactive-menu active-menu">
                           <div class="absolute top-0 z-10 w-11/12 mx-auto -translate-x-1/2 translate-y-4 left-1/2 bg-main rounded-2xl wrapper-deco">
                              <!-- 6rem -->
                              <!-- 21.2rem -->
                              <p class="pt-2 text-2xl font-medium text-center duration-75 categories text-gray_dark select-menu active:text-white hover:opacity-80">
                                 Select Menu
                              </p>
                              <hr class="w-4/5 mx-auto" />

                              <div class="pt-1 my-2 overflow-auto text-2xl font-medium text-center text-white categories-container group hover:opacity-80">
                                 <!-- 2.6rem -->
                                 <?php foreach ($category as $c) : ?>
                                    <p class="w-4/5 m-auto menu-item active:text-orange hover:cursor-pointer hover:opacity-80" data-menu="<?= $c->getCategory()->getfoodCategory(); ?>">
                                       <?= $c->getCategory()->getfoodCategory(); ?>
                                    </p>
                                 <?php endforeach ?>
                                 <!-- <p class="w-4/5 py-2 m-auto menu-item active:text-orange hover:cursor-pointer hover:opacity-80" data-menu="Chinese food">
                                 Chinese food
                              </p> -->
                              </div>
                           </div>
                           <div class="w-11/12 h-[13.9rem] mx-auto text-center translate-y-32 rounded-2xl">
                              <div class="overflow-auto font-semibold translate-y-2 border rounded-tl-2xl rounded-tr-2xl border-main h-[8.8rem] text-gray_dark screen-foods-list">
                                 <?php foreach ($defaultMenu as $d) : ?>
                                    <p class="py-1" data-food="<?= $d->getFoodName(); ?>">
                                       <?= $d->getFoodName(); ?>
                                    </p>
                                 <?php endforeach; ?>
                              </div>
                              <div class="absolute bottom-0 left-0 flex items-center w-full h-16 text-5xl bg-main rounded-bl-2xl rounded-br-2xl justify-evenly">
                                 <button class="w-20 duration-75 h-14 bg-danger rounded-2xl active:translate-y-1" id="btnBackToPage1">
                                    <img src="src/svg/back.svg" alt="" class="w-14 -translate-y-[3px] translate-x-[10px]" />
                                 </button>
                                 <button class="w-20 duration-75 h-14 bg-warning rounded-2xl active:translate-y-1" id="btnCheck">
                                    <img src="src/svg/hamburger-menu.svg" alt="hamburger menu" class="w-14 -translate-y-[2px] translate-x-[12px] svg-ordered-list" />
                                 </button>
                                 <button class="w-20 duration-75 h-14 bg-success rounded-2xl active:translate-y-1" id="btnConfirm">
                                    <img src="src/svg/ok.svg" alt="Ok button" class="w-14 -translate-y-[3px] translate-x-[10px]" />
                                 </button>
                              </div>
                           </div>
                        </div>

                        <!-- start deleting menu -->
                        <div class="  h-[24rem] unactive-menu  absolute top-0 z-20 p-2">
                           <div class="h-fit w-[17.8rem] bg-main rounded-2xl p-1">
                              <table class="w-full ml-3 text-lg text-white">
                                 <thead>
                                    <tr>
                                       <th colspan="3" class="text-2xl">
                                          Check Food
                                       </th>
                                    </tr>
                                    <tr>
                                       <th colspan="2" class="">Foods</th>
                                       <th colspan="1">Quantity</th>
                                    </tr>
                                 </thead>
                                 <tbody class="h-56 overflow-y-auto checked-menu w-[70%]">
                                    <tr data-food="Horu Yakisoba" class="">
                                       <td colspan="2">Horu yakisoba</td>
                                       <td colspan="1" class="pl-16 text-center">3</td>
                                    </tr>
                                    <tr data-food="Horu Yakisoba">
                                       <td colspan="2">Horu yakisoba</td>
                                       <td colspan="1" class="pl-16 text-center">3</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="flex items-center justify-center gap-2 pt-2 container-command">
                              <button class="h-10 font-medium text-center text-white w-[7rem] bg-danger rounded-2xl" value="-">Decrease (-)</button>
                              <button class="h-10 font-medium text-center text-white w-[7rem] bg-success rounded-2xl" value="+">Increase (+)</button>
                           </div>
                        </div>
                        <!-- end deleting menu -->

                        <!-- Start check table -->

                        <!-- End check table -->
                     </div>
                  </div>
               </section>
               <section class="absolute top-0 right-0 translate-x-[200%] page-3">
                  <div class="w-screen h-fit">
                     <div class="w-4/5 px-2 pt-2 m-auto bg-white h-[26rem] rounded-2xl">
                        <div class="w-full mx-auto h-[19.4rem] bg-main rounded-tl-2xl rounded-tr-2xl px-2 pt-2">
                           <table class="w-full text-lg text-white">
                              <thead>
                                 <tr>
                                    <th colspan="3" class="text-2xl">
                                       Ordered Menu
                                    </th>
                                 </tr>
                                 <tr>
                                    <th colspan="2" class="">Foods</th>
                                    <th colspan="1">Quantity</th>
                                 </tr>
                              </thead>
                              <tbody id="inpList" class="h-56 overflow-y-auto">
                                 <!-- <tr>
                                 <td colspan="2">Horu yakisoba</td>
                                 <td colspan="1" class="text-center ">3</td>
                              </tr> -->
                              </tbody>
                           </table>
                        </div>
                        <div class="w-full h-20 pl-2 mt-2 bg-main rounded-bl-2xl rounded-br-2xl">
                           <p class="text-2xl font-medium text-white">
                              Notification :
                           </p>
                           <!-- <p class="text-2xl font-medium text-danger">
                              Error : No table inputed !
                           </p> -->
                           <!-- <p class="text-2xl font-medium text-success">
                              Food succesfully sent !
                           </p> -->
                           <div class="final-notif">
                              <p class="text-2xl font-medium text-success">-</p>
                           </div>
                        </div>
                     </div>
                     <div class="flex items-center w-4/5 mx-auto mt-2 bg-white rounded-2xl h-[68px] justify-evenly">
                        <button class="w-20 duration-75 h-14 bg-danger rounded-2xl active:translate-y-1" id="btnBackToPage2">
                           <img src="src/svg/back.svg" alt="back button" class="w-14 -translate-y-[3px] translate-x-[10px]" />
                        </button>
                        <!-- <button
                           class="w-20 duration-75 h-14 bg-warning rounded-2xl active:translate-y-1"
                           id="btnCheck"
                        >
                           <img
                              src="src/svg/hamburger-menu.svg"
                              alt="hamburger menu"
                              class="w-14 -translate-y-[2px] translate-x-[12px] svg-ordered-list"
                           />
                        </button> -->
                        <button class="w-20 duration-75 h-14 bg-success rounded-2xl active:translate-y-1" id="btnSendFinal">
                           <img src="src/svg/send.svg" alt="send button" class="w-12 translate-x-[20px]" />
                        </button>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </main>

      <!-- Modal input -->
      <div class="absolute top-0 left-0 w-full h-full duration-75 -z-10 modal-bg">
         <div class="absolute z-20 w-4/5 pb-2 -translate-x-1/2 -translate-y-1/2 bg-white border-2 h-fit top-1/2 left-1/2 border-main rounded-2xl modal-input-menu">
            <h4 class="pl-2 text-2xl font-medium">
               Input menu
               <span class="absolute right-0 w-4 h-4 text-xs text-center text-white -translate-x-1/2 translate-y-1/2 rounded-full bg-danger btnCloseModalInput">X</span>
            </h4>
            <p class="pl-2 text-lg font-medium">
               Food name : <span id="foodName">Horumon yakisoba</span>
            </p>
            <p class="pl-2 text-lg font-medium">
               Quantity : <span class="text-main" id="foodsQuantity">1</span>
            </p>
            <div class="flex pl-2 mt-2 font-medium text-center text-white justify-evenly">
               <button class="w-2/5 h-10 rounded-2xl bg-danger" id="btnDecreaseQuantity">
                  Decrease (-)
               </button>
               <button class="w-2/5 h-10 rounded-2xl bg-success" id="btnIncreaseQuantity">
                  Increase (+)
               </button>
            </div>
            <button class="block w-4/5 h-10 mx-auto mt-4 text-white rounded-2xl bg-main" id="btnConfirmQuantity">
               Confirm
            </button>
         </div>
      </div>
      <!-- End Modal -->

      <script>
         //////////////////
         // websocket file
         const conn = new WebSocket('ws://localhost:8081');
         conn.onopen = function(e) {
            try {

               console.log("Connection established!");
               const readyToSendData = {
                  request: 'get-staff-staffconnection',
                  data: {
                     staffId: document.querySelector('.staff-id').innerText
                  },
               }
               conn.send(JSON.stringify(readyToSendData));

            } catch (err) {
               console.warn('error');
            }
         };
      </script>

      <?php
      $floor = $defaultTableConfig->getFloor();
      $row = $defaultTableConfig->getTotalRow();
      $column = $defaultTableConfig->getTotalColumn();
      ?>
      <script>
         const unactiveMenu = document.querySelectorAll('.unactive-menu');
         const staffId = document.querySelector('.staff-id')
         const modalInputMenu = document.querySelector('.modal-input-menu');
         const containerSlider = document.querySelector('.slide-container');
         const containerCommand = document.querySelector('.container-command');
         const selectMenu = document.querySelector('.select-menu');
         const checkedMenu = document.querySelector('.checked-menu');
         const wrapperDeco = document.querySelector('.wrapper-deco');
         const svgOrderedList = document.querySelector('.svg-ordered-list');
         const categoriesContainer = document.querySelector(
            '.categories-container'
         );
         const btnCloseModalInput = document.querySelector(
            '.btnCloseModalInput'
         );
         const modalBg = document.querySelector('.modal-bg');
         const screenFoodsList = document.querySelector('.screen-foods-list');
         const screenOption = document.querySelector('.option-screen');
         const containerTable = document.querySelector('.keypad-table');
         const finalNotif = document.querySelector('.final-notif');
         const inpRadioBtnSeat = document.getElementsByName('status');
         const inpList = document.getElementById('inpList');
         const inpFoodsQuantity = document.getElementById('foodsQuantity');
         const inpOptions = document.getElementById('inpOptions');
         const inpSeatNumber = document.getElementById('seatNumber');
         const inpTable = document.getElementById('inpTable');
         const inpFoodName = document.getElementById('foodName');
         const btnSendFinal = document.getElementById('btnSendFinal');
         const btnBackToPage1 = document.getElementById('btnBackToPage1');
         const btnBackToPage2 = document.getElementById('btnBackToPage2');
         const btnConfirm = document.getElementById('btnConfirm');
         const btnDecreaseQuantity = document.getElementById(
            'btnDecreaseQuantity'
         );
         const btnIncreaseQuantity = document.getElementById(
            'btnIncreaseQuantity'
         );
         const btnConfirmQuantity =
            document.getElementById('btnConfirmQuantity');

         let orderedMenu = {};
         let currentFloorView = 1;
         let checked = null;
         let checkedElement = null;

         //////////////////////////////////
         const gotoNextPage = function() {
            if (inpTable.value) {
               containerSlider.style.transform = 'translate(-100%)';
               inpSeatNumber.innerText = inpTable.value;
            } else {
               containerSlider.style.transform = 'translate(-100%)';
               inpSeatNumber.innerText = '--no input--';
            }
         };

         const handleInputMenu = function(el) {
            modalInputMenu.classList.toggle('active');
            modalBg.classList.toggle('blurry-bg');

            inpFoodName.innerText = el.dataset.food;
            inpFoodName.dataset.foodsrc = el.dataset.foodsrc;
            inpFoodsQuantity.innerText = 1;
         };

         const handleConfirmationOrderedMenu = function() {
            inpList.innerHTML = '';
            for (const [food, [quantity]] of Object.entries(orderedMenu)) {
               const markup = `<tr>
                                 <td colspan="2" class="inline-block w-48">${food}</td>
                                 <td colspan="1" class="text-center ">${quantity}</td>
                              </tr>`;
               inpList.insertAdjacentHTML('beforeend', markup);
            }
         };

         const handleConfirm = function() {
            checkedMenu.innerHTML = '';
            for (const [food, [quantity]] of Object.entries(orderedMenu)) {
               const markup = `<tr class="duration-200 item-tbody" data-item="${food}">
                                    <td colspan="2" class="inline-block w-48">${food}</td>
                                    <td colspan="1" class="text-center item-quantity">${quantity}</td>
                                 </tr>`;
               checkedMenu.insertAdjacentHTML('beforeend', markup);
            }

            console.log('confirm');
         }

         //////////////////////////////////
         ////////////////// event listener
         class TableConfig {
            #tableBody = document.getElementById('tableBody');
            #maxRow;
            #maxColumn;
            #floor;

            constructor(maxRow = 0, maxColumn = 0, floor = 0) {
               this.#maxRow = maxRow;
               this.#maxColumn = maxColumn;
               this.#floor = floor;

               this.renderTable();
            }

            renderTable() {
               let floor = this.#floor;
               let row = 1;
               let col = 0;
               let markup = '';

               if (this.#maxRow > 9 || this.#maxColumn > 4)
                  return alert(`configuration error ! floor : ${this.#floor}`);

               if (!this.#maxRow && !this.#maxColumn) {
                  markup += '<tr><td>no data found</td></tr>';
               } else {
                  for (let i = 0; i < this.#maxRow; i++) {
                     markup += '<ul class="mx-auto text-lg font-medium text-white w-fit">';
                     for (let j = 0; j < this.#maxColumn; j++) {
                        markup += `<li class="inline-block w-12 py-2 m-[0.15rem] border rounded-lg bg-main item-table" data-table="${floor}${col}${row}">${floor}${col}${row}</li>`;
                        col++;
                     }
                     col = 0;
                     row++;
                     markup += '</ul>';
                  }
               }

               this.#tableBody.innerHTML = '';
               this.#tableBody.insertAdjacentHTML('beforeend', markup);
            }
         }

         // the default params got from php

         class AjaxEvent {
            constructor() {
               categoriesContainer.addEventListener('click', this.getFood.bind(this));
               floorMap.addEventListener('change', this.getFloorConfig.bind(this));
            }

            // 01
            async getFloorConfig(e) {
               const reqFloor = e.target.value;
               const floorData = await this.fetchFloor(reqFloor);

               if (!floorData) return;

               const {
                  row,
                  column,
                  floor
               } = floorData;
               tableConfig = new TableConfig(row, column, floor);
               currentFloorView = floor;
            }

            fetchFloor(req) {
               return fetch(`ajax/request-floor.php?floor=${req}`)
                  .then(res => res.json());
            }

            // 02
            async getFood(e) {
               const foodItemEl = e.target.closest('.menu-item');
               if (!foodItemEl) return;

               const reqFood = foodItemEl.dataset.menu;
               const {
                  data
               } = await this.fetchFood(reqFood);
               screenFoodsList.innerHTML = '';
               data.forEach(el => {
                  const [foodName, src] = el;
                  screenFoodsList.insertAdjacentHTML('beforeend', this.markup(foodName, src))
               });
            }

            fetchFood(req) {
               return fetch(`ajax/request-menu.php?request=${req}`)
                  .then(response => response.json());
            }

            markup(foodName, src) {
               return `<p class="py-1" data-foodsrc="${src}" data-food="${foodName}">${foodName}</p>`
            }
         }

         let tableConfig = new TableConfig(<?= $row ?>, <?= $column ?>, <?= $floor ?>);
         const ajax = new AjaxEvent();

         containerTable.addEventListener('click', function(e) {
            const keypadEl = e.target.closest('.item-table');
            if (!keypadEl) return;

            const inpRaw = keypadEl.dataset.table;

            if (inpRaw.match(/[0-9]/)) inpTable.value = inpRaw;
            else inpRaw === 'next' ? gotoNextPage() : console.log('error');;
         });

         screenOption.addEventListener('click', function(e) {
            const selectedMenu = e.target.closest('p[data-food]');

            if (selectedMenu)
               handleInputMenu(selectedMenu);
         });

         inpOptions.addEventListener('change', function(e) {
            const selected = e.target.value;
            unactiveMenu.forEach(el => el.classList.remove('active-menu'));

            switch (selected) {
               case 'confirm':
                  unactiveMenu[1].classList.add('active-menu');
                  handleConfirm();
                  break;
               default:
                  unactiveMenu[0].classList.add('active-menu');
                  console.log('ok');
                  break;
            }
         });

         btnConfirmQuantity.addEventListener('click', function() {
            const food = inpFoodName.innerText;
            const imageSrc = inpFoodName.dataset.foodsrc;
            console.log(inpFoodName);
            const quantity = Number(inpFoodsQuantity.innerText);

            if (food in orderedMenu) orderedMenu[food][0] += quantity;
            else orderedMenu[food] = [quantity, `./src/img/uploads/${imageSrc}`];

            modalInputMenu.classList.toggle('active');
            modalBg.classList.toggle('blurry-bg');

            svgOrderedList.classList.add('animate-success-adding');
            setTimeout(
               () => svgOrderedList.classList.remove('animate-success-adding'),
               1200
            );

            console.log(orderedMenu);
         });

         btnSendFinal.addEventListener('click', function() {
            const seat = Number(inpSeatNumber.innerText) ?
               inpSeatNumber.innerText :
               false;

            const htmlHelper = (condition, message) => {
               return `<p class="text-xl font-medium text-${condition}">
                        ${message}
                     </p>`;
            };

            finalNotif.innerHTML = '';
            if (!seat) {
               finalNotif.insertAdjacentHTML('beforeend', htmlHelper('danger', 'Error : No table inputed !'));
            } else if (Object.keys(orderedMenu).length === 0) {
               finalNotif.insertAdjacentHTML('beforeend', htmlHelper('warning', 'Warning : No food inputed !'));
            } else {
               const readyToSendData = {
                  request: 'post-staff-stafforderfood',
                  data: {
                     connectedId: staffId.innerText,
                     seat: seat,
                     menuList: orderedMenu,
                  },
               };

               orderedMenu = {};
               inpSeatNumber.innerText = '-';
               inpTable.value = '';
               finalNotif.innerHTML = '';
               containerSlider.style.transform = 'translate(0)';

               conn.send(JSON.stringify(readyToSendData));
               console.log(readyToSendData);
               alert('Food delivered !');
            }
         });

         checkedMenu.addEventListener('click', function(el) {
            const selected = el.target.closest('.item-tbody');
            if (!selected) return;

            const item = document.querySelectorAll('.item-tbody');
            checkedElement = selected;
            checked = selected.dataset.item;

            item.forEach(el => el.classList.remove('active-selected'));
            selected.classList.add('active-selected');

         })

         containerCommand.addEventListener('click', function(el) {
            const button = el.target.closest('button');
            if (!button || !checked) return;

            const quantityEl = checkedElement.querySelector('.item-quantity');
            const value = button.value;

            if (value === '+') {
               orderedMenu[checked][0]++;
               quantityEl.innerText++;
            } else if (value === '-') {
               orderedMenu[checked][0]--;
               quantityEl.innerText--;
               if (orderedMenu[checked][0] <= 0) {
                  delete orderedMenu[checked];
                  checkedElement.remove();
                  checked = null;
               }
            } else alert('error');
         });

         selectMenu.onclick = () => {
            wrapperDeco.classList.toggle('active');
            categoriesContainer.classList.toggle('active');
         };

         btnCloseModalInput.onclick = () => {
            modalInputMenu.classList.remove('active');
            modalBg.classList.remove('blurry-bg');
         };

         btnBackToPage1.onclick = () => {
            containerSlider.style.transform = 'translate(0)';
         };

         btnBackToPage2.onclick = () => {
            containerSlider.style.transform = 'translate(-100%)';
         };

         btnConfirm.onclick = () => {
            containerSlider.style.transform = 'translate(-200%)';
            handleConfirmationOrderedMenu();
         };

         btnIncreaseQuantity.onclick = () => inpFoodsQuantity.innerText++;
         btnDecreaseQuantity.onclick = () => inpFoodsQuantity.innerText--;

         conn.onmessage = function(e) {
            console.log(JSON.parse(e.data));
         };
      </script>