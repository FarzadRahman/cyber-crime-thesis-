<template>
    <div>

    <h1>Contact Us</h1>
        <form @submit.prevent="sendPost">
            <div class="form-group">
                <input type="text" class="form-control" id="title" placeholder="enter title"  v-model="title"  required/>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" placeholder="enter body" v-model="body"   required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Insert</button>
        </form>
    </div>

</template>


<script>
    export default{
        data(){
            return{
                title:'',
                body:''
            }

        },
        methods:{
            sendPost(){
                // alert($('#title').val());
                let vm=this;
                axios.post("api/contact",{
                    title : vm.title,body : vm.body
                }).then(function (res) {
                    console.log(res.data);
                    vm.title='';
                    vm.body='';

                })
                    .catch(function (error) {
                        console.log(error);
                    });


            }





        }





    }



</script>