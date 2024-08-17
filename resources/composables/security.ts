export default function useSecurity() {
    const user = useProperty('security.user')
    const csrfToken = useProperty('security.csrfToken')
    const authenticated = computed(() => !!user.value)

    return {
        user,
        authenticated,
        csrfToken
    }
}
