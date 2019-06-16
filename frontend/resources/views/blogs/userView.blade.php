@extends('layouts.app')

@section('title')
Update Availability
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h3 class="text-center mx-auto">Blogs </h3>
              <ul id="blogList">
            
        </ul>
        </div>
    </div>
</div>
       

        <script>
           
            let token = "Bearer "+localStorage.token

            //create an email variable that will store the value of the key user in the localStorage
            let email = localStorage.user

            //create an isAdmin variable that will store the value of the key isAdmin in the localStorage
            let isAdmin = localStorage.isAdmin

            // console.log('the token from lS is: ' + token)

            const url = 'http://localhost:3000/blogs/'
            fetch(url, {
                method : 'GET',
                headers : {
                    'Content-Type'  : 'application/json',
                    'Authorization' : token
                }
            })
            .then(res=> {
                return res.json()
            })
            .then(data => {
                // console.log(data.data.blogs)
                const blogs = data.data.blogs
                let blogGroups = ' ';

                blogs.map(blog => {
                    // console.log(blog)
                    blogGroups += `
                        <li class="card p-5 text-center"> ${blog.title}${blog.content}
                        </li>
                    `
                })
                document.querySelector("#blogList").innerHTML = blogGroups;

            })

         
        </script>
@endsection