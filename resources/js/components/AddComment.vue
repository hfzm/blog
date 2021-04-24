<template>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <textarea name="comment" class="form-control mb-1" rows="2" placeholder="Write a comment here..." v-model="formData.comment"></textarea>
            <input type="hidden" name="user_id">
            <input type="hidden" name="post_id">
            <button class="btn btn-success float-right" @click="commentStore">Submit Comment</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userid', 'postid'],
        data(){
            return {
                formData: {
                    comment: '',
                    user_id: this.userid,
                    post_id: this.postid,
                }
            }
        }, 
        methods: {  
            commentStore(){
                axios.post('/blog/comment/store', this.formData).then((response) => {
                    console.log(response.data)
                    this.formData.comment = ''
                }).catch((errors) => {
                    console.log(errors)
                });
            }
        }
    }
</script>
