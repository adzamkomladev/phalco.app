<script setup lang="ts">

</script>

<template>

    <!-- File Uploading Progress Form -->
<SharedCommonCard class=" flex flex-col !p-0">
  <!-- Body -->
  <div v-for="l in 2" class=" p-4 flex  gap-2 rounded-md hover:bg-gray-50 m-2">
    <div>
<img
src="https://via.placeholder.com/150"
class="size-12 rounded-full bg-slate-50"/>

    </div>
    <div class="grow grid gap-1">
      <!-- Uploading File Content -->
      <div class=" flex justify-between items-center">
        <div class="flex items-center ">
         
          <div>
            <p class="text-sm font-medium text-gray-800 dark:text-white">audience itle</p>
          </div>
        </div>
        <div class="inline-flex items-center gap-x-2">
          <button type="button" class="relative text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                      <SharedCommonIcon name="pause" />

            <span class="sr-only">Pause</span>
          </button>
          <button type="button" class="relative text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-500 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
                     <SharedCommonIcon name="trash" />

            <span class="sr-only">Delete</span>
          </button>
        </div>
      </div>
      <!-- End Uploading File Content -->

      <!-- Progress Bar -->
                  <p class="text-xs text-gray-500 dark:text-neutral-500 flex justify-between w-full  ">
                   <div class="flex gap-2"> <p class="text-primary-500">progress 50%</p> 
                    <p>7kb / 1Mb</p> 
                   
                   </div>
                    
                    <p>1 min ago</p>
                </p>

      <SharedCommonProgressBar hide-count-progress :progress="50" :total="100" height="6px" unloadedClass="bg-gray-100"  />
      <!-- End Progress Bar -->
    </div>
    
  </div>
  <!-- End Body -->

  <!-- Footer -->
  <div class="bg-gray-50 border-t border-gray-200 rounded-b-xl py-2 px-4 md:px-5 dark:bg-white/10 dark:border-neutral-700">
    <div class="flex flex-wrap justify-between items-center gap-x-3">
        <span class="text-sm font-semibold text-gray-800 dark:text-white">
          3 left
        </span>
   
    </div>
  </div>
  <!-- End Footer -->
</SharedCommonCard>
<!-- End File Uploading Progress Form -->
</template>