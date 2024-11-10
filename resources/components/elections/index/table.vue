<script setup lang="ts">
const props = defineProps<{
    table: any;
}>();

const table = props.table;
const paginator: any = table.paginator;
const prev = computed(() => paginator?.links?.[0]);
const current = computed(() => paginator?.links?.[1]);
const next = computed(() => paginator?.links?.[2]);



const findColumn = (name: string) =>
    table.columns.find((column: any) => column?.name === name)!;
const findFilter = (name: string) =>
    table.filters.find((filter: any) => filter.name === name)!;

const searchFilter = findFilter("search");
const search = useQueryParameter("filters[search]");

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
    <div class="max-w-[85rem] px-4 pb-10 sm:px-6 lg:px-8 mx-auto">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border shadow-card border-gray-200 rounded-2xl overflow-hidden dark:bg-gray-800 dark:border-gray-700"
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
                                        View All elections
                                    </p>
                                </div>
                            </div>

                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700"
                            >
                                <!-- Input -->
                                <SharedFormSearchInput
                                    class="sm:col-span-1"
                                    placeholder="Search for elections"
                                    name="search"
                                    v-model="search"
                                />

                                <!-- <router-link
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                :href="route('')"
                            >
                                View All
                            </router-link> -->
                            </div>
                        </div>

                        <table
                            class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                        >
                            <thead class="bg-gray-50 dark:bg-slate-800">
                                <tr>
                                    <th
                                        scope="col"
                                        class="py-3 ps-6 text-start"
                                    >
                                        <label
                                            for="hs-at-with-checkboxes-main"
                                            class="flex"
                                        >
                                            <input
                                                type="checkbox"
                                                class="text-primary-600 border-gray-300 rounded shrink-0 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-primary-500 dark:checked:border-primary-500 dark:focus:ring-offset-gray-800"
                                                id="hs-at-with-checkboxes-main"
                                            />
                                            <span class="sr-only"
                                                >Checkbox</span
                                            >
                                        </label>
                                    </th>
                            <SharedTableTh 
                                v-for="(col, index) in table.columns"
                                :column="col"
                                :key="index"
                                :index="index"
                                />
                                    
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-end"
                                    ></th>
                                </tr>
                            </thead>

                            <tbody
                                class="divide-y divide-gray-200 dark:divide-gray-700"
                            >
                                <ElectionsIndexRow
                                    v-for="row in table.records"
                                    :key="row.key"
                                    :row="row"
                                    :columns="table.columns"
                                    :findColumn="findColumn"
                                />
                            </tbody>
                        </table>
                        <!-- Footer -->
                        <div
                            class="grid gap-3 px-6 py-4 border-t border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
                        >
                            <div>
                                <p
                                    class="text-sm text-gray-600 dark:text-gray-400"
                                >
                                    <span
                                        class="font-semibold text-gray-800 dark:text-gray-200"
                                        >{{
                                            table.paginator?.meta?.total || 0
                                        }}</span
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
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
