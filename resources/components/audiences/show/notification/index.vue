<script setup lang="ts">

</script>

<template>

    <!-- File Uploading Progress Form -->
<SharedCommonCard class=" flex flex-col !p-0">

<AudiencesShowNotificationItem  v-for="l in 2" />
  <!-- Footer -->
  <div class="bg-gray-50 border-t border-gray-200 rounded-b-xl py-2 px-4 md:px-5 dark:bg-white/10 dark:border-neutral-700">
    <div class="flex flex-wrap justify-between items-center gap-x-3">
        <span class="text-sm font-semibold text-gray-800 dark:text-white">
          2 left
        </span>
   
    </div>
  </div>
  <!-- End Footer -->
</SharedCommonCard>
<!-- End File Uploading Progress Form -->
</template>