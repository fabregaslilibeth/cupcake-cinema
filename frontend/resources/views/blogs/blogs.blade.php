@extends('layouts.app')

@section('title')
Update Availability
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <h3>Blogs <button id="add-blog" class="btn " data-toggle="modal" data-target="#newblog">+Create a new blog</button></h3>
              <ul id="blogList">
            
        </ul>
        </div>
    </div>
</div>
        
        <span id="success" class="alert"></span>

        {{-- add new blog modal --}}
        <div class="modal" id="newblog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create a new blog</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div> {{-- end modal header --}}
                    <div class="modal-body">
                        <form id="createblog">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Blog Title">
                            </div>

                            <div class="form-group">
                                <label for="content">Content: </label> <br>
                                <textarea class="form-control" name="content" id="content" rows="10"></textarea>
                            
                            </div>

                            <button id="createButton" class="btn btn-primary btn-block" data-dismiss="modal"> Create New blog</button>
                        </form>
                    </div>


                </div>
            </div>
        </div> {{-- new blog modal --}}

      

        <div class="modal" id="editModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit blog</h4>
                        <button type="button" class="close" data-dismiss-"modal"> &times;
                        </button>
                    </div> {{-- modal header --}}
                    
                    <div class="modal-body">
                        <form id="editblog">
                            
                        </form> {{-- end of update blog --}}
                    </div> {{-- modal body --}}
                </div> {{-- modal content --}}
            </div> {{-- end modal dialog --}}
        </div> {{-- end modal --}}

 

        <script>
            // create a new blog
            document.querySelector("#createButton").addEventListener("click", function() {
                // alert("hello")
                let nameField = document.querySelector("#name")
                let content = document.querySelector("#content")

                let formData = new FormData()

                formData.title = nameField.value
                formData.content = content.value

                console.log(formData)
                fetch("http://localhost:3000/blogs/create", {
                    method: "POST",
                    headers : {
                        'Content-Type' : 'application/json'
                    },
                    body : JSON.stringify(formData)
                })
                .then(res=>res.json())
                .then(res => {
                    window.location ='/blogs'
                    //add the class alert-success to #success
                    document.querySelector("#success").classList.add("alert-success")
                    //change the content of #success to print out "Successfully created the blog (name of blog)"
                    document.querySelector("#success").innerHTML = "Successfully created blog " + res.title
                })
                .catch(error => console.error('Error:', error))

            })

            // retrieve blogs from db
            // document.querySelector("#blogList").innerHTML = "Hello world"
            //create a token variable that will store the value of the key token in the localStorage
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
                            <button class="deleteButton" data-id="${blog._id}">Delete
                            </button>
                           <button class="editButton" data-id="${blog._id}" data-toggle="modal" data-target="#editModal">Edit
                            </button>
                        </li>
                    `
                })
                document.querySelector("#blogList").innerHTML = blogGroups;

            })

            //edit a blog
            // retrieve the specific blog details for the modal
            // blogList is UL
            document.querySelector("#blogList").addEventListener("click", function(e) {
                    if(e.target.className === 'editButton') {
                        // console.log('this is the id: ' + e.target.dataset.id)
                        let editId = e.target.dataset.id
                        fetch('http://localhost:3000/blogs/'+editId)
                        .then(res=> {
                            return res.json()
                        })
                        .then(data=> {
                            // console.log(data.data.blog.name)
                            const blog = data.data.blog
                            // console.log(blog)

                            let blogDetails = ' ';

                            blogDetails += `
                                {{ csrf_field() }}
                                  <div class="form-group">
                                  <input type="hidden" data-id=${blog._id} id="editId">   
                                <label for="name">Name: </label>
                                  <input type="text" id="editTitle" class="form-control"  value="${blog.title}"> 
 
                            </div>

                            <div class="form-group">
                                <label for="content">Content: </label> <br>
                                <textarea class="form-control" name="content" id="editContent" rows="10">${blog.content}</textarea>
                            
                            </div>

                                <button class="editSub" data-dismiss="modal">Submit Changes</button>
                            `
                            document.querySelector("#editblog").innerHTML = blogDetails
                        })
                    }
            })

            //update the blog credentials
            //select the edit form, when a button inside is clicked, a function will be called that will check if the button that triggered the event has a class name of editSub. if it does, log in the console "you clicked the edit submit button"
            document.querySelector("#editblog").addEventListener("click", function(e) {
                if(e.target.className === 'editSub') {
                    // console.log('you clicked the edit submit button')
                    //create a name variable that store the new value inputted in its text box
                    let name = document.querySelector("#editTitle").value
                    // console.log(name)
                    //create a content variable that store the new value inputted in its text box
                    let content = document.querySelector("#editContent").value
                    //create a batch variable that store the new value inputted in its text box
                    //log in the console all the values of the three variables
                    // console.log("name " + name + "port: " + content + "batch: " + batch)

                    //instantiate a FormData object and store to variable formData
                    let formData = new FormData();
                    //append a name property for formData with the value of variable name
                    formData.title = name
                    //append a content property for formData with the value of variable content
                    formData.content = content 
                    //append a batch property for formData with the value of variable batch
                    // log in the console the current value of formData
                    // console.log(formData)

                    //create an editId and assign the value of the data-id of the hidden input
                    let editId = document.querySelector("#editId").dataset.id
                    // console.log(editId)
                    // console.log(e.target.parentNode.firstElementChild.nextElementSibling.dataset.id)

                    fetch('http://localhost:3000/blogs/'+editId, {
                        method: 'PUT',
                        headers: {
                            'Content-Type' : 'application/json'
                        },
                        body : JSON.stringify(formData)
                    })
                    .then(res=> {
                        window.location ='/blogs'
                    })

                }
            })





            //delete a blog
            //create a code that will log the id of the blog in the console when i click its delete button
            document.querySelector("#blogList").addEventListener("click", function(e) {
                //log in the console kung sino yung nagttrigger
                // console.log(e.target.dataset.id)
                // console.log(e.target.className)
                // if the delete button is clicked, log the element's data-id
                if(e.target.className === 'deleteButton') {
                    // log in the console its data-id
                    // console.log(e.target.dataset.id)
                    //if confirm is not true, return false
                    // confirm('do you sure?')

                    if(!confirm('do you sure')) {
                        return false
                    }
                    //use the remove method to delete the blog in our layout
                    // element.remove()
                    console.log(e.target.parentNode)
                    e.target.parentNode.remove()
                    removeblog(e.target.dataset.id)
                }
            })

            function removeblog(id) {
                // console.log(id)

                fetch('http://localhost:3000/blogs/delete', {
                    'method' : 'delete',
                    'headers' : {
                        'Content-Type' : 'application/json'
                    },
                    body : JSON.stringify({'id' : id})
                })
            }

      
        </script>

@endsection