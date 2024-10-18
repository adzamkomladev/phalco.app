<script setup lang="ts">
const props = defineProps<{
    title?: string;
    description?: string;
    pageImage?: string;
}>();
// const authImage = ref(import(`../../../svg/auth/${props.pageImage}.svg`))
</script>

<template>
    <div class="self-end portrait:pt-0 tall:pt-8 xtall:pt-16 md:text-sm">
        <div class="text-center sm:landscape:text-left pb-6  portrait:flex flex-col items-center">
            <p
                class="text-black dark:text-primary-700 font-black text-2xl sm:text-3xl 2xl:text-4xl"
            >
                <span v-if="title">{{ title }}</span>
                <slot v-else name="title" />
            </p>
            <div>

          
            <p class="text-gray-500 portrait:max-w-[22rem] max-w-[28rem] block text-wrap text-base md:text-lg ">
                <span v-if="description">{{ description }}</span>
                <slot v-else name="description" />
            </p>  
        </div>
        </div>

        <div v-if="pageImage" class="pb-4 grid justify-center dark:opacity-70">
            <img :src="pageImage" class=" w-[24vw] portrait:w-[45vw] max-w-72 h-[24vw] portrait:h-[45vw] max-h-72" />
        </div>
        <slot />
    </div>
</template>
