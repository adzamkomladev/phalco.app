<script setup lang="ts">
const contentSpan = ref<HTMLElement | null>(null);
const innerContent = ref<HTMLElement | null>(null);
const isExpanded = ref(false);
const contentHeight = ref("0px");

const togglePanel = async () => {
    isExpanded.value = !isExpanded.value;
    await updateContentHeight();
};

const updateContentHeight = async () => {
    await nextTick();
    contentHeight.value =
        isExpanded.value && contentSpan.value
            ? `${contentSpan.value.scrollHeight}px`
            : "0px";
};

let resizeObserver: ResizeObserver | null = null;

const observeInnerContent = () => {
    if (innerContent.value) {
        resizeObserver = new ResizeObserver(async () => {
            if (isExpanded.value) {
                await updateContentHeight();
            }
        });
        resizeObserver.observe(innerContent.value);
    }
};

onMounted(() => {
    observeInnerContent();
    updateContentHeight();
});

onUnmounted(() => {
    if (resizeObserver && innerContent.value) {
        resizeObserver.unobserve(innerContent.value);
        resizeObserver.disconnect();
    }
});
</script>

<template>
    <label class="block cursor-pointer">
        <input class="peer absolute scale-0" type="checkbox" />

        <div @click="togglePanel" ref="summaryRef">
            <slot name="summary"> 'Summary' </slot>
        </div>

        <span
            ref="contentSpan"
            class="block overflow-hidden transition-all duration-300 ease-in-out"
            :style="{ maxHeight: isExpanded ? contentHeight : '0px' }"
        >
            <div ref="innerContent">
                <slot />
            </div>
        </span>
    </label>
</template>
