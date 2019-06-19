@extends('layouts.app')

@section('title')
Cupcake Cinema || My Reviews
@endsection

@section('content')


<div class="container-fluid">
    <p id="status"></p>
    <h3 class="text-center">My Reviews</h3> 
        <a href="/addReview" class="btn btn-outline-secondary">Write new review</a>
        <div class="row my-4" id="reviewList">

        </div>
</div>

    <script type="text/javascript">

        fetch('https://vast-headland-67419.herokuapp.com/reviews/{{$id}}', {
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
            console.log(data)
            let reviews = data.data.reviews;
            console.log(reviews)
            reviews.forEach(function(review) {
                document.getElementById("reviewList").innerHTML += `
                       <div class="col-lg-4">
                        <div class="card  border-0">

                             <div class="card-body review-container" >
                                <img src="${review.image_path}"  class="w-100" style=" height: 200px;" alt="">    
                                <h4 class="card-title h2 text-center">${review.title}</h4>
                                <p class="h4 text-center"><q>${review.message}</q></p>
                                <p class="h4 text-center"> <em> ${review.date} </em></p>
                                 
                                <div class="btn-container">  
                                     <button class="btn btn-danger del-btn" id="${review._id}">Cancel review</button>
                                    <button class="editButton" id="${review._id}" data-toggle="modal" data-target="#editModal">Edit
                                            </button>
                                 </div>
                            </div>
                        </div>
                        </div>
                `
         
            });


              //turn the del-btn class into an array
            let editButtons = document.querySelectorAll('.editButton');

            //loop through the delButtons array to add an event listener and associate specific product id to each one
              editButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    window.location.replace(`/reviews/showEdit/${id}`);
                });
            })

         //   turn the del-btn class into an array
            let delButtons = document.querySelectorAll('.del-btn');

            //loop through the delButtons array to add an event listener and associate specific product id to each one
            delButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    if(!confirm('Are you sure you want to delete this review')) {
                        return false
                    }
                    let id = this.getAttribute('id');
                    console.log(id)
                     fetch('http://localhost:3000/reviews/delete', {
                        'method' : 'delete',
                        'headers' : {
                                     "Access-Control-Request-Headers": "Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization",
                                 "Content-Type": "application/json",
                                 "Access-Control-Request-Method": "POST",
                                 "X-Requested-With": "XMLHttpRequest",
                                 "Authorization": "Bearer " + localStorage.getItem('token')
                        },
                      body : JSON.stringify({'id' : id})
                    }) 
                      document.location.reload()
                           
                  })
            });
        })
        .catch(function(err) {
            console.log(err);
        });
    </script>

        
            

            
        
@endsection