<script setup lang="ts">
const props = defineProps<{
    roles: App.Data.Settings.Team.RoleData[];
}>();
</script>

<template>
    <SharedCommonOverlay title="Roles" size="xl"  useSheet description="Invite and manage members" subtitle="Role management" >
        <div >
            <SettingsTeamRoleTable :data="props.roles"  />
        </div>
    </SharedCommonOverlay>
</template>
