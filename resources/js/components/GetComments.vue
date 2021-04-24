<template>
    <div class="row justify-content-center mb-1">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Comments</div>
                <div class="card-body">
                    <p v-for="(comment, index) in comments" :key="index">
                        <span class="badge badge-pill badge-light">{{comment.user.name}} Commented:</span> {{comment.comment}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userid', 'postid'],
        data() {
            return {
                comments: {}
            }
        },
        mounted() {
            this.getComments()
            this.interval = setInterval(function() {
                this.getComments()
            }.bind(this), 500);
        },
        methods: {
            getComments(){
                axios.get('/blog/getComments/' + this.postid).then((response) => {
                    this.comments = response.data
                }).catch((errors) => {
                    console.log(errors)
                });
            }
        }
    }
</script>
