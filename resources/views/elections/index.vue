<script setup lang="ts">
useHead({
    title: "All Elections",
});

const props = defineProps<{
    elections: Table<{
        id: number;
        name: string;
        status: string;
        current_stage: string;
        created_at: string;
    }>;
}>();

const totalUsers = ref(0);
// onMounted(() => {
//     window.EchoHub.channel("hello-world").listen(
//         "Users.HelloWorld",
//         (e: { newUsers: number }) => {
//             console.log(e);
//             totalUsers.value += e.newUsers;
//         },
//     );
// });

const countdownProgress = 78.55;
const table = useTable(props, "elections");
onMounted(() => {
    console.log(table, "teble election");
});
</script>

<template layout="main">
    <!-- Card Section -->

    <div
        class="max-w-[85rem] px-4 text-gray-800 dark:text-gray-300 sm:px-6 lg:px-8 mx-auto"
    >
        <!-- Grid -->
        <div class="pb-5">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                Elections
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Overview of all elections and their details
            </p>
        </div>
        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 self-center _sm:px-[5%]">
            <!-- Card -->

            <ElectionsIndexStatsCardCompleted
                :completionValue="countdownProgress"
                :daysLeft="10"
                numberOfVoters="1500"
            />
            
            <div class="flex flex-col gap-4 sm:gap-6">
                <!-- amount card -->
                <ElectionsIndexStatsCardSmall
                    icon="cedi"
                    description="Total Amount spent on Election"
                    :value="'₵' + '150'"
                    class="grow"
                />

                <!-- amount card -->
                <ElectionsIndexStatsCardSmall
                    icon="campaign_main"
                    description="Total election Campaigns"
                    :value="'3'"
                    class="grow"
                >
                    <div class="absolute top-5 right-5">
                        <SharedCommonIcon
                            name="tri"
                            class="rounded text-forest-500 size-7"
                            stroke-width="2"
                        />
                    </div>
                </ElectionsIndexStatsCardSmall>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
    <!-- Table Section -->
    <ElectionsIndexTable :table="table" />
</template>
