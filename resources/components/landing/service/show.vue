<script setup lang="ts">
const services = ref([
    {
        title: "Fast decision",
        description:
            "    Lorem ipsum dolor sit amet consectetur adipisicing elit. Con",
        icon: { name: "rocket", color: "#07689F" },
    },
    {
        title: "vetting",
        description: "    Lorem ipsum dolor sit amet consectetur adipisicing ",
        icon: { name: "ballot_box", color: "#595BD4" },
    },
    {
        title: "Management",
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. ",
        icon: { name: "file", color: "#C9994D" },
    },
    {
        title: "Transaction",
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur cumq",
        icon: { name: "wallet", color: "#D19FB2" },
    },
    {
        title: "Campaigning",
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur cumque repellendu",
        icon: { name: "campaign", color: "#D85B53" },
    },
    {
        title: "Client safety",
        description:
            "Lorem ipsum dolor sit amet consectetur adipisicing elit. ",
        icon: { name: "shield", color: "#638479" },
    },
]);
</script>

<template>
    <div class="grid gap-6 grid-cols-2 md:grid-cols-3 self-center">
        <LandingServiceItemList
            v-for="(service, index) in services"
            :service="service"
            :key="index"
        />
    </div>
</template>
