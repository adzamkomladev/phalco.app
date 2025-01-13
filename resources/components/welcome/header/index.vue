<template>
    <header
        class="sticky top-0 left-0 w-full z-50 bg-white transition-transform duration-300"
    >
        <div class="flex h-[5rem] items-center justify-center">
            <h1>
                <SharedCommonIcon name="logo_full" class="text-primary-500" />
            </h1>
        </div>

        <div class="transition-all duration-300 relative overflow-hidden">
            <WelcomeHeaderMenu />
        </div>
    </header>
</template>
