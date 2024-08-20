<script setup lang="ts">
onMounted(() => {
    setTimeout(() => {
        window.HSStaticMethods.autoInit();
    }, 100);
});
</script>

<template>
    <main class="flex items-center h-full py-16 bg-gray-100 dark:bg-slate-900">
        <section class="w-full max-w-xl p-6 mx-auto">
            <slot />
        </section>
    </main>
</template>
