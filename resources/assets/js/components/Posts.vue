<template>
    <div>
        <h4 align="center">Search Here</h4>
 
            <div class="form-group">
                <input type="text" class="form-control" placeholder="search here" v-on:keyup="search" v-model="post.title" required/>
            </div>

        <ul class="pagination">
            <li class="page-item" v-bind:class="[{disabled:!pagination.prev_page_url}]"><a href="#" class="page-link" @click="fetchPosts(pagination.prev_page_url)">prev</a></li>
            <li  class="disabled page-item"><a class="page-link">Page {{pagination.currrent_page}} of {{pagination.last_page}}</a></li>
            <li class="page-item" v-bind:class="[{disabled:!pagination.next_page_url}]"><a href="#" class="page-link" @click="fetchPosts(pagination.next_page_url)">next</a></li>
        </ul>
        <div class="jumbotron" v-for="post in posts">
            <h3>{{post.title}}</h3>
            <!--{!!post.details!!}-->
            <div v-html="post.details"> </div>
            <hr>
            <!--<button  @click="deletepost(post.postId)" class="btn btn-danger">delete</button>-->
            <!--<button class="btn btn-default" @click="editpost(post.postId,post.title,post.details)" >edit</button>-->

        </div>

    </div>

</template>

<script>
    export default{
        data(){
            return{
                posts:[],
                post:{
                    postId:'',
                    title:'',
                    body:''
                },
                postId:'',
                pagination:{},
                edit:false
            }

        },
        created(){
            this.fetchPosts();
        },
        methods:{
            fetchPosts(page_url){
                page_url= page_url ||'api/posts';
                let vm=this;
                fetch(page_url)
                    .then(res=>res.json())
            .then(res=>{
                    this.posts=res.data;
                // console.log(res.data);
                vm.makePagination(res.meta,res.links);

            }).catch(err=>console.log(err));
            },
            makePagination(meta,links){
                let pagination={
                    currrent_page:meta.current_page,
                    last_page:meta.last_page,
                    next_page_url:links.next,
                    prev_page_url:links.prev,

                }
                this.pagination=pagination;

            },
            search(event){

                // this.search(event.target.value);
                let vm=this;
                axios.post("api/search",{
                    search : event.target.value
                }).then(function (res) {
                    // console.log(vm.posts);
                    vm.posts=res.data.data;
                    //vm.makePagination(res.data.meta,res.data.links);
                })
                    .catch(function (error) {
                        console.log(error);
                    });

            },

            addPost(){
                if(this.edit==true){
                    fetch('api/post',{
                        method:'put',
                        body:JSON.stringify(this.post),
                        headers:{
                            'content-type':'application/json'
                        }
                    }).then(res=>res.json())
                .then(res=>{
                        this.post.title='';
                    this.post.body='';
                    this.post.postId='';
                    this.edit=false;
                    alert('Post Edited Successfully');
                    this.fetchPosts();
                })
                .catch(err=> console.log(err));
                }
                else {
                    fetch('api/post',{
                        method:'post',
                        body:JSON.stringify(this.post),
                        headers:{
                            'content-type':'application/json'
                        }
                    }).then(res=>res.json())
                .then(res=>{
                        this.post.title='';
                    this.post.body='';
                    this.post.postId='';
                    alert('Post Added Successfully');
                    this.fetchPosts();
                })
                .catch(err=> console.log(err));

                }


            }
            // editpost(id,title,body){
            //     this.edit=true;
            //     this.post.postId=id;
            //     this.post.title=title;
            //     this.post.body=body;
            // },
            // deletepost(id){
            //     if(confirm('Aru you sure ?')){
            //         fetch(`api/post/${id}`,{
            //             method:'delete'
            //         }).then(res=>res.json())
            //     .then(res=>{
            //
            //             alert('Post Deleted Successfully');
            //         this.fetchPosts();
            //     })
            //     .catch(err=> console.log(err));
            //     }
            //
            // }
        }

    }


</script>