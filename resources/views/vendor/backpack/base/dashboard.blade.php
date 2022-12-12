@php use \App\Http\Controllers\GlobalController; @endphp
@php  $version = GlobalController::version();@endphp
@extends(backpack_view('blank'))
@section('content')
    <section class="text-gray-600 body-font">
      <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50">
          <main>
              <div class="px-4 pt-6">
                  <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">

                      <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 2xl:col-span-2">
                          <div class="flex items-center justify-between mb-4">

                              {{-- <div class="flex-shrink-0">
                                  <span id="total-container"
                                      class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">
                                     450 €</span>
                                  <h3 class="text-base font-normal text-gray-500 lemois"></h3>
                              </div>
                              <!-- <i class="hidden fa-solid fa-arrow-left" onclick="otherMonth('preview')"></i>
                              <i class="hidden fa-solid fa-arrow-right" onclick="otherMonth('next')"></i> -->
                              <select name="Affichage"
                                  class="h-8 px-2 py-1 mx-1 my-1 text-center border rounded my_select md:text-sm"
                                  id="selectfilter" onchange="runget(this.value)">
                                  <option id="optionx" value="week" selected>Semaine</option>
                                  <option id="optionx" value="month">mois</option>
                              </select> --}}
                          </div>

                          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                      </div>
                      <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                          <div class="flex items-center justify-between mb-4">
                              <div>
                                  <h3 class="mb-2 text-xl font-bold text-gray-900">Utilisateurs</h3>
                                  <span class="text-base font-normal text-gray-500">Derniéres Inscriptions</span>
                              </div>
                              <div class="flex-shrink-0">
                                  <a href="user/"
                                      class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">Tout
                                      voir</a>
                              </div>
                          </div>
                          <div class="flex flex-col mt-8">
                              <div class="overflow-x-auto rounded-lg">
                                  <div class="inline-block min-w-full align-middle">
                                      <div class="overflow-hidden shadow sm:rounded-lg">
                                          <table class="min-w-full divide-y divide-gray-200">
                                              <thead class="bg-gray-50">
                                                  <tr>
                                                      <th scope="col"
                                                          class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                          Nom
                                                      </th>
                                                      <th scope="col"
                                                          class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                          Email
                                                      </th>
                                                  </tr>
                                              </thead>
                                              <tbody class="bg-white">
                                                  @php  $users = GlobalController::getUsers();@endphp
                                                  @foreach ($users as $user)
                                                  <tr>
                                                    <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap time-container">
                                                         {{$user->name}}
                                                </td>
                                                <td
                                                    class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap rate-container">   
                                                    {{$user->email}}
                                                </td>
                                            </tr>
                                                    @endforeach
                                                    
                                              </tbody>
                                          </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
 
          </main>
   
      </div>
  </div>
          @if (backpack_user()->role == 'admin')
        <p class="w-1/2 px-4 py-2 mx-8 mt-4 text-xs text-gray-200 bg-gray-900 -pl-2">
             Derniéres mise à jour:  {{ $version }}<br>
        </p>
       
    @endif
</div>
</body>
{{-- <script>
    function PopupUser() {
        console.log('okpop');
        var updateElement = document.getElementById("popmenu");
        updateElement.classList.toggle("active");

    }
</script>

<style>
    #popmenu {
        position: fixed;
        top: -50px;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: 0.25s;
        border-radius: 8px;
        user-select: none;
        overflow: hidden;

    }

    #popmenu.active {
        top: 80px;
        transition: 0.3s;
        transition: 0.25s;
    }
</style> --}}

{{-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    window.onload = function() {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Statistiques"
        },
        axisX: {
            title: ""
        },
        axisY: {
            title: "",
            suffix: "%",
            includeZero: true
        },
        data: [{
            type: "line",
            name: "CPU Utilization",
            connectNullData: true,
            //nullDataLineDashType: "solid",
            xValueType: "dateTime",
            xValueFormatString: "DD MMM hh:mm TT",
            yValueFormatString: "#,##0.##\"%\"",
            dataPoints: [
                { x: 1501048673000, y: 35.939 },
                { x: 1501052273000, y: 40.896 },
                { x: 1501055873000, y: 56.625 },
                { x: 1501059473000, y: 26.003 },
                { x: 1501063073000, y: 20.376 },
                { x: 1501066673000, y: 19.774 },
                { x: 1501070273000, y: 23.508 },
                { x: 1501073873000, y: 18.577 },
                { x: 1501077473000, y: 15.918 },
                { x: 1501081073000, y: null }, // Null Data
                { x: 1501084673000, y: 10.314 },
                { x: 1501088273000, y: 10.574 },
                { x: 1501091873000, y: 14.422 },
                { x: 1501095473000, y: 18.576 },
                { x: 1501099073000, y: 22.342 },
                { x: 1501102673000, y: 22.836 },
                { x: 1501106273000, y: 23.220 },
                { x: 1501109873000, y: 23.594 },
                { x: 1501113473000, y: 24.596 },
                { x: 1501117073000, y: 31.947 },
                { x: 1501120673000, y: 31.142 }
            ]
        }]
    });
    chart.render();
    
    }
    </script>
  <style>
      .canvasjs-chart-credit {
          display: none;
      }
  
      .chartContainer > img {
          display: none;
      }
  </style> --}}
    </section>

   
@endsection
