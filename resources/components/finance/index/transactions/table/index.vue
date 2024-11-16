<script setup lang="ts">
const props = defineProps<{
    table: any;
}>();

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

const damy_table =[
  {
    "image": "https://example.com/image1.jpg",
    "name": "John Doe",
    "description": "Purchase of office supplies",
    "status": "completed",
    "amount": 120.50,
    "reference": "TRX1234567890",
    "completed_on": "2024-11-15T14:30:00"
  },
  {
    "image": "https://example.com/image2.jpg",
    "name": "Jane Smith",
    "description": "Monthly subscription fee",
    "status": "completed",
    "amount": 49.99,
    "reference": "TRX0987654321",
    "completed_on": "2024-11-10T10:15:00"
  },
  {
    "image": "https://example.com/image3.jpg",
    "name": "Michael Brown",
    "description": "Refund for returned product",
    "status": "incomplete",
    "amount": -75.00,
    "reference": "TRX1122334455",
    "completed_on": "2024-11-08T08:45:00"
  },
  {
    "image": "https://example.com/image4.jpg",
    "name": "Emily Jones",
    "description": "Online course payment",
    "status": "completed",
    "amount": 200.00,
    "reference": "TRX6677889900",
    "completed_on": "2024-11-14T16:20:00"
  },
  {
    "image": "https://example.com/image5.jpg",
    "name": "Chris Wilson",
    "description": "Donation to charity",
    "status": "incomplete",
    "amount": -150.00,
    "reference": "TRX5544332211",
    "completed_on": "2024-11-12T12:00:00"
  }
]



// watch(search, debounceFn);
</script>
<template>
    <div class="max-w-[85rem]  pb-10 mx-auto ">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border shadow-md border-gray-200 rounded-2xl overflow-hidden dark:bg-gray-800 dark:border-gray-700"
                    >
                        <div>
                            <div
                                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
                            >
                                <div>
                                    <h2
                                        class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                                    >
                                        Recent Transactions
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
                                <!-- <SharedFormSearchInput
                                    class="sm:col-span-1"
                                    placeholder="Search for elections"
                                    name="search"
                                    v-model="search"
                                /> -->
                                <SharedFormSearchInput
                                    class="sm:col-span-1"
                                    placeholder="Search for elections"
                                    name="search"
                                />

                         
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
                                    <!-- <SharedTableTh
                                        v-for="(col, index) in table.columns"
                                        :column="col"
                                        :key="index"
                                        :index="index"
                                    /> -->
<th></th>
                                    <th
        scope="column"
        :class="{
            'py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start': false,
            'px-6 py-3 text-start': true,
        }"
    >
        <div
            class="flex items-center gap-x-2"
        >
            <span
                class="text-xs font-semibold gap-2 items-center flex tracking-wide text-gray-800 uppercase dark:text-gray-200"
            >
               Amount
            </span>
        </div>
    </th>
<th
        scope="column"
        :class="{
            'py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start': false,
            'px-6 py-3 text-start': true,
        }"
    >
        <div
            class="flex items-center gap-x-2"
        >
            <span
                class="text-xs font-semibold gap-2 items-center flex tracking-wide text-gray-800 uppercase dark:text-gray-200"
            >
               Reference
            </span>
        </div>
    </th>
<th
        scope="column"
        :class="{
            'py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start': false,
            'px-6 py-3 text-start': true,
        }"
    >
        <div
            class="flex items-center gap-x-2"
        >
            <span
                class="text-xs font-semibold gap-2 items-center flex tracking-wide text-gray-800 uppercase dark:text-gray-200"
            >
               Status
            </span>
        </div>
    </th>
<th
        scope="column"
        :class="{
            'py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start': false,
            'px-6 py-3 text-start': true,
        }"
    >
        <div
            class="flex items-center gap-x-2"
        >
            <span
                class="text-xs font-semibold gap-2 items-center flex tracking-wide text-gray-800 uppercase dark:text-gray-200"
            >
               Compeed On
            </span>
        </div>
    </th>
                           <th
                                        scope="col"
                                        class="px-6 py-3 text-end"
                                    ></th>
                                </tr>
                            </thead>

                            <tbody
                                class="divide-y divide-gray-200 dark:divide-gray-700"
                            >
                                <!-- <ElectionsIndexRow
                                    v-for="row in table.records"
                                    :key="row.key"
                                    :row="row"
                                    :columns="table.columns"
                                    :findColumn="findColumn"
                                /> -->
                                <FinanceIndexTableRow
                                    v-for="row in damy_table"
                                    :key="key"
                                    :row="row"
                                  
                                />

                            </tbody>
                        </table>
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
        </div>
    </div>
</template>
