<template>
    <div>

    <h1>Contact Us</h1>
        <form @submit.prevent="sendPost">
            <div class="form-group">
                <input type="text" class="form-control" id="title" placeholder="enter title"  v-model="title"  required/>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="title" placeholder="Contact Number"  v-model="personNumber"  required/>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="title" placeholder="email"  v-model="personEmail"  required/>
            </div>

            <div class="form-group">
                <textarea type="text" class="form-control" placeholder="enter body" v-model="body"   required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Insert</button>
        </form>

        <!--<pre>{{$data}}</pre> For Output All Data-->
    </div>



</template>



<script>
    export default{

        data(){
            return{
                title:'',
                body:'',
                personNumber:'',
                personEmail:'',
                ipInfo:''
            }

        },
        methods:{

            sendPost(){
                // alert($('#title').val());


                let vm=this;

                $.ajax({
                    url: "https://json.geoiplookup.io/",
                    type: 'GET',
                    success: function(res) {

                        vm.ipInfo=res;
                        axios.post("api/contact",{
                            title : vm.title,
                            body : vm.body,
                            personNumber :vm.personNumber,
                            personEmail :vm.personEmail,
                            ip :vm.ipInfo,

                        }).then(function (res) {
                            console.log(res.data);

                            $.alert({
                                title: 'Success!',
                                content: 'We got your message.Soon we will contact you via email or phone call',
                            });
                            // vm.title='';
                            // vm.body='';
                            // vm.personNumber='';
                            // vm.personEmail='';

                        })
                            .catch(function (error) {
                                console.log(error);
                            });
                    }
                });




            }





        }

    }


</script>

