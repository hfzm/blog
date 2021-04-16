<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell" id="notify_icon"></i>
            <span id="notifiy_num" v-show="unreadnotifications.length > 0">{{unreadnotifications.length}}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" v-show="unreadnotifications.length > 0" @click="markAsRead">Mark all as read!</a>
            <a class="dropdown-item" v-for="(unread, index) in unreadnotifications" :key="index">
                <h5>{{unread.data.comment_status}}</h5>
                <p>{{unread.data.post_title}}</p>
                <p>{{moment(unread.created_at).fromNow()}}</p>
            </a>
            <a class="dropdown-item" v-show="unreadnotifications.length == 0">No new notifications</a>
        </div>
    </li>
</template>

<script>
    export default {
        mounted() {
            this.getNotifications();
            this.interval = setInterval(function() {
                this.getNotifications()
            }.bind(this), 500);
        }, 
        data(){
            return {
                unreadnotifications: {},
            }
        }, 
        methods: {
            getNotifications(){
                axios.get('unreadNotifications').then((response) => {
                    this.unreadnotifications = response.data
                }).catch((errors) => {
                    console.log(errors)
                });
            }, 
            markAsRead(){
                axios.get('markAsRead').then((response) => {
                    location.reload()
                }).catch((errors) => {
                    console.log(errors)
                });
            }
        }
    }
</script>
