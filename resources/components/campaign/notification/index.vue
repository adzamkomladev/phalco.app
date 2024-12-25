<script setup lang="ts">
import NoNotificationImage from '~/resources/images/main/no_notification.png?svg'


const events = ref([
  {
    id: 1,
    title: 'Event 1',
    progress: 50,
    total: 1024 ,
    status: 'failed', 
    url: '',
  },
  {
    id: 2,
    title: 'Event 2',
    progress: 1024512,
    total: 1024512,
    status: 'completed',
    url: '',
  },
  {
    id: 3,
    title: 'Event 3',
    progress: 90243,
    total: 1024512,
    status: 'uploading',
    url: '',
  },
  {
    id: 3,
    title: 'Event 3',
    progress: 90243,
    total: 1024512,
    status: 'paused',
    url: '',
  },
]);

const handleEventAction = (action: string, id: number) => {
  console.log(`Action "${action}" performed for event ID: ${id}`);
  // Example: Update event status in the parent
  const event = events.value.find((e) => e.id === id);
  if (event) {
    if (action === 'pause') event.status = 'paused';
    if (action === 'resume') event.status = 'uploading';
    if (action === 'delete') events.value = events.value.filter((e) => e.id !== id);
  }
};
</script>

<template>

    <!-- File Uploading Progress Form -->
<SharedCommonCard class="h-full  !p-0">
  <div>
<img :src="NoNotificationImage"/>
  </div>
<div
v-if="events.length >3"
class="flex flex-col">

<AudiencesShowNotificationItem  

v-for="event in events"
      :key="event.id"
      :event="event"
      @pause="handleEventAction('pause', $event)"
      @resume="handleEventAction('resume', $event)"
/>
  <!-- Footer -->
  <div class="bg-gray-50 border-t border-gray-200 rounded-b-xl py-2 px-4 md:px-5 dark:bg-white/10 dark:border-neutral-700">
    <div class="flex flex-wrap justify-between items-center gap-x-3">
        <span class="text-sm font-semibold text-gray-800 dark:text-white">
          {{events.length}} left
        </span>
   
    </div>
  </div>
  <!-- End Footer -->
  </div>
</SharedCommonCard>
<!-- End File Uploading Progress Form -->
</template>