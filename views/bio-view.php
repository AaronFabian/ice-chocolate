<div class="w-full h-screen px-3 overflow-y-auto pt-9 pb-9 bg-gradient-to-br from-gradient_three to-gradient_four background-layer">
   <div class="relative flex flex-col max-w-2xl m-auto min-w-0 break-words bg-white border-0 h-max-[34rem]  shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
         <div class="flex flex-wrap -mx-3">
            <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
               <h6 class="mb-0">Profile Information</h6>
            </div>
            <div class="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
               <a href="javascript:;">
                  <i class="leading-normal fas fa-user-edit text-size-sm text-slate-400" aria-hidden="true"></i>
               </a>

            </div>
         </div>
      </div>
      <div class="flex-auto p-4">
         <p class="leading-normal text-size-sm">
            <?= $profile->getAbout() ? $profile->getAbout() : 'Hi my name is ' . $profile->getName(); ?>
         </p>
         <hr class="h-px my-6 bg-transparent bg-gradient-horizontal-light" />
         <ul class="flex flex-col pl-0 mb-0 rounded-lg">
            <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-size-sm text-inherit">
               <strong class="text-slate-700">Full Name:</strong>
               &nbsp; <?= $profile->getName(); ?>
            </li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
               <strong class="text-slate-700">Nik:</strong>
               &nbsp; <?= $profile->getNik(); ?>
            </li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
               <strong class="text-slate-700">Id:</strong>
               &nbsp; <?= $profile->getWorkerId(); ?>
            </li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
               <strong class="text-slate-700">Country :</strong>
               &nbsp; <?= $profile->getCountry(); ?>
            </li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
               <strong class="text-slate-700">Gender :</strong>
               &nbsp; <?= $profile->getGender(); ?>
            </li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
               <strong class="text-slate-700">Join at:</strong>
               &nbsp; <?= $profile->getJoinAt(); ?>
            </li>
            <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
               <strong class="text-slate-700">Location:</strong>
               &nbsp; <?= $profile->getCity(); ?>
            </li>
            <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
               <strong class="leading-normal text-size-sm text-slate-700">Profile image:</strong>
               &nbsp;
               <div class="shrink-0 ">
                  <?php if ($profile->getImage()) : ?>
                     <img class="object-cover w-64 h-64 mx-auto rounded-full" src="<?= $profile->getImage(); ?>" alt="Current profile photo" />
                     <!-- https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80 -->
                  <?php else : ?>
                     <p>No image yet.</p>
                  <?php endif; ?>
               </div>
               <!-- <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-none" href="javascript:;">
                  <i class="fab fa-facebook fa-lg" aria-hidden="true"></i>
               </a>
               <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-none text-sky-600" href="javascript:;">
                  <i class="fab fa-twitter fa-lg" aria-hidden="true"></i>
               </a>
               <a class="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-none text-sky-900" href="javascript:;">
                  <i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
               </a> -->
            </li>
         </ul>
      </div>
   </div>
</div>