<script setup lang="ts">
import { ref, computed } from 'vue';

interface EventProps {
  id: number;
  title: string;
  progress: number;
  total: number;
  status: 'paused' | 'uploading' | 'completed' | 'failed';
  url: string;
}

const props = defineProps<{
  event: EventProps;
}>();

const emit = defineEmits<{
  (e: 'pause', id: number): void;
  (e: 'resume', id: number): void;
  (e: 'delete', id: number): void;
  (e: 'stop', id: number): void;
}>();

// Check if the event is passed or completed
const isCompleted = computed(() => props.event.status === 'completed');
const isUploading = computed(() => props.event.status === 'uploading');
const isPaused = computed(() => props.event.status === 'paused');

const handleAction = async (action: 'pause' | 'resume' | 'delete' | 'stop') => {
        // route(`${props.event.url)/action,{id:props.event.id});

  try {
    const response = await fetch(props.event.url, {
      method: 'POST',
      body: JSON.stringify({ action, id: props.event.id }),
    });
    if (response.ok) {
      emit(action, props.event.id);
    } else {
      console.error('Action failed:', action);
    }
  } catch (error) {
    console.error('Error performing action:', error);
  }
};
</script>

<template>
  <div class="p-4 flex gap-2 rounded-md hover:bg-gray-50 hover:dark:bg-gray-900 m-2 transition-all">
    <div>
      <img
        src="https://via.placeholder.com/150"
        class="size-12 rounded-full bg-slate-50"
        alt="Event Thumbnail"
      />
    </div>
    <div class="grow grid gap-1">
      <div class="flex justify-between items-center">
        <p class="text-sm font-medium text-gray-800 dark:text-white">
          {{ props.event.title }}
        </p>
        <div class="inline-flex items-center gap-x-2">
          <div class="flex items-center ">
            <SharedCommonIcon v-if="event.status==='completed'" class="size-5 text-teal-500 " name="check_solid"/>
            <SharedCommonIcon v-if="event.status==='failed'" name="failed"/>
          </div>
          <button
            v-if="isUploading"
            @click="handleAction('pause')"
            type="button"
            class="relative text-gray-500 hover:scale-[1.3] transition-all hover:text-gray-800 focus:outline-none"
          >
            <SharedCommonIcon name="pause" />
            <span class="sr-only">Pause</span>
          </button>
          <button
            v-if="isPaused"
            @click="handleAction('resume')"
            type="button"
            class="relative text-gray-500 hover:scale-[1.2] transition-all hover:text-gray-800 focus:outline-none"
          >
            <SharedCommonIcon name="resume" />
            <span class="sr-only">Resume</span>
          </button>
          <button
            @click="handleAction('delete')"
            type="button"
            class="relative text-gray-500 hover:scale-[1.2] transition-all hover:text-crimson-500 focus:outline-none"
          >
            <SharedCommonIcon name="trash" />
            <span class="sr-only">Delete</span>
          </button>
        </div>
      </div>
      <div class="text-xs text-gray-500 dark:text-neutral-500 flex justify-between w-full">
        <div class="flex gap-2">
          <p class="text-primary-500">Progress {{ props.event.progress }}%</p>
          <p>{{ props.event.total / 1024 }} MB</p>
        </div>
        <p>{{ props.event.status }}</p>
      </div>
      <SharedCommonProgressBar
        :progress="props.event.progress"
        :total="props.event.total"
        height="6px"
        :unloaded-class="[event.status==='failed' ? 'bg-crimson-100':(event.status==='completed' ? 'bg-teal-100':'bg-gray-100')]"
        :loaded-class="[event.status==='failed' ? 'bg-crimson-500':(event.status==='completed' ? 'bg-teal-500':(isPaused ? 'bg-gray-400':'bg-primary-400'))]"
        />
    </div>
  </div>
</template>
