<template>
  <div class="relative w-screen overflow-hidden scroll-smooth">
    <div
      ref="scrollContainerRef"
      class="flex overflow-x-scroll gap-20 scrollbar-hidden transition-all "
      style="scroll-behavior: smooth;"
      @mousemove="handleMouseMove"
    >
      <!-- Example content -->
      <div
        v-for="index in 4"
        @mouseover=""
        :key="index"
        class="flex-shrink-0 w-48 transition-all hover:scale-125 max-w-[70vw] aspect-square m-4 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center text-4xl font-bold text-primary-foreground"
      >
        {{ index }}
      </div>
    </div>
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-4">
      <button
        class="outline-none p-2 bg-gray-200 rounded hover:bg-gray-300"
        @click="handleScroll('left')"
        aria-label="Scroll left"
      >
        <ChevronLeft class="h-4 w-4" />
      </button>
      <button
        class="outline-none p-2 bg-gray-200 rounded hover:bg-gray-300"
        @click="handleScroll('right')"
        aria-label="Scroll right"
      >
        <ChevronRight class="h-4 w-4" />
      </button>
    </div>
  </div>
</template>

<script lang="ts" setup>



const scrollContainerRef = ref<HTMLDivElement | null>(null);
const scrollPosition = ref(0);
let animationFrameId: number | null = null;

const handleScroll = (direction: "left" | "right") => {
  if (!scrollContainerRef.value) return;

  const scrollAmount = scrollContainerRef.value.clientWidth / 2;
  const newScrollPosition =
    direction === "left"
      ? scrollPosition.value - scrollAmount
      : scrollPosition.value + scrollAmount;

  scrollPosition.value = newScrollPosition;

  scrollContainerRef.value.scrollTo({
    left: newScrollPosition,
    behavior: "smooth",
  });
};

const handleMouseMove = (e: MouseEvent) => {
  if (!scrollContainerRef.value || animationFrameId !== null) return;

  animationFrameId = requestAnimationFrame(() => {
    const container = scrollContainerRef.value!;
    const containerRect = container.getBoundingClientRect();
    const mouseX = e.clientX - containerRect.left; // Relative to the container
    const containerWidth = container.clientWidth;
    const maxScroll = container.scrollWidth - containerWidth;

    const mouseXPercentage = Math.max(0, Math.min(1, mouseX / containerWidth));
    const newScrollPosition = maxScroll * mouseXPercentage;

    scrollPosition.value = newScrollPosition;

    container.scrollTo({
      left: newScrollPosition,
      behavior: "smooth",
    });

    animationFrameId = null;
  });
};
</script>

<style scoped>
.scrollbar-hidden::-webkit-scrollbar {
  display: none;
}
</style>
