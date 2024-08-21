<script setup lang="ts">
const form = useForm({
    method: "POST",
    url: route("settings.team.invitation.send"),
    fields: {
        email: "",
        role: "",
    },
});

const roles = [
    { label: "Admin", value: "admin" },
    { label: "Agent", value: "agent" },
    { label: "Member", value: "member" },
];
</script>
<template>
    <form @submit.prevent="form.submit">
        <div class="grid gap-y-3">
            <div class="flex flex-row justify-between">
                <SharedFormBaseInput
                    class="basis-3/7"
                    v-model="form.fields.email"
                    :error="form.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    label="Email address"
                    placeholder="Email address"
                />

                <SharedFormBaseSelect
                    class="basis-3/7"
                    v-model="form.fields.role"
                    id="role"
                    name="role"
                    :options="roles"
                    label="Role"
                />
            </div>

            <button
                type="submit"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
            >
                Send invitation
            </button>
        </div>
    </form>
</template>
