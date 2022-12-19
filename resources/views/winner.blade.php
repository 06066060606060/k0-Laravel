 @extends('layouts.app')

 @section('main')
     <div data-barba="container">
         <div class="z-0 one"></div>

         <container class="block px-4 mx-auto text-white max-w-7xl  min-h-screen">
             <div class="container px-5 pt-8 mx-auto">
                 <div class="flex flex-col w-full mb-20 text-center">
                     <h1 class="mb-4 text-4xl font-bold text-gray-300 md:text-5xl title-font">Tableau des scores</h1>
                     <section class="text-gray-300 body-font">
                         <div class="container px-5 py-8 mx-auto">
                             <div class="flex flex-col w-full mb-6 text-center">
                                 <p class="mx-auto text-base leading-relaxed">GoKdo est un site de <a
                                         class="text-blue-500">jeux gratuits</a></p>
                             </div>
                             <div class="flex justify-center  m-2">
                                 <div
                                     class="overflow-hidden overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
                                     <table class="min-w-full divide-y divide-gray-200 text-sm dark:divide-gray-700">
                                         <thead class="bg-gray-100 dark:bg-gray-800">
                                             <tr>
                                                
                                                 <th
                                                     class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                                                     <div class="flex items-center gap-2">
                                                         Jeux
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                                                     <div class="flex items-center gap-2">
                                                         Pseudo
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                                                     <div class="flex items-center gap-2">
                                                         Score
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                                                     <div class="flex items-center gap-2">
                                                         Date
                                                     </div>
                                                 </th>
                                                 <th
                                                     class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900 dark:text-white">
                                                     Bonus
                                                 </th>
                                             </tr>
                                         </thead>

                                         <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                         @forelse ($scores as $score)
                                              <tr class="dark:bg-gray-900">
                                                 <td
                                                     class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                                    {{ $score->game->name }}
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                                      {{ $score->user->name }}
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                                    {{ $score->score }}
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                                    {{ $score->created_at->format('d/m/Y') }}
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2">
                                                     <strong
                                                         class="rounded bg-red-100 px-3 py-1.5 text-xs font-medium text-red-700 dark:bg-red-600 dark:text-white">
                                                         {{ $score->data }}
                                                     </strong>
                                                 </td>
                                             </tr>
                                         @empty
                                              <tr class="dark:bg-gray-900">
                                                 <td
                                                     class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                                     null
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                                    null
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                                     null
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2 text-gray-700 dark:text-gray-200">
                                                     null
                                                 </td>
                                                 <td class="whitespace-nowrap px-4 py-2">
                                                     <strong
                                                         class="rounded bg-red-100 px-3 py-1.5 text-xs font-medium text-red-700 dark:bg-red-600 dark:text-white">
                                                         null
                                                     </strong>
                                                 </td>
                                             </tr>
                                         @endforelse
                                            

              
                                         </tbody>
                                     </table>
                                 </div>

                             </div>
                         </div>
                     </section>
                 </div>
             </div>
         </container>
     </div>
 @endsection
