<template>
  
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <ul>
            <li v-for="notification in notifications" :key="notification.id">
                <p>{{notification.id}}</p>
            </li>
        </ul>
    </div>   
</template>

<script>
    export default {
        props:{
            notifications :{
                type :Array,
                default : []
            }
        },
        
       
    }
</script>
