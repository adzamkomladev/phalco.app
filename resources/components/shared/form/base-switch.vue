<script setup lang="ts">
import { BaseToggleProps } from "~/resources/interfaces/shared/form.interface";

const props = withDefaults(defineProps<BaseToggleProps>(), {
    id: `input-${Math.random() * 1000}`,
});
const model = defineModel({ required: true });

const input = ref<HTMLInputElement | null>(null);
const focus = () => input.value?.focus();
const select = () => input.value?.select();
defineExpose({ focus, select });
</script>

<template>    
<label class="inline-flex items-center cursor-pointer">
  <input 
    ref="input"
    :id="props.id"
    :name="props.name"
    v-model="model"
  type="checkbox" 
  value="" 
  class="sr-only peer" 
  >
  <div class="relative w-11 _sm:scale-90 sm: h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
  <span v-if="label" class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Checked toggle</span>
</label>

</template>