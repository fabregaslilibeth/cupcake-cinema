@extends('layouts.app')

@section('title')
Update Availability
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h3>Blogs </h3>
              <div class="row my-4" id="blogList">

             </div>
        </div>
    </div>
</div>



<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content" id="editblog">
         
        </div> {{-- modal content --}}
    </div> {{-- end modal dialog --}}
</div> {{-- end modal --}}

        

        <script>
            

            // retrieve blogs from db
            // document.querySelector("#blogList").innerHTML = "Hello world"
            //create a token variable that will store the value of the key token in the localStorage
            let token = "Bearer "+localStorage.token

            //create an email variable that will store the value of the key user in the localStorage
            let email = localStorage.user

            //create an isAdmin variable that will store the value of the key isAdmin in the localStorage
            let isAdmin = localStorage.isAdmin

            // console.log('the token from lS is: ' + token)

            const url = 'https://vast-headland-67419.herokuapp.com/blogs/'
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
                         <div class="col-lg-4">
                            <div class="card  border-0">

                                <div class="card-body" >
                                  <img src="${blog.img_path}"  class="w-100" style=" height: 200px;" alt="">    
                                    <h4 class="card-title h2 text-center">${blog.title}</h4>
                                    <p class="h4 text-center"><q>${blog.content}</q></p>
                                    <div class="btn-container">
                                    
                                   <button class="readmoreButton" data-id="${blog._id}" data-toggle="modal" data-target="#editModal">Read More
                                    </button>
                                     </div>
                                </div>
                            </div>
                        </div>

                       
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
                        fetch('https://vast-headland-67419.herokuapp.com/blogs/'+editId)
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


              document.querySelector("#blogList").addEventListener("click", function(e) {
                        // console.log('this is the id: ' + e.target.dataset.id)
                        let editId = e.target.dataset.id
                        fetch('https://vast-headland-67419.herokuapp.com/blogs/'+editId)
                        .then(res=> {
                            return res.json()
                        })
                        .then(data=> {
                            // console.log(data.data.blog.name)
                            const blog = data.data.blog
                            // console.log(blog)

                            let blogDetails = ' ';

                            blogDetails += `
                               <div class="modal-header">
                                    <h4 class="modal-title text-center">${blog.title}</h4>
                                    
                              </div> {{-- modal header --}}
                                
                              <div class="modal-body">
                                    <div class="card  border-0">

                                <div class="card-body" >
                                  <img src="${blog.img_path}"  class="w-100" style=" height: 200px;" alt="">    
                                    <p class="h4 text-center"><q>${blog.content}</q></p>
                                    <div class="btn-container">
                                    
                                   <button class="readmoreButton btn-outline-secondary" data-id="${blog._id}" data-toggle="modal" data-target="#editModal">Read More
                                    </button>
                                     </div>
                                </div>
                            </div>
                             </div> 
                            `
                            document.querySelector("#editblog").innerHTML = blogDetails
                        })
            })


        
      
        </script>

@endsection