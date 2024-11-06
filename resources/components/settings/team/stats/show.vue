<script setup lang="ts">
defineProps<{ stats: App.Data.Settings.Team.InvitationStatsData }>();
</script>
<template>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <SettingsTeamStatsCard
                title="Members"
                type="g"
                :total="stats.totalMembers"
                :changePercentage="stats.changeMembers.percentage"
                :changeTotal="stats.changeMembers.total"
            />

            <SettingsTeamStatsCard
                title="invites"
                type="g"
                :total="stats.totalInvites"
                :changePercentage="stats.changeInvites.percentage"
                :changeTotal="stats.changeInvites.total"
            />

            <SettingsTeamStatsCard
                title="Rejections"
                type="r"
                :total="stats.totalRejections"
                :changePercentage="stats.changeRejections.percentage"
                :changeTotal="stats.changeRejections.total"
            />
        </div>
    </div>
</template>
