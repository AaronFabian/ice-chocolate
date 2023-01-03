<style>
   .image-staff {
      animation: spin 4s linear infinite;
   }

   .image-printer {
      animation: vibes 3s linear infinite;
   }

   .image-gear {
      animation: softR 6s linear infinite;
   }

   .image-dashboard {
      animation: dashboard 9s linear infinite;
   }

   @keyframes spin {
      0% {
         transform: translate(0);
      }

      10% {
         transform: translateY(-16px);
      }

      20% {
         transform: rotateY(360deg) translateY(-16px);
      }

      80% {
         transform: rotateY(0deg) translateY(-16px);
      }

      100% {
         transform: rotate(0deg);
      }
   }

   @keyframes vibes {
      0% {
         transform: translate(0);
      }

      30% {
         transform: scale3d(1.1, 1.1, 1.1);
      }

      100% {
         transform: translate(0);
      }
   }

   @keyframes softR {
      0% {
         transform: translate(0);
      }

      20% {
         transform: rotate(10deg);
      }

      40% {
         transform: rotate(-10deg);
      }

      60% {
         transform: rotate(10deg);
      }

      80% {
         transform: rotate(-10deg);
      }

      100% {
         transform: translate(0);
      }
   }

   @keyframes dashboard {
      0% {
         transform: translateY(-180px);
      }

      10% {
         transform: rotateY(0) translateY(0);
      }

      50% {
         transform: rotateY(360deg);
      }

      70% {
         transform: translate(0);
      }

      90% {
         transform: translateY(180px);
      }

      100% {
         transform: translateY(240px);
      }
   }
</style>
<!-- <form action="" method="POST"> -->
<section class="flex flex-col items-center justify-center w-screen h-screen bg-gradient-to-br from-gradient_one to-gradient_two">
   <div class="swiper border-2 w-3/4 h-[460px] rounded-2xl overflow-hidden">
      <div class="swiper-wrapper">
         <!-- Slides -->
         <div class="swiper-slide bg-success">
            <img class="w-48 mx-auto mt-8 image-staff" src="src/svg/user.svg" alt="" />
            <h2 class="mb-8 text-6xl font-semibold text-center text-white">
               Staff
            </h2>
            <div>
               <div class="flex flex-col items-center">
                  <label class="block">
                     <!-- <input class="px-2 py-2 mb-3 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Staff number" name="staffNumber" /> -->
                  </label>
                  <a class="px-10 py-2 font-bold text-white duration-100 rounded-full mt-14 bg-gray_dark hover:bg-blue-700 hover:bg-slate-400 active:bg-slate-800" name="btnConfirm" href="?menu=staff-view&staff=<?= $_SESSION['worker-id']; ?>">
                     Confirm
                  </a>
               </div>
            </div>
         </div>
         <div class="swiper-slide bg-yellow">
            <img class="w-48 mx-auto mt-8 image-staff" src="src/svg/eat.svg" alt="" />
            <h2 class="mb-8 text-6xl font-semibold text-center text-white">
               Client
            </h2>
            <form method="POST" action="?menu=client-view">
               <div class="flex flex-col items-center">
                  <label class="block">
                     <input class="px-2 py-2 mb-3 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Table number" name="tableNumber" />
                  </label>
                  <button class="px-10 py-2 font-bold text-white duration-100 rounded-full bg-gray_dark hover:bg-blue-700 hover:bg-slate-400 active:bg-slate-800" name="btnConfirm" value="client-view">
                     Confirm
                  </button>
               </div>
            </form>
         </div>
         <div class="swiper-slide bg-orange">
            <img class="w-48 mx-auto mt-8 image-printer" src="src/svg/printer.svg" alt="" />
            <h2 class="mb-8 text-6xl font-semibold text-center text-white">
               Printer
            </h2>
            <form method="POST" action="">
               <div class="flex flex-col items-center">
                  <label class="block">
                     <input class="px-2 py-2 mb-3 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Printer number" name="printerNumber" />
                  </label>
                  <button class="px-10 py-2 font-bold text-white duration-100 rounded-full bg-gray_dark hover:bg-blue-700 hover:bg-slate-400 active:bg-slate-800" name="btnConfirm" value="printer-view">
                     Confirm
                  </button>
               </div>
            </form>
         </div>
         <div class="swiper-slide bg-danger">
            <img class="w-48 mx-auto mt-8 image-gear" src="src/svg/gear.svg" alt="" />
            <h2 class="mb-8 text-6xl font-semibold text-center text-white">
               Settings
            </h2>
            <div>
               <div class="flex flex-col items-center">
                  <a class="px-10 py-2 font-bold text-white duration-100 rounded-full mt-14 bg-gray_dark hover:bg-blue-700 hover:bg-slate-400 active:bg-slate-800" name="btnConfirm" href="?menu=setting-view&staff=<?= $_SESSION['worker-id']; ?>">
                     Confirm
                  </a>
               </div>
            </div>
         </div>
         <div class="swiper-slide bg-purple">
            <div class="overflow-hidden">
               <img class="w-48 mx-auto mt-8 image-dashboard" src="src/svg/table.svg" alt="" />
            </div>
            <h2 class="mb-8 text-6xl font-semibold text-center text-white">
               Result
            </h2>
            <div>
               <div class="flex flex-col items-center">
                  <label class="block">
                     <!-- <input class="px-2 py-2 mb-3 rounded-lg border-slate-200 placeholder-slate-400 contrast-more:border-slate-400 contrast-more:placeholder-slate-500" placeholder="Staff number" /> -->
                  </label>
                  <a class="px-10 py-2 font-bold text-white duration-100 rounded-full mt-14 bg-gray_dark hover:bg-blue-700 hover:bg-slate-400 box-shadow active:bg-slate-800" name="btnConfirm" href="?menu=result-view&staff=<?= $_SESSION['worker-id']; ?>">
                     Confirm
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <section>
      <div class="mt-6 text-center text-gray_dark">
         <h1 class="text-xl font-medium">
            <span>Wednesday</span>, <span>13</span> <span>November</span>
            <span>2001</span>
         </h1>
         <h3 class="mt-4 text-6xl font-medium">
            <span>12</span> : <span>30</span> <span>AM</span>
         </h3>
      </div>
   </section>

   <p><small>Copyright &copy; PT. Investama Jaya Properti</small></p>
</section>
<!-- </form> -->
<script>
   const swiper = new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
   });
</script>

<!-- 24px icon size -->
<!-- content margin top 8px -->