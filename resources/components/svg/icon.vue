<script setup lang="ts">
const icons = {
    apple: defineAsyncComponent(() => import("./icon/apple.vue")),
    arrow_back: defineAsyncComponent(() => import("./icon/arrow_back.vue")),
    wallet: defineAsyncComponent(() => import("./icon/wallet.vue")),
    diamond: defineAsyncComponent(() => import("./icon/diamond.vue")),
    campagaign: defineAsyncComponent(() => import("./icon/campaign.vue")),
    file: defineAsyncComponent(() => import("./icon/file.vue")),
    rocket: defineAsyncComponent(() => import("./icon/rocket.vue")),
    shield: defineAsyncComponent(() => import("./icon/shield.vue")),
    hexagon: defineAsyncComponent(() => import("./icon/hexagon.vue")),
    google: defineAsyncComponent(() => import("./icon/google.vue")),
    x: defineAsyncComponent(() => import("./icon/x.vue")),
    ballot_box: defineAsyncComponent(() => import("./icon/ballot_box.vue")),
    fire: defineAsyncComponent(() => import("./icon/fire.vue")),
};

const props = withDefaults(
    defineProps<{
        name?: keyof typeof icons;
        size?: number;
        color?: string;
    }>(),
    { size: 24, color: "#000", name: "diamond" },
);
</script>

<template>
    <component
        :is="icons[name]"
        :style="{ height: size + 'px', color: color }"
    />
</template>
