<script setup lang="ts">
const isScrollingUp = ref(true);
const isMouseNearHeader = ref(false);

let lastScrollY = 0;

const handleScroll = useDebounceFn(() => {
    const currentScrollY = window.scrollY;
    isScrollingUp.value = currentScrollY - 300 < lastScrollY;
    lastScrollY = currentScrollY;
}, 100);

const handleMouseMove = useDebounceFn((event: MouseEvent) => {
    const header = document.querySelector("header");
    if (header) {
        const { top, height } = header.getBoundingClientRect();
        isMouseNearHeader.value =
            event.clientY <= top + height && event.clientY >= top;
    }
}, 100);

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
    window.addEventListener("scroll", handleScroll);
    window.addEventListener("mousemove", handleMouseMove);

    const observer = new IntersectionObserver(handleIntersection, {
        root: null,
        rootMargin: "0px",
        threshold: 0.6,
    });

    document
        .querySelectorAll("section")
        .forEach((section) => observer.observe(section));
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
    window.removeEventListener("mousemove", handleMouseMove);
});
</script>

<template>
    <header
        class="sticky top-0 left-0 w-full z-50 bg-white transition-transform duration-300"
    >
        <div class="flex h-[5rem] items-center justify-center">
            <h1>
                <SharedCommonIcon name="logo_full" class="text-primary-500" />
            </h1>
        </div>

        <div
            class="transition-all duration-300 relative overflow-hidden"
            :class="{
                'translate-y-0 opacity-100 h-[2.8rem]':
                    isScrollingUp || isMouseNearHeader,
                '-translate-y-full opacity-0 h-0':
                    !isScrollingUp && !isMouseNearHeader,
            }"
        >
            <WelcomeHeaderMenu />
        </div>
    </header>
</template>
