<template>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <textarea name="comment" v-model="formData.comment" class="form-control mb-1" rows="2" placeholder="Write a comment here..."></textarea>
            <button class="btn btn-success float-right" @click="commentStore">Submit Comment</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userid', 'postid'],
        data() {
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
                axios.post('comment/store', this.formData).then((response) => {
                    console.log(response.data)
                    this.formData.comment = ''
                }).catch((errors) => {
                    console.log(errors)
                });
            }
        }
    }
</script>
