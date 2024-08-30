<script setup lang="ts">
const props = defineProps<{
    invitations: App.Data.Settings.Team.InvitationData[];
    roles: App.Data.Settings.Team.RoleData[];
}>();
</script>

<template>
    <SharedCommonOverlay title="Invitations" size="xl">
        <div class="grid gap-y-8">
            <SettingsTeamSendInvitationForm :roles="props.roles" />
            <SettingsTeamInvitationsTable :data="props.invitations" />
        </div>
    </SharedCommonOverlay>
</template>
