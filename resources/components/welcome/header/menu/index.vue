<script setup lang="ts">
const menus = ref([
    { to: "home" },
    { to: "service" },
    { to: "pricing" },
    { to: "contact" },
]);

const isScrollingUp = ref(true);
let lastScrollY = 0;

const handleScroll = () => {
    const currentScrollY = window.scrollY;
    isScrollingUp.value = currentScrollY < lastScrollY;
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
    const scrollHandler = debounce(handleScroll, 50);
    window.addEventListener("scroll", scrollHandler);

    const observer = new IntersectionObserver(handleIntersection, {
        root: null,
        rootMargin: "30px",
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
    <div
        class="flex sm:gap-10 md:gap-16 lg:gap-20 sm:w-fit sm:place-self-center items-center _sm:justify-evenly"
    >
        <WelcomeHeaderMenuLink
            v-for="(menu, index) in menus"
            :to="menu.to"
            :key="index"
        />
    </div>
</template>
