<template>
  <label class="block cursor-pointer">
    <input
      class="peer absolute scale-0"
      type="checkbox"

    />

    <span
      ref="contentSpan"
      class="block overflow-hidden transition-all duration-500"
      :style="{ maxHeight: isExpanded ? contentHeight : summaryHeight }"
    >
      <div
@click="togglePanel"
class=""
      ref="summaryRef" >
      <slot name="summary" >
      'Summary' 
      </slot>
      </div>

      <div class="pt-2">
        <slot />
      </div>
    </span>
  </label>
</template>

<script setup lang="ts">

const props = defineProps<{ summary?: string }>();

const contentSpan = ref<HTMLElement | null>(null);
const summaryRef = ref<HTMLElement | null>(null);
const isExpanded = ref(false);
const contentHeight = ref('0px');
const summaryHeight = ref('0px');

const togglePanel = () => {
  isExpanded.value = !isExpanded.value;
  contentHeight.value = isExpanded.value && contentSpan.value
    ? `${contentSpan.value.scrollHeight}px`
    : summaryHeight.value;
};

onMounted(() => {
  if (summaryRef.value) {
    summaryHeight.value = `${summaryRef.value.scrollHeight}px`;
  }
  contentHeight.value = summaryHeight.value;
});
</script>
