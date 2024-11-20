<script setup lang="ts">
import { TableHeadProps } from "~/resources/interfaces/table/index.interface";

const props = defineProps<TableHeadProps>();
</script>

<template>
    <th
        scope="column"
        :class="{
            'py-3 ps-6  lg:ps-3  pe-6 text-start': index === 0,
            'px-6 py-3 text-start': index !== 0,
        }"
        class=""
    >
        <div
            class="flex items-center gap-x-2"
            @click="
                () => {
                    if (column.isSortable) {
                        column.toggleSort();
                    }
                }
            "
            :class="[
                column.isSortable && 'cursor-pointer',
                index != 0 ? 'place-content-center' : '',
            ]"
        >
            <span
                class="text-xs font-semibold gap-2 items-center flex tracking-wide text-gray-800 uppercase dark:text-gray-200 sm:text-nowrap"
            >
                {{ column.label }}
                <span
                    v-if="column.isSortable"
                    class="size-5 grid place-content-center"
                >
                    <SharedCommonIcon
                        v-if="
                            column.isSorting('asc') | column.isSorting('desc')
                        "
                        name="arrow_up"
                        stroke-width="1"
                        class="h-4 text-gray-500"
                        :class="{ 'rotate-180': column.isSorting('desc') }"
                    />
                    <SharedCommonIcon
                        v-else
                        name="chevron_double"
                        class="h-4"
                    />
                </span>
            </span>
        </div>
    </th>
</template>
