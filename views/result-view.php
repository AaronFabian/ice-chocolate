<main class="w-4/5 mx-auto">
   <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="inline-block min-w-full py-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
               <table class="min-w-full text-center">
                  <thead class="border-b-gray bg-main">
                     <tr>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white">
                           ID
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white">
                           Table No
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white">
                           Time in
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white">
                           Time Out
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white">
                           Total Value
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-medium text-white">
                           _
                        </th>
                     </tr>
                  </thead class="border-b">
                  <tbody>
                     <?php foreach ($result as $r) : ?>
                        <tr class="bg-white border-b border-b-gray">
                           <td class="px-6 py-4 text-sm font-light text-gray_dark whitespace-nowrap"><?= $r->getIdResult(); ?></td>
                           <td class="px-6 py-4 text-sm font-light text-gray_dark whitespace-nowrap">
                              <?= $r->getTableNumber(); ?>
                           </td>
                           <td class="px-6 py-4 text-sm font-light text-gray_dark whitespace-nowrap">
                              <?= $r->getClientInAt(); ?>
                           </td>
                           <td class="px-6 py-4 text-sm font-light text-gray_dark whitespace-nowrap">
                              <?= $r->getClientOutAt(); ?>
                           </td>
                           <td class="px-6 py-4 text-sm font-light text-gray_dark whitespace-nowrap">
                              <?= $r->getTotalPrice(); ?>
                           </td>
                           <td class="px-2 text-sm font-light cursor-pointer whitespace-nowrap ">
                              <a class="text-xl duration-200 text-gray_dark hover:text-success" href="?menu=result-view&staff=<?= $_SESSION['worker-id'] ?>&res=<?= $r->getIdResult(); ?>">-></a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                     <tr class="bg-white border-b">
                        <td class="px-6 py-4 text-sm font-light text-gray whitespace-nowrap">---</td>
                        <td colspan="2" class="px-6 py-4 text-sm font-light text-center text-gray-900 whitespace-nowrap">
                           Total earn
                        </td>
                        <td class="px-6 py-4 text-sm font-light text-gray whitespace-nowrap">
                           ---
                        </td>
                        <td class="px-6 py-4 text-sm font-light text-gray whitespace-nowrap">
                           <span><?= $result[0]->getResult(); ?></span>&nbsp;円
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</main>