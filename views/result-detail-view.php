<style>
   /* Thankyou http://jsfiddle.net/thL6j/ */
   #nutritionfacts {
      background-color: white;
      border: 1px solid black;
      padding: 3px;
      width: 252px;
   }

   #nutritionfacts td {
      color: black;
      font-family: 'Arial Black', 'Helvetica Bold', sans-serif;
      font-size: 8pt;
      padding: 0;
   }

   #nutritionfacts td.header {
      font-family: 'Arial Black', 'Helvetica Bold', sans-serif;
      font-size: 28px;
      white-space: nowrap;
   }

   #nutritionfacts div.label {
      float: left;
      font-family: 'Arial Black', 'Helvetica Bold', sans-serif;
   }

   #nutritionfacts div.serving {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 8pt;
      text-align: center;
   }

   #nutritionfacts div.weight {
      display: inline;
      font-family: Arial, Helvetica, sans-serif;
      padding-left: 1px;
   }

   #nutritionfacts div.dv {
      display: inline;
      float: right;
      font-family: 'Arial Black', 'Helvetica Bold', sans-serif;
   }

   #nutritionfacts table.vitamins td {
      font-family: Arial, Helvetica, sans-serif;
      white-space: nowrap;
      width: 33%;
   }

   #nutritionfacts div.line {
      border-top: 1px solid black;
   }

   #nutritionfacts div.labellight {
      float: left;
      font-family: Arial, Helvetica, sans-serif;
   }

   #nutritionfacts .highlighted {
      border: 1px dotted grey;
      padding: 2px;
   }
</style>

<div id="nutritionfacts" class="mx-auto mt-2">
   <table width="242" cellspacing="0" cellpadding="0">
      <tbody>
         <tr>
            <td align="center" class="header">Food Manager</td>
         </tr>
         <tr>
            <td>
               <div class="serving">Number <span class="highlighted"><?= $detailResult->getTableNumber(); ?></span> ***</div>
            </td>
         </tr>
         <tr style="height: 7px">
            <td bgcolor="#000000"></td>
         </tr>
         <tr>
            <td style="font-size: 7pt">
               <div class="line">Date</div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label"><?= $detailResult->getClientInAt(); ?><div class="weight"> as Time In</div>
                  </div>
                  <div class="label"><?= $detailResult->getClientOutAt(); ?><div class="weight"> as Time Out</div>
                  </div>
                  <!-- <div style="padding-top: 1px; float: right;" class="labellight">Calories from Fat <div class="weight">56</div>
                  </div> -->
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">
                     <div class="weight"></div>
                  </div>
                  <div class="dv"></div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="dvlabel">Located<sup>*</sup></div>
               </div>
            </td>
         </tr>

         <?php $floor = $detailResult->getTableNumber() . ""; ?>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">Floor
                  </div>
                  <div class="dv"><?= $floor[0]; ?></div>
               </div>
            </td>
         </tr>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">Column
                  </div>
                  <div class="dv"><?= $floor[1]; ?></div>
               </div>
            </td>
         </tr>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">Row
                  </div>
                  <div class="dv"><?= $floor[2]; ?></div>
               </div>
            </td>
         </tr>

         <tr>
            <td>
               <div class="line">
                  <div class="label">
                     <div class="weight"></div>
                  </div>
                  <div class="dv"></div>
               </div>
            </td>
         </tr>
         <!-- <tr>
            <td>
               <div class="line">
                  <div class="label">Sodium <div class="weight">618mg</div>
                  </div>
                  <div class="dv">26%</div>
               </div>
            </td>
         </tr> -->
         <!-- <tr>
            <td>
               <div class="line">
                  <div class="label">Total Carbohydrates <div class="weight">32.2g</div>
                  </div>
                  <div class="dv">11%</div>
               </div>
            </td>
         </tr> -->
         <!-- <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">Dietary Fiber <div class="weight">5.2g</div>
                  </div>
                  <div class="dv">21%</div>
               </div>
            </td>
         </tr> -->
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">
                     <div class="weight"></div>
                  </div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">Order List
                  </div>
               </div>
            </td>
         </tr>
         <tr style="height: 7px">
            <td bgcolor="#000000"></td>
         </tr>
         <tr>
            <td>
               <table cellspacing="0" cellpadding="0" border="0" class="vitamins">
                  <tbody class="order-list">
                     <!-- <tr>
                        <td>Vitamin A &nbsp;&nbsp; 10%</td>
                        <td align="center">•</td>
                        <td align="right">Calcium &nbsp;&nbsp; 19%</td>
                     </tr> -->
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight"><strong>Total Value as</strong>
                  </div>
                  <div class="dv"><?= $detailResult->getTotalPrice(); ?> 円</div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="labellight"><a href="https://flappybird-aaron-fabian.netlify.app/">https://flappybird-aaron-fabian.netlify.app/</a>
                     <br><br><i>Thankyou for your visits !</i>
                  </div>
               </div>
            </td>
         </tr>
      </tbody>
   </table>
</div>
<script>
   const loadJSON = <?= $detailResult->getAllFood(); ?>;
</script>
<script>
   const initData = function() {
      const orderList = document.querySelector('.order-list');
      const htmlHelper = (food) => {
         return food.map(f => `<tr>
                                 <td>${f.foodName} &nbsp;&nbsp;</td>
                                 <td align="center">•</td>
                                 <td align="right">${f.price / f.quantityOut}&nbsp;&nbsp;x&nbsp;&nbsp; ${f.quantityOut} &nbsp;&nbsp; = &nbsp;&nbsp; ${f.price}</td>
                              </tr>`).join('\n');
      }

      orderList.insertAdjacentHTML('beforeend', htmlHelper(loadJSON));
      console.log(loadJSON);
   };

   initData();
</script>