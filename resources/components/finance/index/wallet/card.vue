<script setup lang="ts">
const props = defineProps<{ name: string; balance: number; id: number }>();

// Calculate gradient class based on account number
const gradientClass = computed(() => `gradient-${props.id % 4}`);
</script>

<template>
    <SharedCommonCard
        style="
            --clip-color-before: #00000014;
            --clip-color-after: #0000001a;
            --clip-top-before: -85%;
            --clip-right-before: -25%;
            --clip-bottom-after: -85%;
            --clip-left-after: -25%;
            --clip-width: 80%;
        "
        class="font-medium text-white basis-1/2 shrink select-none px-[4%] clip-path-background overflow-hidden text-xs max-w-md flex flex-col justify-between bg-gradient aspect-[3.374/2.125] shadow-card _sm:shadow rounded-2xl relative"
        :class="gradientClass"
    >
        <div class="z-10 basis-1/2 justify-center flex flex-col">
            <p class="font-thin">Current Balance</p>
            <div class="min-h-fit">
                <p
                    class="font-bold text-[5vw] 2xl:text-4xl md:text-[2.5vw] leading-none pt-[5%]"
                >
                    GHS {{ balance }}
                </p>
            </div>
        </div>
        <div class="z-10">
            <p
                class="text-right pb-[2%] font-medium text-[3vw] md:text-[1.5vw] 2xl:text-lg capitalize"
            >
                {{ name }}
            </p>
            <div class="flex justify-between">
                <p
                    class="self-end font-mono whitespace-nowrap truncate text-[3vw] md:text-[1.5vw] 2xl:text-lg opacity-90"
                >
                    xxx-xxxx-xxx
                </p>
                <div class="text-xs flex gap-2 text-white">
                    <router-link
                        v-if="id"
                        :href="
                            route('finance.payments.withdraw', {
                                walletId: +id,
                            })
                        "
                        class="py-2 px-3 font-semibold text-sm bg-[#00000050] text-nowrap rounded-md leading-none h-fit"
                        >Withdraw
                    </router-link>
                    <router-link
                        v-if="id"
                        :href="
                            route('finance.payments.top-up', { walletId: +id })
                        "
                        class="py-2 px-3 font-semibold text-sm bg-[#00000050] text-nowrap rounded-md leading-none h-fit"
                    >
                        Top Up
                    </router-link>
                </div>
            </div>
        </div>
    </SharedCommonCard>
</template>

<style scoped>
.gradient-0 {
    @apply bg-gradient-to-br from-blue-500 to-green-500;
}
.gradient-1 {
    @apply bg-gradient-to-br from-purple-500 to-pink-500;
}
.gradient-2 {
    @apply bg-gradient-to-br from-primary-500 to-violet-500;
}
.gradient-3 {
    @apply bg-gradient-to-br from-teal-500 to-indigo-500;
}
.gradient-4 {
    @apply bg-gradient-to-br from-orange-500 to-yellow-500;
}

.clip-path-background::before,
.clip-path-background::after {
    content: "";
    position: absolute;
    width: var(--clip-width, 80%);
    aspect-ratio: 1/1;
    clip-path: circle(50% at 50% 50%);
    z-index: 0;
}

/* Top-right circle */
.clip-path-background::before {
    top: var(--clip-top-before, 0%);
    right: var(--clip-right-before, 0%);
    background: var(--clip-color-before, #3490dc20);
}

/* Bottom-left circle */
.clip-path-background::after {
    bottom: var(--clip-bottom-after, 0%);
    left: var(--clip-left-after, 0%);
    background: var(--clip-color-after, #ff9a9e20);
}
</style>
