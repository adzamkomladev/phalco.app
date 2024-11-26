<script setup lang="ts">
// const props = defineProps<{
//     table: any;
// }>();

// const table = props.table;
// const paginator: any = table.paginator;
// const prev = computed(() => paginator?.links?.[0]);
// const current = computed(() => paginator?.links?.[1]);
// const next = computed(() => paginator?.links?.[2]);

// const findColumn = (name: string) =>
//     table.columns.find((column: any) => column?.name === name)!;
// const findFilter = (name: string) =>
//     table.filters.find((filter: any) => filter.name === name)!;

// const searchFilter = findFilter("search");
// const search = useQueryParameter("filters[search]");

// const debounceFn = useDebounceFn(
//     () =>
//         search.value !== ""
//             ? searchFilter.apply(search.value)
//             : searchFilter.clear(),
//     800,
// );

// watch(search, debounceFn);

const ElectionRequests = [
    {
        election_name: "Presidential Elections 202",
        date_sent: "2024-11-20",
        status: "Accepted",
    },
    {
        election_name: "Local Council Elections",
        date_sent: "2024-11-18",
        status: "Pending",
    },
    {
        election_name: "State Senate Elections",
        date_sent: "2024-11-15",
        status: "Rejected",
    },
    {
        election_name: "National Assembly Elections",
        date_sent: "2024-11-10",
        status: "Accepted",
    },
    {
        election_name: "Mayor Elections",
        date_sent: "2024-11-08",
        status: "Pending",
    },
    {
        election_name: "School Board Elections",
        date_sent: "2024-11-05",
        status: "Rejected",
    },
];
</script>
<template>
    <div class="px-8 overflow-x-hidden pb-10 mx-auto">
        <div class="flex flex-col">
            <div class="">
                <div class="  ">
                    <div class="">
                        <h2
                            class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                        >
                            All Elections
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            View All elections time Left
                        </p>
                    </div>

                    <div
                        class="py-4 flex gap-3 md:flex justify-between items-center"
                    >
                        <!-- Input -->
                        <SharedFormSearchInput
                            class="sm:col-span-1 w-full max-w-xl"
                            placeholder="Search for elections"
                            name="search"
                        />
                        <!-- v-model="search" -->

                        <router-link
                            href="/send-request"
                            class="inline-flex text-nowrap items-center px-3 py-2 text-xs font-medium text-white bg-secondary-300 border border-gray-200 rounded-lg shadow-sm gap-x-2 mobile:gap-1 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        >
                            <span class="text-sm font-thin">+ </span>Add Request
                        </router-link>
                    </div>
                </div>

                <div class="overflow-x-auto -mx-4 px-4">
                    <table class="min-w-full">
                        <tbody>
                            <HomeAgentsTableRow
                                v-for="(request, index) in ElectionRequests"
                                :key="index"
                                :request="request"
                            />
                        </tbody>
                    </table>
                </div>
                <!-- Footer -->
                <!-- <div
                            class="grid gap-3 px-6 py-4 border-t border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
                        >
                            <div>
                                <p
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >
                                    <span
                                        v-if="table.paginator?.meta?.total >= 0"
                                        class="font-semibold text-gray-800 dark:text-gray-200"
                                    >
                                        {{ table.paginator?.meta?.total }}
                                        <span class="font-normal"
                                            >elections</span
                                        ></span
                                    >
                                    <span v-else> No election yet </span>
                                </p>
                            </div>

                            <div v-if="prev.url || next.url">
                                <div class="inline-flex gap-x-2">
                                    <router-link
                                        v-if="prev.url"
                                        type="button"
                                        :href="prev.url"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    >
                                        <SharedCommonIcon
                                            name="chevron"
                                            class="size-4 -rotate-90"
                                        />
                                        Prev
                                    </router-link>

                                    <router-link
                                        v-if="next.url"
                                        type="button"
                                        :href="next.url"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    >
                                        Next
                                        <SharedCommonIcon
                                            name="chevron"
                                            class="size-4 rotate-90"
                                        />
                                    </router-link>
                                </div>
                            </div>
                        </div> -->
                <!-- End Footer -->
            </div>
        </div>
    </div>
</template>
