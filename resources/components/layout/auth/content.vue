<script setup lang="ts">
const props = defineProps<{
    title?: string;
    description?: string;
    pageImage?:string;
}>();
// const authImage = ref(import(`../../../svg/auth/${props.pageImage}.svg`))
let authImage = ref(null);

onMounted(async () => {
    AuthImage.value = await import(`../../../svg/icon/${props.pageImage}.svg?component`);
});
</script>

<template>
    <div class="self-end portrait:pt-0 tall:pt-8 xtall:pt-16 md:text-sm">
        <div  class="text-center sm:landscape:text-left">
            <p
                class="text-black dark:text-primary-700 font-black text-2xl sm:text-3xl 2xl:text-4xl"
            >
            <span v-if="title">{{ title  }}</span>
             <slot v-else  name="title"/>

            </p>
            <p
                class="pb-4 text-gray-500 font-normal text-base md:text-lg"
            >
            <span v-if="description">{{ description }}</span>
            <slot v-else name="description"/>      
            </p>
        </div>

    <div class="grid justify-center dark:opacity-70">
        <slot  name="image"/>
            </div>
    <slot />
    </div>
</template>
