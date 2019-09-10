@extends('layouts.app')

@section('title')
Admin Dashboard
@endsection

@section('content')
 <div class="container-fluid">
            <h3 class="text-center">Client Reviews</h3>
        <div class="row">
            <div class="col-lg-10 mx-auto admin-trx py-4">

            <table class="table table-striped col-lg-11 mx-auto adminView-reviews">
                <thead>
                    <tr>
                        <th scope="col">Review ID</th>
                        <th scope="col">Posted by</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">isDisplayed?</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody id="reviews">
                    
                </tbody>
            </table>

        </div>
    </div>
</div>

    <script type="text/javascript">

        fetch('https://vast-headland-67419.herokuapp.com/reviews/').then(function(response) {
            return response.json();
        })
        .then(function(data) {
            console.log(data)
            let reviews = data.data.reviews;
            console.log(reviews )
            reviews.forEach(function(review) {
                document.getElementById("reviews").innerHTML += `
                <tr>
                    <td>${review._id}</td>
                    <td>${review.ownerEmail}</td>
                    <td>${review.title}</td>
                    <td>${review.message}</td>
                    <td>${review.date}</td>
                    <td>${review.is_displayed}</td>
                    <td>
                        <div class=btn-container> 
                            <button class="btn btn-success display-btn" id="${review._id}">Display</button>  
                        </div>    
                    </td>
                </tr>
                `
            });

            //turn the display-btn class into an array
            let delButtons = document.querySelectorAll('.display-btn');

      
            //loop through the delButtons array to add an event listener and associate specific product id to each one
            delButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    fetch(`https://vast-headland-67419.herokuapp.com/${id}`, {
                        method: 'PUT', 
                        headers: {
                            "Access-Control-Request-Headers": "Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization",
                            "Content-Type": "application/json",
                            "Access-Control-Request-Method": "PUT",
                            "X-Requested-With": "XMLHttpRequest",
                            "Authorization": "Bearer " + localStorage.getItem('token')
                        },
                        //instead of deleting reviews, disable them
                        body: JSON.stringify({
                            "is_displayed": true
                        }),
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        window.alert(data.data.message);
                        document.location.reload()
                    })
                    .catch(function(err) {
                        console.log("Something went wrong!", err);
                    });
                });
            });
         
        })
        .catch(function(err) {
            console.log(err);
        });

            </script>

        
            

            
        
@endsection