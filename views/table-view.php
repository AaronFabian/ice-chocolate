<style>
   body {
      font-family: Arial, Helvetica, sans-serif;
      height: 100vh;
      width: 100%;
      background: rgb(184, 121, 86);
      background: rgb(181, 184, 86);
      background: linear-gradient(329deg,
            rgba(181, 184, 86, 1) 27%,
            rgba(90, 204, 207, 1) 100%);
      display: flex;
      justify-content: center;
      flex-direction: column;
   }

   .main-table {
      width: 80%;
      height: 80vh;
      margin: auto;
      background-color: #5e72e4;
   }

   .table-container {
      width: 100%;
      margin: 12px 0;
   }

   .colspan-counter {
      font-size: 24px;
   }

   .table-tbody {
      text-align: center;
   }

   .input-style {
      margin: auto;
      text-align: right;
   }

   #floor-config {
      height: 30px;
      width: 70px;
   }
</style>
<div class="table-container">
   <table border="1" cellspacing="0" bordercolor="#000" class="main-table">
      <thead>
         <tr>
            <th colspan="3" class="colspan-counter">Floor <span class="floor-counter">-</span></th>
         </tr>
      </thead>
      <tbody id="tbody" class="table-tbody">
         <tr>
            <td>search for table data</td>
         </tr>
      </tbody>
   </table>
</div>
<div class="configuration-setting">
   <form method="POST" action="">
      <table class="input-style">
         <tr>
            <td><label for="column-config">column : </label></td>
            <td>
               <input type="text" name="column-config" id="column-config" />
            </td>
         </tr>
         <tr>
            <td><label for="row-config">row : </label></td>
            <td>
               <input type="text" name="row-config" id="row-config" />
            </td>
         </tr>
         <tr>
            <td>
               <label for="floor-config">Floor : </label>
            </td>
            <td>
               <input type="number" id="floor-config" name="floor" min="1" value="1" max="10" pattern="[0-9]*" />
            </td>
         </tr>
         <tr>
            <td style="text-align: right" colspan="2">
               <button type="submit" name="btnSave">save</button>
               <button type="button" id="btnSearch">search</button>
            </td>
         </tr>
      </table>
   </form>
</div>
<script>
   let maxRow = 9;
   let maxCol = 9;

   const btnSearch = document.getElementById('btnSearch');

   class TableConfig {
      #floorCounter = document.querySelector('.floor-counter');
      #colspanCounter = document.querySelector('.colspan-counter');
      #tboady = document.getElementById('tbody');
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
         let floor = 1;
         let row = 1;
         let col = 0;
         let markup = '';

         if (this.#maxRow > 9) return alert('configuration error !');

         if (!this.#maxRow && !this.#maxColumn) {
            markup += '<tr><td>no data found</td></tr>';
         } else {
            for (let i = 0; i < this.#maxRow; i++) {
               markup += '<tr>';
               for (let j = 0; j < this.#maxColumn; j++) {
                  markup += `<td>${floor}${col++}${row}</td>`;
               }
               col = 0;
               row++;
               markup += '</tr>';
            }
         }

         this.#tboady.innerHTML = '';
         this.#tboady.insertAdjacentHTML('beforeend', markup);
         this.#colspanCounter.setAttribute('colspan', this.#maxColumn);
         this.#floorCounter.innerText = this.#floor;
      }
   }

   class Ajax {
      #floorConfig = document.getElementById('floor-config');
      #rowConfig = document.getElementById('row-config');
      #columnConfig = document.getElementById('column-config');
      #tableConfigObj;


      constructor() {
         btnSearch.addEventListener('click', this.handleChange.bind(this));
      }

      async handleChange() {
         const floorReq = this.#floorConfig.value;
         const data =  await this.fetchConfig(floorReq); 
         if (!data) return this.#tableConfigObj = new TableConfig(0, 0, floorReq);

         const {floor, column, row} = data;

         this.#rowConfig.value = row;
         this.#columnConfig.value = column;
         this.#tableConfigObj = new TableConfig(row, column, floor);
      }

      fetchConfig(floor = 1) {
         return fetch(`ajax/request-floor.php?floor=${floor}`)
            .then(res => res?.json() ?? false);
      }
   }

   const ajax = new Ajax();

</script>