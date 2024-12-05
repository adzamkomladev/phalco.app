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
    <div
        class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700"
    >
        <div>
            <div
                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
            >
                <div>
                    <h2
                        class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                    >
                        All transactions
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Most recent transactions
                    </p>
                </div>
            </div>

            <div
                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700"
            >
                <SharedFormSearchInput
                    class="sm:col-span-1"
                    placeholder="Search for payment"
                    name="search"
                    v-model="search"
                />
            </div>
        </div>
        <div class="w-full overflow-x-scroll">
            <table
                class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
            >
                <thead class="bg-gray-50 dark:bg-slate-800">
                    <tr>
                        <th scope="col" class="py-3 ps-6 text-start">
                            <label
                                for="hs-at-with-checkboxes-main"
                                class="flex"
                            >
                                <input
                                    type="checkbox"
                                    class="text-primary-600 border-gray-300 rounded shrink-0 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-primary-500 dark:checked:border-primary-500 dark:focus:ring-offset-gray-800"
                                    id="hs-at-with-checkboxes-main"
                                />
                                <span class="sr-only">Checkbox</span>
                            </label>
                        </th>
                        <th />
                        <SharedTableTh
                            v-for="(col, index) in table.columns"
                            :column="col"
                            :key="index"
                            :index="index"
                        />
                        <th scope="col" class="px-6 py-3 text-end"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <FinanceIndexTransactionsRow
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
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <span
                            v-if="table.paginator?.meta?.total >= 0"
                            class="font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ table.paginator?.meta?.total }}
                            <span class="font-normal">transactions</span></span
                        >
                        <span v-else> No transactions yet </span>
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
            </div>
            <!-- End Footer -->
        </div>
    </div>
</template>
