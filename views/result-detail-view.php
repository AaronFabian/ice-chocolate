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
            <td align="center" class="header">Nutrition Facts</td>
         </tr>
         <tr>
            <td>
               <div class="serving">Per <span class="highlighted">180.0g</span> Serving Size</div>
            </td>
         </tr>
         <tr style="height: 7px">
            <td bgcolor="#000000"></td>
         </tr>
         <tr>
            <td style="font-size: 7pt">
               <div class="line">Amount Per Serving</div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">Calories <div class="weight">230</div>
                  </div>
                  <div style="padding-top: 1px; float: right;" class="labellight">Calories from Fat <div class="weight">56</div>
                  </div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="dvlabel">% Daily Value<sup>*</sup></div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">Total Fat <div class="weight">6.2g</div>
                  </div>
                  <div class="dv">10%</div>
               </div>
            </td>
         </tr>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">Saturated Fat <div class="weight">3.5g</div>
                  </div>
                  <div class="dv">17%</div>
               </div>
            </td>
         </tr>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight"><i>Trans</i> Fat <div class="weight">0.0g</div>
                  </div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">Cholesterol <div class="weight">22mg</div>
                  </div>
                  <div class="dv">7%</div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">Sodium <div class="weight">618mg</div>
                  </div>
                  <div class="dv">26%</div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">Total Carbohydrates <div class="weight">32.2g</div>
                  </div>
                  <div class="dv">11%</div>
               </div>
            </td>
         </tr>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">Dietary Fiber <div class="weight">5.2g</div>
                  </div>
                  <div class="dv">21%</div>
               </div>
            </td>
         </tr>
         <tr>
            <td class="indent">
               <div class="line">
                  <div class="labellight">Sugars <div class="weight">3.3g</div>
                  </div>
               </div>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="label">Protein <div class="weight">11.4g</div>
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
                  <tbody>
                     <tr>
                        <td>Vitamin A &nbsp;&nbsp; 10%</td>
                        <td align="center">•</td>
                        <td align="right">Calcium &nbsp;&nbsp; 19%</td>
                     </tr>
                     <tr>
                        <td>Vitamin B &nbsp;&nbsp; 22%</td>
                        <td align="center">•</td>
                        <td align="right">Iron &nbsp;&nbsp; 13%</td>
                     </tr>
                     <tr>
                        <td>Vitamin C &nbsp;&nbsp; 16%</td>
                        <td align="center">•</td>
                        <td align="right">Potassium &nbsp;&nbsp; 7%</td>
                     </tr>
                     <tr>
                        <td>Vitamin D &nbsp;&nbsp; 5%</td>
                        <td align="center">•</td>
                        <td align="right">Folate &nbsp;&nbsp; 40%</td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td>
               <div class="line">
                  <div class="labellight">* Based on a regular <a href="#">2000 calorie diet</a>
                     <br><br><i>Nutritional details are an estimate and should only be used as a guide for approximation.</i>
                  </div>
               </div>
            </td>
         </tr>
      </tbody>
   </table>
</div>