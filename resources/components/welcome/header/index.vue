<script setup lang="ts">
const isScrollingUp = ref(true);
let lastScrollY = 0;

const handleScroll = () => {
    const currentScrollY = window.scrollY;

    isScrollingUp.value = currentScrollY - 300 < lastScrollY;
    lastScrollY = currentScrollY;
};

const handleIntersection = (entries: IntersectionObserverEntry[]) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const sectionId = entry.target.id;
            if (sectionId) {
                window.history.replaceState(null, "", `#${sectionId}`);
            }
        }
    });
};

onMounted(() => {
    const scrollHandler = debounce(handleScroll, 100);
    window.addEventListener("scroll", scrollHandler);

    const observer = new IntersectionObserver(handleIntersection, {
        root: null,
        rootMargin: "0px",
        threshold: 0.6,
    });

    document.querySelectorAll("section").forEach((section) => {
        observer.observe(section);
    });
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});

function debounce(func: Function, wait: number) {
    let timeout: number | null = null;
    return function (...args: any[]) {
        if (timeout) clearTimeout(timeout);
        timeout = setTimeout(() => func(...args), wait);
    };
}
</script>

<template>
    <header
        class="fixed top-0 left-0 w-full z-50 bg-white transition-transform duration-300"
    >
        <div class="flex h-[5rem] items-center justify-center">
            <h1 class="">
                <SharedCommonIcon name="logo_full" class="text-primary-500" />
            </h1>
        </div>

        <div
            class="transition-all duration-300 relative overflow-hidden"
            :class="{
                'translate-y-0 opacity-100 h-[2.8rem]  ':
                    isScrollingUp || isMouseNearHeader,
                '-translate-y-full opacity-0 h-0 delay-100':
                    !isScrollingUp && !isMouseNearHeader,
            }"
        >
            <WelcomeHeaderMenu />
        </div>
    </header>
</template>
