<script setup lang="ts">
import NoMemmbersFound from "~/resources/svg/main/no_data.svg?src";

const props = defineProps<{
    table: any;
}>();

const table = props.table;

const paginator: any = table.paginator;
const prev = computed(() => paginator?.links?.[0]);
const current = computed(() => paginator?.links?.[1]);
const next = computed(() => paginator?.links?.[2]);
const total = computed(() => paginator?.meta?.total);

const findColumn = (name: string) =>
    table.columns.find((column: any) => column?.name === name)!;
const findFilter = (name: string) =>
    table.filters.find((filter: any) => filter.name === name)!;

const searchFilter = findFilter("search");

const search = ref("");

const debounceFn = useDebounceFn(
    () =>
        search.value !== ""
            ? searchFilter.apply(search.value)
            : searchFilter.clear(),
    800,
);

watch(search, debounceFn);
</script>
<template>
    <div
        class="overflow-hidden relative h-full flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700"
    >
        <!-- Header -->
        <div>
            <div
                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
            >
                <div>
                    <h2
                        class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                    >
                        Polling Stations
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Manage all Polling Stations of an election
                    </p>
                </div>
                <div class="inline-flex gap-x-2">
                    <router-link
                        :href="route('elections.create')"
                        class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-primary-500 border border-transparent rounded-lg cursor-pointer gap-x-2 hover:opacity-90 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    >
                        <svg
                            class="flex-shrink-0 size-3"
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                        >
                            <path
                                d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                            />
                        </svg>
                        Add Polling Station
                    </router-link>
                </div>
            </div>
        </div>
        <div
            v-if="total > 0"
            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700"
        >
            <!-- Input -->
            <SharedFormSearchInput
                class="sm:col-span-1"
                v-model="search"
                placeholder="Search polling stations"
                name="search"
            />
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div v-if="table.records.length > 0" class="grow flex flex-col flex-1">
            <div
                class="w-full divide-y divide-gray-200 dark:divide-gray-700 p-4 grid gap-4 grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4"
            >
                <VotingPollingStationsIndexRow
                    v-for="{ key, value, extra } in table.records"
                    :key="key"
                    :id="extra(findColumn('name'), 'id')"
                    :name="value(findColumn('name'))"
                    :code="value(findColumn('code'))"
                    :votes="value(findColumn('votes'))"
                    :status="value(findColumn('status'))"
                />
            </div>

            <!-- End Table -->

            <!-- Footer -->
            <div
                v-if="total > 0"
                class="grid gap-3 px-6 py-4 border-t border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
            >
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <span
                            class="font-semibold text-gray-800 dark:text-gray-200"
                            >{{ table.records.length }}
                            <span class="font-normal">out of</span>
                            {{ total || 0 }}</span
                        >
                        results
                    </p>
                </div>

                <div>
                    <div class="inline-flex gap-x-2">
                        <router-link
                            v-if="prev.url"
                            type="button"
                            :href="prev.url"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        >
                            <svg
                                class="flex-shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m15 18-6-6 6-6" />
                            </svg>
                            Prev
                        </router-link>

                        <router-link
                            v-if="next.url"
                            type="button"
                            :href="next.url"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        >
                            Next
                            <svg
                                class="flex-shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer -->
        <div class="p-5" v-else>
            <img
                v-motion-pop-visible
                :src="NoMemmbersFound"
                class="h-[50vh] max-h-96 place-self-center"
            />
            <p class="text-black/50 text-center pt-4">
                <template v-if="search">
                    no Polling Station with detail
                    <span class="text-primary-500">{{ search }}</span>
                </template>
                <template v-else> no Polling Station added! </template>
            </p>
        </div>
    </div>
</template>
