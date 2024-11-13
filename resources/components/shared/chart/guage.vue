<script setup lang="ts">
const props = defineProps<{ completed: number }>();

const gap = computed(() => {
    return props.completed <= 0 ? 0 : 1.5;
});

const conicStyle = computed(() => ({
    background: `conic-gradient(
    from 270deg,
    #0988D0 0deg ${props.completed * 1.8}deg,
    transparent ${props.completed * 1.8}deg ${(props.completed + gap.value) * 1.8}deg,
    #BFDBFE ${(props.completed + gap.value) * 1.8}deg 180deg,
    transparent 180deg 360deg
  )`,
}));
</script>

<template>
    <div class="aspect-[2/1] overflow-hidden px-[10%] pt-[10%]">
        <div
            :style="conicStyle"
            class="transition-all aspect-square rounded-t-full flex justify-center w-full p-[5%] pb-0"
        >
            <div
                class="aspect-[2/1] bg-white dark:bg-gray-800 rounded-t-full w-full justify-center flex self-start"
            >
                <div class="h-fit text-center self-end bottom-0">
                    <div
                        class="font-bold sm:text-3xl text-5xl _xs:text-3xl md:text-4xl xl:text-5xl"
                    >
                        {{ Number(completed.toFixed(2) || 0) }}%
                    </div>
                    <div
                        class="text-secondary-300 text-xl sm:text-lg md:text-xl font-bold leading-none"
                    >
                        completed
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
