@extends('layouts.app')

@section('title')
My Transactions
@endsection

@section('content')


<div class="container-fluid">
    <h3 class="text-center">My Reviews <button id="add-review" class="btn" data-toggle="modal" data-target="#addReview">+Add New Review</button></h3>
    <div class="row my-4">
        <div class="col-lg-9 mx-auto">
            
    <table class="table text-center table-striped mx-auto">            
        
        
        <thead> 
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="reviews"></tbody>
    </table>

        </div>
    </div>
</div>
      {{-- add new dev modal --}}
        <div class="modal" id="addReview">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add a New Review</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div> {{-- end modal header --}}
                    <div class="modal-body">
                        <form id="createReview">
                            @csrf

                            <div class="form-group">
                                <label for="title">Name: </label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Review Title">
                            </div>

                            <div class="form-group">
                                <label for="content">Content: </label>
                                <textarea id="message" rows="5" class="form-control" name="content" placeholder="Your review"> </textarea> 
                            </div>

                            <button id="createReviewButton" onclick="createReview" class="btn btn-primary btn-block" data-dismiss="modal"> Submit Review</button>
                        </form>
                    </div>


                </div>
            </div>
        </div> {{-- new dev modal --}}






    <script type="text/javascript">

        
        document.querySelector('#createReviewButton').addEventListener('click', function() {
               const formElement = document.getElementById('createReview');
            const formData = new FormData(formElement);
            let jsonObject = {};
            for (const [key, value] of formData.entries()) {
                jsonObject[key] = value;
            };
            //add ID of chosen booking to jsonObject
            jsonObject.id = "{{$id}}";
            //add user email to jsonObject
            jsonObject.email = localStorage.getItem('email');
            console.log(JSON.stringify(jsonObject));


             let reqHeader = new Headers();
            reqHeader.append('Access-Control-Request-Headers', 'Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization');
            reqHeader.append('Content-Type', 'application/json');
            reqHeader.append('Access-Control-Request-Method', 'POST');
            reqHeader.append('X-Requested-With', 'XMLHttpRequest');
            reqHeader.append('Authorization', 'Bearer ' + localStorage.getItem('token'));

            //create optional init object for supplying options to the fetch request
            let initObject = {
                method: 'POST', headers: reqHeader, body: JSON.stringify(jsonObject),
            };

            //create a resource request object through the Request() constructor
            let clientReq = new Request('http://localhost:3000/reviews/', initObject);

             console.log(clientReq)   
            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
            });


                 // console.log(formData)
                // fetch("http://localhost:3000/reviews/create", {
                //     method: "POST",
                //     headers : {
                //         'Content-Type' : 'application/json'
                //     },
                //     body : JSON.stringify(formData)
                // })
                // .then(res=>res.json())
                // .then(res => {
                //     //add the class alert-success to #success
                //     // document.querySelector("#success").classList.add("alert-success")
                //     //change the content of #success to print out "Successfully created the dev (name of dev)"
                //     // document.querySelector("#success").innerHTML = "Successfully created dev " + res.name
                // })
                // .catch(error => console.error('Error:', error))


        })

      fetch('http://localhost:3000/reviews/{{$id}}', {
            method: "GET",
            headers: {
                "Content-Type" : "application/json",
                "Authorization" : "Bearer " + localStorage.getItem('token')
            }
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // console.log(data.data.reviews)
            let reviews = data.data.reviews;
            reviews.forEach(function(review) {
                document.getElementById("reviews").innerHTML += `
                <tr>
                    <td><input type="text" id="id" value="${review._id}"></td>
                    <td><input type="text" id="title" value="${review.title}"></td>
                    <td><input type="text" id="message" value="${review.message}"></td>
                    <td><button class="editButton" onclick="updateReview()" data-id="${review._id}">Update</button></td>
                    <td><button class="btn btn-danger del-btn" data-id="${review._id}">Delete</button></td>
                </tr>
                `
                
            });
           }) 

   
       function updateReview() {
            //get quantity from form
            let id = document.querySelector('#id').value 
           let title = document.querySelector('#title').value 
           let message = document.querySelector('#message').value


            const formData = new FormData();
           formData.id = id  
           formData.title = title
           formData.message = message

           // console.log(formData)
            let jsonObject = {};
            for (const [key, value] of formData.entries()) {
                jsonObject[key] = value;
            };
            //add ID of chosen booking to jsonObject
            jsonObject.id = "{{$id}}";
            //add user email to jsonObject
            //jsonObject.email = localStorage.getItem('email');
            console.log(JSON.stringify(jsonObject));

            //store all headers into a single variable
            let reqHeader = new Headers();
            reqHeader.append('Access-Control-Request-Headers', 'Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization');
            reqHeader.append('Content-Type', 'application/json');
            reqHeader.append('Access-Control-Request-Method', 'PUT');
            reqHeader.append('X-Requested-With', 'XMLHttpRequest');
            reqHeader.append('Authorization', 'Bearer ' + localStorage.getItem('token'));

            //create optional init object for supplying options to the fetch request
            let initObject = {
                method: 'PUT', headers: reqHeader, body: JSON.stringify(jsonObject),
            };

            //create a resource request object through the Request() constructor
            let clientReq = new Request('http://localhost:3000/reviews/{{$id}}', initObject);

            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
            });

       };

    </script>

        
            

            
        
@endsection