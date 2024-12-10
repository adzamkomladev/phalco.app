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
    <div>
        <div
            class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700"
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
                            Members
                        </h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Invite and manage members.
                        </p>
                    </div>

                    <div>
                        <div class="inline-flex gap-x-2 text-center">
                            <router-link
                                class="w-24 shrink text-center items-center py-2 text-base  text-gray-400 bg-white border border-gray-200 rounded-md shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                :href="route('settings.team.roles')"
                            >
                                Roles
                            </router-link>

                            <router-link
                                :href="route('settings.team.invitations')"
                                class="inline-flex items-center w-24 px-3 py-2 text-sm  text-white bg-primary-500 border border-transparent rounded-md cursor-pointer gap-x-2 hover:opacity-90 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            >
                                <SharedCommonIcon name="plus" />
                                Invite
                            </router-link>
                        </div>
                    </div>
                </div>

                <div
                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700"
                >
                    <!-- Input -->
                    <SharedFormSearchInput
                        class="sm:col-span-1"
                        v-model="search"
                        placeholder="Search members"
                        name="search"
                    />
                </div>
            </div>

            <!-- End Header -->

            <!-- Table -->
            <table v-if="total > 0" class="w-full divide-y divide-gray-200 dark:divide-gray-700">
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
                    <SettingsTeamMembersRow
                        v-for="row in table.records"
                        :key="row.key"
                        :row="row"
                        :columns="table.columns"
                        :findColumn="findColumn"
                    />
                </tbody>
            </table>
            <div class="p-5 " v-else>
                <img :src="NoMemmbersFound" class="h-[50vh]  max-h-96 place-self-center " />
                <p class="text-black/50 text-center pt-4">no members yet!</p>
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
