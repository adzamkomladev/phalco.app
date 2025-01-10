<script setup lang="ts">
const props = defineProps<{
    pages: { name: string; component: any }[];
    initialPage?: string;
    propsForComponent?: Record<string, any> | null;
}>();

const currentPage = ref(props.initialPage || props.pages[0]?.name);

const currentComponent = computed(() => {
    return (
        props.pages.find((page) => page.name === currentPage.value)
            ?.component || null
    );
});

function switchPage(pageName: string) {
    currentPage.value = pageName;
}
</script>

<template>
    <div>
        <div class="mt-4 flex gap-5">
            <button
                v-for="(page, index) in pages"
                :key="index"
                @click="switchPage(page.name)"
                class="py-2 relative mobile:text-sm text-sm"
                :aria-label="'Navigate to ' + page.name"
            >
                {{ page.name }}
                <div class="flex justify-around">
                    <div
                        class="bg-primary-500 h-[2px] duration-500 rounded-full"
                        :class="[
                            page.name == currentPage
                                ? 'w-full transition-all'
                                : 'w-0  ',
                        ]"
                    />
                </div>
            </button>
        </div>

        <transition name="fade" mode="out-in">
            <template v-if="currentComponent">
                <component
                    :is="currentComponent"
                    :key="currentPage"
                    v-bind="propsForComponent"
                />
            </template>
            <p v-else>No component available for this page.</p>
        </transition>
    </div>
</template>
<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
