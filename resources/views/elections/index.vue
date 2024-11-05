<script setup lang="ts">
useHead({
    title: "All Elections",
});

const totalUsers = ref(0);
onMounted(() => {
    window.EchoHub.channel("hello-world").listen(
        "Users.HelloWorld",
        (e: { newUsers: number }) => {
            console.log(e);
            totalUsers.value += e.newUsers;
        },
    );
});

const countdownProgress = ref(78.6);

/*onMounted(() => {
  const countdownInterval = setInterval(() => {
    if (countdownProgress.value < 100) {
      countdownProgress.value += 1;
    } else {
      clearInterval(countdownInterval);
    }
  }, 1000);

  onUnmounted(() => {
    clearInterval(countdownInterval);
  });
});

*/
</script>

<template layout="main">
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="py-5">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">
                All Elections
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Details all electios and statistics
            </p>
        </div>
        <div
            class="grid sm:grid-cols-2 gap-4 sm:gap-6 max-w-6xl self-center _sm:px-[5%]"
        >
            <!-- Card -->

            <ElectionsOngoingStatsCardCompleted
                :completionValue="countdownProgress"
                :daysLeft="10"
                numberOfVoters="1500"
            />
            <div class="flex flex-col gap-4 sm:gap-6">
                <!-- amount card -->
                <ElectionsOngoingStatsCardSmall
                    icon="cedi"
                    description="Total Amount spent on Election"
                    :value="'₵' + '150'"
                    class="grow"
                />

                <!-- amount card -->
                <ElectionsOngoingStatsCardSmall
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
                </ElectionsOngoingStatsCardSmall>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 pb-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border shadow-card border-gray-200 rounded-xl overflow-hidden dark:bg-neutral-800 dark:border-neutral-700"
                    >
                        <div>
                            <div
                                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
                            >
                                <div>
                                    <h2
                                        class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                                    >
                                        All Elections
                                    </h2>
                                    <p
                                        class="text-sm text-gray-600 dark:text-gray-400"
                                    >
                                        Table of all your elections
                                    </p>
                                </div>
                            </div>

                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700"
                            >
                                <!-- Input -->
                                <SharedFormSearchInput
                                    class="sm:col-span-1"
                                    placeholder="Search polling stations"
                                    name="search"
                                    modelValue=""
                                />

                                <!-- <router-link
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                :href="route('')"
                            >
                                View All
                            </router-link> -->
                            </div>
                        </div>

                        <ElectionsOngoingTable />

                        <div
                            class="px-6 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700"
                        >
                            <div>
                                <p
                                    class="text-sm text-gray-600 dark:text-neutral-400"
                                >
                                    <span
                                        class="font-semibold text-gray-800 dark:text-neutral-200"
                                        >12</span
                                    >
                                    results
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <button
                                        type="button"
                                        class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                    >
                                        <SharedCommonIcon
                                            name="chevron"
                                            class="-rotate-90"
                                        />
                                        Prev
                                    </button>

                                    <button
                                        type="button"
                                        class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                    >
                                        Next
                                        <SharedCommonIcon
                                            name="chevron"
                                            class="rotate-90"
                                        />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
