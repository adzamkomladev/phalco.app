<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from "vue";

const props = defineProps<{ to: string }>();

const currentSection = ref("");

const updateActiveSection = (entries: IntersectionObserverEntry[]) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            currentSection.value = entry.target.id;
        }
    });
};

onMounted(() => {
    const observer = new IntersectionObserver(updateActiveSection, {
        root: null,
        threshold: 0.5,
    });

    document.querySelectorAll("section").forEach((section) => {
        observer.observe(section);
    });

    onBeforeUnmount(() => {
        observer.disconnect();
    });
});

const isActive = computed(() => currentSection.value === props.to);
</script>

<template>
    <a
        :href="'#' + to"
        class="relative group text-base md:text-lg text-black text-nowrap hover:opacity-90 font-bold capitalize md:py-4 focus:outline-none focus:text-neutral-300"
        :class="{ 'text-primary-500': isActive }"
        aria-current="page"
    >
        {{ to }}
        <p
            class="absolute h-[2px] _md:hidden bg-primary-400 group-hover:w-full transition-all"
            :class="{
                'w-full duration-700': isActive,
                'w-0 duration-400': !isActive,
            }"
        />
    </a>
</template>
