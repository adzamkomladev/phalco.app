<script setup lang="ts"></script>

<template>
    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
        <thead class="bg-gray-50 dark:bg-neutral-800">
            <tr>
                <th scope="col" class="ps-6 py-3 text-start">
                    <label for="hs-at-with-checkboxes-main" class="flex">
                        <input
                            type="checkbox"
                            class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                            id="hs-at-with-checkboxes-main"
                        />
                        <span class="sr-only">Checkbox</span>
                    </label>
                </th>

                <th
                    scope="col"
                    class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start"
                >
                    <div class="flex items-center gap-x-2">
                        <span
                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200"
                        >
                            Name
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span
                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200"
                        >
                            Status
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span
                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200"
                        >
                            Date issued
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            <ElectionsOngoingTableRow />
        </tbody>
    </table>
</template>
