import Posts from './components/Posts.vue';
import Contact from './components/Contact.vue';


var baseUrl='/thesis';

export const routes =[
    {path:baseUrl+'/',component:Posts,name: 'index'},
    {path:baseUrl+'/index',component:Posts},
    {path:baseUrl+'/contact',component:Contact}

    ];
