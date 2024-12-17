<script setup lang="ts">
const services = ref([
    {
        title: "Performance",
        description:
            "Our platform offers speed of execution of all related tasks",
        icon: { name: "rocket", color: "#07689F" },
    },
    {
        title: "Vetting",
        description: "We offer vetting tools to ensure accuracy when selecting candidates",
        icon: { name: "ballot_box", color: "#595BD4" },
    },
    {
        title: "Team Management",
        description:
            "Need more helping hands? Invite them to your organization",
        icon: { name: "file", color: "#C9994D" },
    },
    {
        title: "Transactions",
        description:
            "Payment options are available to receive and send money in your account",
        icon: { name: "wallet", color: "#D19FB2" },
    },
    {
        title: "Campaigns",
        description:
            "Campaigns are a great way to interact with your users",
        icon: { name: "campaign", color: "#D85B53" },
    },
    {
        title: "Collation",
        description:
            "View all your voting results in one place",
        icon: { name: "shield", color: "#638479" },
    },
]);
</script>

<template>
    <div class="grid gap-6 grid-cols-2 md:grid-cols-3 self-center">
        <LandingServiceItemList
            :index="index"
            v-for="(service, index) in services"
            :service="service"
            :key="index"
        />
    </div>
</template>
