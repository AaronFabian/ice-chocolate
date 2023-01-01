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
         <form action="" method="POST" enctype="multipart/form-data">
            <label for="bio"><strong class="text-gray_dark">Bio :</strong></label><br>
            <textarea id="story" name="about" rows="2" cols="33"><?= $profile->getAbout() ? $profile->getAbout() : 'Hi my name is ' . $profile->getName(); ?>
         </textarea>
            <hr class="h-px my-6 bg-transparent bg-gradient-horizontal-light" />
            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
               <li class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-size-sm text-inherit">
                  <strong class="text-gray_dark">Full Name:</strong>
                  &nbsp; <input type="text" value="<?= $profile->getName(); ?>" name="name">
               </li>
               <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
                  <strong class="text-gray_dark">Nik:</strong>
                  &nbsp; <input type="text" value="<?= $profile->getNik(); ?>" name="nik">
               </li>
               <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
                  <strong class="text-gray_dark">Id:</strong>
                  &nbsp; <input type="text" value="<?= $profile->getWorkerId(); ?>" name="id">
               </li>
               <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
                  <strong class="text-gray_dark">Country :</strong>
                  &nbsp; <input type="text" value="<?= $profile->getCountry(); ?>" name="country">
               </li>
               <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
                  <strong class="text-gray_dark">Gender :</strong>
                  &nbsp; <input type="text" value="<?= $profile->getGender(); ?>" name="gender">
               </li>
               <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
                  <strong class="text-gray_dark">Join at:</strong>
                  <?php [$date] = explode(' ', $profile->getJoinAt()); ?>
                  &nbsp; <input type="date" name="date" value="<?= $date; ?>" name="joinAt" disabled>
               </li>
               <li class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-size-sm text-inherit">
                  <strong class="text-gray_dark">City:</strong>
                  &nbsp; <input type="text" value="<?= $profile->getCity(); ?>" name="city">
               </li>
               <li class="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                  <strong class="leading-normal text-size-sm text-gray_dark">Profile image:</strong>
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
               <?php if ($_SESSION['worker-role'] === 'manager' and $profile->getRole() !== 'manager') : ?>
                  <button class="relative block px-4 py-2 pl-0 mx-auto mt-10 leading-normal text-center border-0 border-t-0 rounded-2xl h-fit w-36 bg-main text-size-sm text-inherit hover:opacity-90" type="submit" name="btnSubmitChange">
                     <strong class="pl-3 text-white">Confirm</strong>
                  </button>
                  <a href="?menu=setting-view&staff=<?= $_SESSION['worker-id']; ?>" class="relative block px-4 py-2 pl-0 mx-auto mt-10 leading-normal text-center border-0 border-t-0 rounded-2xl h-fit w-36 bg-main text-size-sm text-inherit hover:opacity-90"><strong class="pl-3 text-white">Return</strong></a>
               <?php else : ?>
                  <a href="?menu=home" class="relative block px-4 py-2 pl-0 mx-auto mt-10 leading-normal text-center border-0 border-t-0 rounded-2xl h-fit w-36 bg-main text-size-sm text-inherit hover:opacity-90"><strong class="pl-3 text-white">Return</strong></a>
               <?php endif; ?>
            </ul>
         </form>
      </div>
   </div>
</div>