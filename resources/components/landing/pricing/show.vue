<script setup lang="ts">
const standard = {
    type: "standard",
    amount: {
        value: 15,
        rate: "month",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "Lorem ipsum dolor sit amet",
        "Lorem adipisicing atque",
        "Lorem mollitia omnis dolorem",
        "Lorem iusto vel",
    ],
};

const professional = {
    type: "professional",
    amount: {
        value: 25,
        rate: "month",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "Lorem ipsum dolor sit amet",
        "Lorem adipisicing atque",
        "Lorem mollitia omnis dolorem",
        "Lorem iusto vel",
        "Lorem iusto vel",
        "Lorem iusto vel",
        "Lorem iusto vel",
    ],
};

const premium = {
    type: "premium",
    amount: {
        value: 100,
        rate: "year",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "All voting access",
        "7 Day transaction clearing",
        "L2 auto tracking",
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
            class="border-gray-800 bg-white"
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
            class="border-gray-800 bg-white"
            buttonClass="text-white bg-black"
        />
    </div>
</template>
