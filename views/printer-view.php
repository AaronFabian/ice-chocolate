<style>
   main {
      height: 100vh;
      background-image: url(./src/img/assets/bg-printer.jpg);
      height: fit-content;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center top;
      background-attachment: fixed;
   }

   @media only screen and (max-height: 512px) {
      .food-preview {
         width: 4rem;
      }
   }

   @media only screen and (max-width: 850px) {
      .food-preview {
         height: 80px;
      }
   }

   .seperator-deco {
      border-bottom: 2px dashed;
   }

   .visibility-hidden {
      opacity: 0;
      visibility: hidden;
   }

   .display-none {
      display: none;
   }

   .item-nav {
      transition: .3s;
      opacity: .5;
   }

   .item-nav.active-it {
      background-color: rgba(255, 255, 255, .4);
      opacity: 1;
   }
</style>
<main class="w-full">
   <div class="fixed top-0 left-0 z-10 w-full">
      <nav class="bg-white h-14 drop-shadow-xl">
         <ul class="flex items-center w-11/12 h-full mx-auto max-w-[370px] ">
            <li class="relative w-[12%] h-10 rounded-full bg-main">
               <img src="./src/svg/eat.svg" alt="" class="absolute w-6 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" />
            </li>
            <li class="w-[74%] text-center">
               <h1 class="-mt-1 text-lg font-medium">Order Printer</h1>
               <p class="-mt-1 text-[10px] text-teal">
                  Last changed at <span class="time-update">-</span>
               </p>
            </li>
            <li></li>
         </ul>
      </nav>
      <!-- !!! -->
      <nav class="h-8 bg-main drop-shadow-xl">
         <ul class="flex items-center w-11/12 mx-auto max-w-[370px] h-8 justify-center leading-7 navbar-container">
            <li class="w-16 h-8 text-center text-white bg-center active item-nav active-it">
               Default
            </li>
            <li class="w-16 h-8 text-center text-white item-nav">
               History
            </li>
            <!-- active : {background-color: rgba(255,255,255,0.4)} -->
            <!-- non: {opacity: 50} -->
         </ul>
      </nav>
   </div>
   <div class="h-16 seperator"></div>
   <section class="w-11/12 relative mx-auto h-fit mt-12 pb-2 bg-white min-h-[30rem] drop-shadow-xl pt-2 max-w-[640px]">
      <div class="wrapper-script">
         <h3 class="w-4/5 mx-auto text-xs font-medium">Menu</h3>
         <div class="container-script">
            <!-- Insert here -->
         </div>
      </div>

      <div class="absolute left-0 z-20 w-full pt-2 bg-white top-2 h-fit visibility-hidden wrapper-history">
         <h3 class="w-4/5 mx-auto text-xs font-medium ">History</h3>
         <div class="container-history ">


         </div>
      </div>
   </section>

   <footer class="w-full h-10 mt-8 bg-main">
      <div class="w-11/12 mx-auto">
         <p class="text-xs text-white opacity-50">
            <small>connected by id : <span><?= $_SESSION['worker-id'] ?></span></small><br>
            <small class="table-id">table id : <span><?= $printerId; ?></span></small>
         </p>
      </div>
   </footer>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js" integrity="sha512-6+YN/9o9BWrk6wSfGxQGpt3EUK6XeHi6yeHV+TYD2GR0Sj/cggRpXr1BrAQf0as6XslxomMUxXp2vIl+fv0QRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js" integrity="sha512-6+YN/9o9BWrk6wSfGxQGpt3EUK6XeHi6yeHV+TYD2GR0Sj/cggRpXr1BrAQf0as6XslxomMUxXp2vIl+fv0QRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
   const tableId = document.querySelector('.table-id');
</script>
<script>
   const audio = {
      notif: new Howl({
         src: 'src/music/notif.wav',
      }),
   };
</script>
<script>
   //////////////////
   // websocket file
   const conn = new WebSocket('ws://localhost:8081');
   conn.onopen = function(e) {
      try {

         console.log("Connection established!");
         const readyToSendData = {
            request: 'get-printer-printerconnection',
            data: {
               printer: tableId
            },
         }
         conn.send(JSON.stringify(readyToSendData));

      } catch (err) {
         console.warn('error');
      }
   };

   const navbarContainer = document.querySelector('.navbar-container');
   const containerScript = document.querySelector('.container-script');
   const wrapperScript = document.querySelector('.wrapper-script');
   const wrapperHistory = document.querySelector('.wrapper-history');
   const timeUpdate = document.querySelector('.time-update');
   const containerHistory = document.querySelector('.container-history');
   const itemNav = document.querySelectorAll('.item-nav');

   const htmlList = function(sentBy, table, reqFood) {
      let markup = '';

      for (let [name, [quantity, src]] of Object.entries(reqFood)) {
         const datenow = 'id' + (new Date()).getTime() + name;
         markup += `
            <div class="flex flex-row w-4/5 h-20 mx-auto my-2 duration-500 border-b border-border_seperator order-item">
                  <div class="flex items-center justify-center w-1/4 gap-2">
                     <input type="checkbox" name="${datenow}" id="${datenow}" class="inline-block item-list" />
                     <label for="${datenow}" class="inline-block h-12 pt-1 overflow-hidden bg-cover sw-14 food-preview"><img src="${src}" alt="${name}" class="inline-block mx-auto scale-125" /></label>
                  </div>
                  <div class="flex flex-col pl-3 content w-[65%] items-start justify-center">
                     <h3 class="text-xs text-gray_dark">
                        <strong>${name}</strong>
                     </h3>
                     <div>
                        <label for="quantity" class="text-xs font text-gray">quantity :
                        </label>
                        <input type="text" name="quantity" id="quantity" disabled class="w-8 pl-3 text-xs" value="${quantity}" />
                        <label for="table-number" class="text-xs font text-gray">table :
                        </label>
                        <input type="text" name="table-number" id="table-number" disabled class="w-8 pl-3 text-xs" value="${table}" />
                     </div>
                  </div>
                  <div class="w-[14%] text-xs text-center opacity-50 flex justify-center items-center -mt-7">
                     <small>by :<span>${sentBy}</span></small>
                  </div>
               </div>
         `;
      }

      return markup;
   }

   navbarContainer.addEventListener('click', function(el) {
      itemNav.forEach(el => el.classList.toggle('active-it'));

      wrapperHistory.classList.toggle('visibility-hidden');
      wrapperScript.classList.toggle('visibility-hidden');
   })

   containerScript.addEventListener('click', function(el) {
      const selected = el.target.closest('.item-list');
      if (!selected) return;

      const orderEl = selected.closest('.order-item');
      orderEl.classList.add('visibility-hidden');
      setTimeout(() => {
         orderEl.remove();
      }, 500);
   })

   conn.onmessage = function(e) {
      const res = JSON.parse(e.data);

      if (res.ok) {
         console.log(res);
         const date = new Date(Date.now())
         const sentBy = res.menu.connectedId;
         const table = res.menu.seat;
         const reqFood = res.menu.menuList;
         const html = htmlList(sentBy, table, reqFood);

         containerHistory.insertAdjacentHTML('beforeend', html);
         containerScript.insertAdjacentHTML('beforeend', html);
         timeUpdate.innerText = `${date.getHours()} : ${date.getMinutes()} ${date.getHours() > 12 ? 'PM' : 'AM'}`;
         audio.notif.play();
      }
   };
</script>