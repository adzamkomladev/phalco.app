<script setup lang="ts">
const selectedElection = ref("slected election");
useHead({
    title: selectedElection,
});
</script>

<template layout="main">
    <div
        class="max-w-[85rem] px-4 py-5 flex flex-col gap-8 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 lg:py-14 mx-auto"
    >
        <div class="">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                Hey Komla
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <ElectionsSelectedCardsCompany />

        <div class="">
            <h2 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                Election Details
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Lorem ipsum dolor sit, amet consectetur
            </p>
        </div>

        <div
            class="grid md:grid-cols-2 _md:flex flex-col items-center px-auto xl:grid-cols-4 gap-4 sm:gap-6"
        >
            <ElectionsSelectedCardsDetail class="grow w-full" />
            <ElectionsSelectedCardsDetail class="grow w-full" />
            <ElectionsSelectedCardsDetail class="grow w-full" />
            <ElectionsSelectedCardsDetail class="grow w-full" />
        </div>

        <div
            class="grid grid-cols-7 _md:flex flex-col gap-4 sm:gap-6 _sm:px-[5%]"
        >
            <ElectionsSelectedCardsStagesVoting class="" />
            <ElectionsSelectedCardsTimeline class="" />

            <ElectionsSelectedCardsStagesNomination class="" />
            <ElectionsSelectedCardsTimeline class="" />

            <ElectionsSelectedCardsFinance class="" />
            <ElectionsSelectedCardsTimeline class="" />

            <ElectionsSelectedCardsStagesCampaign class="" />
            <ElectionsSelectedCardsTimeline class="" />
        </div>
    </div>
</template>
