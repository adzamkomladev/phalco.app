<script setup lang="ts">
const standard = {
    type: "standard",
    amount: {
        value: 0,
        rate: "month",
    },
    description: "Basic plan",
    offers: [
        "Up to 5 team members",
        "Up to 50 voters",
        "1 month data retention",
        "24/7 Customer support",
    ],
};

const professional = {
    type: "professional",
    amount: {
        value: 10,
        rate: "month",
    },
    description: "Extra features",
    offers: [
        "Up to 20 team members",
        "Up to 800 voters",
        "6 months data retention",
        "Access to donations platform",
        "Access to nominations platform",
        "24/7 Customer support",
    ],
};

const premium = {
    type: "premium",
    amount: {
        value: 80,
        rate: "month",
    },
    description: "Full access",
    offers: [
        "20+ team members",
        "800+ voters",
        "Access to all features",
        "Up to 1 year data retention",
        "24/7 Customer support",
    ],
};
</script>
<template>
    <div
        class="_md:space-y-8 md:grid md:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0"
    >
        <LandingPricingListCard
            :position="1"
            :data="standard"
            buttonClass="text-white bg-black"
            class="border-gray-700 bg-white"
        />

        <LandingPricingListCard
            :position="2"
            :data="professional"
            class="bg-[#0988D0] text-white border-white"
            buttonClass="border-gray-800 bg-white text-[#0988D0]"
        />

        <LandingPricingListCard
            :position="3"
            :data="premium"
            class="border-gray-700 bg-white"
            buttonClass="text-white bg-black"
        />
    </div>
</template>
