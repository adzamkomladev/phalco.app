<script setup lang="ts">
const props = defineProps<{
    row: { key: any; value: any; extra: any };
    columns: any[];
    findColumn: (name: string) => any;
}>();

const { key, value, extra } = props.row;
</script>

<template>
    <tr :key="key">
        <td class="size-px whitespace-nowrap">
            <div class="py-3 ps-6">
                <label for="hs-at-with-checkboxes-1" class="flex">
                    <input
                        type="checkbox"
                        class="text-primary-600 border-gray-300 rounded shrink-0 focus:ring-primary-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-primary-500 dark:checked:border-primary-500 dark:focus:ring-offset-gray-800"
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
                        :src="extra(findColumn('name'), 'avatar')"
                        alt="Avatar"
                    />
                    <div class="grow">
                        <span
                            class="block text-sm font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ value(findColumn("name")) }}
                        </span>
                        <span class="block text-sm text-gray-500">
                            {{ extra(findColumn("name"), "email") }}
                        </span>
                    </div>
                </div>
            </div>
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 py-3">
                <span
                    class="block text-sm font-semibold text-gray-800 dark:text-gray-200 capitalize"
                >
                    {{ value(findColumn("position")) }}
                </span>
                <span class="block text-sm text-gray-500">
                    {{ extra(findColumn("position"), "role") }}
                </span>
            </div>
        </td>
        <td class="size-px whitespace-nowrap">
            <SharedTableStatus :status="value(findColumn('status'))" />
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 py-3">
                <div class="flex items-center gap-x-3">
                    <span class="text-sm text-gray-800 dark:text-gray-200">
                        {{
                            value(findColumn("last_seen")) === "online"
                                ? "Online"
                                : value(findColumn("last_seen"))
                        }}
                    </span>
                </div>
            </div>
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 py-3">
                <span class="text-sm font-bold text-gray-800 dark:text-gray-200"
                    >{{ value(findColumn("added_on")) }}
                </span>
            </div>
        </td>
        <td class="size-px whitespace-nowrap">
            <div class="px-6 group py-1.5">
                <a
                    data-hs-overlay="#hs-overlay-create-user"
                    class="inline-flex items-center text-sm font-medium text-primary-500 hover:text-primary-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    <SharedCommonIcon
                        stroke="#05496f"
                        name="detail"
                        class="group-hover:scale-[1.1] transition-all"
                    />
                </a>
            </div>
        </td>
    </tr>
</template>
