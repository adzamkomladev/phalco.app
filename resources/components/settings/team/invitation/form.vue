<script setup lang="ts">
const props = defineProps<{
    roles: App.Data.Settings.Team.RoleData[];
}>();
const form = useForm({
    method: "POST",
    url: route("settings.team.invitation.send"),
    fields: {
        email: "",
        role_id: null,
    },
    hooks: {
        success: () => router.get(route("settings.team.index")),
    },
});

const roles = props.roles.map((role: App.Data.Settings.Team.RoleData) => ({
    value: role.id,
    label: role.name,
}));
</script>
<template>
    <form @submit.prevent="form.submit">
        <div class="grid gap-y-8 px-2">
            <div class="flex flex-col justify-between gap-y-5">
                <SharedFormBaseInput
                    class="w-"
                    v-model="form.fields.email"
                    :error="form.errors.email"
                    id="email"
                    name="email"
                    type="email"
                    label="Email address"
                    placeholder="Email address"
                />

                <SharedFormBaseSelect
                    class=""
                    v-model="form.fields.role_id"
                    id="role_id"
                    name="role_id"
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
