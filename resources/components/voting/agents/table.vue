<script setup lang="ts">
const props = defineProps<{
    table: any;
}>();

const table = props.table;

const paginator: any = table.paginator;
const prev = computed(() => paginator?.links?.[0]);
const next = computed(() => paginator?.links?.[2]);
const total = computed(() => paginator?.meta?.total);

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
    <div>
        <div
            class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700"
        >
            <!-- Header -->
            <div>
                <div
                    class="grid gap-3  px-6 py-4 border-b border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
                >
                    <div>
                        <h2
                            class="text-xl font-semibold text-gray-800 dark:text-gray-200"
                        >
                            Agents
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Manage all Agents of an election
                        </p>
                    </div>

                    
                </div>

                <div
                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700"
                >
                    <!-- Input -->
                    <SharedFormSearchInput
                        class="sm:col-span-1"
                        v-model="search"
                        placeholder="Search agents"
                        name="search"
                    />
                </div>
            </div>

            <!-- End Header -->

            <!-- Table -->
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-slate-800">
                    <tr>
                        <th scope="col" class="py-3 ps-6 text-start">
                            <label
                                for="hs-at-with-checkboxes-main"
                                class="flex"
                            >
                                <input
                                    type="checkbox"
                                    class="text-blue-600 border-gray-300 rounded shrink-0 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                    id="hs-at-with-checkboxes-main"
                                />
                                <span class="sr-only">Checkbox</span>
                            </label>
                        </th>

                        <th
                            v-for="(col, index) in table.columns"
                            :key="index"
                            scope="col"
                            :class="{
                                'py-3 ps-6 lg:ps-3 xl:ps-0 pe-6 text-start':
                                    index === 0,
                                'px-6 py-3 text-start': index !== 0,
                            }"
                        >
                            <div class="flex items-center gap-x-2">
                                <span
                                    class="text-xs font-semibold tracking-wide text-gray-800 uppercase dark:text-gray-200"
                                >
                                    {{ col.label }}
                                </span>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-end"></th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr
                        v-for="{ key, value, extra } in table.records"
                        :key="key"
                    >
                        <td class="size-px whitespace-nowrap">
                            <div class="py-3 ps-6">
                                <label
                                    for="hs-at-with-checkboxes-1"
                                    class="flex"
                                >
                                    <input
                                        type="checkbox"
                                        class="text-blue-600 border-gray-300 rounded shrink-0 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        id="hs-at-with-checkboxes-1"
                                    />
                                    <span class="sr-only">Checkbox</span>
                                </label>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="py-3 ps-6 lg:ps-3 xl:ps-0 pe-6">
                                <div class="flex items-center gap-x-3">
                                    <img
                                        class="inline-block size-[38px] rounded-full"
                                        :src="
                                            extra(findColumn('name'), 'avatar')
                                        "
                                        alt="Avatar"
                                    />
                                    <div class="grow">
                                        <span
                                            class="block text-sm font-semibold text-gray-800 dark:text-gray-200"
                                            >{{
                                                value(findColumn("name"))
                                            }}</span
                                        >
                                        <span
                                            class="block text-sm text-gray-500"
                                        >
                                            {{
                                                extra(
                                                    findColumn("name"),
                                                    "email",
                                                )
                                            }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span
                                    class="text-sm font-bold text-gray-800 dark:text-gray-200"
                                    >{{ value(findColumn("polling_stations")) }}
                                </span>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="px-6 py-3">
                                <span
                                    class="text-sm font-bold text-gray-800 dark:text-gray-200"
                                    >{{ value(findColumn("added_on")) }}
                                </span>
                            </div>
                        </td>
                        <td class="size-px whitespace-nowrap">
                            <div class="px-6 py-1.5">
                                <!-- <a
                                    data-hs-overlay="#hs-overlay-create-user"
                                    class="inline-flex items-center text-sm font-medium text-blue-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                >
                                    Edit
                                </a> -->
                                <router-link
                                    :href="
                                        route('voting.agents.show', {
                                            id: +extra(
                                                findColumn('name'),
                                                'id',
                                            ),
                                        })
                                    "
                                    class="inline-flex items-center text-sm font-medium text-blue-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                >
                                    Details
                                </router-link>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div
                class="grid gap-3 px-6 py-4 border-t border-gray-200 md:flex md:justify-between md:items-center dark:border-gray-700"
            >
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <span
                            class="font-semibold text-gray-800 dark:text-gray-200"
                            >{{ total }}</span
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
</template>
