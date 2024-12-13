<script setup lang="ts">
const props = defineProps<{
    row: { key: any; value: any; extra: any };
    columns: any[];
    findColumn: (name: string) => any;
}>();

const { extra, value } = props.row;

const id = +extra(props.findColumn("amount"), "id");
const amount = +value(props.findColumn("amount"));
const reference = value(props.findColumn("gateway_reference"));
const gateway = value(props.findColumn("gateway"));
const status = value(props.findColumn("status"));
const createdAt = new Date(value(props.findColumn("created_at"))).toUTCString();
const avatar = extra(props.findColumn("account"), "avatar");
const name = value(props.findColumn("account"));
const description = extra(props.findColumn("account"), "description");
</script>

<template>
    <tr class="text-sm">
        <td class="size-px whitespace-nowrap">
            <div class="ps-6 py-3">
                <label for="hs-at-with-checkboxes-1" class="flex">
                    <input
                        type="checkbox"
                        class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        id="hs-at-with-checkboxes-1"
                    />
                    <span class="sr-only">Checkbox</span>
                </label>
            </div>
        </td>
        <td class="size-px w w-fit max-w-full">
            <div class="py-3 ps-6 lg:ps-3 pe-6">
                <div class="flex items-center gap-x-3">
                    <img
                        class="inline-block size-[38px] border rounded-full"
                        :src="avatar"
                        alt="Avatar"
                    />
                    <div class="grow">
                        <span
                            class="block whitespace-nowrap font-semibold text-gray-800 dark:text-gray-200"
                        >
                            {{ name }}
                        </span>
                        <span class="block text-xs text-gray-500">
                            {{ description }}
                        </span>
                    </div>
                </div>
            </div>
        </td>
        <td class="h-px w-fit whitespace-nowrap">
            <div
                class="px-6 py-3"
                :class="[amount >= 0 ? 'text-forest-300' : 'text-crimson-500']"
            >
                {{ "GHS " + amount }}
            </div>
        </td>

        <td class="size-px whitespace-nowrap w-fit text-gray-600">
            <div class="px-6 py-3">
                {{ reference }}
            </div>
        </td>
        <td class="size-px whitespace-nowrap w-fit text-gray-600">
            <div class="px-6 py-3 w-full">
                <SharedCommonIcon
                    name="paystack"
                    class="place-self-center size-6"
                />
                <p class="text-xs capitalize text-center">{{ gateway }}</p>
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-600 w-fit">
            <div class="px-6 py-3">
                <span
                    :class="[
                        status === 'success'
                            ? 'bg-forest-200 text-forest-700'
                            : 'bg-crimson-100 text-crimson-500',
                        'rounded-full py-1 px-4 text-xs ',
                    ]"
                >
                    {{ status }}
                </span>
            </div>
        </td>
        <td class="size-px whitespace-nowrap text-gray-600 w-fit">
            {{ createdAt }}
        </td>
        <td class="size-px whitespace-nowrap w-fit">
            <div class="px-6 py-1.5">
                <router-link
                    :href="route('finance.payments.show', { id })"
                    class="inline-flex items-center text-sm font-medium text-primary-600 cursor-pointer gap-x-1 decoration-2 hover:underline dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                >
                    <SharedTableShowDetail />
                </router-link>
            </div>
        </td>
    </tr>
</template>
