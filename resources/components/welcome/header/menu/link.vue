<script setup lang="ts">
import { onMounted, onBeforeUnmount, ref, computed } from "vue";

const props = defineProps<{ to: string }>();
const currentSection = ref("");

const updateActiveSection = (entries: IntersectionObserverEntry[]) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const sectionId = entry.target.id;
            currentSection.value = sectionId;
            // Update URL hash without adding to browser history
            history.replaceState(null, "", `#${sectionId}`);
        }
    });
};

onMounted(() => {
    const observer = new IntersectionObserver(updateActiveSection, {
        rootMargin: "10px",
        threshold: 0.1,
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
        class="relative group _xs:text-sm text-base md:text-lg text-black text-nowrap hover:text-primary-500 font-medium capitalize pb-4 focus:outline-none focus:text-neutral-300"
        :class="{ 'text-primary-500': isActive }"
        aria-current="page"
    >
        {{ to }}
        <p
            class="absolute h-[2px] bg-primary-400 transition-all"
            :class="{
                'w-full duration-700': isActive,
                'w-0 duration-400': !isActive,
            }"
        />
    </a>
</template>
