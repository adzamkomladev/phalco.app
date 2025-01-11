<script lang="ts" setup>
const scrollContainerRef = ref<HTMLDivElement | null>(null);
const scrollPosition = ref(0);

const { width: containerWidth } = useElementBounding(scrollContainerRef);

const handleMouseMove = (event: MouseEvent) => {
    if (!scrollContainerRef.value || !containerWidth.value) return;

    const container = scrollContainerRef.value;
    const { left, width } = container.getBoundingClientRect();
    const mouseX = event.clientX - left;
    const maxScroll = container.scrollWidth - width;

    scrollPosition.value = Math.min(
        Math.max((mouseX / width) * maxScroll, 0),
        maxScroll,
    );

    container.scrollTo({
        left: scrollPosition.value,
        behavior: "smooth",
    });
};
</script>
<template>
    <div class="relative w-screen max-w-full scroll-smooth overflow-y-visible">
        <div
            ref="scrollContainerRef"
            class="overflow-x-scroll gap-5 py-6 overflow-y-visible px-20 scrollbar-hidden transition-all flex items-center"
            style="scroll-behavior: smooth"
            @mousemove="handleMouseMove"
        >
            <slot />
        </div>
    </div>
</template>

<style scoped>
.scrollbar-hidden::-webkit-scrollbar {
    display: none;
}
</style>
