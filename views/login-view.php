<section class="flex flex-col items-center w-screen h-screen bg-gradient-to-br from-gradient_one to-gradient_two">
   <main class="w-4/5 h-fit rounded-2xl overflow-hidden mt-16 bg-white max-w-[640px]">
      <div class="">
         <div class="w-16 h-16 mt-8 ml-auto mr-auto rounded-full bg-main">
            <img class="relative w-8 top-4 left-4 box-shadow" src="src/svg/home.svg" alt="home icon" />
         </div>
         <p class="mt-2 text-center text-gray">
            Rumah Makan Padang Selero
         </p>
      </div>
      <hr class="w-4/5 mx-auto mt-2 border-[0.1px] bg-gray border-gray opacity-25" />
      <div class="flex flex-col items-center w-full">
         <form class="w-4/5" method="POST" action="">
            <h4 class="mr-auto text-2xl font-medium text-gray_dark pt-9">
               Sign In
            </h4>
            <p class="mt-2 text-sm text-gray">
               Enter id and password to start
            </p>
            <label class="block mt-4 mb-2">
               <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-gray">
                  Id
               </span>
               <input type="id" name="workerId" class="block w-full px-3 py-2 mt-1 bg-transparent border rounded-md shadow-sm text-gray border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-success sm:text-sm focus:ring-1" />
            </label>
            <label class="block mb-8">
               <span class="after:content-['*'] after:ml-0.5 after:text-danger block text-sm font-medium text-gray">
                  password
               </span>
               <input type="password" name="password" class="block w-full px-3 py-2 mt-1 bg-transparent border rounded-md shadow-sm text-gray border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-success sm:text-sm focus:ring-1" />
            </label>
            <button class="w-full px-2 py-4 mb-12 text-sm font-medium text-white transition-all duration-300 rounded-lg bg-main active:bg-purple hover:opacity-80 custom-my-button" name="btnLogin">
               <span>Sign In<img src="src/svg/door.svg" alt="door icon for login" class="w-4 ml-2 inline-block -translate-y-[2px]" /></span>
            </button>
         </form>
         <p class="pb-2 text-xs text-gray">
            Copyright &copy; PT. Investama Jaya Properti
         </p>
      </div>
   </main>
</section>
<!-- 48px icon-frame -->
<!-- 24px icon size -->
<!-- content margin top 8px -->