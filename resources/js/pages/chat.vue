<template>
    <div>
        Chat
        <form class="" @submit.prevent="handleLogout">
            <button type="submit">Logout</button>
        </form>
    </div>
</template>
<script>
import { handleLogout } from '../api'
export default {
    methods: {
        async handleLogout() {
            await handleLogout()
                    .then(res => {
                        localStorage.removeItem('_token');
                        localStorage.removeItem('user');
                        this.$router.push('auth')
                    }).catch(e => console.log(e));
        }
    }
}
</script>