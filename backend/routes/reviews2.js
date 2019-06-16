// include the express framework
const express = require('express');

// include the Router used in the express framework
const router = express.Router();

//require the dev model 
const ReviewModel = require('../models/Review');

const UserModel = require('../models/User');

const moment = require("moment");

// router.get('/', (req, res) => {
// 	res.send({type : 'GET'});
// })

//CREATE A NEW Review
router.post('/', (req, res) => {
		
		// Build the new transaction
		let newReview = new ReviewModel({
			'ownerEmail': req.body.email,
			'title': req.body.title,
			'message': req.body.content,
			'date' : moment().format('MMMM Do YYYY, h:mm:ss a') 
		});

		  	// Proceed to save the information to the data base
			newReview.save( (err, review) => {
				
				// If there is a problem with the database, throw an error
				if(err){
					return res.status(500).json({
						'error': err 
					});
				}

				// If database operation is successful return success
				return res.status(200).json(review);

			});

});

// Retrieve all transactions of the logged in user
router.get('/:id', (req, res) => {
	//Find user email based on the user ID taken from URL
	
	UserModel.findOne({'_id': req.params.id}).then( (user) => {
		if(!user){
			return res.status(200).json({
				'message': 'No user found'
			});
		}

		let email = user.email;
		//find all transactions of specified user
		ReviewModel.find({'ownerEmail': email}).then( (reviews) => {
			// If no reviews are found, 
			if(!reviews){
				return res.status(200).json({ 
					'message': 'No reviews to show.'
				});
			}

			// Return all reviews of the user in session
			return res.status(200).json({ 
				'data': {
					'reviews': reviews
				}
			});
		});
	});
});


// RETRIEVE A review
// router.get('/', (req, res) => {
// 	ReviewModel.find({}, (err, reviews) => {
// 		// console.log(reviews)
// 		if(!err) {
// 			return res.json({
// 				'data' : {
// 					'reviews' : reviews
// 				}
// 			})
// 		} else {
// 			console.log(err)
// 		}
// 	})
// })

// RETRIEVE A SINGLE review
// router.get('/:id', (req,res)=> {
// 	// console.log(req.params.id)
// 	// execute a query in our reviews collection to filter out the document with an _id equal to
// 	// the value of the req.params.id
// 	ReviewModel.findOne({'_id' : req.params.id})
// 	.then(review=> {
// 		console.log(review)
// 		if(review) {
// 			return res.json({
// 				'data' : {
// 					'review' : review
// 				}
// 			})
// 		}
// 		return res.json({
// 			'message' : 'no review with the given id'
// 		})
// 	})

// })

//DELETE A review
// localhost:3000/reviews/delete
router.delete('/delete', (req, res, next) => {
	// console.log(req.body.reviewId)
	// res.send({type : 'DELETE'});
	ReviewModel.deleteOne({_id : req.body.id })
		.then(review => {
			res.send(review)
		}).catch(next)
})

//UPDATE A review
// router.put('/:reviewId', (req, res, next) => {
// 	console.log(req.body)
// 	// res.send({type : 'PUT'});
// 	ReviewModel.updateOne({_id : req.params.reviewId}, req.body)
// 	.then( ()=> {
// 		ReviewModel.findOne({_id : req.params.reviewId})
// 			.then(review => {
// 				res.send(review)
// 			})
// 	}).catch(next)
// })


router.get('/:id', (req, res) => {

	// Search for the specific availability based on the ID
	ReviewModel.findOne({ '_id': req.params.id }).then( (review) => {

		// If no threads are available, return a successful request with info
		if(!review){
			return res.status(200).json({ 
				'message': 'No available booking to show.'
			});
		}

		// Return the satisfying review based on the ID
		return res.status(200).json({
				'review': review
		});

	});

});

router.put('/:id', (req, res) => {

	ReviewModel.update( { '_id' : req.params.id}, req.body )
		.then( review => {
			if(review) {
				return res.json({
					'data' : {
						'review' : review,
						'message' : 'review successfully updated.'
					}
				});
			}

			return res.json({
				'message' : 'No review with the given ID found'
			});
		});
});



// Retrieve all transactions 
router.get('/', (req, res) => {
	// Find all transactions in the database for admin use
	ReviewModel.find({}).then( (reviews) => {

		// If no reviews are found, 
		if(!reviews){
			return res.status(200).json({ 
				'message': 'No reviews to show.'
			});
		}

		// Return all reviews of the user in session
		return res.status(200).json({ 
			'data': {
				'reviews': reviews
			}
		});
	});
});




module.exports = router;