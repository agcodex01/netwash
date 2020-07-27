<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           <i class="fa fa-bell"></i> <span class="caret"></span>
        </a>

        <NotificationFeed :notifications="notifications"></NotificationFeed>
    </li>
</template>

<script>
import NotificationFeed from "./NotificationFeed"
export default {

    components:
    {
        NotificationFeed
    },
    mounted()
    {
        axios.get('/notification')
        .then((response) =>{
            console.log(response.data);
            this.notifications = response.data;
        })
    },
    data()
    {
        return{
            notifications : []
        }
    },
    
}
</script>

